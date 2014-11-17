<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/he_IL/sdk.js#xfbml=1&appId=588887864550204&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<div class="text-center">

    <?php echo CHtml::beginForm('search', 'get'); ?>

    <?php echo CHtml::textField('q', null, array('id' => 'index-input', 'class' => 'form-control', 'autofocus' => 'on', 'placeholder' => 'חפשו מוצר או רכיב', 'autocomplete' => 'off')); ?>

    <?php echo CHtml::htmlButton('חיפוש', array('type' => 'submit', 'name' => false, 'class' => 'btn btn-success')); ?>

    <?php echo CHtml::htmlButton('חיפוש מהיר', array('type' => 'submit', 'name' => 'quick', 'value' => 'true', 'class' => 'btn btn-default')); ?>

    <?php echo CHtml::endForm(); ?>

    <div id="index-guide">

        <p>זקוקים לעזרה? <?php echo CHtml::link('מדריך לשימוש במנוע החיפוש', array('site/guide')); ?>.</p>

        <p>במאגרינו יש <?php echo number_format($count['products']); ?> מוצרים ו-<?php echo number_format($count['ingredients']); ?> רכיבים, וזה ממשיך לעלות!</p>

        <div>

            <div style="display: inline;">רוצים לעזור לנו לגדול? שתפו אותנו עם חבריכם:</div>

            <div class="fb-share-button" style="display: inline;" data-href="http://www.vegansearch.co.il/" data-layout="button_count"></div>

        </div>

    </div>

</div>