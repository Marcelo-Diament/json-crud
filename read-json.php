<?php require_once "inc/head.php" ?>
<?php require_once "inc/header.php" ?>
	<main>
		<img id="jason" src="assets/img/jason1.jpg" title="Vamos por partes..." alt="Jason do South Park" width="256px" height="256px">
		<h1>JSON + CRUD</h1>
		<section id="readJson">
			<h2>Read</h2>
			<article>
				<p>Se você chegou até aqui é porque já aprendeu como criar um registro e salvá-lo dentro de um arquivo <b>Json</b>, certo?</p><p>Caso ainda não tenha aprendido, acesse <a href="create-json.php" title="Como criar e salvar um registro num arquivo json?" rel="previous">essa página</a>. Ou, se quiser começar pelo início, acesse <a href="index.php" title="CRUD JSON PHP" rel="previous">a página inicial</a>.</p>
				<h3>O que temos até o momento?</h3>
				<p>Podemos dizer que boa parte já foi feito na parte de inserir um registro - afinal, para criar o registro precisamos capturar os dados, transformá-los em <b>array</b> para daí inserirmos o novo registro com <span class="funcao">array_push()</span>,lembra-se? O que faremos agora é basicamente:</p>
				<ul>
					<li>Capturar os registros do nosso <b>Json</b></li>
					<li>Transformá-los em um <b>array</b></li>
					<li>Aplicarmos um <b>loop</b> para exibir cada registro usando suas <b>keys</b> (chaves) e <b>values</b> (valores)</li>
				</ul>
				<p>Como estamos concentrando nossas <b>funções</b> no arquivo <span class="arquivo">functions.php</span>, não precisaremos redeclará-las, apenas acessá-las. Até agora nosso arquivo estava assim:</p>
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
				<h3>Criando uma função para listar os alunos</h3>
				<p>Agora vamos incluir a função para ler os registros e exibí-los no nosso <span class="html">HTML</span>. Isso se dará através da <b>função</b> <span class="funcao">listarAlunos()</span> que vamos criar. Ela deverá receber o <b>parâmetro</b> <span class="variavel">$meuJsonArray</span>.</p>
				<p>Observação: como nossa <b>função</b> recebe o <span class="variavel">$meuJsonArray</span> como <b>parâmetro</b>, não precisaremos declará-la como <span class="php">global</span>. Então bora construir nossa função!</p>
				<code><b>
					// Listando os registros de json<br/>
					function listarAlunos($meuJsonArray){<br/>
						<span class="identado">echo "&lt;h3&gt;Lista de Alunos Cadastrados&lt;/h3&gt;&lt;ul&gt;";</span><br/>
						<span class="identado">foreach($meuJsonArray["alunos"] as $registroDoAluno){</span><br/>
							<span class="identado2">echo "&lt;li&gt;".$registroDoAluno["nome"]."&lt;/li&gt;";</span><br/>
						<span class="identado">}</span><br/>
						<span class="identado">echo "&lt;/ul&gt;";</span><br/>
					}</b>
				</code>
				<p>Bom, o que estamos declarando na nossa função?</p>
				<ul>
					<li>Declaramos a função e o parâmetro que ela recebe. <small>O parâmetro, no caso, é o nosso arquivo <b>Json</b> transformado em <b>array</b></small></li>
					<li>Damos um <span class="php">echo</span> com o título da lista e a abertura da tag <span class="html">ul</span>. <small>Assim já carregamos parte do <span class="html">HTML</span> na própria função (mas poderíamos não fazê-lo)</small></li>
					<li>Então aplicamos um loop <span class="php">foreach</span>, capturando o array de alunos e separando por cada aluno. <small>Repare que no nosso <b>loop</b>, chamamos <span class="variavel">$meuJsonArray["alunos"]</span>. Sabe por que? Por que poderíamos ter outros <b>arrays/objetos</b> em nosso <b>Json</b>, como os registros dos cursos, por exemplo.</small></li>
					<li>Para cada registro, estamos 'printando' o nome do aluno entre a tag <span class="html">&lt;li&gt;</span>. <small>Ou seja, cada nome de aluno é um item da lista</small></li>
					<li>Por fim, fechamos nossa <span class="html">&lt;ul&gt;</span>. <small><i>O quê!? Tive de preencher aquele form todo pra só mostrar o nome?</i> Calma jovem... vamos chegar lá! Mas antes, vamos ver como está ficando nossa lista!</small></li>
				</ul>
				<p class="alerta"><span class="htmlEntities">&oplus;</span><b>Desafio</b>: que tal tentar inserir mais um array, como 'cursos', no <b>Json</b> para treinar o aprendizado?</p>
				<pre>
					<?php listarAlunosTemp($meuJsonArray); ?>
				</pre>
				<p class="dica"><span class="htmlEntities">&#10026;</span> Aplicamos o <span class="html">HTML</span> na <b>função</b> para fins didáticos, mas há outras maneiras de aplicar o <span class="php">PHP</span> no <span class="html">HTML</span>, de forma a ter maior liberdade na aplicação do layout.</p>
				<h3>Vamos exibir os detalhes de cada aluno!</h3>
				<p>Agora que nos certificamos que nossa <b>função</b> está funcionando corretamente, vamos entrar nos detalhes. E pra pôr em prática nossos conhecimentos em <b><abbr title="JavaScript (&ne; JAVA)">JS</abbr></b>, deixaremos esses detalhes ocultos para mostrá-los ao clicarmos no nome do aluno. =)</p>
				<p>Vamos retomar nossa função <span class="funcao">listarAlunos()</span> e incrementá-la!</p>
				<code><b>
					// Listando os registros de json<br/>
					function listarAlunos($meuJsonArray){<br/>
						<span class="identado">echo "&lt;h3&gt;Lista de Alunos Cadastrados&lt;/h3&gt;&lt;ul&gt;";</span><br/>
						<span class="identado">foreach($meuJsonArray["alunos"] as $registroDoAluno){</span><br/>
							<span class="identado2">echo "&lt;li&gt;".$registroDoAluno["nome"];</span><br/>
							<span class="identado2">echo "&lt;ul style='display:none' class='detalhesAlunos'&gt;";</span><br/>
							<span class="identado2">foreach ($registroDoAluno as $key => $value) {</span><br/>
								<span class="identado3">echo $key.": ".$value."&lt;br/&gt;";</span><br/>
							<span class="identado2">}</span><br/>
							<span class="identado2">echo "&lt;/ul&gt;";</span><br/>
							<span class="identado2">echo "&lt;button class="btnInfo"&gt;Info&lt;/button&gt;&lt;/li&gt;";</span><br/>
						<span class="identado">}</span><br/>
						<span class="identado">echo "&lt;/ul&gt;";</span><br/>
					}</b>
				</code>
				<p>Agora nossa lista tem uma segunda lista aninhada para cada item. Ou seja, para cada nome de aluno listado, temos uma lista aninhada com todas as informações do aluno.</p>
				<p>Repare que antes de fecharmos a <span class="html">&lt;/li&gt;</span>, incluímos um botão com o texto 'Info'. E na lista aninhada, um estilo inline declarando <span class="html">display:none</span> na lista de detahes.</p>
				<p>A ideia é que os detalhes sejam exibidos somente mediante um clique no botão. Faremos isso via <b>JavaScript</b>.</p>
				<p>Observação: aplicamos algum estilo na nossa lista, mas sinta-se livre para aplicar o seu. Não estamos usando Bootstrap, mas sinta-se à vontade para usar! Ou mesmo listar em tabela ao invés de lista... como achar mais conveninente! : )</p>
				<h3>Aplicando um script JS para exibir os detalhes</h3>
				<p>Apesar de não ser o foco da lição, vou compartilhar com vocês o script para exibirmos os detalhes de cada alunos (de forma resumida).</p>
				<p>Primeiro você precisa criar um arquivo chamado <span class="arquivo">script.js</span> e salvá-lo na pasta <span class="arquivo">assets/js/</span>. Ou, se preferir, pode salvar diretamente no <span class="html">footer</span>.</p>
				<p class="dica"><span class="htmlEntities">&#10026;</span> Normalmente salvamos os scripts à parte, mas como o script é muito conciso, é recomendável <abbr title="Minificação é o processo de 'limpar' o código e deixá-lo legível somente para máquinas, ou seja, tirar espaços, comentários e tudo o que for desnecessário, visando uma melhor performance.">minificá-lo</abbr> e deixá-lo no próprio <span class="html">footer</span>, a fim de evitarmos uma nova requisição.</p>
				<p><b>Caso salve seu script como um arquivo externo, lembre-se de linkar o script ao documento.</b></p>
				<p>Precisamos selecionar nossos botões e dizer que, ao receberem um clique, exibirão a lista aninhada (alterando o display de none para block). Uma vez abertos, nosso botão tem o texto alterado para 'Fechar' e o novo clique oculta novamente a lista aninhada. Confira o código a seguir:</p>
				<code>
					botaoInfo = document.querySelectorAll('.btnInfo')<br/>
					for(i = 0; i < botaoInfo.length; i++){<br/>
						<span class="identado">botaoInfo[i].addEventListener('click', function(){</span><br/>
							<span class="identado2">listaAninhada = this.parentElement.firstElementChild</span><br/>
							<span class="identado2">if(listaAninhada.style.display == 'none') {</span><br/>
								<span class="identado3">this.textContent = 'Fechar'</span><br/>
								<span class="identado3">listaAninhada.style.display = 'block'</span><br/>
							<span class="identado2">} else {</span><br/>
								<span class="identado3">this.textContent = 'Info'</span><br/>
								<span class="identado3">listaAninhada.style.display = 'none'</span><br/>
							<span class="identado2">}</span><br/>
						<span class="identado">})</span><br/>
					}
				</code>
				<p>E aí, vamos ver como ficou nossa lista?</p>
				<hr>
					<?php listarAlunos($meuJsonArray); ?>
				<hr>
				<p>Beleza, funcionou! É claro que poderíamos caprichar mais nesse layout, mas como foi dito, o intuito aqui é aprendermos o <b>CRUD</b> com <b>Json</b>. Mas e se quisermos exibir a informação de um único aluno?</p>
				<h3>Capturando os dados de um único registro</h3>
				<p>O processo é bem semelhante, por isso não entraremos nos mesmos detalhes, apenas nas partes que diferem. Vamos lá!</p>
				<p>Primeiro construiremos um formulário onde o usuário inserirá o nome que busca. Claro que poderíamos fazer de outras formas, como listando os usuários cadastrados num <span class="html">&lt;select&gt;</span>, mas faremos da forma mais simples para mantermos o foco na lição.</p>
				<p>Um ponto importante é que estamos chamando nosso input de <b>'nomeBuscado'</b> - é através dele que validaremos se houve ou não a busca. Essa validação (dentro do nosso arquivo <span class="html">HTML</span>) funcionará da seguinte maneira:</p>
				<code>
					&lt;?php<br/>
					<span class="identado">if($_REQUEST && $_REQUEST["nomeBuscado"] != null){</span><br/>
						<span class="identado2">listarAluno($meuJsonArray, $_REQUEST["nomeBuscado"]);</span><br/>
					<span class="identado">}</span>
				</code>
				<p>Simplesmente verificamos se estamos recebendo a busca e então executamos a <b>função</b> passando os respectivos <b>parâmetros</b>.</p>
				<p>Agora vamos para nosso arquivo <span class="arquivo">functions.php</span> construir nossa função <span class="php">listarAluno()</span>.</p>
				<code>
					function listarAluno($meuJasonArray, $nomeBuscado){
						<span class="identado">global $meuJsonArray;</span><br/>
						<span class="identado">$encontrou = false;</span><br/>
						<span class="identado">foreach ($meuJsonArray["alunos"] as $registroDoAluno) {</span><br/>
							<span class="identado2">if($registroDoAluno["nome"] == $nomeBuscado){</span><br/>
								<span class="identado3">$encontrou = true;</span><br/>
								<span class="identado3">echo "&lt;h3&gt;Dados do aluno ".$nomeBuscado."&lt;/h3&gt;&lt;ul&gt;";</span><br/>
								<span class="identado3">foreach ($registroDoAluno as $key => $value) {</span><br/>
									<span class="identado4">if($key != "senha"){</span><br/>
										<span class="identado5">echo "&lt;li&gt;".$key.": ".$value."&lt;/li&gt;";</span><br/>
									<span class="identado4">}</span><br/>
								<span class="identado3">}</span><br/>
								<span class="identado3">echo "&lt;/ul&gt;";</span><br/>
							<span class="identado2">}</span><br/>
						<span class="identado">}</span><br/>
						<span class="identado">if($encontrou == false):</span><br/>
							<span class="identado2">echo "&lt;p&gt;Ops... Não há alunos com o nome &lt;b&gt;".$nomeBuscado."&lt;/b&gt;...&lt;/p&gt;";</span><br/>
						<span class="identado">endif;</span><br/>
						<span class="identado">$nomeBuscado = "";</span><br/>
					}
				</code>
				<p>Agora vamos entender o que foi feito, linha por linha:</p>
				<ul>
					<li>Primeiro declaramos nossa <b>função</b> e seus <b>parâmetros</b></li>
					<li>Então usamos a keyword <b>global</b> para acessarmos a variável <span class="variavel">$meuJsonArray</span></li>
					<li>Declaramos uma <b>variável</b> chamada <span class="variavel">$encontrou</span> e definimos como <span class="php">false</span>. <small>Usaremos essa <b>variável</b> para sabermos se houve resultado ou não.</small></li>
					<li>Percorremos nosso <b>array</b> com um <span class="php">foreach</span> em busca do 'match' entre o nome de cada aluno e o nome buscado pelo formulário</li>
					<li>Caso haja esse 'match'...
						<ul>
							<li>Alteramos o valor de <span class="variavel">$encontrou</span> para <span class="php">true</span></li>
							<li>Então exibimos o título dos resultados numa tag <span class="html">&lt;h3&gt;</span> e já abrimos a tag <span class="html">&lt;ul&gt;</span></li>
							<li>Agora que temos um resultado, vamos listar todas suas propriedades com um novo <b>loop</b> <span class="php">foreach</span></li>
							<li>Dessa vez, ocultaremos o campo senha usando um <span class="funcao">if()</span> considerando que a <span class="variavel">$key</span> é diferente de 'senha'. <small>Lembre-se que estamos lidando com um <b>array associativo</b>, por isso, para cada propriedade, temos o par <span class="variavel">$key</span> e <span class="variavel">value</span></small></li>
							<li>FInalmente, exibimos o par de valores <span class="variavel">$key</span> e <span class="variavel">value</span> dentro de um item de lista</li>
							<li>E, saindo do nosso <span class="php">foreach</span> fechamos a lista com <span class="html">&lt;/ul&gt;</span></li>
							<li>E também fechamos nosso outro loop <span class="php">foreach</span></li>
						</ul>
					</li>
					<li>Já se não houver resultados...
						<small>Nesse caso nem entramos no primeiro <b>loop</b>. Usamos um <span class="funcao">if()</span> para verificarmos o valor de <span class="variavel">$encontrou</span> para verificar se não houve retorno</small>
						<ul>
							<li>Exibimos um parágrafo dizendo que não encontramos o <span class="variavel">$nomeBuscado</span></li>
						</ul>
					</li>
				</ul>
				<p>Com isso concluímos nossa busca pelo nome do usuário! Claro que poderíamos refinar nossa busca e permitir que o usuário busque por outras propriedades, como Cidade, ID ou qualquer outra chave. E aí, vamos testar nossa busca?</p>
				<form id="formBuscarAluno" action="" method="post" enctype="multipart/form-date">
					<label for="inputNomeBuscado">Insira o nome do aluno que está buscando</label>
					<input type="text" name="nomeBuscado" id="inputNomeBuscado">
					<input type="submit" name="buscarAluno" class="enviar" value="Buscar">
				</form>
				<pre id="resultadoBuscarAluno">
					<?php if($_REQUEST && $_REQUEST["nomeBuscado"] != null){
							listarAluno($meuJsonArray, $_REQUEST["nomeBuscado"]); ?>
							<script async defer>window.scrollTo(0,document.body.scrollHeight)</script>
						<?php } ?>
				</pre>
				<p>Tudo funcionando corretamente! Uhu! Estamos prontos para a próxima lição - atualizar um registro pré existente em nosso <b>Json</b>! Partiu?</p>
				<nav>
					<a class="anterior" href="create-json.php" title="Quero aprender a inserir conteúdo no meu Json" rel="previous"><span class="htmlEntities">&#8678;</span> Voltar</a>
					<a class="proximo" href="update-json.php" title="Vamos atualizar um de nossos registros?" rel="next">Avançar <span class="htmlEntities">&#8680;</span></a>
				</nav>
			</article>
		</section>
	</main>
	<aside></aside>
<?php require_once "inc/footer.php" ?>