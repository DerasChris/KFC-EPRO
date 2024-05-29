@extends('clientelayout.header')
<link rel="stylesheet" href="{{ asset('css/carrito.css') }}">
@section('contenedor')

    <div class="row d-flex flex-row flex-wrap justify-content-around p-3">
        @foreach ($menus as $menu)
            <div class="col-5 d-flex justify-content-center cardmod p-2 m-3" id="card_{{ $menu->id }}">
                <div class="d-flex flex-column">
                    <div class="beta w-100 d-flex justify-content-center">
                        <div class="circle-icon" id="circle_{{ $menu->id }}" style="display:none; text-align:center;">✔</div>
                    </div>
                    <img src="{{ $menu->imagen }}" alt="" width="140">
                    <span><b> {{ $menu->nombre }} </b></span>
                    <span>{{ $menu->id }}</span>
                    <div class="row">
                        <div class="col-6 d-flex align-items-center justify-content-start">
                            <img src="/img/star.png" alt="">
                            <span class="">{{ $menu->precio_estimado }}</span>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <img src="{{ asset('images/hearts.png') }}" alt="" width="30">
                        </div>
                    </div>
                    <form method="POST" action="{{ route('carrito.agregarMenu', ['id' => $menu->id]) }}">
                        @csrf
                        <button class="btn btn-danger mt-2 order-button w-100" style="visibility:hidden;">Ordenar</button>

                    </form>


                </div>
            </div>
        @endforeach
    </div>
    <script>
        function showProductDetail(productName) {
            alert("Detalles de " + productName);
        }

        document.addEventListener('DOMContentLoaded', function() {
            var cards = document.querySelectorAll('.cardmod');

            cards.forEach(function(card) {
                card.addEventListener('click', function() {
                    // Remover el borde y el círculo de todas las tarjetas
                    cards.forEach(function(c) {
                        c.style.border = 'none';
                        c.querySelector('.order-button').style.visibility = 'hidden'; // Ocultar el botón "Ordenar"
                    });
                    // Agregar un borde y mostrar el círculo a la tarjeta clickeada
                    this.style.border = '2px solid #EF2A39';
                    this.querySelector('.order-button').style.visibility = 'visible'; // Mostrar el botón "Ordenar"

                    // Mostrar el botón de "Añadir"
                    document.getElementById('addButtonContainer').style.display = 'block';
                });
            });

            // Manejar clic en el botón de "Añadir"
            document.getElementById('addButton').addEventListener('click', function() {
                // Obtener el ID del producto de la tarjeta seleccionada
                var selectedCardId = document.querySelector('.cardmod[style*="border: 2px solid #EF2A39"]').id.split('_')[1];
                // Realizar la acción de añadir aquí, por ejemplo, enviar el ID del producto a través de una solicitud AJAX
                alert('Añadiendo producto con ID: ' + selectedCardId);
            });
        });
    </script>
@endsection

@extends('clientelayout.navbar')
