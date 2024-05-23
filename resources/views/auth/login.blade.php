<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMK KFC</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Londrina Solid' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>

    <div class="container-fluid ">
       <div class="row d-flex flex-row vh-100 ">
            <div class="col-6 colorpmk d-flex justify-content-center align-items-center flex-column text-light">
                <span class="londrina"><h1>Sucursal</h1></span>
                <br>
                <span class="londrina"><h2>0046</h2></span>
                <br>
                <img src="{{ asset('images/image 21.png') }}" alt="" width="300">
                <div class="cont">
                    <img src="{{ asset('images/Vector.png') }}" alt="" class="">
                </div>
            </div>
            <div class="col-6  d-flex justify-content-center align-items-center ">
                <div class="container-fluid d-flex flex-column  w-50 h-75   ">
                    <h1 class="text-center londrina">Inicio de Sesión</h1>
                    <hr class="colorpmk">
                    <span class="text-center poppins-thin">
                        Ingrese sus credenciales en los campos acontinuación
                    </span>
                    <br>
                    <br>
                    <br>
                    <x-guest-layout>


        <x-authentication-card>


            <x-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="d-flex flex-column poppins-thin">
                @csrf

                <div>
                    <x-label for="email" value="{{ __('Ingrese su correo:') }} " class="form-label" />
                    <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="Correo electronico" />
                </div>

                <div class="mt-4">
                    <x-label for="password" value="{{ __('Ingrese su contraseña: ') }}" class="form-label" />
                    <x-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                </div>


                <div class="d-flex justify-content-center mt-5">
                
                    <x-button class="btn btn-dark colorpmk text-light text-center btnhov">
                        {{ __('Acceder') }}
                    </x-button>
                </div>
            </form>
        </x-authentication-card>
          </x-guest-layout>
                </div>
            </div>
       </div>
    </div>
    <script src="/js/main.js"></script>
</body>
</html>


