<?php
    $idContato = $_GET['idContato'];

    $sql = "SELECT * FROM tbContatos WHERE idContato = {$idContato}";
    $rs = mysqli_query($conexao,$sql) or die("Erro ao recuperar os dados do registro" . mysqli_error($conexao)) ;
    $dados = mysqli_fetch_assoc($rs);
?>

<header>
    <h3>Editar contato</h3>
</header>

<div class="row">
    <div class="container-fluid">
        <form action="index.php?menuop=atualizar-contato" method="post">
            <div class="mb-3 col-3" >
                <label  class="form-label" for="idContato">id</label>
                <input class="form-control"  type="text" id="idContato" name="idContato" value="<?=$dados['idContato']?>" readonly>
            </div>
            <div class="mb-3">
                <label  class="form-label" for="nomeContato">Nome</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                    <input class="form-control"  type="text" id="nomeContato" name="nomeContato" value="<?=$dados['nomeContato']?>">
                </div>
            </div>
            <div class="mb-3">
                <label  class="form-label" for="emailContato">E-mail</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-mailbox2"></i></span>
                    <input class="form-control"  type="email" id="emailContato" name="emailContato" value="<?=$dados['emailContato']?>">
                </div>
            </div>
            <div class="mb-3">
                <label  class="form-label" for="telefoneContato">Telefone</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                    <input class="form-control"  type="text" id="telefoneContato" name="telefoneContato" value="<?=$dados['telefoneContato']?>">
                </div>    
            </div>
            <div class="mb-3">
                <label  class="form-label" for="enderecoContato">Endereço</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-mailbox2"></i></span>
                    <input class="form-control"  type="text" id="enderecoContato" name="enderecoContato" value="<?=$dados['enderecoContato']?>">
                </div>
            </div>  
            <div class="row">
                <div class="mb-3 col-3">
                    <label class="form-label" for="sexoContato">Sexo</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-gender-ambiguous"></i>
                        </span>
                    
                        
                        <select class="form-select" name="sexoContato" id="sexoContato">
                            <option <?php echo ($dados['sexoContato']=='')?'selected':'' ?> value="">Selecione o Genero do contato</option>
                            <option <?php echo($dados['sexoContato']=='M')?'selected':'' ?> value="M">Masculino</option>
                            <option <?php echo($dados['sexoContato']=='F')?'selected':'' ?>  value="F">Feminino</option>
                            <option <?php echo($dados['sexoContato']=='O')?'selected':'' ?>  value="O">Outros</option>
                        </select>
                    </div>
                </div>          
                <div class="mb-3 col-3">
                    <label  class="form-label" for="dataNascContato">Data de Nascimento</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                        <input class="form-control"  type="date" id="dataNascContato" name="dataNascContato" value="<?=$dados['dataNascContato']?>">
                    </div>    
                </div>
            </div>    
            <div class="mb-3">
                <input class="btn btn-success" type="submit" value="Atualizar" name="btnAtualizar">
            </div>                      
        </form>
    </div>

    <!-- <div class="col-6">

        <?php 
            // if($nomeFoto = $dados["nomeFotoContato"]=="" || !file_exists('./paginas/contatos/fotos-contatos/'.$dados["nomeFotoContato"])){
            //     $nomeFoto = "SemFoto.jpg";
            // }else{
            //     $nomeFoto = $dados["nomeFotoContato"];
            // }
        ?>

        <div class="div mb-3">
            <img id="foto-contato" class="img-fluid img-thumbnail" width="500" src="./paginas/contatos/fotos-contatos/<?=$nomeFoto?>" alt="Foto do contato">
        </div>
        
        <div class="mb-3">
            <button class="btn btn-info" id="btn-editar-foto">
                <i class="bi bi-camera-fill"></i> Editar foto
            </button>
        </div>

        <div id="editar-foto">
            <form id="form-upload-foto" class="mb-3" action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="idContato" value="<?=$idContato?>">
                <label class="form-label" for="arquivo">Selecione um arquivo de imagem da foto</label>

                <div class="input-group">
                    <input class="form-control" type="file" name="arquivo" id="arquivo">
                    <input id="btn-enviar-foto" class="btn btn-secondary" type="submit" value="Enviar">
                </div>
            </form>

            <div id="mensagem" class="mb3 alert alert-success">
                mensagem aqui
            </div>

            <div id="proloader" class="progress" 
                role="progressbar" 
                aria-label="Danger example" 
                aria-valuenow="0" 
                aria-valuemin="0" 
                aria-valuemax="100">
                    <div id="barra" class="progress-bar bg-danger" style="width: 0%"></div>
            </div>
        </div>     -->





    </div>
</div>

