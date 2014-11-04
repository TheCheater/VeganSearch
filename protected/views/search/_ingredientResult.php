<div class="search-result">

    <div class="search-result-name">
        <?php echo CHtml::link($data['name'] . ($data['e_number'] ? ' &rlm;(E' . $data['e_number'] . ')' : ''), array('ingredients/view', 'url' => $data['url'])); ?>
    </div>

    <div class="search-result-status">
        <span class="<?php echo $data['is_vegan'] ? ($data['is_vegan'] == 2 ? 'maybe-vegan' : 'vegan') : 'not-vegan'; ?>">
            <span class="glyphicon glyphicon-<?php echo $data['is_vegan'] ? ($data['is_vegan'] == 2 ? 'adjust' : 'ok') : 'remove'; ?>"></span>
            <?php echo $data['is_vegan'] ? ($data['is_vegan'] == 2 ? 'הרכיב יכול להיות טבעוני *' : 'הרכיב טבעוני') : 'הרכיב אינו טבעוני'; ?><?php echo $data['search_comments'] ? ' (' . $data['search_comments'] . ')' : ''; ?>.
        </span>
    </div>

</div>