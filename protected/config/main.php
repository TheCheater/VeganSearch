<?php

return array(

    'name' => 'VeganSearch',

    'sourceLanguage' => 'he',

    'timeZone' => 'Israel',

    'components' => array(

        'db' => array(
            'class' => 'CDbConnection',
            'connectionString' => 'mysql:host=localhost;dbname=databaseName',
            'username' => 'username',
            'password' => 'password',
            'charset' => 'utf8'
        ),

        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(

                // Site Controller
                'terms' => 'site/terms',
                'guide' => 'site/guide',
                'contact' => 'site/contact',
                'sitemap.xml' => 'site/sitemap',

                // Search Controller
                'search' => 'search/index',

                // Products Controller
                'product/<url>' => 'products/view',

                // Ingredients Controller
                'ingredient/<url>' => 'ingredients/view'

            )
        ),

        'errorHandler' => array(
            'errorAction' => 'site/error'
        )

    ),

    'import' => array(
        'application.models.*',
        'application.models.forms.*',
        'application.components.*'
    ),

);