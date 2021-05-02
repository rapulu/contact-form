<?php

namespace App\Http\Controllers;

use App\Events\ContactFormEvent;
use App\Http\Requests\ContactFormRequest;
use App\Models\ContactForm;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact-me');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactFormRequest $request, ContactForm $contactForm)
    {
        if (!$contactForm->canSubmitForm($request->email)) {
            $warning = 'Hey, give the form 5mins before you submit another one.';
            return back()->withInput()->with('chill', $warning);
        }

        $contactForm = ContactForm::create($request->validated());

        if ($request->hasFile('file')) {
            $fileName = time().'.'.$request->file->extension();
            $path = $request->file('file')->storeAs('documents', $fileName, 'public');
            $contactForm->update(['file' => $path]);
        }

        event(new ContactFormEvent($contactForm));

        return redirect(route('show.form'))->with('status', 'Form submitted');

    }

}
