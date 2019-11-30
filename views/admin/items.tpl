{extends file="admin/layout.tpl"}
{block name=title}Товары{/block}
{block name=body}
    <div class="container">
        <h2>Добавить товар</h2>
        <form action="/admin/item_create" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Наименование:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title"
                           placeholder="Введите наименование товара">
                </div>
            </div>
            <div class="form-group row">
                <label for="editor" class="col-sm-2 col-form-label">Описание:</label>
                <div class="col-sm-10">
                    <textarea name="description" id="editor"></textarea>

                </div>
            </div>
            <div class="form-group row">
                <label for="price" class="col-sm-2 col-form-label">Цена:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="price" name="price" placeholder="Введите цену товара">
                </div>
            </div>
            <div class="form-group  row">
                <label for="category_id" class="col-sm-2 col-form-label">Категории:</label>
                <div class="col-sm-10">
                    <select class="form-control" id="category_id" name="category_id">
                        <option selected disabled>Выбор категории</option>
                        {foreach $categories as $category}
                            <option value="{$category['id']}">{$category['name']}</option>
                        {/foreach}
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="file" class="col-sm-2 col-form-label">Картинка:</label>
                <div class="col-sm-10">
                    <input type="file" id="file" name="file" placeholder="Загрузить фаил">
                </div>
            </div>
            <div class="dropdown-divider"></div>
            <div class="form-group row">
                <div class="col-sm-12 text-right">
                    <input type="submit" class="btn btn-secondary mt-2" value="Создать">
                </div>
        </form>
    </div>
    <script src="/libs/ckeditor5-classik-full/ckeditor.js"></script>
    <script src="/libs/ckfinder/ckfinder.js"></script>
    <script>

        ClassicEditor

            .create( document.querySelector( '#editor' ), {
                highlight: {
                    options: [
                        {
                            model: 'yellowMarker',
                            class: 'marker-yellow',
                            title: 'Yellow marker',
                            color: 'var(--ck-highlight-marker-yellow)',
                            type: 'marker'
                        },
                        {
                            model: 'greenMarker',
                            class: 'marker-green',
                            title: 'Green marker',
                            color: 'var(--ck-highlight-marker-green)',
                            type: 'marker'
                        },
                        {
                            model: 'pinkMarker',
                            class: 'marker-pink',
                            title: 'Pink marker',
                            color: 'var(--ck-highlight-marker-pink)',
                            type: 'marker'
                        },
                        {
                            model: 'blueMarker',
                            class: 'marker-blue',
                            title: 'Blue marker',
                            color: 'var(--ck-highlight-marker-blue)',
                            type: 'marker'
                        },
                        {
                            model: 'redPen',
                            class: 'pen-red',
                            title: 'Red pen',
                            color: 'var(--ck-highlight-pen-red)',
                            type: 'pen'
                        },
                        {
                            model: 'greenPen',
                            class: 'pen-green',
                            title: 'Green pen',
                            color: 'var(--ck-highlight-pen-green)',
                            type: 'pen'
                        }
                    ]
                },
                fontColor: {
                    colors: [
                        {
                            color: 'hsl(0, 75%, 60%)',
                            label: 'Red'
                        },
                        {
                            color: 'hsl(30, 75%, 60%)',
                            label: 'Orange'
                        },
                        {
                            color: 'hsl(60, 75%, 60%)',
                            label: 'Yellow'
                        },
                        {
                            color: 'hsl(90, 75%, 60%)',
                            label: 'Light green'
                        },
                        {
                            color: 'hsl(120, 75%, 60%)',
                            label: 'Green'
                        },
                        {
                            color: 'hsl(0, 0%, 0%)',
                            label: 'Black'
                        },
                        {
                            color: 'hsl(0, 0%, 30%)',
                            label: 'Dim grey'
                        },
                        {
                            color: 'hsl(0, 0%, 60%)',
                            label: 'Grey'
                        },
                        {
                            color: 'hsl(0, 0%, 90%)',
                            label: 'Light grey'
                        },
                        {
                            color: 'hsl(0, 0%, 100%)',
                            label: 'White',
                            hasBorder: true
                        },


                        // ...
                    ]
                },
                fontSize: {
                    options: [
                        'tiny',
                        'small',
                        'default',
                        'big',
                        'huge'
                    ]
                },
                alignment: {
                    options: [ 'left', 'right','center','justify' ]
                },

                ckfinder: {
                    uploadUrl: '/libs/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
                },

                toolbar: ['ckfinder', 'imageUpload', '|', 'heading', '|', 'bold', 'italic','underline','subscript','superscript','|','alignment','fontSize','fontColor','highlight', '|', 'undo', 'redo', '|',  'insertTable', 'link','|',
                    'bulletedList', 'numberedList', 'blockQuote'],


                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' }
                    ]
                }


            } )

            .catch( error => {
                console.error( error );
            } );
    </script>
{/block}


