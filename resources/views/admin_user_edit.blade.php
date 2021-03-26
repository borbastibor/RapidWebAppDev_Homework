@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card mt-2">
                <div class="card-header bg-secondary shadow-sm text-white font-weight-bold">{{ __('Felhasználó hozzáadása/szerkesztése') }}</div>
                <div class="card-body">
                    <a class="btn bg-info text-white font-weight-bold mb-3" id="to_list_link" href="/users">&#8678; Vissza</a>
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
                            <label class="font-weight-bold" for="role">Jogosultság:</label>
                            <select class="form-control" id="role">
                                <option value="0">Adminisztrátor</option>
                                <option value="1" selected>Regisztrált felhasználó</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="message">Jelszó:</label>
                            <input type="password" id="password" class="form-control" name="password" required></textarea>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="message">Jelszó újra:</label>
                            <input type="password" id="repassword" class="form-control" name="repassword" required></textarea>
                        </div>
                    </form>
                    <button id="submit_user" class="btn btn-success font-weight-bold">&#128190; Mentés</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="display:none;"
    id="data_store"
    data-post_route="@if ($data) {{ route(users.update, ['user' => $data->id]) }} @else {{ route('users.store') }} @endif"
></div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/admin_user_edit.js') }}"></script>
@endpush