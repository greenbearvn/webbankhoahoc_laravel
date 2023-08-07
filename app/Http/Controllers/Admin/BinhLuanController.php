<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\nguoidung;
use App\Models\KhoaHoc;
use App\Models\binhluan;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BinhLuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $binhluans = DB::table('binhluan')
        ->join('nguoidung', 'binhluan.MaNguoiDung', '=', 'nguoidung.MaNguoiDung')
        ->join('khoahoc', 'binhluan.MaKhoaHoc', '=', 'KhoaHoc.id')
       ->select('binhluan.MaBinhLuan','KhoaHoc.TenKhoaHoc','nguoidung.TenNguoiDung','binhluan.NoiDung','binhluan.ThoiGian')
       ->orderBy('binhluan.MaBinhLuan', 'DESC')
       ->paginate(10);
        return View('Admin.binhluan.Index' , compact('binhluans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $khoahocs = KhoaHoc::all();
        $nguoidungs = nguoidung::all();
        return View('Admin.BinhLuan.Create' , compact('khoahocs','nguoidungs'));
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
            "MaKhoaHoc" => 'required',
            "MaNguoiDung" => 'required',
            "NoiDung" => 'required',
            "ThoiGian" => 'required',
        ]);
        
        $binhluan = $request->all();
        $time = $request->input('ThoiGian');
        $date = Carbon::parse($time);
        $binhluan['ThoiGian'] = $date->format('Y/m/d');
        
        binhluan::create($binhluan);
        
        return redirect('admin/binhluan/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $khoahocs = KhoaHoc::all();
        $nguoidungs = nguoidung::all();

        $binhluan = DB::table('binhluan')
        ->join('nguoidung', 'binhluan.MaNguoiDung', '=', 'nguoidung.MaNguoiDung')
        ->join('khoahoc', 'binhluan.MaKhoaHoc', '=', 'KhoaHoc.id')
       ->select('binhluan.MaBinhLuan','binhluan.MaKhoaHoc','KhoaHoc.TenKhoaHoc','nguoidung.MaNguoiDung','nguoidung.TenNguoiDung','binhluan.NoiDung','binhluan.ThoiGian')
       ->where('binhluan.MaBinhLuan', $id)
        ->first();

        return View('Admin.BinhLuan.Edit' , compact('khoahocs','nguoidungs','binhluan'));
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
            "MaBinhLuan" => 'required',
            "MaKhoaHoc" => 'required',
            "MaNguoiDung" => 'required',
            "NoiDung" => 'required',
            "ThoiGian" => 'required',
        ]);
        
        $binhluan = binhluan::find($id);
        $binhluan->MaKhoaHoc = $request->input('MaKhoaHoc');
        $binhluan->MaNguoiDung = $request->input('MaNguoiDung');
        $binhluan->NoiDung = $request->input('NoiDung');

        $time = $request->input('ThoiGian');
        $date = Carbon::parse($time);
        $binhluan->ThoiGian = $date->format('Y/m/d');


        $binhluan->save();
        
        return redirect('admin/binhluan/index');
    }

    

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        binhluan::destroy($id);
        return redirect('admin/binhluan/index');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $request->validate([  
            'search' => 'required',         
        ]);

        $binhluans = DB::table('binhluan')
        
    
        ->select('Mabinhluan',
        'MaKhoaHoc' ,
        'Tenbinhluan' ,
        "ThoiGianHoanThanh" )
        ->where('Tenbinhluan', 'LIKE', "%{$search}%")
        ->paginate(10);

        return view('Admin.BinhLuan.Index', ['binhluans' => $binhluans]);
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
            $binhluans = binhluan::orderBy('Mabinhluan', 'DESC')->paginate(10);
        }
        elseif($sort == "idasc"){
            $binhluans = binhluan::orderBy('Mabinhluan', 'ASC')->paginate(10);
        }

        return view('Admin.binhluan.Index', ['binhluans' => $binhluans]);
    }
}
