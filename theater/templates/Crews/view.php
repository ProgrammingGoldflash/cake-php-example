<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Crew $crew
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Crew'), ['action' => 'edit', $crew->drama_event_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Crew'), ['action' => 'delete', $crew->drama_event_id], ['confirm' => __('Are you sure you want to delete # {0}?', $crew->drama_event_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Crews'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Crew'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="crews view content">
            <h3><?= h($crew->drama_event_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Drama Event') ?></th>
                    <td><?= $crew->has('drama_event') ? $this->Html->link($crew->drama_event->id, ['controller' => 'DramaEvents', 'action' => 'view', $crew->drama_event->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Person') ?></th>
                    <td><?= $crew->has('person') ? $this->Html->link($crew->person->id, ['controller' => 'Persons', 'action' => 'view', $crew->person->id]) : '' ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
