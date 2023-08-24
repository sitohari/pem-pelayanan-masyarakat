<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\Respon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResponController extends Controller
{
    public function createOrUpdate(Request $request)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $request->id_pengaduan)->first();

        $respon = Respon::where('id_pengaduan', $request->id_pengaduan)->first();

        if ($respon) {
           $pengaduan->update(['status' => $request->status]);

            $respon->update([
                'tgl_respon' => date('Y-m-d'),
                'respon' => $request->respon,
                'id_petugas' => Auth::guard('admin')->user()->id_petugas,
            ]);

            return redirect()->route('pengaduan.show', ['pengaduan' => $pengaduan, 'respon' => $respon]);
        } else {
            $pengaduan = Pengaduan::where('id_pengaduan', $request->id_pengaduan)->first();

            $respon = Respon::create([
                'id_pengaduan' => $request->id_pengaduan,
                'tgl_respon' => date('Y-m-d'),
                'respon' => $request->respon,
                'id_petugas' => Auth::guard('admin')->user()->id_petugas,
            ]);
            return redirect()->route('pengaduan.show', ['pengaduan' => $pengaduan, 'respon'=> $respon])->with(['status' => 'BERHASIL DIKIRIM!']);
        }
    }

}
