@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card mt-2">
                <div class="card-header bg-secondary shadow-sm text-white font-weight-bold">{{ __('Felhasználók') }}</div>
                <div class="card-body">
                    <table class="table table-sm table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Név</th>
                                <th scope="col">E-mail cím</th>
                                <th scope="col">Regisztráció ideje</th>
                                <th scope="col">Jogosultság</th>
                                <th scope="col">Lehetőségek</th>
                            </tr>
                        </thead>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->role }}</td>
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