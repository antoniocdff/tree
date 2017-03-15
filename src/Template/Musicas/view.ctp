<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Musica'), ['action' => 'edit', $musica->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Musica'), ['action' => 'delete', $musica->id], ['confirm' => __('Are you sure you want to delete # {0}?', $musica->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Musicas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Musica'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="musicas view large-9 medium-8 columns content">
    <h3><?= h($musica->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Usuario') ?></th>
            <td><?= $musica->has('usuario') ? $this->Html->link($musica->usuario->id, ['controller' => 'Usuarios', 'action' => 'view', $musica->usuario->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Titulo') ?></th>
            <td><?= h($musica->titulo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($musica->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ordem') ?></th>
            <td><?= $this->Number->format($musica->ordem) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Album') ?></th>
            <td><?= h($musica->data_album) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Criacao') ?></th>
            <td><?= h($musica->data_criacao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Atualizacao') ?></th>
            <td><?= h($musica->data_atualizacao) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descricao') ?></h4>
        <?= $this->Text->autoParagraph(h($musica->descricao)); ?>
    </div>
</div>
