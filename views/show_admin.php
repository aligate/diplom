{% include 'header_admin.php'%}

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="?/admin/list">Админпанель</a></li>
                    <li class="active">Управление админами</li>
                </ol>
            </div>

            
			<div style="float: left">
    <form action= "?/admin/add" method="POST">
       Введите имя: <input type="text" name="name" placeholder="Имя" value="" />
        Создайте пароль:<input type="password" name="password" placeholder="Пароль" value="" />
        <input type="submit" name="save" value="Добавить админа" />
    </form>
</div>
       <br>     
       <br>     
            <h4>Список админов</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID Админ</th>
                    <th>Имя</th>
                    <th>Пароль</th>
                    
                    <th></th>
                    <th></th>
                </tr>
                {%for item in adminList%}
                    <tr>
                        <td>{{item.id}}</td>
                        <td>{{item.name}}</td>
                        <td>{{item.password}}</td>
                       
                        <td><a href="?/admin/update/id/{{item.id}}" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="?/admin/delete/id/{{item.id}}" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
					{%endfor%}
            </table>

        </div>
    </div>
</section>

{% include 'footer_admin.php'%}

