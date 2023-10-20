    <?php
    include 'head.php';
    include 'menu.php';
    include 'validacao.php';

    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Cadastro-De-Formulario</title>
    </head>

    <body>
        <?php
    include 'notificacao.php';
    ?>
        <!--  Formulario -->
        <form action="envio.php" method="POST" enctype="multipart/form-data" id="formulario"
            class="row g-3 needs-validation was-validated" novalidate>
            <div class="container">
                <div class="form-rectangle">
                    <h4 class="text-center">DADOS PARA ENTREGA</h4>
                    <br>
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="nome" class="form-label">Nome completo</label>
                                <input type="text" class="form-control" id="nome" name="nome" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="cep">Cep</label>
                                <input type="text" class="form-control" id="cep" name="cep" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="uf">Estado</label>
                                <input type="text" class="form-control" id="uf" name="uf" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cidade">Cidade</label>
                                <input type="text" class="form-control" id="cidade" name="cidade" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="bairro">Bairro</label>
                                <input type="text" class="form-control" id="bairro" name="bairro" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="endereco">Rua/Avenida</label>
                                <input type="text" class="form-control" id="endereco" name="endereco" required>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="nome">Email</label>
                                <input type="mail" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="nome">Telefone</label>
                                <input type="phone" class="form-control" id="telefone" name="telefone" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-rectangle">
                    <h4 class="text-center">DADOS PARA PRODUÇÃO</h4>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h6><label for="tipo_revistinha">Tipo de Revistinha</label></h6>

                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="tipo_revistinha"
                                        id="inlineRadio1" value="Convite" required>
                                    <label class="form-check-label" for="convite">Convite</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="tipo_revistinha"
                                        id="inlineRadio2" value="Lembrança" required>
                                    <label class="form-check-label" for="lembranca">Lembrança</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="tipo_revistinha"
                                        id="inlineRadio3" value="Convite-Lembrança" required>
                                    <label class="form-check-label" for="convite-lembranca">Convite-Lembrança</label>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <h6><label for="quantidade">Quantidade</label></h6>
                                <input type="number" class="form-control" id="quantidade" name="quantidade" required>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="mb-3">
                        <h6><label for="exampleFormControlTextarea1" class="form-label">Atrações do evento</label></h6>
                        <textarea class="form-control" name="atracao_evento" id="exampleFormControlTextarea1"
                            rows="3"></textarea>
                    </div>

                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"
                            name="aceito_sugestoes">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Aceito sugestões de texto para a
                            capa</label>
                    </div>
                    <br>
                    <div class="mb-3">
                        <h6><label for="formFile" class="form-label">Imagem</label></h6>
                        <input type="file" class="form-control" id="formFile" name="imagem" multiple>
                    </div>
                    <br>
                    <input type="hidden" name="acao" value="enviar_formulario">
                    <input type="hidden" name="data_envio" value="<?php echo date('Y-m-d H:i:s'); ?>">
                    <input type="submit" class="btn btn-primary d-grid gap-2 col-6 mx-auto" name="enviar"
                        value="Enviar">
                </div>
            </div>
        </form>

        <?php
    include 'rodape.php';
    ?>
    </body>

    </html>