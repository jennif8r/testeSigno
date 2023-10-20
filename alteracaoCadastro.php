<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

$id = isset($_GET['id']) ? $_GET['id'] : '';

if ($id) {
    $sql = "SELECT id,nome, endereco, bairro, cep, cidade, uf, email, telefone, tipo_revistinha, quantidade, atracao_evento, aceito_sugestoes, imagem, data_envio FROM formulario WHERE id = $id";
    $result = $conn->query($sql);

    if (!$result) {
        die("Erro na consulta: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $url_imagem = "uploads/" . $row['imagem'];
    } else {
        die("Registro não encontrado.");
    }
}

if (isset($_POST['btSalva'])) {
    $nome = $_POST["nome"];
    $endereco = $_POST["endereco"];
    $bairro = $_POST["bairro"];
    $cep = $_POST["cep"];
    $cidade = $_POST["cidade"];
    $uf = $_POST["uf"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];

    $tipo_revistinha = $_POST["tipo_revistinha"];
    $quantidade = $_POST["quantidade"];
    $atracao_evento = isset($_POST["atracao_evento"]) ? $_POST["atracao_evento"] : "";
    $aceito_sugestoes = isset($_POST["aceito_sugestoes"]) ? "Sim" : "Não";

    
    $imagem = $row['imagem'];

    if (isset($_FILES["imagem"]["name"])) {
       
        $nova_imagem = $_FILES["imagem"]["name"];
        $imagem_temporaria = $_FILES["imagem"]["tmp_name"];

        $diretorio_destino = "uploads/";
        $caminho_imagem = $diretorio_destino . $nova_imagem;
        
        if (move_uploaded_file($imagem_temporaria, $caminho_imagem)) {
            
            $imagem = $nova_imagem;
        } else {
            echo "Erro ao fazer upload da nova imagem.";
        }
    }

    $data_envio = date("Y-m-d H:i:s");

    $sql = "UPDATE formulario SET nome = '$nome', cep = '$cep', uf = '$uf', cidade = '$cidade', bairro = '$bairro', endereco = '$endereco', email = '$email', telefone = '$telefone', tipo_revistinha = '$tipo_revistinha', quantidade = '$quantidade', atracao_evento = '$atracao_evento', aceito_sugestoes = '$aceito_sugestoes', imagem = '$imagem', data_envio = '$data_envio' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        mysqli_close($conn); 
        $mensagem = urlencode('Alteração efetuada com sucesso!');
        $redirectUrl = "lista.php?mensagem=$mensagem";
        header("Location: $redirectUrl"); 
        exit;
    } else {
        echo "Erro ao atualizar o registro: " . $conn->error;
    }

    
}

?>