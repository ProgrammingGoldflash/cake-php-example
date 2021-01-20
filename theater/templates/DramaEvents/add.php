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
            <?= $this->Html->link(__('List Drama Events'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="dramaEvents form content">
            <?= $this->Form->create($dramaEvent) ?>
            <fieldset>
                <legend><?= __('Add Drama Event') ?></legend>
                <?php
                    echo $this->Form->control('date');
                    echo $this->Form->control('drama_id', ['options' => $dramas]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
