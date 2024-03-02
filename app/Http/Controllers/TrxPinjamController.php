<?php

namespace App\Http\Controllers;
use App\Models\TransaksiPinjam;
use App\Models\Koleksi;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Hash;

class TrxPinjamController extends Controller
{
    public function index(){
        $pinjams = TransaksiPinjam::All();
        return view('pinjam/index', compact('pinjams'));
    }

    public function create(){

        $koleksis = Koleksi::All();
        $anggotas = Anggota::All();
        return view('pinjam/create', compact('koleksis', 'anggotas'));
    }

    public function show($kd_koleksi)
    {
        $koleksi = Koleksi::where('kd_koleksi', $kd_koleksi)->first();
        return response()->json($koleksi);
    }

    public function store(Request $request)
    {  
        // dd($request);
        $request->validate([
            'no_transaksi_pinjam'  => 'required',
            'kd_anggota'  => 'required',
            'tg_pinjam'  => 'required',
            'tg_bts_kembali'  => 'required',
            'kd_koleksi'  => 'required',
            'judul'  => 'required',
            'jns_bhn_pustaka'  => 'required',
            'jns_koleksi'  => 'required',
            'jns_media'  => 'required',
        ]);
           
        $data = $request->all();
        // dd($data);
        $check = TransaksiPinjam::create([
            'no_transaksi_pinjam'  => $data['no_transaksi_pinjam'],
            'kd_anggota'  => $data['kd_anggota'],
            'tg_pinjam'  => $data['tg_pinjam'],
            'tg_bts_kembali'  => $data['tg_bts_kembali'],
            'kd_koleksi'  => $data['kd_koleksi'],
            'judul'  => $data['judul'],
            'jns_bhn_pustaka'  => $data['jns_bhn_pustaka'],
            'jns_koleksi'  => $data['jns_koleksi'],
            'jns_media'  => $data['jns_media'],
            'id_pengguna'  => $request->user()->id,
        ]);
         
        return redirect()->route('pinjams.index')->withSuccess('Great! You have Successfully created new transaksi');
    }

    public function edit(TransaksiPinjam $pinjam)
    {   
        return view('pinjam.edit', compact('pinjam'));
    }

    public function update(Request $request, TransaksiPinjam $pinjam)
    {
        $request->validate([
            'kd_anggota'  => 'required',
            'tg_pinjam'  => 'required',
            'tg_bts_kembali'  => 'required',
            'kd_koleksi'  => 'required',
            'judul'  => 'required',
            'jns_bhn_pustaka'  => 'required',
            'jns_koleksi'  => 'required',
            'jns_media'  => 'required',
        ]);
        
        $$anggota = TransaksiPinjam::where('id', $id)->update([
            'kd_anggota'  => $request->kd_anggota,
            'tg_pinjam'  => $request->tg_pinjam,
            'tg_bts_kembali'  => $request->tg_bts_kembali,
            'kd_koleksi'  => $request->kd_koleksi,
            'judul'  => $request->judul,
            'jns_bhn_pustaka'  => $request->jns_bhn_pustaka,
            'jns_koleksi'  => $request->jns_koleksi,
            'jns_media'  => $request->jns_media,
            'id_pengguna'  => $request->user()->id,
        ]);

        return redirect()->route('pinjams.index')->withSuccess('Great! You have Successfully updated transaksi');
    }

    public function destroy(TransaksiPinjam $pinjam)
    {
        $pinjam->delete();
        return redirect()->route('pinjams.index')->with('success','Great! You have Successfully deleted transaksi');
    }

}