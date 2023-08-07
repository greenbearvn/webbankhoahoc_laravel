<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\donhang;
use App\Models\chitietdonhang;
use App\Models\chitietbst;
use App\Models\bosuutap;
use Illuminate\Support\Facades\Date;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        // dd($cartItems);

        $danhmucs = DB::table('danhmuc')
            ->select('madm','tendm','anhdm')
            ->orderBy('madm', 'DESC')
            ->get();
        return view('Front.Cart.cart', compact('cartItems','danhmucs'));
    }


    public function checkOut()
    {

        $donhang = new DonHang;
            $donhang->MaNguoiDung = 10;
            $donhang->NgayLap = Carbon::now()->toDateString();
            $donhang->TinhTrang = 0;
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
                ->where('MaNguoiDung', $donhang->MaNguoiDung )
                ->first();

            if (isset($mabst)) {
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

        // $user = Auth::user();
        // if ($user) {
        //     if ($user['role'] == 1) {
        //         return view('Admin.KhoaHoc.index');
        //     } else {
        //         return view('Front.Account.account');
        //     }

        //     $usid = $user['id'];

            
        // } else {
        //     return view('Front.Account.account');
        // }

        return redirect('/home/index');
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

        return redirect()->route('cart.list');
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

        return redirect()->route('cart.list');
    }

    


    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }

    // public function Checkout(Request $request)
    // {
    //     \Cart::clear();

    //     session()->flash('success', 'All Item Cart Clear Successfully !');

    //     return redirect()->route('cart.list');
    // }
}
