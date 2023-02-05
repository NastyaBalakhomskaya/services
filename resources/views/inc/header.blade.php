<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
        </svg>
        <span class="fs-3">AutoHouse: Сервис автомобильных услуг</span>
    </a>

    <ul class="nav nav-pills">
        <li class="nav-item"><a href="{{ route('home') }}" class="nav-link active" aria-current="page">Главная</a></li>
        <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">О компании</a></li>
        <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">Обратный звонок</a></li>
        <li class="nav-item"><a href="{{ route('price') }}" class="nav-link">Прайс</a></li>
        {{--        <li class="nav-item"><a href="{{ route('price-services') }}" class="nav-link">Прайс на ремонт</a></li>
                <li class="nav-item"><a href="{{ route('price-detailings') }}" class="nav-link">Прайс на детейлинг</a></li>
                <li class="nav-item"><a href="{{ route('price-tires') }}" class="nav-link">Прайс на шиномонтаж</a></li>--}}

        @if (!auth()->check())
            <li class="nav-item"><a href="{{ route('sign-up.form') }}" class="nav-link">Регистрация</a></li>
            <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Авторизация</a></li>
        @endif

        @if(auth()->check())
            <li><a class="nav-link" href="{{route('login-history')}}">История входа IP</a></li>
            @can('create', \App\Models\Order::class)
                <li class="nav-item"><a href="{{ route('order.create.form') }}" class="nav-link">Создать заказ</a></li>
            @endcan
            <li class="nav-item"><a href="{{ route('order.list') }}" class="nav-link">Заказы</a></li>
            @can('create', \App\Models\Service::class)
                <li class="nav-item"><a href="{{ route('service.create.form') }}" class="nav-link">Добавить ремонт</a>
                </li>
            @endcan
            <li class="nav-item"><a href="{{ route('service.list') }}" class="nav-link">Ремонт</a></li>

            @can('create', \App\Models\Detailing::class)
                <li class="nav-item"><a href="{{ route('detailing.create.form') }}" class="nav-link">Добавить
                        детейлинг</a></li>
            @endcan
            <li class="nav-item"><a href="{{ route('detailing.list') }}" class="nav-link">Детейлинг</a></li>
            @can('create', \App\Models\Tire::class)
                <li class="nav-item"><a href="{{ route('tire.create.form') }}" class="nav-link">Добавить шиномонтаж</a>
                </li>
            @endcan
            <li class="nav-item"><a href="{{ route('tire.list') }}" class="nav-link">Шиномонтаж</a></li>
            @can('create', \App\Models\Car::class)
                <li class="nav-item"><a href="{{ route('car.create.form') }}" class="nav-link">Добавить авто</a></li>
            @endcan
            <li class="nav-item"><a href="{{ route('car.list') }}" class="nav-link">Автомобили</a></li>
            @can('create', \App\Models\Status::class)
                <li class="nav-item"><a href="{{ route('status.create.form') }}" class="nav-link">Добавить статус</a>
                </li>
            @endcan
            <li class="nav-item"><a href="{{ route('status.list') }}" class="nav-link">Статусы</a></li>
            @can('create', \App\Models\Schedtire::class)
                <li class="nav-item"><a href="{{ route('schedtire.create.form') }}" class="nav-link">Добавить расписание
                        для шиномонтажа</a></li>
            @endcan
            <li class="nav-item"><a href="{{ route('schedtire.list') }}" class="nav-link">Расписание шиномонтажа</a>
            </li>
            @can('create', \App\Models\Scheddetailing::class)
                <li class="nav-item"><a href="{{ route('scheddetailing.create.form') }}" class="nav-link">Добавить
                        расписание для детейлинга</a></li>
            @endcan
            <li class="nav-item"><a href="{{ route('scheddetailing.list') }}" class="nav-link">Расписание детейлинга</a>
            </li>
            @can('create', \App\Models\Schedservice::class)
                <li class="nav-item"><a href="{{ route('schedservice.create.form') }}" class="nav-link">Добавить
                        расписание для ремонта</a></li>
            @endcan
            <li class="nav-item"><a href="{{ route('schedservice.list') }}" class="nav-link">Расписание ремонта</a></li>
            @can('create', \App\Models\Item::class)
                <li class="nav-item"><a href="{{ route('item.create.form') }}" class="nav-link">Добавить товар</a></li>
            @endcan
            <li class="nav-item"><a href="{{ route('item.list') }}" class="nav-link">Товары</a></li>

            <form action="{{ route('logout') }}" method="post" class="form-inline">
                @csrf
                <button class="btn btn-danger">Logout</button>
            </form>
        @endif

    </ul>
</header>
