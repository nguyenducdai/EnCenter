<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KhoaHoc;
use DB;
use App\Http\Requests\HocvienRequest;
use App\Hocvien;
use App\News;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        $model = DB::table("khoahoc")->orderby('id','DESC')->skip(0)->take(9)->get();
        $new = DB::table("tintuc")->orderby('id','DESC')->skip(0)->take(9)->get();
        return view('Site.Home.index',compact(['model','new']));
    }

    public function Detail($id)
    {
        $model = KhoaHoc::find($id);
        $new = DB::table("tintuc")->orderby('id','DESC')->skip(0)->take(10)->get();
        return view('Site.Home.Detail',compact(['model','new']));
       
    }

    public function Register(HocvienRequest $request ,$id)
    {
        $hv = new Hocvien;
        $data = $request->all();
        $hv->name = $data['txtName'];
        $hv->email = Auth::user()->email;
        $hv->address = $data['txtEdress'];
        $hv->phone = $data['txtPhone'];
        $hv->date = date('Y-m-d',strtotime($data['txtDate']));
        $hv->job = $data['txtCaree'];
        $hv->note = $data['txtNote'];
        $hv->idKhoahoc = $id;
        $hv->save();
       return redirect()->back()->with(['msg'=>'Đăng ký thành công']);
    }

    public function ArchiveKh()
    {
        $model = KhoaHoc::paginate(1);
        $new = DB::table("tintuc")->orderby('id','DESC')->skip(0)->take(10)->get();
        return view('Site.Home.archive',compact(['model','new']));
    }

    public function DetailNew($id)
    {
        $model = News::find($id);
        return view('Site.New.Detail',compact('model'));
    }
}
