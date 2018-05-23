<?php
class paginationController
{

    var $data;
    var $currentPage;

    function paginate($values, $perPage) {
        $totalValues = count($values);

        if(isset($_GET['pager'])){
            $currentPage = $_GET['pager'];
        }else {
            $currentPage = 1;
        }
        $counts = ceil($totalValues / $perPage);
        $param1 = ($currentPage -1) * $perPage;
        $this->data = array_slice($values,$param1, $perPage);

        for($x=1; $x <= $counts; $x++){
            $numbers[] = $x;
        }
        if(isset($numbers)) {
        return $numbers;
        } else {
            throw new Exception('You search returned no results, please try something else.');
        }
    }

    function fetchResult() {
        $resultsValues = $this->data;
        return $resultsValues;
    }
}
