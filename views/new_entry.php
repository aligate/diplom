{% include 'header_admin.php'%}

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="?/category/list">Админпанель</a></li>
                    <li class="active">Управление вопросами</li>
                </ol>
            </div>
			<div style="float: right"><a href="?/request/new" class="btn btn-default back"><i class="fa fa-plus"></i> Все новые вопросы</a></div>

           <div style="float: left">
    <form action= "?/request/add/cat/{{entry.0.category_id}}" method="POST">
       Новый вопрос: <input type="text" name="text" placeholder="Имя" value="" />
        
        <input type="submit" name="save" value="Создать вопрос" />
    </form>
</div>
       <br>     
       <br>
            
            <h4>Тема: {{entry.0.title}}</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    
                    <th>Текст вопроса</th>
                    <th>Дата</th>
                    <th>Автор</th>
                    <th>Статус</th>
		    <th>Публикация</th>
                    <th>Редактировать</th>
                    <th>Удалить</th>
                </tr>
                {%for item in entry%}
					{%if item.text==NULL%}
					<p style="color: red">{{'В этой теме пока нет вопросов'}}</p>
						{%else%}
                    <tr>
                       
                        <td>{{item.text}}</td>
						 <td>{{item.dated}}</td>
						 <td>{{item.author}}</td>
							 {%if item.has_responce=='0'%}
                        <td><p style="color: red">{{'Ожидает ответа'}}</td>
							{%else%}
						 <td>{{'Дан ответ'}}</td>
							 {%endif%}
							{%if item.is_published=='1'%}
							<td>{{'Опубликован'}}</td>
								{%else%}
                        <td>{{'Скрыт'}}</td>  
							{%endif%}
                        <td><a href="?/request/edit/cat/{{item.category_id}}/id/{{item.id}}" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="?/request/delete/cat/{{item.category_id}}/id/{{item.id}}" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
					{%endif%}
					{%endfor%}
            </table>
            
        </div>
    </div>
</section>

{% include 'footer_admin.php'%}

