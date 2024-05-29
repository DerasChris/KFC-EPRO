
<div class="navigation">
    <hr class="bg-primary">
    <ul>
       
        
        <li class="list ">
            <div class="indicator av"></div>
            <a href="#">
                <span class="icon" id="elemento2"> 
                    <img src="{{ asset('images/userUSER.png') }}" alt="">
                </span>
                <span class="text">Usuario</span>
                <span class="circle"></span>
            </a>
        </li>
        
        <li class="list {{ request()->routeIs('prodsIndividuales') || request()->routeIs('prodsCombos') ? 'active' : ' ' }}">
            <div class="indicator {{ request()->routeIs('prodsIndividuales') || request()->routeIs('prodsCombos') ? 'ovvis' : ' av' }}"></div>
            <a href="{{ route('prodsCombos')}}">
                <span class="icon"> 
                    <img src="{{ asset('images/Group 17.png') }}" alt="">
                </span>
                <span class="text">Añadir</span>
                <span class="circle"></span>
            </a>
        </li>
        <li class="list {{ request()->routeIs('carrito.ver') ? 'active' : ' ' }}">
            <div class="indicator {{ request()->routeIs('carrito.ver') ? 'ovvis' : ' av' }}"></div>
            <a href="{{ route('carrito.ver')}}">
                <span class="icon"> 
                    <img src="{{ asset('images/comment.png') }}" alt="">
                </span>
                <span class="text">Ordenes</span>
                <span class="circle"></span>
            </a>
        </li>
       
        
    </ul>
   </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
    <script>
    window.addEventListener("load", function () {
        var loader = document.getElementById("loader");
        loader.style.display = "none";
    });
    </script>
   

   
</body>
</html>