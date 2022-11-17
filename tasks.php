<?php

session_start();

if (isset($_POST['tasks_name'] ) ) {
    if ( $_POST['tasks_name'] != "") {

        $data = [
            'tasks_name' =>  $_POST['tasks_name'],
            'tasks_description' =>  $_POST['tasks_description'],
            'tasks_date' =>  $_POST['tasks_date']
        ];
        array_push($_SESSION['tasks'], $data);
        unset($_POST['tasks_name']);
        unset($_POST['tasks_description']);
        unset($_POST['tasks_date']);

       header('Location:index.php');
       
    }
    else {
        $_SESSION['message'] = "O campo nome da tarefa não pode ser vazia";
        header('Location:index.php');
    }   
}

if ( isset($_GET['key']) ){
    array_splice( $_SESSION['tasks'], $_GET['key'], 1);
    unset($_GET['key']);
    header('Location:index.php');
}

echo "comando entro no tasks php"

?>