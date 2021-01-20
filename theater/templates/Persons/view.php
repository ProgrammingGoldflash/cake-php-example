<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person $person
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Person'), ['action' => 'edit', $person->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Person'), ['action' => 'delete', $person->id], ['confirm' => __('Are you sure you want to delete # {0}?', $person->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Persons'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Person'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="persons view content">
            <h3><?= h($person->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('First Name') ?></th>
                    <td><?= h($person->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name') ?></th>
                    <td><?= h($person->last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gender') ?></th>
                    <td><?= h($person->gender) ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= $person->has('role') ? $this->Html->link($person->role->name, ['controller' => 'Roles', 'action' => 'view', $person->role->Id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($person->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Birth') ?></th>
                    <td><?= h($person->birth) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Crews') ?></h4>
                <?php if (!empty($person->crews)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Drama Event Id') ?></th>
                            <th><?= __('Person Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($person->crews as $crews) : ?>
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
            <div class="related">
                <h4><?= __('Related Dramas') ?></h4>
                <?php if (!empty($person->dramas)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Genre Id') ?></th>
                            <th><?= __('Person Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($person->dramas as $dramas) : ?>
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
