<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Contact;
use App\Http\Requests\ContactRequest;
use App\Organization;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::filter(request()->all())->with('organization')->paginate(10);
        $organizations = Organization::all();

        return view('contacts.index', compact('contacts', 'organizations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = route('contacts.store');
        $organizations = Organization::all();

        return view('contacts.form', compact('organizations', 'action'));
    }

    /**
     * @param ContactRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ContactRequest $request)
    {
        $contact = new Contact;

        foreach ($request->except(['_token']) as $filed => $value) {
            $contact->$filed = $value;
        }

        $contact->verification_token = Hash::make(uniqid());

        $contact->save();

        Session::flash('success', 'Contact has been added successfully');

        return redirect(route('contacts.index'));
    }

    /**
     * Display the specified resource.
     * @param Contact $contact
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * @param Contact $contact
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Contact $contact)
    {
        $contact->load('organization');
        $organizations = Organization::all();
        $action = route('contacts.update', $contact->id);

        return view('contacts.form', compact('contact', 'organizations', 'action'));
    }

    /**
     * @param ContactRequest $request
     * @param Contact $contact
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ContactRequest $request, Contact $contact)
    {
        $contact->update($request->except(['_token', '_method']));

        Session::flash('success', 'Contact has been added successfully');

        return redirect(route('contacts.index'));
    }

    /**
     * @param Contact $contact
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        Session::flash('success', 'Contact has been deleted successfully');

        return redirect()->back();
    }

    /**
     * @param Contact $contact
     * @param $verificationToken
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function verifyEmail(Contact $contact, $verificationToken)
    {
        if ($contact->verification_token == $verificationToken) {
            $contact->is_email_verified = 1;
            $contact->save();

            return redirect(url('contacts/verified'));
        }

        return abort(404);
    }
}
