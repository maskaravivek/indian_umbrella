<?php

 class rss {
	
     var $feed;

  function rss($feed) 
  
  {
    $this->feed = $feed;
	
  }
  
  
  

  function parse() 
  
  {
    $rss = simplexml_load_file($this->feed);
	
    $rss_split = array();
	
	
    foreach ($rss->channel->item as $item) {
	
	
      $title = (string) $item->title; // Title
      $link   = (string) $item->link; // Url Link
   	  $description = (string) $item->description; //Description
     	  
      $rss_split[] = '<li><div class="cbp_tmlabel1"><h2 style="font-family: \'Open Sans\', sans-serif;"><a style="color:#fff" href="'.$link.'">'.$title.'</a></h2><p style="font-family: \'Open Sans\', sans-serif;">'.$description.'</p></div></li>';
    }

       
    return $rss_split;
  }



  function display($numrows,$head) 
  {
    $rss_split = $this->parse();
    $i = 0;
    $rss_data = '<ul class="cbp_tmtimeline1">';

    while ( $i < $numrows ) 
	{
      $rss_data .= $rss_split[$i];
      $i++;
    }
    $trim = str_replace('', '',$this->feed);
    $user = str_replace('&lang=en-us&format=rss_200','',$trim);
    
	
	$rss_data.='</ul>';
  
         
	  
    return $rss_data;
  }
}
?>