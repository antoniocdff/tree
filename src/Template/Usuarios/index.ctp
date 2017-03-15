<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Albuns'), ['controller' => 'Albuns', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Albun'), ['controller' => 'Albuns', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Musicas'), ['controller' => 'Musicas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Musica'), ['controller' => 'Musicas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="usuarios index large-9 medium-8 columns content">
    <h3><?= __('Usuarios') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_nascimento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sexo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('avatar') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cidade') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telefone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fanhoso') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mudo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_criacao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_atualizacao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_acesso') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pai_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mae_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('conjuge_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?= $this->Number->format($usuario->id) ?></td>
                <td><?= h($usuario->email) ?></td>
                <td><?= h($usuario->password) ?></td>
                <td><?= h($usuario->data_nascimento) ?></td>
                <td><?= h($usuario->nome) ?></td>
                <td><?= h($usuario->sexo) ?></td>
                <td><?= h($usuario->avatar) ?></td>
                <td><?= h($usuario->cidade) ?></td>
                <td><?= h($usuario->telefone) ?></td>
                <td><?= h($usuario->fanhoso) ?></td>
                <td><?= h($usuario->mudo) ?></td>
                <td><?= h($usuario->data_criacao) ?></td>
                <td><?= h($usuario->data_atualizacao) ?></td>
                <td><?= h($usuario->data_acesso) ?></td>
                <td><?= $this->Number->format($usuario->pai_id) ?></td>
                <td><?= $this->Number->format($usuario->mae_id) ?></td>
                <td><?= $usuario->has('usuario') ? $this->Html->link($usuario->usuario->id, ['controller' => 'Usuarios', 'action' => 'view', $usuario->usuario->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $usuario->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $usuario->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $usuario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usuario->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
