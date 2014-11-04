<div class="text-center">

    <h1>שגיאה <?php echo $error['code']; ?></h1>

    <h3>
        <?php
        switch ($error['code'])
        {
            case 400:
                echo 'בקשה לא תקינה';
                break;

            case 403:
                echo 'הגישה נדחתה';
                break;

            case 404:
                echo 'העמוד לא קיים';
                break;

            case 500:
                echo 'שגיאה שרת';
                break;

            case 503:
                echo 'השירות אינו זמין';
                break;

            default:
                echo 'שגיאה לא מוכרת';
                break;
        }

        if ($error['message'])
            echo ' - ' . $error['message'];
        ?>
    </h3>

</div>