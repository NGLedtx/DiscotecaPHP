<?php
    if(isset($_POST) && $_POST['nome'] != null && $_POST['id'] != null) {

        $db = new mysqli("localhost", "root", "", "discoteca");

        $artista = $db->query("SELECT nome FROM artista WHERE id = {$_POST['id']}");

        if($artista->num_rows == 0) {
            header("location:index.php?erro=true");
            die;
        }

        $db->query("UPDATE artista SET nome = '{$_POST['nome']}' WHERE id = {$_POST['id']}");

        header("location:index.php?id={$_POST['id']}");
    } else {
        header("location:index.php?erro=true");
    }
?>