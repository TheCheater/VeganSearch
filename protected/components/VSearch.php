<?php

class VSearch
{

    private $_query = null;
    private $_queryWords = array();

    public function __construct($query = null)
    {
        $this->_query = $query;
        $this->_queryWords = explode(' ', $this->_query);
    }

    private function createSearchQuery($additionalQuery = null)
    {
        $searchQuery = null;

        $tempNumber = 0;
        foreach ($this->_queryWords as $value)
        {
            $searchQuery .= ($tempNumber ? ' AND ' : '') . 'name LIKE :' . $tempNumber;
            $tempNumber++;
        }

        if ($additionalQuery)
            $searchQuery .= ' ' . $additionalQuery;

        return $searchQuery;
    }

    private function createParams($additionalParams = array())
    {
        $tempArray = array();

        $tempNumber = 0;
        foreach ($this->_queryWords as $value)
        {
            $tempArray[':' . $tempNumber] = '%' . $value . '%';
            $tempNumber++;
        }

        foreach ($additionalParams as $key => $value)
            $tempArray[':' . $key] = $value;

        return $tempArray;
    }

    /* Products search */

    public function productSearchQuery()
    {
        return $this->createSearchQuery('OR barcode = :barcode');
    }

    public function productSearchParams()
    {
        return $this->createParams(array(
            'barcode' => $this->_query
        ));
    }

    /* Ingredients search */

    public function ingredientSearchQuery()
    {
        return $this->createSearchQuery('OR e_number LIKE :eNumber');
    }

    public function ingredientSearchParams()
    {
        return $this->createParams(array(
            'eNumber' => '%' . str_replace(array('E', 'e'), '', $this->_query) . '%'
        ));
    }

}