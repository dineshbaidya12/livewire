<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Livewire\AddStudentForm;
use Illuminate\Support\Facades\Session;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Livewire\Attributes\Url;

class StudentLists extends Component
{
    use WithPagination;
    public $users;
    public $delete_user_id = 0;
    public $firstname = "testing";

    // #[Url(as: 'name', except: 'dinesh', keep: true)]
    #[Url(as: 'name', history: true)]
    public $student_name = '';
    #[Url(as: 'class')]
    public $class = '';

    public function updated($propertyName)
    {
        if ($propertyName == 'searchTerm' || $propertyName == 'searchterm_class') {
            $this->users = $this->getUsers();
        }
    }

    public function mount(){
        if (session()->has('success_msg')) {
            $this->dispatch('alert', ['title' => 'Success!', 'message' => session("success_msg"), 'icon' => 'success']);
            Session::forget('success_msg');
        }
        $this->users = $this->getUsers();
    }

    public function render()
    {
        $theStudents = User::select('users.first_name', 'users.last_name', 'users.email', 'users.id', 'SC.class')
                ->join('student_classes as SC', 'SC.student_id', '=', 'users.id')
                ->orderBy('users.created_at', 'DESC')
                ->where(function ($query) {
                    $query->where('users.first_name', 'like', '%'.$this->student_name.'%')
                        ->orWhere('users.last_name', 'like', '%'.$this->student_name.'%')
                        ->orWhereRaw("CONCAT(users.first_name, ' ', users.last_name) LIKE ?", ['%'.$this->student_name.'%'])
                        ->orWhere('users.email', 'like', '%'.$this->student_name.'%');
                });
        // $theStudents->whereRaw('SOUNDEX(users.first_name) = SOUNDEX(?)', [$this->searchTerm]); for matching case
            if ($this->class != "") {
                $theStudents->where('SC.class', $this->class);
            }

        $theStudents = $theStudents->paginate(5);
        return view('livewire.student-lists', compact('theStudents'));
    }

    public function deleteStudent($id){
        $this->delete_user_id = $id;
        $this->users = $this->getUsers();
        $this->dispatch('delete-alert', ['title' => 'Are you sure you want to delete this student?', 'message' => 'This action can not revert', 'icon' => 'warning']);
    }

    #[On('deletedConfirmed')]
    public function deletedConfirmed(){
        // $this->dispatch('alert', ['title' => 'Success!', 'message' => 'User deleted successfully', 'icon' => 'success']);   
        $user = User::find($this->delete_user_id);
        if(!$user){
            $this->dispatch('alert', ['title' => 'Error!', 'message' => 'User not found', 'icon' => 'error']);
            return;
        }
        $user->delete();
        $this->users = $this->getUsers(); 
        $this->dispatch('alert', ['title' => 'Success!', 'message' => 'User deleted successfully', 'icon' => 'success']);   
    }

    public function getUsers(){
        $query = User::select('users.first_name', 'users.last_name', 'users.email', 'users.id', 'SC.class')
            ->join('student_classes as SC', 'SC.student_id', '=', 'users.id')
            ->orderBy('users.created_at', 'DESC')
            ->where(function ($query) {
                $query->where('users.first_name', 'like', '%'.$this->student_name.'%')
                    ->orWhere('users.last_name', 'like', '%'.$this->student_name.'%')
                    ->orWhereRaw("CONCAT(users.first_name, ' ', users.last_name) LIKE ?", ['%'.$this->student_name.'%'])
                    ->orWhere('users.email', 'like', '%'.$this->student_name.'%');
            });

        if ($this->class != "") {
            $query->where('SC.class', $this->class);
        }

        return $query->get();   
    }

    // public function testing(){
    //     // AddStudentForm::testing();
    //     (new AddStudentForm)->testing();
    // }

    public function testing(){
        $user = new User();
        $user->first_name = 'abcd';
        $user->last_name = 'bcde';
        $user->email = 'efgh';
        $user->password =  bcrypt('abcd');
        $user->save();
    }

}
