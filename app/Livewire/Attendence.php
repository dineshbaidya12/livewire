<?php

namespace App\Livewire;

use App\Models\Attendence as AttendenceModel;
use Livewire\Component;

class Attendence extends Component
{
    // public $attendence;

    public function mount(){
        // $this->attendence = AttendenceModel::get();
    }

    public function render()
    {
        return view('livewire.attendence', [
            'attendence' => AttendenceModel::limit(30000)->get()
        ]);
    }

    public function placeholder()
    {
        return view('pleasewait');
    }
}
