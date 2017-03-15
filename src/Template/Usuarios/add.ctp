<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Albuns'), ['controller' => 'Albuns', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Albun'), ['controller' => 'Albuns', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Musicas'), ['controller' => 'Musicas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Musica'), ['controller' => 'Musicas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="usuarios form large-9 medium-8 columns content">
    <?= $this->Form->create($usuario) ?>
    <fieldset>
        <legend><?= __('Add Usuario') ?></legend>
        <?php
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            echo $this->Form->control('data_nascimento', ['empty' => true]);
            echo $this->Form->control('nome');
            echo $this->Form->control('texto');
            echo $this->Form->control('sexo');
            echo $this->Form->control('avatar');
            echo $this->Form->control('cidade');
            echo $this->Form->control('telefone');
            echo $this->Form->control('fanhoso');
            echo $this->Form->control('mudo');
            echo $this->Form->control('data_criacao', ['empty' => true]);
            echo $this->Form->control('data_atualizacao', ['empty' => true]);
            echo $this->Form->control('data_acesso', ['empty' => true]);
            echo $this->Form->control('pai_id');
            echo $this->Form->control('mae_id');
            echo $this->Form->control('conjuge_id', ['options' => $usuarios, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
