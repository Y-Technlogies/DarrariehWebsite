<nav class="bg-white margin-fix-full navbar navbar-light p-0 px-2" id="header-navbar">
    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('img/flower.png') }}" width="30" height="30" alt="">
        <span>
            للدراريع
        </span>
    </a>
    <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ app()->getLocale() === 'en' ? 'English' : 'عربي' }}
        </a>
        <div class="dropdown-menu dropdown-menu-right text-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ url('locale/en') }}" >English</a>
            <a class="dropdown-item" href="{{ url('locale/ar') }}" > عربي</a>
        </div>
    </div>
</nav>