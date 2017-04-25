{% include 'header_admin.php'%}

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="?/category/list">Админпанель</a></li>
                    <li class="active">Новые вопросы</li>
                </ol>
            </div>

          
       <br>     
       <br>
            
            <h4>Список новых вопросов</h4>

            <br/>
			{%if newEntries == NULL%}
					<p style="color: red">{{'Новых вопросов нет'}}</p>
					{%else%}

            <table class="table-bordered table-striped table">
                <tr>
                    
                    <th>новые вопросы</th>
                    <th>Дата</th>
                    <th>Тема</th>
					<th>Статус</th>
                    <th>Редактировать</th>
                    <th>Удалить</th>
                </tr>
				
                {%for item in newEntries%}
					
						
                    <tr>
                       
                        <td><a href="?/request/edit/cat/{{item.category_id}}/id/{{item.id}}">{{item.text}}</a></td>
						 <td>{{item.dated}}</td>
						 <td>{{item.title}}</td>
							 {%if item.has_responce=='0'%}
                        <td><p style="color: red">{{'Ожидает ответа'}}</td>
							
							
                        <td><a href="?/request/edit/cat/{{item.category_id}}/id/{{item.id}}" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="?/request/delete/cat/{{item.category_id}}/id/{{item.id}}" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
					{%endif%}
					{%endfor%}
					
            </table>
            {%endif%}
        </div>
    </div>
</section>

{% include 'footer_admin.php'%}

