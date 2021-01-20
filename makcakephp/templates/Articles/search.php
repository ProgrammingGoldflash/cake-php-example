<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Movie $movie
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Articles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="movies form content">
            <?= $this->Form->create() ?>
            <fieldset>
                <legend><?= __('Suche') ?></legend>
                <?php
                    echo $this->Form->control('searchstring');
                    echo $this->Form->control('type_id', ['options' => $types]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<?php
    if (!empty($results)) {
        ?>

<h3><?= __('Articles') ?></h3>
<div class="row">
<div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('slug') ?></th>
                    <th><?= $this->Paginator->sort('published') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('type_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $article): ?>
                <tr>
                    <td><?= $this->Number->format($article->id) ?></td>
                    <td><?= $article->has('user') ? $this->Html->link($article->user->id, ['controller' => 'Users', 'action' => 'view', $article->user->id]) : '' ?></td>
                    <td><?= h($article->title) ?></td>
                    <td><?= h($article->slug) ?></td>
                    <td><?= h($article->published) ?></td>
                    <td><?= h($article->created) ?></td>
                    <td><?= h($article->modified) ?></td>
                    <td><?= $article->has('type') ? $this->Html->link($article->type->title, ['controller' => 'Types', 'action' => 'view', $article->type->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $article->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $article->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </div>
<?php
    }
?>