<?php

class VSearch
{

    private $_queryWords = array();

    public function __construct($query = null)
    {
        $this->_queryWords = explode(' ', $query);
    }

    public function createSearchQuery($additionalQuery = null)
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

    public function createParams($additionalParams = array())
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

}