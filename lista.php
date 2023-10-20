<?php
include 'buscarSql.php';
include 'head.php';
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <title>Lista-de-Cadastro</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-blur">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="https://media.licdn.com/dms/image/C4D0BAQGSd0gMu_ljNw/company-logo_200_200/0/1610978473879?e=1704931200&v=beta&t=iMXN_VCX6JKbBmSe9lhjM6S_GHVPqXOuodgbEE4Ez3o"
                    alt="Logo" width="40" height="40">
            </a>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="lista.php">Cadastros</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <img src="img2.svg" width="330" height="70" alt="">
    <br>
    <?php
    include 'notificacao.php';
    ?>
    <br>
    <br>
    <div class="container mt-4">
        <h1 class="text-center">LISTA DE CADASTRO</h1><br>
        <div class="container">
            <form action="lista.php" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Pesquisar por nome ou telefone" name="pesquisa"
                        value="<?php echo $pesquisa; ?>">
                    <button class="btn btn-primary" type="submit">Buscar</button>
                </div>
            </form>
        </div>
        <div class="container">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Telefone</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["nome"]; ?></td>
                            <td><?php echo $row["telefone"]; ?></td>
                            <td>
                                <a class="navbar-brand" href="editarCadastro.php?id=<?php echo $row["id"]; ?>">
                                    <button class="btn btn-outline-primary" type="button">Editar</button>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php

    include 'rodape.php';
    
    ?>
</body>

</html>