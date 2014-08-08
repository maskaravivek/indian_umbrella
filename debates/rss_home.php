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
      $rss_split[] = '<li><a href="'.$link.'">'.$title.'</a></li>';
    }
    return $rss_split;
  }



  function display($numrows,$head) 
  {
    $rss_split = $this->parse();
    $i = 0;
    $rss_data = '<li class="oe_heading">'.$head.'</li>';
    while ( $i < $numrows ) 
	{
      $rss_data .= $rss_split[$i];
      $i++;
    }
    $trim = str_replace('', '',$this->feed);
    $user = str_replace('&lang=en-us&format=rss_200','',$trim);
  
         
	  
    return $rss_data;
  }
}
?>