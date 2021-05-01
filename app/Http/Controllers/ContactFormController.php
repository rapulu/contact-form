<?php

namespace App\Http\Controllers;

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
        return view('contact-us');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactFormRequest $request)
    {
        $model = ContactForm::create($request->validated());

        if ($request->hasFile('file')) {
            $fileName = time().'.'.$request->file->extension();
            $path = $request->file('file')->storeAs('documents', $fileName, 'public');
            $model->update(['file' => $path]);
        }

        return redirect(route('show.form'))->with('status', 'Form submitted');
    }

}
