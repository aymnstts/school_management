@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="container mt-4">
        <h1>Send Message</h1>
        <form action="{{ route('messages.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="receiver_id" class="form-label">Recipient</label>
                <select class="form-control" id="receiver_id" name="receiver_id" required>
                    <option value="">Select Recipient</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->email }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" required>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Message</label>
                <textarea class="form-control" id="body" name="body" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
    </div>
</main>
@endsection
