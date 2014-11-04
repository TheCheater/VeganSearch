<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title><?php echo $this->pageTitle; ?></title>
    <meta name="description" content="<?php echo $this->pageDescription; ?>" />
    <meta name="keywords" content="<?php echo $this->pageKeywords; ?>" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="/static/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/static/css/global.css" rel="stylesheet" />
    <link rel="shortcut icon" href="/static/images/favorite.ico" />
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-56378252-1', 'auto');
        ga('send', 'pageview');

    </script>
</head>

<body>

<div class="container">

    <header id="header" class="text-center">

        <div id="website-title"><?php echo CHtml::link(Yii::app()->name, '/'); ?></div>

        <div id="website-subtitle">מנוע החיפוש לטבעונים</div>

    </header>

    <div id="content">

        <?php echo $content; ?>

    </div>

    <footer id="footer">

        <p>כל הזכויות שמורות <?php echo Yii::app()->name; ?> © 2014</p>

        <p>
            <?php echo CHtml::link('תנאי השימוש', array('site/terms')); ?> ·
            <?php echo CHtml::link('צור קשר', array('site/contact')); ?>
        </p>

    </footer>

</div>

</body>

</html>