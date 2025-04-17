@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section class="hero" role="img" aria-label="Newborn baby image">
    <div class="hero-content">
        <h1>Welcome to the Birth Registration System</h1>
        <p>Register births, manage certificates, and access your records easily.</p>
    </div>
</section>

<!-- How It Works Section -->
<section class="container text-center mt-5">
    <h2>How It Works</h2>
    <p>Follow these simple steps to register a birth:</p>
    <div class="row how-it-works">
        <div class="col-md-3">
            <i class="fa-solid fa-pen-to-square fa-3x"></i>
            <h4>Step 1: Register Birth</h4>
            <p>Fill out the birth registration form with the necessary details.</p>
        </div>
        <div class="col-md-3">
            <i class="fa-solid fa-paper-plane fa-3x"></i>
            <h4>Step 2: Submit</h4>
            <p>Submit the form for review and approval.</p>
        </div>
        <div class="col-md-3">
            <i class="fa-solid fa-check-circle fa-3x"></i>
            <h4>Step 3: Approval</h4>
            <p>Admin will approve your registration and verify details.</p>
        </div>
        <div class="col-md-3">
            <i class="fa-solid fa-print fa-3x"></i>
            <h4>Step 4: Print Certificate</h4>
            <p>Once approved, you can print the birth certificate.</p>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features container mt-5">
    <h2 class="text-center">System Features</h2>
    <div class="row">
        <div class="col-md-4">
            <i class="fa-solid fa-baby-carriage fa-3x"></i>
            <h4>Simple Registration</h4>
            <p>Register births easily with a user-friendly form.</p>
        </div>
        <div class="col-md-4">
            <i class="fa-solid fa-file-signature fa-3x"></i>
            <h4>Manage Certificates</h4>
            <p>Admins can print and manage birth certificates.</p>
        </div>
        <div class="col-md-4">
            <i class="fa-solid fa-shield-halved fa-3x"></i>
            <h4>Secure & Reliable</h4>
            <p>Your data is safe and securely stored.</p>
        </div>
    </div>
</section>

<!-- Quick Access Links Section -->
<section class="container mt-5">
    <h3 class="text-center">Quick Links</h3>
    <div class="row">
        <div class="col-md-3">
            <a class="btn btn-primary w-100" href="#">Birth Registration</a>
        </div>
        <div class="col-md-3">
            <a class="btn btn-info w-100" href="#">View Birth Certificates</a>
        </div>
        <div class="col-md-3">
            <a class="btn btn-secondary w-100" href="#">Contact Us</a>
        </div>
        <div class="col-md-3">
            <a class="btn btn-danger w-100" href="#">Admin Portal</a>
        </div>
    </div>
</section>

@endsection
