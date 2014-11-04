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

            // Required
            array('q', 'required'),

            // Length
            array('q', 'length', 'min' => 3, 'max' => 255,
                'tooShort' => 'המינימום הוא 3 תווים.',
                'tooLong' => 'המקסימום הוא 255 תווים.')

        );
    }

}