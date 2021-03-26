@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card mt-2">
                <div class="card-header bg-secondary shadow-sm text-white font-weight-bold">{{ __('Üzenet hozzáadása/szerkesztése') }}</div>
                <div class="card-body">
                    <a class="btn bg-info text-white font-weight-bold mb-3" id="to_list_link" href="/messages">&#8678; Vissza</a>
                    <form id="user_form">
                        <input type="hidden" id="id" name="id" value="@if ($data) {{ $data->id }} @else {{ 0 }} @endif"/>
                        <div class="form-group">
                            <label class="font-weight-bold" for="name">Név:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="írja be a nevét..." value="@if ($data) {{ $data->name }} @endif" required/>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="email">E-mail cím:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="írja be az e-mail címét..." value="@if ($data) {{ $data->email }} @endif" required/>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="message">Üzenet:</label>
                            <textarea class="form-control" id="message" name="message" rows="5">@if ($data) {{ $data->message }} @endif</textarea>
                        </div>
                    </form>
                    <button id="submit_message" class="btn btn-success font-weight-bold">&#128190; Mentés</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="display:none;"
    id="data_store"
    data-post_route="@if ($data) {{ route('messages.update', ['message' => $data->id]) }} @else {{ route('messages.store') }} @endif"
></div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/admin_message_edit.js') }}"></script>
@endpush