<h1>צור קשר</h1>

<?php if ($contactModel->sendStatus): ?>
    <div class="alert alert-success">
        <strong>ההודעה נשלחה.</strong>
    </div>
<?php endif; ?>

<?php if ($messageAbout): ?>
    <?php if ($messageAboutType == 'product'): ?>
        <p>אתם מדווחים על המוצר: <strong><?php echo CHtml::link($messageAbout['name'] . ' (מק"ט: ' . $messageAbout['barcode'] . ')', array('products/view', 'url' => $messageAbout['url'])); ?></strong></p>
    <?php else: ?>
        <p>אתם מדווחים על הרכיב: <strong><?php echo CHtml::link($messageAbout['name'] . ($messageAbout['e_number'] ? ' (E' . $messageAbout['e_number'] . ')' : ''), array('ingredients/view', 'url' => $messageAbout['url'])); ?></strong></p>
    <?php endif; ?>
<?php endif; ?>

<?php $form = $this->beginWidget('CActiveForm'); ?>

<div class="form-group">
    <?php echo $form->label($contactModel, 'email'); ?>
    <?php echo $form->emailField($contactModel, 'email', array('class' => 'form-control contact-input')); ?>
    <?php echo $form->error($contactModel, 'email', array('class' => 'alert alert-danger contact-alert')); ?>
</div>

<div class="form-group">
    <?php echo $form->label($contactModel, 'content'); ?>
    <?php echo $form->textArea($contactModel, 'content', array('class' => 'form-control contact-input', 'rows' => 5)); ?>
    <?php echo $form->error($contactModel, 'content', array('class' => 'alert alert-danger contact-alert')); ?>
</div>

<?php echo CHtml::submitButton('שלח', array('class' => 'btn btn-success')); ?>

<?php $this->endWidget(); ?>