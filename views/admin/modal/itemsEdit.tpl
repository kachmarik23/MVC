<div id="itemsEdit" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLongTitle">Данные о товаре</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="catRem()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input id="id_item" type="hidden">
                <input type="text" class="form-control mb-2" id="titleEdit" placeholder="Наименование">
                <textarea class="form-control mb-2" name="intro" id="introEdit"
                          placeholder="Краткое писание"></textarea>
                <textarea name="description" id="editorEdit" placeholder="Описание"></textarea>
                <input type="text" class="form-control mb-2 mt-2" id="priceEdit" name="price" placeholder="Цена">
                <select  class="form-control mb-2" id="category_id_Edit" name="category_id">
                    <option disabled>Категория</option>
                    {foreach $categories as $category}
                        <option value="{$category['id']}">{$category['name']}</option>
                    {/foreach}
                </select>
                <div class="form-group row">
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="quantityEdit" name="quantityEdit"
                               placeholder="Количество">
                    </div>
                    <label for="file" class="col-sm-2 col-form-label ml-1 ">Изменить: </label>
                    <div id="pic" ></div><!--Картинку вставляю в js-->
                    <div class="col-sm-4">

                        <input type="file" id="image_fileEdit" name="file" placeholder="Загрузить фаил">
                    </div>
                </div>
                <div id="itemsEdit_err" class="alert alert-danger" style="display: none"><strong>Error: </strong><span
                            id="message_itemsEdit"></span></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="catRem()">Закрыть</button>
                    <button type="button" class="btn btn-primary" onclick="updateItemEnd()">Сохранить</button>
                </div>
            </div>
        </div>
    </div>
</div>