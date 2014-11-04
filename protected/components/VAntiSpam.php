<?php

class VAntiSpam
{

    // Checks if enough time passed since the last time the user has done this action.
    // If not enough time passed the function returns boolean(true).
    public static function checkAntiSpam($action, $time)
    {
        if (Yii::app()->session['last' . ucfirst($action)] > time() - $time)
            return true;
        else
            return false;
    }

    // Updates the time of the last time the user has done some action.
    public static function updateAntiSpam($action)
    {
        Yii::app()->session['last' . ucfirst($action)] = time();
    }

}