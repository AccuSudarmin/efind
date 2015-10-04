<?php
error_reporting(0);
require_once('myencryption.php');
require_once('lib/nusoap.php'); 

list($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) = 
  explode(':', base64_decode(substr($_SERVER['HTTP_AUTHORIZATION'], 6)));

  
function doAuthenticate(){   
	$user = 'appUnh4s';
	$password = 'uNh4sTam4lanr3a2015';
	
	if(isset($_SERVER['PHP_AUTH_USER']) and isset($_SERVER['PHP_AUTH_PW']) )
          {
          
		  //here I am hardcoding. You can connect to your DB for user authentication.    
			
           if($_SERVER['PHP_AUTH_USER'] == $user and $_SERVER['PHP_AUTH_PW'] == $password)
                return true;
           else
               return false;                   
          }
}

$conn = mysql_connect('127.0.0.1','hendra','h3ndr4');
$kodeacak = 'tr4ers3@354123rdR';
mysql_select_db('dbmanajemen',$conn);
$server = new nusoap_server;

$server->configureWSDL('serverApps', 'urn:serverApps');
 
$server->wsdl->schemaTargetNamespace = 'urn:serverApps';
 
//SOAP complex type return type (an array/struct)
$server->wsdl->addComplexType(
    'Person',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'userAccount' => array('name' => 'userAccount', 'type' => 'xsd:string'),
        'userGroup' => array('name' => 'userGroup', 'type' => 'xsd:string'),
		'userNama' => array('name' => 'userNama', 'type' => 'xsd:string'),
		'userSemester' => array('name' => 'userSemester','type' =>'xsd:string'),
        'userSession' => array('name' => 'userSession', 'type' => 'xsd:string')
    )
);

$server->wsdl->addComplexType(
    'Taplikasi',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'appNama' => array('name' => 'appNama', 'type' => 'xsd:string'),
        'appIcon' => array('name' => 'appIcon', 'type' => 'xsd:string'),
		'appUrl' => array('name' => 'appUrl', 'type' => 'xsd:string')
    )
);
  
$server->register('login',
			array('username' => 'xsd:string', 'password'=>'xsd:string'),  //parameters
			array('return' => 'tns:Person'),  //outputarray('return' => 'tns:Person'),  //output
			//array('return' => 'xsd:string'),  //output
			'urn:serverApps',   //namespace
			'urn:serverApps#login',  //soapaction
			'rpc', // style
			'encoded', // use
			'Check user login');  //description
			
$server->register('get_aplikasi',
			array('user' => 'xsd:string'),  //parameters
			array('return' => 'xsd:string'),  //output
			'urn:serverApps',   //namespace
			'urn:serverApps#get_aplikasi',  //soapaction
			'rpc', // style
			'encoded', // use
			'Ambil Aplikasi');  //description
			
$server->register('get_kel_group',
			array(),  //parameters
			array('return' => 'xsd:string'),  //output
			'urn:serverApps',   //namespace
			'urn:serverApps#get_kel_group',  //soapaction
			'rpc', // style
			'encoded', // use
			'Ambil Daftar Group');  //description
			
$server->register('cek_password',
			array('username' => 'xsd:string', 'password' => 'xsd:string'),  //parameters
			array('return' => 'xsd:int'),  //output
			'urn:serverApps',   //namespace
			'urn:serverApps#cek_password',  //soapaction
			'rpc', // style
			'encoded', // use
			'Memeriksa Password');  //description
			
$server->register('ganti_password',
			array('username' => 'xsd:string', 'passwordlama' => 'xsd:string', 'passwordbaru' => 'xsd:string'),  //parameters
			array('return' => 'xsd:int'),  //output
			'urn:serverApps',   //namespace
			'urn:serverApps#cek_password',  //soapaction
			'rpc', // style
			'encoded', // use
			'Memeriksa Password');  //description
 
$auth = $_SERVER['PHP_AUTH_USER'];
 
function login($username, $password) {
	if (doAuthenticate()) 
	
	{
		$query = "select * from adm_user where userAccount = '".$username."' and userPassword = '".$password."' and userFlag='1'";
		$res = mysql_query($query);
		
		if (mysql_num_rows($res) > 0)
		{
			$query2 = "select smtrKode from ref_semester where smtrAktif=1";
			$res2 = mysql_query($query2);
			return array(
			'userAccount'=>mysql_result($res,0,'userAccount'),
			'userGroup'=>mysql_result($res,0,'userGroup'),
			'userNama'=>mysql_result($res,0,'userNama'),
			'userSemester'=>mysql_result($res2,0,'smtrKode'),
			'userSession'=>md5($GLOBALS['kodeacak'].date('dmYhis'))
			);				
		} else
			return array();
	}
	
}

function cek_password($username, $password) {
	if (doAuthenticate()) 
	
	{
		$query = "select * from adm_user where userAccount = '".$username."' and userPassword = '".$password."' and userFlag='1'";
		$res = mysql_query($query);
		if (mysql_num_rows($res) > 0)
		{
			return 1;
		} else
		{
			return 0;
		}
	}
}

function get_kel_group()
{
	if (doAuthenticate()) 
	{
		$query = "select kelgrKode as kunci, kelgrNama as nilai from adm_kelompokgroup";
		$res = mysql_query($query);
		$data = array();
		$i = 0;
		while ($rows = mysql_fetch_object($res))
		{
			$data[$i] = $rows;
			$i++;
		}
		return json_encode($data);
	}
	
}

function ganti_password($username, $passwordlama, $passwordbaru) {
	if (doAuthenticate()) 
	
	{
		$query = "update adm_user  set userPassword = '".$passwordbaru."' where userAccount = '".$username."' and userPassword = '".$passwordlama."' and userFlag='1'";
		mysql_query($query);
		if (mysql_affected_rows() > 0)
		{
			return 1;
		} else
		{
			return 0;
		}
	}
}


function get_aplikasi($user) {
	if (doAuthenticate()) 
	{
		
		$query = "(SELECT
			A.appId,
			A.appNama,
			A.appIcon,
			A.appUrl,
			A.appKodeVerifikasi,
			A.appDb,
			A.appFlag,
			C.groupNama,
			C.groupKode
			FROM
			adm_aplikasi AS A
			INNER JOIN adm_groupapps AS B ON A.appId = B.grappKodeApp
			INNER JOIN adm_group AS C ON B.grappKodeGroup = C.groupKelompok
			INNER JOIN adm_user AS D ON C.groupKode = D.userGroup
			WHERE
			D.userAccount = '".$user."' AND
			A.appFlag = 1)
			UNION
			(
			SELECT
			A.appId,
			A.appNama,
			A.appIcon,
			A.appUrl,
			A.appKodeVerifikasi,
			A.appDb,
			A.appFlag,
			C.groupNama,
			C.groupKode
			FROM
			adm_aplikasi AS A
			INNER JOIN adm_groupapps AS B ON A.appId = B.grappKodeApp
			INNER JOIN adm_group AS C ON B.grappKodeGroup = C.groupKelompok
			INNER JOIN adm_groupuser AS D ON C.groupKode = D.gruserGroup
			WHERE
			D.gruserAccount = '".$user."' AND
			A.appFlag = 1

			)
			
			";
		$res = mysql_query($query);
		$data = array();
		$i = 0;
		while ($rows = mysql_fetch_object($res))
		{
			$data[$i] = $rows;
			$i++;
		}
		//$myenc = new Myencryption;
		//return $myenc->encode(json_encode($data));
		return json_encode($data);
	}

}
 
//$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
 
//$server->service($HTTP_RAW_POST_DATA);
$POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA'])? $GLOBALS['HTTP_RAW_POST_DATA'] : '';
$server->service($POST_DATA);
mysql_close($conn);

?>