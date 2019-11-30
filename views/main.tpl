{extends file="layout.tpl"}
{block name=title}Товары по категориям{/block}
{block name=body}
    <div class="container">
        <h2>Категории:</h2>
        <div class="row">
            <div class="col-sm-4 col-lg-3">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item{if ($category['id']==$params)} active{/if}">
                        <a class="list-group-item-action" href="/">Все товары</a>
                    </li>

                    {foreach $categories as $category}
                        <li class="list-group-item{if ($category['id']==$params)} active{/if}">
                            <a class="list-group-item-action" href="/categories/items/{$category['id']}">{$category['name']}
                                ({if (!$category['0'])}0{/if}{$category['0']})</a>
                        </li>
                    {/foreach}
                </ul>
            </div>
            <div class="col-sm-8 col-lg-9">
                <div class="row ">
                    {if empty($items )}
                        В этой категории нет товаров...(
                        {/if}
                    {foreach $items as $item}
                    <div class="col-sm-12 col-lg-4 mb-4">
                        <div class="card bg-light">
                            <img src="/public/images/{$item['pic']}" class="card-img-top"
                                 alt="{$item['name']}">
                            <div class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title">{$item['name']}</h5>
                                    <div class="card-text">{$item['description']}</div>
                                    <div class="card-text mb-2">Цена: <strong>{$item['price']}$</strong></div>
                                    <a href="/cart/add/?id={$item['id']}" class="btn btn-success">Корзина</a>
                                    <a href="#" class="btn btn-primary">Инфо</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {/foreach}
                </div>
            </div>
        </div>
    </div>
{/block}


