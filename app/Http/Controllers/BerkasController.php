<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use App\Models\Petani;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Mpdf\Tag\H1;
use PDF;

class BerkasController extends Controller
{

    public function view_rdkk()
    {
        $datapetani = Petani::all();

        return view('pemerintah.rdkk', compact('datapetani'));
    }

    public function view_pdf()
    {
        $mpdf = new \Mpdf\Mpdf();
        $datapetani = Petani::all();
        $html = view('pemerintah.viewrdkk', compact('datapetani'));
        $mpdf->WriteHTML($html);
        $mpdf->Output('nama_file.pdf', 'I');
    }


    
    
}
