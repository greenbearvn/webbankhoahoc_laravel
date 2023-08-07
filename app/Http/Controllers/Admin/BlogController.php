<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\nguoidung;
use App\Models\blog;
use App\Models\danhmuc;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = DB::table('blog')
        ->join('nguoidung', 'blog.MaNguoiDung', '=', 'nguoidung.MaNguoiDung')
        ->join('danhmuc', 'blog.MaDanhMuc', '=', 'danhmuc.madm')
       ->select('blog.MaBaiViet','TenBaiViet','NoiDung','AnhMinhHoa','NgayDang','blog.MaDanhMuc','danhmuc.tendm','blog.MaNguoiDung','nguoidung.TenNguoiDung')
       ->orderBy('blog.MaBaiViet', 'DESC')
       ->paginate(10);
        return View('Admin.Blog.Index' , compact('blogs'));
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

        return View('Admin.blog.Create' , compact('danhmucs','nguoidungs'));
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
            "TenBaiViet" => "required",
            "NoiDung" => "required",
            'AnhMinhHoa' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            "NgayDang" => "required",
            "MaDanhMuc" => "required",
            "MaNguoiDung" => "required",
        ]);

        $blog = $request->all();
        $time = $request->input('NgayDang');
        $date = Carbon::parse($time);
        $blog['NgayDang'] = $date->format('Y/m/d');

        if ($image = $request->file('AnhMinhHoa')) {
            $destinationPath = public_path('images/blog/'); // Full path to public/images/blog/
            $profileImage = date('YmdHis').'.'.$image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $blog['AnhMinhHoa'] = $profileImage;
        }

        blog::create($blog);
        
        return redirect('admin/blog/index');
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
        
        $blog = DB::table('blog')
        ->join('nguoidung', 'blog.MaNguoiDung', '=', 'nguoidung.MaNguoiDung')
        ->join('danhmuc', 'blog.MaDanhMuc', '=', 'danhmuc.madm')
       ->select('blog.MaBaiViet','TenBaiViet','NoiDung','AnhMinhHoa','NgayDang','blog.MaDanhMuc','danhmuc.tendm','blog.MaNguoiDung','nguoidung.TenNguoiDung')
       ->where('blog.MaBaiViet', $id)
        ->first();

        $danhmucs = danhmuc::all();
        $nguoidungs = nguoidung::all();

        return View('Admin.blog.Edit' , compact('danhmucs','nguoidungs','blog'));
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
            "TenBaiViet" => "required",
            "NoiDung" => "required",
            'AnhMinhHoa' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            "NgayDang" => "required",
            "MaDanhMuc" => "required",
            "MaNguoiDung" => "required",
        ]);
        
        $blog = blog::find($id);

        $blog->MaBaiViet = $request->input('MaBaiViet');
        $blog->TenBaiViet = $request->input('TenBaiViet');
        $blog->NoiDung = $request->input('NoiDung');
        $time = $request->input('ThoiGian');
        $date = Carbon::parse($time);
        $blog->NgayDang = $date->format('Y/m/d');
        $blog->MaDanhMuc = $request->input('MaDanhMuc');
        $blog->MaNguoiDung = $request->input('MaNguoiDung');


        if ($image = $request->file('AnhMinhHoa')) {
            $destinationPath = public_path('images/blog/'); // Full path to public/images/blog/
            $profileImage = date('YmdHis').'.'.$image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $blog->AnhMinhHoa = $profileImage;
        }

        


        $blog->save();
        
        return redirect('admin/blog/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        blog::destroy($id);
        return redirect('admin/blog/index');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $request->validate([  
            'search' => 'required',         
        ]);

        $blogs = DB::table('blog')
        
    
        ->select('Mablog',
        'MaKhoaHoc' ,
        'Tenblog' ,
        "ThoiGianHoanThanh" )
        ->where('Tenblog', 'LIKE', "%{$search}%")
        ->paginate(10);

        return view('Admin.blog.Index', ['blogs' => $blogs]);
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
            $blogs = blog::orderBy('Mablog', 'DESC')->paginate(10);
        }
        elseif($sort == "idasc"){
            $blogs = blog::orderBy('Mablog', 'ASC')->paginate(10);
        }

        return view('Admin.blog.Index', ['blogs' => $blogs]);
    }
}
