{extends file="layout.tpl"}
{block name=title}Регистрация на сайте{/block}
{block name=body}
    <div class="container">
        <h2>Регистрация на сайте:</h2>
        <form action="/users/registr" method="post">
            <div class="form-group row">
                <label for="login" class="col-sm-2 col-form-label">Логин:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="login" name="login" placeholder="Введите логин">
                </div>
            </div>
            <div class="form-group row">
                <label for="pass" class="col-sm-2 col-form-label">Пароль:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Введите пароль">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <input type="submit" class="btn btn-secondary mt-2" value="Регистрация">
                </div>
            </div>
        </form>
    </div>
{/block}