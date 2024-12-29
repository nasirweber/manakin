<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function AllRoles(){

        $roles = Role::all();
        return view('backend.pages.roles.all_roles',compact('roles'));

    }

    public function AddRoles(){

        return view('backend.pages.roles.add_roles');

    }

    public function StoreRoles(Request $request){

        //roleName must be string
        $request->validate([
            'roleName' =>  ['required', 'regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/']
        ]);       
        
        $roleObj = new Role();
        $idVal =  $roleObj->pluck('id')->last();
        $roleObj->id = $idVal+1;
        $roleObj->name = $request['roleName'];
        $roleObj->gaurd_name = 'web';
        $roleObj->created_at = date('Y-m-d H:i:s');
        $roleObj->updated_at = date('Y-m-d H:i:s');
        $roleObj->save();

        $notification = array(
            'message' => 'Role Successfully Saved.',
            'alert-type'=>'success'
        );

        return redirect()->route('all.roles')->with($notification);

    }

    public function EditRoles($id){
        
        $roles = Role::findOrFail($id);
        $data = compact('roles');
        return view('backend.pages.roles.edit_roles')->with($data);

    }

    public function UpdateRoles(Request $request,$id){

        $roles = Role::find($id);
        //roleName must be string
        $request->validate([
            'roleName' =>  ['required', 'regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/']
        ]);
        $roles->name = $request['roleName'];
        $roles->created_at = date('Y-m-d H:i:s');
        $roles->updated_at = date('Y-m-d H:i:s');
        $roles->save();

        $notification = array(
            'message' => 'Role Successfully Updated.',
            'alert-type'=>'success'
        );

        return redirect()->route('all.roles')->with($notification);
        //return view('backend.pages.roles.edit_roles')->with($data);

    }

    public function DeleteRoles($id){

        $roles = Role::find($id);
        if(!is_null($roles)){

            $isDeleted=$roles->delete();
            if($isDeleted){
                $notification = array(
                    'message' => 'Role Successfully Deleted.',
                    'alert-type'=>'success'
                );
            }else{
                $notification = array(
                    'message' => 'Failed to Delete Role.',
                    'alert-type'=>'success'
                );
            }

            return redirect()->route('all.roles')->with($notification);


        }

    }

}
