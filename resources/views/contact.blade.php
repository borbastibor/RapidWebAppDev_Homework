@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card shadow mt-2">
                <div class="card-header bg-secondary shadow-sm text-white font-weight-bold">{{ __('Kapcsolat') }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <form>
                                <div class="form-group">
                                    <label for="name">Név:</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="írja be a nevét..." required/>
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail cím:</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="írja be e-mail címét..." required/>
                                </div>
                                <div class="form-group">
                                    <label for="message">Üzenet:</label>
                                    <textarea id="message" class="form-control" name="message" col="50" row="20" placeholder="írja be az üzenetét..." required></textarea>
                                </div>
                                <button id="send_message" class="btn btn-primary">Küldés</button>
                            </form>
                        </div>
                        <div class="col-3">
                            @include('adverts')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection