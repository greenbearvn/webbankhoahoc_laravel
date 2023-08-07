<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\donhang;
use App\Models\chitietdonhang;
use App\Models\chitietbst;
use App\Models\bosuutap;
use App\Models\nguoidung;
use Illuminate\Support\Facades\Date;
use Carbon\Carbon;

class DonHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donhangs =  DB::table('donhang')
        ->join('nguoidung', 'donhang.MaNguoiDung', '=', 'nguoidung.MaNguoiDung')
        ->select('MaDonHang', 'donhang.MaNguoiDung','nguoidung.TenNguoiDung', 'NgayLap', 'TinhTrang', 'Tongtien')
        ->orderBy('MaDonHang', 'DESC')
        ->paginate(10);
        
        return view('Admin.DonHang.Index', compact('donhangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nguoidungs = nguoidung::all();

        $cartItems = \Cart::getContent();

        $products = DB::table('KhoaHoc')
        ->join('danhmuc', 'KhoaHoc.MaDanhMuc', '=', 'danhmuc.madm')
        ->join('giangvien', 'KhoaHoc.MaGiangVien', '=', 'giangvien.MaGiangVien')
        ->join('capdo', 'KhoaHoc.MaCapDo', '=', 'capdo.MaCapDo')
        ->select('id', 'TenKhoaHoc', 'AnhKhoaHoc', 'MoTaNgan', 'MoTaDayDu', 'ThoiGian', 'LuotXem', 'ThoiLuongKhoaHoc', 'GiaCu', 'GiamGia', 'GiaMoi', 'TrangThai', 'danhmuc.madm','danhmuc.tendm', 'giangvien.MaGiangVien', 'giangvien.TenGiangVien','capdo.MaCapDo', 'capdo.TenCapDo')
        ->paginate(10);

        return view('Admin.DonHang.Create',compact('cartItems','products','nguoidungs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $donhang = new DonHang; 
        $donhang->MaNguoiDung = $request->input('MaNguoiDung');
        $donhang->NgayLap = Carbon::parse($request->input('NgayLap'))->toDateString();
        $donhang->TinhTrang = $request->input('TinhTrang');
        $donhang->Tongtien = \Cart::getTotal();
        $donhang->save();
        
        $cartItems = \Cart::getContent(); // get the cart items
        foreach ($cartItems as $item) { // loop through each item in the cart
            $chitietdonhang = new Chitietdonhang; // create a new order detail
            $chitietdonhang->MaDonHang = $donhang->MaDonHang; // set the order ID
            $chitietdonhang->MaKhoaHoc = $item->id; // set the course ID

            $magv = DB::table('khoahoc')
                ->select('MaGiangVien')
                ->where('id', $item->id)
                ->first();

            $chitietdonhang->MaGiangVien = $magv->MaGiangVien;

            $chitietdonhang->Gia = $item->price; // set the price
            $chitietdonhang->save(); // save the order detail
        }

        $mabst =  DB::table('bosuutap')
            ->select('MaBST')
            ->where('MaNguoiDung', $donhang->MaNguoiDung)
            ->first();

        if ($mabst) {
            $bst = Bosuutap::find($mabst->MaBST);
            $bst->MaNguoiDung = $donhang->MaNguoiDung;
            $bst->save();

            foreach ($cartItems as $item) { // loop through each item in the cart
                $ctbst = new Chitietbst; // create a new order detail
                $ctbst->MaBST = $mabst->MaBST; // set the order ID
                $ctbst->MaKhoaHoc = $item->id; // set the course ID
                $ctbst->NgayThem = Carbon::now()->toDateString();
                $ctbst->save(); // save the order detail
            }
        } else {
            $bst = new Bosuutap;
            $bst->MaNguoiDung = $donhang->MaNguoiDung;
            $bst->save();

            foreach ($cartItems as $item) { // loop through each item in the cart
                $ctbst = new Chitietbst; // create a new order detail
                $ctbst->MaBST = $bst->MaBST; // set the order ID
                $ctbst->MaKhoaHoc = $item->id; // set the course ID
                $ctbst->NgayThem = Carbon::now()->toDateString();
                $ctbst->save();
            }
        }

        \Cart::clear();

        return redirect('/admin/donhang/create');
    }


    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->makh,
            'price' => $request->giamoi,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        
        return redirect()->back();
    
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }


    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->back();
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $donhang =  DB::table('donhang')
        ->join('nguoidung', 'donhang.MaNguoiDung', '=', 'nguoidung.MaNguoiDung')
        ->select('MaDonHang', 'donhang.MaNguoiDung','nguoidung.TenNguoiDung', 'NgayLap', 'TinhTrang', 'Tongtien')
        ->where('donhang.MaDonHang', $id)
        ->first();


        $chitietdonhangs = DB::table('chitietdonhang')
        ->join('KhoaHoc', 'chitietdonhang.MaKhoaHoc', '=', 'KhoaHoc.id')
        ->join('GiangVien', 'chitietdonhang.MaGiangVien', '=', 'GiangVien.MaGiangVien')
        ->select('MaDonHang','MaKhoaHoc', 'KhoaHoc.TenKhoaHoc', 'KhoaHoc.AnhKhoaHoc','GiangVien.TenGiangVien', 'Gia')
        ->where('chitietdonhang.MaDonHang', $id)
        ->get();
        return View('Admin.DonHang.Detail', compact('donhang','chitietdonhangs'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nguoidungs = nguoidung::all();

        $cartItems = \Cart::getContent();

        $chitietdonhangs = DB::table('chitietdonhang')
        ->join('KhoaHoc', 'chitietdonhang.MaKhoaHoc', '=', 'KhoaHoc.id')
        ->join('GiangVien', 'chitietdonhang.MaGiangVien', '=', 'GiangVien.MaGiangVien')
        ->select('MaDonHang','MaKhoaHoc', 'KhoaHoc.id','KhoaHoc.TenKhoaHoc','KhoaHoc.AnhKhoaHoc','GiangVien.MaGiangVien','GiangVien.TenGiangVien', 'Gia')
        ->where('chitietdonhang.MaDonHang', $id)
        ->paginate(10);

        $products = DB::table('KhoaHoc')
        ->join('danhmuc', 'KhoaHoc.MaDanhMuc', '=', 'danhmuc.madm')
        ->join('giangvien', 'KhoaHoc.MaGiangVien', '=', 'giangvien.MaGiangVien')
        ->join('capdo', 'KhoaHoc.MaCapDo', '=', 'capdo.MaCapDo')
        ->select('id', 'TenKhoaHoc', 'AnhKhoaHoc', 'MoTaNgan', 'MoTaDayDu', 'ThoiGian', 'LuotXem', 'ThoiLuongKhoaHoc', 'GiaCu', 'GiamGia', 'GiaMoi', 'TrangThai', 'danhmuc.madm','danhmuc.tendm', 'giangvien.MaGiangVien', 'giangvien.TenGiangVien','capdo.MaCapDo', 'capdo.TenCapDo')
        ->paginate(10);

        $donhang = DB::table('donhang')
        ->join('nguoidung', 'donhang.MaNguoiDung', '=', 'nguoidung.MaNguoiDung')
        ->select('MaDonHang', 'donhang.MaNguoiDung','nguoidung.TenNguoiDung', 'NgayLap', 'TinhTrang', 'Tongtien')
        ->where('MaDonHang', $id)
        ->first();

        $totalMoney = DB::table('donhang')
        ->select('Tongtien')
        ->first()->Tongtien;

        
        return view('Admin.DonHang.Edit',compact('cartItems','products','nguoidungs','chitietdonhangs','donhang','totalMoney'));


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
        $donhang = Donhang::find($id);

        $donhang->MaNguoiDung = $request->input('MaNguoiDung');
        $donhang->NgayLap = Carbon::parse($request->input('NgayLap'))->toDateString();
        $donhang->TinhTrang = $request->input('TinhTrang');
        $donhang->Tongtien += \Cart::getTotal();
        $donhang->save();

        $cartItems = \Cart::getContent();
        foreach ($cartItems as $item) {
            $makh = DB::table('chitietdonhang')
                ->select('MaKhoaHoc')
                ->where('MaDonHang', $id)
                ->where('MaKhoaHoc', $item->id)
                ->first();

            if ($makh) {
                $chitietdonhang = new Chitietdonhang;
                $chitietdonhang->MaDonHang = $donhang->MaDonHang;
                $chitietdonhang->MaKhoaHoc = $item->id;

                $magv = DB::table('khoahoc')
                    ->select('MaGiangVien')
                    ->where('id', $item->id)
                    ->first();

                $chitietdonhang->MaGiangVien = $magv->MaGiangVien;
                $chitietdonhang->Gia = $item->price;
                $chitietdonhang->save();

                $mabst =  DB::table('bosuutap')
                    ->select('MaBST')
                    ->where('MaNguoiDung', $donhang->MaNguoiDung)
                    ->first();

                if ($mabst) {
                    $bst = Bosuutap::find($mabst->MaBST);
                    $bst->MaNguoiDung = $donhang->MaNguoiDung;
                    $bst->save();

                    foreach ($cartItems as $item) {
                        $ctbst = new Chitietbst;
                        $ctbst->MaBST = $mabst->MaBST;
                        $ctbst->MaKhoaHoc = $item->id;
                        $ctbst->NgayThem = Carbon::now()->toDateString();
                        $ctbst->save();
                    }
                } else {
                    $bst = new Bosuutap;
                    $bst->MaNguoiDung = $donhang->MaNguoiDung;
                    $bst->save();

                    foreach ($cartItems as $item) {
                        $ctbst = new Chitietbst;
                        $ctbst->MaBST = $bst->MaBST;
                        $ctbst->MaKhoaHoc = $item->id;
                        $ctbst->NgayThem = Carbon::now()->toDateString();
                        $ctbst->save();
                    }
                }
            }
        }

        \Cart::clear();

        return redirect('/admin/donhang/index');
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
    }
}
