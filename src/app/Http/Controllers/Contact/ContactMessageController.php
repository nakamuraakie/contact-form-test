<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Http\Requests\ContactFormRequest;

class ContactMessageController extends Controller
{
    public function index(){

    return view('contact.form');

}

    public function confirm(ContactFormRequest $request){

    $validated = $request->validated();




    $validated = $request->validated();
    return view('contact.confirm', compact('validated'));
}

public function store(ContactFormRequest $request)
{
    $data = $request->all();
    ContactMessage::create($data);

    return redirect()->route('contact.thanks');

}

public function thanks()
{
    return view('contact.thanks');
}

}