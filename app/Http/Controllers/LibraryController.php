<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $library = DB::table('library')->get();
        return view('/library/index', ['library' => $library]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('library.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('library')->insert([
            'kode_buku' => $request->kode,
            'judul_buku' => $request->judul,
            'penulis_buku' => $request->penulis,
            'penerbit_buku' => $request->penerbit,
            'tahun_penerbit' => $request->tahun,
            'stok' => $request->stok
        ]);
        return redirect('/library');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $library = DB::table('library')->where('id_buku', $id)->get();
        return view('library.edit', ['library'=>$library]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::table('library')->where('id_buku', $request->id)->update([
            'kode_buku' => $request->kode,
            'judul_buku' => $request->judul,
            'penulis_buku' => $request->penulis,
            'penerbit_buku' => $request->penerbit,
            'tahun_penerbit' => $request->tahun,
            'stok' => $request->stok
        ]);
        return redirect('/library');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('library')->where('id_buku', $id)->delete();
        return redirect('/library');
    }

    public function search(Request $request){
        $search = $request->cari;

        $library = DB::table('library')->where('judul_buku', 'like', "%" .$search."%")->paginate();

        return view('library.index', ['library'=>$library]);
    }
}
