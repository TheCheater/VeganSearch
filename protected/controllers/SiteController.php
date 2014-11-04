<?php

class SiteController extends VController
{

    public function actionIndex()
    {
        $this->pageTitle = Yii::app()->name . ' - מנוע החיפוש לטבעונים';

        $count = array(
            'products' => Products::model()->count(),
            'ingredients' => Ingredients::model()->count()
        );

        $this->render('index', array(
            'count' => $count
        ));
    }

    public function actionGuide()
    {
        $this->pageTitle = Yii::app()->name . ' - מדריך לשימוש במנוע החיפוש';

        $this->render('guide');
    }

    public function actionTerms()
    {
        $this->pageTitle = Yii::app()->name . ' - תנאי השימוש';

        $this->render('terms');
    }

    public function actionContact()
    {
        $messageAbout = array();
        $messageAboutType = null;

        if (isset($_GET['product']))
        {
            $messageAbout = Products::model()->find(array(
                'select' => 'id, url, name, barcode',
                'condition' => 'url = :url',
                'params' => array(
                    ':url' => Yii::app()->request->getParam('product')
                )
            ));

            if (!$messageAbout)
                throw new CHttpException(404, 'המוצר לא נמצא.');

            $messageAboutType = 'product';
        }
        elseif (isset($_GET['ingredient']))
        {
            $messageAbout = Ingredients::model()->find(array(
                'select' => 'id, url, name, e_number',
                'condition' => 'url = :url',
                'params' => array(
                    ':url' => Yii::app()->request->getParam('ingredient')
                )
            ));

            if (!$messageAbout)
                throw new CHttpException(404, 'הרכיב לא נמצא.');

            $messageAboutType = 'ingredient';
        }

        $contactModel = new ContactForm();

        if (isset($_POST['ContactForm']))
        {
            $contactModel->attributes = $_POST['ContactForm'];

            if ($contactModel->validate())
            {
                $message = new Messages();

                $message->sender = $contactModel->email;
                $message->content = $contactModel->content;
                $message->datetime = Yii::app()->dateFormatter->format('yyyy-MM-dd HH:mm:ss', time());

                if ($messageAbout)
                    $message->about = ($messageAboutType == 'product' ? 'product:' : 'ingredient:') . $messageAbout['id'];

                $message->save();

                VAntiSpam::updateAntiSpam('contact');

                $contactModel->sendStatus = true;
            }
        }

        $this->pageTitle = Yii::app()->name . ' - צור קשר';

        $this->render('contact', array(
            'contactModel' => $contactModel,
            'messageAbout' => $messageAbout,
            'messageAboutType' => $messageAboutType
        ));
    }

    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error)
        {
            $this->pageTitle = Yii::app()->name . ' - שגיאה';
            $this->render('error', array('error' => $error));
        }
    }

    public function actionSitemap()
    {
        $products = Products::model()->findAll(array(
            'select' => 'url, name, barcode'
        ));

        $ingredients = Ingredients::model()->findAll(array(
            'select' => 'url, name, e_number'
        ));

        $this->layout = false;

        $this->render('sitemap', array(
            'products' => $products,
            'ingredients' => $ingredients
        ));
    }

}