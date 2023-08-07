<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\baihoc;
use App\Models\video;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $binhluans = DB::table('video')
        ->join('baihoc', 'video.MaBaiHoc', '=', 'baihoc.MaBaiHoc')
       ->select('video.MaVideo','video.MaBaiHoc','baihoc.TenBaiHoc','video.LinkVideo','video.ThoiLuongVideo','video.TinhTrang','video.TenVideo','video.NoiDungVideo')
       ->orderBy('video.MaVideo', 'DESC')
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
        $baihocs = baihoc::all();
        return View('Admin.Video.Create' , compact('baihocs'));
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
            'MaBaiHoc' => 'required',
            'LinkVideo' => 'required',
            "ThoiLuongVideo" => 'required',
            "TinhTrang" => 'required',
            "TenVideo" => 'required',
            "NoiDungVideo" => 'required'
        ]);
        
        $video = $request->all();
        
        video::create($video);
        
        return redirect('admin/video/index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $baihocs = baihoc::all();

        $video = DB::table('video')
        ->join('baihoc', 'video.MaBaiHoc', '=', 'baihoc.MaBaiHoc')
       ->select('video.MaVideo','video.MaBaiHoc','baihoc.TenBaiHoc','video.LinkVideo','video.ThoiLuongVideo','video.TinhTrang','video.TenVideo','video.NoiDungVideo')
       ->where('video.MaVideo', $id)
        ->first();
        return View('Admin.Video.Edit', compact('baihocs','video'));
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
        $video = video::find($id);
        $newdm = $request->all();
        $video->update($newdm);
        return redirect('admin/video/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
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
