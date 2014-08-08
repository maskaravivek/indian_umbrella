<?php

 include ("dbc.php");
 include ("product_functions.php");
 header("Content-type: text/xml");
 echo "<?xml version=\"1.0\" ?>\n";
//Basic form check
        if(isset($_REQUEST['page_stores']))
		{
			$page_stores=$_REQUEST['page_stores'];
			$page_limit_store=$page_stores*10;
		}
		else
		$page_limit_store=0;
		if(isset($_REQUEST['page_products']))
		{
		 $page_products=$_REQUEST['page_products'];
		 $page_limit_products=$page_products*10;
        }
		else
		$page_limit_products=0;
		
		if (isset($_REQUEST['q']) && isset($_REQUEST['circle']))
		{ 
			if(!empty($_REQUEST['q']) && !empty($_REQUEST['circle'])){
				$query_result = array();
				
				$query_text2 = strip_tags(trim(htmlentities($_GET['q'])));
				$tokens =  array();
				$tokens = preg_split("/[\s,]+/", $query_text2);
				$circ = $_REQUEST["circle"] ;
				
				$lat=$_REQUEST['latitude'];
				$lon=$_REQUEST['longitude'];
				$query_result = search_build2($tokens,$query_text2);//product and location
				
			}
		}
  

     //------- Second Search Function For Products and Location---------
function search_build2($query_string,$query_text)
{ 
$flag = 0 ; // A variable to decide whether to loop or not
 $key = -1;
  
$final_values = array('pr_name'=>array(),'location'=>'','short_address'=>array(),'item'=>array());

	$query6 = mysql_query("SELECT * FROM `products` WHERE `name`='$query_text' AND `status`=1");
	       if(mysql_num_rows($query6)>0)
		  {   
		     $flag=1;
		     
		  	while($pr_id = mysql_fetch_array($query6))
		              {   
		                     $product_id=$pr_id['product ID'];
		                 $final_values['item'][] = $product_id;
		                     
		              }
									
                  return $final_values;
                    }
                 else 
                 {   
                    $query4 = mysql_query("SELECT * FROM `products` WHERE `category`='$query_text' AND `status`=1");
						if(mysql_num_rows($query4)>0)
					          {         $flag=1;
									   
										while($pr_id = mysql_fetch_array($query4))
		                                 				{  
		                                 					$product_id=$pr_id['product ID'];
		                                
		                                                                        $final_values['item'][] = $product_id;
		                                                                 }
		                                                                 
		   $query1 = mysql_query("SELECT * FROM `parent retailers` WHERE `store name` LIKE '%$query_text%' AND `status`=1");
							if(mysql_num_rows($query1)>0)
							{        
							        
					                     while($pr_name = mysql_fetch_array($query1))
									
						                   { $final_values['pr_name'][] = $pr_name['parent retailer ID'];}
									
									
							}                    
		                                                                 
		                                                                 				
								         
					           return $final_values;
					           }
								
							
						          else
						            {   //Similarly for subcategory
			$query4 = mysql_query("SELECT * FROM `products` WHERE `subcategory`='$query_text' AND `status`=1");
							      if(mysql_num_rows($query4)>0)
									{         $flag=1;
										while($pr_id = mysql_fetch_array($query4))
		                                 				{  
		                                 					$product_id=$pr_id['product ID'];
		                                
		                                                                        $final_values['item'][] = $product_id;
		                                                                 } 
		                                                                 
		                                                $query1 = mysql_query("SELECT * FROM `parent retailers` WHERE `store name` LIKE '%$query_text%'");
							          if(mysql_num_rows($query1)>0)
							                 {        
							        
					                                while($pr_name = mysql_fetch_array($query1))
									
						                             { $final_values['pr_name'][] = $pr_name['parent retailer ID'];}
									
									
							                    }                                      
		                                                                 
					     				     return $final_values;  
					     				}
					     				
						  
						               else
						                   {   //Similarly for manufacturer
			$query4 = mysql_query("SELECT * FROM `products` WHERE `manufacturer`='$query_text' AND `status`=1");
	                                             			if(mysql_num_rows($query4)>0)
									{         $flag=1;
										while($pr_id = mysql_fetch_array($query4))
		                                 				{  
		                                 					$product_id=$pr_id['product ID'];
		                                
		                                                                        $final_values['item'][] = $product_id;
		                                                                 }
		                                                            $query1 = mysql_query("SELECT * FROM `parent retailers` WHERE `store name` LIKE '%$query_text%'");
							                    if(mysql_num_rows($query1)>0)
							                      {        
							        
					                                          while($pr_name = mysql_fetch_array($query1))
									
						                         { $final_values['pr_name'][] = $pr_name['parent retailer ID'];}
									
									
							                      }                         
		                                                                 
		                     		                           return $final_values;
									} 
										
						                   }
						                }  
						         
		     	         
	                }      
       //To Check Till Where The Product Name Lasts							
      
        
             $type=1;
             $str="";
             $identify=0;
             $fin_val=array();
                
foreach($query_string as $a)
{
	trim($a);
	if($str=="")
		$str = $str . $a;
	else
		$str = $str . " " . $a;
	$query5 = mysql_query("SELECT * FROM `parent retailers` WHERE `store name` LIKE '%$str%'");
	if(mysql_num_rows($query5)==0)
	{
		$query6 = mysql_query("SELECT * FROM `products` WHERE `name` LIKE '%$str%' AND `status`=1");
		if(mysql_num_rows($query6)>0) {
			$type=1;
			$flag=1;
			while($pr_id = mysql_fetch_array($query6))
                   {  
                       $product_id=$pr_id['product ID'];
                       
                       $final_values['item'][] = $product_id;
                    }
           
               
               
           }            
 else 
   {   
     $final_values['item'] = $keywords;  
       
   
$flag=0; 
$identify = $a;
$key = array_search ($identify, $query_string);
       break;
           }
                  }
                  else
                  {
                  break;
                  }
     $keywords = $final_values['item'];       
     unset($final_values['item']);

 }
   $final_values['item'] = $keywords; 
 
												
if(!$flag)					
  {  $str="";
	foreach($query_string as $k => $a)
	    {  
	         if($k<$key)
		     continue;
					
		  trim($a);
			        //Query for Store name	
				$query1 = mysql_query("SELECT * FROM `parent retailers` WHERE `store name` LIKE '%$a%'");
							if(mysql_num_rows($query1)>0)
							{        
							        
								    while($pr_name = mysql_fetch_array($query1))
									
									{ $final_values['pr_name'][] = $pr_name['parent retailer ID'];}
									
									continue;
							}       
		               //Query for Address 1.State
			       $query2 = mysql_query("SELECT * FROM `stores` WHERE `state` LIKE '%$a%' AND `status`='1' ");
							if(mysql_num_rows($query2)>0)
							{ 
									$location_circle = mysql_fetch_array($query2);
									$final_values['location'] = $location_circle['state'];
									
									continue;
							}
							else
							{             //Query for Address 2.City
				$query2 = mysql_query("SELECT * FROM `stores` WHERE `city` LIKE '%$a%' AND `status`='1'");
									if(mysql_num_rows($query2)>0)
									{
										$location_city = mysql_fetch_array($query2);
										$final_values['location'] = $location_city['city'];
										continue;
									}
									else
									{   //Query for Address 3.Circle
				$query2 = mysql_query("SELECT * FROM `stores` WHERE `circle` LIKE '%$a%' AND `status`='1'");
									   if(mysql_num_rows($query2)>0)
									     {
									        $location_state = mysql_fetch_array($query2);
										$final_values['location'] = $location_state['circle'];
										continue;
									     }
									}
							}
					                      //Query For Short Address
					                      
				$query3 = mysql_query("SELECT * FROM `stores` WHERE `short address` LIKE '%$a%' AND `status`='1'");
					   if(mysql_num_rows($query3)>0)
						{     if($str=="")
		                                         $str = $str . $a;
		                                        else
		                                         $str = $str . " " . $a;
						$query3 = mysql_query("SELECT * FROM `stores` WHERE `short address` LIKE '%$str%' AND `status`='1'");
							if(mysql_num_rows($query3)>0)
							{
							     while($short_address  = mysql_fetch_array($query3))
								   { 
									 
							            $final_values['short_address'][]=$short_address['short address'];			       
								    }  
							       continue;
							   }    
					        }
							  //Query For Product Category
				$query4 = mysql_query("SELECT * FROM `products` WHERE `category` LIKE '%$a%' AND `status`=1");
							if(mysql_num_rows($query4)>0)
									{       
										while($pr_id = mysql_fetch_array($query4))
		                                 				{  
		                                 					$product_id=$pr_id['product ID'];
		                                
		                                                                        $final_values['item'][] = $product_id;
		                                                                 }				
								         
								               continue;
								         }
								
							
						          else
						            {   //Similarly for subcategory
						                $query4 = mysql_query("SELECT * FROM `products` WHERE `subcategory` LIKE '%$a%' AND `status`=1");
							       if(mysql_num_rows($query4)>0)
									{        
										while($pr_id = mysql_fetch_array($query4))
		                                 				{  
		                                 					$product_id=$pr_id['product ID'];
		                                
		                                                                        $final_values['item'][] = $product_id;
		                                                                 } 
					     				        continue;
					     				}
					     				
						  
						               else
						                   {   //Similarly for manufacturer
					   $query4 = mysql_query("SELECT * FROM `products` WHERE `manufacturer` LIKE '%$a%' AND `status`=1");
	                                             			if(mysql_num_rows($query4)>0)
									{        
										while($pr_id = mysql_fetch_array($query4))
		                                 				{  
		                                 					$product_id=$pr_id['product ID'];
		                                
		                                                                        $final_values['item'][] = $product_id;
		                                                                 }
		                     		                            continue;
									} 
										
						                   }
						                }  
							
					}
				   } 
				
					
	 			
return $final_values;
}

/************************************************SEARCH BUILD FUNCTION ENDS*************************************************************************/



//Display function ****************

function display1($rows2)
{  
    $radd=(strlen($rows2['address line 1'].", ". $rows2['address line 2'])>150)?substr(($rows2['address line 1'].", ". $rows2['address line 2']),0,150)."...":$rows2['address line 1'].", ". $rows2['address line 2'];
            $R_address=$radd."<br>".$rows2['city'].", ".$rows2['state']." - ".$rows2['pincode'];
            $R_ID_fxd=$rows2['ID'];
            $R_ID=$rows2['store ID'];
            $R_lat=$rows2['latitude'];
            $R_long=$rows2['longitude'];
            $R_short_address=$rows2['short address'];
            $PR_id = $rows2['parent retailer ID'];
            
            $pr_query = mysql_query("SELECT `store name`,`category` FROM `parent retailers` WHERE `parent retailer ID`='$PR_id'");
            $row34 = mysql_fetch_array($pr_query);
            $PR_name = $row34['store name'];
			$cat = $row34['category'];
            
            $rating_query = mysql_query(" SELECT rating  FROM stores WHERE `store ID`='$R_ID'");
            $rating = mysql_fetch_array($rating_query);
            $latitude = $rows2['latitude'];
			$longitude = $rows2['longitude'];
            $distance = distance($lat,$lon,$latitude,$longitude,'K');
			
            $subs_table=$R_ID."_subscribers";
            
            
            $offer_query=mysql_query("SELECT * FROM offers WHERE `store ID`='$R_ID' AND `expired status`='0' AND `deleted status`='0'");
            $num_offer=mysql_num_rows($offer_query);
            
            $reviews_query=mysql_query("SELECT * FROM reviews WHERE `store ID`='$R_ID'");
            $num_reviews=mysql_num_rows($reviews_query);
			$store_link = "http://www.tokkri.com/brands/$PR_name/$R_short_address";
			
			echo "<store>\n\t";
				echo "<id>".str_replace(array('&', '<', '>', '\'', '"'), array('&amp;', '&lt;', '&gt;', '&apos;', '&quot;'), $rows2['store ID'])." </id>\n\t";
				echo "<name>".str_replace(array('&', '<', '>', '\'', '"'), array('&amp;', '&lt;', '&gt;', '&apos;', '&quot;'), $PR_name)." </name>\n\t";
				echo "<short>".str_replace(array('&', '<', '>', '\'', '"'), array('&amp;', '&lt;', '&gt;', '&apos;', '&quot;'), $rows2['short address'])." </short>\n\t";
				echo "<cat>".str_replace(array('&', '<', '>', '\'', '"'), array('&amp;', '&lt;', '&gt;', '&apos;', '&quot;'), $cat)."</cat>";
				echo "<offers>".str_replace(array('&', '<', '>', '\'', '"'), array('&amp;', '&lt;', '&gt;', '&apos;', '&quot;'), $rows2['offers'])." </offers>\n\t";
				echo "<latitude>".str_replace(array('&', '<', '>', '\'', '"'), array('&amp;', '&lt;', '&gt;', '&apos;', '&quot;'), $rows2['latitude'])." </latitude>\n\t";
				echo "<longitude>".str_replace(array('&', '<', '>', '\'', '"'), array('&amp;', '&lt;', '&gt;', '&apos;', '&quot;'), $rows2['longitude'])." </longitude>\n\t";
				echo "<rating>".str_replace(array('&', '<', '>', '\'', '"'), array('&amp;', '&lt;', '&gt;', '&apos;', '&quot;'), $rows2['rating'])." </rating>\n\t";
				echo "<distance>".str_replace(array('&', '<', '>', '\'', '"'), array('&amp;', '&lt;', '&gt;', '&apos;', '&quot;'), $distance)."</distance>\n";
			echo "</store>\n";
}

	
  function display2($rows2) 
   {
       
    $productID = $rows2['product ID'];
    $getProductDetails = new product_functions($productID);
        
	$images = $getProductDetails->getProductImages();
	$productCategory = $getProductDetails->getProductCategory();
       
       $imagesArray = explode(",",$images);
       $manufacturer = strtolower($getProductDetails->getProductManufacturer());
       
	if (!empty($imagesArray[0])) {
		$image_resized = "http://www.tokkri.com/images/products/".strtolower($productCategory)."/resized/".$manufacturer."/".$imagesArray[0];
		$image_thumb = "http://www.tokkri.com/images/products/".strtolower($productCategory)."/thumb/".$manufacturer."/".$imagesArray[0];
	}
	else {
		$image_resized = "http://www.tokkri.com/images/products/no_image_resized.jpg";
		$image_thumb = "http://www.tokkri.com/images/products/no_image_thumb.jpg";
	}

	$prod_Name = $getProductDetails->getProductName();
	$product_name_link = str_replace("/","",$prod_Name);
	$product_name_link2 = str_replace(",","",$product_name_link);

       $productName = substr($prod_Name,0,40);
	
	if ($productName !== $prod_Name)
		$productName .= "...";

       $best_price = $getProductDetails->getBestPrice();
	$product_link = "products/".strtolower(str_replace(" ","-",$productCategory))."/".strtolower(str_replace(" ","-",$manufacturer))."/".strtolower($productID)."/".str_replace($replaceChars,"",str_replace(" ","-",strtolower($product_name_link2)));
	
	$storeCountQuery = mysql_fetch_array(mysql_query("SELECT `available in` FROM `product availability` WHERE `product ID`='$productID' AND `status`='1'"));
    $storeArray = array();
	$storeArray = explode(",",$storeCountQuery['available in']);
	$storeCount = sizeof($storeArray);
	echo "<product>\n\t";
		echo "<id>".str_replace(array('&', '<', '>', '\'', '"'), array('&amp;', '&lt;', '&gt;', '&apos;', '&quot;'), $productID)." </id>\n\t";
		echo "<name>".str_replace(array('&', '<', '>', '\'', '"'), array('&amp;', '&lt;', '&gt;', '&apos;', '&quot;'), $productName)." </name>\n\t";
		echo "<logo>".str_replace(array('&', '<', '>', '\'', '"'), array('&amp;', '&lt;', '&gt;', '&apos;', '&quot;'), $image_thumb)." </logo>\n\t";
		echo "<category>".str_replace(array('&', '<', '>', '\'', '"'), array('&amp;', '&lt;', '&gt;', '&apos;', '&quot;'), $productCategory)." </category>\n\t";
		echo "<brand>".str_replace(array('&', '<', '>', '\'', '"'), array('&amp;', '&lt;', '&gt;', '&apos;', '&quot;'), $manufacturer)."</brand>\n\t";
		echo "<price>".str_replace(array('&', '<', '>', '\'', '"'), array('&amp;', '&lt;', '&gt;', '&apos;', '&quot;'), $best_price)."</price>\n";
		echo "<num>".$storeCount."</num>";
	echo "</product>\n";

   }
  
$num_retailers=0; //specific match
$num_retailers_prod = 0; //product alone match
$num_retailers_store = 0; //short address match
$num_retailers_store_loc = 0; //location match
$num_retailers_st = 0; //store name alone match

if(sizeof($query_result['pr_name'])!=0)
{ 
 //Query1-Store Name and Location Match 
if(sizeof($query_result['pr_name'])!=0 && $query_result['location']!="")
{     
   
$p1 = array(); //General Array	
      foreach($query_result['pr_name'] as $a) 
	     { 
	       $p1[]=$a; //Assigning all values this general array
	     }
    $p1 = array_map("mysql_real_escape_string", $p1);
    $p1 = "'" . implode("', '", $p1) . "'";

 $q = "SELECT * FROM `stores` WHERE `parent retailer ID` IN($p1) AND `state` LIKE '".$query_result['location']."' AND `circle`='$circ'";
 $qry1stl = mysql_query("SELECT * FROM `stores` WHERE `parent retailer ID` IN($p1) AND `state` LIKE '".$query_result['location']."' AND `circle`='$circ' AND `status`='1'");
   if(mysql_num_rows($qry1stl)==0)
     {      $q = "SELECT * FROM `stores` WHERE `parent retailer ID` IN($p1) AND `city` LIKE '".$query_result['location']."' AND `circle`='$circ' AND `status`='1' ";
            $qry1stl = mysql_query("SELECT * FROM `stores` WHERE `parent retailer ID` IN($p1) AND `city` LIKE '".$query_result['location']."' AND `circle`='$circ' AND `status`='1'");
       if(mysql_num_rows($qry1stl)==0)
{    $q = "SELECT * FROM `stores` WHERE `parent retailer ID` IN($p1) AND `circle`='$circ'";
       $qry1stl = mysql_query("SELECT * FROM `stores` WHERE `parent retailer ID` IN($p1)  AND `circle`='$circ' AND `status`='1' ");
	   if(mysql_num_rows($qry1stl)==0)
	     {
	      $num_retailers = 0;
	     }
	   else
	     {
	      $num_retailers = mysql_num_rows($qry1stl);
	     }
	 }
       else
        {
         $num_retailers = mysql_num_rows($qry1stl);
        }
     }
   else
    {       
     $num_retailers = mysql_num_rows($qry1stl);	
    }
}
//Query----Store Name And Short Address	
// $qr1sts for Store name And Address						
else if(sizeof($query_result['pr_name'])!=0 && sizeof($query_result['short_address'])!=0)
{     
      
  $p1 = array(); //General Array	
      foreach($query_result['pr_name'] as $a) 
	     { 
	       $p1[]=$a; //Assigning all values this general array
	     }
    $p1 = array_map("mysql_real_escape_string", $p1);
    $p1 = "'" . implode("', '", $p1) . "'";


  $s1 =  array();
     foreach($query_result['short_address'] as $a) 
	       { 
	         $s1[]=$a;
	        }
    $s1 = array_map("mysql_real_escape_string", $s1);
    $s1 = "'" . implode("', '", $s1) . "'"; 
  $r = "SELECT * FROM `stores` WHERE `parent retailer ID` IN($p1) AND `short address` IN($s1) AND `circle`='$circ' AND `status`='1'"; 
 $qry1sts = mysql_query("SELECT * FROM `stores` WHERE `parent retailer ID` IN($p1) AND `short address` IN($s1) AND `circle`='$circ' AND `status`='1'");
  if(mysql_num_rows($qry1sts)==0)
    {
     $num_retailers = 0;
    }
  else
    {
     $num_retailers = mysql_num_rows($qry1sts);	
    }
}

//STORE NAME MATCHING
// $qry1st For Only Store name matching
 if(sizeof($query_result['pr_name'])!=0 )
     {  
       $p1 = array(); //General Array	
      foreach($query_result['pr_name'] as $a) 
	     { 
	       $p1[]=$a; //Assigning all values this general array
	     }
    $p1 = array_map("mysql_real_escape_string", $p1);
    $p1 = "'" . implode("', '", $p1) . "'";
    $s = "SELECT * FROM `stores` WHERE `parent retailer ID` IN($p1) AND `circle`='$circ' AND `status`='1'";
    $qry1st = mysql_query("SELECT * FROM `stores` WHERE `parent retailer ID` IN($p1) AND `circle`='$circ' AND `status`='1'");
    
   if(mysql_num_rows($qry1st)==0)
     {
      $num_retailers_st = 0;
     }
   else
     { 
      $num_retailers_st = mysql_num_rows($qry1st);	
     }
     
     }
     
//$qry1p For Products    
if(sizeof($query_result['item'])!=0)
{  
    $a1 = array();
    foreach($query_result['item'] as $a)
    {
        $a1[]=$a;
    }
    $a1 = array_map("mysql_real_escape_string", $a1);
    $a1 = "'" . implode("', '", $a1) . "'";
    $c = "SELECT * FROM `products` WHERE `product ID` IN($a1) AND `status` = 1 LIMIT $page_limit_products,10";
    $qry1p = mysql_query("SELECT * FROM `products` WHERE `product ID` IN($a1)");
    if(mysql_num_rows($qry1p)==0)
    {
        
        $num_retailers_prod = 0;
        
    }
    else
    {
        $num_retailers_prod = mysql_num_rows($qry1p);
    }


}

//SHORT ADDRESS
//$qry1s for Short Address
    if(sizeof($query_result['short_address'])!=0)
      {
         $s1=array();
            foreach($query_result['short_address'] as $a)
             {
               $s1[]=$a;
             }
         $s1 = array_map("mysql_real_escape_string", $s1);
         $s1 = "'" . implode("', '", $s1) . "'";
            $t = "SELECT * FROM `stores` WHERE `short address` IN($s1) AND `circle`='$circ' AND `status`='1' ";
         $qry1s = mysql_query("SELECT * FROM `stores` WHERE `short address` IN($s1) AND `circle`='$circ' AND `status`='1'");
        
           if(mysql_num_rows($qry1s)==0)
              {
        
                $num_retailers_store = 0;
        
              }
          else
             {
                $num_retailers_store = mysql_num_rows($qry1s);
             }
}
//$query1 for location
//LOCATION MATCHING
    if($query_result['location']!="")
    {  $u = "SELECT * FROM `stores` WHERE `city` LIKE '%".$query_result['location']."%' AND `circle`='$circ' AND `status`='1'";
$query1 = mysql_query("SELECT * FROM `stores` WHERE `city` LIKE '%".$query_result['location']."%' AND `circle`='$circ' AND `status`='1'");	
          if(mysql_num_rows($query1)==0)	
                     {    $u = "SELECT * FROM `stores` WHERE `state` LIKE '%".$query_result['location']."%' AND `circle`='$circ' AND `status`='1'";
            $query1 = mysql_query("SELECT * FROM `stores` WHERE `state` LIKE '%".$query_result['location']."%' AND `circle`='$circ' AND `status`='1'");	
if(mysql_num_rows($query1)==0)
{ 
              $sl = "SELECT * FROM `stores` WHERE `circle`='$circ' AND `status`='1'";
                                      $query1 = mysql_query("SELECT * FROM `stores` WHERE `circle`='$circ' AND `status`='1'");				
			if(mysql_num_rows($query1)==0)
			{
				$num_retailers_store_loc = 0;
			}
			else
			{
				$num_retailers_store_loc = mysql_num_rows($query1);
				
			}	
		}
		else
		{
			$num_retailers_store_loc = mysql_num_rows($query1);
			
		}
	}
	else
	{
		 $num_retailers_store_loc =mysql_num_rows($query1);	
		
	}
	
    }

}
  


                  /*************PRODUCTS MATCHING DONE**************************/


else
{
//$qr1p --- Query For Product !
//Search result only For Products ! "SAMSUNG" in SAMSUNG DWARKA
if(sizeof($query_result['item'])!=0)
{   
    $a1 = array();
    foreach($query_result['item'] as $a)
    {
        $a1[]=$a;
    }
    $a1 = array_map("mysql_real_escape_string", $a1);
    $a1 = "'" . implode("', '", $a1) . "'";
    $c = "SELECT * FROM `products` WHERE `product ID` IN($a1) AND `status` = 1 LIMIT $page_limit_products,10";
    $qry1p = mysql_query("SELECT * FROM `products` WHERE `product ID` IN($a1) AND `status` = 1");
    if(mysql_num_rows($qry1p)==0)
    {
        
        $num_retailers_prod = 0;
        
    }
    else
    {
        $num_retailers_prod = mysql_num_rows($qry1p);
    }


}

//$qr1s For Short Address
// Search Result for only Matching Short Address ! "DWARKA" in Samsung DWarka
if(sizeof($query_result['short_address'])!=0)
{
    $s1=array();
    foreach($query_result['short_address'] as $a)
    {
        $s1[]=$a;
    }
    $s1 = array_map("mysql_real_escape_string", $s1);
    $s1 = "'" . implode("', '", $s1) . "'";
    
     $qry1s = mysql_query("SELECT * FROM `stores` WHERE `short address` IN($s1) AND `circle`='$circ' AND `status`='1'");
    $ss = "SELECT * FROM `stores` WHERE `short address` IN($s1) AND `circle`='$circ' AND `status`='1'";
    if(mysql_num_rows($qry1s)==0)
    {
        
        $num_retailers_store = 0;
        
    }
    else
    {
        $num_retailers_store = mysql_num_rows($qry1s);
    }
}
// $query1 for location
//Search Result for only Matching Location ! Samsung Delhi in Samsung Delhi
if($query_result['location']!="")
{ $sl = "SELECT * FROM `stores` WHERE `city` LIKE '%".$query_result['location']."%' AND `status`='1'";
$query1 = mysql_query("SELECT * FROM `stores` WHERE `city` LIKE '%".$query_result['location']."%' AND `circle`='$circ' AND `status`='1'");	
          if(mysql_num_rows($query1)==0)	
                     {	 
                                $sl = "SELECT * FROM `stores` WHERE `state` LIKE '%".$query_result['location']."%' AND `status`='1'";
                $query1 = mysql_query("SELECT * FROM `stores` WHERE `state` LIKE '%".$query_result['location']."%' AND `circle`='$circ' AND `status`='1' ");	
if(mysql_num_rows($query1)==0)
{
              $sl = "SELECT * FROM `stores` WHERE `circle`='$circ' AND `status`='1'";
                                      $query1 = mysql_query("SELECT * FROM `stores` WHERE `circle`= '$circ' AND `status`='1'");
			if(mysql_num_rows($query1)==0)
			{
				$num_retailers_store_loc = 0;
			}
			else
			{
				$num_retailers_store_loc = mysql_num_rows($query1);
				
			}	
		}
		else
		{
			$num_retailers_store_loc = mysql_num_rows($query1);
			
		}
	}
	else
	{
		 $num_retailers_store_loc =mysql_num_rows($query1);	
		
	}
	
    }	
}
      $a = array('first'=>array(), 'second'=>array(), 'third'=>array());
    if(isset($_GET["page"]))
        $page=$_GET["page"];
       else
          $page=1;
 $total_count = $num_retailers_st + $num_retailers_store + $num_retailers_store_loc  + $num_retailers ;
$num = $num_retailers + $num_retailers_prod + $num_retailers_store + $num_retailers_store_loc + $num_retailers_st ;
if($num){ 
	echo "<storesandproducts>\n\t";
if($num_retailers_prod!=0)
{   
  
   if($num_retailers_prod!=0 && $num_retailers_st!=0 )
   {     
      $s .="LIMIT $page_limit_store,10 ";
              $qry1st = mysql_query($s); 
               $qry1p = mysql_query($c); 
		echo "<products>\n\t";
         while($rows2=mysql_fetch_array($qry1p))    
             display2($rows2);
        echo "</products>\n";
		echo "<stores>\n\t";
        while($rows3=mysql_fetch_array($qry1st))   //$qry1st    
              display1($rows3);
		echo "</stores>\n";
	     
    }
   
  
 else if($num_retailers_prod!=0 && $num_retailers_store!=0 && $num_retailers_store_loc!=0)
    {   
        $a = array(); 
       
       $sl .="LIMIT $page_limit_store,10 ";
              $qry1s = mysql_query($sl); 
              $qry1p = mysql_query($c);
		echo "<products>\n\t";
        while($rows2=mysql_fetch_array($qry1p))    // $qry1p
             display2($rows2);
		echo "</products>\n"; 
		echo "<stores>\n\t";
        while($rows3=mysql_fetch_array($qry1s))   //$qry1st    
            {  $a[] = $rows3;
            display1($rows3);
                  
            }
		
			  $ss .="LIMIT $page_limit_store,10";
             
              $query1 = mysql_query($ss); 
       while($rows2=mysql_fetch_array($query1))   //$qry1st    
            {  
               if(!in_array($rows2 , $a))  
            display1($rows2);
                  
                  } 
			  
        echo "</stores>\n"; 
                  
    } 
     else if($num_retailers_prod!=0 && $num_retailers_store!=0 )
    {
              $qryp = mysql_query($c);
		echo "<products>\n\t";
       while($rows2=mysql_fetch_array($qryp))    // $qry1p
             display2($rows2);
		echo "</products>\n"; 
		echo "<stores>\n\t";
		
        $ss .="LIMIT $page_limit_store,10 ";
              $qry1s = mysql_query($ss); 
        while($rows3=mysql_fetch_array($qry1s))     
              display1($rows3);
		 echo "</stores>\n";
	  
    }
    
   else if($num_retailers_prod!=0 && $num_retailers_store_loc!=0 )
    {     
              $qry1p = mysql_query($c);
			echo "<products>\n\t";
                  while($rows2=mysql_fetch_array($qry1p))    
                         display2($rows2) ;
				echo "</products>\n"; 
		echo "<stores>\n\t";
		                
                        $sl .="LIMIT $page_limit_store,10 ";
             
              $query1 = mysql_query($sl); 
			      while($rows3=mysql_fetch_array($query1))   //$query1   
                         display1($rows3);
		echo "</stores>\n";
						 		      
        
    }
    
 else 
 {
		echo "<products>\n\t";
		$qry1p = mysql_query($c); 
        while($rows2=mysql_fetch_array($qry1p))    // $qry1p
                         display2($rows2);
		echo "</products>\n";
    
   }
}
// STORE
else 
{
	echo "<stores>\n\t";
   if($num_retailers!=0)
  {
    
   if($num_retailers_store!=0 && $num_retailers_st!=0)
    { 
        
      $a = array();
     $r .="LIMIT $page_limit_store,10 ";
             
              $qry1sts = mysql_query($r);
               while($rows2=mysql_fetch_array($qry1sts))
               {    $a[] = $rows2;
                   display1($rows2) ;
    
                }  $s .="LIMIT $page_limit_store,10 ";
              $qry1st = mysql_query($s);
                while($rows2=mysql_fetch_array($qry1st))

		       { 	
		            if(!in_array($rows2 , $a))  
		              { $a[] = $rows2;
		               display1($rows2); 
		              }
									
			}
			  $t .="LIMIT $page_limit_store,10 ";
              $qry1s = mysql_query($t);
                 while($rows3=mysql_fetch_array($qry1s))
                 {
                     if(!in_array($rows3 , $a))
		                display1($rows3);
                   }
               
       
    } 
  
   else
   {
   if($num_retailers_store_loc!=0 && $num_retailers_st!=0)
    { $a = array(); 
      $q .="LIMIT $page_limit_store,10";
              $qry1stl = mysql_query($q); 
     while($rows2=mysql_fetch_array($qry1stl))
               {   $a[] = $rows2;
                   display1($rows2);
    
                }
                $s .="LIMIT $page_limit_store,10 ";
              $qry1st = mysql_query($s);
      while($rows3=mysql_fetch_array($qry1st)) 

		       {  
		      if(!in_array($rows3 , $a))
		                display1($rows3); 
		                
		      }    $u .="LIMIT $page_limit_store,10";
              $query1 = mysql_query($u);          
                while($rows3=mysql_fetch_array($query1)) 

		       {  
		      if(!in_array($rows3 , $a))
		                display1($rows3); 
		                
		      }
     
      
       
     
     }
   }
  }
else
{
   if($num_retailers_st!=0)
     {
     $s .="LIMIT $page_limit_store,10 ";
              $qry1st = mysql_query ($s);
     while($rows2=mysql_fetch_array($qry1st))
               {   
                   display1($rows2);
    
                }  
      
        
         
         

              
 
          
     }
   if($num_retailers_store!=0) 
     {  if($ss)
        { $ss .=" LIMIT $page_limit_store,10 ";
              $qry1s = mysql_query ($ss);
        while($rows2=mysql_fetch_array($qry1s))
               { 
                   display1($rows2);
    
                }  }
        else {
        $t .=" LIMIT $page_limit_store,10 ";
             
              $qry1s = mysql_query ($t);
        while($rows2=mysql_fetch_array($qry1s))
               { 
                   display1($rows2);
    
                }  }
         
      

        }           
          
    
    if($num_retailers_store_loc!=0)
   {
    
   $sl .="LIMIT $page_limit_store,10 ";
              $query1 = mysql_query ($sl);  
    while($rows2=mysql_fetch_array($query1)) // working fine
               { 
                   display1($rows2);
    
                }  
         
    } 
} 
	echo "</stores>\n";
             }
	
	echo "</storesandproducts>";				
} 
function distance($lat1, $lon1, $lat2, $lon2, $unit) { 
	$theta = $lon1 - $lon2; 
	$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)); 
	$dist = acos($dist); 
	$dist = rad2deg($dist); 
	$miles = $dist * 60 * 1.1515;
	$unit = strtoupper($unit);
 
	if($unit == "K")
	{
		return ($miles * 1.609344); 
	}
	elseif($unit == "N") {
		return ($miles * 0.8684);
	}
	else
	{
		return $miles;
	}
}
?>
	