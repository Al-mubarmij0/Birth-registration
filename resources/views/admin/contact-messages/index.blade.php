@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Contact Messages</h2>

    {{-- Search + Filter --}}
    <form method="GET" action="{{ route('admin.messages') }}" class="row g-3 mb-4">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control" placeholder="Search name, email, or message..." value="{{ request('search') }}">
        </div>
        <div class="col-md-3">
            <input type="email" name="email" class="form-control" placeholder="Filter by email" value="{{ request('email') }}">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Search</button>
        </div>
        <div class="col-md-2">
            <a href="{{ route('admin.messages') }}" class="btn btn-secondary w-100">Reset</a>
        </div>
    </form>

    @if($messages->count())
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Sent At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $key => $msg)
                    <tr>
                        <td>{{ $key + $messages->firstItem() }}</td>
                        <td>{{ $msg->name }}</td>
                        <td>{{ $msg->email }}</td>
                        <td>{{ Str::limit($msg->message, 50) }}</td>
                        <td>{{ $msg->created_at->format('d M Y, h:i A') }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.messages.destroy', $msg->id) }}" onsubmit="return confirm('Are you sure you want to delete this message?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $messages->appends(request()->query())->links() }} {{-- Pagination with query params --}}
    @else
        <p>No messages found.</p>
    @endif
</div>
@endsection
