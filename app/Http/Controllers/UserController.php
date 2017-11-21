<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Excel;
use Validator;

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
            ->paginate();

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

    public function uploadView(){
        return view('admin.user_upload');
    }

    public function upload(Request $request){
        
        $result = Excel::load($request->file('file'), function($reader){
            })->toArray();

        $insertArr = [];

        foreach($result as $line => $array){
            $errorLine = $line+2;
            $index = 0;
            $newArray = [];
            foreach($array as $item){
                switch($index){
                    case 0:
                        $newArray['username'] = (string)$item;
                        break;
                    case 1:
                        $newArray['password'] = bcrypt($item);
                        break;
                    case 2:
                        $newArray['phone'] = $item;
                        break;
                    case 3:
                        $newArray['name'] = $item;
                        break;
                    default:
                        break;
                }
                $index++;
            }
            
            $validator = Validator::make($newArray,[
                    'name' => 'required|string|max:191',
                    'username' => 'required|string|max:191|unique:users',
                    'password' => 'required|string|min:6|max:191',
                    'phone' => 'nullable|string|size:10',
                ],[
                    'required'=>"必須填寫 :attribute 欄位,第 $errorLine 行",
                    'min'=>':attribute 欄位的輸入長度不能大於:min'.",第 $errorLine 行",
                    'max'=>':attribute 欄位的輸入長度不能大於:max'.",第 $errorLine 行",
                    'unique'=>"使用者帳號已申請, 第 $errorLine 行",
                    'size'=>':attribute 欄位的輸入長度要等於:size'.",第 $errorLine 行"
                ]
            );

            if($validator->fails()){
                return redirect('/admin/user_upload')
                    ->withErrors($validator);
            }

            array_push($insertArr, $newArray);
        }

        User::insert($insertArr);
        return redirect('/admin/user');
    }

    public function delete($id){
        User::where('id', $id)
            ->delete();
        return redirect('/admin/user');
    }
}
