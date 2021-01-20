<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Drama $drama
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Drama'), ['action' => 'edit', $drama->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Drama'), ['action' => 'delete', $drama->id], ['confirm' => __('Are you sure you want to delete # {0}?', $drama->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Dramas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Drama'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="dramas view content">
            <h3><?= h($drama->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($drama->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Genre') ?></th>
                    <td><?= $drama->has('genre') ? $this->Html->link($drama->genre->name, ['controller' => 'Genres', 'action' => 'view', $drama->genre->Id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Person') ?></th>
                    <td><?= $drama->has('person') ? $this->Html->link($drama->person->id, ['controller' => 'Persons', 'action' => 'view', $drama->person->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($drama->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Drama Events') ?></h4>
                <?php if (!empty($drama->drama_events)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Date') ?></th>
                            <th><?= __('Drama Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($drama->drama_events as $dramaEvents) : ?>
                        <tr>
                            <td><?= h($dramaEvents->id) ?></td>
                            <td><?= h($dramaEvents->date) ?></td>
                            <td><?= h($dramaEvents->drama_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'DramaEvents', 'action' => 'view', $dramaEvents->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'DramaEvents', 'action' => 'edit', $dramaEvents->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'DramaEvents', 'action' => 'delete', $dramaEvents->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dramaEvents->id)]) ?>
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
