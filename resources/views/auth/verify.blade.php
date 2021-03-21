@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('E-mail cím megerősítés') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Egy új megerősítő e-amil került elküldésre.') }}
                        </div>
                    @endif

                    {{ __('Mielőtt tovább lép ellenőrizze a postaládáját a megerősítő link miatt.') }}
                    {{ __('Ha nem kapta meg az e-mail-t') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Újra küldés') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
