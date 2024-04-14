<?php

namespace App\Http\Controllers;

use App\Models\Petani;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PemerintahController extends Controller
{
    public function index()
    {
        $reports = Report::where('user_id', $user_id)->get();
        //return json_encode($data);
        return view(
            'pemerintah.dashboard',
            ['data' => $data]
        );
    }
}
