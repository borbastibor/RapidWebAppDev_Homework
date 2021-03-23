@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card mt-2">
                <div class="card-header bg-secondary shadow-sm text-white font-weight-bold">{{ __('Feltöltött fájlok') }}</div>
                <div class="card-body">
                    <a class="btn bg-success text-white font-weight-bold mb-3" href="{{ route('files.edit', ['file' => 0]) }}">Fájl hozzáadása</a>
                    <table class="table table-hover table-sm table-bordered text-center">
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
                                <td class="align-middle">{{ $file->orig_name }}</td>
                                <td class="align-middle">{{ $file->description }}</td>
                                <td class="align-middle">{{ $file->type }}</td>
                                <td class="align-middle">{{ $file->created_at }}</td>
                                <td class="align-middle">{{ $file->user->name }}</td>
                                <td>
                                    <a class="btn bg-primary text-white font-weight-bold" href="{{ route('files.edit', ['file' => $file->id]) }}">Szerkeszt</a>
                                    <a class="btn bg-danger text-white font-weight-bold" name="delitem" href="{{ route('files.destroy', ['file' => $file->id]) }}">Töröl</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/admin_file.js') }}"></script>
@endpush