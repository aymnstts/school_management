@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="container mt-4">
        <h1>View Message</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">From: {{ $message->sender->email }}</h5>
                <h5 class="card-title">To: {{ $message->receiver->email }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Subject: {{ $message->subject }}</h6>
                <p class="card-text">{{ $message->body }}</p>
                <a href="{{ route('messages.index') }}" class="btn btn-primary">Back to Messages</a>
            </div>
        </div>
    </div>
</main>
@endsection
