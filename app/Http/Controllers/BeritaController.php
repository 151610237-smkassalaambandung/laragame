<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Berita;


class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()){
            $beritas = Berita::with('kategoris');
            return Datatables::of($beritas)
                ->addColumn('action', function($berita){
                    return view('datatable._action', [
                        'model'     => $berita,
                        'form_url'  => route('beritas.destroy',$berita->id),
                        'edit_url' => route('beritas.edit', $berita->id),
                        'confirm_message' => 'Yakin Ingin Menghapus ' . $berita->name . ' ?' ]);
                    
                })->make(true);
        }

        $html = $htmlBuilder
            ->addColumn(['data'=>'cover','name'=>'cover','title'=>'Cover'])
            ->addColumn(['data'=>'judul','name'=>'judul','title'=>'Judul'])
            ->addColumn(['data'=>'deskripsi','name'=>'deskripsi','title'=>'Deskripsi'])
            ->addColumn(['data'=>'tanggal','name'=>'tanggal','title'=>'Tanggal'])
            ->addColumn(['data'=>'kategori.kategori','name'=>'kategori.kategori','title'=>'Kategori'])
            ->addColumn(['data'=>'action', 'name'=>'action', 'title'=>'', 'orderable'=>false,
                'searchable'=>false]);


        return view('beritas.index')->with(compact('html'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
