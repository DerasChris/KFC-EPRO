<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" {{route('dashboard', ['id' => $rol->idRol]) }} ">
            <img src="https://firebasestorage.googleapis.com/v0/b/pmkfc-52178.appspot.com/o/logo_letras.png?alt=media&token=083361b1-60be-4816-9672-6e3ffad8948b" class="navbar-brand-img h-100" alt="">
            <span class="ms-1 font-weight-bold"></span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="{{route('dashboard', ['id' => $rol->idRol])}}">
                    <div
                        class="border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <img
                        src="https://firebasestorage.googleapis.com/v0/b/pmkfc-52178.appspot.com/o/Dashboard%20Layout.png?alt=media&token=1819664a-38e2-47ee-9dbe-09839a141d42"
                        class="icon-shape icon-sm" alt="">
                        <span class="ms-1 font-weight-bold"></span>
                    </div>
                    <span class="nav-link-text ms-1">DASHBOARD</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="btn-ingresos">
                    <div class="border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <img src="https://firebasestorage.googleapis.com/v0/b/pmkfc-52178.appspot.com/o/Money%20Bag.png?alt=media&token=06af1c06-af6a-4915-8d7c-fb633c552b86"
                            class="icon-shape icon-sm" alt="">
                        <span class="ms-1 font-weight-bold"></span>
                    </div>
                    <span class="nav-link-text ms-1">INGRESOS ESTIMADOS</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="../pages/profile.html">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
        </ul>
    </div>
</aside>