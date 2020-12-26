<?php

namespace App\Http\Livewire;

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class FormContac extends Component
{
    public $names, $lastnames, $case, $comments;

    protected $rules = [
        'names' => 'required|string',
        'lastnames' => 'required|string',
        'case' => 'required|string',
        'comments' => 'required|string',
    ];

    public function send_email_contact()
    {
        //Validate User's Fields
        $validatedData = $this->validate();

        Mail::to('judama3012@gmail.com')->send(new ContactMail($validatedData));
    }

    public function render()
    {
        return view('livewire.form-contac');
    }
}
