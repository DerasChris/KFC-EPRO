<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PMK </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/Styles.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Londrina Solid' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">  
    <style>
    .loader {
        position: fixed;
        z-index: 9999;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 1.0);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .loader img {
        width: 100px;
        height: 100px;
        transform: scale(1.5);
    }
    .londrina {
        font-family: 'Londrina Solid';font-size: 48px;
    }

    .poppins-thin {
        font-family: "Poppins", sans-serif;
    font-weight: 500;
    font-style: normal;
    }

    </style>
</head>
  <body>
  <div id="loader" class="loader">
        <img src="{{ asset('images/loader.gif') }}" alt="Loading...">
    </div>
    <div class="container mt-3">
       <div class="row d-flex align-items-center ">
            <div class="col-10 col-sm-10 d-flex flex-column ">
                <span class="text londrina">
                    <b>PMK KFC
                    </b>
                </span>
                <span class="poppins-thin">
                    Ordena tu comida favorita en KFC!
                </span>
            </div>
            <div class="col-2 col-sm-2 ">
                <div class="">
                    <img src="{{ asset('images/image 8.png') }}" class="img-content" alt="" width="50" height="50">
                </div>
            </div>
       </div> 
        </div>
    </div>
    <div class="container mt-5">
        <div class="searchbar-content">
            <div class="row d-flex align-items-center">
                <div class="col-10 col-sm-10 d-flex align-items-center searchbar">
                    <img src="{{ asset('images/search.png') }}" alt="" width="25" height="25">
                    <input type="text" class="w-100 fix-input ms-3" placeholder="Buscar">
                </div>
                <div class="col-2 col-sm-2">
                    <img src="{{ asset('images/Group 2.png') }}" alt="" width="45" height="45">
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-sm-12 d-flex justify-content-around ">

                <div class="filter-pill{{ request()->routeIs('prodsIndividuales') ? '-active' : ' ' }}">
                    <span><a href="{{ route('prodsIndividuales') }}" class="{{ request()->routeIs('prodsIndividuales') ? 'routesa' : ' routesas' }}" >Individual</a></span>
                </div>
                <div class="filter-pill{{ request()->routeIs('prodsCombos') ? '-active' : '' }}">
                    <span><a href="{{ route('prodsCombos') }}" class="{{ request()->routeIs('prodsCombos') ? 'routesa' : ' routesas' }}" >Combos</a></span>
                </div>
                <div class="filter-pill">
                    <span>Promociones</span>
                </div>
            </div>
        </div>
   </div>

   @yield('contenedor')

    <div class="h-25">
        <div class="container">
            .
        </div>
    </div>