<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\capdo;
use App\Models\giangvien;
use App\Models\danhmuc;
use App\Models\KhoaHoc;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class KhoaHocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $products = DB::table('KhoaHoc')
        ->join('danhmuc', 'KhoaHoc.MaDanhMuc', '=', 'danhmuc.madm')
        ->join('giangvien', 'KhoaHoc.MaGiangVien', '=', 'giangvien.MaGiangVien')
        ->join('capdo', 'KhoaHoc.MaCapDo', '=', 'capdo.MaCapDo')
        ->select('id', 'TenKhoaHoc', 'AnhKhoaHoc', 'MoTaNgan', 'MoTaDayDu', 'ThoiGian', 'LuotXem', 'ThoiLuongKhoaHoc', 'GiaCu', 'GiamGia', 'GiaMoi', 'TrangThai', 'danhmuc.madm','danhmuc.tendm', 'giangvien.MaGiangVien', 'giangvien.TenGiangVien','capdo.MaCapDo', 'capdo.TenCapDo')
        ->paginate(10);

        $user = Auth::user();
        if($user){
            if($user['role']==1){
                return view('Admin.KhoaHoc.index', ['products' => $products,'user' => $user]);
            }
            else{
                return view('Admin.NguoiDung.Login');
            }

            return view('Admin.KhoaHoc.index', ['products' => $products,'user' => $user]);
        }
        else{
            return view('Admin.NguoiDung.Login');
        }
        
        return view('Admin.KhoaHoc.index', ['products' => $products,'user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $capdos = capdo::all();
        $giangviens = giangvien::all();
        $danhmucs = danhmuc::all();
        return view('Admin.KhoaHoc.create', compact('capdos', 'giangviens', 'danhmucs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([           
            'TenKhoaHoc' => 'required',
            'AnhKhoaHoc' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'MoTaNgan' => 'required',
            'MoTaDayDu' => 'required',
            'ThoiGian' => 'required',
            'LuotXem' => 'required',
            'ThoiLuongKhoaHoc' => 'required',
            'GiaCu' => 'required',
            'GiamGia' => 'required',
            'TrangThai' => 'required',
            'MaCapDo' => 'required',
            'MaGiangVien' => 'required',
            'MaDanhMuc' => 'required',
        ]);
        
        $khoahoc = $request->only([
            "TenKhoaHoc",
            "AnhKhoaHoc",
            "MoTaNgan",
            "MoTaDayDu",
            "LuotXem",
            "ThoiLuongKhoaHoc",
            "GiaCu",
            "GiamGia",
            "TrangThai",
            "MaCapDo", 
            "MaGiangVien",
            "MaDanhMuc"
        ]);

        $oldDate = $request->input('ThoiGian');
        $giacu = $request->input('GiaCu');
        $giamgia = $request->input('GiamGia');
        $giamoi = $giacu - ($giacu * $giamgia / 100);
        $khoahoc['GiaMoi'] = $giamoi;

        $khoahoc['ThoiGian'] = $oldDate;
        
        if ($image = $request->file('AnhKhoaHoc')) {
            $destinationPath = 'images/khoahoc/';
            $profileImage = date('YmdHis').'.'.$image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $khoahoc['AnhKhoaHoc'] = $profileImage;
        }
        
        KhoaHoc::create($khoahoc);
        return redirect('admin/khoahoc/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = DB::table('KhoaHoc')
        ->join('danhmuc', 'KhoaHoc.MaDanhMuc', '=', 'danhmuc.madm')
        ->join('giangvien', 'KhoaHoc.MaGiangVien', '=', 'giangvien.MaGiangVien')
        ->join('capdo', 'KhoaHoc.MaCapDo', '=', 'capdo.MaCapDo')
        ->select('id', 'TenKhoaHoc', 'AnhKhoaHoc', 'MoTaNgan', 'MoTaDayDu', 'ThoiGian', 'LuotXem', 'ThoiLuongKhoaHoc', 'GiaCu', 'GiamGia', 'GiaMoi', 'TrangThai', 'danhmuc.madm','danhmuc.tendm', 'giangvien.MaGiangVien', 'giangvien.TenGiangVien','capdo.MaCapDo', 'capdo.TenCapDo')
        ->where('KhoaHoc.id',$id)
        ->first();

        $baihocs = DB::table('baihoc')
            ->join('KhoaHoc', 'BaiHoc.MaKhoaHoc', '=', 'KhoaHoc.id')
            ->select('MaBaiHoc',
            'MaKhoaHoc' ,
            'KhoaHoc.TenKhoaHoc',
            'TenBaiHoc' ,
            "ThoiGianHoanThanh" )
            ->where('baihoc.MaKhoaHoc', $id)
            ->get();

        $binhluans = DB::table('binhluan')
            ->join('KhoaHoc', 'binhluan.MaKhoaHoc', '=', 'KhoaHoc.id')
            ->join('nguoidung', 'binhluan.MaNguoiDung', '=', 'binhluan.MaNguoiDung')
            ->select('MaBinhLuan',
            'binhluan.MaKhoaHoc' ,
            'KhoaHoc.TenKhoaHoc',
            'binhluan.MaNguoiDung',
            'nguoidung.TenNguoiDung',
            'binhluan.NoiDung' ,
            "binhluan.ThoiGian" )
            ->where('binhluan.MaKhoaHoc', $id)
            ->get();
        
        
        return View('Admin.KhoaHoc.Detail', compact('product','baihocs', 'binhluans'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $capdos = capdo::all();
        $giangviens = giangvien::all();
        $danhmucs = danhmuc::all();
        
        $khoahoc = DB::table('KhoaHoc')
            ->join('danhmuc', 'KhoaHoc.MaDanhMuc', '=', 'danhmuc.madm')
            ->join('giangvien', 'KhoaHoc.MaGiangVien', '=', 'giangvien.MaGiangVien')
            ->join('capdo', 'KhoaHoc.MaCapDo', '=', 'capdo.MaCapDo')
            ->select('id', 'TenKhoaHoc', 'AnhKhoaHoc', 'MoTaNgan', 'MoTaDayDu', 'ThoiGian', 'LuotXem', 'ThoiLuongKhoaHoc', 'GiaCu', 'GiamGia', 'GiaMoi', 'TrangThai', 'danhmuc.madm','danhmuc.tendm', 'giangvien.MaGiangVien', 'giangvien.TenGiangVien','capdo.MaCapDo', 'capdo.TenCapDo')
            ->where('KhoaHoc.id', $id)
            ->first();

        // $khoahoc = KhoaHoc::find($id);

        return View('Admin.KhoaHoc.edit', compact('khoahoc','capdos', 'giangviens', 'danhmucs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([  
            'id' => 'required',         
            'TenKhoaHoc' => 'required',
            'AnhKhoaHoc' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'MoTaNgan' => 'required',
            'MoTaDayDu' => 'required',
            'ThoiGian' => 'required',
            'LuotXem' => 'required',
            'ThoiLuongKhoaHoc' => 'required',
            'GiaCu' => 'required',
            'GiamGia' => 'required',
            'TrangThai' => 'required',
            'MaCapDo' => 'required',
            'MaGiangVien' => 'required',
            'MaDanhMuc' => 'required',
        ]);

        $khoahoc = KhoaHoc::find($id);
        
        $khoahoc->id = $request->input('id');
        $khoahoc->TenKhoaHoc = $request->input('TenKhoaHoc');
        $khoahoc->MoTaNgan = $request->input('MoTaNgan');
        $khoahoc->MoTaDayDu = $request->input('MoTaDayDu');
        $khoahoc->ThoiGian = $request->input('ThoiGian');
        $khoahoc->LuotXem = $request->input('LuotXem');
        $khoahoc->ThoiLuongKhoaHoc = $request->input('ThoiLuongKhoaHoc');
        $khoahoc->GiaCu = $request->input('GiaCu');
        $khoahoc->GiamGia = $request->input('GiamGia');
        $khoahoc->TrangThai = $request->input('TrangThai');
        $khoahoc->MaCapDo = $request->input('MaCapDo');
        $khoahoc->MaGiangVien = $request->input('MaGiangVien');
        $khoahoc->MaDanhMuc = $request->input('MaDanhMuc');

        $giacu = $request->input('GiaCu');
        $giamgia = $request->input('GiamGia');
        $giamoi = $giacu - ($giacu * $giamgia / 100);
        $khoahoc->GiaMoi = $giamoi;

        if ($image = $request->file('AnhKhoaHoc')) {
            $destinationPath = 'images/khoahoc/';
            $profileImage = date('YmdHis').'.'.$image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $khoahoc->AnhKhoaHoc = $profileImage;
        }

        $khoahoc->save();

        return redirect('admin/khoahoc/index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $khoahoc = KhoaHoc::find($id);
        $khoahoc->delete();
        return redirect('admin/khoahoc/index');
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->input('search');
        $request->validate([  
            'search' => 'required',         
        ]);

        $products = DB::table('KhoaHoc')
        ->join('danhmuc', 'KhoaHoc.MaDanhMuc', '=', 'danhmuc.madm')
        ->join('giangvien', 'KhoaHoc.MaGiangVien', '=', 'giangvien.MaGiangVien')
        ->join('capdo', 'KhoaHoc.MaCapDo', '=', 'capdo.MaCapDo')
        ->select('id', 'TenKhoaHoc', 'AnhKhoaHoc', 'MoTaNgan', 'MoTaDayDu', 'ThoiGian', 'LuotXem', 'ThoiLuongKhoaHoc', 'GiaCu', 'GiamGia', 'GiaMoi', 'TrangThai', 'danhmuc.tendm', 'giangvien.MaGiangVien', 'giangvien.TenGiangVien', 'capdo.TenCapDo')
        ->where('TenKhoaHoc', 'LIKE', "%{$search}%")
        ->paginate(10);

        return view('Admin.KhoaHoc.index', ['products' => $products]);

    }

 
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sort(Request $request)
    {
        $sort = $request->input('sort');
        $request->validate([  
            'sort' => 'required',         
        ]);

        if($sort == "iddesc"){
            $products = DB::table('KhoaHoc')
            ->join('danhmuc', 'KhoaHoc.MaDanhMuc', '=', 'danhmuc.madm')
            ->join('giangvien', 'KhoaHoc.MaGiangVien', '=', 'giangvien.MaGiangVien')
            ->join('capdo', 'KhoaHoc.MaCapDo', '=', 'capdo.MaCapDo')
            ->select('id', 'TenKhoaHoc', 'AnhKhoaHoc', 'MoTaNgan', 'MoTaDayDu', 'ThoiGian', 'LuotXem', 'ThoiLuongKhoaHoc', 'GiaCu', 'GiamGia', 'GiaMoi', 'TrangThai', 'danhmuc.tendm', 'giangvien.MaGiangVien', 'giangvien.TenGiangVien', 'capdo.TenCapDo')
            ->orderBy('id', 'DESC')
            ->paginate(10);
        }
        elseif($sort == "idasc"){
            $products = DB::table('KhoaHoc')
            ->join('danhmuc', 'KhoaHoc.MaDanhMuc', '=', 'danhmuc.madm')
            ->join('giangvien', 'KhoaHoc.MaGiangVien', '=', 'giangvien.MaGiangVien')
            ->join('capdo', 'KhoaHoc.MaCapDo', '=', 'capdo.MaCapDo')
            ->select('id', 'TenKhoaHoc', 'AnhKhoaHoc', 'MoTaNgan', 'MoTaDayDu', 'ThoiGian', 'LuotXem', 'ThoiLuongKhoaHoc', 'GiaCu', 'GiamGia', 'GiaMoi', 'TrangThai', 'danhmuc.tendm', 'giangvien.MaGiangVien', 'giangvien.TenGiangVien', 'capdo.TenCapDo')
            ->orderBy('id', 'ASC')
            ->paginate(10);
        }
        elseif($sort == "GiaMoiDESC"){
            $products = DB::table('KhoaHoc')
            ->join('danhmuc', 'KhoaHoc.MaDanhMuc', '=', 'danhmuc.madm')
            ->join('giangvien', 'KhoaHoc.MaGiangVien', '=', 'giangvien.MaGiangVien')
            ->join('capdo', 'KhoaHoc.MaCapDo', '=', 'capdo.MaCapDo')
            ->select('id', 'TenKhoaHoc', 'AnhKhoaHoc', 'MoTaNgan', 'MoTaDayDu', 'ThoiGian', 'LuotXem', 'ThoiLuongKhoaHoc', 'GiaCu', 'GiamGia', 'GiaMoi', 'TrangThai', 'danhmuc.tendm', 'giangvien.MaGiangVien', 'giangvien.TenGiangVien', 'capdo.TenCapDo')
            ->orderBy('GiaMoi', 'DESC')
            ->paginate(10);
        }
        elseif($sort == "GiaMoiASC"){
            $products = DB::table('KhoaHoc')
            ->join('danhmuc', 'KhoaHoc.MaDanhMuc', '=', 'danhmuc.madm')
            ->join('giangvien', 'KhoaHoc.MaGiangVien', '=', 'giangvien.MaGiangVien')
            ->join('capdo', 'KhoaHoc.MaCapDo', '=', 'capdo.MaCapDo')
            ->select('id', 'TenKhoaHoc', 'AnhKhoaHoc', 'MoTaNgan', 'MoTaDayDu', 'ThoiGian', 'LuotXem', 'ThoiLuongKhoaHoc', 'GiaCu', 'GiamGia', 'GiaMoi', 'TrangThai', 'danhmuc.tendm', 'giangvien.MaGiangVien', 'giangvien.TenGiangVien', 'capdo.TenCapDo')
            ->orderBy('GiaMoi', 'ASC')
            ->paginate(10);
        }

        return view('Admin.KhoaHoc.index', ['products' => $products]);
    }

    
    
}