<header>
    <h3><i class="bi bi-person-badge-fill"></i> Contatos</h3>
</header>

<div>
    <a class="btn btn-outline-secondary mb-2" href="index.php?menuop=cad-contato"><i class="bi bi-person-plus-fill"></i> Novo contato</a>
</div>

<div>
    <form action="index.php?menuop=contatos" method="post">
        <div class="input-group">
            <input class="form-control" type="text" name="txt_pesquisa">
            <button class="btn btn-outline-success btn-sm" type="submit"><i class="bi bi-search">Pesquisar</i></button>
        </div>
    </form>
</div>

<div class="tabela">

    <table class="table table-dark table-striped table-bordered table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-Mail</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Sexo</th>
                <th>Data de Nasc.</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <!-- INICIO DO PHP PARA RESULTADO DA TABELA -->
            <?php
                $quantidade = 10;

                $pagina = (isset($_GET['pagina']))?(int)$_GET['pagina']:1;

                $inicio = ($quantidade * $pagina) - $quantidade;

                $txt_pesquisa = (isset($_POST["txt_pesquisa"]))?$_POST["txt_pesquisa"]:"";

                $sql = "SELECT 
                idContato,
                upper(nomeContato) AS nomeContato,
                lower(emailContato) as emailContato,
                telefoneContato,
                upper(enderecoContato) as enderecoContato,
                CASE
                    WHEN sexoContato='F' THEN 'FEMININO'
                    WHEN sexoContato='M' THEN 'MASCULINO'
                ELSE
                    'NÃO ESPECIFICADO'
                END AS sexoContato,
                DATE_FORMAT(dataNascContato,'%d/%m/%Y') AS dataNascContato
                FROM tbcontatos 
                WHERE
                idContato='{$txt_pesquisa}' or
                nomeContato LIKE '%{$txt_pesquisa}%'
                ORDER BY nomeContato ASC
                LIMIT $inicio, $quantidade"
                ;

                $rs = mysqli_query($conexao,$sql) or die("Erro ao executar a consulta" . mysqli_error($conexao));
                while($dados = mysqli_fetch_assoc($rs)) {
            ?>
            <!-- FECHAMENTO DA CONSULTA PARA INICIO DOS DADOS ATRAVES DO HTML -->

            <!-- REGISTROS DA TABELA -->
                <tr>
                    <td><?=$dados['idContato']?></td>
                    <td class="text-nowrap"><?=$dados['nomeContato']?></td>
                    <td class="text-nowrap"><?=$dados['emailContato']?></td>
                    <td class="text-nowrap"><?=$dados['telefoneContato']?></td>
                    <td class="text-nowrap"><?=$dados['enderecoContato']?></td>
                    <td><?=$dados['sexoContato']?></td>
                    <td><?=$dados['dataNascContato']?></td>
                    <td class="text-center">
                        <a class="btn btn-outline-warning btn-sm" href="index.php?menuop=editar-contato&idContato=<?=$dados['idContato']?>"><i class="bi bi-pencil-square"></i></a>
                    </td>
                    <td class="text-center">
                        <a class="btn btn-outline-danger btn-sm " href="index.php?menuop=excluir-contato&idContato=<?=$dados['idContato']?>"><i class="bi bi-trash-fill"></i></a>
                    </td>
                </tr>
            <!-- FIM DO REGISTRO DA TABELA -->

            <!-- INICIO DO PHP PARA TAG DE FECHAMENTO DA CONSULTA -->
            <?php
                }
            ?>
            <!-- FIM DO FECHAMENTO DA CONSULTA -->
        
        </tbody>
    </table>

</div>

<ul class="pagination justify-content-center">


    <?php

        $sqlTotal = "SELECT idContato FROM tbcontatos";  
        $qrTotal = mysqli_query($conexao,$sqlTotal) or die (mysqli_error($conexao));
        $numTotal = mysqli_num_rows($qrTotal);
        $totalPagina = ceil($numTotal/$quantidade);

        echo"<li class='page-item'><span class='page-link'>Total de registros: " .$numTotal .  " </span></li>";

        echo '<li class="page-item"><a class="page-link" href="?menuop=contatos&pagina=1">Primeira pagina</a></li>';
        
        if($pagina>1){
    ?>
            <li class="page-item"><a class="page-link" href="?menuop=contatos&pagina=<?php echo $pagina-1?>"> <<< </a></li>
    <?php
        }

        for ($i=1;$i<=$totalPagina;$i++){ 
            
            if($i>=($pagina-5) && $i <= ($pagina+5)){
                if($i==$pagina){
                    echo "<li class='page-item active'><span class='page-link'>$i</span></li>";
                } else{
                    echo "<li class='page-item'><a class='page-link' href=\"?menuop=contatos&pagina=$i\">$i </a></li>" ;
                }
            }
        }

        if($pagina<($totalPagina-5)){
    ?>
            <li class="page-item"><a class="page-link" href="?menuop=contatos&pagina=<?php echo $pagina+1 ?>"> >>> </a></li>
    <?php
        }

        echo "<li class='page-item'><a class='page-link' href=\"?menuop=contatos&pagina=$totalPagina\">Ultima pagina</a></li>";
    ?>
</ul>    