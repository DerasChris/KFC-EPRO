@extends('clientelayout.header')

@section('contenedor')
<div class="container mt-5">
    <h2>Detalles de la Orden #{{ $orden->id }}</h2>
    <p><strong>Mesa:</strong> {{ $orden->mesa->numero }}</p>

    <h3>Productos</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orden->productos as $producto)
                <tr>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->pivot->cantidad }}</td>
                    <td>${{ $producto->pivot->precio }}</td>
                    <td>${{ $producto->pivot->cantidad * $producto->pivot->precio }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Menús</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Menú</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orden->menus as $menu)
                <tr>
                    <td>{{ $menu->nombre }}</td>
                    <td>{{ $menu->pivot->cantidad }}</td>
                    <td>${{ $menu->pivot->precio }}</td>
                    <td>${{ $menu->pivot->cantidad * $menu->pivot->precio }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Total: ${{ $orden->total }}</h3>
</div>
@endsection
@extends('clientelayout.navbar')