<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use function foo\func;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;


class MenuController extends Controller
{

    public function datatables()
    {
        $data = numrows(Menu::all());
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return
                '<a href="'.route('user.show', $data->id).'" class="btn btn-primary btn-circle btn-sm "><i class="fas fa-search"></i></a>
                <a href="'.route('user.edit', $data->id).'" class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                <a href="'.route('user.delete', $data->id).'" class="btn btn-danger btn-circle btn-sm "><i class="fas fa-trash"></i></a>';
            })
            ->make(true);

    }
    
    public function index()
    {
        $menus = Menu::all();
        return view('admin.backend.menus.index',compact('menus'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('admin.backend.menus.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $menu = new Menu([
            'name' => $request->get('name')
          ]);
        $menu->save();
   
        return redirect()->route('menu.index')
            ->with('success','menu created successfully.');
    }

    /**
     * Display the specified resource.
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $menu = new menu();
        $data = $menu->findOrFail($id);
        return view('admin.backend.menus.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return View
     */
    public function edit($id)
    {
        $menu = new menu();
        $data = $menu->findOrFail($id);
        return view('admin.backend.menus.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name'=>'required'
          ]);

        $menu->update($request->all());
    
          return redirect('/menu')->with('success', 'Menu has been updated');
    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->delete();

        return redirect()->route('menu.index')
            ->with('success','menu deleted successfully');
    }
}
