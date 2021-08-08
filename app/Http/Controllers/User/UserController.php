<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\AgentRequest\StoreRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index()
    {
     $data = User::with('roles','permissions')->get();
     return $data;
    }


     /*** Show the form for creating a new resource.**
 @return \Illuminate\Http\Response*/
    public function create()
    {
    $roles = Role::pluck('name','name')->all();
    return $roles;
    }


    /*** Store a newly created resource in storage.**
 @param  \Illuminate\Http\Request  $request*
@return \Illuminate\Http\Response*/
public function store(StoreRequest $request)
{
    $AgentPermission=Permission::where('name','like','%Order%')->get();

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password'=>Hash::make($request->password),
        'password_confirmation'=>Hash::make($request->password_confirmation),
        'mobile'=>$request->mobile,
        'work'=>$request->work,
        'is_agent'=>'1'
    ]);

    $user->assignRole([3]);

    foreach($AgentPermission as $a)
    {
        $user->givePermissionTo($a->id);

    }

    return $user;
}

/*** Display the specified resource.**
 @param  int  $id* @return \Illuminate\Http\Response*/
 public function show($id)
 {
     $user = User::find($id);

    return $user;

}

/*** Show the form for editing the specified resource.**
@param  int  $id* @return \Illuminate\Http\Response*/
public function edit($id)
{
    $user = User::find($id);
    $roles = Role::pluck('name','name')->all();
    $userRole = $user->roles->pluck('name','name')->all();
    return [$user,$roles,$userRole];
}


/*** Update the specified resource in storage.
 *** @param  \Illuminate\Http\Request
$request* @param  int  $id* @return \Illuminate\Http\Response*/
public function update(Request $request, $id)
{
    $this->validate($request, ['name' => 'required',
    'email' => 'required|email|unique:users,email,'.$id,
    'password' => 'same:confirm-password',
    'roles' => 'required']);
    $input = $request->all();
    if(!empty($input['password']))
    {
        $input['password'] = Hash::make($input['password']);
    }
    else
    {
        $input = array_except($input,array('password'));
    }
    $user = User::find($id);
    $user->update($input);
    DB::table('model_has_roles')->where('model_id',$id)->delete();
    $user->assignRole($request->input('roles'));
    return $user;
}

/*** Remove the specified resource from storage.**
 @param  int  $id* @return \Illuminate\Http\Response*/
 public function destroy($id)
 {
    User::find($id)->delete();
    return true;
}


public function CurrentUser()
{
    $user=Auth::user();
    $role=$user->getRoleNames();

    return $user;

}


}
