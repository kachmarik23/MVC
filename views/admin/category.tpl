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
                    <th>Кол-во наименований</th>
                    <th colspan="2" class="text-center"> Действия</th>
                    </thead>
                    <tbody id="row_holder">
                    {foreach $categories as $category}
                        <tr id="row_{$category['id']}">
                            <td>{$category['id']}</td>
                            <td id="name_{$category['id']}">{$category['name']}</td>
                            <td>{if (!$category['0'])}0{/if}{$category['0']}</td>{*количество товара в категории admin/category*}
                            <td class="text-center">
                                <button class="btn btn-warning btn-sm" id="update_{$category['id']}"
                                        onclick="updateStart({$category['id']})">
                                    Изменить
                                </button>
                            </td>
                            <td class="text-center">
                                <button onclick="removeCategory({$category['id']})"
                                        class="btn btn-danger  btn-sm">Удалить
                                </button>
                            </td>
                        </tr>
                    {/foreach}
                    </tbody>
                </table>
                <h3>Добавить категорию:</h3>
                <div class="form-row">
                    <div class="col-9">
                        <input class="form-control" type="text" id="new_category"
                               placeholder="Введите категорию">
                    </div>
                    <div class="col">
                        <button class="btn_create_cat btn btn-success ml-1">Добавить</button>
                    </div>
                </div>
                <div class=" col-9 alert alert-danger mt-2" style="display: none"><strong>Error:</strong><span
                            id="message"></span></div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalErr" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ошибка </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <strong>Error:</strong><span id="messageModal"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="/public/js/category.js"></script>
{/block}