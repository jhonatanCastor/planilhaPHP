<?php

session_start();

if ( !isset($_SESSION['tasks'])){
    $_SESSION['tasks'] = array();
}


if ( isset($_GET['clear']) ){
    unset($_SESSION['tasks']);
    unset($_GET['clear']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <title>Gerenciador de tarefas</title>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h1>Gerenciador de tarefas</h1>
        </div> 
        <div class='form'>
            <form action="tasks.php" method='post'>

                <input type="hidden" name="insert" value="insert">
                <label for="tasks_name">Tarefa:</label>
                <input type="text" name='tasks_name' placeholder='Nome da Tarefa'>

                <labe for="tasks_description">Descrição:</labe>
                <input type="text" name="tasks_description" placeholder="Descrição da Tarefa">
                
                <label for="tasks_date">Data</label>
                <input type="date" name="tasks_date">
                <button type='submit'>Cadastrar</button>

            </form>
            <?php
               if ( isset($_SESSION['message'] ) ) {
                   echo "<p style='color: #EF5350';>" . $_SESSION['message'] . "</p>";
               }
            ?>
        </div>
        <div class="separator"> 
        </div>
        <div class="list-tasks">
            <?php
               if(isset($_SESSION['tasks'])){
                 echo "<ul>";

                 foreach ($_SESSION['tasks'] as $key => $task) {
                    echo "<li>
                             <span>" . $task["tasks_name"] . "</span>
                             <button type='button' class='btn-clear' onclick='deletar$key()'>Remover</button>
                             <script>
                                  function deletar$key(){
                                 if ( confirm('Confirmar remoção?') ){
                                         window.location = 'http://localhost:3333/tasks.php?key=$key';
                                     }
                                     return false;
                                  }
                             </script>
                          </li>";
                 }
                    echo "</ul>";
               }
            ?>  
        </div>
        <div class="footer">
            <p>Desenvolvido por @jhonatanCastor</p>
        </div>
    </div>
</body>
</html>