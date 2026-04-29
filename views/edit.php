<?php
require_once __DIR__ . '/../src/repository.php';

$erros = [];
$id = (int) ($_GET['id' ?? 0]);
$tarefa = $id > 0 ? buscar_tarefa($id) : null;

if (!$tarefa) {
    echo "<p style'color:#a00;'>Tarefa não encontrada.</p>";
    echo "<a class='btn' href='?acao=list'>Voltar</a>";
    return;
}

$titulo = $tarefa['titulo'];
$descricao = $tarefa['descricao'] ?? '';
$status = $tarefa['status'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim($_POST['titulo'] ?? '');
    $descricao = trim($_POST['descricao'] ?? '');
    $status = $_POST['status'] ?? 'pendente';

    if ($titulo === '') $erros[] = "Título é obrigatório.";
    if (!in_array($status, ['pendente', 'feito'], true)) $erros[] = "Status inválido.";

    if (!$erros) {
        atualizar_tarefa($id, $titulo, $descricao !== '' ? $descricao : null, $status);
        header("Location: ?acao=list");
        exit;
    }
}
?>

<a class="btn" href="?acao=list">• Voltar</a>

<h2>Editar tarefa #<?= (int)$id ?></h2>

<?php if ($erros) : ?>
<ul style="color:#a00;">
    <?php foreach ($erros as $e): ?>
        <li><?= htmlspecialchars($e) ?></li>
        <?php endforeach; ?>
</ul>
<?php endif; ?>