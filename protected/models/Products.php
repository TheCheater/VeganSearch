<?php

class Products extends CActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'products';
    }

    public function primaryKey()
    {
        return 'id';
    }

}