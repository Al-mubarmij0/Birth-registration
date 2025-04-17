<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration; // Corrected namespace

class BirthRegistrationController extends Controller
{
    public function showForm()
    {
        return view('register');
    }

    public function submitForm(Request $request)
    {
        $validated = $request->validate([
            'registration_center' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'lga' => 'required|string|max:255',
            'registration_date' => 'required|date',
            'first_name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'gender' => 'required|string|max:50',
            'date_of_birth' => 'required|date',
            'place_of_birth' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'father_occupation' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'mother_occupation' => 'required|string|max:255',
        ]);

        // Optional: Save to database
        Registration::create($validated);

        return redirect()->back()->with('success', 'Birth registration submitted successfully!');

        // return redirect()->route('home')->with('success', 'Birth registration submitted successfully!');
    }
}
