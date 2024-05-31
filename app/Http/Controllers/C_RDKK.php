<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use App\Models\M_Petani;
use App\Models\Petani;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Mpdf\Tag\H1;
use PDF;

class C_RDKK extends Controller
{

    public function view_rdkk()
    {
        $datapetani = M_Petani::all();

        return view('pemerintah.V_rdkk', compact('datapetani'));
    }

    public function view_pdf()
    {
        $mpdf = new \Mpdf\Mpdf();
        $datapetani = M_Petani::all();
        $html = view('pemerintah.viewrdkk', compact('datapetani'));
        $mpdf->WriteHTML($html);
        $mpdf->Output('nama_file.pdf', 'I');
    }


    
    
}
