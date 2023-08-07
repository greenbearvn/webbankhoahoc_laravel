<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FavouritesController extends Controller
{
    public function Detail($id){

        $courses = DB::table('chitietbst')
        ->join('KhoaHoc', 'KhoaHoc.id', '=', 'chitietbst.MaKhoaHoc')
        ->join('bosuutap','bosuutap.MaBST','=','chitietbst.MaBST')
        ->select('KhoaHoc.id','KhoaHoc.TenKhoaHoc')
        ->where('bosuutap.MaNguoiDung',$id)
        ->orderBy('KhoaHoc.id', 'DESC')
        ->get();

        

       return View('Front.Favourite.Detail',compact('courses'));
    }


    public function getBaiHoc($id){

        $baihocs = DB::table('baihoc')
            ->select('MaBaiHoc', 'MaKhoaHoc', 'TenBaiHoc', 'ThoiGianHoanThanh')
            ->where('baihoc.MaKhoaHoc', $id)
            ->get();

            return response()->json($baihocs);
    }



}
