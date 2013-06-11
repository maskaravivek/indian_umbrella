<?php
$name = $_POST['name'];
$profession=$_POST['profession'];
$org=$_POST['org'];
$email = $_POST['email'];
$city=$_POST['city'];
$contact=$_POST['contact'];
$fp = fopen("formdata.txt", "a");
$past="S.no.\tDabate type\tIssue\tOrganizer\tParticipants\tResult\n";
$c=$_POST['id'];
$count=(int)$c;
for( $i = 1; $i <= $count; $i++ )
{
    $debate = $_POST['debate'.$i];
    $issue = $_POST['issue'.$i];
    $org = $_POST['org'.$i];
    $parti = $_POST['parti'.$i];
    $res = $_POST['res'.$i];
	$past=$past.$i."\t".$debate."\t".$issue."\t".$org."\t".$parti."\t".$res."\n";
}
$arg=$_POST['arg'];
$savestring = "Name:".$name."\nProfession:".$profession."\nOrganization:".$org."\nCity:".$city."\nContact number:".$contact."\nEmail:".$email."\nPast Experiences of debates won/participated\n\n".$past."\n\nArgument:\n";
fwrite($fp, $savestring);
fwrite($fp,$arg);
fwrite($fp,"\n\n\n");
fclose($fp);
echo "<h1>You response has been recorded!</h1>";
?>