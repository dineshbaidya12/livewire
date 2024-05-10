<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DownloadFiles extends Component
{
    public function render()
    {
        return view('livewire.download-files');
    }

    // public function generateStudentDetailsPDF($studentDetails)
    // {
    //     $pdf = PDF::loadView('student_details_pdf', compact('studentDetails'));
    //     return $pdf->output();
    // }
}
