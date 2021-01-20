<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Crew[]|\Cake\Collection\CollectionInterface $crews
 */
?>
<div class="crews index content">
    <?= $this->Html->link(__('New Crew'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Crews') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('drama_event_id') ?></th>
                    <th><?= $this->Paginator->sort('person_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($crews as $crew): ?>
                <tr>
                    <td><?= $crew->has('drama_event') ? $this->Html->link($crew->drama_event->id, ['controller' => 'DramaEvents', 'action' => 'view', $crew->drama_event->id]) : '' ?></td>
                    <td><?= $crew->has('person') ? $this->Html->link($crew->person->id, ['controller' => 'Persons', 'action' => 'view', $crew->person->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $crew->drama_event_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $crew->drama_event_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $crew->drama_event_id], ['confirm' => __('Are you sure you want to delete # {0}?', $crew->drama_event_id)]) ?>
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
