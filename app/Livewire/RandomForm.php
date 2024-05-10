<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\RandomForm as RandomFormModel;
use Illuminate\Support\Facades\Session;

class RandomForm extends Component
{
    use WithFileUploads;
    public $textInput;
    public $numberInput;
    public $emailInput;
    public $urlInput;
    public $selectInput;
    public $checkboxInput1;
    public $checkboxInput2;
    public $radioInput;
    public $fileInput;
    public $passwordInput;
    public $confirmPasswordInput;



    public function render()
    {
        return view('livewire.random-form');
    }

    public function submitForm(){
        $validated = $this->validate([
            'textInput' => 'required|min:3|max:15',
            'numberInput' => 'required|numeric',
            'emailInput' => 'required|email',
            'urlInput' => 'required|url',
            'selectInput' => 'required',
            'checkboxInput1' => 'required|in:1',
            'radioInput' => 'required',
            'fileInput' => 'required|file|mimes:jpg,png,jpeg,webp|max:2048',
            'passwordInput' => 'required',
            'confirmPasswordInput' => 'required|same:passwordInput'
        ], [
            'textInput.required' => 'Please provide valid text input',
            'textInput.min' => 'Text input should have atleast 3 charecters',
            'textInput.max' => 'Text input should not have more than 15 charecters',
            'emailInput.required' => 'Email is required',
            'emailInput.email' => 'Please enter a valid email address.',
            'numberInput.required' => 'Number feild is required',
            'emailInput.numeric' => 'Please provide valid number',
        ]);
        $currentDate = Carbon::now();
        $fileName = $currentDate->format('Y-m-d_H-i-s') . '_' . uniqid() . '.' . $this->fileInput->getClientOriginalExtension();
        $image = $this->fileInput;
        $destination = 'uploads/' . $fileName;
        if (File::put($destination, file_get_contents($image->getRealPath()))) {
            $form = new RandomFormModel();
            $form->text = $this->textInput;
            $form->email = $this->emailInput;
            $form->url = $this->urlInput;
            $form->numberInput = $this->numberInput;
            $form->select = $this->selectInput;
            $form->checkbox1 = $this->checkboxInput1;
            $form->checkbox2 = $this->checkboxInput2;
            $form->radio = $this->radioInput;
            $form->file = $fileName;
            $form->password = $this->passwordInput;
            $form->save();
            Session::put('success_msg', 'Form Submitted Succesfully.');
            $this->dispatch('redirectToPage', 'random_form_submission');
            return;
        }
        $this->responseMsg('Error', 'Something went wrong.', 'error');
    }

    public function responseMsg($title, $msg, $icon){
        $this->dispatch('alert', ['title' => $title, 'message' => $msg, 'icon' => $icon]);
    }
}
