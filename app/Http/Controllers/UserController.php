<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class UserController extends Controller
{
    public function edit(){
        $user = Auth::user();
        
        return view('user.user_edit', $user);
    }

    public function update(Request $request){
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'password' => 'nullable|min:6|confirmed|max:191',
            'phone' => 'required|string|size:10',
        ]);
        $user = User::find(Auth::id());
        $user->name = $request->name;
        $user->phone = $request->phone;
        if($request->password != null)
            $user->password = bcrypt($request->password);
        $user->save();
        return redirect('user/edit')->with('success',"更新成功!");
    }

    public function admin(Request $request){
        $users = User::where('id', "!=" ,Auth::id())
            ->get();

        $data = compact('users');
        return view('admin.user', $data);
    }

    public function add(Request $request){
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'username' => 'required|string|max:191|unique:users',
            'password' => 'required|string|min:6|confirmed|max:191',
            'phone' => 'required|string|size:10',
        ]);
        $data = $request->all();
        User::create([
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'phone' => $data['phone'],
            'name' => $data['name']
        ]);

        return redirect('/admin/user');
    }

    public function adminEdit($id){
        $user = User::find($id);

        return view('admin.user_edit', $user);
    }

    public function adminUpdate($id, Request $request){
         $this->validate($request, [
            'name' => 'required|string|max:191',
            'password' => 'nullable|min:6|confirmed|max:191',
            'phone' => 'required|string|size:10',
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        if($request->password != null)
            $user->password = bcrypt($request->password);
        $user->save();
        return redirect('/admin/user');
    }
}
