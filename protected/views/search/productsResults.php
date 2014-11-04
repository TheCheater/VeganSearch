<?php $this->widget('zii.widgets.CListView', array(
    'id' => 'products-results',
    'dataProvider' => $products,
    'itemView' => '_productResult',
    'template' => '{items}{summary}{pager}',
    'emptyText' => '<p class="search-results-empty">לא נמצאו מוצרים.</p>',
    'pager' => array(
        'header' => false
    )
)); ?>