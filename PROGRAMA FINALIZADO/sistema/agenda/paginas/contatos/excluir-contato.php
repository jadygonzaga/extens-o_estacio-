<header>
    <h3>Excluir contato</h3>
</header>

<?php
    $idContato = mysqli_real_escape_string($conexao,$_GET["idContato"]);
    $sql = "DELETE FROM tbcontatos WHERE idcontato = '{$idContato}'";

    mysqli_query($conexao,$sql) or die("Erro ao excluir o regostro. " . mysqli_error($conexao));

    echo "Registro excluido com sucesso";
?>