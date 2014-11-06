<?php

if (isset($_GET['q']) && !$searchModel->errors)
{

    $jsonArray = array(

        'products' => array(

            'itemCount' => $products->itemCount,

            'totalItemCount' => $products->totalItemCount,

            'currentPage' => ($products->pagination->pageCount ? $products->pagination->currentPage + 1 : $products->pagination->currentPage),

            'totalPages' => $products->pagination->pageCount,

            'data' => array()

        ),

        'ingredients' => array(

            'itemCount' => $ingredients->itemCount,

            'totalItemCount' => $ingredients->totalItemCount,

            'currentPage' => ($ingredients->pagination->pageCount ? $ingredients->pagination->currentPage + 1 : $ingredients->pagination->currentPage),

            'totalPages' => $ingredients->pagination->pageCount,

            'data' => array()

        )

    );

    foreach ($products->data as $product)
    {
        $tempArray = array();

        foreach ($product as $key => $value)
            $tempArray[$key] = $value;

        $jsonArray['products']['data'][] = $tempArray;
    }

    foreach ($ingredients->data as $ingredient)
    {
        $tempArray = array();

        foreach ($ingredient as $key => $value)
            $tempArray[$key] = $value;

        $jsonArray['ingredients']['data'][] = $tempArray;
    }

}

else
    $jsonArray = null;

echo json_encode($jsonArray);
