<?php

namespace App\Livewire;

use App\Models\StudentClass;
use App\Models\User;
use Livewire\Attributes\Validate; 
use Livewire\Component;
use Illuminate\Support\Facades\Redirect;
use App\Livewire\StudentLists;
use Illuminate\Support\Facades\Session;

class AddStudentForm extends Component
{ 
    #[Validate('required')] 
    public $firstname = '';
 
    #[Validate('required')] 
    public $lastname = '';
    
    #[Validate('required|email')] 
    public $email = '';

    #[Validate('required')] 
    public $password = '';

    #[Validate('required|in:5,6,7,8')] 
    public $class = '';

    public $studentId;

    public function mount($studentId = null)
    {
        $this->studentId = $studentId;
        if ($this->studentId) {
            $student = User::select('users.id', 'users.first_name', 'users.last_name', 'users.email', 'SC.class')
            ->where('users.id', $this->studentId)
            ->join('student_classes as SC', 'SC.student_id', '=', 'users.id')
            ->first();
            if ($student) {
                $this->firstname = $student->first_name;
                $this->lastname = $student->last_name;
                $this->email = $student->email;
                $this->class = $student->class;
            }
        }
    }

    public function render()
    {
        return view('livewire.add-student-form');
    }

    public function register(){
        $this->validate(); 
        if($this->studentId == null){
            $existingEmail = User::select('id')->where('email', $this->email)->first();
            if($existingEmail){
                $this->dispatch('alert', ['title' => 'Email Already Exist', 'message' => '"'.$this->email.'" this email already exist please try another.', 'icon' => 'error']);
                return;
            }
            $user = new User();
        }else{
            $user = User::find($this->studentId);
            if(!$user){
                return redirect()->route('home')->with('error', 'Student not found');
            }
        }
        $user->first_name = $this->firstname;
        $user->last_name = $this->lastname;
        $user->email = $this->email;
        $user->password =  bcrypt($this->password);
        $user->save();
        
        $student_class= StudentClass::where('student_id', $user->id)->first();
        if($student_class){
            $student_class->class = $this->class;
        }else{
            $student_class = new StudentClass();
            $student_class->class = $this->class;
            $student_class->student_id = $user->id;
        }
        $student_class->save();
        Session::put('success_msg', 'Post Added Successfully.');
        $this->redirect(route('home'), true);
    }
}
