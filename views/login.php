{% include 'header_admin.php'%}

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">

               <div class="signup-form"><!--sign up form-->
                    <h2>Вход в админпанель</h2>
                    <form action="?/admin/login" method="post">
                        <input type="text" name="login" placeholder="Логин" value="{{log}}"/>
                        <input type="password" name="password" placeholder="Пароль" value=""/>
                        <input type="submit" name="auth" class="btn btn-default" value="Вход" />
                    </form>
				
                </div><!--/sign up form-->
	

                <br/>
                <br/>
				
					<p style='color: red;'>{{message.0}}<p>
					
            </div>
        </div>
    </div>
</section>

{% include 'footer_admin.php'%}