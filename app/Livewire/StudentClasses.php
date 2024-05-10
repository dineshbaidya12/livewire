<?php

namespace App\Livewire;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\StudentClass;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StudentClasses extends Component
{
    public $students;
    public $student_name;
    public $roll;
    public $student_class;
    public $student_email;
    public $student_id = 0;
    public $show_sudent_details = false;

    public function mount(){
        $this->students = User::selectRaw("CONCAT(first_name, ' ', last_name) as name, email, SC.class, users.id")
            ->join('student_classes as SC', 'SC.student_id', '=', 'users.id')
            ->get();
    }

    public function render()
    { 
        return view('livewire.student-classes', [
            'allstudents' => User::selectRaw("CONCAT(first_name, ' ', last_name) as name, email, SC.class, users.id")
            ->join('student_classes as SC', 'SC.student_id', '=', 'users.id')
            ->get()
        ]);
    }
    

    #[On('get_student_details')]
    public function get_student_details($student_id){
        $this->student_id = $student_id;
        $studentDetails = User::selectRaw("CONCAT(first_name, ' ', last_name) as name, email, SC.class, users.id as id")
        ->join('student_classes as SC', 'SC.student_id', '=', 'users.id')
        ->where('users.id', $student_id)
        ->first();
        $this->student_name = $studentDetails->name;
        $this->student_class = $studentDetails->class;
        $this->student_email = $studentDetails->email;
        $this->roll = $studentDetails->id;
        $this->students = User::selectRaw("CONCAT(first_name, ' ', last_name) as name, email, SC.class, users.id")
        ->join('student_classes as SC', 'SC.student_id', '=', 'users.id')
        ->get();
        $this->show_sudent_details = true;
    }

    public function updated($propertyName)
    {
        $this->students = User::selectRaw("CONCAT(first_name, ' ', last_name) as name, email, SC.class, users.id")
            ->join('student_classes as SC', 'SC.student_id', '=', 'users.id')
            ->get();
    }

    #[On('updateStudentClass')]
    public function updateStudentClass($params)
    {
        $params = explode('_', $params);
        $studentId = $params[0];
        $class = $params[1];
        $this->students = $this->getStudent();
        if (!is_numeric($studentId)) {
            return;
        }
        $student = StudentClass::where('student_id', $studentId)->first();
        if (!$student) {
            $this->responseMsg('Error!', 'Student not found.', 'error');
            return;
        }
        $student->class = $class;
        $student->save();
        $this->students = $this->getStudent();
    }

    public function responseMsg($title, $msg, $icon){
        $this->dispatch('alert', ['title' => $title, 'message' => $msg, 'icon' => $icon]);
    }

    public function getStudent(){
        return User::selectRaw("CONCAT(first_name, ' ', last_name) as name, email, SC.class, users.id")
        ->join('student_classes as SC', 'SC.student_id', '=', 'users.id')
        ->get();
    }

    public function singleClick(){
        $this->dispatch('alert', ['title' => 'Success', 'message' => "Single click", 'icon' => 'success']);
    }

    public function doubleClick(){
        $not = new Notification();
        $not->subject = $this->generateRandomString(15);
        $not->content = $this->generateRandomString(35);
        $not->date = Carbon::now();
        $not->save();
        $this->dispatch('updateNotification');
        $this->dispatch('alert', ['title' => 'Success', 'message' => "Notification Added", 'icon' => 'success']);
    }

    function generateRandomString($length = 10) {
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        $withSpace = false;
        for ($i = 0; $i < $length; $i++) {
            $withSpace = rand(0, 10) < 2;
            if ($withSpace) {
                $randomString .= ' ';
            } else {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
        }
        return $randomString;
    }

    public function download($studentId){
        $studentDetails = User::selectRaw('CONCAT(first_name, " ", last_name) as name, email, SC.class, users.id as roll')
        ->where('users.id', $studentId)
        ->join('student_classes as SC', 'SC.student_id', '=', 'users.id')
        ->first();
        $pdfContent = (new Controller)->generateStudentDetailsPDF($studentDetails);
        $filename = $studentDetails->name . '.pdf';
        $directory = 'public/temp';
        Storage::makeDirectory($directory);
        $tempPath = storage_path('app/' . $directory . '/' . $filename);
        file_put_contents($tempPath, $pdfContent);
        return response()->download($tempPath, $filename)->deleteFileAfterSend(true);
    }

}
