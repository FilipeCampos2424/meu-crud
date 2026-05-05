<?php
require_once __DIR__ . '/../src/repository.php';

$acao = $_GET['acao'] ?? 'list';

require __DIR__ . '/../views/header.php';

switch ($acao) {
    case 'list':
        require __DIR__ . '/../views/list.php';
        break;
    case 'create':
        require __DIR__ . '/../views/create.php';
        break;

    case 'edit':
        require __DIR__ . '/../views/edit.php';
        break;

    case 'delete':
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo "<p style='color:#a00;'>Método inválido.</p>";
            break;
        }
        $id = (int) ($_POST['id'] ?? 0);
        if ($id > 0) {
            excluir_tarefa($id);
        }

        header("Location: ?acao=list");
        exit;

        default:
        echo "<p style='color:#a00;'>Ação desconhecida.</p>";
        require __DIR__ . '/../views/list.php';
        break;
}

require __DIR__ . '/../views/footer.php';