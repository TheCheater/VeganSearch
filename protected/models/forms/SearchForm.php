<?php

class SearchForm extends CFormModel
{

    public $q;

    public function attributeLabels()
    {
        return array(
            'q' => 'טקסט החיפוש'
        );
    }

    public function rules()
    {
        return array(

            // Length
            array('q', 'length', 'max' => 255,
                'tooLong' => 'המקסימום הוא 255 תווים.')

        );
    }

}