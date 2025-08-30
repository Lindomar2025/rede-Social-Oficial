<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Configuração do banco
$host     = "localhost"; 
$usuario  = "u271443794_LindomarBispo";   
$senha    = "565656Lindomar@";     
$banco    = "u271443794_NewNex1974"; 

$conn = new mysqli($host, $usuario, $senha, $banco);
$conn->set_charset("utf8mb4");

// Receber dados do formulário
$nome     = $_POST['nome'] ?? '';
$email    = $_POST['email'] ?? '';
$senhaSegura = password_hash($_POST['senha'] ?? '', PASSWORD_DEFAULT);
$cep      = $_POST['cep'] ?? '';
$endereco = $_POST['endereco'] ?? '';
$numero   = $_POST['numero'] ?? '';
$bairro   = $_POST['bairro'] ?? '';
$cidade   = $_POST['cidade'] ?? '';
$estado   = $_POST['estado'] ?? '';

// Inserir no banco
try {
    $sql = "INSERT INTO usuarios (nome, email, senha, cep, endereco, numero, bairro, cidade, estado, criado_em) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", $nome, $email, $senhaSegura, $cep, $endereco, $numero, $bairro, $cidade, $estado);
    $stmt->execute();

    // Se deu certo, mostra mensagem e redireciona
    echo "<!DOCTYPE html>
    <html lang='pt-BR'>
    <head>
      <meta charset='UTF-8'>
      <meta http-equiv='refresh' content='3;url=index.html'>
      <title>Cadastro Concluído</title>
      <style>
        body { font-family: Arial, sans-serif; text-align:center; background:#f5f5f5; padding:50px; }
        .msg { background:white; display:inline-block; padding:20px 30px; border-radius:10px; box-shadow:0 2px 8px rgba(0,0,0,0.2); }
        .sucesso { color:green; font-weight:bold; }
      </style>
    </head>
    <body>
      <div class='msg'>
        <h2 class='sucesso'>✅ Cadastro concluído com sucesso!</h2>
        <p>Você será redirecionado para a página inicial em 3 segundos...</p>
        <a href='index.html'>Clique aqui se não for redirecionado</a>
      </div>
    </body>
    </html>";

} catch (mysqli_sql_exception $e) {
    // Caso o erro seja e-mail duplicado
    if ($conn->errno === 1062) {
        echo "<!DOCTYPE html>
        <html lang='pt-BR'>
        <head>
          <meta charset='UTF-8'>
          <title>Erro no Cadastro</title>
          <style>
            body { font-family: Arial, sans-serif; text-align:center; background:#f5f5f5; padding:50px; }
            .msg { background:white; display:inline-block; padding:20px 30px; border-radius:10px; box-shadow:0 2px 8px rgba(0,0,0,0.2); }
            .erro { color:red; font-weight:bold; }
          </style>
        </head>
        <body>
          <div class='msg'>
            <h2 class='erro'>❌ Este e-mail já está cadastrado!</h2>
            <p>Por favor, use outro e-mail.</p>
            <a href='cadastro.html'>Voltar ao cadastro</a>
          </div>
        </body>
        </html>";
    } else {
        // Outros erros genéricos
        echo "Erro ao salvar: " . $e->getMessage();
    }
}

$conn->close();
?>
