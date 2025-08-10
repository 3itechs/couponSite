<?php 
define("DBHOST","localhost");
define("DATABASE","kscoupon_maindb");
define("DB_USER","kscoupon_mainu");
define("DB_PWD","[m[#v*LJiNlL");
define('DOMAIN', 'https://www.kscoupon.com'); 


$con = mysqli_connect("localhost", DB_USER, DB_PWD, DATABASE);

if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }

   
 mysqli_select_db($con, DATABASE);
   
//echo $lastmod_date; die;
define(SITEMAP_FILE,"../sitemap.xml.gz");
define(SITEMAP_EXPIRE,3600); //seconds


//if (time()>(filemtime(SITEMAP_FILE)+SITEMAP_EXPIRE)){ 
	generateSitemap($con);// the sitemap is expired then generates it
//}
//die('OUT');
function generateSitemap($con){//generates the sitemap returns the xml
    $lastmod_date=date('Y-m-d');
	$file=SITEMAP_FILE;
    $_xml ="<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\r\n";
$_xml.="<urlset xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\" xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\r\n";
 
//to add url's:	
//$sql = "select store_id,store_url, country from stores where 1  order by storename ";
$result = mysqli_query($con,"select store_id,store_url, country from stores where 1  order by storename ") or die(mysqli_error());
while($row = mysqli_fetch_array($result)){
	$store_url=$row["store_url"];
	$_xml.=makeUrlTag (DOMAIN."/coupons/".$store_url, $lastmod_date."", "weekly", "0.5");
  } 
 
	$_xml.="</urlset>";
    
	$file2= fopen("../sitemap.xml", "w") ;
	fwrite($file2, $_xml);
	fclose($file2);
	
	
	
	if (file_exists($file))  unlink ($file);
	$gzdata = gzencode($_xml, 9);
        $fp = fopen($file, "w");
        fwrite($fp, $gzdata);
        fclose($fp);
 
	return $_xml;
}

function makeUrlString ($urlString) {
    return htmlentities($urlString, ENT_QUOTES, 'UTF-8');
}
 
function makeIso8601TimeStamp ($dateTime) {
    if (!$dateTime) {
        $dateTime = date('Y-m-d H:i:s');
    }
    if (is_numeric(substr($dateTime, 11, 1))) {
        $isoTS = substr($dateTime, 0, 10) ."T"
                 .substr($dateTime, 11, 8) ."+00:00";
    }
    else {
        $isoTS = substr($dateTime, 0, 10);
    }
    return $isoTS;
}
 
function makeUrlTag ($url, $modifiedDateTime, $changeFrequency, $priority) {
    GLOBAL $newLine;
    GLOBAL $indent;
    GLOBAL $isoLastModifiedSite;
    $urlOpen = "$indent<url>$newLine";
    $urlValue = "";
    $urlClose = "$indent</url>$newLine";
    $locOpen = "$indent$indent<loc>";
    $locValue = "";
    $locClose = "</loc>$newLine";
    $lastmodOpen = "$indent$indent<lastmod>";
    $lastmodValue = "";
    $lastmodClose = "</lastmod>$newLine";
    $changefreqOpen = "$indent$indent<changefreq>";
    $changefreqValue = "";
    $changefreqClose = "</changefreq>$newLine";
    $priorityOpen = "$indent$indent<priority>";
    $priorityValue = "";
    $priorityClose = "</priority>$newLine";
 
    $urlTag = $urlOpen;
    $urlValue     = $locOpen .makeUrlString("$url") .$locClose;
    if ($modifiedDateTime) {
     $urlValue .= $lastmodOpen .$modifiedDateTime.$lastmodClose;
   //  if (!$isoLastModifiedSite) { // last modification of web site
     //    $isoLastModifiedSite = makeIso8601TimeStamp($modifiedDateTime);
    // }
    }
    if ($changeFrequency) {
     $urlValue .= $changefreqOpen .$changeFrequency .$changefreqClose;
    }
    if ($priority) {
     $urlValue .= $priorityOpen .$priority .$priorityClose;
    }
    $urlTag .= $urlValue;
    $urlTag .= $urlClose;
    return $urlTag;
}
?>

