<?php

// app/Http/Controllers/Admin/CertificateController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        $registrations = Registration::where('status', 'approved')->get();
        return view('admin.certificates.index', compact('registrations'));
    }

    public function print($id)
    {
        $registration = Registration::findOrFail($id);
        return view('admin.certificates.print', compact('registration'));
    }
}
