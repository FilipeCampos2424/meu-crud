<?php
require_once __DIR__ . '/../src/repository.php';
$tarefas = listar_tarefas();
?>

<div class="row">
<a class="btn" href="?acao=create">+ Nova tarefa</a>
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Status</th>
            <th>Criado em</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tarefas as $t): ?>
            <tr>
                <td><?= (int)$t['id'] ?></td>
                <td><?= htmlspecialchars($t['titulo']) ?></td>
                <td><span class="badge"><?= htmlspecialchars ($t['status']) ?></span></td>
                <td><?= htmlspecialchars ($t['criado_em']) ?></td>
                <td class="row">
                    <a class="btn" href="?acao=edit&id=<?= (int)$t['id'] ?>">Editar</a>

                    <form method="post" action="?acao=delete" onsubmit="return confirm ('Excluir esta tarefa?');">
                        <input type="hidden" name="id" value="<?= (int)$t['id'] ?>">
                        <button class="btn btn-danger" type="submit">Excluir</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>

            <?php if (count ($tarefas) === 0) : ?>
                <tr><td colspan="5">Nnehuma tarefa cadastrada.</td></tr>
    </tbody>
</table>