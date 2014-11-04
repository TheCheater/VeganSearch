<?php

class Ingredients extends CActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'ingredients';
    }

    public function primaryKey()
    {
        return 'id';
    }

}