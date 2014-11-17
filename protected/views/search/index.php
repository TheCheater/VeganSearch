<?php Yii::app()->clientScript->registerScript('filters', '$(document).ready(function() {
    document.getElementById("search-filters-link").style.display = "initial";
    ' . (isset($_GET['isVegan']) && in_array($_GET['isVegan'], array('false', 'true', 'maybe')) ? '' : 'document.getElementById("search-filters-container").style.display = "none";') . '
    $("#search-filters-link").click(function() {
        $("#search-filters-container").slideToggle("fast");
    });
});'); ?>

<div class="well well-sm">

    <?php echo CHtml::beginForm('search', 'get', array('class' => 'form-inline')); ?>

    <?php echo CHtml::textField('q', Yii::app()->request->getParam('q'), array('id' => 'search-input', 'class' => 'form-control', 'placeholder' => 'חפשו מוצר או רכיב', 'autocomplete' => 'off')); ?>

    <?php echo CHtml::htmlButton('חיפוש', array('type' => 'submit', 'name' => false, 'class' => 'btn btn-success')); ?>

    <?php echo CHtml::htmlButton('חיפוש מהיר', array('type' => 'submit', 'name' => 'quick', 'value' => 'true', 'class' => 'btn btn-default')); ?>

    <div id="search-filters-link" class="pull-left">

        <a href="javascript:void(0)">סינון תוצאות</a>

    </div>

    <div id="search-filters-container">

        <div class="form-group">

            <label>בחר את התוצאות שברצונך להציג</label>

            <?php echo CHtml::dropDownList(
                'isVegan',
                Yii::app()->request->getParam('isVegan'),
                array(
                    'all' => 'הצג הכל',
                    'true' => 'הצג רק מוצרים ורכיבים טבעוניים',
                    'false' => 'הצג רק מוצרים ורכיבים שאינם טבעוניים',
                    'maybe' => 'הצג רק רכיבים שעשויים להיות טבעוניים',
                ),
                array('class' => 'form-control')
            ); ?>

        </div>

    </div>

    <?php echo CHtml::error($searchModel, 'q'); ?>

    <?php echo CHtml::endForm(); ?>

</div>

<?php if (isset($_GET['q']) && !$searchModel->errors): ?>

    <h1>תוצאות החיפוש</h1>

    <?php $this->widget('zii.widgets.jui.CJuiTabs', array(

        'id' => 'search-tabs',

        'tabs' => array(
            'מוצרים (' . $products->getTotalItemCount() . ')' => array(
                'id' => 'מוצרים',
                'content' => $this->renderPartial('productsResults', array('products' => $products), true)
            ),
            'רכיבים (' . $ingredients->getTotalItemCount() . ')' => array(
                'id' => 'רכיבים',
                'content' => $this->renderPartial('ingredientsResults', array('ingredients' => $ingredients), true)
            )
        ),

        'options' => array(
            'selected' => (!$products->getTotalItemCount() && $ingredients->getTotalItemCount() ? 1 : 0)
        ),

        'cssFile' => null

    )); ?>

<?php endif; ?>