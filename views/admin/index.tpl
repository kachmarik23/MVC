{extends file="admin/layout.tpl"}
{block name=title}Заказы{/block}
{block name=body}
    <div class="container">
        <div class="row">
            <table class="table ">
                <thead class="thead-dark">
                <th>Order ID</th>
                <th>User ID</th>
                <th>Items</th>
                <th>Created At.</th>
                </thead>
                <tbody>
                {foreach $orders as $order}
                    <tr>
                        <td>{$order['id']}</td>
                        <td>{$order['user_id']}</td>

                        <td>

                            <table class="table table-bordered table-secondary">
                                <thead class="thead-dark">
                                <th>id</th>
                                <th>Наименование</th>
                                <th>Цена</th>
                                <th>Кол-во</th>
                                <th>Всего</th>
                                </thead>
                                <tbody>
                                {$total=0}{* Итого товара*}
                                {foreach $order['items'] as $items}
                                    <tr>
                                        <td>{$items['id']}</td>
                                        <td>{$items['name']}</td>
                                        <td>{$items['price']} ($)</td>
                                        <td>{$items['count']}</td>
                                        {$total_id = $items['price']*$items['count']}
                                        <td>{$total_id} ($)</td>
                                    </tr>
                                    {$total=$total+$total_id}
                                {/foreach}
                                </tbody>
                            </table>
                            <div><strong>
                                    Итого: {$total} ($)
                                </strong></div>
                        </td>
                        <td>{$order['date']}</td>
                    </tr>
                {/foreach}
                </tbody>
            </table>
        </div>
    </div>
{/block}


