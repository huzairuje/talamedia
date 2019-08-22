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
        $data = numrows(User::with('role')->get());
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return
                '<a href="'.route('user.show', $data->id).'" class="btn btn-primary btn-circle btn-sm "><i class="fas fa-search"></i></a>
                <a href="'.route('user.edit', $data->id).'" class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                <a href="'.route('user.delete', $data->id).'" class="btn btn-danger btn-circle btn-sm "><i class="fas fa-trash"></i></a>';
            })
            ->editColumn('roles', function ($data){
                $firstRole = $data->role;
                foreach ($firstRole as $role)
                {
                    $namaRole = $role->name;
                }
                return array($namaRole);
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
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'role_id' => 'required',
        ]);

        $data = $this->userModel;
        $data->name = $request->get('name');
        $data->email = $request->get('email');
        $data->username_instagram = $request->get('username_instagram');
        $data->password = bcrypt($request->get('password'));
        $data->save();

        $userRoles = $this->userRole;
        foreach ($userRoles as $userRole) {
            $userRoles = $request['role_id'];
            $role = Role::findOrFail($userRoles);
        }
        $userRoles = $request['role_id'];
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
        $roles = Role::all();
        $data = $user->findOrFail($id);

        return view('admin.backend.users.edit',compact('data', 'roles'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'max:255',
            'email' => 'max:255|email',
            'password' => 'required|min:8|confirmed',
        ]);
        $data = $this->userModel->findOrFail($id);
        $data->name = $request->get('name');
        $data->email = $request->get('email');
        $data->username_instagram = $request->get('username_instagram');
        $data->password = bcrypt($request->get('password'));
        $data->update();

        $userRoles = $this->userRole;
        foreach ($userRoles as $userRole) {
            $userRoles = $request['role_id'];
            $role = Role::findOrFail($userRoles);
        }
        $userRoles = $request['role_id'];
        $data->role()->sync($userRoles);
        return redirect()->route('user.index')->with('success', 'User has been updated');
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
