<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function downloadPDF()
    {
        $data = [
            'title' => 'Dynamic Laravel PDF Example',
            'content' => 'This content should be dynamically generated!'
        ];
    
        dd($data); // Check the data before rendering the PDF
        $pdf = Pdf::loadView('pdf.example', $data);
    
        return $pdf->download('example.pdf');
    }
}    