<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Albun'), ['action' => 'edit', $albun->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Albun'), ['action' => 'delete', $albun->id], ['confirm' => __('Are you sure you want to delete # {0}?', $albun->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Albuns'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Albun'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="albuns view large-9 medium-8 columns content">
    <h3><?= h($albun->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Usuario') ?></th>
            <td><?= $albun->has('usuario') ? $this->Html->link($albun->usuario->id, ['controller' => 'Usuarios', 'action' => 'view', $albun->usuario->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Titulo') ?></th>
            <td><?= h($albun->titulo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($albun->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Album') ?></th>
            <td><?= h($albun->data_album) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Criacao') ?></th>
            <td><?= h($albun->data_criacao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Atualizacao') ?></th>
            <td><?= h($albun->data_atualizacao) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descricao') ?></h4>
        <?= $this->Text->autoParagraph(h($albun->descricao)); ?>
    </div>
</div>
