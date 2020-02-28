<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="itemsAdd">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Данные о товаре</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                        <input type="text" class="form-control mb-2" id="title" placeholder="Наименование">
                        <textarea class="form-control mb-2"  name="intro" id="intro" placeholder="Краткое писание" ></textarea>
                        <textarea  name="description" id="editor" placeholder="Описание"></textarea>
                        <input type="text" class="form-control mb-2 mt-2" id="price" name="price" placeholder="Цена">
                        <select class="form-control mb-2" id="category_id" name="category_id">
                            <option selected disabled>Категория</option>
                            {foreach $categories as $category}
                                <option value="{$category['id']}">{$category['name']}</option>
                            {/foreach}
                        </select>
                <div class="form-group row">
                    <div class="col-sm-5">
                        <input type="text" class="form-control"  id="quantity" name="quantity" placeholder="Количество">
                    </div>
                    <label for="file" class="col-sm-2 col-form-label ml-1 ">Изображение: </label>
                    <div class="col-sm-4">
                        <input type="file" id="image_file" name="file" placeholder="Загрузить фаил">
                    </div>
                </div>
             <div id="itemsAdd_err" class="alert alert-danger" style="display: none"><strong>Error: </strong><span id="message_itemsAdd"></span></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть </button>
                <button type="button" class="btn btn-primary"   onclick="createItem()">Сохранить</button>
            </div>
        </div>
    </div>
</div>
</div>