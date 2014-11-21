<?php $this->widget('zii.widgets.CListView', array(
    'id' => 'products-results',
    'dataProvider' => $products,
    'itemView' => '_productResult',
    'template' => '{items}{summary}{pager}',
    'emptyText' => '<p class="search-results-empty">לא נמצאו מוצרים.</p><p class="search-results-empty">אם חיפשתם באנגלית נסו לחפש בעברית, ולהפך.</p>',
    'pager' => array(
        'header' => false
    )
)); ?>