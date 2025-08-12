<?php   error_reporting('0');
    session_start();   $sess_id = session_id();
   // $tomorrow = mktime(0,0,0, date("m"), date("d")+1, date("Y"));	
	//define('MON_YEAR',date("F", $tomorrow)." ".date("Y", $tomorrow));
	$servername = $_SERVER["SERVER_NAME"]; 
	
	 	
  if(stristr($_SERVER['HTTP_HOST'],'localhost'))
    {
	define('DOMAIN', 'https://www.promosplusdeals.com'); 
	define('HOST_VAR', 'https://www.promosplusdeals.com');
	define('DOMAINVAR', 'http://
		/kscoupon'); 	
	define('MEDIA', 'https://www.promosplusdeals.com/assets/images');	
	define('IMGPATH', 'https://www.promosplusdeals.com/assets/images');
	
	DEFINE("DB_USER_ID","traveldi_fasi");
	DEFINE("DB_USER_PWD","Voliom@12121");
	DEFINE("DATABASE","traveldi_coupons");
	DEFINE("DBDOMAIN","localhost");  
 	 
	 }else{ 
	 
	define('DOMAIN', 'https://www.promosplusdeals.com'); 
	define('HOST_VAR', 'https://www.promosplusdeals.com');
	define('DOMAINVAR', 'https://www.promosplusdeals.com'); 	
	define('MEDIA', 'https://www.promosplusdeals.com/assets/images');	
	define('IMGPATH', $_SERVER['DOCUMENT_ROOT'].'/assets/images');
	
	DEFINE("DB_USER_ID","traveldi_fasi");
	DEFINE("DB_USER_PWD","Voliom@12121");
	DEFINE("DATABASE","traveldi_coupons");
	DEFINE("DBDOMAIN","localhost");
	  
  } 
	 	
		
 if ( defined("DB") )
	return;
	define ("DB","yes");
	DEFINE("SESS_VAR",$sess_id);
	DEFINE("ER_DUP_KEY",1022);
	DEFINE("ER_DUP_ENTRY",1062);

	// Class for Connecting Database

Class DB{
    
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

				$this->errorNo = mysqli_errno($this->con);

				$this->error = mysqli_error($this->con);



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


echo mysqli_errno($this->con) . " -- " . mysqli_error($this->con);
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
 	 $sql_sname= mysqli_query($this->con, "select store_id from stores WHERE storename = '".addslashes($sname)."'") ;  
	 list($store_id)=mysqli_fetch_array($sql_sname);
	 return $store_id; exit();
	}

function getCouponTypeFromTID($type){
 	 $sql_sname= mysqli_query($this->con, "select coupontype from coupon_type WHERE type_id = '".addslashes($type)."'") ;  
	 list($coupontype)=mysqli_fetch_array($sql_sname);
	 return $coupontype; exit();
	}
	
function getCatIDFromName($catname){
 	 $sql_sname= mysqli_query($this->con, "Select category_id from categories where category = '".addslashes($catname)."'") ;  
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
	

function CountCouponsBySID($sid)
	{
	$result =  mysqli_query($this->con, "select store_id from coupons where  1 and store_id = '$sid' ");
	 return mysqli_num_rows($result); exit();		  
	}
	
 function CountStoresByCID($cid)
	{ 
	$result =  mysqli_query($this->con, "select store_id from stores where  1 and primary_category = $cid ");
	 return mysqli_num_rows($result); exit();		  
	}

function getCouponCodeCount($sid)
{          		  
 $result =  mysqli_query($this->con, "SELECT coupon_id FROM coupons WHERE coupon_code != '' and store_id = '$sid' and (exp_date >=CURDATE() or exp_date=000-00-00)  "); 
 return mysqli_num_rows($result); exit();	
}

function getCouponDealCount($sid)
{          		  
 $result =  mysqli_query($this->con, "SELECT coupon_id FROM coupons WHERE coupon_code = '' and store_id = '$sid'  and (exp_date >=CURDATE() or exp_date=000-00-00) ");  
 return mysqli_num_rows($result); exit();	
}

function real_escape_string($sid)
{          		  
   return mysqli_real_escape_string ($this->con, $sid);
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

function getPageMetas($pid) {  
  $strQuery="select * from pages where pid =".$pid;  
	$strRes=mysqli_query($this->con,$strQuery) or die(mysqli_error());
	$data= mysqli_fetch_array($strRes, MYSQLI_BOTH);
	return $data;
}

function replace_const($a)
       { 	  	
		$a=str_replace('[year]',date("Y"),$a);
		$a=str_replace('[fmonth]',date("F"),$a);
		$a=str_replace('[smonth]',date("M"),$a);
		$a=str_replace('[monthyear]',MON_YEAR,$a);
		return $a;	   
	   }
	  
function getCouponType($ctype){
 	 $sql_tname= mysqli_query($this->con, "select coupontype from coupon_type WHERE type_id = '$ctype' ") ;  
	 list($coupontype)=mysqli_fetch_array($sql_tname);
	 return $coupontype; exit();
	}	   

// ends of DB class
}


class Result

	{

		

		var $resHandle;	

		var $db;

		var $errorNo;

		var $error;

		var $dateIndices;		// an array of. All date fields in this result (query)

		var $dateFormat;		//

		

		

		function __construct($db, $resHandle)

		{

			$this->resHandle = $resHandle;

			$this->db = $db;

			//$this->dateIndices = array();

		}



		

		function FetchRows()

		{

			$rows = array();

			while($data = $this->FetchAsArray())

				array_push($rows, $data);

			return $rows;

		}

	/* function FetchAsVars()

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

		*/

		

		
		// returns no of tuples affected by Insert/update/delete



		// returns no of tuples in a result

		

		function GetAffectedRows()

		{

			//die($this->resHandle."<hr>");

//			return mysql_affected_rows($this->resHandle);

		die();

		die(mysql_affected_rows($this->resHandle)."hi");

		}

	

		function FetchAsObject()

		{

			return mysql_fetch_object($this->resHandle);

		}

		// close result set

		function CloseResultSet()

		{

			return mysql_free_result($this->resHandle);

		}



		function GoToRecord($no)

		{

			return mysql_data_seek($this->resHandle, $no);

		}



		function Close()

		{

			return mysql_free_result($this->resHandle);

		}

		

		

	

	// end 	of class result

	}		
	
function timeDiff($t1, $t2)
{
   if($t1 > $t2)
   {
      $time1 = $t2;
      $time2 = $t1;
   }
   else
   {
      $time1 = $t1;
      $time2 = $t2;
   }
   $diff = array(
      'years' => 0,
      'months' => 0,
      'weeks' => 0,
      'days' => 0
   );
   
   foreach(array('years','months','weeks','days')
         as $unit)
   {
      while(TRUE)
      {
         $next = strtotime("+1 $unit", $time1);
         if($next < $time2)
         {
            $time1 = $next;
            $diff[$unit]++;
         }
         else
         {
            break;
         }
      }
   }
   return($diff);
}

function remove_special($a)
       { 				
		$a=str_replace('&','&amp;',$a);
		//$a=str_replace(' ','&#160;',$a);    
		$a=str_replace('‚','',$a);
		$a=str_replace('˜','',$a); 
		$a=str_replace('Ã','',$a);
		$a=str_replace('Ã ','',$a);   
		$a=str_replace('‰','',$a);
		$a=str_replace('¡','&#161;',$a); 
		$a=str_replace('¢','&#162;',$a);
		//$a=str_replace('£','&#163;',$a);
		$a=str_replace('€','&#163;',$a);
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
		$a=strip_tags($a);
		
		$a = preg_replace("[^A-Za-z0-9&-_,%;#?$/.:!']", " ", $a);
		  
		return $a;
        }
		
		$db = new DB();
		
		
		
		 if( isset($_REQUEST['Admin-Login']) && $_REQUEST['Admin-Login']  == 'Login' ){    
		
		   $ref = $_POST['ref'];
		   $username = $_POST['userid'];
           $pass  = md5($_POST['pass']);
		 //  print_r($_POST);
		  $sql = "select admin_id, username, password ,level_id, admin_level from admin where username = '$username' and password = '$pass'";  // die;
	         $result= mysql_query($sql);		
	
	    if(mysql_num_rows($result)) 
	      {  
				$row = mysql_fetch_array($result);
				if($row['level_id'] == '1'){			
				/*setcookie('admin_username', $row['username'], time()+3600*30, '/', 'couponzshop.com'); 
				setcookie('adminid', $row['admin_id'], time()+3600*30, '/', 'couponzshop.com'); 
				setcookie('levelid', $row['level_id'], time()+3600*30, '/', 'couponzshop.com'); */
				
				setcookie('admin_username', $row['username'], time()+3600*30, '/', 'localhost/couponzshop/'); 
				setcookie('adminid', $row['admin_id'], time()+3600*30, '/', 'localhost/couponzshop/'); 
				setcookie('levelid', $row['level_id'], time()+3600*30, '/', 'localhost/couponzshop/'); 
				
				setcookie('admin_username', $row['username'], time()+3600*30); 
				setcookie('adminid', $row['admin_id'], time()+3600*30); 
				setcookie('levelid', $row['level_id'], time()+3600*30);
				
				$loginerror = '0';
			   }		
         }else{ $loginerror = '1';}
		// die($ref);
		header("location: ".$ref); exit;	
	 }
	 
		
	/* $sql_feature1 = "SET SESSION sql_mode = 'STRICT_TRANS_TABLES,NO_ZERO_IN_DATE' ";
	  $res1 = $db->ExecuteQuery($sql_feature1);	*/
 function substrwords($text, $maxchar, $end='...') {
                if (strlen($text) > $maxchar || $text == '') {
                    $words = preg_split('/\s/', $text);      
                    $output = '';
                    $i      = 0;
                    while (1) {
                        $length = strlen($output)+strlen($words[$i]);
                        if ($length > $maxchar) {
                            break;
                        } 
                        else {
                            $output .= " " . $words[$i];
                            ++$i;
                        }
                    }
                    $output .= $end;
                } 
                else {
                    $output = $text;
                }
                return $output;
            }    


    function getHost($Address) { 
       $parseUrl = parse_url(trim($Address)); 
       return trim($parseUrl['host'] ? $parseUrl['host'] : array_shift(explode('/', $parseUrl['path'], 2))); 
    }

  
?>