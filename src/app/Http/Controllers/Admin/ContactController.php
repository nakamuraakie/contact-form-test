<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(10);
        return view('admin.index', compact('contacts'));
    }

    public function show(Contact $contact)
    {
        return view('admin.show', compact('contact'));
    }
}
