<!-- LOGO -->
<div class="brand">
    <a href="dashboard/crm-index.html" class="logo">

        <span>
                        <img src="/media/images/logo-light.png" alt="logo-large" class="logo-lg logo-light">
                        <img src="/media/images/logo.png" alt="logo-large" class="logo-lg logo-dark">
                    </span>
    </a>
</div>
<!--end logo-->
<div class="menu-content h-100" data-simplebar>
    <ul class="metismenu left-sidenav-menu">
        <li class="menu-label mt-0">Admin</li>
        <li>
            <a href="javascript: void(0);"> <i data-feather="users" class="align-self-center menu-icon"></i><span>Пользователи</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li class="nav-item"><a class="nav-link" href="{{ route("admin.user.all") }}"><i class="ti-control-record"></i>Все пользователи</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route("admin.user.admins") }}"><i class="ti-control-record"></i>Администраторы</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route("admin.user.buyers") }}"><i class="ti-control-record"></i>Покупатели</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route("admin.user.blocked") }}"><i class="ti-control-record"></i>Заблокированные</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route("admin.user.deleted") }}"><i class="ti-control-record"></i>Удаленные</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript: void(0);"> <i data-feather="cast" class="align-self-center menu-icon"></i><span>Новости/Страницы</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li class="nav-item"><a class="nav-link" href="{{ route("admin.news.all") }}"><i class="ti-control-record"></i>Новости</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route("admin.rubrics.all") }}"><i class="ti-control-record"></i>Разделы новостей</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route("admin.pages.all") }}"><i class="ti-control-record"></i>Страницы</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript: void(0);"> <i data-feather="box" class="align-self-center menu-icon"></i><span>Продукция</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li class="nav-item"><a class="nav-link" href="{{ route("admin.sbis.test") }}"><i class="ti-control-record"></i>SBIS TEST</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route("admin.sbis.shops") }}"><i class="ti-control-record"></i>Добавить магазины</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route("admin.products.all") }}"><i class="ti-control-record"></i>Весь товар</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route("admin.categories.all") }}"><i class="ti-control-record"></i>Все категории</a></li>
                {{--<li class="nav-item"><a class="nav-link" href="{{ route("admin.product.sales") }}"><i class="ti-control-record"></i>Товар с акциями</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route("admin.product.feedback") }}"><i class="ti-control-record"></i>Товар с отзывами</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route("admin.product.rating") }}"><i class="ti-control-record"></i>Рейтинг товара</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route("admin.product.deleted") }}"><i class="ti-control-record"></i>Удаленный товар</a></li>--}}
            </ul>
        </li>
        <li>
            <a href="javascript: void(0);"> <i data-feather="at-sign" class="align-self-center menu-icon"></i><span>Обратная связь</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li class="nav-item"><a class="nav-link" href="{{ route("admin.feedback.feedback") }}"><i class="ti-control-record"></i>Отзывы</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route("admin.feedback.contacts") }}"><i class="ti-control-record"></i>Контакты</a></li>
            </ul>
        </li>



    </ul>


</div>
