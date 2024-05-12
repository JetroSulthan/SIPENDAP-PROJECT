<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use App\Models\Petani;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BerkasController extends Controller
{
    public function index()
    {
        $datapetani = Petani::all();

        return view('pemerintah.laporankios', compact('datapetani'));
    }

    public function view($id)
    {
        $data = Petani::find($id);

        return view(); 
    }

    // public function view_pdf()
    // {
    //     $mpdf = new \Mpdf\Mpdf();
    //     $datapetani= Petani::all();
    //     // $datapetani = $petani;
    //     $mpdf->WriteHTML(view('pemerintah.laporankios', compact('datapetani')));
    //     $mpdf->Output();
    // }

    // public function download_pdf()
    // {
    //     $mpdf = new \Mpdf\Mpdf();
    //     $petani = Petani::getById();
    //     $mpdf->WriteHTML(view("pemerintah.liatlaporan", ['datapetani'=>$petani]));
    //     $mpdf->Output('laporan.pdf', 'D');
    // }
    
}
