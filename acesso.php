<!DOCTYPE html>
<html class=" js csstransforms3d csstransitions">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1.0,width=device-width">
	<title>EloCloud Finder</title>
	<script async="" src="./resources/img/cloud.png"></script>
	<link rel="icon" type="image/png" sizes="32x32" href="resources/img/icloud.png">
	<link rel="shortcut icon" href="favicon.png">
	<link rel="stylesheet" type="text/css" href="./resources/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="./resources/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./resources/css/style.css">

</head>
		<div class="container">
			<!--MENU-->
			<nav class="menu">
				<ul class="list-inline">
					<center><li><a href="index.php">Home</a></li></center>

				</ul>
	  </nav>
	  </div>
<?php
//--------------------------------//
$senhaverify = "password_br007";     // <- Senha para login
//--------------------------------//

if(isset($_POST['newkey']))
{
    if($_POST['newkey'] != ""){
        fwrite(fopen("resources/api_key_007.txt", "w"), $_POST['newkey']);
        echo "<center><h2>Nova key:".$_POST['newkey']."<br>sua key foi atualizada com sucesso!";
    }
}

session_start(); //Para qualquer função session é preciso ter ela inciada

	if(!empty($_POST)){
		$senha = $_POST['senha'];

		if($senha == $senhaverify){
			$_SESSION["login"] = "sim"; //Apenas um exemplo, se existir a sessao e exibir $_SESSION['login'] por um echo, irá retornar "sim"
		}

	}
	if(isset($_GET['acao'])){
		if($_GET['acao'] == "sair"){
			session_destroy();
			header("Location: acesso.php"); //Redireciona a pagina para o estado inicial sem a url com get, caso contrario ele vai logar e sair na mesma hora
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Acesso</title>
		<meta charset="utf-8">
	</head>
	<center><body><li id="view">
</li><img src="resources/img/riot.png"><br><br>
		<?php if(isset($_SESSION["login"])){ ?> <!-- Verifica se existe uma session login, no caso nao esta verificando se a sessao login é "sim" -->

			<h1>Ola Gabriel, Insira nova key da api!.</h1>
            <fieldset><legend>Nova Key:</legend>
            <form method='post'><input type='text' name='newkey' placeholder='RGAPI-991d8012-0a0e-4981-82f5-d86687ca1fdc'><input type='submit' value='ativar nova key'></form>
                <form method="post">
        
    </form>
			<a href="?acao=sair">Clique aqui para deslogar</a>

		<?php }else{ ?>
<h2>Password<br><br></h2>
		<form method="post">
        
			<input type="password" name="senha" placeholder="Digite a senha">
			<input type="submit" value="Logar-se">
		</form>

		<?php } ?>

	</body>
</html>