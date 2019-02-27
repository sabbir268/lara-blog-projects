<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Photo;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','id')->all();
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        if (trim($request->password == '')) {
            $data = $request->except('password');
        }
        else{
            $data = $request->all();
            $data['password'] = bcrypt($request->password);
        }
        



        if ($file = $request->file('photo')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
            $data['photo_id'] = $photo->id;
        }

        

        User::create($data);

        return redirect('/admin/users')->with('message', 'User has been Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = User::findOrFail($id);
        $roles = Role::pluck('name','id')->all();
        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        if (trim($request->password == '')) {
            $data = $request->except('password');
        }
        else{
            $data = $request->all();
            $data['password'] = bcrypt($request->password);
        }

        if ($file = $request->file('photo')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
            $data['photo_id'] = $photo->id;
        }

        $data['password'] = bcrypt($request->password);

        $user->update($data);

        return redirect('/admin/users')->with('message', 'User has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        unlink(public_path().$user->photo->file);

        $user->delete();



        return redirect('/admin/users')->with('message', 'User has been deleted');
    }


   
}
