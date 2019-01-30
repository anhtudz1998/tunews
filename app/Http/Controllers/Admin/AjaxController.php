<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LoaiTin;
use App\TheLoai;
use App\TinTuc;
class AjaxController extends Controller
{
    
    	public function getLoaiTin($idTheLoai){
            $loaitin=LoaiTin::where('idTheLoai',$idTheLoai)->get();
            foreach ($loaitin as $lt) {
                $data_loaitin= "<option value='".$lt->id."'>".$lt->Ten."</option>";
            }
            echo $data_loaitin;
        }
}
