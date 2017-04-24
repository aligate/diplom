<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

	
	
	<link rel="stylesheet" href="css/response.css"> <!-- Resource style -->
	
	<title>FAQ</title>
</head>
<body>
<header>
	

</header>

</form>
<form action="?/main/form/" method="post" id="contact" >
  <div class="container">
    <div class="head">
      <h2>Задайте Ваш вопрос</h2>
	 
    </div>
	{%for type, value in message%}
				{%if type == 'success'%}
					<p style='color: green;'>{{value.0}}<p>
					{%else%}
					<p style='color: red;'>{{value.0}}<p>
					{%endif%}
				{%endfor%}
    <input type="text" name="name" placeholder="Name" value="{{name}}" /><br />
    <input  type="email" name="email" placeholder="Email"  value="{{email}}"/><br />
	<select name="cat">
				<option  selected disabled>выберите рубрику</option>
				{%for item in categories%}	
					<option value="{{item.category_id}}">{{item.title}}</option>
				{%endfor%}
					</select>
    <textarea type="text" name="text" placeholder="Message" value="{{text}}"></textarea><br />
    <div class="message">Message Sent</div>
    <p><button id="submit" type="submit">
      Отправить
    </button></p>
	
	</form>
	
	<a href="?/main/list/"><input type="button" value="Вернуться к списку вопросов"></a>
	
  </div>


</body>
</html>