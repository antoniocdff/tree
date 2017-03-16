<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')):
    throw new NotFoundException('Please replace src/Template/Pages/home.ctp with your own version.');
endif;
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Feedback Tree
    </title>

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('home.css') ?>
    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">
</head>
<body class="home">

<div class="usuarios view large-9 medium-8 columns content">
    <h3><?= h($usuario->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($usuario->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($usuario->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($usuario->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sexo') ?></th>
            <td><?= h($usuario->sexo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Avatar') ?></th>
            <td><?= h($usuario->avatar) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cidade') ?></th>
            <td><?= h($usuario->cidade) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefone') ?></th>
            <td><?= h($usuario->telefone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($usuario->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pai Id') ?></th>
            <td><?= $this->Number->format($usuario->pai_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mae Id') ?></th>
            <td><?= $this->Number->format($usuario->mae_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Nascimento') ?></th>
            <td><?= h($usuario->data_nascimento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Criacao') ?></th>
            <td><?= h($usuario->data_criacao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Atualizacao') ?></th>
            <td><?= h($usuario->data_atualizacao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Acesso') ?></th>
            <td><?= h($usuario->data_acesso) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fanhoso') ?></th>
            <td><?= $usuario->fanhoso ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mudo') ?></th>
            <td><?= $usuario->mudo ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Texto') ?></h4>
        <?= $this->Text->autoParagraph(h($usuario->texto)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Albuns') ?></h4>
        <?php if (!empty($usuario->albuns)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Usuario Id') ?></th>
                <th scope="col"><?= __('Titulo') ?></th>
                <th scope="col"><?= __('Descricao') ?></th>
                <th scope="col"><?= __('Data Album') ?></th>
                <th scope="col"><?= __('Data Criacao') ?></th>
                <th scope="col"><?= __('Data Atualizacao') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($usuario->albuns as $albuns): ?>
            <tr>
                <td><?= h($albuns->id) ?></td>
                <td><?= h($albuns->usuario_id) ?></td>
                <td><?= h($albuns->titulo) ?></td>
                <td><?= h($albuns->descricao) ?></td>
                <td><?= h($albuns->data_album) ?></td>
                <td><?= h($albuns->data_criacao) ?></td>
                <td><?= h($albuns->data_atualizacao) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Albuns', 'action' => 'view', $albuns->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Albuns', 'action' => 'edit', $albuns->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Albuns', 'action' => 'delete', $albuns->id], ['confirm' => __('Are you sure you want to delete # {0}?', $albuns->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Musicas') ?></h4>
        <?php if (!empty($usuario->musicas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Usuario Id') ?></th>
                <th scope="col"><?= __('Titulo') ?></th>
                <th scope="col"><?= __('Descricao') ?></th>
                <th scope="col"><?= __('Data Album') ?></th>
                <th scope="col"><?= __('Data Criacao') ?></th>
                <th scope="col"><?= __('Data Atualizacao') ?></th>
                <th scope="col"><?= __('Ordem') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($usuario->musicas as $musicas): ?>
            <tr>
                <td><?= h($musicas->id) ?></td>
                <td><?= h($musicas->usuario_id) ?></td>
                <td><?= h($musicas->titulo) ?></td>
                <td><?= h($musicas->descricao) ?></td>
                <td><?= h($musicas->data_album) ?></td>
                <td><?= h($musicas->data_criacao) ?></td>
                <td><?= h($musicas->data_atualizacao) ?></td>
                <td><?= h($musicas->ordem) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Musicas', 'action' => 'view', $musicas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Musicas', 'action' => 'edit', $musicas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Musicas', 'action' => 'delete', $musicas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $musicas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Filhos') ?></h4>
        <?php if (!empty($filhos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Email') ?></th>
            </tr>
            <?php foreach ($filhos as $filho): ?>
            <tr>
                <td><?= h($filho->id) ?></td>
                <td><?= h($filho->email) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
