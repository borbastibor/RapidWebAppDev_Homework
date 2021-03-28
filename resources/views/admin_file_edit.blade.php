@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card mt-2">
                <div class="card-header bg-secondary shadow-sm text-white font-weight-bold">{{ __('Fájl hozzáadása/szerkesztése') }}</div>
                <div class="card-body">
                    <a class="btn bg-info text-white font-weight-bold mb-3" id="to_list_link" href="{{ url('/files') }}">&#8678; Vissza</a>
                    <form id="user_form">
                        <input type="hidden" id="id" name="id" value="@if ($data) {{ $data->id }} @else {{ 0 }} @endif"/>
                        @if ($data) <label class="font-weight-bold" for="fileinput">Feltöltött fájl: </label> <a href="{{ url('storage/' . $data->id . '.' . $data->extension) }}">{{ $data->orig_name }}</a> @endif
                        <div class="form-group">
                            <label class="font-weight-bold" for="fileinput">Új fájl feltöltése:</label><br>
                            <input type="file" id="fileinput" name="fileinput" accept="image/*"/>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="name">Leírás:</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="Fájl leírása (képfelirat)..." value="@if ($data) {{ $data->description }} @endif" required/>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="type">Fájl típusa:</label>
                            <select class="form-control" id="type">
                                <option value="image" @if ($data && $data->type == 'image') selected="true" @endif>Kép</option>
                                <option value="other" @if ($data && $data->type == 'other') selected="true" @endif>Egyéb</option>
                            </select>
                        </div>
                    </form>
                    <button id="submit_file" class="btn btn-success font-weight-bold">&#128190; Mentés</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="display:none;"
    id="data_store"
    data-post_route="@if ($data) {{ route('files.update', ['file' => $data->id]) }} @else {{ route('files.store') }} @endif"
></div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/admin_file_edit.js') }}"></script>
@endpush