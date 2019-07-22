<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Role\CreateRoleRequest;
use App\Models\Role;
use App\Services\Backend\Role\RoleService;
use function foo\func;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    /** get data table to show on method @index
     * @throws
     * @return mixed
     */
    public function dataTables()
    {
        $role = numrows(Role::all());
        return DataTables::of($role)
            ->addColumn('action', function ($role) {
                return
                '<a href="'.route('role.show', $role->id).'" class="btn btn-primary btn-circle btn-sm "><i class="fas fa-search"></i></a>
                <a href="'.route('role.edit', $role->id).'" class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                <a href="'.route('role.delete', $role->id).'" class="btn btn-danger btn-circle btn-sm "><i class="fas fa-trash"></i></a>';
            })
            ->make(true);

    }

    /**
     * @return View
     */
    public function index()
    {
        return view('admin.backend.roles.index');
    }

    /** Show the form for creating a new resource.
     * @return View
     */
    public function create()
    {
        return view('admin.backend.roles.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);


        $data = new Role([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
        ]);

        $data->save();

        return redirect()->route('user.index')
            ->with('user created successfully.');
    }

    /**
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $user = new Role();
        $data = $user->findOrFail($id);
        return view('admin.backend.roles.show',compact('data'));
    }

    /**
     * @param Role $role
     * @return View
     */
    public function edit(Role $role)
    {
        return view('admin.backend.roles.edit',compact('role'));
    }

    /**
     * @param Request $request
     * @param Role $role
     * @return RedirectResponse
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name'=>'required',
            'description'=> 'required'
          ]);

        $role->update($request->all());
    
          return redirect('/role')->with('success', 'Role has been updated');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->roleService->deleteRole($id);
        return redirect()->route('role.index')
            ->with('success','role deleted successfully');
    }
}
