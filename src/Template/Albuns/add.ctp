<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Albuns'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="albuns form large-9 medium-8 columns content">
    <?= $this->Form->create($albun) ?>
    <fieldset>
        <legend><?= __('Add Albun') ?></legend>
        <?php
            echo $this->Form->control('usuario_id', ['options' => $usuarios]);
            echo $this->Form->control('titulo');
            echo $this->Form->control('descricao');
            echo $this->Form->control('data_album', ['empty' => true]);
            echo $this->Form->control('data_criacao', ['empty' => true]);
            echo $this->Form->control('data_atualizacao', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
