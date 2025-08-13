<?php  ob_start(); error_reporting('0');
      $cookie_time=time()+60*60*10;
      define('COOKIETIME',$cookie_time);
	  define('SITE_NAME', 'promostrends');  
	  define('SITE_NAME_STR', 'promostrends');   
	  define('STORE_URL_CONSTANT', 'Promos/');  //  coupons/ or  voucher/	
   
	
 if(stristr($_SERVER['HTTP_HOST'],'localhost'))
    { 	
	
	define('DOMAIN', 'http://localhost/'); 
	define('DOMAINVAR', 'http://localhost/Admin');	 
 	define('IMG', 'http://localhost/m1/images');
	define('MEDIA', 'http://localhost/Admin/images');
	define('IMGPATH', $_SERVER['DOCUMENT_ROOT'].'/m1/assets/images');
	define('DOC_ROOT', $_SERVER['DOCUMENT_ROOT'].'/m1');	
	DEFINE("DB_USER_ID","root");
	DEFINE("DB_USER_PWD","");
	DEFINE("DATABASE","m1_ksdb");
	DEFINE("DBDOMAIN","localhost"); 
	 }else{ 
	 
     define('DOMAIN', 'https://www.promosplusdeals.com'); 
	define('DOMAINVAR', 'https://www.promosplusdeals.com/mirza'); 	
	define('MEDIA', 'https://www.viatorcouponcodes.com/mirza/images');	
	define('IMGPATH', $_SERVER['DOCUMENT_ROOT'].'/assets/images');
	define('DOC_ROOT', $_SERVER['DOCUMENT_ROOT']);
	
	DEFINE("DB_USER_ID","u809018165_dani");
	DEFINE("DB_USER_PWD","Kami@121");
	DEFINE("DATABASE","u809018165_dani");
	DEFINE("DBDOMAIN","localhost");
	
	}
		 
	define('SLOGO_WIDTH', '180'); 	define('SLOGO_HEIGHT', '90');
	define('SLOGO_UPLOADER',  DOC_ROOT.'/assets/images/stores/');
	define('SLOGO_PATH', '../assets/images/stores/');
		
	define('STHUMB_WIDTH', '260'); 	define('STHUMB_HEIGHT', '260');
	define('THUMB_UPLOADER', DOC_ROOT.'/assets/images/thumbs/');
	define('THUMB_PATH', '../assets/images/thumbs/');
	
	define('POST_IMG_WIDTH', '660');  define('POST_IMG_HEIGHT', '290');
	define('POST_IMG_UPLOADER', DOC_ROOT.'/assets/images/posts/');
	define('POST_IMG_PATH', '../assets/images/posts/');
	
	define('MAIN_SLIDER_UPLOADER', DOC_ROOT.'/assets/images/main_slider/');
	define('MAIN_SLIDER_PATH', '../assets/images/main_slider/');
	
	define('COUPON_SLIDER_UPLOADER', DOC_ROOT.'/assets/images/coupon_slider/');
	define('COUPON_SLIDER_PATH', '../assets/images/coupon_slider/');
	
	define('FEACH_BRAND_WIDTH', '130'); define('FEACH_BRAND_HEIGHT', '100');
	define('FEATURED_BRANDS_UPLOADER', DOC_ROOT.'/assets/images/featured_brands/');
	define('FEATURED_BRANDS_PATH', '../assets/images/featured_brands/');
	
	define('STATIC_IMG_UPLOADER', DOC_ROOT.'/assets/images/static/');
	define('STATIC_IMG_PATH', '../assets/images/static/');
	
	define('VAULT_IMG_WIDTH', '1015'); 	define('VAULT_IMG_HEIGHT', '395'); 
	define('VAULT_IMG_UPLOADER', DOC_ROOT.'/assets/images/vault_list/');  
	define('VAULT_IMG_PATH', '../assets/images/vault_list/');
	
	define('PRODUCT_IMG_WIDTH', '320'); 	define('PRODUCT_IMG_HEIGHT', '250'); 
	define('SLIDERS_UPLOADER', DOC_ROOT.'/assets/images/sliders/');
	define('SLIDERS_PATH', '../assets/images/sliders/');
	
	define('TRANSLATION_IMG_UPLOADER', DOC_ROOT.'/assets/images/translation/');
	define('TRANSLATION_IMG_PATH', '../assets/images/translation/');	
	
	define('BANNER_WIDTH', '320'); 	            define('BANNER_HEIGHT', '250');
	define('COUPON_DISCOUNT_WIDTH', '140'); 	define('COUPON_DISCOUNT_HEIGHT', '140');
	define('COUPON_BGIMG_WIDTH', '380');     	define('COUPON_BGIMG_HEIGHT', '120'); 
	define('EVENT_WIDTH', '260'); 	            define('EVENT_HEIGHT', '260');	
	define('CAT_BANNER_WIDTH', '845'); 	        define('CAT_BANNER_HEIGHT', '210');


if ( defined("DB") )
    return;
define ("DB","yes");

// Class for Connecting Database
Class DB
{
// All the local class variables
var $con;							// Holds Connection String
var $command;						// Holds Sql Command
var $errorNo;						// Holds Error Occored by SQLs
var $error =  " ERROR ";			// Holds Other Runtime Errors	
var $result;						// Holds Results from methods etc.
var $transactionStarted = false;	// ?
var $sql;							// Holds SQL Statements ?
var $debug;							// Holds Debug Mode
var $showErrors;					// Holds Error Mode ?
// A constructor to make connection with the database
function __construct()
{
$this->GetConnection();			// Make Connection
$this->showErrors = true;		// Set Error to show	
}
// Returns Database Connection 
function GetConnection()
{
global $DOMAINNAME,$text,$SERVER_ADDR;
//checks if we're running the site on local host
$this->con = mysqli_connect(DBDOMAIN, DB_USER_ID, DB_USER_PWD );
if (! $this->con)

			{

				$text = "<br><b><u>An error has occurred, in the database connection:</u></b><br>

						 <br><b>Detail Message: </b>". mysqli_error() . "<br>";

				if ( empty($DOMAINNAME) && (!defined("TESTRUN")) )

				{

					echo $text;

					ob_end_flush();

					exit();

				}

				else

				{

					ob_end_clean();



					if (! empty($HOTNAME))

					{

						$subject = "Error in database Connection. All these promo codes for [sourl] are published after a verification process, so that you can get discount on your online order as well as save time.";

						$body = $text;

						$headers = "Content-type: text/html; charset=iso-8859-1\r\n";

						$headers .= "From: " . SERVICES_EMAIL . "\r\n";

						mail (TO,$subject,$body,$headers);

					}

					$this->sendToDBSorryPage($text);

					exit();

				}

				return false;

			}

			if (!(mysqli_select_db($this->con, DATABASE)))

			{

				echo "Connection is not found";

				exit;

			}

			return true;

		}



		// executes a given query and returns a reslult set

		function ExecuteQuery($query)

		{

			global $debug;



			$this->errorNo = 0;

			$this->error = "";



			if ($this->debug)

				echo "<b>SQL:</b> $query<br>";



			$resHandle = mysqli_query($this->con, $query);

			if ($resHandle == false)

			{

				$this->errorNo = mysqli_errno();

				$this->error = mysqli_error();



				if ($this->showErrors)

					$this->ShowMySqlError($query);

				

				return false;

			}



			$this->sql = $query;

			$result = new Result($this->con, $resHandle);		

			return $resHandle;

		}
// Show MySql Errors
function ShowMySqlError($query)
{
echo "An error occurred: $query<br>";
echo mysqli_errno() . " -- " . mysqli_error();
}	
// Primary Key Voilation Error
function HasPKViolated()
{
return ($this->errorNo == ER_DUP_KEY || $this->errorNo = ER_DUP_ENTRY);
}
// close a connection from Database
function closeConnection()
{
mysqli_close($this->con);
}
// returns error
function getError()
{
return mysqli_errno();
}
function sendToDBSorryPage($error)
{
session_register($error);
header("Location: ../errorpage/errors.php?err=$error");
}

function getLastInsertId()
    {
     $id = mysqli_insert_id($this->con);
     return $id;
    }

function getTopRank($tname)
      {          		  
        $result =  mysqli_query($this->con, "SELECT max(rank) from $tname ");
        list($rnk)=mysqli_fetch_array($result );	
        return ($rnk); exit();		  
      }


function getCouponKwdRank($kid)
{          		  
$result =   mysqli_query($this->con, "SELECT max(rank) from coupon_keywords where keyword_id = '$kid' ");
list($rnk)=mysqli_fetch_array($result );	
return ($rnk); exit();		  
}
function checkTopStore($sid)
{          		  
$result =   mysqli_query($this->con, "select store_id from topstores where store_id = '$sid' ");
return mysql_num_rows($result); exit();		  
}
function checkFeaturedStore($sid)
{          		  
$result =   mysqli_query($this->con, "select store_id from featurestores where store_id = '$sid' ");
return mysql_num_rows($result); exit();		  
}
function checkRelatedKwd($kid,$rkid)
{          		  
$result =   mysqli_query($this->con, "select kwd_id from related_keywords where related_kwd_id = '$rkid' and kwd_id = '$kid' ");
return mysql_num_rows($result); exit();		  
}
function checkApprovedKwd($kid)
{		  
$result =   mysqli_query($this->con, "select store_id from store_keywords where keyword_id = '$kid' and approve = '1' ");
return mysql_num_rows($result); exit();		  
}
function checkStoreKwd($kid,$sid)
{          		  
$result =   mysqli_query($this->con, "select store_id from store_keywords where store_id = '$sid' and keyword_id = '$kid' ");
return mysql_num_rows($result); exit();		  
}
function checkStoreCountryKwd($kid,$sid)
{          		  
$result =   mysqli_query($this->con, "select store_id from store_country_keyword where store_id = '$sid' and keyword_id = '$kid' ");
return mysql_num_rows($result); exit();		  
}
function checkCouponKwd($kid,$cid)
{
$result =   mysqli_query($this->con, "select coupon_id from coupon_categories where coupon_id = '$cid' and category_id = '$kid' ");
return mysql_num_rows($result); exit();		  
}
function checkStoreOwner($id)
{ 	
$sql_get_owner= mysqli_query($this->con, "select owner from stores where store_id = '$id'") ;	  
list($owner)=mysqli_fetch_array($sql_get_owner);	
if($_COOKIE['levelid']=='1' or $_COOKIE['admin_username'] == $owner ){	 
return 1; exit();		  
}else{ 
$result =   mysqli_query($this->con, "select id from assistants where assistant = '".$_COOKIE['admin_username']."' and owner = '$owner' ");	      		
if(mysql_num_rows($result)>'0'){return 1; exit();}
}
}
function checkCouponOwner($id)
{ 
$sql_get_owner= mysqli_query($this->con, "select s.owner, from stores s, coupons c where s.store_id = c.store_id and  c.coupon_id = '$id'") ;	  
list($owner)=mysqli_fetch_array($sql_get_owner);
if($_COOKIE['levelid']=='1' or $_COOKIE['admin_username'] == $owner ){ 
return 1; exit();
}else{  		 
$result =   mysqli_query($this->con, "select id from assistants where assistant = '".$_COOKIE['admin_username']."' and owner = '$owner' ");	      		  
if(mysql_num_rows($result)>'0'){return 1; exit();  }
  }
}

 function checkViewPermission($sec)
    {  
	 if($_COOKIE['admin_username']=='admin'){return 1; exit();}
		 	 $section = $sec."_view";
			 $sql_view =  mysqli_query($this->con, "select $section from permission where admin_id = '".$_COOKIE['adminid']."' ") ;  
			 list($view)=mysqli_fetch_array($sql_view);
			 return $view; exit();
		 
    }
	
 function checkAddPermission($sec)
    {  
	 if($_COOKIE['admin_username']=='admin'){return 1; exit();}
	 $section = $sec."_add";
	 $sql_view= mysqli_query($this->con, "select $section from permission where admin_id = '".$_COOKIE['adminid']."' ") ;  
	 list($view)=mysqli_fetch_array($sql_view);
	 return $view; exit();
    }
	
function checkUpdatePermission($sec)
    {  
	 if($_COOKIE['admin_username']=='admin'){return 1; exit();}
	 $section = $sec."_update";
	 $sql_view= mysqli_query($this->con, "select $section from permission where admin_id = '".$_COOKIE['adminid']."' ") ;  
	 list($view)=mysqli_fetch_array($sql_view);
	 return $view; exit();
    }
function checkDeletePermission($sec)
    {  
	 if($_COOKIE['admin_username']=='admin'){return 1; exit();}
	 $section = $sec."_delete";
	 $sql_view= mysqli_query($this->con, "select $section from permission where admin_id = '".$_COOKIE['adminid']."' ") ;  
	 list($view)=mysqli_fetch_array($sql_view);
	 return $view; exit();
    }
function checkRemovePermission($sec)
    {  
	 if($_COOKIE['admin_username']=='admin'){return 1; exit();}
	 $section = $sec."_remove";
	 $sql_view= mysqli_query($this->con, "select $section from permission where admin_id = '".$_COOKIE['adminid']."' ") ;  
	 list($view)=mysqli_fetch_array($sql_view);
	 return $view; exit();
    }
function checkEnablePermission($sec)
    {  
	 if($_COOKIE['admin_username']=='admin'){return 1; exit();}
	 $section = $sec."_enable";
	 $sql_view= mysqli_query($this->con, "select $section from permission where admin_id = '".$_COOKIE['adminid']."' ") ;  
	 list($view)=mysqli_fetch_array($sql_view);
	 return $view; exit();
    }
function checkDisablePermission($sec)
    {  
	 if($_COOKIE['admin_username']=='admin'){return 1; exit();}
	 $section = $sec."_disable";
	 $sql_view= mysqli_query($this->con, "select $section from permission where admin_id = '".$_COOKIE['adminid']."' ") ;  
	 list($view)=mysqli_fetch_array($sql_view);
	 return $view; exit();
    }
	
 function userLog($user,$sid,$section,$action,$detail){
    $detail = addslashes($detail);
	 mysqli_query($this->con, "insert into user_action_log (user_name,store_id,action,section,detail,ip_address,added_date) values ('$user','$sid','$action','$section','$detail','".$_SERVER['REMOTE_ADDR']."',now())") ;	
	/*$myFile = "logs/".date("d-m-Y")." - user_log.txt";
	$fh = fopen($myFile, 'a') or die("can't open file");
	$stringData = $dd . " - ".$user." - ".$detail." \r\n";
	fwrite($fh, $stringData);
	fclose($fh);*/
	}
	
 function getStoreNameFromCID($coupon){
 	 $sql_sname= mysqli_query($this->con, "select s.storename from coupons c, stores s  WHERE c.store_id = s.store_id and coupon_id= '$coupon' ") ;  
	 list($sname)=mysqli_fetch_array($sql_sname);
	 return $sname; exit();
	}
	
 function getStoreNameFromSID($store){
 	 $sql_sname= mysqli_query($this->con, "select storename from stores WHERE store_id = '$store' ") ;  
	 list($sname)=mysqli_fetch_array($sql_sname);
	 return $sname; exit();
	}
	
function getStoreIDFromStoreName($sname){
 	 $sql_sname = mysqli_query($this->con, "select store_id from stores WHERE storename = '".addslashes($sname)."'") ;  
	 list($store_id) = mysqli_fetch_array($sql_sname);
	 return $store_id; exit();
	}

function getCouponTypeFromTID($type){
 	 $sql_sname = mysqli_query($this->con, "select coupontype from coupon_type WHERE type_id = '".addslashes($type)."'") ;  
	 list($coupontype) = mysqli_fetch_array($sql_sname);
	 return $coupontype; exit();
	}
	
function getCatIDFromName($catname){
 	 $sql_sname = mysqli_query($this->con, "Select category_id from categories where category = '".addslashes($catname)."'") ;  
	 list($catid)=mysqli_fetch_array($sql_sname);
	 return $catid; exit();
	}
function getCategoryFromID($catid){
 	 $sql_sname= mysqli_query($this->con, "Select category from categories where category_id = '".addslashes($catid)."'") ;  
	 list($category)=mysqli_fetch_array($sql_sname);
	 return $category; exit();
	}
	
function getPostCategoryFromID($catid){
 	 $sql_sname= mysqli_query($this->con, "Select category from post_categories where category_id = '".addslashes($catid)."'") ;  
	 list($category)=mysqli_fetch_array($sql_sname);
	 return $category; exit();
	}

function getSubCatIDFromName($subcat){
 	 $sql_sname= mysqli_query($this->con, "Select category_id from subcategories where category = '".addslashes($subcat)."'") ;  
	 list($subcatid)=mysqli_fetch_array($sql_sname);
	 return $subcatid; exit();
	}
function getSubCategoryFromID($subcatid){
 	 $sql_sname= mysqli_query($this->con, "Select category from subcategories where category_id = '".addslashes($subcatid)."'") ;  
	 list($subcatname)=mysqli_fetch_array($sql_sname);
	 return $subcatname; exit();
	}

function getTagIDFromName($tagname){
 	 $sql_sname= mysqli_query($this->con, "select tag_id from tags WHERE tag = '".addslashes($tagname)."'") ;  
	 list($tagid)=mysqli_fetch_array($sql_sname);
	 return $tagid; exit();
	}
function getTagFromID($tagid){
 	 $sql_sname= mysqli_query($this->con, "select tag from tags WHERE tag_id = '".addslashes($tagid)."'") ;  
	 list($tagname)=mysqli_fetch_array($sql_sname);
	 return $tagname; exit();
	}

 function getmonthTraffic($m){
	$result =   mysqli_query($this->con, "SELECT coupon_id FROM couponsclick WHERE 1 ");
    $total_clicks = mysql_num_rows($result); 
		
	$result2 =   mysqli_query($this->con, "SELECT coupon_id FROM couponsclick WHERE added_date LIKE '%$year-$m%' ");
    $total_month_clicks = mysql_num_rows($result2); 
	$total_month_clicks;	
    $mclicks = $total_month_clicks*100/ $total_clicks;
	return $mclicks; exit();
   }

	
 function resizeImage($SrcImage,$DestImage, $MaxWidth,$MaxHeight,$ImageQuality)
     {
		list($iWidth,$iHeight,$type) = getimagesize($SrcImage);
		$ImageScale = min($MaxWidth/$iWidth, $MaxHeight/$iHeight);
		$NewWidth = ceil($ImageScale*$iWidth);
		$NewHeight = ceil($ImageScale*$iHeight);
		$NewCanves = imagecreatetruecolor($NewWidth, $NewHeight);
		 
		switch(strtolower(image_type_to_mime_type($type)))
		{
		case 'image/jpeg':
		$NewImage = imagecreatefromjpeg($SrcImage);
		break;
		case 'image/JPEG':
		$NewImage = imagecreatefromjpeg($SrcImage);
		break;
		case 'image/png':
		$NewImage = imagecreatefrompng($SrcImage);
		break;
		case 'image/PNG':
		$NewImage = imagecreatefrompng($SrcImage);
		break;
		case 'image/gif':
		$NewImage = imagecreatefromgif($SrcImage);
		break;
		default:
		return false;
		} 
		// Resize Image
		if(imagecopyresampled($NewCanves, $NewImage,0, 0, 0, 0, $NewWidth, $NewHeight, $iWidth, $iHeight))
		{
		// copy file
		if(imagejpeg($NewCanves,$DestImage,$ImageQuality))
		{
		imagedestroy($NewCanves);
		return true;
		}
		}
 }
 
function FetchAsArray($result)
{
return mysqli_fetch_array($result, MYSQLI_BOTH);
}

function GetSelectedRows($result)
{
   return mysqli_num_rows($result);
}

// ends of DB class
}
// This class is to execute and retrive results
class Result
{
var $resHandle;	
var $db;
var $errorNo;
var $error;
var $dateIndices;		// an array of all date fields in this result (query)
var $dateFormat;		//

function __construct($db, $resHandle)
{
$this->resHandle = $resHandle;
$this->db = $db;
//$this->dateIndices = array();
}
function FetchAsArray2()
{
return mysqli_fetch_array($this->resHandle, MYSQLI_BOTH);
}

function FetchRows()
{
$rows = array();
while($data = $this->FetchAsArray())
array_push($rows, $data);
return $rows;
}
function FetchAsVars()
{
if(substr_count($this->db->sql,"distinct"))
$pattern = "/select +distinct(.*?)\sfrom\s/is";
else
$pattern = "/select(.*?)\sfrom\s/is";
if (preg_match($pattern, $this->db->sql, $fieldList))
{
//print_r($fieldList);
//$fields = preg_split("/,/",$fieldList[1]);
$row = $this->FetchAsArray();
// select fields list can be simple fields or functions which are followed by a , or a space
// they can also be aliased using as e.g. select date_format('%x',date) as dt from rfq
preg_match_all("/(\w+\.)?(\w+)(\(.*?\))?(\s+as\s+(\w+))?[,\s]?/is", $fieldList[1], $fields);
//print_r($fields);
//exit();
for($i=0; $i < count($fields[2]); $i++)
{
// name of the field is the alias specified
if ( !empty($fields[4][$i]) )
{
$fieldName = $fields[5][$i];
}
else
{
// in case there is no alias but a function has been used then the name of the
// field will be the name of the function prefixed with the field name
// e.g. sum(actFab) will become sumactFab
$fieldName = trim($fields[2][$i]);
if ( !empty($fields[3][$i]) )
$fieldName .= substr($fields[3][$i],1,-1);
}
if (empty($row))
$row = array();
global ${$fieldName};
${$fieldName} = $row[$i];
}
return $row;
}
//		echo "returning false $this->sql";
return false;
}
function GetSelectedRows2()
{
return mysqli_num_rows($this->resHandle);
}
// returns no of tuples affected by Insert/update/delete
// returns no of tuples in a result
function GetAffectedRows()
{
//die($this->resHandle."<hr>");
//			return mysqli_affected_rows($this->resHandle);
die();
die(mysqli_affected_rows($this->resHandle)."hi");
}
function FetchAsObject()
{
return mysqli_fetch_object($this->resHandle);
}
// close result set
function CloseResultSet()
{
return mysqli_free_result($this->resHandle);
}

function GoToRecord($no)
{
return mysqli_data_seek($this->resHandle, $no);
}

function Close()
{
return mysqli_free_result($this->resHandle);
}


}

function Visit($url)

{

$agent = "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)";$ch=curl_init();

curl_setopt ($ch, CURLOPT_URL,$url );

curl_setopt($ch, CURLOPT_USERAGENT, $agent);

curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt ($ch,CURLOPT_VERBOSE,false);

curl_setopt($ch, CURLOPT_TIMEOUT, 5);

$page=curl_exec($ch);

//echo curl_error($ch);

$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

if($httpcode>=200 && $httpcode<300) return true;

else return false;

}

function remove_special($a)

       {

	    $a=str_replace('•','',$a); 				

		$a=str_replace('&','&amp;',$a); 

		$a=str_replace('’','&#39;',$a);    

		$a=str_replace('‚','',$a);

		$a=str_replace('˜','',$a); 

		$a=str_replace('Ã','',$a);

		$a=str_replace('Ã ','',$a);   

		$a=str_replace('‰','',$a);

		$a=str_replace('¡','&#161;',$a); 

		$a=str_replace('¢','&#162;',$a);

		$a=str_replace('£','&#163;',$a);

		$a=str_replace('€','&#8364;',$a);

		$a=str_replace('¤','&#164;',$a);

		$a=str_replace('¥','&#165;',$a);

		$a=str_replace('¦','&#166;',$a);

		$a=str_replace('§','&#167;',$a);

		$a=str_replace('¨','&#168;',$a);

		$a=str_replace('©','&#169;',$a);

		$a=str_replace('ª','&#170;',$a);

		$a=str_replace('«','&#171;',$a);

		$a=str_replace('¬','&#172;',$a);

		$a=str_replace('','&#173;',$a);

		$a=str_replace('®','&#174;',$a);

		$a=str_replace('¯','&#175;',$a);

		$a=str_replace('°','&#176;',$a);

		$a=str_replace('±','&#177;',$a);

		$a=str_replace('²','&#178;',$a);

		$a=str_replace('³','&#179;',$a);

		$a=str_replace('´','&#180;',$a);

		$a=str_replace('µ','&#181;',$a);

		$a=str_replace('¶','&#182;',$a);

		$a=str_replace('·','&#183;',$a);

		$a=str_replace('¸','&#184;',$a);

		$a=str_replace('¹','&#185;',$a);

		$a=str_replace('º','&#186;',$a);

		$a=str_replace('»','&#187;',$a);

		$a=str_replace('¼','&#188;',$a);

		$a=str_replace('½','&#189;',$a);

		$a=str_replace('¾','&#190;',$a);

		$a=str_replace('¿','&#191;',$a);

		$a=str_replace('×','&#215;',$a);

		$a=str_replace('÷','&#247;',$a);

		$a=str_replace('À','&#192;',$a);

		$a=str_replace('Á','&#193;',$a);

		$a=str_replace('Â','&#194;',$a);

		$a=str_replace('Ã','&#195;',$a);

		$a=str_replace('Ä','&#196;',$a);

		$a=str_replace('Å','&#197;',$a);

		$a=str_replace('Æ','&#198;',$a);

		$a=str_replace('Ç','&#199;',$a);

		$a=str_replace('È','&#200;',$a);

		$a=str_replace('É','&#201;',$a);

		$a=str_replace('Ê','&#202;',$a);

		$a=str_replace('Ë','&#203;',$a);

		$a=str_replace('Ì','&#204;',$a);

		$a=str_replace('Í','&#205;',$a);

		$a=str_replace('Î','&#206;',$a);

		$a=str_replace('Ï','&#207;',$a);

		$a=str_replace('Ð','&#208;',$a);

		$a=str_replace('Ñ','&#209;',$a);

		$a=str_replace('Ò','&#210;',$a);

		$a=str_replace('Ó','&#211;',$a);

		$a=str_replace('Ô','&#212;',$a);

		$a=str_replace('Õ','&#213;',$a);

		$a=str_replace('Ö','&#214;',$a);

		$a=str_replace('Ø','&#216;',$a);

		$a=str_replace('Ù','&#217;',$a);

		$a=str_replace('Ú','&#218;',$a);

		$a=str_replace('Û','&#219;',$a);

		$a=str_replace('Ü','&#220;',$a);

		$a=str_replace('Ý','&#221;',$a);

		$a=str_replace('Þ','&#222;',$a);

		$a=str_replace('ß','&#223;',$a);

		$a=str_replace('à','&#224;',$a);

		$a=str_replace('á','&#225;',$a);

		$a=str_replace('â','&#226;',$a);

		$a=str_replace('ã','&#227;',$a);

		$a=str_replace('ä','&#228;',$a);

		$a=str_replace('å','&#229;',$a);

		$a=str_replace('æ','&#230;',$a);

		$a=str_replace('ç','&#231;',$a);

		$a=str_replace('è','&#232;',$a);

		$a=str_replace('é','&#233;',$a);

		$a=str_replace('ê','&#234;',$a);

		$a=str_replace('ë','&#235;',$a);

		$a=str_replace('ì','&#236;',$a);

		$a=str_replace('í','&#237;',$a);

		$a=str_replace('î','&#238;',$a);

		$a=str_replace('ï','&#239;',$a);

		$a=str_replace('ð','&#240;',$a);

		$a=str_replace('ñ','&#241;',$a);

		$a=str_replace('ò','&#242;',$a);

		$a=str_replace('ó','&#243;',$a);

		$a=str_replace('ô','&#244;',$a);

		$a=str_replace('õ','&#245;',$a);

		$a=str_replace('ö','&#246;',$a);

		$a=str_replace('ø','&#248;',$a);

		$a=str_replace('ù','&#249;',$a);

		$a=str_replace('ú','&#250;',$a);

		$a=str_replace('û','&#251;',$a);

		$a=str_replace('ü','&#252;',$a);

		$a=str_replace('ý','&#253;',$a);

		$a=str_replace('þ','&#254;',$a);

		$a=str_replace('ÿ','&#255;',$a);

		$a=str_replace('Ÿ','&#255;',$a);

		$a=str_replace('','',$a);

		 

		//$a=strip_tags($a);		

	    $a = preg_replace("[^A-Za-z0-9&-_,%;$#?/.:!'\n]", " ", $a);

		  

		return $a;

        }


?>