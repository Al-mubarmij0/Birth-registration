@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <h1 class="mb-4">Rejected Registrations</h1>

    @if($registrations->isEmpty())
        <div class="alert alert-warning">No rejected registrations found.</div>
    @else
        <div class="card shadow">
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-danger">
                        <tr>
                            <th>Registration ID</th>
                            <th>First Name</th>
                            <th>Surname</th>
                            <th>Date of Birth</th>
                            <th>Gender</th>
                            <th>Rejection Reason</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($registrations as $registration)
                            <tr>
                                <td>{{ $registration->id }}</td>
                                <td>{{ $registration->first_name }}</td>
                                <td>{{ $registration->surname }}</td>
                                <td>{{ \Carbon\Carbon::parse($registration->date_of_birth)->format('d M Y') }}</td>
                                <td>{{ ucfirst($registration->gender) }}</td>
                                <td>{{ $registration->rejection_reason ?? 'N/A' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
@endsection
