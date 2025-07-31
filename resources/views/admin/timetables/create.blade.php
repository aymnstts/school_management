@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="container mt-4">
        <h1>Create Timetable</h1>
        <form action="{{ route('timetables.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="major">Major</label>
                <select class="form-control" id="major" name="major" required>
                    @foreach($majors as $major)
                        <option value="{{ $major->major }}">{{ $major->major }}</option>
                    @endforeach
                </select>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-warning">
                            <th scope="col">Jour</th>
                            <th scope="col">S1</th>
                            <th scope="col">S2</th>
                            <th scope="col">S3</th>
                            <th scope="col">S4</th>
                            <th scope="col">S5</th>
                            <th scope="col">S6</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'] as $day)
                            <tr>
                                <td class="align-middle">{{ $day }}</td>
                                @for($i = 0; $i < 6; $i++)
                                    <td>
                                        <div class="form-group">
                                            <label for="timetable[{{ $day }}][{{ $i }}][subject]">Subject</label>
                                            <input type="text" class="form-control" name="timetable[{{ $day }}][{{ $i }}][subject]">
                                        </div>
                                        <div class="form-group">
                                            <label for="timetable[{{ $day }}][{{ $i }}][location]">Location</label>
                                            <input type="text" class="form-control" name="timetable[{{ $day }}][{{ $i }}][location]">
                                        </div>
                                        <div class="form-group">
                                            <label for="timetable[{{ $day }}][{{ $i }}][start_time]">Start Time</label>
                                            <input type="time" class="form-control" name="timetable[{{ $day }}][{{ $i }}][start_time]">
                                        </div>
                                        <div class="form-group">
                                            <label for="timetable[{{ $day }}][{{ $i }}][end_time]">End Time</label>
                                            <input type="time" class="form-control" name="timetable[{{ $day }}][{{ $i }}][end_time]">
                                        </div>
                                    </td>
                                @endfor
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <button type="submit" class="btn btn-primary">Save Timetable</button>
        </form>
    </div>
</main>
@endsection
