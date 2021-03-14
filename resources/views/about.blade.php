@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card shadow mt-2">
                <div class="card-header bg-secondary shadow-sm text-white font-weight-bold">{{ __('Rólunk') }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="row">
                                <div class="col-3 text-center">
                                    <img src="{{ asset('images/alapitvanyi_kereszt.jpg') }}" alt="adó">
                                </div>
                                <div class="col-5">
                                    <b>Szervezet Neve: Szeghalmi Mentőalapítvány</b><br><br>
                                    <b>Postai címe:</b> 5520 Szeghalom, Fáy András utca 1.<br>
                                    <b>Telefonszám:</b> +36-20-233-0052<br>
                                    <b>Adószám:</b> 18379668-1-04<br>
                                    <b>Bankszámlaszám:</b> 54000014-11020923
                                </div>
                            </div>
                            <br>
                            <p>
                                <b>Kuratórium elnöke:</b> Bácsi Erika<br>
                                <b>Kuratóriumi tagok:</b>
                                <ul>
                                    <li>Tóth Sándor</li>
                                    <li>Szilágyi Tamás Ferenc</li>
                                    <li>Nánási Imre Richárd</li>
                                    <li>Panyik József</li>
                                </ul>
                            </p>
                            <p class="text-justify">
                                <b>Tevékenysége röviden:</b>
                                Az alapítók 1998-ban hozták létre az alapítványt, elsősorban Szeghalom és környéke mentőellátásának javításáért.
                                Célja: Mentéstechnikai eszközök beszerzése, fejlesztése. A személyi állomány oktatásának, 
                                továbbképzésének támogatása, más alapítványokkal való együttműködés, mentés, katasztrófa elhárítás és 
                                baleset megelőzés érdekében.
                                Ellátási terület: Szeghalom, Füzesgyarmat, Körösladány, Vésztő, Dévaványa, Okány, Körösújfalu, 
                                Kertészsziget, Bucsa, Csökmő.
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