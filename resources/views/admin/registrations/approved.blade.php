@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <h1 class="mb-4">Approved Registrations</h1>

    @if($registrations->isEmpty())
        <div class="alert alert-info">No approved registrations yet.</div>
    @else
        <div class="card shadow">
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Registration ID</th>
                            <th>First Name</th>
                            <th>Surname</th>
                            <th>Date of Birth</th>
                            <th>Gender</th>
                            <th>Action</th> {{-- Added Action column --}}
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
                                <td>
                                    <a href="{{ route('admin.registrations.print', $registration->id) }}" target="_blank" class="btn btn-sm btn-primary">
                                        Print Certificate
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
@endsection
