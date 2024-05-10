<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class UserLists extends Component
{ 
    public $firstname = "";
    public $lastname = "";
    public $email = "";
    public $edit_user_id = 0;
    public $showModal = false;
    public $users;
    public $d_id = 0;
    public $hey = "Save changes";

    protected $listners= ['yesAdd' => 'add'];

    public function listeners()
    {
      return [
        'yesAdd' => 'add',
      ];
    }

    public function mount()
    {
        $this->users = User::get();
    }

    public function render()
    {
        return view('livewire.user-lists');
    }

    public function edit_modal($id){
        $user=User::where('id', $id)->first();
        $this->firstname = $user->first_name;
        $this->lastname = $user->last_name;
        $this->email = $user->email;
        $this->edit_user_id = $id;
        $this->showModal = true;
    }

    public function save(){
        $validatedData = $this->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        return $this->firstname;

        $user = User::find($this->edit_user_id);
        $user->first_name = $this->firstname;
        $user->last_name = $this->lastname;
        $user->email = $this->email;
        $user->save();
        $this->firstname = "";
        $this->lastname = "";
        $this->email = "";
        $this->edit_user_id = 0;
        $this->showModal = false;
    }

    #[On('yesDelete')]
    public function delete(){
        User::where('id', $this->d_id )->delete();
        $this->users = User::get();
    }

    public function deleteWithSweetAlert($userId)
    {
        $this->d_id = $userId;
        $this->dispatch('confirmDelete', ['title' => 'Warning!', 'text'=>'Do you really want to delete this student?', 'icon' => 'warning']);
    }

    #[On('yesAdd')]
    public function add(){
        $user = new User();
        $rand = rand(1, 9999);
        $user->first_name = "New_".$rand;
        $user->last_name = "User". $rand;
        $user->email = "User". $rand."@email.com";
        $user->password = '1aac02dfa9877c60d4d253c70feade1240591498';
        $user->save();
        $this->users = User::get();
    }

    public function addNewStudent(){
        $this->dispatch('create_new_student', ['title' => 'Warning!', 'text'=>'Do you really want to create new student?', 'icon' => 'warning']);
    }

}
