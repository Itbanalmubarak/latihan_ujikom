<?php

namespace App\Http\Controllers;
use App\Models\TransaksiKembali;
use App\Models\TransaksiPinjam;
use App\Models\Koleksi;
use App\Models\Anggota;
use Illuminate\Http\Request;
use PDF;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [];
        return view('report/index', compact('data'));
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

        $data = TransaksiKembali::with('anggota', 'pengguna')->whereBetween('tg_pinjam', [$request->tg_awal, $request->tg_akhir])->get()->toArray();
        // return view('report/index', compact('data'));

        $pdf = PDF::loadView('report/pdf', compact('data'));
     
        return $pdf->stream('report.pdf');
    
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
