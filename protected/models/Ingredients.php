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

    public function search()
    {
        $criteria = new CDbCriteria();

        $criteria->compare('id', $this->id, true);

        $criteria->compare('name', $this->name, true);

        $criteria->compare('e_number', $this->e_number, true);

        return new CActiveDataProvider('Ingredients', array(

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