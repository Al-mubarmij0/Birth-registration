@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <h1 class="mb-4">Pending Registrations</h1>

    @if($registrations->isEmpty())
        <div class="alert alert-info">No pending registrations at the moment.</div>
    @else
        <div class="card shadow">
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Registration ID</th>
                            <th>First Name</th>
                            <th>Surname</th>
                            <th>Date of Birth</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($registrations as $registration)
                            <tr>
                                <td>{{ $registration->id }}</td>
                                <td>{{ $registration->first_name }}</td>
                                <td>{{ $registration->surname }}</td>
                                <td>{{ \Carbon\Carbon::parse($registration->date_of_birth)->format('d M Y') }}</td>
                                <td>
                                    <form action="{{ route('admin.registrations.approve', $registration->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                    </form>

                                    <button type="button" class="btn btn-danger btn-sm" onclick="showRejectModal({{ $registration->id }})">Reject</button>

                                    <button type="button" class="btn btn-secondary btn-sm" onclick="toggleDetails({{ $registration->id }})">More</button>
                                </td>
                            </tr>

                            <tr id="details-{{ $registration->id }}" style="display: none; background-color: #f1f1f1;">
                                <td colspan="5">
                                    <div class="p-3">
                                        <strong>Gender:</strong> {{ ucfirst($registration->gender) }}<br>
                                        <strong>Place of Birth:</strong> {{ $registration->place_of_birth }}<br>
                                        <strong>Father's Name:</strong> {{ $registration->father_name }}<br>
                                        <strong>Father's Occupation:</strong> {{ $registration->father_occupation }}<br>
                                        <strong>Mother's Name:</strong> {{ $registration->mother_name }}<br>
                                        <strong>Mother's Occupation:</strong> {{ $registration->mother_occupation }}<br>
                                        <strong>Registration Center:</strong> {{ $registration->registration_center }}<br>
                                        <strong>State:</strong> {{ $registration->state }}<br>
                                        <strong>LGA:</strong> {{ $registration->lga }}<br>
                                        <strong>Registration Date:</strong> {{ \Carbon\Carbon::parse($registration->registration_date)->format('d M Y') }}<br>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>

<!-- Rejection Modal -->
<div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="rejectForm" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="rejectModalLabel">Reason for Rejection</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <textarea name="rejection_reason" rows="4" required class="form-control" placeholder="Enter reason for rejection"></textarea>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Submit</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
</div>

<!-- JavaScript -->
<script>
    function toggleDetails(id) {
        const row = document.getElementById('details-' + id);
        row.style.display = row.style.display === 'none' ? 'table-row' : 'none';
    }

    function showRejectModal(registrationId) {
        const form = document.getElementById('rejectForm');
        form.action = '/admin/registrations/' + registrationId + '/reject';
        const modal = new bootstrap.Modal(document.getElementById('rejectModal'));
        modal.show();
    }
</script>
@endsection
