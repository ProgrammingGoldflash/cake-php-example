<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Drama[]|\Cake\Collection\CollectionInterface $dramas
 */
?>
<div class="dramas index content">
    <?= $this->Html->link(__('Theaterstück hinzufügen'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Theaterstücke') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('genre_id') ?></th>
                    <th><?= $this->Paginator->sort('name', 'Name des Stücks') ?></th>
                    <th><?= $this->Paginator->sort('person_id', 'Autor') ?></th>
                    <th><?= $this->Paginator->sort('date', 'Termine') ?></th>
                    <th class="actions"></th><!--  <?= __('Actions') ?> -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dramas as $drama): ?>
                    <?php foreach ($drama->drama_events as $event): ?>
                    <tr>
                        <td><?= $this->Number->format($drama->id) ?></td>
                        <td><?= $drama->has('genre') ? $this->Html->link($drama->genre->name, ['controller' => 'Genres', 'action' => 'view', $drama->genre->Id]) : '' ?></td>
                        <td><?= h($drama->name) ?></td>
                        <td><?= $drama->has('person') ? $this->Html->link($drama->person->first_name.' '.$drama->person->last_name, ['controller' => 'Persons', 'action' => 'view', $drama->person->id]) : '' ?></td>
                        <td><?= h($event->date) ?></td>
                        <td class="actions">
                            <!-- <?= $this->Html->link(__('View'), ['action' => 'view', $drama->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $drama->id]) ?> -->
                            <?= $this->Form->postLink(__('Löschen'), ['action' => 'delete', $drama->id], ['confirm' => __('Are you sure you want to delete # {0}?', $drama->id)]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
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
