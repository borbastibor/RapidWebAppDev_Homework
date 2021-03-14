@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card shadow mt-2">
                <div class="card-header bg-secondary shadow-sm text-white font-weight-bold">{{ __('Támogatóink') }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <h3>Támogatóink 2012-ig</h3>
                            <ul>
                                <li>Berke gumiszervíz</li>
                                <li>Békés Megyei Mentőalapítvány</li>
                                <li>Békés Megyei Képviselőtestület Egészségügyi Bizottsága</li>
                                <li>Dévaványa város önkormányzata</li>
                                <li>Furák Csavar és Kötőelem</li>
                                <li>Körös 2000 Kft.</li>
                                <li>Leonárdó Ételbár</li>
                                <li>Mester Csaba</li>
                                <li>Országos Mentőalapítvány</li>
                                <li>Puszta Csárda</li>
                                <li>SKF Szeghalom</li>
                                <li>Szeghalom Kistérségi Többcélú Társulás</li>
                                <li>Szeghalom város önkormányzata</li>
                                <li>Szőke Vegyi háztartási üzlet</li>
                                <li>Töviskesi Agrár Kft.</li>
                                <li>Tárnok Sándor</li>
                                <li>S' Gym T.E.E</li>
                            </ul>
                            <h3>Támogatóink 2013-ban</h3>
                            <ul>
                                <li>Szeghalom város önkormányzata</li>
                                <li>Töviskesi Agrár Kft.</li>
                                <li>HIROX Kft.</li>
                                <li>Layer Kft.</li>
                                <li>Szabó György</li>
                            </ul>
                            <p>
                                illetve a támogató matricákat vásárló magánszemélyek, 
                                aminek összege 2013-ban 13.000 Ft volt, ami bevételezésre került a házipénztárba.
                            </p>
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