@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6"><h4 class="mb-4">Emploi du Temps</h4></div>
        </div>
        <div class="row">
            <div class="col">
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
                                        @php
                                            $entry = $entries->where('day', $day)->skip($i)->first();
                                        @endphp
                                        <td>
                                            <div class="course-block">
                                                @if($entry)
                                                    <div class="hd">{{ $entry->start_time }}</div>
                                                    <div class="hf">{{ $entry->end_time }}</div>
                                                    <div class="wide fw-bold">{{ $entry->subject }}</div>
                                                    <div class="wide">{{ $entry->location }}</div>
                                                @else
                                                    <div class="hd"></div>
                                                    <div class="hf"></div>
                                                    <div class="wide fw-bold"></div>
                                                    <div class="wide"></div>
                                                @endif
                                            </div>
                                        </td>
                                    @endfor
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
