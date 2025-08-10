<?
$jskeysfile = "js/all-stores-list.js";
$jskeys = fopen($jskeysfile, 'w') or die("can't open file");
$db = new DB();
$res = $db->ExecuteQuery("select storename from stores  where status!='DEL' order by storename ASC") or die(mysql_error());
$total= mysql_num_rows($res); 
$keys = "$('#query').typeahead({ local: [";
fwrite($jskeys, $keys);
$cnt = 0;
while ($a = mysqli_fetch_array($res)){
if($cnt==$total-1){$keys = '"'.$a[storename].'"';}else{$keys = '"'.$a[storename].'",';}
fwrite($jskeys, $keys);
$cnt++;}
$keys = ']});';
fwrite($jskeys, $keys);
fclose($jskeys);
?>