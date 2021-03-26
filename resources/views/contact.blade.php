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
                            <h4 class="font-weight-bold">Bácsi Erika</h4>
                            <h5>Elérhetőségek</h5>
                            <h5>Alapítvány Kuratóriumának elnöke</h5>
                            <p>
                                <b>Cím:</b> Fáy András u. 1. Szeghalom 5520<br>
                                <b>E-mail:</b> <a href="mailto:bacsi.erika@szeghalmimentoalapitvany.hu">bacsi.erika@szeghalmimentoalapitvany.hu</a><br>
                                <b>Mobiltelefon:</b>  06-20/233-00-52<br>
                            </p>
                            <hr>
                            <form id="contact_form">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="name">Név:</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="írja be a nevét..." required/>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold" for="email">E-mail cím:</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="írja be e-mail címét..." required/>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold" for="message">Üzenet:</label>
                                    <textarea id="message" class="form-control" name="message" rows="10" placeholder="írja be az üzenetét..." required></textarea>
                                </div>
                            </form>
                            <button id="send_message" class="btn btn-success font-weight-bold">&#128231; Küldés</button>
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
<div class="data-div"
    id="data_store"
    data-post_route={{ url('/contact/store') }}
    data-csrf_token={{ csrf_token() }}
></div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/message.js') }}"></script>
@endpush