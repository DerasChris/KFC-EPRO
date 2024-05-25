<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="{{ asset('css/carrito/stylescarrito.css') }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const addToCartButtons = document.querySelectorAll('.add-to-cart');
            const popup = document.querySelector('.popup');
            const addMoreButton = document.querySelector('.add-more');

            addToCartButtons.forEach(button => {
                button.addEventListener('click', () => {
                    popup.style.display = 'flex';
                });
            });

            addMoreButton.addEventListener('click', () => {
                popup.style.display = 'none';
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
    <div class="container">
        <!--Carrito-->
        <div class="cart">
            <header>
                <h1>Mi Carrito</h1>
                <p>Shopping is happy</p>
                <button class="notification"><img src="notificacion.png" alt="Notificaciones"></button>
            </header>
            <div class="cart-items">
                <div class="item">
                    <img src="kfc1.jpg" alt="Hamburguesa Personal">
                    <div class="details">
                        <h2>Hamburguesa Personal</h2>
                        <p>4.8/5 (1k+ reviews)</p>
                        <span class="price">$320</span>
                    </div>
                    <div class="quantity">
                        <button class="minus">-</button>
                        <span>1</span>
                        <button class="plus">+</button>
                    </div>
                </div>
                <div class="item">
                    <img src="kfc2.jpg" alt="Papas fritas">
                    <div class="details">
                        <h2>Papas fritas</h2>
                        <p>4.8/5 (1k+ reviews)</p>
                        <span class="price">$320</span>
                    </div>
                    <div class="quantity">
                        <button class="minus">-</button>
                        <span>1</span>
                        <button class="plus">+</button>
                    </div>
                </div>
                <div class="item">
                    <img src="kfc3.jpg" alt="Strips box">
                    <div class="details">
                        <h2>Strips box</h2>
                        <p>4.8/5 (1k+ reviews)</p>
                        <span class="price">$320</span>
                    </div>
                    <div class="quantity">
                        <button class="minus">-</button>
                        <span>1</span>
                        <button class="plus">+</button>
                    </div>
                </div>
                <div class="item">
                    <img src="kfc4.jpg" alt="Pepsi 3.75Ml">
                    <div class="details">
                        <h2>Pepsi 3.75Ml</h2>
                        <p>4.8/5 (1k+ reviews)</p>
                        <span class="price">$320</span>
                    </div>
                    <div class="quantity">
                        <button class="minus">-</button>
                        <span>1</span>
                        <button class="plus">+</button>
                    </div>
                </div>
            </div>
            <button class="add-to-cart">Añadir al carrito</button>
        </div>


        <div class="popup">
            <div class="popup-content">
                <span class="checkmark">✔</span>
                <h2>Producto añadido!</h2>
                <p>Orden asignada correctamente</p>
                <button class="add-more">Añadir más productos</button>
            </div>
        </div>

        <!--Detalle del Producto-->
        <div class="product-detail">
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
        </div>
    </div>
</body>
</html>
