@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card mt-2">
                <div class="card-header bg-secondary shadow-sm text-white font-weight-bold">{{ __('Feltöltött fájlok') }}</div>
                <div class="card-body">
                    <table class="table table-sm table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Fájlnév</th>
                                <th scope="col">Leírás</th>
                                <th scope="col">Típus</th>
                                <th scope="col">Feltöltés ideje</th>
                                <th scope="col">Feltöltő</th>
                                <th scope="col">Lehetőségek</th>
                            </tr>
                        </thead>
                        @foreach ($files as $file)
                            <tr>
                                <td>{{ $file->orig_name }}</td>
                                <td>{{ $file->description }}</td>
                                <td>{{ $file->type }}</td>
                                <td>{{ $file->created_at }}</td>
                                <td>{{ $file->user->name }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection