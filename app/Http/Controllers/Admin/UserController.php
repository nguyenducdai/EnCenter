<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\UpdateuseRequest;

class UserController extends Controller
{
    public function Index(){
    	$model =  User::all()->toArray();
    	return view('Admin.User.index', compact('model'));
    }

    public function Del($id){
    	$model = User::find($id);
    	$model->delete($id);
    	return redirect()->route('cp.user.index')->with(['msg'=>'xóa thành công']);
    }

    public function Edit($id)
    {
    	$model =  User::find($id);
    	return view('Admin.User.edit', compact(['model','id']));
    }

    public function Pedit(UpdateuseRequest $request,$id)
    {
    	$user = User::find($id);
    	$post = array();
    	$data = $request->all();
    	$user->name = $data['txtName'];
    	$user->email = $data['txtMail'];
    	$user->password = $data['txtPass'];
    	$user->save();
    	return  redirect()->back()->with(['msg'=>'sửa thanh thành công']);
    }


}

