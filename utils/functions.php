<?php
	// Introdução - capturando o Json
	$meuArquivoJson = 'alunos.json';
	$meuJson = file_get_contents($meuArquivoJson);
	$meuJsonArray = json_decode($meuJson, true);
	$meuJsonObjeto = json_decode($meuJson);

	// Create - criando o registro no json
	function cadastrarAluno($novoAluno){
		global $meuArquivoJson;
		global $meuJsonArray;
		array_push($meuJsonArray["alunos"], $novoAluno);
		$jsonAlunos = json_encode($meuJsonArray);
		$alunoRegistrado = file_put_contents($meuArquivoJson, $jsonAlunos);
	}

	// Read (temp) - exibindo registros do json (da chave alunos)
	function listarAlunosTemp($meuJsonArray){
		echo "<h3>Lista de alunos cadatrados</h3><ul>";
		foreach ($meuJsonArray["alunos"] as $registroDoAluno) {
			echo "<li>".$registroDoAluno["nome"];
		}
		echo "</ul>";
	}

	// Read - exibindo registros do json (da chave alunos)
	function listarAlunos($meuJsonArray){
		echo "<h3>Lista de alunos cadatrados</h3><ul>";
		foreach ($meuJsonArray["alunos"] as $registroDoAluno) {
			echo "<li>".$registroDoAluno["nome"];
			echo "<ul style='display:none' class='detalhesAlunos'>";
			foreach ($registroDoAluno as $key => $value) {
				echo $key.": ".$value."</br>";
			}
			echo "</ul>";
			echo "<button class='btnInfo'>Info</button></li>";
		}
		echo "</ul>";
	}

	// Read - Exibindo um registro único do json (da chave alunos)
	function listarAluno($meuJsonArray, $nomeBuscado){
		global $meuJsonArray;
		$encontrou = false;
		foreach ($meuJsonArray["alunos"] as $registroDoAluno) {
			if($registroDoAluno["nome"] == $nomeBuscado){
				$encontrou = true;
				echo "<h3>Dados do aluno ".$nomeBuscado."</h3><ul>";
				foreach ($registroDoAluno as $key => $value) {
					if($key != "senha"){
						echo "<li>".$key.": ".$value."</li>";
					}
				}
				echo "</ul>";
			}
		}
		if($encontrou == false):
			echo "<p>Ops... Não há alunos com o nome <b>".$nomeBuscado."</b>...</p>";
		endif;
		$nomeBuscado = "";
	}

	// Update - exibindo registros do json (da chave alunos)
	function listarAlunosTb($meuJsonArray){
		echo "<table id='tbAlunos'><thead><tr><th colspan='3'>Tabela de alunos cadatrados</th><tr><tr><th>Nome</th><th>Sobrenome</th><th>Editar</th></tr></thead><tbody>";
		foreach ($meuJsonArray["alunos"] as $registroDoAluno) {
			echo "<tr>";
			foreach ($registroDoAluno as $key => $value) {
				if($key == "nome" || $key == "sobrenome"){
					echo "<td>".$value."</td>";
				} elseif ($key == 'email'){
					echo "<td><form id='formUpdateAluno' action='' method='post'><input name='alunoUpdateEmail' type='hidden' value='".$value."'/><input class='btnInfo' type='submit' value='Editar' name='editarAluno'></form></td>";
				}
			}
			echo "<tr>";
		}
		echo "</tbody></table>";
	}

	// Update - carregando os dados originais do registro a ser editado
	function editarAluno($meuJsonArray, $alunoUpdateEmail){
		// global $meuJsonArray;
		foreach ($meuJsonArray["alunos"] as $registroDoAluno) {
			if($registroDoAluno["email"] == $alunoUpdateEmail){
				echo "<h3>Edição de registros do Aluno</h3><form action='' method='post'>";
				foreach ($registroDoAluno as $key => $value) {
					if($key != "senha" && $key != "avatar" && $key != "email"){
						echo "<label for='".$value."'>".$key."</label><input id='".$key."' name='".$key."' value='".$value."'/>";
					} elseif ($key == "email") {
						echo "<label for='".$value."'>".$key."</label><input readonly id='".$key."' name='".$key."' value='".$value."'/>";
					}
				}
				echo "<input class='enviar' type='submit' value='Atualizar' name='atualizarAluno'></form>";
			}
		}
	}

	function atualizarAluno($updatedAluno){
		global $meuArquivoJson;
		global $meuJsonArray;
		$alunosAtuais = [];
		$novoJsonArray = [];
		foreach ($meuJsonArray["alunos"] as $aluno) {
			if($aluno["email"] == $updatedAluno["email"]){
				$aluno["nome"] = $updatedAluno["nome"];
				$aluno["sobrenome"] = $updatedAluno["sobrenome"];
				$aluno["telefone"] = $updatedAluno["telefone"];
				$aluno["celular"] = $updatedAluno["celular"];
				$aluno["tipo"] = $updatedAluno["tipo"];
				$aluno["logradouro"] = $updatedAluno["logradouro"];
				$aluno["numero"] = $updatedAluno["numero"];
				$aluno["complemento"] = $updatedAluno["complemento"];
				$aluno["cidade"] = $updatedAluno["cidade"];
				$aluno["uf"] = $updatedAluno["uf"];
				$aluno["pais"] = $updatedAluno["pais"];
				$aluno["profissao"] = $updatedAluno["profissao"];
				array_push($alunosAtuais, $aluno);
			} else {
				array_push($alunosAtuais, $aluno);
			}
		}
		$meuJsonArray["alunos"] = $alunosAtuais;
		$jsonAlunos = json_encode($meuJsonArray);
		file_put_contents($meuArquivoJson, $jsonAlunos);
	}

?>