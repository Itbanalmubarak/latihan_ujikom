<?php

namespace App\Http\Controllers;
use App\Models\Koleksi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KoleksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $koleksis = Koleksi::All();
        return view('koleksi/index', compact('koleksis'));
    }

    public function showAll() {
        return response()->json(Koleksi::All());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kd_koleksi' => 'required',
            'judul' => 'required',
            'jns_bhn_pustaka' => 'required',
            'jns_koleksi' => 'required',
            'jns_media' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required',
            'cetakan' => 'required',
            'edisi' => 'required',
            'status' => 'required',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $koleksi = Koleksi::create([
            'kd_koleksi' => $request->kd_koleksi,
            'judul' => $request->judul,
            'jns_bhn_pustaka' => $request->jns_bhn_pustaka,
            'jns_koleksi' => $request->jns_koleksi,
            'jns_media' => $request->jns_media,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'tahun' => $request->tahun,
            'cetakan' => $request->cetakan,
            'edisi' => $request->edisi,
            'status' => $request->status,
        ]);
        return response()->json([
            'message' => 'Koleksi successfully created',
            'koleksi' => $koleksi
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $koleksis = Koleksi::find($id);
        return response()->json($koleksis);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Koleksi $koleksis)
    {
        return view('koleksi.edit', compact('koleksis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'kd_koleksi' => 'required',
            'judul' => 'required',
            'jns_bhn_pustaka' => 'required',
            'jns_koleksi' => 'required',
            'jns_media' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required',
            'cetakan' => 'required',
            'edisi' => 'required',
            'status' => 'required',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $koleksi = Koleksi::create([
            'kd_koleksi' => $request->kd_koleksi,
            'judul' => $request->judul,
            'jns_bhn_pustaka' => $request->jns_bhn_pustaka,
            'jns_koleksi' => $request->jns_koleksi,
            'jns_media' => $request->jns_media,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'tahun' => $request->tahun,
            'cetakan' => $request->cetakan,
            'edisi' => $request->edisi,
            'status' => $request->status,
        ]);
        return response()->json([
            'message' => 'Koleksi successfully created',
            'koleksi' => $koleksi
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $koleksi = Koleksi::find($id);
        $koleksi->delete();
        return response()->json([
            'message' => 'Koleksi successfully deleted',
        ], 201);
    }
}
