<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\DanhMuc;
use App\Http\Requests\AddNewRequest;
use App\Http\Requests\updateNewRequest;
class NewsController extends Controller
{
    public function Index()
    {
    	$model =  News::all()->toArray();
    	return view('Admin.News.index', compact('model'));
    }


    public function Add()
    {
    	$danhmuc = DanhMuc::where('parent_id','=',0)->get();
    	//var_dump($danhmuc);
    	return view('Admin.News.create',compact('danhmuc'));
    }

    public function DAdd(AddNewRequest $request)
    {
        $new = new News;
        $data = $request->all();
        
        $new->Title = $data['txtName'];
        $new->Descation = $data['txtDescaption'];
        $new->Content = $data['txtContent'];
        $new->danhmuc_id = $data['txtDanhMuc'];
        $new->Status = 0;

        $new->MetaTitle = $data['txtMetaTitle'];
        $new->MetaDescation = $data['txtMetaDescation'];
        $new->MetaKeyword = $data['txtMetaKey'];

        $path = "upload";
        $img= $request->file('txtImage');
        $image = $img->getClientOriginalName();
        $new->Image = $image;
        $img->move($path,$image);

        $new ->save();

    	return redirect()->back()->with(['msg'=>'Thêm bài viết thành công']);
    }

    public function Del($id)
    {
       $new = News::find($id);
       if($new != null) {
            $path = "upload/".$new['Image'];
            if(file_exists($path)){
                unlink($path);
            }
            $new->delete($id);
       }
        return redirect()->route('cp.news.index')->with(['msg'=>'xóa bài viết thành công']);

    }

    public function Edit($id)
    {
        $model = News::find($id);
        $danhmuc = DanhMuc::where('parent_id','=',0)->get();

        return view('Admin.News.edit',compact(['model','danhmuc']));
    }

    public function DEdit(updateNewRequest $request, $id)
    {

        $data = $request->all();
        $new = News::find($id);
        $new->Title = $data['txtName'];
        $new->Descation = $data['txtDescaption'];
        $new->Content = $data['txtContent'];
        $new->danhmuc_id = $data['txtDanhMuc'];
        $new->Status = $data['txtStatus'];

        $new->MetaTitle = $data['txtMetaTitle'];
        $new->MetaDescation = $data['txtMetaDescation'];
        $new->MetaKeyword = $data['txtMetaKey'];

        $img= $request->file('txtImage');

        if($img != null){
           

            $path = "upload/".$new['Image'];
            if(file_exists($path)){
                unlink($path);
            }

            $path = "upload";
            $image = $img->getClientOriginalName();
            $new->Image = $image;
            $img->move($path,$image);
        }else{
             $new->Image =$new['Image'];
        }

        $new->save();
        return redirect()->route('cp.news.index')->with(['msg'=>'cập nhật bài viết thành công']);
    }
}
