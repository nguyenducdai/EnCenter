<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HocVien;
use App\KhoaHoc;
use DB;
use App\Http\Requests\CreateHocVienRequest;
use App\User;

class HocvienController extends Controller
{
    public function Index()
    {
    	$KhoaHoc = KhoaHoc::paginate(5);
    	return view('Admin.HocVien.index',compact('KhoaHoc'));
    }

    public function Del($id)
    {
    	$HocVien = HocVien::find($id);
    	
    	if($HocVien != null) {
   			$HocVien->delete($id);
    	}
    	return redirect()->back()->with(['msg'=>'xoa học viên thành công']);
    }

    public function Add()
    {
    	$KhoaHoc = KhoaHoc::all()->toArray();
    	return View('Admin.HocVien.create',compact('KhoaHoc'));
    }

    public function Dcreate(CreateHocVienRequest $request)
    {
			$hv = new HocVien;
			$data = $request->all();
			$hv->name = $data['txtName'];
			$hv->email = $data['txtEmail'];
			$hv->address = $data['txtAdress'];
			$hv->phone = $data['txtNumb'];
			$hv->date = date('Y-m-d',strtotime($data['txtDate']));
			$hv->job = $data['txtJob'];
			$hv->note = $data['txtNote'];
			$hv->idKhoahoc =$data['txtKhoaHoc'];
			$hv->save();

			$u = new User;
			$u->name =  $data['txtName'];
			$u->email = $data['txtEmail'];
			$u->password = bcrypt($data['txtEmail']);
			$u->save();
    	return redirect()->back()->with(['msg'=>'Thêm học viên thành công']);
    }
}
