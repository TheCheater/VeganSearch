<h1><?php echo $ingredient['name'] . ($ingredient['e_number'] ? ' <small>&rlm;(E' . $ingredient['e_number'] . ')</small>' : ''); ?></h1>

<div class="alert alert-<?php echo $ingredient['is_vegan'] ? ($ingredient['is_vegan'] == 2 ? 'warning' : 'success') : 'danger'; ?>">
    <span class="glyphicon glyphicon-<?php echo $ingredient['is_vegan'] ? ($ingredient['is_vegan'] == 2 ? 'adjust' : 'ok') : 'remove'; ?>"></span>
    <strong><?php echo $ingredient['is_vegan'] ? ($ingredient['is_vegan'] == 2 ? 'שימו לב!' : 'מצויין!') : 'זהירות!'; ?></strong>
    <?php echo $ingredient['is_vegan'] ? ($ingredient['is_vegan'] == 2 ? 'הרכיב יכול להיות מיוצר מן החי ויכול להיות מיוצר מן הצומח.' : 'הרכיב טבעוני.') : 'הרכיב אינו טבעוני.'; ?>
</div>

<?php if ($ingredient['usage'] || $ingredient['comments']): ?>

    <div class="ingredient-section">

        <h3>פרטים על הרכיב</h3>

        <dl>

            <?php if ($ingredient['usage']): ?>
                <dt>שימוש:</dt>
                <dd><?php echo $ingredient['usage']; ?></dd>
            <?php endif; ?>

            <?php if ($ingredient['comments']): ?>
                <dt>הערות:</dt>
                <dd><?php echo $ingredient['comments']; ?></dd>
            <?php endif; ?>

        </dl>

    </div>

<?php endif; ?>

<p><span class="glyphicon glyphicon-flag"></span> מצאתם טעות? <?php echo CHtml::link('אנא דווחו לנו', array('site/contact', 'ingredient' => $ingredient['url'])); ?></p>