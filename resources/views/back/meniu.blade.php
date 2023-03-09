<nav class="navbar-dark bg-dark justify-content-center sticky-top">

    <ul class=" nav justify-content-center">

        <li class="nav-item"><a class="link-info nav-link" href="{{route('admin-create')}}">Add Restaurant</a>

        </li>

        <li class="nav-item"><a class="link-info nav-link" href="{{route('admin-dish-create')}}">Add Dish</a></li>



        <li class="nav-item"> <a class="link-info nav-link" href="{{route('admin-welcome')}}">Index</a></li>


        <li class="nav-item"><a class="link-info nav-link" href="">not finished</a></li>
        <li class="nav-item dropdown ">
            <a id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>
            {{-- dropdown --}}

            <div class="dropdown-menu dropdown-menu-end btn btn-primary " aria-labelledby="navbarDropdown">
                <a class="dropdown-item btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
