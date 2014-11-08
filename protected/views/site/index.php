<div class="text-center">

    <?php echo CHtml::beginForm('search', 'get'); ?>

    <?php echo CHtml::textField('q', null, array('id' => 'index-input', 'class' => 'form-control', 'autofocus' => 'on', 'placeholder' => 'חפשו מוצר או רכיב', 'autocomplete' => 'off')); ?>

    <?php echo CHtml::htmlButton('חיפוש', array('type' => 'submit', 'name' => false, 'class' => 'btn btn-success')); ?>

    <?php echo CHtml::htmlButton('חיפוש מהיר', array('type' => 'submit', 'name' => 'quick', 'value' => 'true', 'class' => 'btn btn-default')); ?>

    <?php echo CHtml::endForm(); ?>

    <div id="index-guide">

        <p>זקוקים לעזרה? <?php echo CHtml::link('מדריך לשימוש במנוע החיפוש', array('site/guide')); ?>.</p>

        <p>במאגרינו יש <?php echo number_format($count['products']); ?> מוצרים ו-<?php echo number_format($count['ingredients']); ?> רכיבים, וזה ממשיך לעלות!</p>

    </div>

</div>