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

    public function selectRandomItems($categoryID){
        $recommended = array();
        if (isset($_SESSION['recentlyViewed'])) {
            $viewArray = $_SESSION['recentlyViewed'];
            $selected1 = $viewArray[rand(0, $this->countViewed()-1)];
            array_push($recommended, $selected1);

            $values = array('categoryID' => $categoryID);
            $db = new dbController();
            $selection = $db->boundQuery("SELECT productID FROM product WHERE categoryID = :categoryID", $values, 'fetchAll', NULL);
            $select2Array = array();
            foreach ($selection as $key) {
                array_push($select2Array, $key['productID']);
            }
            $selected2 = $select2Array[rand(0, count($select2Array)-1)];
            array_push($recommended, $selected2);
        }
        return $recommended;
    }

}