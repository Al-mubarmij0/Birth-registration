@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container-fluid py-4">
    <h1 class="mb-4">Admin Dashboard</h1>

    {{-- Key Statistics --}}
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary shadow">
                <div class="card-body">
                    <h5>Total Registrations</h5>
                    <h3>{{ $total }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success shadow">
                <div class="card-body">
                    <h5>Approved</h5>
                    <h3>{{ $approved }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning shadow">
                <div class="card-body">
                    <h5>Pending</h5>
                    <h3>{{ $pending }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger shadow">
                <div class="card-body">
                    <h5>Rejected</h5>
                    <h3>{{ $rejected }}</h3>
                </div>
            </div>
        </div>
    </div>

    {{-- Recent Registrations Table --}}
    <div class="card shadow mb-4">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">Recent Registrations</h5>
        </div>
        <div class="card-body p-0">
            @if(count($recentRegistrations) > 0)
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Child's Name</th>
                            <th>Date of Birth</th>
                            <th>Gender</th>
                            <th>Status</th>
                            <th>Date Registered</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentRegistrations as $index => $reg)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $reg->first_name }} {{ $reg->surname }}</td>
                            <td>{{ \Carbon\Carbon::parse($reg->date_of_birth)->format('d M Y') }}</td>
                            <td>{{ ucfirst($reg->gender) }}</td>
                            <td>
                                <span class="badge 
                                    @if($reg->status == 'approved') bg-success
                                    @elseif($reg->status == 'pending') bg-warning
                                    @elseif($reg->status == 'rejected') bg-danger
                                    @endif">
                                    {{ ucfirst($reg->status) }}
                                </span>
                            </td>
                            <td>{{ $reg->created_at->format('d M Y, h:i A') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
                <div class="p-4 text-center">
                    <p class="mb-0">No recent registrations available.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
