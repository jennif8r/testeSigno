<?php
include 'alteracaoCadastro.php';
include 'head.php';
include 'menu.php'; 
include 'validacao.php';
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <title>Editar-Cadastro</title>
</head>

<body>
    <!--  Formulario -->
    <form class="row g-3 needs-validation was-validated" action="" method="post" id="formulario"
        enctype="multipart/form-data" novalidate>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="container">
            <div class="form-rectangle">
                <h4 class="text-center">EDITAR DADOS PARA ENTREGA</h4>
                <br>
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="nome">Nome completo</label>
                            <input type="text" class="form-control" id="nome" name="nome"
                                value="<?php echo isset($row['nome']) ? $row['nome'] : ''; ?>" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cep">Cep</label>
                            <input type="text" class="form-control" id="cep" name="cep"
                                value="<?php echo isset($row['cep']) ? $row['cep'] : ''; ?>" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="uf">Estado</label>
                            <input type="text" class="form-control" id="uf" name="uf"
                                value="<?php echo isset($row['uf']) ? $row['uf'] : ''; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control" id="cidade" name="cidade"
                                value="<?php echo isset($row['cidade']) ? $row['cidade'] : ''; ?>" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="bairro">Bairro</label>
                            <input type="text" class="form-control" id="bairro" name="bairro"
                                value="<?php echo isset($row['bairro']) ? $row['bairro'] : ''; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="endereco">Rua/Avenida</label>
                            <input type="text" class="form-control" id="endereco" name="endereco"
                                value="<?php echo isset($row['endereco']) ? $row['endereco'] : ''; ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="emailAddress" class="form-control" id="email" name="email"
                                    value="<?php echo isset($row['email']) ? $row['email'] : ''; ?>" required>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="telefone">Telefone</label>
                                <input type="phone" class="form-control" id="telefone" name="telefone"
                                    value="<?php echo isset($row['telefone']) ? $row['telefone'] : ''; ?>" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-rectangle">
                    <h4 class="text-center">EDITAR DADOS PARA PRODUÇÃO</h4>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h6><label for="tipo_revistinha">Tipo de Revistinha</label></h6>

                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="tipo_revistinha"
                                        id="inlineRadio1" value="Convite"
                                        <?php echo (isset($row['tipo_revistinha']) && $row['tipo_revistinha'] == 'Convite') ? 'checked' : ''; ?>required>
                                    <label class="form-check-label" for="convite">Convite</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="tipo_revistinha"
                                        id="inlineRadio2" value="Lembrança"
                                        <?php echo (isset($row['tipo_revistinha']) && $row['tipo_revistinha'] == 'Lembrança') ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="lembranca">Lembrança</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="tipo_revistinha"
                                        id="inlineRadio3" value="Convite-Lembrança"
                                        <?php echo (isset($row['tipo_revistinha']) && $row['tipo_revistinha'] == 'Convite-Lembrança') ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="convite-lembranca">Convite-Lembrança</label>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <h6><label for="quantidade">Quantidade</label></h6>
                                <input type="number" class="form-control" id="quantidade" name="quantidade"
                                    value="<?php echo isset($row['quantidade']) ? $row['quantidade'] : ''; ?>" required>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="mb-3">
                        <h6><label for="exampleFormControlTextarea1" class="form-label">Atrações do
                                evento</label>
                        </h6>
                        <textarea class="form-control" id="atracao_evento" rows="3"
                            name="atracao_evento"><?php echo isset($row['atracao_evento']) ? $row['atracao_evento'] : ''; ?></textarea>
                    </div>


                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"
                            name="aceito_sugestoes"
                            <?php echo (isset($row['aceito_sugestoes']) && $row['aceito_sugestoes'] == 'Sim') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="flexSwitchCheckDefault">Aceito sugestões de texto
                            para
                            a capa</label>
                    </div>

                    <br>
                    <div style="text-align: center;">
                        <h6><label for="formFile" class="form-label">IMAGEM</label></h6>
                        <img src="<?php echo $url_imagem; ?>" alt="Imagem"
                            style="border: 2px solid #000; display: inline-block;" width="300" height="300">
                    </div> <br>
                    <div class="mb-3">
                        <input type="file" class="form-control" id="formFile" name="imagem" multiple>

                    </div>

                    <br>

                    <input type="submit" value="Editar" name="btSalva"
                        class="btn btn-primary d-grid gap-2 col-6 mx-auto"><br>
                    <input value="Cancelar" class="btn btn-danger d-grid gap-2 col-6 mx-auto"
                        onclick="window.location.href='lista.php'"><br>
                </div>
            </div>
    </form>
    <?php
    include 'rodape.php';
    ?>
</body>

</html>