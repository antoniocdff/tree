<?php
/**
  * @var \App\View\AppView $this
  */
?>
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
            <td><?php echo $this->Image->render($usuario->image); ?></td>
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
            <th scope="row"><?= __('Pai Foto') ?></th>
            <td><?php echo $this->Image->render($usuario->pai->image); ?> </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mae Foto') ?></th>
            <td><?php echo $this->Image->render($usuario->mae->image); ?> </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Conjuge Foto') ?></th>
            <td><?php echo $this->Image->render($usuario->conjuge->image); ?> </td>
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
                <th scope="col"><?= __('Nome') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Avatar') ?></th>
            </tr>
            <?php foreach ($filhos as $filho): ?>
            <tr>
                <td><?= h($filho->id) ?></td>
                <td><?= h($filho->nome) ?></td>
                <td><?= h($filho->email) ?></td>
                <td><?php echo $this->Image->render($filho->image); ?> </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
