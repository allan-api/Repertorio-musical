<?php require_once 'global.php' ?>
<?php
    try {
        $lista = Musica::listar();

        
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
?>
<?php require_once 'cabecalho.php' ?>

<!-- <?php // foreach():?> -->

    <div class="row">
        <div class="col-md-12">
            <h2>Músicas Workship</h2>
        </div>
    </div>



    <div class="row">
        <div class="col-md-12">
            <?php if (count($lista) > 0): ?>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Autor</th>
                        <th>Tom</th>
                        <th>Capotraste</th>
                        <th>Inicio</th>
                        <th class="acao">Editar</th>
                        <th class="acao">Excluir</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lista as $linha): ?>
                        <tr>
                            <td><?php echo $linha['nome'] ?></td>
                            <td><?php echo $linha['autor'] ?></td>
                            <td><?php echo $linha['tom'] ?></td>
                            <td><?php echo $linha['capotraste'] ?></td>
                            <td><?php echo $linha['inicio'] ?></td>
                            <td><a href="./musicas-editar.php?id=<?php echo $linha['id'] ?>" class="btn btn-info">Editar</a></td>
                            <td><a href="./musicas-excluir-post.php?id=<?php echo $linha['id'] ?>" class="btn btn-danger">Excluir</a></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                
                
        <?php else: ?>
            <p>Nenhuma música cadastrada</p>
        <?php endif ?>
        </div>
    </div>
<!-- <?php //endforeach?> -->
<?php require_once 'rodape.php' ?>