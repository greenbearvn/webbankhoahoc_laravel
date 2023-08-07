<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\baihoc;
use App\Models\KhoaHoc;
use Illuminate\Support\Facades\DB;

class BaiHocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $baihocs = baihoc::paginate(10);
        return View('Admin.BaiHoc.Index' , compact('baihocs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $khoahocs = KhoaHoc::all();
        return View('Admin.BaiHoc.Create' , compact('khoahocs'));
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
        
        'MaKhoaHoc' => 'required',
        'TenBaiHoc' => 'required',
        'ThoiGianHoanThanh' => 'required',
            
        ]);
        
        $baihoc = $request->all();
        
        baihoc::create($baihoc);
        return redirect('admin/baihoc/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $baihoc= DB::table('baihoc')
            ->join('KhoaHoc', 'BaiHoc.MaKhoaHoc', '=', 'KhoaHoc.id')
            ->select('MaBaiHoc',
            'MaKhoaHoc' ,
            'KhoaHoc.TenKhoaHoc',
            'TenBaiHoc' ,
            "ThoiGianHoanThanh" )
            ->where('baihoc.MaBaiHoc', $id)
            ->first();

        $videos = DB::table('video')
        ->join('baihoc', 'video.MaBaiHoc', '=', 'baihoc.MaBaiHoc')
        ->select('MaVideo',
        'baihoc.MaBaiHoc' ,
        'baihoc.TenBaiHoc',
        'LinkVideo' ,
        "ThoiLuongVideo" ,
        "TinhTrang" ,
        "TenVideo" ,
        "NoiDungVideo")
        ->where('baihoc.MaBaiHoc', $id)
        ->get();

        return View('Admin.BaiHoc.Detail', compact('baihoc','videos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $baihoc = baihoc::find($id);
        $khoahocs = KhoaHoc::all();
        return View('Admin.BaiHoc.Edit', compact('baihoc','khoahocs'));
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
        //
        $baihoc = baihoc::find($id);
        $newdm = $request->all();
        $baihoc->update($newdm);
        return redirect('admin/baihoc/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        baihoc::destroy($id);
        return redirect('admin/baihoc/index');
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $request->validate([  
            'search' => 'required',         
        ]);

        $baihocs = DB::table('baihoc')
        
    
        ->select('MaBaiHoc',
        'MaKhoaHoc' ,
        'TenBaiHoc' ,
        "ThoiGianHoanThanh" )
        ->where('TenBaiHoc', 'LIKE', "%{$search}%")
        ->paginate(10);

        return view('Admin.baihoc.Index', ['baihocs' => $baihocs]);
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
            $baihocs = baihoc::orderBy('MaBaiHoc', 'DESC')->paginate(10);
        }
        elseif($sort == "idasc"){
            $baihocs = baihoc::orderBy('MaBaiHoc', 'ASC')->paginate(10);
        }

        return view('Admin.baihoc.Index', ['baihocs' => $baihocs]);
    }
}
