<?php

class SearchController extends VController
{

    public function actionIndex()
    {
        $searchModel = new SearchForm();

        $products = null;
        $ingredients = null;

        $this->pageTitle = Yii::app()->name . ' - חיפוש';

        if (isset($_GET['q']))
        {
            $searchModel->q = $_GET['q'];

            if ($searchModel->validate())
            {
                $searchObject = new VSearch($searchModel->q);

                $isVeganQuery = null;
                if (isset($_GET['isVegan']))
                    switch ($_GET['isVegan'])
                    {
                        case 'false':
                            $isVeganQuery = 'AND is_vegan = 0 ';
                            break;

                        case 'true':
                            $isVeganQuery = 'AND is_vegan = 1 ';
                            break;

                        case 'maybe':
                            $isVeganQuery = 'AND is_vegan = 2 ';
                            break;
                    }

                $products = new CActiveDataProvider('Products', array(
                    'criteria' => array(
                        'condition' => $searchObject->createSearchQuery($isVeganQuery . 'OR barcode = :barcode'),
                        'params' => $searchObject->createParams(array(
                            'barcode' => $searchModel->q
                        ))
                    ),
                    'sort' => array(
                        'defaultOrder' => 'name ASC'
                    ),
                    'pagination' => array(
                        'pageSize' => 10
                    )
                ));

                $ingredients = new CActiveDataProvider('Ingredients', array(
                    'criteria' => array(
                        'condition' => $searchObject->createSearchQuery($isVeganQuery . 'OR e_number LIKE :eNumber ' . $isVeganQuery),
                        'params' => $searchObject->createParams(array(
                            'eNumber' => '%' . str_replace(array('E', 'e'), '', $searchModel->q) . '%'
                        ))
                    ),
                    'sort' => array(
                        'defaultOrder' => 'name ASC'
                    ),
                    'pagination' => array(
                        'pageSize' => 10
                    )
                ));

                if (isset($_GET['quick']))
                    if ($products->getTotalItemCount())
                        $this->redirect(Yii::app()->createUrl('products/view', array('url' => $products->data[0]['url'])));
                    elseif ($ingredients->getTotalItemCount())
                        $this->redirect(Yii::app()->createUrl('ingredients/view', array('url' => $ingredients->data[0]['url'])));

                $this->pageTitle = Yii::app()->name . ' - חיפוש: ' . $searchModel->q;
            }
        }

        if (isset($_GET['json']))
        {
            $this->layout = false;
            $this->render('json', array(
                'searchModel' => $searchModel,
                'products' => $products,
                'ingredients' => $ingredients
            ));
        }
        else
            $this->render('index', array(
                'searchModel' => $searchModel,
                'products' => $products,
                'ingredients' => $ingredients
            ));
    }

}