<div id='page-wrap'>
<header class='main' id='h1'>
  <span class="right"><a href="registro">Registro</a></span>
        <span class="right"><a href="login">Login</a></span>
        <span class="right" style="display:none;"><a href="/logout">Logout</a></span>
		<?php 
			//if(!isset('GET[email]'){
				//mostrar registro y login
			//}else{
				//comprobar en la base de datos si está el email
				//if(está){
					//mostrar Logout y email y foto
					//para mostrar la foto coger toda la row con la que coincidan email y pass y coger el campo imagen
				//else
					//mostrar registro y login
			//}
		?>
</header>
<nav class='main' id='n1' role='navigation'>
			<?php 
				//if(!isset('GET[email]'){
					//mostrar Inicio y Creditos
				//}else{
					//comprobar en la base de datos si está el email
					//if(está){
						//mostrar Inicio Insertar Pregunta, Mostrar Preguntas, Creditos
					//else
						//mostrar Inicio y Créditos
				//}
			?>

  <span><a href='Layout.php'>Inicio</a></span>
  <span><a href='QuestionFormWithImage.php'> Insertar Pregunta</a></span>
  <span><a href='Credits.php'>Creditos</a></span>
</nav>

