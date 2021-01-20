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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $crew->drama_event_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $crew->drama_event_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Crews'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="crews form content">
            <?= $this->Form->create($crew) ?>
            <fieldset>
                <legend><?= __('Edit Crew') ?></legend>
                <?php
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
