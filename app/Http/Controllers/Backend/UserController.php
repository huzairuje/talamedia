<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Role;
use App\Models\User;
//use App\Services\Backend\User\UserService;
use App\Models\UserRole;
use function foo\func;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{

    protected $userRole;
    protected $userModel;

    public function __construct(UserRole $userRole, User $userModel)
    {
        $this->userRole = $userRole;
        $this->userModel = $userModel;
    }

    /** get data table to show on method @index
     * @throws
     * @return mixed
     */
    public function dataTables()
    {
        $data = numrows(User::all());
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return
                '<a href="'.route('user.show', $data->id).'" class="btn btn-primary btn-circle btn-sm "><i class="fas fa-search"></i></a>
                <a href="'.route('user.edit', $data->id).'" class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                <a href="'.route('user.delete', $data->id).'" class="btn btn-danger btn-circle btn-sm "><i class="fas fa-trash"></i></a>';
            })
            ->make(true);
    }

    /** show datatable
     * @return View
     */
    public function index()
    {
        return view('admin.backend.users.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.backend.users.create', compact('roles'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:8|confirmed',
            'role_id' => 'required',
        ]);

        $data = $this->userModel;
        $data->name = $request->get('name');
        $data->email = $request->get('email');
        $data->password = bcrypt($request->get('password'));
        $data->save();

        $userRoles = $this->userRole;
        foreach ($userRoles as $userRole) {
            $userRoles = $request['role_id'];
            $role = Role::findOrFail($userRoles);
        }
        $data->role()->attach($userRoles);
        return redirect()->route('user.index')
            ->with('user created successfully.');
    }

    /**
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $user = new User();
        $data = $user->findOrFail($id);
        return view('admin.backend.users.show',compact('data'));
    }

    /**
     * @param $id
     * @return View
     */
    public function edit($id)
    {
        $user = new User();
        $data = $user->findOrFail($id);
        return view('admin.backend.users.edit',compact('data'));
    }

    /**
     * @param Request $request
     * @param User $data
     * @return RedirectResponse
     */
    public function update(Request $request, User $data)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|email||unique:users,email,'.$data->id.',id',
            'password' => 'required|min:8|confirmed',
        ]);
        $data->update($request->all());

        $userRoles = $this->userRole;
        foreach ($userRoles as $userRole) {
            $userRole = $request['role_id'];
            $role = Role::findOrFail($userRole);
        }
        $data->role()->sync($userRoles);
        return redirect('/user')->with('success', 'User has been updated');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();

        return redirect()->route('user.index')
            ->with('success','user deleted successfully');
    }
}
