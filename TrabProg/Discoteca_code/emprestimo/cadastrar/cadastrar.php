<?php 
    if(isset($_POST) && $_POST['nome'] != null && $_POST['email'] != null &&
        $_POST['dataEmprestimo'] != null && $_POST['idDisco'] != null) {

        $db = new mysqli("localhost", "root", "", "discoteca");

        if($_POST['dataEmprestimo'] > date('Y-m-d')) {
            header("location:index.php?erro=true");
            die;
        }

        $db->query("INSERT INTO emprestimo(nome, email, dataEmprestimo, idDisco) VALUES
                    ('{$_POST['nome']}', '{$_POST['email']}',
                    '{$_POST['dataEmprestimo']}', {$_POST['idDisco']})");

        header("location:index.php");
    } else {
        header("location:index.php?erro=true");
    }
?>