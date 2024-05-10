<?php

namespace App\Http\Controllers;

use App\Livewire\Attendence;
use App\Models\Attendence as ModelsAttendence;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Barryvdh\DomPDF\Facade\Pdf;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index(){
        return view('index');
    }
    public function testing(){
        echo 'Routing Testing';
    }
    public function addNewStudent(){
        return view('add-edit-student', ['studentId' => null]);
    }

    public function editStudent($id){
        return view('add-edit-student', ['studentId' => $id]);
    }

    public function studentClasses(){
        return view('student-class');
    }

    public function randomFormSubmission(){
        return view('random-form-submissions');
    }

    public function randomForm(){
        return view('random-form');
    }

    public function pagination(){
        $users = User::paginate(5);
        return view('pagination', compact('users'));
    }

    public function attendence(){
        return view('attendence');
    }

    public function attendence2(){
        $attendence = ModelsAttendence::limit(30000)->get();
        return view('attendence2', compact('attendence'));
    }

    public function downloadFiles(){
        return view('download-files');
    }

    public function generateStudentDetailsPDF($studentDetails)
    {
        $pdf = PDF::loadView('student_details_pdf', compact('studentDetails'));
        return $pdf->output();
    }

    public function posts(){
        return view('posts');
    }
}
