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

    public function search()
    {
        $criteria = new CDbCriteria();

        $criteria->compare('id', $this->id, true);

        $criteria->compare('sender', $this->sender, true);

        $criteria->compare('datetime', $this->datetime, true);

        $criteria->compare('about', $this->about, true);

        return new CActiveDataProvider('Messages', array(

            'criteria' => $criteria,

            'sort' => array(
                'defaultOrder' => 'id DESC'
            ),

            'pagination' => array(
                'pageSize' => 20
            )

        ));
    }

}