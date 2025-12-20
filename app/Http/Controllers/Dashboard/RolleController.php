<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
class RolleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles=Role::paginate(10);
        return view('dashboard.roles.index',['roles'=>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role=Role::paginate(10);
        return view('dashboard.roles.create',['role'=>$role]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'abilities'=>'required|array',// تأكد من أن القدرات موجودة ومصفوفة
            'type'=>'required|in:allow,deny,inherit',
            // ال role تخزن في جدولين هما roles و role_abilities
        ]);
        $role=Role::createwithAbilities($request);
        return redirect()->route('dashboard.roles.index')->with('success','Role created successfully');
        // return redirect()->route('dashboard.roles.index')->with('success','Role created successfully');;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $role_abilities = $role->abilities();
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name'=>'required',
            'abilities'=>'required|array',// تأكد من أن القدرات موجودة ومصفوفة
            'type'=>'required|in:allow,deny,inherit',//
            // ال role تخزن في جدولين هما roles و role_abilities
        ]);
        $role->updatewithAbilities($request);
        return redirect()->route('dashboard.roles.index')->with('success','Role updated successfully');            
        }
        
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $role=Role::findOrFail($id);
       Role::destroy($role->id);
        return redirect()->route('dashboard.roles.index')->with('success','Role deleted successfully');
    }
}
