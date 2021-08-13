<?php
    require_once '../../models/database.php';
    
    function searchProduct($name)
	{
		$query="SELECT * FROM product WHERE name='$name' AND status='active'";
		$product=get($query);
		return $product;
    }

    function getAllProduct()
	{
		$query ="SELECT * FROM product WHERE status='active'";
		$prd = get($query);
		return $prd;	
    }

	function getAllHistory()
	{
		$query ="SELECT * FROM purchase_history";
		$history = get($query);
		return $history;	
    }


?>