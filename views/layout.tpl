<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link rel="icon" href="#"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/them.css">

    <title>{block name=title}{/block}</title>
</head>
<body>
<header class="vbar-togglerbar">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">Pattern MVC</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">

                </li>

            </ul>
            <ul class="navbar-nav mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/cart">Cart ({$cart_count|default:"0"}
                        ){*|default:"0" значение по умолчанию 0*}</a>
                </li>
                {if !empty($smarty.session.user.id)}
                <li class="nav-item active">
                    <a class="nav-link" href="/order/all">Список заказов</a>
                </li>

                <li class="nav dropdown dropleft">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {$smarty.session.user.login}{* из сессии берем логин *}
                    </a>
                    <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                        {if $smarty.session.user.login === 'admin'}{*если логин admin*}
                            <a class="dropdown-item" href="/admin">Администрирование</a>
                            <div class="dropdown-divider"></div>
                        {/if}
                        <a class="dropdown-item" href="/users/logout">LogOut</a>
                    </div>
                </li>
                {else}

                <li class="nav-item">
                    <button type="button" class="btn btn-link nav-link" data-toggle="modal" data-target="#login">Login
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-link nav-link" data-toggle="modal" data-target="#register">
                        Register
                    </button>
                </li>
            </ul>

            {/if}
        </div>
    </nav>
</header>

{include file='modal/login.tpl'}
{include file='modal/rerister.tpl'}
{block name=body}{/block}
<script src="/public/js/modal.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>