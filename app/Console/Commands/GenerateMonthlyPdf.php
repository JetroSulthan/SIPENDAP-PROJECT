<?php

namespace App\Console\Commands;

use App\Models\LaporanPemerintah;
use Mpdf\Mpdf;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class GenerateMonthlyPdf extends Command
{
    protected $signature = 'generate:monthlypdf';
    protected $description = 'Generate a monthly PDF and save to database';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $mpdf = new Mpdf();
        $content = "This is a monthly report generated on " . Carbon::now()->format('Y-m-d H:i:s');

        $mpdf->WriteHTML($content);

        $fileName = 'monthly_report_' . Carbon::now()->format('Y_m_d_H_i_s') . '.pdf';
        $filePath = 'pdfs/' . $fileName;
        Storage::put($filePath, $mpdf->Output('', 'S'));

        LaporanPemerintah::create([
            'laporan' => $filePath
        ]);

        $this->info('Monthly PDF generated and saved to database.');
    }

}
