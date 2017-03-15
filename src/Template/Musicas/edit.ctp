<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $musica->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $musica->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Musicas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="musicas form large-9 medium-8 columns content">
    <?= $this->Form->create($musica) ?>
    <fieldset>
        <legend><?= __('Edit Musica') ?></legend>
        <?php
            echo $this->Form->control('usuario_id', ['options' => $usuarios]);
            echo $this->Form->control('titulo');
            echo $this->Form->control('descricao');
            echo $this->Form->control('data_album', ['empty' => true]);
            echo $this->Form->control('data_criacao', ['empty' => true]);
            echo $this->Form->control('data_atualizacao', ['empty' => true]);
            echo $this->Form->control('ordem');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
