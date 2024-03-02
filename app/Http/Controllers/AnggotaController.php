<?php

namespace App\Http\Controllers;
use App\Models\Anggota;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anggotas = Anggota::All();
        return view('anggota/index', compact('anggotas'));
    }

    public function showAll() {
        return response()->json(Anggota::All());
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
            'kd_anggota' => 'required',
            'nm_anggota' => 'required',
            'jk' => 'required',
            'tp_lahir' => 'required',
            'tg_lahir' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'jns_anggota' => 'required',
            'status' => 'required',
            'jml_pjm' => 'required',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $anggota = Anggota::create([
            'kd_anggota' => $request->kd_anggota,
            'nm_anggota' => $request->nm_anggota,
            'jk' => $request->jk,
            'tp_lahir' => $request->tp_lahir,
            'tg_lahir' => $request->tg_lahir,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'jns_anggota' => $request->jns_anggota,
            'status' => $request->status,
            'jml_pjm' => $request->jml_pjm,
        ]);
        return response()->json([
            'message' => 'Anggota successfully created',
            'anggota' => $anggota
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $anggotas = Anggota::find($id);
        return response()->json($anggotas);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anggota $anggota)
    {
        return view('anggota.edit', compact('anggotas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kd_anggota' => 'required',
            'nm_anggota' => 'required',
            'jk' => 'required',
            'tp_lahir' => 'required',
            'tg_lahir' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'jns_anggota' => 'required',
            'status' => 'required',
            'jml_pjm' => 'required',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $anggota = Anggota::where('id', $id)->update([
            'kd_anggota' => $request->kd_anggota,
            'nm_anggota' => $request->nm_anggota,
            'jk' => $request->jk,
            'tp_lahir' => $request->tp_lahir,
            'tg_lahir' => $request->tg_lahir,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'jns_anggota' => $request->jns_anggota,
            'status' => $request->status,
            'jml_pjm' => $request->jml_pjm,
        ]);
        return response()->json([
            'message' => 'Anggota successfully updated',
            'anggota' => $anggota
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $anggota = Anggota::find($id);
        $anggota->delete();
        return response()->json([
            'message' => 'Anggota successfully deleted',
        ], 201);
    }
}
