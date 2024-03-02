<?php

namespace App\Http\Controllers;
use App\Models\TransaksiKembali;
use App\Models\TransaksiPinjam;
use App\Models\Koleksi;
use App\Models\Anggota;
use Illuminate\Http\Request;

class TrxKembaliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kembalis = TransaksiKembali::All();
        return view('kembali/index', compact('kembalis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pinjams = TransaksiPinjam::All();
        $koleksis = Koleksi::All();
        $anggotas = Anggota::All();
        return view('kembali/create', compact('koleksis', 'anggotas', 'pinjams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'no_transaksi_pinjam' => 'required',
            'no_transaksi_kembali' => 'required',
            'kd_anggota' => 'required',
            'tg_pinjam' => 'required',
            'tg_kembali' => 'required',
            'kd_koleksi' => 'required',
            'judul' => 'required',
            'jns_bhn_pustaka' => 'required',
            'jns_koleksi' => 'required',
            'jns_media' => 'required',
            'denda' => 'required',
            'ket' => 'required',
        ]);
           
        $data = $request->all();
        // dd($data);
        $check = TransaksiKembali::create([
            'no_transaksi_pinjam' => $data['no_transaksi_pinjam'],
            'no_transaksi_kembali' => $data['no_transaksi_kembali'],
            'kd_anggota' => $data['kd_anggota'],
            'tg_pinjam' => $data['tg_pinjam'],
            'tg_kembali' => $data['tg_kembali'],
            'kd_koleksi' => $data['kd_koleksi'],
            'judul' => $data['judul'],
            'jns_bhn_pustaka' => $data['jns_bhn_pustaka'],
            'jns_koleksi' => $data['jns_koleksi'],
            'jns_media' => $data['jns_media'],
            'denda' => $data['denda'],
            'ket' => $data['ket'],
            'id_pengguna'  => $request->user()->id,
        ]);
         
        return redirect()->route('kembalis.index')->withSuccess('Great! You have Successfully created new transaksi');
    
    }

    /**
     * Display the specified resource.
     */
    public function show($trxPinjam)
    {
        $pinjam = TransaksiPinjam::where('no_transaksi_pinjam', $trxPinjam)->first();
        return response()->json($pinjam);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransaksiKembali $kembalis)
    {
        return view('kembali.edit', compact('kembalis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransaksiKembali $kembali)
    {
        $kembali->delete();
        return redirect()->route('kembalis.index')->with('success','Great! You have Successfully deleted transaksi');
    }
}
