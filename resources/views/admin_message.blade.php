@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card mt-2">
                <div class="card-header bg-secondary shadow-sm text-white font-weight-bold">{{ __('Beérkezett üzenetek') }}</div>
                <div class="card-body">
                    <table class="table table-hover table-sm table-bordered text-center">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Név</th>
                                <th scope="col">E-mail cím</th>
                                <th scope="col">Küldés ideje<span class="order-cursor" id="order"> &#128317;</span></th>
                                <th scope="col">Üzenet</th>
                                <th scope="col">Lehetőségek</th>
                            </tr>
                        </thead>
                        @foreach ($messages as $message)
                            <tr>
                                <td class="align-middle">{{ $message->name }}</td>
                                <td class="align-middle">{{ $message->email }}</td>
                                <td class="align-middle">{{ $message->created_at }}</td>
                                <td class="align-middle">{{ $message->message }}</td>
                                <td>
                                    <a class="btn bg-primary text-white font-weight-bold" href="{{ route('messages.edit', ['message' => $message->id]) }}">Szerkeszt</a>
                                    <a class="btn bg-danger text-white font-weight-bold" name="delitem" href="{{ route('messages.destroy', ['message' => $message->id]) }}">Töröl</a>
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
    <script type="text/javascript" src="{{ asset('js/admin_message.js') }}"></script>
@endpush