<?php

namespace App\Http\Controllers\Front;
use App\Theloai;
use App\Loaitin;
use App\Slide;
use App\Tintuc;
use App\Comment;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
    function __construct(){
    	$theloai = Theloai::get();
        $slide = Slide::get();
        $tintuc = Tintuc::get();
        view()->share('theloai',$theloai);
        view()->share('slide',$slide);
    	view()->share('tintuc',$tintuc);
        if(Auth::check()){
            view()->share('user',Auth::user());
        }
    }
    public function home(){
    	
    	return view('front.pages.home');
    }
    public function about(){
    	return view('front.pages.about');
    }
    public function contact(){
    	return view('front.pages.contact');
    }
    public function category($id){
            $loaitin = Loaitin::find($id);
            $tintuc = Tintuc::where('idLoaiTin',$id)->paginate(5);
        return view('front.pages.category',['loaitin'=>$loaitin,'tintuc'=>$tintuc]);
    }
    public function detail($id){
            $tintuc = Tintuc::find($id);
            $tinnoibat = Tintuc::where('NoiBat',1)->take(4)->get();
            $tinlienquan = Tintuc::where('idLoaiTin',$tintuc->idLoaiTin)->take(4)->get();
    	return view('front.pages.detail',['tintuc'=>$tintuc,'tinnoibat'=>$tinnoibat,'tinlienquan'=>$tinlienquan]);
    }
    public function getLogin(){
        return view('front.login.login');
    }
    public function postLogin(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:3|max:20',

        ],
        [
            'email.email'=>'Bạn phải nhập đúng định dạng email',
            'password.required'=>'Mật khẩu không được để trống',
            'email.required'=>'Email không được để trống',
            'password.min'=>'Mật khẩu phải từ 3 đến 20 kí tự',
            'password.max'=>'Mật khẩu phải từ 3 đến 20 kí tự'
        ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect('/home');
        }else{
            return back()->with('thongbao','Sai mật khẩu hoặc tài khoản');
        }
    }
    public function getLogout(){
        Auth::logout();
        return redirect('home');
    }


    public function getRegister(){
        return view('front.login.register');
    }
    public function getAccount(){
            return view('front.login.account');
        }
    public function postComment($id,Request $request){
        $idTinTuc=$id;
        $comment = new Comment();
        $tintuc = Tintuc::find($id);
        $comment->idTinTuc=$idTinTuc;
        $comment->idUser=Auth::user()->id;
        $comment->NoiDung=$request->comment;
        $comment->save();
        return redirect('detail/'.$id.'/'.$tintuc->TieuDeKhongDau.'.html')->with('thongbao','Bạn đã thêm bình luận thành công');
    }
    public function deleteComment($id,$idTinTuc){
        $tintuc = Tintuc::find($idTinTuc);
        $comment = Comment::find($id);
        $comment ->delete();
        return redirect('detail/'.$idTinTuc.'/'.$tintuc->TieuDeKhongDau.'.html')->with('thongbao2','Bạn đã xóa bình luận thành công');

    }
    public function postRegister(Request $request){

        $this->validate($request,[
            'name'=>'required|min:3|max:100',
            'email'=>'unique:users|required|email',
            'password'=>'required|min:3|max:20',
            'passwordAgain'=>'required|min:3|max:20'
        ],
        [
            'email.unique'=>'Email đã bị trùng',
            'name.required'=>'Tên không được để trống',
            'email.required'=>'Email không được để trống',
            'password.required'=>'Password không được để trống',
            'passwordAgain.required'=>'Password nhập lại không được để trống'
        ]);
        if($request->password!=$request->passwordAgain){
            return back()->with('thongbao3','Mật khẩu nhập lại chưa đúng');
        }else{
            $user= new User();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=$request->password;
            $user->quyen=0;
            $user->save();
            return redirect('/register')->with('thongbao4','Bạn đã đăng kí thành công');
        }
    }
    public function search(Request $request){
        $tukhoa=$request->search;
        $tintuc = Tintuc::where('TieuDe','like',"%$tukhoa%")->orWhere('TomTat','like','%$tukhoa%')->orWhere('NoiDung','like','%$tukhoa%')->take(30)->get();
        // return view('welcome');
        return view('front.pages.search',['tintuc'=>$tintuc,'tukhoa'=>$tukhoa]);
    }



}
