<?php

class recommendationController
{

    var $limit = 10;
    public function __construct(){

    }

    public function addToSession($productID){
        if (!isset($_SESSION['recentlyViewed'])) {
            $viewArray = array();
        }else{
            $viewArray = $_SESSION['recentlyViewed'];

            if($this->limit > 0 && $this->countViewed() >= $this->limit) {
                $count = $this->countViewed() - $this->limit;
                for ($i = 0; $i <= $count; $i++) {
                    array_shift($viewArray);
                }
            }
        }
        if(!($key = array_search($productID, $viewArray)) !== false){
        array_push($viewArray, $productID);
        }
        $_SESSION['recentlyViewed'] = $viewArray;
    }

    public function countViewed(){
        $count = count($_SESSION['recentlyViewed']);
        return $count;
    }

    public function selectRecommended($categoryID, $productID){
        $recommended = array();
        if(isset($_SESSION['recentlyViewed'])){
            $viewArray = $_SESSION['recentlyViewed'];
            foreach ($viewArray as $val) {
                if(!in_array($val, $recommended)){
                array_push($recommended, $val);
                }
            }
        }
        $values = array('categoryID' => $categoryID);
        $db = new dbController();
        $related = $db->boundQuery("SELECT productID FROM product WHERE categoryID = :categoryID", $values, 'fetchAll', NULL);
        foreach ($related as $key) {
            if(!in_array($key['productID'], $recommended)){
                array_push($recommended, $key['productID']);
            }
        }
        if (count($recommended) <= 4) {
            $allProd = $db->boundQuery("SELECT productID FROM product", NULL, 'fetchAll', NULL);
            foreach ($allProd as $key) {
                if(!in_array($key['productID'], $recommended)){
                    array_push($recommended, $key['productID']);
                }
            }
        }
        unset($recommended[array_search($productID, $recommended)]);
        $recommended = array_values($recommended);
        shuffle($recommended);
        $recommended = array_slice($recommended, 0, 3);
        return $recommended;
    }
}