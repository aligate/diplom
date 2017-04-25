{% include 'header_admin.php'%}

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="?/admin/list">Админпанель</a></li>
                    <li><a href="?/request/entry/cat/{{entryToEdit.category_id}}">к списку вопросов</a></li>
                    <li class="active">Редактировать вопрос</li>
                </ol>
            </div>


            <h4>Редактировать вопрос к теме: {{entryToEdit.title}}</h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="?/request/update/cat/{{entryToEdit.category_id}}/id/{{entryToEdit.id}}" method="post">

                        <p>Текст вопроса</p>
                        <input type="text" name="text" placeholder="" value="{{entryToEdit.text}}">

                       <p>Тема</p>
                        <select name="cat_id">
                       
					   {%for category in categories%}
					   {%if entryToEdit.category_id == category.category_id%}
        <option value="{{category.category_id}}"  {{'selected="selected"'}}>{{category.title}}</option>
			{%else%}
			<option value="{{category.category_id}}">{{category.title}}</option>
									{%endif%}
									{%endfor%}
                          
                        </select>
                        
                        <br/><br/>

						<p>Добавление / редактирование ответа к вопросу</p>
                        <textarea rows="10" name="responce">{{entryToEdit.res_text}}</textarea>
                        
                        <br/><br/>

                        <p>Статус</p>
                        <select name="is_published">
                            <option value="1" {%if entryToEdit.is_published=='1'%} {{' selected="selected"'}}{%endif%}>Опубликован</option>
                            <option value="0" {%if entryToEdit.is_published=='0'%} {{' selected="selected"'}}{%endif%}>Скрыт</option>
                        </select>
                        
                        <br/><br/>
                        
                       
                         <p>Автор</p>
                        <input type="text" name="author" placeholder="Автор" value="{{entryToEdit.author}}">
                        <br/><br/>
                        
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                        
                        <br/><br/>
                        
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

{% include 'footer_admin.php'%}

