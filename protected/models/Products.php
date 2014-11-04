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

    public function search()
    {
        $criteria = new CDbCriteria();

        $criteria->compare('id', $this->id, true);

        $criteria->compare('name', $this->name, true);

        $criteria->compare('barcode', $this->barcode, true);

        return new CActiveDataProvider('Products', array(

            'criteria' => $criteria,

            'sort' => array(
                'defaultOrder' => 'id DESC'
            ),

            'pagination' => array(
                'pageSize' => 50
            )

        ));
    }

}