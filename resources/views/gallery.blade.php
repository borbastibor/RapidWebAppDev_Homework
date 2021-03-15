@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card shadow mt-2">
                <div class="card-header bg-secondary shadow-sm text-white font-weight-bold">{{ __('Galéria') }}</div>
                <div class="card-body">
                    @if (Auth::user())
                        <div>
                            <input type="file" class="input-hidden" id="fileinput" name="fileinput"/>
                            <button id="upload_file" class="btn btn-success font-weight-bold">Kép feltöltése</button>
                        </div>
                    @endif                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/gallery.js') }}"></script>
@endpush