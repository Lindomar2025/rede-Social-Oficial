<?php
// Recebe os dados do formulário (mas ainda NÃO salva no banco)
$nome     = $_POST['nome'] ?? '';
$email    = $_POST['email'] ?? '';
$senha    = $_POST['senha'] ?? '';
$cep      = $_POST['cep'] ?? '';
$endereco = $_POST['endereco'] ?? '';
$numero   = $_POST['numero'] ?? '';
$bairro   = $_POST['bairro'] ?? '';
$cidade   = $_POST['cidade'] ?? '';
$estado   = $_POST['estado'] ?? '';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Confirmação de Cadastro</title>
  <style>
    body { font-family: Arial, sans-serif; background: #f5f5f5; padding: 20px; }
    .card { background: white; padding: 20px; border-radius: 10px; max-width: 500px; margin: auto; box-shadow: 0 2px 8px rgba(0,0,0,0.2); }
    .botoes { margin-top: 20px; text-align: center; }
    button { padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; }
    .confirmar { background: #28a745; color: white; }
    .corrigir { background: #dc3545; color: white; margin-left: 10px; }
  </style>
</head>
<body>

<div class="card">
  <h2>Confirme seus dados</h2>
  <p><b>Nome:</b> <?= htmlspecialchars($nome) ?></p>
  <p><b>E-mail:</b> <?= htmlspecialchars($email) ?></p>
  <p><b>CEP:</b> <?= htmlspecialchars($cep) ?></p>
  <p><b>Endereço:</b> <?= htmlspecialchars($endereco) ?>, <?= htmlspecialchars($numero) ?></p>
  <p><b>Bairro:</b> <?= htmlspecialchars($bairro) ?></p>
  <p><b>Cidade:</b> <?= htmlspecialchars($cidade) ?> - <?= htmlspecialchars($estado) ?></p>

  <div class="botoes">
    <!-- Se confirmar, envia para salvar_cadastro.php -->
    <form method="post" action="salvar_cadastro.php" style="display:inline;">
      <input type="hidden" name="nome" value="<?= htmlspecialchars($nome) ?>">
      <input type="hidden" name="email" value="<?= htmlspecialchars($email) ?>">
      <input type="hidden" name="senha" value="<?= htmlspecialchars($senha) ?>">
      <input type="hidden" name="cep" value="<?= htmlspecialchars($cep) ?>">
      <input type="hidden" name="endereco" value="<?= htmlspecialchars($endereco) ?>">
      <input type="hidden" name="numero" value="<?= htmlspecialchars($numero) ?>">
      <input type="hidden" name="bairro" value="<?= htmlspecialchars($bairro) ?>">
      <input type="hidden" name="cidade" value="<?= htmlspecialchars($cidade) ?>">
      <input type="hidden" name="estado" value="<?= htmlspecialchars($estado) ?>">
      <button type="submit" class="confirmar">✅ Confirmar</button>
    </form>

    <!-- Se corrigir, volta para o cadastro -->
    <form method="get" action="cadastro.html" style="display:inline;">
      <button type="submit" class="corrigir">❌ Corrigir</button>
    </form>
  </div>
</div>

</body>
</html>
