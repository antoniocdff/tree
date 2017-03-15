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
                ['action' => 'delete', $foto->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $foto->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Fotos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Albuns'), ['controller' => 'Albuns', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Albun'), ['controller' => 'Albuns', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fotos form large-9 medium-8 columns content">
    <?= $this->Form->create($foto) ?>
    <fieldset>
        <legend><?= __('Edit Foto') ?></legend>
        <?php
            echo $this->Form->control('album_id', ['options' => $albuns]);
            echo $this->Form->control('titulo');
            echo $this->Form->control('descricao');
            echo $this->Form->control('data_foto', ['empty' => true]);
            echo $this->Form->control('data_criacao', ['empty' => true]);
            echo $this->Form->control('data_atualizacao', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
