{% include 'header_admin.php'%}

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="?/category/list">Админпанель</a></li>
                    <li class="active">Управление категориями</li>
                </ol>
            </div>

           <div style="float: left">
    <form action= "?/request/add/cat/{{entry.0.category_id}}" method="POST">
       Новый вопрос: <input type="text" name="text" placeholder="Имя" value="" />
        
        <input type="submit" name="save" value="Создать вопрос" />
    </form>
</div>
       <br>     
       <br>
            
            <h4>Рубрика: {{entry.0.title}}</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    
                    <th>Текст вопроса</th>
                    <th>Дата</th>
                    <th>Статус</th>
					<th>Публикация</th>
                    <th>Редактировать</th>
                    <th>Удалить</th>
                </tr>
                {%for item in entry%}
					{%if item.text==NULL%}
					<p style="color: red">{{'В этой рубрике пока нет вопросов'}}</p>
						{%else%}
                    <tr>
                       
                        <td>{{item.text}}</td>
						 <td>{{item.dated}}</td>
							 {%if item.has_responce=='0'%}
                        <td><p style="color: red">{{'Ожидает ответа'}}</td>
							{%else%}
						 <td>{{'Дан ответ'}}</td>
							 {%endif%}
							{%if item.is_published=='0'%}
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

