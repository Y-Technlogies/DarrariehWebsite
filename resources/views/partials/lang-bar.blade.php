<nav class="bg-white margin-fix-full navbar navbar-light p-0 px-2">
    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('img/flower.png') }}" width="30" height="30" alt="">
        للدراريع
    </a>

    <div class="d-flex">
        <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ app()->getLocale() === 'en' ? 'English' : 'عربي' }}
            </a>
            <div class="dropdown-menu dropdown-menu-right text-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ url('locale/en') }}" >English</a>
                <a class="dropdown-item" href="{{ url('locale/ar') }}" > عربي</a>
            </div>
        </div>

        <div class="nav-item">
            <div class="nav-link text-danger" >
                {{ currency()->getUserCurrency() }}
            </div>
        </div>
    </div>
</nav>