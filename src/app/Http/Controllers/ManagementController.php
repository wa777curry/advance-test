<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ManagementController extends Controller
{

    public function search(Request $request) {
        $fullname = $request->input('fullname');
        $gender = $request->input('gender');
        $email = $request->input("email");
        $from = $request->input('from');
        $until = $request->input('until');

        $results = Contact::where('fullname', 'like', "%$fullname%")
        ->where('gender', $gender)
        ->whereBetween('created_at', [$from, $until])
        ->where('email', 'like', "%$email%")
        ->get();

        return view('management', ['results' => $results]);
    }

    public function find() {
        return view('management');
    }
}
