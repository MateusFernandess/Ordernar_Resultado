<?php
//Conex�o com Banco de dados
require 'config.php';

//Pegando a sele��o da pessoa
if(isset($_GET['ordem']) && !empty($_GET['ordem'])) {

    $ordem = addslashes($_GET['ordem']);
    $sql = "SELECT * FROM userordenar ORDER BY ".$ordem;

} else {
    $ordem = '';
    $sql = "SELECT * FROM userordenar";
}

?>

<!-- Fomul�rio para ordenar a posi��o-->
<h1>Ordenar Por:</h1>

<form method="GET">
    <!-- Comando onchange responsavel por atualizar a pagina 
    apos selecionar o campo desejado -->
    <select name="ordem" onchange="this.form.submit()">
        <option ></option>
        <option value="nome" <?php echo ($ordem=="nome")?'selected="selected"':'' ?>>Nome</option>
        <option value="idade" <?php echo ($ordem=="idade")?'selected="selected"':'' ?>>Idade</option>
    </select>
</form>

<h1>Tabela de Usu�rios</h1>
<!-- Tabela  -->
<table border="1" width="400">
    <tr>
        <th>Nome</th>
        <th>Idade</th>
    </tr>
    <?php

    //Solicitando todos os usu�rios
    $sql = $pdo->query($sql);

    if($sql->rowCount() > 0) {

        foreach($sql->fetchAll() as $usuarios):
            ?>
            <!-- Realizando tabela com os dados do banco-->
            <tr>
                <td><?php echo $usuarios['nome'];?></td>
                <td><?php echo $usuarios['idade'];?></td>
            </tr>

            <?php
        endforeach;

    }
    ?>
</table>
