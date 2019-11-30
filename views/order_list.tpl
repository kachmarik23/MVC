{extends file="layout.tpl"}
{block name=title}Список Заказов{/block}
{block name=body}
    <div class="container">
        <h2>Список заказов:</h2>
        <div class="row">
            {if !empty($orders )}
                <table class="table">
                    <thead class="thead-dark">
                    <th>№ п/п</th>
                    <th>Заказ</th>
                    <th>Дата</th>
                    </thead>
                    <tbody>
                    {foreach $orders as $order}
                        <tr>
                            <td>{$count++}.</td>
                            <td>
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                    <th>id</th>
                                    <th>name</th>
                                    <th>price</th>
                                    <th>count</th>
                                    </thead>
                                    <tbody>
                                    {foreach $order['items'] as $items}
                                        <tr>
                                            <td>{$items['id']}</td>
                                            <td>{$items['name']}</td>
                                            <td>{$items['price']}</td>
                                            <td>{$items['count']}</td>
                                        </tr>
                                    {/foreach}
                                    </tbody>
                                </table>
                            </td>
                            <td>{$order['date']}</td>
                        </tr>
                    {/foreach}
                    </tbody>
                </table>
            {else}
                Вы пока не сделали не одного заказа
            {/if}

        </div>
    </div>
{/block}


