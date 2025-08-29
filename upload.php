<?php
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {
    $destino = __DIR__ . "/imagens/casal-feliz.jpg"; // caminho da imagem antiga
    if (move_uploaded_file($_FILES['foto']['tmp_name'], $destino)) {
        echo "<script>alert('Imagem substituída com sucesso!'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Erro ao salvar a imagem.'); window.location.href='index.html';</script>";
    }
} else {
    echo "<script>alert('Nenhum arquivo enviado.'); window.location.href='index.html';</script>";
}
?>
