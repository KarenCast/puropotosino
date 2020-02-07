<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class descargasController extends Controller
{
    function downloadCSV($file){
        $pathtoFile = public_path().'/FilesCSV/'.$file.'.xlsx';
        return response()->download($pathtoFile);
    }
}
