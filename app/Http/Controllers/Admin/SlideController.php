<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slide;


class SlideController extends Controller
{
    public function getList(){
    	$slide= Slide::get();
        return view('admin/slide/list',['slide'=>$slide]);
    }
    public function getDel($id){
        Slide::where('id', $id)->delete();
        return redirect('admin/slide/list')->with('thongbao','Đã xóa thành công');
    }
    public function getAdd(){
        return view('admin/slide/add');
    }
    public function postAdd(Request $request){
        $this->validate($request,[
            'Ten'=>'required|max:100|min:3|unique:Slide',
            'NoiDung'=>'required',
            'Hinh'=>'required',
            'link'=>'required'
        ],
        [
            
            'Ten.unique'=>'Tên đã tồn tại',
            'Ten.required'=>'Bạn hãy nhập tên ',
            'Ten.min'=>'Tên phải từ 3 đến 100 kí tự',
            'Ten.max'=>'Tên phải từ 3 đến 100 kí tự',
            'NoiDung.required'=>'Nội dung không được để trống',
            'Hinh.required'=>'Hình ảnh không được để trống',
            'link.required'=>'Link không được để trống'
        ]);
        $slide= new Slide();
        $slide->Ten= $request->Ten;
        $slide->NoiDung= $request->NoiDung;
        if($request->hasFile('Hinh')){
            $file= $request->file('Hinh');
            $duoi= $file->getClientOriginalExtension();
            if($duoi!='jpg'&&$duoi!='jpeg'&&$duoi!='jpeg'){
                return redirect('admin/slide/add')->with('loi','Bạn chỉ được nhập file có đuôi jpg, png , jpeg');
            }
            $name= $file->getClientOriginalName();
            $Hinh= str_random(4).'_'.$name;
            while (file_exists($Hinh)) {
                $Hinh= str_random(4).'_'.$name;
            }
            $file->move('upload/slide',$Hinh);
            $slide->Hinh=$Hinh;
        }else{
            dd('dfasfads');
            $slide->Hinh='';
        }        

        $slide->link= $request->link;
        $slide->save();
        return redirect('admin/slide/add')->with('thongbao','Bạn đã thêm thành công');

    }
    public function getEdit($id){
        $slide= Slide::find($id);
        return view('admin/slide/edit',['slide'=>$slide]);
    }
    public function postEdit(Request $request,$id){
        $slide= Slide::find($id);
        $this->validate($request,[
            'Ten'=>'required|max:100|min:3|unique:Slide',
            'NoiDung'=>'required',
            'link'=>'required'
        ],
        [
            
            'Ten.unique'=>'Tên đã tồn tại',
            'Ten.required'=>'Bạn hãy nhập tên ',
            'Ten.min'=>'Tên phải từ 3 đến 100 kí tự',
            'Ten.max'=>'Tên phải từ 3 đến 100 kí tự',
            'NoiDung.required'=>'Nội dung không được để trống',
            'link.required'=>'Link không được để trống'
        ]);
        $slide->Ten= $request->Ten;
        $slide->NoiDung= $request->NoiDung;
        if($request->hasFile('Hinh')){
            $file= $request->file('Hinh');
            $duoi= $file->getClientOriginalExtension();
            if($duoi!='jpg'&&$duoi!='jpeg'&&$duoi!='jpeg'){
                return redirect('admin/slide/add')->with('loi','Bạn chỉ được nhập file có đuôi jpg, png , jpeg');
            }
            $name= $file->getClientOriginalName();
            $Hinh= str_random(4).'_'.$name;
            while (file_exists($Hinh)) {
                $Hinh= str_random(4).'_'.$name;
            }
            unlink('upload/slide/'.$slide->Hinh);
            $file->move('upload/slide',$Hinh);
            $slide->Hinh=$Hinh;
        }else{
            dd('dfasfads');
            $slide->Hinh='';
        }        

        $slide->link= $request->link;
        $slide->save();
        return redirect('admin/slide/add')->with('thongbao','Bạn đã sửa thành công');
    }


}
