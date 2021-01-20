<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DramaEvent $dramaEvent
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Drama Event'), ['action' => 'edit', $dramaEvent->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Drama Event'), ['action' => 'delete', $dramaEvent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dramaEvent->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Drama Events'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Drama Event'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="dramaEvents view content">
            <h3><?= h($dramaEvent->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Drama') ?></th>
                    <td><?= $dramaEvent->has('drama') ? $this->Html->link($dramaEvent->drama->name, ['controller' => 'Dramas', 'action' => 'view', $dramaEvent->drama->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($dramaEvent->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($dramaEvent->date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Crews') ?></h4>
                <?php if (!empty($dramaEvent->crews)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Drama Event Id') ?></th>
                            <th><?= __('Person Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($dramaEvent->crews as $crews) : ?>
                        <tr>
                            <td><?= h($crews->drama_event_id) ?></td>
                            <td><?= h($crews->person_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Crews', 'action' => 'view', $crews->drama_event_id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Crews', 'action' => 'edit', $crews->drama_event_id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Crews', 'action' => 'delete', $crews->drama_event_id], ['confirm' => __('Are you sure you want to delete # {0}?', $crews->drama_event_id)]) ?>
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
