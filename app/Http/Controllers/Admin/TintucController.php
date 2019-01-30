<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LoaiTin;
use App\TheLoai;
use App\TinTuc;

class TintucController extends Controller
{
    public function getList(){
    	

    	$tintuc=TinTuc::join('loaitin','tintuc.idLoaiTin','=','loaitin.id')
    	->join('theloai','loaitin.idTheLoai','=','theloai.id')
    	->select('tintuc.*','loaitin.Ten as TenLoaiTin','theloai.Ten as TenTheLoai')->get();
    	return view('admin.tintuc.list',['tintuc'=>$tintuc]);
           
    }
    public function getDel($id){
    	$tintuc = TinTuc::find($id);
    	$tintuc->delete();
    	return redirect('admin/tintuc/list')->with('thongbao','Đã xóa thành công');
    }

  
    public function getAdd(){
    	$loaitin = LoaiTin::all();
    	$theloai = TheLoai::all();
    	return view('admin.tintuc.add',['loaitin'=>$loaitin,'theloai'=>$theloai]);
    }
    public function postAdd(Request $request){
        $this->validate($request,[
            'LoaiTin'=>'required',
            'TieuDe'=>'required|min:3|max:100|unique:TinTuc,TieuDe',
            'TomTat'=>'required',
            'NoiDung'=>'required',
            'Hinh'=>'required'

        ],
        [
            'LoaiTin.required'=>'Loại tin không được để trống',
            'TieuDe.min'=>'Tiêu đề phải từ 3 đến 100 kí tự',
            'TieuDe.max'=>'Tiêu đề phải từ 3 đến 100 kí tự',
            'TieuDe.required'=>'Tiêu đề không được để trống',
            'TomTat.required'=>'Tóm tắt không được để trống',
            'NoiDung.required'=>'Nội dung không được để trống',
            'Hinh.required'=>'Hinh không được để trống',
        ]);
        $tintuc = new TinTuc();
        $tintuc->idLoaiTin=$request->LoaiTin;
        $tintuc->TieuDe=$request->TieuDe;
        $tintuc->TieuDeKhongDau=str_slug($request->TieuDe);
        $tintuc->TomTat=$request->TomTat;
        $tintuc->NoiDung=$request->NoiDung;
        if($request->hasFile('Hinh')){
            $file=$request->file('Hinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi!="jpg"&&$duoi!="jpeg"&&$duoi!="png"){
                return redirect('admin/tintuc/add')->with('loi','Ban chi duoc tai file co duoi la png, jpg, jpeg');
            }
            $name= $file->getClientOriginalName();
            $Hinh= str_random(4).'_'.$name;
            while (file_exists("upload/tintuc/".$Hinh)) {
                $Hinh= str_random(4).'_'.$name;
               
            }
            $file->move("upload/tintuc",$Hinh);
            // Dùng để lưu hình
            $tintuc->Hinh=$Hinh;
        }
        else{
            $tintuc->Hinh="";
        }
        $tintuc->soluotxem=0;
        $tintuc->noibat=$request->NoiBat;
        $tintuc->save();
        return redirect('admin/tintuc/add')->with('thongbao','Bạn đã thêm tin tức thành công');
    }
    public function getEdit($id){
        $theloai= new TheLoai();
        $loaitin = new LoaiTin();
        $tintuc= TinTuc::join('loaitin','tintuc.idLoaiTin','=','loaitin.id')
        ->join('theloai','loaitin.idTheLoai','=','theloai.id')
        ->select('tintuc.*','loaitin.Ten as TenLoaiTin','theloai.Ten as TenTheLoai','theloai.id as idTheLoai')->where('tintuc.id',$id)->first();
        return view('admin/tintuc/edit',['tintuc'=>$tintuc,'theloai'=>$theloai,'loaitin'=>$loaitin]);

    }
    public function postEdit(Request $request,$id){
       $tintuc= TinTuc::find($id);
       $this->validate($request,[
            'LoaiTin'=>'required',
            'TieuDe'=>'required|min:3|max:100|unique:TinTuc',
            'TomTat'=>'required',
            'NoiDung'=>'required',
            'Hinh'=>'required'

        ],
        [
            'LoaiTin.required'=>'Loại tin không được để trống',
            'TieuDe.min'=>'Tiêu đề phải từ 3 đến 100 kí tự',
            'TieuDe.max'=>'Tiêu đề phải từ 3 đến 100 kí tự',
            'TieuDe.required'=>'Tiêu đề không được để trống',
            'TomTat.required'=>'Tóm tắt không được để trống',
            'NoiDung.required'=>'Nội dung không được để trống',
            'Hinh.required'=>'Hình không được để trống'
        ]);
        $tintuc->idLoaiTin=$request->LoaiTin;
        $tintuc->TieuDe=$request->TieuDe;
        $tintuc->TieuDeKhongDau=str_slug($request->TieuDe);
        $tintuc->TomTat=$request->TomTat;
        $tintuc->NoiDung=$request->NoiDung;
        if($request->hasFile('Hinh')){
            $file=$request->file('Hinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi!="jpg"&&$duoi!="jpeg"&&$duoi!="png"){
                return redirect('admin/tintuc/add')->with('loi','Ban chi duoc tai file co duoi la png, jpg, jpeg');
            }
            $name= $file->getClientOriginalName();
            $Hinh= str_random(4).'_'.$name;
            while (file_exists("upload/tintuc/".$Hinh)) {
                $Hinh= str_random(4).'_'.$name;
               
            }
            $file->move("upload/tintuc",$Hinh);
            // Dùng để lưu hình
            $tintuc->Hinh=$Hinh;
        }
        else{
            $tintuc->Hinh="";
        }
        $tintuc->soluotxem=0;
        $tintuc->noibat=$request->NoiBat;
        $tintuc->save();
        return redirect('admin/tintuc/edit/'.$tintuc->id)->with('thongbao','Bạn đã sửa tin tức thành công');

    }   
}
