{extends file="admin/layout.tpl"}
{block name=title}Товары{/block}
{block name=body}
    <div class="container">
    <h2>Товары</h2>
    <button type="button" class="btn btn-success nav-link mb-2" data-toggle="modal" data-target="#itemsAdd">Добавить
        товар
    </button>
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <th>ID</th>
                <th class="align-middle text-center">изображение</th>
                <th class="align-middle text-center">Наименование</th>
                <th class="align-middle text-center">Краткое описание</th>
                <th class="align-middle text-center">Описание</th>
                <th class="align-middle text-center">Категория</th>
                <th class="align-middle text-center">Цена</th>
                <th class="align-middle text-center">Кол-во</th>
                <th colspan="2" class="align-middle text-center"> Действия</th>
                </thead>
                <tbody>
                {foreach $items as $item}
                    <tr id="item_{$item['id']}">
                        <td class="align-middle text-center">{$item['id']}</td>
                        <td class="align-middle text-center" id="pic_{$item['id']}"><img
                                    src="/public/images/{$item['pic']}" class="card-img-top" alt="{$item['name']}"
                                    style="height: 30px; width: auto"></td>
                        <td class="align-middle text-center" id="name_{$item['id']}">{$item['name']}</td>
                        <td class="align-middle text-center" id="intro_{$item['id']}">{$item['intro']}</td>
                        <td class="align-middle text-center" id="description_{$item['id']}">{$item['description']}</td>
                        <td class="align-middle text-center" id="category_id_{$item['id']}">
                            {foreach $categories as $category}
                                {if $category['id'] eq $item['category_id']}
                                    {$category['name']}
                                {/if}
                            {/foreach}
                        </td>
                        <td class="align-middle text-center" id="price_{$item['id']}">{$item['price']} $</td>
                        <td class="align-middle text-center" id="quantity_{$item['id']}">{$item['quantity']}</td>
                        <td class="align-middle text-center">
                            <button class="btn" onclick="updateItemStart({$item['id']},{$item['category_id']})">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="blue" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-edit-3">
                                    <path d="M12 20h9"></path>
                                    <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                </svg>
                            </button>
                        </td>
                        <td class="align-middle text-center">
                            <button class="btn" onclick="removeItem({$item['id']})">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="red" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-x-octagon">
                                    <polygon
                                            points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                                    <line x1="15" y1="9" x2="9" y2="15"></line>
                                    <line x1="9" y1="9" x2="15" y2="15"></line>
                                </svg>
                            </button>
                        </td>
                    </tr>
                {/foreach}
                </tbody>
            </table>
        </div>
    </div>
    {include file='admin/modal/itemsAdd.tpl'}
    {include file='admin/modal/itemsEdit.tpl'}
    <script src="/libs/ckeditor5-classik-full/ckeditor.js"></script>
    <script src="/libs/ckfinder/ckfinder.js"></script>
    <script src="/public/js/ckeditorOptions.js"></script>
    <script src="/public/js/items.js"></script>
{/block}