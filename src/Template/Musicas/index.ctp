<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Musica'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="musicas index large-9 medium-8 columns content">
    <h3><?= __('Musicas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usuario_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('titulo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_album') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_criacao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_atualizacao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ordem') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($musicas as $musica): ?>
            <tr>
                <td><?= $this->Number->format($musica->id) ?></td>
                <td><?= $musica->has('usuario') ? $this->Html->link($musica->usuario->id, ['controller' => 'Usuarios', 'action' => 'view', $musica->usuario->id]) : '' ?></td>
                <td><?= h($musica->titulo) ?></td>
                <td><?= h($musica->data_album) ?></td>
                <td><?= h($musica->data_criacao) ?></td>
                <td><?= h($musica->data_atualizacao) ?></td>
                <td><?= $this->Number->format($musica->ordem) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $musica->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $musica->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $musica->id], ['confirm' => __('Are you sure you want to delete # {0}?', $musica->id)]) ?>
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
