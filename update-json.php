<?php require_once "inc/head.php" ?>
<?php require_once "inc/header.php" ?>
	<main>
		<img id="jason" src="assets/img/jason1.jpg" title="Vamos por partes..." alt="Jason do South Park" width="256px" height="256px">
		<h1>JSON + CRUD</h1>
		<section id="readJson">
			<h2>Update</h2>
			<article>
				<p>Estamos quase lá! Caso tenha caído de para-quedas nessa página, sugerimos que confira as lições anteriores:</p>
				<ul>
					<li><a href="index.php" title="CRUD JSON PHP" rel="previous">Início</a></li>
					<li><a href="create-json.php" title="Como criar e salvar um registro num arquivo json?" rel="previous">Create</a></li>
					<li><a href="read-json.php" title="Como exibir um ou mais registros do Json no meu HTML?" rel="previous">Read</a></li>
				</ul>
				<p>Agora, se você já aprendeu a criar e a 'ler' os registros do <b>Json</b>, vamos em frente!</p>
				<h3>Como editar um registro já inserido no nosso Json?</h3>
				<!-- <p>Obviamente, antes de editar um registro, precisamos antes capturá-lo. Para isso, vamos reaproveitar nossas funções previamente declaradas. Nesse caso faremos uma pequena alteração na função de listar os usuários e vamos exibí-los em uma tabela (mas não vamos entrar em detalhes pois isso é apenas <span class="html">HTML</span>).</p> -->
				<?php listarAlunosTb($meuJsonArray); ?>
				<hr>
				<?php
					if($_REQUEST && isset($_REQUEST["alunoUpdateEmail"])){
						editarAluno($meuJsonArray, $_REQUEST["alunoUpdateEmail"]);
					}
				?>
				<hr>
				<?php
					if($_REQUEST && isset($_REQUEST["atualizarAluno"])){
						$nome = $_REQUEST["nome"];
						$sobrenome = $_REQUEST["sobrenome"];
						$email = $_REQUEST["email"];
						$telefone = $_REQUEST["telefone"];
						$celular = $_REQUEST["celular"];
						$tipo = $_REQUEST["tipo"];
						$logradouro = $_REQUEST["logradouro"];
						$numero = $_REQUEST["numero"];
						$complemento = $_REQUEST["complemento"];
						$bairro = $_REQUEST["bairro"];
						$cep = $_REQUEST["cep"];
						$cidade = $_REQUEST["cidade"];
						$uf = $_REQUEST["uf"];
						$pais = $_REQUEST["pais"];
						$profissao = $_REQUEST["profissao"];

						$updatedAluno = [
							"nome" => $nome,
							"sobrenome" => $sobrenome,
							"email" => $email,
							"telefone" => $telefone,
							"celular" => $celular,
							"tipo" => $tipo,
							"logradouro" => $logradouro,
							"numero" => $numero,
							"complemento" => $complemento,
							"bairro" => $bairro,
							"cep" => $cep,
							"cidade" => $cidade,
							"uf" => $uf,
							"pais" => $pais,
							"profissao" => $profissao
						];

						$alunoAtualizado = atualizarAluno($updatedAluno);
					}
				?>
				<hr>
				<nav>
					<a class="anterior" href="read-json.php" title="Quero aprender a inserir conteúdo no meu Json" rel="previous"><span class="htmlEntities">&#8678;</span> Voltar</a>
					<a class="proximo" href="read-json.php" title="Quero aprender a inserir conteúdo no meu Json" rel="next">Avançar <span class="htmlEntities">&#8680;</span></a>
				</nav>
			</article>
		</section>
	</main>
	<aside></aside>
<?php require_once "inc/footer.php" ?>