<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    use HasFactory;

    // Expiration time in minutes.
    const EXPIRATION_TIME = 5;

    protected $fillable = [
        'name',
        'email',
        'message',
        'file',
    ];

    public function canSubmitForm($email) : bool
    {
        $contactForm = ContactForm::where('email', $email)->latest()->first();

        if(!$contactForm){
            return true;
        }

        return $contactForm->created_at->addMinutes(self::EXPIRATION_TIME) <= Carbon::now();
    }
}
