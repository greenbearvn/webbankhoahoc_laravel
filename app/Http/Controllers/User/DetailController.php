<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function detail($id)
    {
        $khoahoc = DB::table('KhoaHoc')
            ->join('danhmuc', 'KhoaHoc.MaDanhMuc', '=', 'danhmuc.madm')
            ->join('giangvien', 'KhoaHoc.MaGiangVien', '=', 'giangvien.MaGiangVien')
            ->join('capdo', 'KhoaHoc.MaCapDo', '=', 'capdo.MaCapDo')
            ->select('id', 'TenKhoaHoc', 'AnhKhoaHoc', 'MoTaNgan', 'MoTaDayDu', 'ThoiGian', 'LuotXem', 'ThoiLuongKhoaHoc', 'GiaCu', 'GiamGia', 'GiaMoi', 'TrangThai', 'danhmuc.madm','danhmuc.tendm', 'giangvien.MaGiangVien', 'giangvien.TenGiangVien','capdo.MaCapDo', 'capdo.TenCapDo')
            ->where('KhoaHoc.id', $id)
            ->first();
        
            
       $danhmucs = DB::table('danhmuc')
       ->select('madm','tendm','anhdm')
       ->orderBy('madm', 'DESC')
       ->get();

       $giangvien = DB::table('KhoaHoc')
       ->join('giangvien', 'KhoaHoc.MaGiangVien', '=', 'giangvien.MaGiangVien')
       ->join('danhmuc', 'giangvien.MaDanhMuc', '=', 'danhmuc.madm')
       ->select('giangvien.MaGiangVien','giangvien.TenGiangVien','giangvien.Email','giangvien.SoDienThoai','giangvien.AnhDaiDien','giangvien.MoTa','giangvien.MaDanhMuc','danhmuc.tendm')
       ->where('KhoaHoc.id', $id)
        ->first();

       $binhluans = DB::table('binhluan')
            ->join('khoahoc', 'binhluan.MaKhoaHoc', '=', 'KhoaHoc.id')
            ->join('nguoidung', 'binhluan.MaNguoiDung', '=', 'nguoidung.MaNguoiDung')
            ->select('MaBinhLuan', 'binhluan.MaKhoaHoc', 'KhoaHoc.TenKhoaHoc','binhluan.MaNguoiDung', 'nguoidung.TenNguoiDung', 'NoiDung', 'binhluan.ThoiGian')
            ->where('binhluan.MaKhoaHoc', $id)
            ->orderBy('MaBinhLuan', 'desc')
            ->get();
        
        $baihocs = DB::table('baihoc')
            ->select('MaBaiHoc', 'MaKhoaHoc', 'TenBaiHoc', 'ThoiGianHoanThanh')
            ->where('baihoc.MaKhoaHoc', $id)
            ->get();

        return View('Front.Course.Detail', compact('khoahoc','danhmucs','binhluans','giangvien','baihocs'));


    }


    public function getVideo($id)
    {
        $videos = DB::table('video')
            ->select('MaVideo', 'MaBaiHoc', 'LinkVideo', 'ThoiLuongVideo','TinhTrang','TenVideo','NoiDungVideo')
            ->where('video.MaBaiHoc', $id)
            ->get();
        return response()->json($videos);
    }


    public function courseSameCategory($id)
    {
        $madm =  DB::table('KhoaHoc')
            ->select('MaDanhMuc')
            ->where('id', $id)
            ->first()
            ->MaDanhMuc;
        
        $khoahocs = DB::table('KhoaHoc')
            ->join('danhmuc', 'KhoaHoc.MaDanhMuc', '=', 'danhmuc.madm')
            ->join('giangvien', 'KhoaHoc.MaGiangVien', '=', 'giangvien.MaGiangVien')
            ->join('capdo', 'KhoaHoc.MaCapDo', '=', 'capdo.MaCapDo')
            ->select('id', 'TenKhoaHoc', 'AnhKhoaHoc', 'MoTaNgan', 'MoTaDayDu', 'ThoiGian', 'LuotXem', 'ThoiLuongKhoaHoc', 'GiaCu', 'GiamGia', 'GiaMoi', 'TrangThai', 'danhmuc.madm','danhmuc.tendm', 'giangvien.MaGiangVien', 'giangvien.TenGiangVien','capdo.MaCapDo', 'capdo.TenCapDo')
            ->where('KhoaHoc.MaDanhMuc', $madm)
            ->take(6)
            ->get();
        
        return response()->json($khoahocs);
    }

    public function createComment(Request $request)
    {
        $request->validate([
            "MaKhoaHoc" => 'required',
            "MaNguoiDung" => 'required',
            "NoiDung" => 'required',
            "ThoiGian" => 'required',
        ]);

        $makh = $request->input('MaKhoaHoc');

        $binhluan = $request->all();
        $time = $request->input('ThoiGian');
        $date = Carbon::parse($time);
        $binhluan['ThoiGian'] = $date->format('Y/m/d');
        binhluan::create($binhluan);

        return redirect('course/detail/'.$makh);
    }

    

}
