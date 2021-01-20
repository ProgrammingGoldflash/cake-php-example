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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $drama->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $drama->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Dramas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="dramas form content">
            <?= $this->Form->create($drama) ?>
            <fieldset>
                <legend><?= __('Edit Drama') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('genre_id', ['options' => $genres]);
                    echo $this->Form->control('person_id', ['options' => $persons]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
