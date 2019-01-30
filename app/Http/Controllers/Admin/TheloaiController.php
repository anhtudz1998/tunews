<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TheLoai;
class TheloaiController extends Controller
{
    public function getList(){
    	$theloai= TheLoai::all();
    	return view('admin.theloai.list',['theloai'=>$theloai]);
    }public function getAdd(){
    	return view ('admin.theloai.add');
    }
    public function postAdd(Request $request){

    	$this->validate($request,[
    		'Ten'=>'required|min:3|max:100|unique:TheLoai',
    	],
    	[
            'Ten.unique'=>'Thể loại đã tồn tại',
    		'Ten.required'=>'Bạn hãy nhập vào tên thể lọai',
    		'Ten.min'=>'Tên phải có độ dài từ 3 đến 100 kí tự',
    		'Ten.max'=>'Tên phải có độ dài từ 3 đến 100 kí tự'
    	]);

    	$theloai = new TheLoai();
    	$theloai->Ten= $request->Ten;
    	$theloai->TenKhongDau=str_slug($request->Ten);
    	$theloai->save();
    	return redirect('admin/theloai/add')->with('thongbao','Bạn đã thêm thành công');

    }
    public function getEdit($id){
    	$theloai= TheLoai::find($id);
    	return view('admin.theloai.edit',['theloai'=>$theloai]);
    }
    public function postEdit(Request $request,$id){

    	$theloai= TheLoai::find($id);
    	$this->validate($request,[
    		'Ten'=>'required|unique:TheLoai,Ten|min:3|max:100',
    	],
    	[
    		'Ten.unique'=>'Thể loại đã tồn tại',
    		'Ten.required'=>'Bạn hãy nhập vào tên thể lọai',
    		'Ten.min'=>'Tên phải có độ dài từ 3 đến 100 kí tự',
    		'Ten.max'=>'Tên phải có độ dài từ 3 đến 100 kí tự'
    	]);
    	
    	$theloai->Ten= $request->Ten;
    	$theloai->TenKhongDau=str_slug($request->Ten);
    	$theloai->save();
    	return redirect('admin/theloai/edit/'.$theloai->id)->with('thongbao','Bạn đã sửa thành công');
    }
    public function getDel($id){
    	$theloai = TheLoai::find($id);
    	$theloai->delete();
    	return redirect('admin/theloai/list')->with('thongbao','Đã xóa thành công');
    }

}
