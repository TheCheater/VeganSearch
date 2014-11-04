<div class="row search-result">

    <div class="col-xs-3 text-left">
        <?php
        if ($data['image'])
            echo CHtml::image($data['image'], $data['name'], array('class' => 'img-thumbnail'));
        /*else
            echo CHtml::image('/static/images/no-image.png', 'אין תמונה', array('class' => 'img-thumbnail'));*/
        ?>
    </div>

    <div class="col-xs-9">

        <div class="search-result-name">
            <?php echo CHtml::link($data['name'] . ' (' . $data['barcode'] . ')', array('products/view', 'url' => $data['url'])); ?>
        </div>

        <div class="search-result-status">
            <span class="<?php echo $data['is_vegan'] ? 'vegan' : 'not-vegan'; ?>">
                <span class="<?php echo $data['is_vegan'] ? 'glyphicon glyphicon-ok' : 'glyphicon glyphicon-remove'; ?>"></span>
                <?php echo $data['is_vegan'] ? 'המוצר טבעוני' : 'המוצר אינו טבעוני'; ?>.
            </span>
        </div>

    </div>

</div>