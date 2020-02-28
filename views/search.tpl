{extends file="layout.tpl"}
{block name=title}Поиск{/block}
{block name=body}
    <div class="container">
        <div class="row">

            <h2>Поиск по сайту:</h2>
            <div class="col-sm-12">
                <input type="text" id="search">
            </div>
            <div class="col-sm-12">
                <div id="holder"></div>
            </div>
        </div>
    </div>
    <script>
        //сдушаем input по отпущенной клавише извлекаем val потом передаем через POST
        $('#search').on('keyup', function () {
            var text = $('#search').val().trim();
            if (text.length < 3) {
                return;//если мение 3х букв в запросе выходим
            }
            $.post('/search/make', {
                text: text
            }, function (res) {
                console.log('cache: '+res.cache);
                $('#holder').empty();//очистить блок
                var len = res.data.length;// колво элементов в массиве
                var html = '';
                for (var i = 0; i < len; i++) {
                    html = "<div>" + res.data[i].name + "</div>" +
                        "<div>" + res.data[i].description + "</div>" +
                        "<div>" + res.data[i].price +"$" + "</div>" +
                        "<hr>";
                    $('#holder').append(html);//добавить в id holder
                }
            });
        });
    </script>
{/block}



