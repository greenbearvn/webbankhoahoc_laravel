<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LessionController extends Controller
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

        $baihocs = DB::table('baihoc')
            ->join('KhoaHoc', 'baihoc.MaKhoaHoc', '=', 'KhoaHoc.id')
            ->select('MaBaiHoc', 'baihoc.MaKhoaHoc','KhoaHoc.TenKhoaHoc', 'TenBaiHoc', 'ThoiGianHoanThanh')
            ->where('baihoc.MaKhoaHoc', $id)
            ->get();
        return View('Front.Lession.lessions', compact('khoahoc','danhmucs','baihocs'));
    }

    
    public function getVideo($id)
    {
        $videos = DB::table('video')
            ->join('baihoc', 'video.MaBaiHoc', '=', 'baihoc.MaBaiHoc')
            ->select('MaVideo', 'video.MaBaiHoc','baihoc.TenBaiHoc', 'LinkVideo', 'ThoiLuongVideo','TinhTrang','TenVideo','NoiDungVideo')
            ->where('video.MaBaiHoc', $id)
            ->get();
        return response()->json($videos);
    }

    public function getDetailVideo($id)
    {
        $video = DB::table('video')
            ->join('baihoc', 'video.MaBaiHoc', '=', 'baihoc.MaBaiHoc')
            ->select('MaVideo', 'video.MaBaiHoc','baihoc.TenBaiHoc', 'LinkVideo', 'ThoiLuongVideo','TinhTrang','TenVideo','NoiDungVideo')
            ->where('video.MaVideo', $id)
            ->first();
        return response()->json($video);
    }

    public function search(Request $request, $id)
    {
        $search = $request->input('search');

        $validatedData = $request->validate([
            'search' => 'required',
        ]);

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

        $baihocs = DB::table('baihoc')
            ->join('KhoaHoc', 'baihoc.MaKhoaHoc', '=', 'KhoaHoc.id')
            ->select('MaBaiHoc', 'baihoc.MaKhoaHoc','KhoaHoc.TenKhoaHoc', 'TenBaiHoc', 'ThoiGianHoanThanh')
            ->where('baihoc.MaKhoaHoc', $id)
            ->where('TenBaiHoc', 'LIKE', "%{$search}%")
            ->get();


        return view('Front.Lession.lessions',  compact('khoahoc','danhmucs','baihocs'));
    }


}
