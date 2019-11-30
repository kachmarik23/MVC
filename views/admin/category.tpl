{extends file="admin/layout.tpl"}
{block name=title}Категории{/block}
{block name=body}

    <div class="container">
        <h2>Категории:</h2>
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-striped table-sm">
                    <thead class="thead-dark">
                    <th>ID</th>
                    <th>Названиее</th>
                    <th>Кол-во товаров</th>
                    <th></th>
                    </thead>
                    <tbody>
                    {foreach $categories as $category}
                        <tr>
                            <td>{$category['id']}</td>
                            <td>{$category['name']}</td>
                            <td>{if (!$category['0'])}0{/if}{$category['0']}</td>
                            <td><a href="/admin/category_remove?id={$category['id']}" class="btn btn-danger  btn-sm">Удалить</a></td>
                        </tr>
                    {/foreach}
                    </tbody>
                </table>
                <h3>Добавить категорию:</h3>
                <form action="/admin/category_create" method="post">
                    <div class="form-row">
                        <div class="col-9">
                            <input class="form-control" type="text" name="category" id="category"
                                   placeholder="Введите категорию">
                        </div>
                        <div class="col">
                            <input type="submit" class="btn btn-success ml-1" value="Добавить">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
{/block}


