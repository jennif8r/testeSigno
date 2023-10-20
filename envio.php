<?php
// ULTILIZANDO BIBLIOTECA PHPMAILER POR QUESTÃO DE AUTENTIFICAÇÃO DOS E-MAILS
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if(isset($_POST['enviar']))
{
$mail = new PHPMailer(true);

try {
    
    $mail->isSMTP();                                            
    $mail->Host = 'us2.smtp.mailhostbox.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'envioemailphp@jenniferlara.tech'; // Seu endereço de e-mail
    $mail->Password = 'FbJueGn7'; // Sua senha
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
    $mail->Port = 587;                                    

    
    $mail->setFrom('envioemailphp@jenniferlara.tech', 'jennifer');
    $mail->addAddress('contato@jenniferlara.tech', 'Contato');     
    $mail->addReplyTo('envioemailphp@jenniferlara.tech', 'Information'); 
    $mail->addCC('davi@signotech.com.br','Davi');
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $mail->addAddress($email, $nome);
    
    
    $mail->isHTML(true);                                  
    $mail->Subject = 'Cadastro do formulario';

    $body = "
<!DOCTYPE html>
<html>
<head>
    <style>
        /* Adicione estilos CSS conforme necessário */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
        }
        .header img {
            max-width: 100px;
            height: auto;
        }
        .message {
            margin-top: 20px;
            text-align: left;
        }
        .info {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h1>Confirmação de Cadastro</h1>
        </div>
        <div class='message'>
            <p>Olá " . $_POST['nome'] . ",</p>
            <p>Estamos felizes em confirmar que seu formulário foi cadastrado com sucesso. Abaixo estão os detalhes do seu cadastro:</p>
            <ul>
                <li><span class='info'>Nome:</span> " . $_POST['nome'] . "</li>
                <li><span class='info'>E-mail:</span> " . $_POST['email'] . "</li>
                <li><span class='info'>Tipo de revista:</span> " . $_POST['tipo_revistinha'] . "</li>
            </ul>
            <p> Se você tiver alguma dúvida ou precisar de assistência adicional, entre em contato conosco.</p>
        </div>
    </div>
</body>
</html>
";

    $mail->Body    = $body;

    $mail->send();
    echo '<meta http-equiv="refresh" content="10; URL=index.php"/>';
} catch (Exception $e) {
    echo "ERRO AO ENVIAR EMAIL: {$mail->ErrorInfo}";
}
}

//BANCO DE DADO MYSQL ULTILIZADO COM O XAMPP (LOCALHOST)

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['acao']) && $_POST['acao'] == 'enviar_formulario') {
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

    $imagem = $_FILES["imagem"]["name"];
    $imagem_temporaria = $_FILES["imagem"]["tmp_name"];

    $data_envio = date("Y-m-d H:i:s");

    $servername = "localhost"; //colocar seu servername
    $username = "root"; //colocar seu username
    $password = ""; //colocar sua senha
    
    $conn = new mysqli($servername, $username, $password);
    
    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }
    
    // Cria o banco de dados 'test' 
    $sql_create_db = "CREATE DATABASE IF NOT EXISTS test";
    if ($conn->query($sql_create_db) !== TRUE) {
        echo "Erro ao criar o banco de dados 'test': " . $conn->error;
        $conn->close();
        exit;
    }
    $dbname = "test";
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }
    $sql_check_table = "SHOW TABLES LIKE 'formulario'";
    $result = $conn->query($sql_check_table);
    // Criando a tabela formulario
    if ($result->num_rows == 0) {
        $sql_create_table = "CREATE TABLE formulario (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(255) NOT NULL,
            endereco VARCHAR(255) NOT NULL,
            bairro VARCHAR(255) NOT NULL,
            cep VARCHAR(10) NOT NULL,
            cidade VARCHAR(255) NOT NULL,
            uf VARCHAR(2) NOT NULL,
            email VARCHAR(255) NOT NULL,
            telefone VARCHAR(15) NOT NULL,
            tipo_revistinha VARCHAR(50) NOT NULL,
            quantidade INT NOT NULL,
            atracao_evento TEXT NOT NULL,
            aceito_sugestoes VARCHAR(3) NOT NULL,
            imagem VARCHAR(255) NOT NULL,
            data_envio DATETIME NOT NULL
        )";

        if ($conn->query($sql_create_table) !== TRUE) {
            echo "Erro ao criar a tabela 'formulario': " . $conn->error;
            $conn->close();
            exit;
        }
    }

        $diretorio_destino = "uploads/"; 
        $caminho_imagem = $diretorio_destino . $imagem;

        if (move_uploaded_file($imagem_temporaria, $caminho_imagem)) {
            
            $sql_insert_data = "INSERT INTO formulario (nome, endereco, bairro, cep, cidade, uf, email, telefone, tipo_revistinha, quantidade, atracao_evento, aceito_sugestoes, imagem, data_envio)
                VALUES ('$nome', '$endereco', '$bairro', '$cep', '$cidade', '$uf', '$email', '$telefone', '$tipo_revistinha', '$quantidade', '$atracao_evento', '$aceito_sugestoes', '$imagem', '$data_envio')";

            if ($conn->query($sql_insert_data) === TRUE) {
                echo '<meta http-equiv="refresh" content="10; URL=index.php"/>';
            } else {
                echo "<br>Erro ao inserir dados no banco de dados: " . $conn->error;
            }
        } else {
            echo "<br>Erro ao fazer upload da imagem.";
        }

    $conn->close();
    $mensagem = urlencode('Cadastro efetuado com sucesso!<br>Foi enviado para o seu e-mail uma cópia de confirmação.');
    $redirectUrl = "index.php?mensagem=$mensagem";
    header("Location: $redirectUrl");
exit;
}