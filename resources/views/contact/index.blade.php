<!-- resources/views/contact/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4">Contact Us</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <!-- Contact Information Section -->
        <div class="col-md-6">
            <h3>Contact Information</h3>
            <p>If you have any questions or need assistance, feel free to reach out to us using the form below or the contact details provided.</p>

            <ul>
                <li><strong>Email:</strong> support@birthregsys.com</li>
                <li><strong>Phone:</strong> +123 456 7890</li>
                <li><strong>Address:</strong> 123 BirthRegSys St., City, Country</li>
            </ul>
        </div>

        <!-- Contact Form Section -->
        <div class="col-md-6">
            <h3>Send Us a Message</h3>

            <!-- Contact Form -->
            <form action="{{ route('contact.submit') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>
    </div>
</div>
@endsection
