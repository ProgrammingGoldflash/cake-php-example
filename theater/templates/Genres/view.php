<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Genre $genre
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Genre'), ['action' => 'edit', $genre->Id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Genre'), ['action' => 'delete', $genre->Id], ['confirm' => __('Are you sure you want to delete # {0}?', $genre->Id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Genres'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Genre'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="genres view content">
            <h3><?= h($genre->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($genre->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($genre->Id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Dramas') ?></h4>
                <?php if (!empty($genre->dramas)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Genre Id') ?></th>
                            <th><?= __('Person Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($genre->dramas as $dramas) : ?>
                        <tr>
                            <td><?= h($dramas->id) ?></td>
                            <td><?= h($dramas->name) ?></td>
                            <td><?= h($dramas->genre_id) ?></td>
                            <td><?= h($dramas->person_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Dramas', 'action' => 'view', $dramas->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Dramas', 'action' => 'edit', $dramas->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Dramas', 'action' => 'delete', $dramas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dramas->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
