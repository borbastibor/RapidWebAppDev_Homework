@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card mt-2">
                <div class="card-header bg-secondary shadow-sm text-white font-weight-bold">{{ __('Felhasználó hozzáadása/szerkesztése') }}</div>
                <div class="card-body">
                    <a class="btn bg-success text-white font-weight-bold mb-3" href="{{ route('users.index') }}">&#8678; Vissza</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection