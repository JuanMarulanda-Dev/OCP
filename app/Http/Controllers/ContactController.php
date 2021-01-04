<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $module = 'contact';

    public function showContactForm()
    {
            return view('Modules.contacto.contacto', ['module' => $this->module]);
    }
}
