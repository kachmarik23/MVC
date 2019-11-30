{extends file="layout.tpl"}
{block name=title}Корзина{/block}
{block name=body}
    <div class="container">
        <h2>Корзина:</h2>
        <div class="row">
        {if !empty($items )}
        <table class="table  table-striped">
            <thead class="thead-dark">
            <th>Наименование</th>
            <th>Цена</th>
            <th>Кол-во</th>
            <th>Всего</th>
            <th>Удалить</th>
            </thead>
            <tbody>
            {foreach $items as $item}
                <tr>
                    <td>{$item['name']}</td>
                    <td>{$item['price']} ($)</td>
                    <td><a href="/cart/inc?id={$item['id']}"> + </a>{$item['count']}<a
                                href="/cart/dec?id={$item['id']}"> - </a></td>
                    <td>{$item['count']*$item['price']} ($)</td>
                    <td><a href="/cart/remove?id={$item['id']}">Удалить</a></td>
                </tr>
            {/foreach}
            </tbody>
        </table>
            <div class="col-md-12">
        <div class="text-right mr-5 mb-3 ">Итого: <u><b>{$total} ($)</b></u></div>
        <div class="text-right mr-5">
            <a href="/order/create"><button class="btn btn-success">Сделать заказ</button></a>
        </div>
            </div>
            {else}
            В корзине нет товаров...(
        {/if}
        </div>
    </div>
{/block}


