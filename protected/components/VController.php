<?php

class VController extends CController
{

    private $_pageDescription;
    private $_pageKeywords;

    /* Description */

    public function getPageDescription()
    {
        if ($this->_pageDescription != null)
            return $this->_pageDescription;
        else
            return 'VeganSearch מאפשר לכם לחפש מוצרים (לפי השם או הברקוד) בתוך מאגר ענק ולגלות האם המוצרים טבעוניים או לא.';
    }

    public function setPageDescription($value)
    {
        $this->_pageDescription = $value;
    }

    /* Keywords */

    public function getPageKeywords()
    {
        if ($this->_pageKeywords != null)
            return $this->_pageKeywords;
        else
            return 'מוצרים טבעוניים, טבעוני, טבעונים, לא טבעוניים';
    }

    public function setPageKeywords($value)
    {
        $this->_pageKeywords = $value;
    }

}