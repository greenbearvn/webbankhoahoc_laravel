<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\giangvien;
use Illuminate\Support\Facades\DB;
use App\Models\danhmuc;
use App\Models\nguoidung;

class GiangVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $giangviens = giangvien::paginate(10);

        $products = DB::table('giangvien')
        ->join('danhmuc', 'giangvien.MaDanhMuc', '=', 'danhmuc.madm')
        ->join('nguoidung', 'giangvien.MaGiangVien', '=', 'nguoidung.MaNguoiDung')
        ->select('giangvien.MaGiangVien',
        'giangvien.TenGiangVien',
        'giangvien.Email',
        'giangvien.SoDienThoai',
        'giangvien.AnhDaiDien',
        'giangvien.MoTa',
        'giangvien.MaDanhMuc',
        'danhmuc.tendm',
        'nguoidung.MaNguoiDung',
        'nguoidung.TenNguoiDung')
        ->paginate(10);

        return View('Admin.GiangVien.Index')->with('giangviens', $giangviens);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $danhmucs = danhmuc::all();
        $nguoidungs = nguoidung::all();
        return View('Admin.GiangVien.Create', compact('danhmucs', 'nguoidungs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
        
  
            "TenGiangVien" => "required",
            "Email" => "required",
            "SoDienThoai" => "required",
            "AnhDaiDien" => "image|mimes:jpeg,png,jpg,gif,svg|max:20480",
            "MoTa" => "required",
            "MaDanhMuc" => "required"
        ]);
        
        $giangvien = $request->all();

        if ($image = $request->file('AnhDaiDien')) {
            $destinationPath = 'images/giangvien/';
            $profileImage = date('YmdHis').'.'.$image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $giangvien['AnhDaiDien'] = $profileImage;
        }
        
        giangvien::create($giangvien);
        return redirect('admin/giangvien/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $giangvien = giangvien::find($id);
        return View('Admin.GiangVien.Detail')->with('giangvien', $giangvien);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $danhmucs = danhmuc::all();
        $nguoidungs = nguoidung::all();
        

        $giangvien =  DB::table('giangvien')
            ->select("MaGiangVien",
            "TenGiangVien",
            "Email",
            "SoDienThoai",
            "AnhDaiDien",
            "MoTa",
            "MaDanhMuc")
            ->where('MaGiangVien', $id)
            ->first();
        return View('Admin.GiangVien.Edit', compact( 'giangvien', 'danhmucs','nguoidungs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $giangvien = giangvien::find($id);
    //     $giangvien->MaGiangVien = $request->input('MaGiangVien');
    //     $giangvien->TenGiangVien = $request->input('TenGiangVien');
    //     $giangvien->Email = $request->input('Email');
    //     $giangvien->SoDienThoai = $request->input('SoDienThoai');
    //     $giangvien->MoTa = $request->input('MoTa');
    //     $giangvien->MaDanhMuc = $request->input('MaDanhMuc');


    //     if ($image = $request->file('AnhDaiDien')) {
    //         $destinationPath = 'images/giangvien/';
    //         $profileImage = date('YmdHis').'.'.$image->getClientOriginalExtension();
    //         $image->move($destinationPath, $profileImage);
    //         $giangvien->AnhDaiDien = $image;
    //     }
    //     else{
    //         $giangvien->AnhDaiDien = $request->input('AnhDaiDien');
    //     }

    //     $giangvien->save();
    //     return redirect('admin/giangvien/index');
    // }


    public function update(Request $request, $id)
    {
        $request->validate([
            "MaGiangVien" => "required",
            "TenGiangVien" => "required",
            "Email" => "required|email",
            "SoDienThoai" => "required",
            "AnhDaiDien" => "image|mimes:jpeg,png,jpg,gif,svg|max:20480",
            "MoTa" => "required",
            "MaDanhMuc" => "required"
        ]);

        $giangvien = Giangvien::find($id);
        $giangvien->MaGiangVien = $request->input('MaGiangVien');
        $giangvien->TenGiangVien = $request->input('TenGiangVien');
        $giangvien->Email = $request->input('Email');
        $giangvien->SoDienThoai = $request->input('SoDienThoai');
        $giangvien->MoTa = $request->input('MoTa');
        $giangvien->MaDanhMuc = $request->input('MaDanhMuc');

        if ($request->hasFile('AnhDaiDien')) {
            $image = $request->file('AnhDaiDien');
            $destinationPath ='images/giangvien/';
            $profileImage = date('YmdHis').'.'.$image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $giangvien->AnhDaiDien = $profileImage;
        }

        $giangvien->save();
        return redirect('admin/giangvien/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        giangvien::destroy($id);
        return redirect('admin/giangvien/index');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $request->validate([  
            'search' => 'required',         
        ]);

        $giangviens = DB::table('giangvien')
        ->select('Magiangvien', 'Tengiangvien', 'MatKhau', 'Quyen')
        ->where('Tengiangvien', 'LIKE', "%{$search}%")
        ->paginate(10);

        return view('Admin.GiangVien.Index', ['giangviens' => $giangviens]);
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
            $giangviens = giangvien::orderBy('MaGiangVien', 'DESC')->paginate(10);
        }
        elseif($sort == "idasc"){
            $giangviens = giangvien::orderBy('MaGiangVien', 'ASC')->paginate(10);
        }

        return view('Admin.GiangVien.Index', ['giangviens' => $giangviens]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request 
     * @return \Illuminate\Http\Response
     */
    public function createNew(Request $request,$id)
    {
        $request->validate([
            "MaGiangVien" => "required",
            "TenGiangVien" => "required",
            "Email" => "required",
            "SoDienThoai" => "required",
            "AnhDaiDien" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "MoTa" => "required",
            "MaDanhMuc" => "required"
        ]);

        $magv = DB::table('giangvien')
            ->select('Magiangvien')
            ->where('MaGiangVien', $id)
            ->first();

           
        if ($magv) {
            $giangvien = Giangvien::find($id);
            $giangvien->MaGiangVien = $request->input('MaGiangVien');
            $giangvien->TenGiangVien = $request->input('TenGiangVien');
            $giangvien->Email = $request->input('Email');
            $giangvien->SoDienThoai = $request->input('SoDienThoai');
            $giangvien->MoTa = $request->input('MoTa');
            $giangvien->MaDanhMuc = $request->input('MaDanhMuc');

            if ($image = $request->file('AnhDaiDien')) {
                $destinationPath = public_path('images/giangvien/');
                $profileImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $giangvien->AnhDaiDien = $profileImage;
            }

            $giangvien->save();
            return redirect('/home/index');
        } else {
            $giangvien = $request->all();

           

            if ($image = $request->file('AnhDaiDien')) {
                $destinationPath = public_path('images/giangvien/'); // Full path to public/images/blog/
                $profileImage = date('YmdHis').'.'.$image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $giangvien['AnhDaiDien'] = $profileImage;
            }

            Giangvien::create($giangvien);
            return redirect('/home/index');
        }

    
        return redirect('/home/index');
    }

    public function createNewUI($id)
    {
        $manguoidung = $id;

        $giangvien = DB::table('giangvien')
        ->join('danhmuc', 'giangvien.MaDanhMuc', '=', 'danhmuc.madm')
        ->select('MaGiangVien',
        'TenGiangVien',
        'Email',
        'SoDienThoai',
        'AnhDaiDien',
        'MoTa',
        'giangvien.MaDanhMuc',
        'danhmuc.tendm')
        ->where('MaGiangVien',$id)
        ->first();


        $danhmucs = DB::table('danhmuc')
        ->select('*')
        ->get();
        return View('Front.Account.teacher', compact('danhmucs','manguoidung','giangvien'));
    }

}
