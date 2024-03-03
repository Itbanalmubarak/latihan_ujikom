<?php

namespace App\Http\Controllers;
use App\Models\TransaksiKembali;
use App\Models\TransaksiPinjam;
use App\Models\Koleksi;
use App\Models\Anggota;
use Illuminate\Http\Request;
use PDF;
use TCPDF;
class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = [];
        // return view('report/index', compact('data'));

        // return view('report/index');
        $data = TransaksiKembali::all();
    return view('report/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $pinjams = TransaksiPinjam::All();
        // $koleksis = Koleksi::All();
        // $anggotas = Anggota::All();
        // return view('kembali/create', compact('koleksis', 'anggotas', 'pinjams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // $data = TransaksiKembali::with('anggota', 'pengguna')->whereBetween('tg_pinjam', [$request->tg_awal, $request->tg_akhir])->get()->toArray();
        // // return view('report/index', compact('data'));

        // $pdf = PDF::loadView('report/pdf', compact('data'));
     
        // return $pdf->stream('report.pdf');
    
    }

    /**
     * Display the specified resource.
     */
    public function show($trxPinjam)
    {
        // $pinjam = TransaksiPinjam::where('no_transaksi_pinjam', $trxPinjam)->first();
        // return response()->json($pinjam);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransaksiKembali $kembalis)
    {
        // return view('kembali.edit', compact('kembalis'));
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
        // $kembali->delete();
        // return redirect()->route('kembalis.index')->with('success','Great! You have Successfully deleted transaksi');
    }
    public function generatePDF(Request $request)
{
    $tg_awal = $request->input('tg_awal');
    $tg_akhir = $request->input('tg_akhir');

    // Proses filter data dan pengambilan data dari database

    $pdf = new TCPDF();
    $pdf->SetMargins(15, 15, 15);
    $pdf->AddPage();

    // Tambahkan konten PDF di sini, misalnya tabel dengan data yang diambil dari database

    $pdf->Output('report.pdf', 'S');
    
    // Return the PDF as response
    return response($pdf->Output('report.pdf', 'S'), 200, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="report.pdf"'
    ]);
}
}
