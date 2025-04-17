<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    // Method for displaying pending registrations
    public function pending()
    {
        $registrations = Registration::where('status', 'pending')->get();
        return view('admin.registrations.pending', compact('registrations'));
    }

    // Method for displaying approved registrations
    public function approved()
    {
        $registrations = Registration::where('status', 'approved')->get();
        return view('admin.registrations.approved', compact('registrations'));
    }

    // Method for displaying rejected registrations
    public function rejected()
    {
        $registrations = Registration::where('status', 'rejected')->get();
        return view('admin.registrations.rejected', compact('registrations'));
    }

    // Method for approving a registration
    public function approve($id)
    {
        $registration = Registration::findOrFail($id);
        $registration->status = 'approved';
        $registration->rejection_reason = null; // Clear any old rejection reason
        $registration->save();

        return redirect()->route('admin.pending-registrations')->with('success', 'Registration approved!');
    }

    // Method for rejecting a registration with optional reason
    public function reject(Request $request, $id)
    {
        $request->validate([
            'rejection_reason' => 'nullable|string|max:255',
        ]);

        $registration = Registration::findOrFail($id);
        $registration->status = 'rejected';
        $registration->rejection_reason = $request->input('rejection_reason');
        $registration->save();

        return redirect()->route('admin.rejected-registrations')->with('success', 'Registration rejected successfully.');
    }

    // ✅ Method for printing certificate
    public function print($id)
    {
        $registration = Registration::findOrFail($id);

        // Ensure only approved registrations can be printed
        if ($registration->status !== 'approved') {
            return redirect()->back()->with('error', 'Only approved registrations can be printed.');
        }

        return view('admin.certificates.print', compact('registration'));
    }
}
