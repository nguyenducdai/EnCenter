<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slide;
use App\Http\Requests\SlideRequest;

class SlideController extends Controller
{
    public function Index()
    {
    	# code...
    	$model = Slide::paginate(10);
    	return View('Admin.Slide.index',compact('model'));
    }

    public function create()
    {
    	# code...
    	return View('Admin.Slide.create');

    }

     public function Dcreate(SlideRequest $request)
    {
    	# code...

    	$s = new Slide;
    	$data = $request->all();

        $path = "upload/slide";
        $img= $request->file('txtHinhAnh');
        $image = $img->getClientOriginalName();
        $s->HinhAnh = $image;
        $img->move($path,$image);
    	$s->status =  $data['txtStatus'];
    	$s->save();
    	return redirect()->back()->with(['msg'=>'Thêm hinh ảnh thành công']);;
    }

    public function Del($id)
    {
    	$s = Slide::find($id);
    	if($s != null){
    		$s->delete($id);
    		 $path = "upload/slide".$s['HinhAnh'];
            if(file_exists($path)){
                unlink($path);
            }
    	}
    	return redirect()->back()->with(['msg'=>'xóa thành công']);;
    	# code...
    }


	public function Edit($id)
    {
    	$model = Slide::find($id);
   		 return View('Admin.Slide.edit',compact('model'));
    }

    public function DEdit(Request $request,$id)
    {
    	$s = Slide::find($id);
    	$img= $request->file('txtHinhAnh');

        if($img != null){
            $path = "upload/slide".$s['HinhAnh'];
            if(file_exists($path)){
                unlink($path);
            }

            $path = "upload/slide";
            $image = $img->getClientOriginalName();
            $s->HinhAnh = $image;
            $img->move($path,$image);
        }else{
             $s->HinhAnh =$s['HinhAnh'];
        }

        $s->status = $request->txtStatus;
        $s->save();
        return  redirect()->route('cp.slide.index')->with(['msg'=>'cập nhật thành công']); 
    }

}
