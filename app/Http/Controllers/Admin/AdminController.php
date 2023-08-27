<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.index', ['data' => Admin::all(), 'headers' => Admin::getColumns()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.forms.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->get('id')){
            $adminUser = Admin::find($request->get('id'));
        }else{
            $adminUser = new Admin();
        }
        // Todo: Add validation
        $adminUser->setAttribute('name', $request->get('name'));
        $adminUser->setAttribute('email', $request->get('email'));
        $adminUser->setAttribute('phone', $request->get('phone'));
        $adminUser->setAttribute('password', $request->get('password'));
        $adminUser->save();

        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.forms.details', ['admin' => Admin::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = Admin::find($id);
        return view('admin.forms.edit', ['admin' => $admin]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($admin)
    {
        Admin::find($admin)->delete();
        return redirect()->route('admin.index');
    }
}
