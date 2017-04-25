{% include 'header_admin.php'%}

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="?/admin/list">Админпанель</a></li>
                    <li class="active">Управление темами</li>
                </ol>
            </div>
<div style="float: right"><a href="?/request/new" class="btn btn-default back"><i class="fa fa-plus"></i> Все новые вопросы</a></div>
           <div style="float: left">
    <form action= "?/category/add" method="POST">
       Название темы: <input type="text" name="name" placeholder="Имя" value="" />
        
        <input type="submit" name="save" value="Добавить тему" />
    </form>
</div>
       <br>     
       <br>
            
            <h4>Список тем</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID темы</th>
                    <th>Название темы</th>
                  
                    <th>Вопросы</th>
                    <th>Опубликовано</th>
                    <th>Ожидают ответа</th>
                   
                    <th></th>
                </tr>
                {%for category in getAllCategories%}
                    <tr>
                        <td>{{category.category_id}}</td>
                        <td><a href="?/request/entry/cat/{{category.category_id}}">{{category.title}}</a></td>
                       
							{%if category.cat_id==NULL%}
							<td>{{'0'}}</td>
								{%else%}
                        <td>{{category.requests}}</td>  
							{%endif%}
                        <td>{{category.is_published}}</td>
                        <td>{{category.no_responce}}</td>
                        <td><a href="?/category/delete/cat/{{category.category_id}}" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
					{%endfor%}
            </table>
            
        </div>
    </div>
</section>

{% include 'footer_admin.php'%}

