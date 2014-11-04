<div id="product" class="row">

    <div class="col-sm-3">
        <?php
        if ($product['image'])
            echo CHtml::image($product['image'], $product['name'], array('id' => 'product-image', 'class' => 'img-thumbnail'));
        else
            echo CHtml::image('/static/images/no-image.png', 'אין תמונה', array('id' => 'product-image', 'class' => 'img-thumbnail'));
        ?>
    </div>

    <div class="col-sm-9">

        <h1 id="product-name"><?php echo $product['name']; ?> <small>(<?php echo $product['barcode']; ?>)</small></h1>

        <div class="alert alert-<?php echo $product['is_vegan'] ? 'success' : 'danger'; ?>" role="alert">
            <span class="<?php echo $product['is_vegan'] ? 'glyphicon glyphicon-ok' : 'glyphicon glyphicon-remove'; ?>"></span>
            <strong><?php echo $product['is_vegan'] ? 'מצויין!' : 'זהירות!'; ?></strong>
            <?php echo $product['is_vegan'] ? 'המוצר טבעוני.' : 'המוצר אינו טבעוני.'; ?>
        </div>

        <?php if ($product['description'] || $product['ingredients'] || $product['allergies']): ?>

            <div class="product-section">

                <h3>פרטים על המוצר</h3>

                <dl>

                    <?php if ($product['description']): ?>
                        <dt>תיאור:</dt>
                        <dd><?php echo $product['description']; ?></dd>
                    <?php endif; ?>

                    <?php if ($product['ingredients']): ?>
                        <dt>רכיבים:</dt>
                        <dd><?php echo $product['ingredients']; ?></dd>
                    <?php endif; ?>

                    <?php if ($product['allergies']): ?>
                        <dt>אלרגיים:</dt>
                        <dd><?php echo $product['allergies']; ?></dd>
                    <?php endif; ?>

                </dl>

            </div>

        <?php endif; ?>

        <p><span class="glyphicon glyphicon-flag"></span> מצאתם טעות? <?php echo CHtml::link('אנא דווחו לנו', array('site/contact', 'product' => $product['url'])); ?></p>

    </div>

</div>