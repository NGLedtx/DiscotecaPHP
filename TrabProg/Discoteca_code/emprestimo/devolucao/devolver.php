<?php 
    if(isset($_POST) && $_POST['id'] != null && $_POST['dataDevolucao'] != null) {
        $db = new mysqli("localhost", "root", "", "discoteca");

        $emprestimo = $db->query("SELECT dataEmprestimo FROM emprestimo
                                    WHERE idDisco = {$_POST['id']}")->fetch_array();

        if($emprestimo['dataEmprestimo'] > $_POST['dataDevolucao']) {
            header("location:index.php?erro=true");
            die;
        }

        $db->query("DELETE FROM emprestimo WHERE idDisco = {$_POST['id']}");
        header("location:index.php");
    } else {
        header("location:index.php?erro=true");
    }
?>