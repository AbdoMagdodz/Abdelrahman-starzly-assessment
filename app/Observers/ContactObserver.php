<?php

namespace App\Observers;

use App\Contact;
use App\Mail\ContactCreated;
use Illuminate\Support\Facades\Mail;

class ContactObserver
{
    /**
     * @param Contact $contact
     * @throws \Exception
     */
    public function created(Contact $contact)
    {
        try {
            Mail::to($contact->email)->send(new ContactCreated($contact));
        } catch (\Exception $exception) {
            throw new \Exception('From Abdbelrahman xD : Please add a valid SMTP credentials to test the verification token');
        }

    }

    /**
     * Handle the contact "updated" event.
     *
     * @param \App\Contact $contact
     * @return void
     */
    public function updated(Contact $contact)
    {
        //
    }

    /**
     * Handle the contact "deleted" event.
     *
     * @param \App\Contact $contact
     * @return void
     */
    public function deleted(Contact $contact)
    {
        //
    }

    /**
     * Handle the contact "restored" event.
     *
     * @param \App\Contact $contact
     * @return void
     */
    public function restored(Contact $contact)
    {
        //
    }

    /**
     * Handle the contact "force deleted" event.
     *
     * @param \App\Contact $contact
     * @return void
     */
    public function forceDeleted(Contact $contact)
    {
        //
    }
}
