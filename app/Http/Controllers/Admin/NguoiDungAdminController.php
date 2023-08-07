<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\nguoidung;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Session\Store;

class NguoiDungAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $nguoidungs = nguoidung::paginate(10);

        return View('Admin.NguoiDung.Index')->with('nguoidungs', $nguoidungs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('Admin.NguoiDung.Create');
    }

    public function page(){
        return View('Admin.NguoiDung.Login');
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        if (Auth::attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ], $request->input('remember'))) {

            return redirect()->route('khoahoc.index');
        }

        Session::flash('error', 'Email hoặc Password không đúng');
        return redirect()->back();
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
            'TenNguoiDung' => 'required',
            'MatKhau' => 'required',
            'Quyen' => 'required'

        ]);
        
        $nguoidung = $request->all();
        
        nguoidung::create($nguoidung);
        return redirect('admin/nguoidung/index');
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
        $nguoidung = nguoidung::find($id);
        return View('Admin.NguoiDung.Detail')->with('nguoidung', $nguoidung);
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
        $nguoidung = nguoidung::find($id);
        return View('Admin.NguoiDung.Edit')->with('nguoidung', $nguoidung);
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
        $nguoidung = nguoidung::find($id);
        $newdm = $request->all();
        $nguoidung->update($newdm);
        return redirect('admin/nguoidung/index');
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
        nguoidung::destroy($id);
        return redirect('admin/nguoidung/index');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $request->validate([  
            'search' => 'required',         
        ]);

        $nguoidungs = DB::table('nguoidung')
        ->select('MaNguoiDung', 'TenNguoiDung', 'MatKhau', 'Quyen')
        ->where('TenNguoiDung', 'LIKE', "%{$search}%")
        ->paginate(10);

        return view('Admin.NguoiDung.Index', ['nguoidungs' => $nguoidungs]);
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
            $nguoidungs = nguoidung::orderBy('Manguoidung', 'DESC')->paginate(10);
        }
        elseif($sort == "idasc"){
            $nguoidungs = nguoidung::orderBy('Manguoidung', 'ASC')->paginate(10);
        }

        return view('Admin.NguoiDung.Index', ['nguoidungs' => $nguoidungs]);
    }
}
