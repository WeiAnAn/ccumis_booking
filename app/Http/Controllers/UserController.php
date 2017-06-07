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
}
