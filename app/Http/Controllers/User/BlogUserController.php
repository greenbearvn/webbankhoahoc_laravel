<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogUserController extends Controller
{
    public function index()
    {
        $blogs = DB::table('blog')
        ->join('nguoidung', 'blog.MaNguoiDung', '=', 'nguoidung.MaNguoiDung')
        ->join('danhmuc', 'blog.MaDanhMuc', '=', 'danhmuc.madm')
       ->select('blog.MaBaiViet','TenBaiViet','NoiDung','AnhMinhHoa','NgayDang','blog.MaDanhMuc','danhmuc.tendm','blog.MaNguoiDung','nguoidung.TenNguoiDung')
       ->orderBy('blog.MaBaiViet', 'DESC')
       ->paginate(10);

       $danhmucs = DB::table('danhmuc')
            ->select('madm','tendm','anhdm')
            ->orderBy('madm', 'DESC')
            ->get();
       
        return View('Front.Blog.Index' , compact('blogs','danhmucs'));
    }
    

    public function detail($id)
    {
        
        $blog = DB::table('blog')
        ->join('nguoidung', 'blog.MaNguoiDung', '=', 'nguoidung.MaNguoiDung')
        ->join('danhmuc', 'blog.MaDanhMuc', '=', 'danhmuc.madm')
       ->select('blog.MaBaiViet','TenBaiViet','NoiDung','AnhMinhHoa','NgayDang','blog.MaDanhMuc','danhmuc.tendm','blog.MaNguoiDung','nguoidung.TenNguoiDung')
       ->where('blog.MaBaiViet', $id)
        ->first();

        $danhmucs = DB::table('danhmuc')
            ->select('madm','tendm','anhdm')
            ->orderBy('madm', 'DESC')
            ->get();


        return View('Front.Blog.Detail' , compact('blog','danhmucs'));
    }

    public function getBlogSameCategory($id)
    {
        
        $blogs = DB::table('blog')
        ->join('nguoidung', 'blog.MaNguoiDung', '=', 'nguoidung.MaNguoiDung')
        ->join('danhmuc', 'blog.MaDanhMuc', '=', 'danhmuc.madm')
       ->select('blog.MaBaiViet','TenBaiViet','NoiDung','AnhMinhHoa','NgayDang','blog.MaDanhMuc','danhmuc.tendm','blog.MaNguoiDung','nguoidung.TenNguoiDung')
       ->where('blog.MaDanhMuc', $id)
        ->take(6)
        ->get();

        return response()->json($blogs);
    }

    
}
