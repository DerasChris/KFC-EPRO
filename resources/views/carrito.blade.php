@extends('clientelayout.header')

@section('contenedor')
<link rel="stylesheet" href="{{ asset('css/carrito.css') }}">
<styles>
    
</styles>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const addToCartButtons = document.querySelectorAll('.add-to-cart');
        const popup = document.querySelector('.popup');
        const addMoreButton = document.querySelector('.add-more');
        const items = document.querySelectorAll('.item');
        

    items.forEach(item => {
        const price = parseFloat(item.dataset.price);
        const quantitySpan = item.querySelector('.prc');
        const priceSpan = item.querySelector('.price');
        const plusButton = item.querySelector('.plus');
        const minusButton = item.querySelector('.minus');
        const removeButton = item.querySelector('.remove');

        plusButton.addEventListener('click', () => {
            const quantity = parseInt(quantitySpan.innerText) + 1;
            quantitySpan.innerText = quantity;
            const newPrice = price * quantity;
            priceSpan.innerText = '$' + newPrice.toFixed(2);
        });

        minusButton.addEventListener('click', () => {
            const quantity = parseInt(quantitySpan.innerText);
            if (quantity > 1) {
                quantitySpan.innerText = quantity - 1;
                const newPrice = price * (quantity - 1);
                priceSpan.innerText = '$' + newPrice.toFixed(2);
            }
        });


        removeButton.addEventListener('click', () => {
    const itemId = item.dataset.itemId;
    const itemType = item.dataset.itemType;

    // Eliminar el elemento del carrito
    if (itemType === 'producto') {
        delete carrito.productos[itemId];
    } else if (itemType === 'menu') {
        delete carrito.menus[itemId];
    }

    // Eliminar el elemento de la interfaz
    item.remove();
});
    });

        

        const plusButtons = document.querySelectorAll('.plus');
        const minusButtons = document.querySelectorAll('.minus');

        plusButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                const quantity = e.target.previousElementSibling;
                quantity.innerText = parseInt(quantity.innerText) + 1;
            });
        });

        minusButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                const quantity = e.target.nextElementSibling;
                if (parseInt(quantity.innerText) > 1) {
                    quantity.innerText = parseInt(quantity.innerText) - 1;
                }
            });
        });

        const backButton = document.querySelector('.back');
        const productDetail = document.querySelector('.product-detail');
        const addToOrderButton = document.querySelector('.add-to-order');
        const cart = document.querySelector('.cart');

        backButton.addEventListener('click', () => {
            productDetail.style.display = 'none';
            cart.style.display = 'block';
        });

        addToOrderButton.addEventListener('click', () => {
            productDetail.style.display = 'none';
            cart.style.display = 'block';
            alert('Producto agregado a la orden');
        });

        const cartItems = document.querySelectorAll('.item');
        cartItems.forEach(item => {
            item.addEventListener('click', () => {
                productDetail.style.display = 'block';
                cart.style.display = 'none';
            });
        });
    });
</script>
</head>
<body>
    <div class="container mt-5">
        <!-- Carrito -->
        <div class="cart">
            <header>
                <h1>Mi Carrito</h1>
                <p>Shopping is happy</p>
            </header>
            <div class="cart-items">
                @if (!empty($carrito['productos']))
                    <h3>Productos</h3>
                    @foreach ($carrito['productos'] as $id => $detalles)
                    <div class="item" data-price="{{ $detalles['precio'] }}">
                        <img src="{{$detalles['imagen']}}" width="50" alt="Imagen del producto">
                        <div class="details">
                            <h2>{{ $detalles['nombre'] }}</h2>
                            <p class="prc">{{ $detalles['cantidad'] }}</p>
                            <span class="price">${{ number_format($detalles['precio'] * $detalles['cantidad'], 2) }}</span>
                        </div>
                        <div class="quantity">
                            <button class="minus">-</button>
                            <span>{{ $detalles['cantidad'] }}</span>
                            <button class="plus">+</button>
                        </div>
                     </div>
                
                    @endforeach
                   
             @endif

            @if (!empty($carrito['menus']))
            <h3>Menús</h3>
            @foreach ($carrito['menus'] as $id => $detalles)
    <div class="item" data-price="{{ $detalles['precio'] }}">
        <img src="{{$detalles['imagen']}}" width="50" alt="Imagen del menú">
        <div class="details">
            <h2>{{ $detalles['nombre'] }}</h2>
            <p class="prc">{{ $detalles['cantidad'] }}</p>
            <span class="price">${{ number_format($detalles['precio'] * $detalles['cantidad'], 2) }}</span>
        </div>
        <div class="quantity">
            <button class="minus">-</button>
            <span>{{ $detalles['cantidad'] }}</span>
            <button class="plus">+</button>
            
        </div>
    </div>
@endforeach
         @endif

        @if (!empty($carrito['productos']) || !empty($carrito['menus']) )
            <div class="total">
                <h3>Total: ${{ number_format(isset($carrito['total']) ? $carrito['total'] : 0, 2) }}</h3>
            </div>

            <form action="{{ route('carrito.confirmar') }}" method="POST">
                @csrf
                <button type="submit" class="add-to-cart">Confirmar Orden</button>
            </form>
        @else
                    <div class="container d-flex justify-content-center align-items-center flex-column">
                        <h2> No hay ordenes aún</h2>
                        <img src="{{ asset('images/sanders.png')}}" alt="" width="350" class="rounded-circle mt-5">
                    </div>
        
        @endif
               
        </div>

        @if(!empty(session()->get('success')))
            <div class="popup">
                <div class="popup-content">
                    <span class="checkmark">✔</span>
                    <h2>Orden confirmada!</h2>
                    <p>Orden asignada correctamente</p>
                    <button class="add-more">Añadir más productos</button>
                </div>
            </div>
        @endif
        <!-- Detalle del Producto -->
        <!-- <div class="product-detail">
            <header>
                <button class="back">&larr;</button>
                <h1>Wow Combo</h1>
                <p>4.9 • 26 mins</p>
            </header>
          
            <p>Delicioso combo de pollo con papas y soda a lo coronel Sanders</p>
            <div class="combo-details">
                <div class="combo-item">
                    <img src="pollo.jpg" alt="Piernas">
                    <button class="change">Cambiar</button>
                </div>
                <div class="combo-item">
                    <img src="papas.jpg" alt="Papas Fritas">
                    <button class="change">Cambiar</button>
                </div>
                <div class="combo-item">
                    <img src="pepsi.jpg" alt="Pepsi 375 ML">
                    <button class="change">Cambiar</button>
                </div>
            </div>
            <div class="order-quantity">
                <button class="minus">-</button>
                <span>1</span>
                <button class="plus">+</button>
            </div>
            <button class="add-to-order">$13.99 Agregar a Orden</button>
        </div> -->
    </div>
@endsection

@extends('clientelayout.navbar')
