<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RandomForm as RandomFormModel;
use Illuminate\Support\Facades\Session;
use Livewire\WithPagination;

class RandomFormSubmission extends Component
{
    use WithPagination;
    public function mount()
    {
        if (session()->has('success_msg')) {
            $this->dispatch('alert', ['title' => 'Success!', 'message' => session("success_msg"), 'icon' => 'success']);
            Session::forget('success_msg');
        }
    }
    public function render()
    {
        return view('livewire.random-form-submission', [
            'formData' => RandomFormModel::paginate(5),
        ]);
    }

    public function deleteSubmission($id)
    {
        $form = RandomFormModel::find($id);
        $form->delete();
        $this->resetPage();
    }
}
