<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class PermissionController extends Controller
{
    public function index()
    {
        return view('admin.permissions.index',[
            'permissions'=>Permission::all()
        ]);
    }

    public function store()
    {

        request()->validate([

            'name'=>['required']

        ]);
        Permission::create([
            'name'=>Str::ucfirst(request('name')),
            'slug'=>Str::of(Str::lower(request('name')))->slug('-')
        ]);
       return back();
    }

    public function edit(Permission $permission){

        return view('admin.permissions.edit',[
            
            'permission'=> $permission
    ]);
    }

    public function update(Permission $permission)
    {
            $permission->name = Str::ucfirst(request('name'));
            $permission->slug = Str::of(request('name'))->slug('-');


            if($permission->isDirty('name')){

                Session::flash('permission-update','Permission Was Updated succesfully');
                $permission->save();
            }
            
            else
            {
                Session::flash('permission-update','Nothing was Updated');
            }
           
            return back();
    }

    public function destroy(Permission $permission){

        $permission->delete();
  
        Session::flash('permission-deleted','Permission Was Deleted succesfully');
  
        return back();
     }


}
