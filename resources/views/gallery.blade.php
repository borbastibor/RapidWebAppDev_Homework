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
                            <input type="file" class="input-hidden" id="fileinput" name="fileinput" accept="image/*"/>
                            <button id="upload_file" class="btn btn-success font-weight-bold mb-2">&#128190; Kép feltöltése</button>
                            <input type="text" class="form-control" id="imagetext" name="imagetext" placeholder="képfelirat..."/>
                            <hr>
                        </div>
                    @endif
                    
                    <div class="d-flex flex-wrap">
                        @foreach ($images as $image)
                            <div class="m-3">
                                <a href="{{ url('storage/' . $image->id . '.' . $image->extension) }}" target="_blank">
                                    <img src="{{ url('storage/' . $image->id . '.' . $image->extension) }}" class="img-thumbnail shadow" style="width:200px; height:200px;"/>
                                </a>
                                <div class="container-fluid p-0 m-0 text-center text-wrap" style="width:200px;">{{ $image->description }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="display:none;"
    id="data_store"
    data-post_route={{ url('/gallery/store') }}
    data-csrf_token={{ csrf_token() }}
></div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/gallery.js') }}"></script>
@endpush