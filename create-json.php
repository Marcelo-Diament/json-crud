<?php require_once "inc/head.php" ?>
<?php require_once "inc/header.php" ?>
<?php

	if ($_REQUEST) {
		$nome = $_REQUEST["nome"];
		$sobrenome = $_REQUEST["sobrenome"];
		$email = $_REQUEST["email"];
		$senha = $_REQUEST["senha"];
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

		$novoAluno = [
			"nome" => $nome,
			"sobrenome" => $sobrenome,
			"email" => $email,
			"senha" => $senha,
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

		$alunoRegistrado = cadastrarAluno($novoAluno);
	}

?>
	<main>
		<img id="jason" src="assets/img/jason1.jpg" title="Vamos por partes..." alt="Jason do South Park" width="256px" height="256px">
		<h1>JSON + CRUD</h1>
		<section id="createJson">
			<h2>Create</h2>
			<article>
				<p>Bom, vamos começar a inserção de dados no nosso <b>Json</b>. Para podermos inserir esses valores, precisaremos de um formulário. Como o tema tratado aqui é o <b>CRUD</b> em <b>Json</b> - e não <b>HTML</b> - vamos direto ao ponto. Mas antes de começarmos, crie um arquivo <span class="arquivo">index.php</span> na raíz do seu projeto - é nesse arquivo que criaremos nosso formulário.</p>
				<h3>Formulário para captação dos dados a serem inseridos no Json</h3>
				<p class="dica"><span class="htmlEntities">&#10026;</span> Lembre-se, capturamos os valores dos <b>inputs</b> através da <b>superglobal</b> <span class="php">$_POST</span>. Podemos selecionar um valor específico declarando o <b>name</b> do <b>input</b> desejado entre colchetes - <span class="php">$_POST["name"]</span>.</p>
				<p>Usaremos o seguinte formulário para inserirmos um novo registro em nosso <b>Json</b>:</p>
				<form action="" method="post" enctype="multipart/form-data">
					<h4>Formulário de Cadastro de Aluno</h4>
					<small>Preencha todos os campos corretamente. O 'x' vermelho só sumirá quando o campo for preenchido corretamente.</small>
					<p class="alerta"><span class="htmlEntities">&#9763;</span> Atenção: esses dados ficarão salvos no servidor, então NÃO INSIRA DADOS REAIS!</p>
						<div>
							<label for="inputNome">Nome</label>
							<input autocomplete="off" type="text" name="nome" id="inputNome" placeholder="Fulano" required>
							<span class="validity"></span>
						</div>
						<div>
							<label for="inputSobrenome">Sobrenome</label>
							<input autocomplete="off" type="text" name="sobrenome" id="inputSobrenome" placeholder="de Tal" required>
							<span class="validity"></span>
						</div>
						<div>
							<label for="inputEmail">email</label>
							<input autocomplete="off" type="email" name="email" id="inputEmail" placeholder="conta@domínio.com" required>
							<span class="validity"></span>
						</div>
						<div>
							<label for="inputSenha">Senha</label>
							<input autocomplete="off" type="password" name="senha" id="inputSenha" required minlength="8" maxlength="8" placeholder="Senha com 8 dígitos">
							<span class="validity"></span>
						</div>
						<div>
							<label for="inputAvatar">Avatar</label>
							<input autocomplete="off" type="file" name="avatar" id="inputAvatar" required>
							<span class="validity"></span>
						</div>
						<div>
							<label for="inputTelefone">Telefone</label>
							<input autocomplete="off" type="tel" name="telefone" id="inputTelefone" pattern="\+[0-9]{2} [0-9]{2} [0-9]{8}" placeholder="+55 11 12345678" value="+55 11 " maxlength="15" minlength="15" required>
							<span class="validity"></span>
						</div>
						<div>
							<label for="inputCelular">Celular</label>
							<input autocomplete="off" type="tel" name="celular" id="inputCelular" pattern="\+[0-9]{2} [0-9]{2} [0-9]{9}" placeholder="+55 11 123456789"  value="+55 11 " maxlength="16" minlength="16" required>
							<span class="validity"></span>
						</div>
						<div>
							<label for="inputTipo">Tipo</label>
							<input autocomplete="off" type="text" name="tipo" id="inputTipo" placeholder="Rua, Avenida, Travessa..." required>
							<span class="validity"></span>
						</div>
						<div>
							<label for="inputLogradouro">Logradouro</label>
							<input autocomplete="off" type="text" name="logradouro" id="inputLogradouro" placeholder="Nossa Senhora do Ó" required>
							<span class="validity"></span>
						</div>
						<div>
							<label for="inputNumero">Número</label>
							<input autocomplete="off" type="text" name="numero" id="inputNumero" placeholder="123-A" required>
							<span class="validity"></span>
						</div>
						<div>
							<label for="inputComplemento">Complemento</label>
							<input autocomplete="off" type="text" name="complemento" id="inputComplemento" placeholder="Apto. 987" required>
							<span class="validity"></span>
						</div>
						<div>
							<label for="inputBairro">Bairro</label>
							<input autocomplete="off" type="text" name="bairro" id="inputBairro" placeholder="Centro" required>
							<span class="validity"></span>
						</div>
						<div>
							<label for="inputCep">CEP</label>
							<input autocomplete="off" type="text" name="cep" id="inputCep" pattern="[0-9]{5}-[0-9]{3}" placeholder="12345-678"  maxlength="9" minlength="9" required>
							<span class="validity"></span>
						</div>
						<div>
							<label for="inputCidade">Cidade</label>
							<input autocomplete="off" type="text" name="cidade" id="inputCidade" placeholder="São Paulo" value="São Paulo" required>
							<span class="validity"></span>
						</div>
						<div>
							<label for="inputUF">UF</label>
							<input autocomplete="off" type="text" name="uf" id="inputUF" placeholder="SP" value="SP" maxlength="2" minlength="2" required>
							<span class="validity"></span>
						</div>
						<div>
							<label for="inputPais">País</label>
							<input autocomplete="off" type="text" name="pais" id="inputPais" placeholder="Brasil" value="Brasil" required>
							<span class="validity"></span>
						</div>
						<div>
							<label for="inputProfissao">Profissão</label>
							<input autocomplete="off" type="text" name="profissao" id="inputProfissao" placeholder="Desenvolvedor Full Stak" required>
							<span class="validity"></span>
						</div>
						<input class="enviar" type="submit" name="cadastrar">
				</form>
				<p>Um pouquinho extenso né... rs... O intuito é fixar o aprendizado - e para isso, nada como a repetição!</p>
				<p class="dica"><span class="htmlEntities">&#10026;</span> Gostou da validação em <b>HTML5</b> do nosso form? Inspecione os códigos para entender como foi feita. Utilizamos <b>HTML5</b> e <b>CSS</b> com <b>pseudo-elementos</b>. ;)</p>
				<h3>Atrelando os valores do formuário à variáveis</h3>
				<p>Quando o usuário preencher e enviar o formulário, precisamos capturar esses valores e salvá-los em uma <b>variável</b>. Faremos isso através do <span class="php">$_REQUEST</span>. Sabe por que? Pois o <span class="php">$_REQUEST</span> captura tanto dados enviados por <span class="php">$_POST</span> quanto por <span class="php">$_GET</span>. Já sabia dessa?</p>
				<p>O primeiro passo é verificar se há dados sendo enviados pelo formulário. Então inserimos uma condicional (<span class="php">if</span>) para validar isso.</p>
				<code>
					<b>if($_REQUEST){<br/><span class="identado">// nosso código</span><br/>}</b>
				</code>
				<p>E agora vamos salvar as variáveis:</p>
				<code>
					<i>if ($_REQUEST) {</i><br/>
						<b>
							<span class="identado">$nome = $_REQUEST["nome"];</span><br/>
							<span class="identado">$sobrenome = $_REQUEST["sobrenome"];</span><br/>
							<span class="identado">$email = $_REQUEST["email"];</span><br/>
							<span class="identado">$senha = $_REQUEST["senha"];</span><br/>
							<span class="identado">$telefone = $_REQUEST["telefone"];</span><br/>
							<span class="identado">$celular = $_REQUEST["celular"];</span><br/>
							<span class="identado">$tipo = $_REQUEST["tipo"];</span><br/>
							<span class="identado">$logradouro = $_REQUEST["logradouro"];</span><br/>
							<span class="identado">$numero = $_REQUEST["numero"];</span><br/>
							<span class="identado">$complemento = $_REQUEST["complemento"];</span><br/>
							<span class="identado">$bairro = $_REQUEST["bairro"];</span><br/>
							<span class="identado">$cep = $_REQUEST["cep"];</span><br/>
							<span class="identado">$cidade = $_REQUEST["cidade"];</span><br/>
							<span class="identado">$uf = $_REQUEST["uf"];</span><br/>
							<span class="identado">$pais = $_REQUEST["pais"];</span><br/>
							<span class="identado">$profissao = $_REQUEST["profissao"];</span><br/>
						</b>
					<i>}</i>
				</code>
				<p>Mas ainda tem mais...</p>
				<h3>Adicionando os valores capturados a um <b>array associativo</b> (chave => valor)</h3>
				<p>Bom, vamos atrelar essas variáveis a um <b>array</b> <span class="variavel">novoAluno[]</span>:</p>
				<code>
					<i>if ($_REQUEST) {<br/>
							<span class="identado">$nome = $_REQUEST["nome"];</span><br/>
							<span class="identado">$sobrenome = $_REQUEST["sobrenome"];</span><br/>
							<span class="identado">$email = $_REQUEST["email"];</span><br/>
							<span class="identado">$senha = $_REQUEST["senha"];</span><br/>
							<span class="identado">$telefone = $_REQUEST["telefone"];</span><br/>
							<span class="identado">$celular = $_REQUEST["celular"];</span><br/>
							<span class="identado">$tipo = $_REQUEST["tipo"];</span><br/>
							<span class="identado">$logradouro = $_REQUEST["logradouro"];</span><br/>
							<span class="identado">$numero = $_REQUEST["numero"];</span><br/>
							<span class="identado">$complemento = $_REQUEST["complemento"];</span><br/>
							<span class="identado">$bairro = $_REQUEST["bairro"];</span><br/>
							<span class="identado">$cep = $_REQUEST["cep"];</span><br/>
							<span class="identado">$cidade = $_REQUEST["cidade"];</span><br/>
							<span class="identado">$uf = $_REQUEST["uf"];</span><br/>
							<span class="identado">$pais = $_REQUEST["pais"];</span><br/></i>
							<span class="identado">$profissao = $_REQUEST["profissao"];</span><br/>
						<b><br/>
							<span class="identado">$novoAluno = [</span><br/>
								<span class="identado2">"nome" => $nome,</span><br/>
								<span class="identado2">"sobrenome" => $sobrenome,</span><br/>
								<span class="identado2">"email" => $email,</span><br/>
								<span class="identado2">"senha" => $senha,</span><br/>
								<span class="identado2">"telefone" => $telefone,</span><br/>
								<span class="identado2">"celular" => $celular,</span><br/>
								<span class="identado2">"tipo" => $tipo,</span><br/>
								<span class="identado2">"logradouro" => $logradouro,</span><br/>
								<span class="identado2">"numero" => $numero,</span><br/>
								<span class="identado2">"complemento" => $complemento,</span><br/>
								<span class="identado2">"bairro" => $bairro,</span><br/>
								<span class="identado2">"cep" => $cep,</span><br/>
								<span class="identado2">"cidade" => $cidade,</span><br/>
								<span class="identado2">"uf" => $uf,</span><br/>
								<span class="identado2">"pais" => $pais,</span><br/>
								<span class="identado2">"profissao" = $profissao</span><br/>
							<span class="identado">];</span><br/>
						</b>
					<i>}</i>
				</code>
				<p><b>Atenção!</b> Repare que <span class="variavel">novoAluno</span> é um <b>array associativo</b> (ou seja, cada registro dentro dele possui chave e valor). Esses são conectados através dessa 'flechinha', que chamamos de <b>double arrow</b>. E, assim como em qualquer <b>array</b>, os elementos estão contidos entre colchetes e são separados por vírgulas, com exceção do <u>último elemento, que não é seguido por uma vírgula</u>.</p>
				<p>Caso não tenha ficado claro, basicamente o que fizemos aqui foi:</p>
				<ol>
					<li>Verificar se estamos recebendo informações do formulário</li>
					<li>Se estivermos, capturar os dados do formuário e atrelar cada um deles a uma variável</li>
					<li>Criar um <b>array associativo</b> onde nomeamos cada chave e definimos o valor referente à chave com a variável vinda do <b>form</b>. Sacou?</li>
				</ol>
				<pre>
					<?php var_dump($novoAluno); ?>
				</pre>
				<p>Se você ainda não preencheu o formulário, receberá um erro (dizendo que a variável é indefinida - <span class="php">undefined</span>) e <span class="php">NULL</span> como retorno. Ao preenchê-lo, verá os valores dentro do <b>array</b> (estamos usando o <span class="php">var_dump()</span> novamente para mostrar esses dados).</p>
				<p>Estamos quase lá!</p>
				<h3>Passando nosso <b>array</b> <span class="variavel">$novoAluno</span> para a função <span class="funcao">cadastrarAluno()</span></h3>
				<p>Criaremos uma variável <span class="variavel">$alunoRegistrado</span> e chamar a função <span class="funcao">cadastrarAluno()</span> para inserir o registro (na sequência desse mesmo código em que estamos trabalhando).</p>
				<p>Em breve construiremos essa função. Estamos chamando essa função dentro de uma variável para podermos validar a inserção do registro e tratarmos possíveis erros.</p>
				<code>
					<i>if ($_REQUEST) {<br/>
							<span class="identado">$nome = $_REQUEST["nome"];</span><br/>
							<span class="identado">$sobrenome = $_REQUEST["sobrenome"];</span><br/>
							<span class="identado">$email = $_REQUEST["email"];</span><br/>
							<span class="identado">$senha = $_REQUEST["senha"];</span><br/>
							<span class="identado">$telefone = $_REQUEST["telefone"];</span><br/>
							<span class="identado">$celular = $_REQUEST["celular"];</span><br/>
							<span class="identado">$tipo = $_REQUEST["tipo"];</span><br/>
							<span class="identado">$logradouro = $_REQUEST["logradouro"];</span><br/>
							<span class="identado">$numero = $_REQUEST["numero"];</span><br/>
							<span class="identado">$complemento = $_REQUEST["complemento"];</span><br/>
							<span class="identado">$bairro = $_REQUEST["bairro"];</span><br/>
							<span class="identado">$cep = $_REQUEST["cep"];</span><br/>
							<span class="identado">$cidade = $_REQUEST["cidade"];</span><br/>
							<span class="identado">$uf = $_REQUEST["uf"];</span><br/>
							<span class="identado">$pais = $_REQUEST["pais"];</span><br/><br/>
							<span class="identado">$profissao = $_REQUEST["profissao"];</span><br/><br/>
							<span class="identado">$novoAluno = [</span><br/>
								<span class="identado2">"nome" => $nome,</span><br/>
								<span class="identado2">"sobrenome" => $sobrenome,</span><br/>
								<span class="identado2">"email" => $email,</span><br/>
								<span class="identado2">"senha" => $senha,</span><br/>
								<span class="identado2">"telefone" => $telefone,</span><br/>
								<span class="identado2">"celular" => $celular,</span><br/>
								<span class="identado2">"tipo" => $tipo,</span><br/>
								<span class="identado2">"logradouro" => $logradouro,</span><br/>
								<span class="identado2">"numero" => $numero,</span><br/>
								<span class="identado2">"complemento" => $complemento,</span><br/>
								<span class="identado2">"bairro" => $bairro,</span><br/>
								<span class="identado2">"cep" => $cep,</span><br/>
								<span class="identado2">"cidade" => $cidade,</span><br/>
								<span class="identado2">"uf" => $uf,</span><br/>
								<span class="identado2">"pais" => $pais</span><br/>
								<span class="identado2">"profissao" => $profissao</span><br/>
							<span class="identado">];</span><br/><br/></i>
						<b>
							<span class="identado">$alunoRegistrado = cadastrarAluno($novoAluno);</span><br/>
						</b>
					<i>}</i>
				</code>
				<p>É claro que, por enquanto, nada vai acontecer. Precisamos criar nossa função.</p>
				<h3>Enfim, o C do CRUD!</h3>
				<p>Vamos criar nosso novo registro dentro do arquivo <span class="arquivo">.json</span> através da função <span class="funcao">cadastrarAluno()</span>. Então vamos voltar lá para o arquivo <span class="arquivo">functions.php</span> e criar essa nossa função.</p>
				<p class="dica"><span class="htmlEntities">&#10026;</span> Lembre-se de 'chamar' o arquivo <span class="arquivo">functions.php</span> para o seu arquivo <span class="arquivo">index.php</span> (fazemos isso com a função <span class="php">require_once("functions.php");</span>.</p>
				<p>Já estamos no <span class="arquivo">functions.php</span>? Então mãos à obra!</p>
				<p>Nosso arquivo <span class="arquivo">functions.php</span> estava assim:</p>
				<code>
					<i>$meuArquivoJson = 'alunos.json';<br/>
					$meuJson = file_get_contents($meuArquivoJson);<br/>
					$meuJsonArray = json_decode($meuJson, true);<br/>
					$meuJsonObjeto = json_decode($meuJson);<br/></i>
				</code>
				<p>E agora vamos para a etapa final do registro dos dados enviados por formulário! Vamos criar a função <span class="funcao">cadastrarAluno()</span>. Faremos o seguinte:</p>
				<ol>
					<li>Declaramos a função e definimos que receberá a variável <span class="variavel">$novoAluno</span> como parâmetro,</li>
					<li>Então capturamos os valores das variáveis <span class="variavel">$meuArquivoJson</span> e <span class="variavel">$meuJsonArray</span> através da <b>keyword</b> <span class="php">global</span>,</li>
					<li>Em seguida, chamamos a função <span class="php">array_push()</span> definindo como parâmetro 1 o <b>array</b> onde os dados devem ser inclusos (no caso, <span class="variavel">$meuJsonArray["alunos"]</span>) e o parâmetro 2 como <span class="variavel">$novoAluno</span> (o registro que recebemos via formuário),</li>
					<li>Formatamos nosso <b>array</b> como <b>Json</b> novamente com o <span class="funcao">json_encode($meuJsonArray)</span>,</li>
					<li>E por fim, salvamos o novo conteúdo usando <span class="funcao">file_put_contents()</span>, declarando que o arquivo onde o conteúdo será inserido é o <span class="variavel">$meuArquivoJson</span> e que o conteúdo é o <span class="variavel">$jsonAlunos</span>.</li>
				</ol>
				<p>Nosso arquivo <span class="arquivo">functions.php</span> ficou assim:</p>
				<code>
					<i>
						// Introdução - Capturando o Json<br/>
						$meuArquivoJson = 'alunos.json';<br/>
						$meuJson = file_get_contents($meuArquivoJson);<br/>
						$meuJsonArray = json_decode($meuJson, true);<br/>
						$meuJsonObjeto = json_decode($meuJson);<br/>

						// Criando o registro no json<br/>
						function cadastrarAluno($novoAluno){<br/>
							<span class="identado">global $meuArquivoJson;</span><br/>
							<span class="identado">global $meuJsonArray;</span><br/>
							<span class="identado">array_push($meuJsonArray["alunos"], $novoAluno);</span><br/>
							<span class="identado">$jsonAlunos = json_encode($meuJsonArray);</span><br/>
							<span class="identado">$alunoRegistrado = file_put_contents($meuArquivoJson, $jsonAlunos);</span><br/>
						}
					</i>
				</code>
				<p><b>Voilá!</b> Acabamos de incluir nosso novo aluno no arquivo <b>Json</b>! Vamos ver como está nosso <b>Json</b> agora?</p>
				<pre>
					<?php var_dump($meuJsonArray); ?>
				</pre>
				<p>E aí, encontrou seu cadastro? Ele está por último (afinal, o <span class="php">array_push()</span> insere dados no final de nosso <b>array</b>. Bom, já conseguimos criar nossos registros e inseri-los em um arquivo <b>Json</b>! Ainda precisamos <b>ler</b>, <b>atualizar</b> e <b>apagar</b> os registros. Vamos em frente?</p>
				<nav>
					<a class="anterior" href="index.php" title="Leve-me de volta para a Introdução" rel="previous"><span class="htmlEntities">&#8678;</span> Voltar</a>
					<a class="proximo" href="read-json.php" title="Quero aprender a exibir conteúdo do meu Json" rel="next">Avançar <span class="htmlEntities">&#8680;</span></a>
				</nav>
			</article>
		</section>
	</main>
	<aside></aside>
<?php require_once "inc/footer.php" ?>