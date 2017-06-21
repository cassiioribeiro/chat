<?php
if(isset($_POST['ler'])){
	include_once "../defines.php";
	require_once('../classes/BD.class.php');
	BD::conn();

	$online = (int)$_POST['online'];
	$user = (int)$_POST['user'];
	//att na coluna lido de 0 para 1 com isso a msg nao e carregada ao logar no chat
	$upd = BD::conn()->prepare("UPDATE `mensagens` SET `lido` = 1 WHERE `id_de` = ? AND `id_para` = ?");
	if($upd->execute(array($user, $online))){
		echo 'ok';
	}
}
?>