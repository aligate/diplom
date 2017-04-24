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

            
			
       <br>     
       <br>     
            <h4>Редактирование админа</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID Админ</th>
                    <th>Имя</th>
                    <th>Пароль</th>
                    
                    <th>Операции</th>
                   
                </tr>
				<form action="?/admin/update/id/{{adminToEdit.id}}" method="post">
               
                    <tr>
                        <td>{{adminToEdit.id}}</td>
                        <td>{{adminToEdit.name}}</td>
                        <td><input type="password" name="password" value="{{adminToEdit.password}}" /></td>
                       
                        <td><input type="submit" name="change" value="Сохранить изменения" /></td>
                       
                    </tr>
					
					</form>
            </table>

        </div>
    </div>
</section>

{% include 'footer_admin.php'%}

