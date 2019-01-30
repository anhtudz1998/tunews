<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Loaitin;
use App\Theloai;
class LoaitinController extends Controller
{
   	public function getList(){

   		$loaitin= Loaitin::join('theloai','loaitin.idTheLoai','=','theloai.id')
            ->select('loaitin.*','theloai.Ten as TenTheLoai')->get();
         
   		return view('admin.loaitin.list',['loaitin'=>$loaitin]);

   	}
   	public function getDel($id){
   		Loaitin::where('id', $id)->delete();
   		return redirect('admin/loaitin/list')->with('thongbao','Đã xóa thành công');
   	}
   	public function getAdd(){
         $theloai= Theloai::all(); 
   		return view('admin.loaitin.add',['theloai'=>$theloai]);
   	}
      public function postAdd(Request $request){
         $this->validate($request,[
            'Ten'=>'required|min:3|max:100|unique:Loaitin'
         ],
         [
            'Ten.unique'=>'Loại tin đã tồn tại',
            'Ten.required'=>'Bạn hãy nhập tên loại tin',
            'Ten.min'=>'Tên loại tin phải từ 3 đến 100 kí tự',
            'Ten.max'=>'Tên loại tin phải từ 3 đến 100 kí tự'
         ]);
         $loaitin= new Loaitin();
         $loaitin->idTheLoai=$request->TheLoai;
         $loaitin->Ten= $request->Ten;
         $loaitin->TenKhongDau=str_slug($request->Ten);
         $loaitin->save();
         return redirect('admin/loaitin/add')->with('thongbao','Bạn đã thêm thành công');
      }
      public function getEdit($id){
         $loaitin = Loaitin::join('theloai','loaitin.idTheLoai','=','theloai.id')
            ->select('loaitin.*','theloai.Ten as TenTheLoai')->where('loaitin.id',$id)->first();
         

         return view('admin.loaitin.edit',['loaitin'=>$loaitin]);
      }
      public function postEdit(Request $request,$id){
         $loaitin= Loaitin::find($id);
         $this->validate($request,[
            'Ten'=>'required|min:3|max:100|unique:Loaitin'
         ],
         [
            'Ten.unique'=>'Loại tin đã tồn tại',
            'Ten.required'=>'Bạn hãy nhập tên loại tin',
            'Ten.min'=>'Tên loại tin phải từ 3 đến 100 kí tự',
            'Ten.max'=>'Tên loại tin phải từ 3 đến 100 kí tự'
         ]);
         $loaitin->idTheLoai=$request->TheLoai;
         $loaitin->Ten=$request->Ten;
         $loaitin->TenKhongDau=str_slug($request->Ten);
         $loaitin->save();
         return redirect('admin/loaitin/edit/'.$loaitin->id)->with('thongbao','Bạn đã sửa thành công');
      }
}
