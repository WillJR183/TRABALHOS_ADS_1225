<?php
	try {
		$pdo = new PDO("mysql:host=localhost;dbname=web2", "conta_teste", "conta123");
	} catch (PDOException $erro) {
		echo $erro->getMessage();
	}

	require_once '../modelo/Professor.php';
	$professor = new Professor();
	$professor->setNome($_POST['nome']);
	$professor->setIdade($_POST['idade']);
	$professor->setCpf($_POST['cpf']);
	$professor->setSexo($_POST['sexo']);
	$professor->setSiape($_POST['siape']);
	try {
		$sql = "INSERT INTO professor (nome, idade, cpf, sexo, siape) VALUES 
			('" . $professor->getNome() . "', '" . $professor->getIdade() . "', '" . $professor->getCpf() . "','" . $professor->getSexo() . "', '" . $professor->getSiape() . "')";

		$pdo->exec($sql);
		echo "<p>Inserido com sucesso!</p>";
	} catch(PDOException $e) {
		die("Não foi possível executar o script: $sql. " . $e->getMessage());
	}
	
	//var_dump($aluno);
	header('Location: ../visao/Index.php');
