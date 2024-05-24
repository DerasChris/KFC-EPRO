@extends('clientelayout.header')

@section('contenedor')
        <div class="row d-flex flex-row flex-wrap justify-content-around  p-3">
        @foreach ($menus as $menu)
            <div class="col-5 d-flex justify-content-center cardmod p-2 m-3">
                <div class="d-flex flex-column">
                    <img src="{{ $menu->imagen}}" alt="" width="140">
                    <span><b> {{$menu->nombre}} </b></span>
                    <span>{{$menu->id}}</span>
                    <div class="row">
                        <div class="col-6  d-flex align-items-center justify-content-start">
                            <img src="/img/star.png" alt="">
                            <span class="">{{$menu->precio_estimado}}</span>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <img src="{{ asset('images/hearts.png') }}" alt="" width="30">
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
   </div>
@endsection
@extends('clientelayout.navbar')