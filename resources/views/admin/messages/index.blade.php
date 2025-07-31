@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="container mt-4">
        <h1>Messages</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('messages.create') }}" class="btn btn-primary mb-3">Send Message</a>
        <h2>Sent Messages</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Recipient</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sentMessages as $message)
                <tr>
                    <td>{{ $message->receiver->email }}</td>
                    <td>{{ $message->subject }}</td>
                    <td>{{ $message->created_at }}</td>
                    <td>
                        <a href="{{ route('messages.show', $message->id) }}" class="btn btn-sm btn-primary">View</a>
                        <form action="{{ route('messages.destroy', $message->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this message?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection
