<?php 
    if(isset($_GET) && !empty($_GET['id'])) {
        $db = new mysqli("localhost", "root", "", "discoteca");

        $erro = false;

        $emprestimo = $db->query("SELECT id FROM emprestimo WHERE idDisco = {$_GET['id']}");

        if($emprestimo->num_rows > 0) {
            $erro = true;
            header("location:../../index.php");
        }

        if(!$erro) {
            $imagem = $db->query("SELECT imagem FROM disco WHERE id = {$_GET['id']}")->fetch_array();
            unlink("../../uploads/{$imagem['imagem']}");

            $db->query("DELETE FROM disco WHERE id = {$_GET['id']}");
            header("location:../listar/");
        } else {
            header("location:erro.php");
        }
    } else {
        header("location:../../index.php");
    }
?>