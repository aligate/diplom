{% include 'header_admin.php'%}

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="?/admin/list">Админпанель</a></li>
                    <li class="active">Управление категориями</li>
                </ol>
            </div>

           <div style="float: left">
    <form action= "?/category/add" method="POST">
       Название рубрики: <input type="text" name="name" placeholder="Имя" value="" />
        
        <input type="submit" name="save" value="Добавить рубрику" />
    </form>
</div>
       <br>     
       <br>
            
            <h4>Список категорий</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID категории</th>
                    <th>Название категории</th>
                    <th>Порядковый номер</th>
                    <th>Вопросы</th>
                    <th></th>
                    <th></th>
                </tr>
                {%for category in getAllCategories%}
                    <tr>
                        <td>{{category.category_id}}</td>
                        <td><a href="?/request/entry/cat/{{category.category_id}}">{{category.title}}</a></td>
                        <td>{{category.sort_order}}</td>
							{%if category.cat_id==NULL%}
							<td>{{'0'}}</td>
								{%else%}
                        <td>{{category.requests}}</td>  
							{%endif%}
                        <td><a href="?/category/update/cat/{{category.category_id}}" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="?/category/delete/cat/{{category.category_id}}" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
					{%endfor%}
            </table>
            
        </div>
    </div>
</section>

{% include 'footer_admin.php'%}

