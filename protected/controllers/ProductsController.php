<?php

class ProductsController extends VController
{

    public function actionView()
    {
        $product = Products::model()->find(array(
            'condition' => 'url = :url',
            'params' => array(
                ':url' => Yii::app()->request->getParam('url')
            )
        ));

        if (!$product)
            throw new CHttpException(404, 'המוצר לא נמצא.');

        $this->pageTitle = Yii::app()->name . ' - ' . $product['name'] . ' (' . $product['barcode'] . ')';
        $this->pageDescription = 'גלו האם ' . $product['name'] . ' הוא טבעוני או לא.';
        $this->pageKeywords = $product['name'];

        $this->render('view', array(
            'product' => $product
        ));
    }

}