<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{

    public function index() {
        return view('index');
    }

    public function confirm(ContactRequest $request) {
        $contact = $request->only(['firstname', 'lastname', 'gender', 'email', 'postcode', 'address', 'building_name', 'opinion']);
        $contact['fullname'] = $contact['firstname'] . ' ' . $contact['lastname'];

        session(['contact' => $contact]);

        return view('confirm', compact('contact'));
    }

    public function store(ContactRequest $request) {
        $contact = $request->only(['firstname', 'lastname', 'email', 'postcode', 'address', 'building_name', 'opinion']);

        $gender = $request->input('gender');

        $genderValue = 0;
        if ($gender === '男性') {
            $genderValue = 1;
        } elseif ($gender === '女性') {
            $genderValue = 2;
        }

        $contact['gender'] = $genderValue;

        $contact['fullname'] = $contact['firstname'] . ' ' . $contact['lastname'];

        Contact::create($contact);
        return redirect()->route('contacts.thanks');
    }

    public function thanks() {
        return view('thanks');
    }

    public function back() {
        $contact = session('contact');
        return view('index', compact('contact'));
    }
}
