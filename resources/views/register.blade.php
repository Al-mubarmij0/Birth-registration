@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Birth Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fffbea;
        }
        .form-section {
            background-color: #ffffff;
            padding: 30px;
            margin-bottom: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
        h3 {
            color: #b58900;
            margin-bottom: 20px;
        }
        .btn-submit {
            background-color: #ffcc00;
            border: none;
            color: #333;
            font-weight: bold;
        }
        .btn-submit:hover {
            background-color: #e6b800;
        }
    </style>
</head>
<body>

<div class="container my-5">
    <h2 class="text-center mb-4">Birth Registration Form</h2>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('register.submit') }}" method="POST">
        @csrf

        <!-- Register Information Section -->
        <div class="form-section">
            <h3>Register Information</h3>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="center" class="form-label">Registration Center</label>
                    <input type="text" class="form-control" id="center" name="registration_center" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="state" class="form-label">State</label>
                    <input type="text" class="form-control" id="state" name="state" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="lga" class="form-label">LGA</label>
                    <input type="text" class="form-control" id="lga" name="lga" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="reg_date" class="form-label">Date of Registration</label>
                    <input type="date" class="form-control" id="reg_date" name="registration_date" required>
                </div>
            </div>
        </div>

        <!-- Birth Information Section -->
        <div class="form-section">
            <h3>Birth Information</h3>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="first_name" class="form-label">Child's First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="surname" class="form-label">Surname</label>
                    <input type="text" class="form-control" id="surname" name="surname" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select" id="gender" name="gender" required>
                        <option value="">Choose...</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="dob" name="date_of_birth" required>
                </div>
                <div class="col-md-8 mb-3">
                    <label for="birth_place" class="form-label">Place of Birth</label>
                    <input type="text" class="form-control" id="birth_place" name="place_of_birth" required>
                </div>
            </div>
        </div>

        <!-- Parent Information Section -->
        <div class="form-section">
            <h3>Parent Information</h3>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="father_name" class="form-label">Father's Full Name</label>
                    <input type="text" class="form-control" id="father_name" name="father_name" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="father_occupation" class="form-label">Father's Occupation</label>
                    <input type="text" class="form-control" id="father_occupation" name="father_occupation" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="mother_name" class="form-label">Mother's Full Name</label>
                    <input type="text" class="form-control" id="mother_name" name="mother_name" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="mother_occupation" class="form-label">Mother's Occupation</label>
                    <input type="text" class="form-control" id="mother_occupation" name="mother_occupation" required>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" class="btn btn-submit px-5 py-2">Submit Registration</button>
        </div>

    </form>
</div>

</body>
</html>
@endsection
