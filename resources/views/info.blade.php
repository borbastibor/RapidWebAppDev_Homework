@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card mt-2">
                <div class="card-header bg-secondary shadow-sm text-white font-weight-bold">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <img src="{{ asset('images/1ado.png') }}" alt="adó">
                    <h2>Tisztelt Látogató!</h2>
                    <p>
                        Szeretettel köszöntöm Önt a Szeghalmi Mentőalapítvány honlapján! 
                        Célunk, hogy az Internet adta előnyöket kihasználva egyre többen ismerjék meg alapítványunkat, 
                        valamint annak működését, céljait. A Szeghalmi Mentőalapítványt 1998-ban hozta létre a Szeghalmi 
                        Mentőállomás Bajtársi közössége azért, hogy a mentőállomás munkakörülményeit, a dolgozók szakmai 
                        tudását, az itt szolgálatot teljesítő mentőautók felszerelését javítsa. Nem kis megelégedésre ad 
                        okot az a tudat, hogy az adó 1 %-ból befolyt összeg, valamint a civil támogatók és vállalkozók által 
                        nyújtott adományok lehetővé teszik, hogy évente minden dolgozónak tanulmányaihoz anyagi segítséget 
                        nyújtsunk, mentőautóinkat a legmodernebb eszközökkel szereljük fel, igazodva a folyamatosan újuló 
                        és egyre nagyobb szakmai követelményeket támasztó elvárásokhoz. Honlapunkon hasznos időtöltést kívánok, 
                        mind magam, mind a kuratórium tagjai, valamint a Szeghalmi Mentőállomás összes dolgozója nevében:
                    </p>
                    <p>Bácsi Erika</p>
                    <p>Kuratórium Elnök</p>
                    <img src="{{ asset('images/Tamogato_matrica.jpg') }}" alt="adó">
                    <p>
                        Az alapítványt támogathatja ha Támogatói matricát vásárol, amelynek az értéke 500,-Ft
                        A matrica megvásárolható a szeghalmi mentőállomáson.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection