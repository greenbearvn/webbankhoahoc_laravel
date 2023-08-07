<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\danhmuc;
use Illuminate\Support\Facades\DB;

class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $danhmuc = danhmuc::paginate(10);

        return View('Admin.DanhMuc.Index')->with('danhmucs', $danhmuc);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('Admin.DanhMuc.Create');

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
            'tendm' => 'required',
            'anhdm' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $danhmuc = $request->all();
        
        if($image = $request->file('anhdm')){
            $destinPath = 'images/danhmuc/';
            $profileImage = date('YmdHis').'.'.$image->getClientOriginalExtension();
            $image->move($destinPath, $profileImage);
            $danhmuc['anhdm'] = $profileImage;
        }
        
        danhmuc::create($danhmuc);
        return redirect('admin/danhmuc/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $danhmuc = danhmuc::find($id);
        return View('Admin.DanhMuc.Detail')->with('danhmuc', $danhmuc);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $danhmuc = danhmuc::find($id);
        return View('Admin.DanhMuc.Edit')->with('danhmuc', $danhmuc);
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
            'tendm' => 'required',
            'anhdm' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $danhmuc = danhmuc::find($id);
        $newdm = $request->all();

        if($image = $request->file('anhdm')){
            $destinPath = 'images/danhmuc/';
            $profileImage = date('YmdHis').'.'.$image->getClientOriginalExtension();
            $image->move($destinPath, $profileImage);
            $danhmuc->andm = $profileImage;
        }
        $danhmuc->update($newdm);
        return redirect('Admin/DanhMuc/Index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        danhmuc::destroy($id);
        return redirect('admin/danhmuc/index')->with('flash_message', 'danh muc da xoa');
    }
    
    public function search(Request $request)
    {
        $search = $request->input('search');
        $request->validate([  
            'search' => 'required',         
        ]);

        $danhmucs = DB::table('danhmuc')
        ->select('madm', 'tendm', 'anhdm')
        ->where('tendm', 'LIKE', "%{$search}%")
        ->paginate(1);

      

        return view('Admin.DanhMuc.Index', ['danhmucs' => $danhmucs]);

    }
}
