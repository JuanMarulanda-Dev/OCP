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

        try {
            
            // Send email to admin of system OCP
            Mail::to(env('MAIL_FROM_ADDRESS', 'mjrvalenciano@mimsistemas.com'))->send(new ContactMail($validatedData));

            // Emit message to action succes with toastr.js
            $this->emit('ShowActionFinishedSuccess', __('contact.successMessageSended'), __('contact.success'));

        } catch (\Throwable $th) {
            //throw $th;
        }

    }

    public function render()
    {
        return view('livewire.form-contac');
    }
}
