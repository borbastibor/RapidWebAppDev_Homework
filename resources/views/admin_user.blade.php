@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card mt-2">
                <div class="card-header bg-secondary shadow-sm text-white font-weight-bold">{{ __('Felhasználók') }}</div>
                <div class="card-body">
                    <a class="btn bg-success text-white font-weight-bold mb-3" href="{{ route('users.edit', ['user' => 0]) }}">Új felhasználó</a>
                    <table class="table table-hover table-sm table-bordered text-center">
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
                                <td class="align-middle">{{ $user->name }}</td>
                                <td class="align-middle">{{ $user->email }}</td>
                                <td class="align-middle">{{ $user->created_at }}</td>
                                <td class="align-middle">
                                    @if ($user->role == 0)
                                        admin
                                    @else
                                        regisztrált felhasználó
                                    @endif
                                </td>
                                <td>
                                    <a class="btn bg-primary text-white font-weight-bold" href="">Szerkeszt</a>
                                    <a class="btn bg-danger text-white font-weight-bold" href="">Töröl</a>
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