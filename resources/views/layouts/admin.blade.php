<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <! -- Stylesheet -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <! -- FontAwesome -->
    <script src="https://kit.fontawesome.com/91a731da61.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <! -- Libraries -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <title>Miskatonic</title>
</head>
<body>
    <nav>
        <! -- Nav -->
        <div class="nav nav-container flex">
            <! -- Logo -->
            <a class="fs-500 text-color ff-main logo" href="">Miskatonic <i class="fa-solid fa-gears"></i></i></a>
            <! -- User -->

            <div class="container-btn">
              <div class="button-user btn-admin">
                <div class="user-icon" onclick="location.href='{{ route('bookAdmin') }}'">
                  <i class="fa-solid fa-book-open"></i>
                </div>
              </div>
            </div>

            <div class="container-btn">
              <div class="button-user btn-admin">
                <div class="user-icon admin-icon" onclick="location.href='{{ route('authorAdmin') }}'">
                  <i class="fa-solid fa-feather-pointed"></i>
                </div>
              </div>
            </div>

            <div class="container-btn">
              <div class="button-user btn-admin">
                <div class="user-icon admin-icon" onclick="location.href='{{ route('genreAdmin') }}'">
                  <i class="fa-solid fa-palette"></i>
                </div>
              </div>
            </div>

            <div class="container-btn">
              <div class="button-user">
                <div class="user-icon admin-icon" onclick="location.href='{{ route('login') }}'">
                  <i class="fa-solid fa-user"></i>
                </div>
              </div>
            </div>

                <a class="logout-btn" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            
            <! -- NavBar -->
            <div class="navbar flex">
                <a href="{{ route('home') }}" class="nav-link flex">
                    <i class="fa-solid fa-house"></i>
                    <span class="nav-link-title">Home</span>
                </a>
                <a href="" class="nav-link flex">
                    <i class="fa-solid fa-wrench"></i>
                    <span class="nav-link-title">Manage</span>
                </a>
            </div>
        </div>

    </nav>

    @yield('content')
    
</body>
</html>
