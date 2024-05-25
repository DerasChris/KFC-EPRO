<div class="navigation">
    <hr class="bg-primary">
    <ul>
        <li class="list  vis">
            <div class="indicator av"></div>
            <a href="#">
                <span class="icon" id="elemento1"> 
                    <img src="{{ asset('images/home.png') }}" alt="">
                </span>
                <span class="text">Home</span>
                <span class="circle"></span>
            </a>
        </li>
        
        <li class="list vis">
            <div class="indicator av"></div>
            <a href="#">
                <span class="icon" id="elemento2"> 
                    <img src="{{ asset('images/userUSER.png') }}" alt="">
                </span>
                <span class="text">Usuario</span>
                <span class="circle"></span>
            </a>
        </li>
        
        <li class="list active">
            <div class="indicator ovvis"></div>
            <a href="{{ route('prodsCombos')}}">
                <span class="icon"> 
                    <img src="{{ asset('images/Group 17.png') }}" alt="">
                </span>
                <span class="text">Añadir</span>
                <span class="circle"></span>
            </a>
        </li>
        <li class="list ">
            <div class="indicator av"></div>
            <a href="{{ route('carrito.ver')}}">
                <span class="icon"> 
                    <img src="{{ asset('images/comment.png') }}" alt="">
                </span>
                <span class="text">Ordenes</span>
                <span class="circle"></span>
            </a>
        </li>
        <li class="list vis">
            <div class="indicator av"></div>
            <a href="#">
                <span class="icon"> 
                    <img src="{{ asset('images/heart.png') }}" alt="">
                </span>
                <span class="text">Fav</span>
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
   <script>
    const listItems = document.querySelectorAll('.list');

function activeLink(event) {


    
    listItems.forEach((item) => {
        item.classList.remove('active');
        item.querySelector('.indicator').classList.add('av');
        item.querySelector('.indicator').classList.remove('ovvis');
    });
    
    
    this.classList.add('active');
    const indicator = this.querySelector('.indicator');
    indicator.classList.remove('av');
    
   
        indicator.addEventListener('transitionend', function() {
            indicator.classList.add('ovvis');
        }, { once: true });
    }

    listItems.forEach((item) => {
        item.addEventListener('click', activeLink);
    });
   </script>

   
</body>
</html>