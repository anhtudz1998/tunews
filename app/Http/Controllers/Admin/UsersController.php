<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
class UsersController extends Controller
{
    public function getList(){
    	$user= User::get();
        return view('admin/user/list',['user'=>$user]);
    }
    public function getAdd(){
        return view('admin/user/add');
    }
    public function postAdd(Request $request){

        $this->validate($request,[
            'email'=>'required|min:3|max:100|unique:users',
        ],
        [
            'email.unique'=>'Email đã tồn tại',
            'email.email'=>'Bạn hãy nhập đúng định dạng email',
            'email.required'=>'Email không được để trống',
            'email.min'=>'Email phải có độ dài từ 3 đến 100 kí tự',
            'email.max'=>'Email phải có độ dài từ 3 đến 100 kí tự'
        ]);

        $user = new User();
        $user->name= $request->name;
        $user->email= $request->email;
        $user->password= bcrypt($request->password);
        $user->quyen= $request->quyen;

        $user->save();
        return redirect('admin/user/add')->with('thongbao','Bạn đã thêm thành công');
    }
    public function getDel($id){
        User::where('id',$id)->delete();
        return redirect('admin/user/list')->with('thongbao','Bạn đã xóa thành công');
    }
    public function getEdit($id){
        $user= User::find($id);
        return view('admin/user/edit',['user'=>$user]);
    }
    public function postEdit(Request $request,$id){
        
        $this->validate($request,[
            'email'=>'required|min:3|max:100|unique:users',
        ],
        [
            'email.unique'=>'Email đã tồn tại',
            'email.email'=>'Bạn hãy nhập đúng định dạng email',
            'email.required'=>'Email không được để trống',
            'email.min'=>'Email phải có độ dài từ 3 đến 100 kí tự',
            'email.max'=>'Email phải có độ dài từ 3 đến 100 kí tự'
        ]);

        $user = User::find($id);
        $user->name= $request->name;
        $user->email= $request->email;
        $user->quyen= $request->quyen;
        $user->password= bcrypt($request->password);
        $user->save();
        return redirect('admin/user/edit/'.$user->id)->with('thongbao','Bạn đã sửa thành công');
    }
    public function home(){
        return view('admin.home');
    }
    public function getLogin(){
        return view('admin.login');
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
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'quyen'=>1])){
            return redirect('/admin/home');
        }else{
            return back()->with('thongbao','Sai mật khẩu hoặc tài khoản');
        }
    }
    public function getLogout(){
        Auth::logout();
        return redirect('home');
    }
    
}
