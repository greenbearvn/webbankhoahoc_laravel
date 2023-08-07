<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\capdo;
use Illuminate\Support\Facades\DB;

class CapDoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $capdos = capdo::paginate(10);

        return View('Admin.CapDo.Index')->with('capdos', $capdos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('Admin.CapDo.Create');
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
            'TenCapDo' => 'required'
        ]);
        
        $capdo = $request->all();
        
        capdo::create($capdo);
        return redirect('admin/capdo/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $capdo = capdo::find($id);
        return View('Admin.CapDo.Detail')->with('capdo', $capdo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $capdo = capdo::find($id);
        return View('Admin.CapDo.Edit')->with('capdo', $capdo);
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
        $capdo = capdo::find($id);
        $newdm = $request->all();
        $capdo->update($newdm);
        return redirect('admin/capdo/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        capdo::destroy($id);
        return redirect('admin/capdo/index');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $request->validate([  
            'search' => 'required',         
        ]);

        $capdos = DB::table('capdo')
        ->select('MaCapDo', 'TenCapDo')
        ->where('TenCapDo', 'LIKE', "%{$search}%")
        ->paginate(10);

        return view('Admin.capdo.Index', ['capdos' => $capdos]);
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
            $capdos = capdo::orderBy('MaCapDo', 'DESC')->paginate(10);
        }
        elseif($sort == "idasc"){
            $capdos = capdo::orderBy('MaCapDo', 'ASC')->paginate(10);
        }

        return view('Admin.CapDo.Index', ['capdos' => $capdos]);
    }
}
