<header class="container-fluid my-md-0">
    <h1>{{__('Sección de Productos')}}</h1>
    <nav class="navbar mb-4">
        <div class="container d-flex flex-column flex-md-row align-items-lg-center">
            <div class="d-flex flex-column align-items-center">
                {{--<div class="d-flex align-items-center">
                    <a class="dropdown-item" href="{{route('language','es')}}">{{__('pruebaLang.'.'Spanish')}}</a>
                    <a class="dropdown-item" href="{{route('language','en')}}">{{__('pruebaLang.'.'English')}}</a>
                </div>--}}
            </div>
            @auth
                <form class="m-0 align-items-center d-flex flex-column" action="{{route("logout")}}" method="POST">
                    @csrf
                    <button class="btn btn-light" type="submit">{{__('pruebaLang.'.'Logout')}}</button>
                    <p class="m-0 mt-2 d-none d-lg-block">{{__('pruebaLang.'.'Welcome')}} {{auth()->user()->email}}</p>
                </form>
            @else
                <div class="d-flex">
                    <a class="nav-link" href="{{route("login")}}">{{__('pruebaLang.'.'Log In')}}</a>
                    <a class="nav-link" href="{{route("register")}}">{{__('pruebaLang.'.'Register')}}</a>
                </div>
            @endauth
        </div>
    </nav>
</header>
