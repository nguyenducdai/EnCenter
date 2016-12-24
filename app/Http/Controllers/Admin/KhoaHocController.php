<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\KhoaHocRequest;
use App\KhoaHoc;
use App\Http\Requests\UpdateRequest;

class KhoaHocController extends Controller
{
	public function Index()
	{
		$model = KhoaHoc::all()->toArray();
   		return view('Admin.KhoaHoc.index', compact('model'));
	}

	public function Create()
	{
		return view('Admin.KhoaHoc.create');
	}

	public function DCreate(KhoaHocRequest $request )
	{
		$kh = new KhoaHoc;
		$data = $request->all();
    	$kh->title = $data['txtName'];
    	$kh->descaption = $data['txtDescation'];
    	$kh->content = $data['txtContent'];
    	$kh->price = $data['txtPrice']; //str_replace('.','',
    	$kh->sohocvien = $data['txtNumb'];
    	$kh->status = 0;
    	$path = "upload";
        $img= $request->file('txtFile');
        $image = $img->getClientOriginalName();
        $kh->image = $image;
        $img->move($path,$image);
    	$kh->save();
		return  redirect()->back()->with(['msg'=>'Thêm thanh thành công']);
	}

	public function Del($id)
	{
		$KhoaHoc = KhoaHoc::find($id);
		$path = "upload/".$KhoaHoc['image'];

		if(file_exists($path)){
			unlink($path);
		}
      
		$KhoaHoc->delete($id);

		return  redirect()->back()->with(['msg'=>'xóa thành công']);
	}

	public function Edit($id)
	{
		$model = KhoaHoc::find($id);
		return view('Admin.KhoaHoc.edit',compact('model','id'));
	}

	public function DEdit(UpdateRequest $request ,$id)
	{
		$kh = KhoaHoc::find($id);
		$data = $request->all();
    	$kh->title = $data['txtName'];
    	$kh->descaption = $data['txtDescation'];
    	$kh->content = $data['txtContent'];
    	$kh->price = $data['txtPrice']; //str_replace('.','',
    	$kh->sohocvien = $data['txtNumb'];
    	$kh->status = $data['slStatus'];
    	 $img= $request->file('txtFile');
    	if($img !=null){
	    	$path = "upload/".$kh['image'];
			if(file_exists($path)){
				unlink($path);
			}
			$kh->delete($id);
			$path = "upload";
	        $image = $img->getClientOriginalName();
	        $kh->image = $image;
	        $img->move($path,$image);
	      
    	}else{
    		 $kh->image = $kh['image'];
    	}
    	  $kh->save();
		return  redirect()->back()->with(['msg'=>'chỉnh sửa thành công']);
	}

	public function Detail($id)
	{
		$model = KhoaHoc::find($id);
		return view('Admin.KhoaHoc.detail',compact('model'));
	}
}
