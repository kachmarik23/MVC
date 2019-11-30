{extends file="layout.tpl"}
{block name=title}Список пользователей{/block}
{block name=body}
    <h2>Пользователи:</h2>
    <table class="table table-striped">
        <thead>
        <th>ID</th>
        <th>Login</th>
        </thead>
        <tbody>
        <!-- начало цикла -->
        {foreach $users as $user}<!-- управляющая конструкция пишется в фигурных скобках-->
        <tr {if ($user['id']==($smarty.session.user.id)&&$user['login']===($smarty.session.user.login))}class="bg-info"{/if}>
            <td>{$user['id']}</td>
            <td>{$user['login']}</td>
        </tr>
        {/foreach}<!-- окончание цикла -->
        </tbody>
    </table>
{/block}


