<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class QuickLoginController extends Controller
{
    public function index(){
        if(Auth::check())
            return redirect('/user');
        return view('quick_login');
    }

    public function login(Request $request){
        if(Auth::check())
            return redirect('/user');
            
        $this->validate($request, [
            'id_card' => 'required|string|size:8'
        ]);

        $hash = hash_hmac('sha256', $request->id_card, env('APP_KEY'));

        $user = User::where('id_card', $hash)->first();
        if(!$user)
            return redirect('quick_login')->with('error', '無效的卡片或是還未註冊的卡片，請先登入註冊卡片');
        
        Auth::login($user); 
        return redirect('user');           
    }

    public function edit(){
        return view('user.id_card');
    }

    public function update(Request $request){
        $this->validate($request, [
            'id_card' => 'required|string|size:8'
        ]);

        $user = User::find(Auth::id());
        $user->id_card = hash_hmac('sha256', $request->id_card, env('APP_KEY'));
        $user->save();
        return redirect('user/id_card')->with('success',"更新成功!");
    }
}
