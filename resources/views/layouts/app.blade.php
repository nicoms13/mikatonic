<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <! -- Stylesheet -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
    <! -- FontAwesome -->
    <script src="https://kit.fontawesome.com/91a731da61.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
      <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <! -- Libraries -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <title>Miskatonic</title>
    <link rel="icon" type="image/x-icon" href="/images/brand/twitter.png">
</head>
<body>
    <nav>
        <! -- Nav -->
        <div class="nav nav-container flex">
            <! -- Logo -->
            <a class="fs-500 text-color ff-main logo" href="">Miskatonic</a>
            <! -- Search -->
            <form class="search-box form-search" action="{{ url('searchBook') }}" method="POST">
                @csrf
                    <input type="search" name="title" id="search-input" class="text-color" placeholder="{{ __('messages.search_book') }}" autocomplete="off">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <script>
                var availableTags = [];

                $.ajax({
                    type: "GET",
                    url: "/booksList",
                    success: function(response) {
                        startAutocomplete(response);
                    }
                });

                function startAutocomplete(availableTags) {
                    $( "#search-input" ).autocomplete({
                        source: availableTags
                    });
                };


            </script>
            <! -- User -->
            <div class="row">
                <div class="col-md-4">
                    <select class="changeLang">
                        <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>Eng</option>
                        <option value="sp" {{ session()->get('locale') == 'sp' ? 'selected' : '' }}>Spa</option>
                    </select>
                </div>
            </div>
            <script type="text/javascript">
  
                var url = "{{ route('changeLang') }}";
  
                $(".changeLang").change(function(){
                    window.location.href = url + "?lang="+ $(this).val();
                });
  
            </script>

            <div class="container-btn">
              <div class="button-user">
                <div class="user-icon" onclick="location.href='{{ route('login') }}'">
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
                    <span class="nav-link-title">{{ __('messages.home') }}</span>
                </a>
                <a href="{{ route('bookSection') }}" class="nav-link flex">
                    <i class="fa-solid fa-compass"></i>
                    <span class="nav-link-title">{{ __('messages.explore') }}</span>
                </a>
                <a href="{{ route('authors') }}" class="nav-link flex">
                    <i class="fa-solid fa-feather-pointed"></i>
                    <span class="nav-link-title">{{ __('messages.authors') }}</span>
                </a>
                <a href="{{ route('bookshelf') }}" class="nav-link flex">
                    <i class="fa-solid fa-bookmark"></i>
                    <span class="nav-link-title">{{ __('messages.bookshelf') }}</span>
                </a>

                @if(@Auth::user()->hasRole('Admin'))
                <a href="{{ route('admin') }}" class="nav-link flex">
                    <i class="fa-solid fa-wrench"></i>
                    <span class="nav-link-title">{{ __('messages.manage') }}</span>
                </a>
                @endif

            </div>
        </div>

    </nav>

    @yield('content')

    
@livewireScripts
</body>
</html>
