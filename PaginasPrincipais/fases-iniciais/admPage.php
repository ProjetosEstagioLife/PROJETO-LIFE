<?php
    session_start();
    include_once('../../config/db.php');
    $userId = $_SESSION['user_id'];
    $BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . "/PROJETO-LIFE-1/";
?>

<DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Prêmios</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../../css/admStyle.css">
    </head>
    <body>
        <header>
            <div class="container">
                <div class="row align-items-center">
                
                    <div class="col text-end">
                        <!-- Botão de deslogar -->
                        <?php if ($userId): ?>
                            <a href="<?= $BASE_URL ?>forms/logout.php" class="btn btn-custom mt-4">Deslogar</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </header>
        <main class="d-flex justify-content-center align-items-center">
            <section class="container-fluid d-flex flex-column justify-content-center align-items-center" id="prizeTableContainer">
                <table>
                    <thead>
                        <tr>
                            <th>Premio</th>
                            <th>Quantidade</th>
                            <th>Ganhadores</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 

                            $stmt = $conn->prepare('SELECT * FROM premio');
                            $stmt->execute();
                            $premios = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            
                            foreach ($premios as $premio) {
                                        
                                $stmt = $conn->prepare('SELECT * FROM usuario WHERE idPremio = :id ORDER BY nome');
                                $stmt->execute([':id' => $premio['id']]);
                                $usuarioPremio = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                echo '
                                    <tr>
                                        <td><a data-bs-toggle="modal" data-bs-target="#modalFormsPremio">'.$premio['nome'].'</a></td>
                                        <td>'.$premio['quantidade'].'</td><td>';
                                if ($usuarioPremio) {
                                    $nomeEchoed = false;
                                    foreach ($usuarioPremio as $usuarioPremio) {
                                        if ($usuarioPremio['nome'] != "") {
                                            echo $usuarioPremio['nome'] . '<br>';
                                            $nomeEchoed = true;
                                        } 
                                    }
                                    if (!$nomeEchoed) {
                                        echo 'Nenhum jogador ganhou este prêmio.';
                                    }
                                } else {
                                    echo 'Nenhum jogador ganhou este prêmio.';
                                }
                               

                                echo '</td></tr>';
                            }
                        ?>
                    </tbody>
                </table>
                <div id="controlsContainer" class="w-50 gap-4 d-flex justify-content-center">
                    <button type="button" class="btn-custom addPremioBtn controlBtn mt-4" data-bs-toggle="modal" data-bs-target="#modalAddPremio">Adicionar Prêmio</button>
                    <button type="button" class="btn-custom addPremioBtn controlBtn mt-4" data-bs-toggle="modal" data-bs-target="#modalAlterPremio">Alterar Prêmio</button>
                    <button type="button" class="btn-custom addPremioBtn controlBtn mt-4" data-bs-toggle="modal" data-bs-target="#modalDeletarPremio">Deletar Prêmio</button>
                </div>
            </section>
        </main>


                    <!-- ---- Modais ---- -->


        <div class="modal fade" id="modalAddPremio" aria-labelledby="modalAddPremioLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1>Adicionar Prêmio</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?php echo $BASE_URL; ?>forms/processaAdm.php" method="POST" onsubmit="return confirm('Tem certeza que deseja adicionar o prêmio?');">
                        <div class="modal-body d-flex flex-column align-items-center">
                            <input type="hidden" name="opt" value="1">
                            <div id="nomeInputContainer" class="m-3 w-75 d-flex justify-content-between">
                                <label for="nome">Prêmio:</label>
                                <input type="text" id="criaNome" name="nome">
                            </div>
                            <div id="quantidadeInputContainer" class="m-3 w-75 d-flex justify-content-between">
                                <label for="quantidade">Quantidade:</label>
                                <input type="number" id="criaQuantidade" name="quantidade" value="1">
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-end">
                            <button type="submit" class="btn-custom addPremioBtn controlBtn">Registrar</button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>



        <div class="modal fade" id="modalAlterPremio" aria-labelledby="modalAlterPremioLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1>Alterar Prêmio</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?php echo $BASE_URL; ?>forms/processaAdm.php" method="POST" onsubmit="return confirm('Tem certeza que deseja alterar o prêmio?');">
                        <div class="modal-body">
                            <input type="hidden" name="opt" value="2">
                            <div class="d-flex flex-column justify-content-center">
                                <select id="premioSelect" class="form-select" name="premioSelected">
                                    <option value="999">Selecione um valor</option>
                                    <?php
                                        foreach ($premios as $premio) {
                                            
                                            echo '
                                                <option value="' . $premio['id'] . '">' . $premio['nome'] . '</option>
                                            ';
                                        }
                                    ?>
                                </select>
                                <div id="hiddenForm" class="hidden flex-column align-items-center mt-4">
                                    <div id="nomeInputContainer" class="m-3 w-75 d-flex justify-content-between">
                                        <label for="nome">Prêmio:</label>
                                        <input type="text" id="nome" name="nome" placeholder="Novo nome">
                                    </div>
                                    <div id="quantidadeInputContainer" class="m-3 w-75 d-flex justify-content-between">
                                        <label for="quantidade">Quantidade:</label>
                                        <input type="number" id="quantidade" name="quantidade" value="1">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer hidden" id="alterPremioFooter">
                            <button type="submit" class="btn-custom addPremioBtn controlBtn">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        

        <div class="modal fade" id="modalDeletarPremio" aria-labelledby="modalAlterPremioLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1>Deletar Prêmio</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?php echo $BASE_URL; ?>forms/processaAdm.php" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar o prêmio?');">
                        <div class="modal-body">
                            <input type="hidden" name="opt" value="3">
                            <div class="d-flex flex-column justify-content-center">
                                <select class="form-select" name="premioSelected">
                                    <?php
                                        foreach ($premios as $premio) {
                                            echo '
                                                <option value="' . $premio['id'] . '">' . $premio['nome'] . '</option>
                                            ';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn-custom addPremioBtn controlBtn">Deletar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script>
            
            class Premio {
                constructor (id, nome, qtd) {
                    this.id = id;
                    this.nome = nome;
                    this.qtd = qtd;
                }
            }

            let listaPremio = [];
            let premio;
            premio = new Premio(0, "", "");
            <?php
                foreach($premios as $premio) {
                    echo '
                        premio = new Premio('.$premio['id'].', "'.$premio['nome'].'", '.$premio['quantidade'].');
                        listaPremio.push(premio);
                    ';
                }
            ?>

            function showForm() {
                let premioSelect = document.querySelector('#premioSelect');
                let campoNome = document.querySelector('#nome');
                let campoQtd = document.querySelector('#quantidade');

                console.log("Selecionou");
                campoNome.value = listaPremio[premioSelect.value - 1].nome;
                campoQtd.value = listaPremio[premioSelect.value - 1].qtd;

                document.querySelector('#hiddenForm').classList.remove('hidden');
                document.querySelector('#alterPremioFooter').classList.remove('hidden');
                document.querySelector('#hiddenForm').classList.add('d-flex');
            }

            document.getElementById('premioSelect').addEventListener('change', showForm);
            showForm();
        </script>
    </body>
</html>