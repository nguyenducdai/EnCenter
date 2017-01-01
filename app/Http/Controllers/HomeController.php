<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KhoaHoc;
use DB;
use App\Http\Requests\HocvienRequest;
use App\Http\Requests\CNRequest;
use App\Hocvien;
use App\News;
use App\Slide;
use Auth;
use App\CamNhan;
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
        $slide = DB::table("slide")->where('status',0)->orderby('id','DESC')->take(1)->first();
          $slides = DB::table("slide")->where('status',0)->where('id','<>',$slide->id)->orderby('id','DESC')->get();
        $cn = CamNhan::orderby('id','DESC')->take(3)->get();
      
        return view('Site.Home.index',compact(['model','new','slide','slides','cn']));
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
        $model = KhoaHoc::paginate(5);
        $new = DB::table("tintuc")->orderby('id','DESC')->skip(0)->take(10)->get();
        return view('Site.Home.archive',compact(['model','new']));
    }

    public function Archive()
    {
        $model = News::paginate(5);
        $model1 = KhoaHoc::orderby('id','DESC')->take(10)->get();
        return view('Site.New.archive',compact(['model','model1']));
    }

    public function DetailNew($id)
    {
        $model = News::find($id);
        $new = DB::table("tintuc")->where('id' ,'<>',$id)->orderby('id','DESC')->skip(0)->take(10)->get();
        return view('Site.New.Detail',compact(['model','new']));
    }

    public function LienHe()
    {
        return view('Site.Home.lienhe');
    }

    public function GioiThieu()
    {
        return view('Site.Home.gioithieu');
    }

    public function Profile()
    {
        $model = array();
        $hv = Hocvien::where('email', Auth::user()->email)->get();
        foreach ($hv as $key ) {
            $model[]= KhoaHoc::where('id',$key->idKhoahoc)->get();
        }
        return view('Site.Profile.profile',compact('model'));
    }

    public function Del($idU,$idK)
    {
        $hv = Hocvien::where('id','=',$idU)->where('idKhoahoc','=',$idK);
        $hv->delete([$idU,$idK]);
        return redirect()->back()->with(['msg'=>'hủy khóa thành công']);
    }

    public function PCN(CNRequest $request)
    {
        $cn = new CamNhan;
        $cn->Noidung= $request->txtContent;
        $cn->idHocVien= Auth::user()->id;
        $cn->save();
        return redirect()->back()->with(['msg'=>'đăng thành công']);
       
    }


}
