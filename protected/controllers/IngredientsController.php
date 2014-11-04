<?php

class IngredientsController extends VController
{

    public function actionView()
    {
        $ingredient = Ingredients::model()->find(array(
            'condition' => 'url = :url',
            'params' => array(
                ':url' => Yii::app()->request->getParam('url')
            )
        ));

        if (!$ingredient)
            throw new CHttpException(404, 'הרכיב לא נמצא.');

        $this->pageTitle = Yii::app()->name . ' - ' . $ingredient['name'] . ($ingredient['e_number'] ? ' (E' . $ingredient['e_number'] . ')' : '');
        $this->pageDescription = 'גלו האם ' . $ingredient['name'] . ($ingredient['e_number'] ? ' (E' . $ingredient['e_number'] . ')' : '') . ' הוא טבעוני או לא.';
        $this->pageKeywords = $ingredient['name'] . ($ingredient['e_number'] ? ', E' . $ingredient['e_number'] : '');

        $this->render('view', array(
            'ingredient' => $ingredient
        ));
    }

}