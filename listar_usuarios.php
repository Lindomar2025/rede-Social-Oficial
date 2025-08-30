<?php
// Dados recebidos do formulário
$nome     = $_POST['nome'];
$email    = $_POST['email'];
$senha    = $_POST['senha'];
$cep      = $_POST['cep'];
$endereco = $_POST['endereco'];
$numero   = $_POST['numero'];
$bairro   = $_POST['bairro'];
$cidade   = $_POST['cidade'];
$estado   = $_POST['estado'];
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Confirmar Cadastro</title></head>
<body>
  <h2>Confirme seus dados</h2>
  <p><b>Nome:</b> <?= $nome ?></p>
  <p><b>Email:</b> <?= $email ?></p>
  <p><b>CEP:</b> <?= $cep ?></p>
  <p><b>Endereço:</b> <?= $endereco ?>, <?= $numero ?></p>
  <p><b>Bairro:</b> <?= $bairro ?></p>
  <p><b>Cidade:</b> <?= $cidade ?> - <?= $estado ?></p>

  <!-- Botão Confirmar (vai salvar no banco) -->
  <form method="post" action="salvar_cadastro.php">
    <input type="hidden" name="nome" value="<?= $nome ?>">
    <input type="hidden" name="email" value="<?= $email ?>">
    <input type="hidden" name="senha" value="<?= $senha ?>">
    <input type="hidden" name="cep" value="<?= $cep ?>">
    <input type="hidden" name="endereco" value="<?= $endereco ?>">
    <input type="hidden" name="numero" value="<?= $numero ?>">
    <input type="hidden" name="bairro" value="<?= $bairro ?>">
    <input type="hidden" name="cidade" value="<?= $cidade ?>">
    <input type="hidden" name="estado" value="<?= $estado ?>">
    <button type="submit">✅ Confirmar</button>
  </form>

  <!-- Botão Corrigir (volta pro formulário) -->
  <form method="get" action="cadastro.html">
    <button type="submit">❌ Corrigir</button>
  </form>
</body>
</html>
