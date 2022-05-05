<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <! -- Styles sheets -->
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/home.css" rel="stylesheet">
    <link href="/css/footer.css" rel="stylesheet">
    <link href="/css/navbar.css" rel="stylesheet">
    <! -- FontAwesome -->
    <script src="https://kit.fontawesome.com/91a731da61.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <! -- Libraries -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <title>Miskatonic</title>
</head>
<body>
    <nav>
        <! -- Nav -->
        <div class="nav nav-container flex">
            <! -- Logo -->
            <a class="fs-500 text-color ff-main logo" href="">Miskatonic</a>
            <! -- Search -->
            <div class="search-box">
                <input type="search" id="search-input" class="text-color" placeholder="Search for a book..." autocomplete="off">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <! -- User -->
            <div class="container-btn">
              <div class="button-user">
                @if (Route::has('login'))
                <div class="user-icon" onclick="location.href='{{ route('login') }}'">
                  <i class="fa-solid fa-user"></i>
                @endif
                </div>
              </div>
            </div>
            <! -- NavBar -->
            <div class="navbar flex">
                <a href="" class="nav-link flex">
                    <i class="fa-solid fa-house"></i>
                    <span class="nav-link-title">Home</span>
                </a>
                <a href="" class="nav-link flex">
                    <i class="fa-solid fa-compass"></i>
                    <span class="nav-link-title">Explore</span>
                </a>
                <a href="" class="nav-link flex">
                    <i class="fa-solid fa-book-open"></i>
                    <span class="nav-link-title">Books</span>
                </a>
                <a href="" class="nav-link flex">
                    <i class="fa-solid fa-feather-pointed"></i>
                    <span class="nav-link-title">Authors</span>
                </a>
                <a href="" class="nav-link flex">
                    <i class="fa-solid fa-bookmark"></i>
                    <span class="nav-link-title">Bookshelf</span>
                </a>
            </div>
        </div>

    </nav>

    @yield('content')
    
</body>
</html>
