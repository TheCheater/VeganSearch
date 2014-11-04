<?php

$this->widget('zii.widgets.CListView', array(
    'id' => 'ingredients-results',
    'dataProvider' => $ingredients,
    'itemView' => '_ingredientResult',
    'template' => '{items}{summary}{pager}',
    'emptyText' => '<p class="search-results-empty">לא נמצאו רכיבים.</p>',
    'pager' => array(
        'header' => false
    )
));

foreach ($ingredients->data as $data)
    if ($data['is_vegan'] == 2) {
        echo '<p class="search-results-information">* קיימים מספר מקורות מהם ניתן לייצר את המרכיב, חלקם מן הצומח וחלקם מן החי.</p>';
        break;
    }

?>