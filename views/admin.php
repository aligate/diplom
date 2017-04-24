{% include 'header_admin.php'%}

<section>
    <div class="container">
        <div class="row">
            
            <br/>
            
            <h4>Добрый день, {{session.name}}!</h4>
            
            <br/>
            
            <p>Вам доступны такие возможности:</p>
            
            <br/>
            
            <ul>
                <li><a href="?/admin/user">Управление пользователями</a></li>
                <li><a href="?/category/list">Управление рубриками, вопросами и ответами</a></li>
				
            </ul>
            
        </div>
    </div>
</section>

{% include 'footer_admin.php'%}

