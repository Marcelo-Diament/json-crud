<?php require_once "inc/head.php" ?>
<?php require_once "inc/header.php" ?>
	<main>
		<img id="jason" src="assets/img/jason1.jpg" title="Vamos por partes..." alt="Jason do South Park" width="256px" height="256px">
		<h1>JSON + CRUD</h1>
		<section id="intro">
			<h2>Introdução</h2>
			<article>
				<p>Este documento trata sobre o <abbr title="Create, Read, Update e Delete">CRUD</abbr> do <abbr title="JavaScript Object Notation">Json</abbr>, ou seja, aprenderemos a <b>Criar</b> (<u>C</u>reate), <b>Ler</b> (<u>R</u>ead), <b>Atualizar</b> (<u>U</u>pdate) e <b>Apagar</b> (<u>D</u>elete) os dados contidos num arquivo do tipo <b>Json</b>.</p>
				<p>Para fins didáticos, já temos um arquivo <b>Json</b> preparado para essa aula (com algum conteúdo já inserido). O nome do arquivo é <span class="arquivo">alunos.json</span>.</p>
				<p>O primeiro passo é criarmos um arquivo chamado <span class="arquivo">functions.php</span> e salvá-lo em uma pasta de nome <span class="arquivo">utils</span>. Dessa forma manteremos nosso código limpo e organizado.</p>
				<p>Agora vamos atrelar o arquivo <span class="arquivo">alunos.json</span> a uma variável. Chamaremos a variável de <span class="variavel">meuArquivoJson</span>, ok? Então vamos lá!</p>
				<code>
					<b>$meuArquivoJson = 'alunos.json';</b>
				</code>
				<p>Agora vamos descobrir o que é que há dentro do nosso arquivo <b>Json</b>. Para isso utilizaremos o famoso... <span class="php">var_dump()</span>.</p>
				<code>
					<b>$meuArquivoJson = 'alunos.json';
					<br/>
					var_dump($meuArquivoJson);</b>
				</code>
				<p>O resultado será o seguinte:</p>
				<pre>
					<?php var_dump($meuArquivoJson); ?>
				</pre>
				<p>Mas... por que não apareceu nenhum dado?</p>
				<p>Não se preocupe... rs... nós precisamos utilizar a função <span class="php">file_get_contents()</span> para capturarmos o conteúdo do arquivo.</p>
				<code>
					<i>$meuArquivoJson = 'alunos.json';
					<br/>
					//var_dump($meuArquivoJson);</i>
					<br/>
					<b>$meuJson = file_get_contents($meuArquivoJson);
					<br/>
					var_dump($meuJson);</b>
				</code>
				<p>Vamos tentar de novo!</p>
				<pre>
					<?php var_dump($meuJson); ?>
				</pre>
				<p>E aí, lembra algo? Sim... se parece muito como um array! Na verdade, temos arrays e objetos dentro do <b>Json</b>. E tem mais! Conseguimos manipulá-lo de forma a obtermos um objeto ou um <b>array</b> como retorno. Para isso usaremos a função <span class="php">json_decode()</span>. Essa função deve receber 2 parâmetros: o primeiro é o conteúdo do nosso <b>array</b> (por isso atrelamos ele à variável <span class="variavel">$meuJson</span>. Já o segundo é <b>booleano</b>, ou seja, espera receber <span class="php">true</span> ou <span class="php">false</span>. Por padrão ele considera como <span class="php">false</span> (então não precisamos declará-lo, só o declaramos quando queremos que seja <span class="php">true</span>.</p>
				<p>E o que define esse segundo parâmetro? Ele define se os dados do nosso <b>Json</b> serão recebidos como objeto (<span class="php">false</span>) ou como <b>array</b> (<span class="php">true</span>). Vamos ver isso na prática:</p>
				<code>
					<i>$meuArquivoJson = 'alunos.json';
					<br/>
					//var_dump($meuArquivoJson);
					<br/>
					$meuJson = file_get_contents($meuArquivoJson);
					<br/>
					//var_dump($meuJson);</i>
					<br/>
					<b>$meuJsonArray = json_decode($meuJson, true);
					<br/>
					var_dump($meuJsonArray);</b>
				</code>
				<p>O que será que recebemos como retorno?</p>
				<p class="dica"><span class="htmlEntities">&#10026;</span> Mas antes... uma dica: insira seu <span class="php">var_dump()</span> dentro de uma tag <span class="html">&lt;pre&gt;</span>, para ficar formatado de maneira legível, caso contrário vai ficar um pouco difícil de lê-lo.</p>
				<pre>
					<?php var_dump($meuJsonArray); ?>
				</pre>
				<p>Percebeu que no <span class="php">var_dump($meuJson)</span> recebemos uma <b>string</b> e no <span class="php">var_dump($meuJsonArray)</span> recebemos um <b>array</b>? Agora podemos manipular esses dados usando um <b>loop</b> (como, por exemplo, um <span class="php">for</span> ou um <span class="php">foreach</span>). Nessa lição manipularemos os dados apenas como <b>array</b>, mas à título de curiosidade, veja como ficaria se o segundo parâmetro fosse <span class="php">false</span>:</p>
				<code>
					<i>$meuArquivoJson = 'alunos.json';
					<br/>
					$meuJson = file_get_contents($meuArquivoJson);
					<br/>
					//var_dump($meuJson);
					<br/>
					$meuJsonArray = json_decode($meuJson, true);
					<br/>
					//var_dump($meuJsonArray);</i>
					<br/>
					<b>$meuJsonObjeto = json_decode($meuJson);
					<br/>
					var_dump($meuJsonObjeto);</b>
				</code>
				<pre>
					<?php var_dump($meuJsonObjeto); ?>
				</pre>
				<p>Ao invés de recebermos uma <b>string</b> ou um <b>array</b>, recebemos um <b>objeto</b>. Bacana né? Agora já sabemos como:</p>
				<ul>
					<li>Atrelar o <b>Json</b> a uma variável</li>
					<li>Capturar o conteúdo do Json</li>
					<li>Transformá-lo num <b>array</b> (e num objeto)</li>
				</ul>
				<p>Sem mais delongas, vamos ao que interessa, vamos para o <b>CRUD</b>!</p>
				<nav>
					<a class="proximo" href="create-json.php" title="Quero aprender a inserir conteúdo no meu Json" rel="next">Avançar <span class="htmlEntities">&#8680;</span></a>
				</nav>
			</article>
		</section>
	</main>
	<aside></aside>
<?php require_once "inc/footer.php" ?>