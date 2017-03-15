<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Foto'), ['action' => 'edit', $foto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Foto'), ['action' => 'delete', $foto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $foto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Fotos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Foto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Albuns'), ['controller' => 'Albuns', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Albun'), ['controller' => 'Albuns', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fotos view large-9 medium-8 columns content">
    <h3><?= h($foto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Albun') ?></th>
            <td><?= $foto->has('albun') ? $this->Html->link($foto->albun->id, ['controller' => 'Albuns', 'action' => 'view', $foto->albun->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Titulo') ?></th>
            <td><?= h($foto->titulo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($foto->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Foto') ?></th>
            <td><?= h($foto->data_foto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Criacao') ?></th>
            <td><?= h($foto->data_criacao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Atualizacao') ?></th>
            <td><?= h($foto->data_atualizacao) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descricao') ?></h4>
        <?= $this->Text->autoParagraph(h($foto->descricao)); ?>
    </div>
</div>
