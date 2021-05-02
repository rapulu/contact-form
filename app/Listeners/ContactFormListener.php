<?php

namespace App\Listeners;

use App\Events\ContactFormEvent;
use App\Mail\ContactFormMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class ContactFormListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ContactFormEvent $event)
    {
        Mail::to(config('mail.to.address'))->send(new ContactFormMail($event->contactForm));
    }
}
