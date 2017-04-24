{% include 'header.php'%}
<section class="cd-faq">
	
	<ul class="cd-faq-categories">

	{%for key, value in data%}
		
	
		<li><a href="#{{key|lower}}">{{key}}</a></li>
		
	{%endfor%}
	</ul> <!-- cd-faq-categories -->

	<div class="cd-faq-items">
	{%for key, value in data%}
		<ul id="{{key|lower}}" class="cd-faq-group">
			<li class="cd-faq-title"><h2>{{key}}</h2></li>
				{%for item in value%}
			<li>
				<a class="cd-faq-trigger" href="#{{item.id}}">{{item.req_text}}</a>
				<div class="cd-faq-content">
					<p>{{item.res_text}}</p>
				</div> <!-- cd-faq-content -->
			</li>
			{%endfor%}
			
	</ul> <!-- cd-faq-group -->
		{%endfor%}
		<br>
	
     
   <a href="?/main/form/"><input type="button" value="Или задайте ваш вопрос"></a>
		
	</div> <!-- cd-faq-items -->
	<a href="#0" class="cd-close-panel">Open</a>
</section> <!-- cd-faq -->
{% include 'footer.php'%}