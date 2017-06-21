<?php
	if(isset($_POST['mensagem'])){
		include_once "../defines.php";
		require_once('../classes/BD.class.php');
		BD::conn();

		$mensagem = utf8_decode( strip_tags(trim(filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING))) );
		$de = (int)$_POST['de'];
		$para = (int)$_POST['para'];
		//se variavel for diferente ou igual a vazio faz o envio da mensagem para com bd com os conteudos armazenados em cada varivel
		if($mensagem != ''){
			$insert = BD::conn()->prepare("INSERT INTO `mensagens` (id_de, id_para, mensagem, time, lido) VALUES (?,?,?,?,?)");
			$arrayInsert = array($de, $para, $mensagem, time(), 0);
			if($insert->execute($arrayInsert)){
				echo 'ok';
			}else{
				echo 'no';
			}
		}
	}
?>