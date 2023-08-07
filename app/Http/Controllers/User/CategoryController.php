<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function getProductByCategory($id)   
    {
        $khoahocs = DB::table('KhoaHoc')
            ->join('danhmuc', 'KhoaHoc.MaDanhMuc', '=', 'danhmuc.madm')
            ->join('giangvien', 'KhoaHoc.MaGiangVien', '=', 'giangvien.MaGiangVien')
            ->join('capdo', 'KhoaHoc.MaCapDo', '=', 'capdo.MaCapDo')
            ->select('id', 'TenKhoaHoc', 'AnhKhoaHoc', 'MoTaNgan', 'MoTaDayDu', 'ThoiGian', 'LuotXem', 'ThoiLuongKhoaHoc', 'GiaCu', 'GiamGia', 'GiaMoi', 'TrangThai', 'danhmuc.madm','danhmuc.tendm', 'giangvien.MaGiangVien','giangvien.AnhDaiDien', 'giangvien.TenGiangVien','capdo.MaCapDo', 'capdo.TenCapDo')
            ->where('KhoaHoc.MaDanhMuc', $id)
            ->paginate(10);

        $count = DB::table('KhoaHoc')
            ->where('KhoaHoc.MaDanhMuc', $id)
            ->count();

        $danhmucs = DB::table('danhmuc')
            ->orderBy('madm', 'DESC')
            ->get();

        $categories = DB::table('danhmuc')
        ->select('madm','tendm','anhdm')
        ->get();

        $danhmuc = DB::table('danhmuc')
            ->select('madm','tendm','anhdm')
            ->where('madm', $id)
            ->first();
        
        $giangviens = DB::table('giangvien')
            ->select("MaGiangVien",
            "TenGiangVien",
            "Email",
            "SoDienThoai",
            "AnhDaiDien",
            "MoTa",
            "MaDanhMuc")
            ->get();

        $capdos = DB::table('capdo')
            ->select( "MaCapDo",
            "TenCapDo")
            ->get();

        

        return View('Front.Course.Category', compact('khoahocs','danhmucs','danhmuc','count','categories','giangviens','capdos'));
    }

    

    public function getCategory()
    {
        $khoahoc = DB::table('danhmuc')
            ->select('madm', 'tendm', 'anhdm')
            ->get();
        return View('course.KhoaHoc.edit', compact('khoahoc'));
    }

    public function getTeacher()
    {
        $giangviens = DB::table('giangvien')
            ->select('MaGiangVien',
            'TenGiangVien',
            'Email',
            'SoDienThoai',
            'AnhDaiDien',
            'MoTa',
            'MaDanhMuc')
            ->get();
        return View('course.KhoaHoc.edit', compact('giangviens'));
    }

    public function getLevels()
    {
        $levels = DB::table('capdo')
            ->select('MaGiangVien',
            'TenGiangVien',
            'Email',
            'SoDienThoai',
            'AnhDaiDien',
            'MoTa',
            'MaDanhMuc')
            ->get();
        return View('course.KhoaHoc.edit', compact('giangviens'));
    }

    public function search(Request $request, $id)
    {
        $search = $request->input('search');

        $validatedData = $request->validate([
            'search' => 'required',
        ]);

        $khoahocs = DB::table('KhoaHoc')
            ->join('danhmuc', 'KhoaHoc.MaDanhMuc', '=', 'danhmuc.madm')
            ->join('giangvien', 'KhoaHoc.MaGiangVien', '=', 'giangvien.MaGiangVien')
            ->join('capdo', 'KhoaHoc.MaCapDo', '=', 'capdo.MaCapDo')
            ->select('id', 'TenKhoaHoc', 'AnhKhoaHoc', 'MoTaNgan', 'MoTaDayDu', 'ThoiGian', 'LuotXem', 'ThoiLuongKhoaHoc', 'GiaCu', 'GiamGia', 'GiaMoi', 'TrangThai', 'danhmuc.madm', 'danhmuc.tendm', 'giangvien.MaGiangVien', 'giangvien.AnhDaiDien', 'giangvien.TenGiangVien', 'capdo.MaCapDo', 'capdo.TenCapDo')
            ->where('KhoaHoc.MaDanhMuc', $id)
            ->where('TenKhoaHoc', 'LIKE', "%{$search}%")
            ->paginate(10);


        $count = DB::table('KhoaHoc')
        ->where('KhoaHoc.MaDanhMuc', $id)
        ->where('TenKhoaHoc', 'LIKE', "%{$search}%")
        ->count();
        
        $danhmucs = DB::table('danhmuc')
            ->orderBy('madm', 'DESC')
            ->get();

        $categories = DB::table('danhmuc')
            ->select('madm', 'tendm', 'anhdm')
            ->get();

        $danhmuc = DB::table('danhmuc')
            ->select('madm', 'tendm', 'anhdm')
            ->where('madm', $id)
            ->first();

        $giangviens = DB::table('giangvien')
            ->select('MaGiangVien', 'TenGiangVien', 'Email', 'SoDienThoai', 'AnhDaiDien', 'MoTa', 'MaDanhMuc')
            ->get();

        $capdos = DB::table('capdo')
            ->select('MaCapDo', 'TenCapDo')
            ->get();


        return view('Front.Course.Category', compact('khoahocs','danhmucs','danhmuc','count','categories','giangviens','capdos'));
    }


    public function fillTeacher($id)
    {
        $khoahocs = DB::table('KhoaHoc')
            ->join('danhmuc', 'KhoaHoc.MaDanhMuc', '=', 'danhmuc.madm')
            ->join('giangvien', 'KhoaHoc.MaGiangVien', '=', 'giangvien.MaGiangVien')
            ->join('capdo', 'KhoaHoc.MaCapDo', '=', 'capdo.MaCapDo')
            ->select('id', 'TenKhoaHoc', 'AnhKhoaHoc', 'MoTaNgan', 'MoTaDayDu', 'ThoiGian', 'LuotXem', 'ThoiLuongKhoaHoc', 'GiaCu', 'GiamGia', 'GiaMoi', 'TrangThai', 'danhmuc.madm','danhmuc.tendm', 'giangvien.MaGiangVien','giangvien.AnhDaiDien', 'giangvien.TenGiangVien','capdo.MaCapDo', 'capdo.TenCapDo')
            ->where('KhoaHoc.MaGiangVien', $id)
            ->paginate(10);

        $count = DB::table('KhoaHoc')
            ->where('KhoaHoc.MaGiangVien', $id)
            ->count();

        $danhmucs = DB::table('danhmuc')
            ->orderBy('madm', 'DESC')
            ->get();

        $categories = DB::table('danhmuc')
        ->select('madm','tendm','anhdm')
        ->get();

        $danhmuc = DB::table('danhmuc')
            ->select('madm','tendm','anhdm')
            ->where('madm', $id)
            ->first();
        
        $giangviens = DB::table('giangvien')
            ->select("MaGiangVien",
            "TenGiangVien",
            "Email",
            "SoDienThoai",
            "AnhDaiDien",
            "MoTa",
            "MaDanhMuc")
            ->get();

        $capdos = DB::table('capdo')
            ->select( "MaCapDo",
            "TenCapDo")
            ->get();

        

        return View('Front.Course.Category', compact('khoahocs','danhmucs','danhmuc','count','categories','giangviens','capdos'));
    }

}
