<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class descargasController extends Controller
{
    function PDF_7barrios(){       
        $path = storage_path().'/app/public/PDF_QR/QR CALLEJÓN 7 BARRIOS.pdf';
        $docs = \File::get($path);
        $link = response()->file($path, [
        'Content-Disposition' => 'inline; filename="7 BARRIOS.pdf"',
        ]);
            return $link;
    }

    function PDF_gustoCulposo(){       
        $path = storage_path().'/app/public/PDF_QR/QR GUSTO CULPOSO.pdf';
        $docs = \File::get($path);
        $link = response()->file($path, [
        'Content-Disposition' => 'inline; filename="GustoCulposo.pdf"',
        ]);
            return $link;
    }

    function PDF_imperial(){       
        $path = storage_path().'/app/public/PDF_QR/QR IMPERIAL.pdf';
        $docs = \File::get($path);
        $link = response()->file($path, [
        'Content-Disposition' => 'inline; filename="Imperial.pdf"',
        ]);
            return $link;
    }

    function PDF_laUltimaDelDesierto(){       
        $path = storage_path().'/app/public/PDF_QR/QR LA ÚLTIMA DEL DESIERTO.pdf';
        $docs = \File::get($path);
        $link = response()->file($path, [
        'Content-Disposition' => 'inline; filename="LaUltimaDelDesierto.pdf"',
        ]);
            return $link;
    }

    function PDF_legendaria(){       
        $path = storage_path().'/app/public/PDF_QR/QR LEGENDARIA.pdf';
        $docs = \File::get($path);
        $link = response()->file($path, [
        'Content-Disposition' => 'inline; filename="Legendaria.pdf"',
        ]);
            return $link;
    }

    
}
