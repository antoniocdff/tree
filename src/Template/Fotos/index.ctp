<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Foto'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Albuns'), ['controller' => 'Albuns', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Albun'), ['controller' => 'Albuns', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fotos index large-9 medium-8 columns content">
    <h3><?= __('Fotos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('album_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('titulo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_foto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_criacao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_atualizacao') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fotos as $foto): ?>
            <tr>
                <td><?= $this->Number->format($foto->id) ?></td>
                <td><?= $foto->has('albun') ? $this->Html->link($foto->albun->id, ['controller' => 'Albuns', 'action' => 'view', $foto->albun->id]) : '' ?></td>
                <td><?= h($foto->titulo) ?></td>
                <td><?= h($foto->data_foto) ?></td>
                <td><?= h($foto->data_criacao) ?></td>
                <td><?= h($foto->data_atualizacao) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $foto->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $foto->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $foto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $foto->id)]) ?>
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
