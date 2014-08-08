<?php

$connect = mysql_connect('mysql15.000webhost.com','a6158264_vivek','0FF1cer');
if (!$connect) {
die('Could not connect to MySQL: ' . mysql_error());
}

$cid =mysql_select_db('a6158264_blog',$connect);
// supply your database name

$csv_file = "Book1.csv"; // Name of your CSV file
$csvfile = fopen($csv_file, 'r');
$i = 0;
while (!feof($csvfile)) {
$csv_data[] = fgets($csvfile);
$csv_array = explode(",", $csv_data[$i]);
$insert_csv = array();
$insert_csv['route_no'] = $csv_array[0];
$insert_csv['source'] = $csv_array[1];
$insert_csv['destination'] = $csv_array[2];
$query = "INSERT INTO buses(route_no,source,destination)
VALUES('".$insert_csv['route_no']."','".$insert_csv['source']."','".$insert_csv['destination']."')";
$n=mysql_query($query, $connect );
$i++;
echo $i;
}
fclose($csvfile);

echo "Success";
mysql_close($connect);
?>