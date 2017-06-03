<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rule;

class RuleController extends Controller
{
    public function index(){
        $rule = Rule::find(1);
        return view('rule', $rule);
    }

    public function edit(){
        $rule = Rule::find(1);
        return view('admin.rule_edit', $rule);
    }

    public function update(Request $request){
        $rule = Rule::where('id', 1)
            ->update($request->except('_token'));
        return redirect('/rule');
    }
}
