<?php

class Messages extends CActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'messages';
    }

    public function primaryKey()
    {
        return 'id';
    }

}