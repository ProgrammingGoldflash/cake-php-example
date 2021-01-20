<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Drama $drama
 */
?>
<div class="row">
    <div class="column-responsive">
        <div class="dramas form content">
            <?= $this->Form->create($drama) ?>
            <fieldset>
                <legend><?= __('Theaterstück hinzufügen') ?></legend>
                <?php
                    echo $this->Form->control('name', ['required' => true] );
                    echo $this->Form->control('genre_id', ['options' => $genres]);
                    echo $this->Form->control('person_id', ['options' => $persons, 'label' => 'Autor']);
                    echo $this->Form->control('date', ['label' => 'Erstaufführung am', 'type' => 'datetime', 'required' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
