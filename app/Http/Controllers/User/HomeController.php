<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KhoaHoc;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index(){

        $khoahocs = DB::table('KhoaHoc')
            ->join('danhmuc', 'KhoaHoc.MaDanhMuc', '=', 'danhmuc.madm')
            ->join('giangvien', 'KhoaHoc.MaGiangVien', '=', 'giangvien.MaGiangVien')
            ->join('capdo', 'KhoaHoc.MaCapDo', '=', 'capdo.MaCapDo')
            ->select('id', 'TenKhoaHoc', 'AnhKhoaHoc', 'MoTaNgan', 'MoTaDayDu', 'ThoiGian', 'LuotXem', 'ThoiLuongKhoaHoc', 'GiaCu', 'GiamGia', 'GiaMoi', 'TrangThai', 'danhmuc.madm','danhmuc.tendm', 'giangvien.MaGiangVien','giangvien.AnhDaiDien', 'giangvien.TenGiangVien', 'capdo.TenCapDo')
            ->orderBy('id', 'ASC')
            ->take(8)
            ->get();

        $giangviens = DB::table('giangvien')
            ->join('danhmuc','giangvien.MaGiangVien','=','danhmuc.madm')
            ->select( 
                'MaGiangVien',
                'TenGiangVien',
                'Email',
                'SoDienThoai',
                'AnhDaiDien',
                'MoTa',
                'danhmuc.tendm')
            ->orderBy('MaGiangVien', 'DESC')
            ->take(4)
            ->get();
        
         
        $categories = DB::table('danhmuc')
            ->select('madm','tendm','anhdm')
            ->orderBy('madm', 'DESC')
            ->take(4)
            ->get();

        $danhmucs = DB::table('danhmuc')
            ->select('madm','tendm','anhdm')
            ->orderBy('madm', 'DESC')
            ->get();
        

        return View('Front.Home.index', compact('khoahocs','danhmucs','giangviens','categories'));
        
    } 

    public function getCategoryNavbar(){
        $danhmucs = DB::table('danhmuc')
            ->select('madm','tendm','anhdm')
            ->orderBy('madm', 'DESC')
            ->get();
        return View('Front.Layouts.navbar', compact('danhmucs'));
    } 

}
