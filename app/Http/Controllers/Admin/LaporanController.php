<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        return view('Admin.Laporan.index');
    }
     
    public function getLaporan(Request $request)
    {
        $form = $request->from . ' ' . '00:00:00';
        $to = $request->to . ' ' . '23:59:59';

        $pengaduan = Pengaduan::whereBetWeen('tgl_pengaduan', [$form , $to])->get();

        return view('Admin.Laporan.index', ['pengaduan' => $pengaduan, 'from' =>$form, 'to' => $to]);
    }
    public function cetakLaporan($form, $to)
    {
       $pengaduan = Pengaduan::whereBetween('tgl_pengaduan', [$form, $to])->get();

       $pdf = FacadePdf::loadView('Admin.Laporan.cetak', ['pengaduan' => $pengaduan]);
       return $pdf->download('laporan-pennaduan.pdf');
    }
} 
