<?php

namespace App\Console\Commands;

use Mpdf\Mpdf;
use Carbon\Carbon;
use App\Models\Kios;
use App\Models\LaporanPemerintah;
use App\Models\Persetujuan;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;


class GeneratePDF extends Command
{
    protected $signature = 'pdf:generate';

    public function handle()
    {
        // Ambil konten HTML
        
        $petani = Kios::all();
        $persetujuan = Persetujuan::all();
        $tgl = Carbon::now()->isoFormat('ddd, LL');
        // Buat instance Mpdf
        $html = view('pemerintah.test', compact('petani', 'tgl', 'persetujuan'));

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);

        // Simpan PDF ke dalam database
        $pdfContent = $mpdf->Output('', 'S');
        $pdfName = 'pdf_' . date('YmdHis') . '.pdf';
        Storage::disk('public')->put($pdfName, $pdfContent);

        $laporan = new LaporanPemerintah();
        $laporan->laporan = $pdfName;
        $laporan->save();

        $this->info('PDF berhasil dihasilkan dan disimpan ke database.');
    }

}
