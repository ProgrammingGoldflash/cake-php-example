<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DramaEvent[]|\Cake\Collection\CollectionInterface $dramaEvents
 */
?>
<div class="dramaEvents index content">
    <?= $this->Html->link(__('New Drama Event'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Drama Events') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('date') ?></th>
                    <th><?= $this->Paginator->sort('drama_genre_id') ?></th>
                    <th><?= $this->Paginator->sort('drama_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dramaEvents as $dramaEvent): ?>
                <tr>
                    <td><?= $this->Number->format($dramaEvent->drama->id) ?></td>
                    <td><?= h($dramaEvent->date) ?></td>
                    <td><?= h($dramaEvent->drama->genre_id) ?></td>
                    <td><?= $dramaEvent->has('drama') ? $this->Html->link($dramaEvent->drama->name, ['controller' => 'Dramas', 'action' => 'view', $dramaEvent->drama->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $dramaEvent->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $dramaEvent->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $dramaEvent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dramaEvent->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
