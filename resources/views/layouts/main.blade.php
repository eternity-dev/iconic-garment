<!doctype html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }} - {{ $title ?? 'Default' }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    @yield('css')
</head>

<body style= "background-color: #f1ebe1">
    <nav class="navbar navbar-expand-lg" style="background-color: #f1ebe1;">
        <div class="container-md">
            <a class="navbar-brand text-light" href="{{ route('global.main') }}">
                <img src="/images/logo.png" alt="logo.png" width="60" height="60">
                <span class=" p-0 m-0" style="color: #44624a">{{ env('APP_NAME') }}</span>
                <span style="color: #44624a" class="p-0 m-0">Garment</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 "></ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-3" data-bs-theme="light" type="search" placeholder="Search"
                        aria-label="Search">
                    <button class="btn" type="submit" style="background-color: #c0cfb2">
                        <img src="/images/icons/search.svg" alt="search icon" width="20" height="20">
                    </button>
                </form>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-dark navbar-expand-lg" style="background-color: #44624a;">
        <div class="container-md">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse gap-3" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    @if (auth()->check() || auth()->guard('garment')->check())
                        <li class="nav-item">
                            <a 
                              href="{{ route('global.main') }}" 
                              class="nav-link {{ url()->current() == route('global.main') ? 'active' : '' }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="/" class="nav-link">Orders</a>
                        </li>
                        <li class="nav-item">
                            <a 
                              href="{{ route('user.profile.index') }}" 
                              class="nav-link {{ url()->current() == route('user.profile.index') ? 'active' : '' }}">My Profiles</a>
                        </li>
                    @endif
                </ul>
                @if (auth()->check() || auth()->guard('garment')->check())
                    <span class="text-light">
                        Hello there, {{ auth()->user()->name }}
                    </span>
                @endif
                <div>
                    @if (!auth()->check() && !auth()->guard('garment')->check())
                        <a href="{{ route('auth.login.get') }}" class="btn btn-success"
                            style="background-color: #c0cfb2">Login</a>
                    @else
                        <a href="{{ route('auth.logout.get') }}" class="btn btn-danger"
                            onclick="return confirm('Apakah Anda yakin ingin keluar?')">Logout</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="mt-5 d-block">
        <div class="d-flex w-100 align-items-center justify-content-center py-2 text-center text-light"
            style="background-color: #44624a">
            <h5>
                "Garments are more than just fabric stitched together; they are expressions of individuality, woven with
                threads of culture, history, and artistry"
            </h5>
        </div>
        <div class="align-items-center justify-content-center py-3 text-center">
            <img src="/images/logo.png" alt="logo.png" width="80" height="80">
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    @yield('js')
</body>

</html>
