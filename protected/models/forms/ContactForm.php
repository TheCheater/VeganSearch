<?php

class ContactForm extends CFormModel
{

    public $email;
    public $content;

    public $sendStatus = false;

    public function attributeLabels()
    {
        return array(
            'email' => 'דואר אלקטרוני',
            'content' => 'תוכן ההודעה'
        );
    }

    public function rules()
    {
        return array(

            // Required
            array('email, content', 'required'),

            // Length
            array('email', 'length', 'max' => 255),
            array('content', 'length', 'min' => 16, 'max' => 10240),

            // Email
            array('email', 'email', 'checkMX' => true,
                'message' => 'כתובת הדואר האלקטרוני אינה תקינה.')

        );
    }

    public function afterValidate()
    {
        if (VAntiSpam::checkAntiSpam('contact', 180))
            $this->addError('content', 'אנא המתן שלוש הודעות לפני שליחת הודעה נוספת.');

        parent::afterValidate();
    }

}