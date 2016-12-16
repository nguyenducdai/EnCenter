<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Danhmuc;
use App\Http\Requests\AddCatRequest;
use DB;

class DanhmucController extends Controller
{
    

    public function Index()
    {
    	$model = Danhmuc::all()->toArray();
   		return view('Admin.Danhmuc.index', compact('model'));
    }

    public function Add(){
    	$model = DB::table('danhmuc')->where('parent_id',0)->get();
    	return view('Admin.Danhmuc.add' ,compact('model'));
    }

     public function Dadd(AddCatRequest $request){
     	$danhmuc =  new Danhmuc();
    	$data = $request->all();
    	$danhmuc->name = $data['txtName'];
    	$danhmuc->Descation = $data['txtDescation'];
    	$danhmuc->parent_id = $data['parent_id'];
    	$danhmuc->save();
    	return  redirect()->back()->with(['msg'=>'Thêm thanh thành công']);
     }

	  public function Del($id){
	    	$parent = Danhmuc::select('panrent_id')->where('parent_id', $id)->count();
		    if($parent ==0){
		      $del = Danhmuc::findOrFail($id);
		      $del->delete($id);
		       return  redirect()->route('cp.news.danhmuc')->with(['msg'=>'xóa dữ liệu thành công']);
		    }else{
		      echo "<script>
		        alert('oops ! không xóa được thư mục cha');
		        window.location='";
		        echo route('cp.news.danhmuc');
		      echo "'";
		      echo "</script>";
		    }
	    }


}
