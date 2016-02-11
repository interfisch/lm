<?php
	/*Sessions*/
	session_start();

	/*Global Constants
		STARTSEITE 		Der Array Key der aktuell als Startseite gesetzten Seite
		DEFAULTSLIDER	Der Code für den Slider, welcher als Default Slider auf den Seiten angezeigt wird, 
						welche keinem Bereich zugeordnet wurden.
	*/
	if(!defined(STARTSEITE)){ 		define("STARTSEITE", "serviceGroup"); }
	if(!defined(DEFAULTSLIDER)){ 	define("DEFAULTSLIDER", "[huge_it_slider id='3']"); }


	/*MAIN PAGE ID
		liest über eine Funktion in der function.php die "Parent Page ID" aus.
		Dies ist die ID, der zu allererst ausgewählten Seite.

		!!! Achtung: Diese Funktion MUSS in der function.php bestehen bleiben !!!
	*/
	$pid = get_top_parent_page_id($post->ID);

	/*HAUPTSEITEN
		Description des Arrays:
		Seitenbezeichnung
		|-- 'id'				=> Dies ist die Page ID der Main Page
		|-- 'title'				=> Titel der Seite (wird auf der Startseite in der Linkliste angezeigt)
		|-- 'sc'				=> ShortCode für diesen Bereich (bsp: printtest --> pt_)
		|-- 'logo'				=> Logo des Bereiches (wird oben rechts angezeigt) Verz.: images/logo/
		|-- 'favicon'			=> Favicon des Bereiches Verz.: images/favicon/
		|-- 'slider'			=> Slidercode des Sliders, welcher auf dieser Seite angezeigt wird (Bsp: [huge_it_slider id=\'SLIDERID\'])
		|-- 'top_menu_exclude'	=> Seiten IDs der Seiten welche nicht in der Navigation (top) angezeigt werden sollen
		|-- 'secured'			=> Seite Passwortgesichert? (true/false)
		|-- 'username'			=> htmlspecialchars(trim("[BENUTZERNAME]"))
		|-- 'password'			=> htmlspecialchars(trim("[PASSWORT]"))
	*/
	$MainID  = array(
		'serviceGroup'	=> array(
			'id'		=> 56,
			'title'		=> "LundM Service Group",
			'sc'		=> 'sg_',
			'logo'		=> 'sg_logo.png',
			'favicon'	=> 'sg_favicon.ico',
			'slider'	=> '[huge_it_slider id=\'2\']',
			'top_menu_exclude'	=> '134,135,400,136'
		),
		'printSolution'	=> array(
			'id'		=> 80,
			'title'		=> "LundM Print Solutions",
			'sc'		=> 'ps_',
			'logo'		=> 'ps_logo.png',
			'favicon'	=> 'ps_favicon.ico',
			'slider'	=> '[huge_it_slider id=\'4\']',
			'top_menu_exclude'	=> ''
		),
		'docManagement'	=> array(
			'id'		=> 81,
			'title'		=> "LundM Doc Management",
			'sc'		=> 'dm_',
			'logo'		=> 'dm_logo.png',
			'favicon'	=> 'dm_favicon.ico',
			'slider'	=> '[huge_it_slider id=\'6\']',
			'top_menu_exclude'	=> ''
		),
		'businessIT'	=> array(
			'id'		=> 82,
			'title'		=> "LundM Business IT",
			'sc'		=> 'bi_',
			'logo'		=> 'bi_logo.png',
			'favicon'	=> 'bi_favicon.ico',
			'slider'	=> '',
			'top_menu_exclude'	=> ''
		),
		'itAcademy'		=> array(
			'id'		=> 83,
			'title'		=> "LundM IT Academy",
			'sc'		=> 'ia_',
			'logo'		=> 'ia_logo.png',
			'favicon'	=> 'ia_favicon.ico',
			'slider'	=> '[huge_it_slider id=\'5\']',
			'top_menu_exclude'	=> ''
		),
		'kundenbereich' => array(
			'id'		=> 359,
			'title'		=> "Kundenbereich",
			'sc'		=> 'kb_',
			'logo'		=> 'kb_logo.png',
			'favicon'	=> 'kb_favicon.ico',
			'slider'	=> '[huge_it_slider id=\'5\']', 
			'secured'	=> true,
			'username'	=> htmlspecialchars(trim("kunde")),
			'password'	=> htmlspecialchars(trim("kontakt")),
			'top_menu_exclude'	=> ''
		)
	);

	/*SEITEN MIT SUB_NAVIGATION IDs
		Alle Seiten, welche eine Sub Navigation haben, welche im linken Bereich angezeigt wird, 
		werden hier inclusive des dort anzuzeigenden Menüs definiert.

		Es wird wie folgt geschachtelt:
		Seitenshortcode
		|-- Bezeichnung der Seite
			|-- 'id' 	=> 	ID der Seite auf welcher die SubNavi angezeigt wird
			|-- 'menu'	=> 	Name des Menüs, welches auf der Seite als SubNavi verwendet wird. 
							Zur einfacheren Zuweisung im Backend wird hier als erster Wert der SC der Hauptseite verwendet
	*/
	$PageID	=	array(
		/*Service Group*/
		$MainID['serviceGroup']['sc']  => array(
				'unternehmen' => array(
					'id' 	=> 67,
					'menu'	=> $MainID['serviceGroup']['sc'].'unternehmen_overview'
				)
			),
		/*Print Solutions*/
		$MainID['printSolution']['sc'] => array(
			'systeme-loesungen'	=> array(
					'id' 	=> 85,
					'menu'	=> $MainID['printSolution']['sc'].'systeme-loesungen_overview'
			),
			'support' 			=> array(
					'id' 	=> 102,
					'menu'	=> $MainID['printSolution']['sc'].'support_overview'
			),
			'unternehmen' 		=> array(
					'id' 	=> 104,
					'menu'	=> $MainID['printSolution']['sc'].'unternehmen_overview'
			)
		),
		/*Doc Management*/
		$MainID['docManagement']['sc'] => array(
			'workflow'			=> array(
					'id' 	=> 107,
					'menu'	=> $MainID['docManagement']['sc'].'workflow_overview'
			),
			'archivierung-dms'	=> array(
					'id' 	=> 111,
					'menu'	=> $MainID['docManagement']['sc'].'archivierung-dms_overview'
			),
			'support'			=> array(
					'id' 	=> 115,
					'menu'	=> $MainID['docManagement']['sc'].'support_overview'
			),
			'unternehmen'		=> array(
					'id' 	=> 117,
					'menu'	=> $MainID['docManagement']['sc'].'unternehmen_overview'
			)
		),
		/*IT Academy*/		
		$MainID['itAcademy']['sc'] => array(
			'schulungskalender'	=> array(
					'id' 	=> 120,
					'menu'	=> $MainID['itAcademy']['sc'].'schulungskalender_overview'
			),
			'zertifizierung-partner'	=> array(
					'id' 	=> 126,
					'menu'	=> $MainID['itAcademy']['sc'].'zertifizierung-partner_overview'
			)
		),
		/*Kundenbereich*/		
		// $MainID['kundenbereich']['sc'] => array(
		// 	'firstPageName'	=> array(
		// 			'id' 	=> 0,
		// 			'menu'	=> $MainID['kundenbereich']['sc'].'firstPageName_overview'
		// 	)
		// )

	);



/*SECURED ELEMENTS
	Hier wird ausgelesen, ob der Bereich secured also durch eine Passwortabfrage gesichert wurde!
	Wenn ja, wird ein Passwort Feld angezeigt und der Benutzer kann auf den Bereich so lange nicht zugreifen, bis er angemeldet ist.
*/
$bereich	=	"";
foreach($MainID as $k => $v){
	if ($v['secured'] == true && $v['id'] == $pid && empty($bereich)){
		$bereich = $k;
	}
}

/*Login
	Das Loginscript, welches nach Absenden des Login Formulars aufgerufen wird.
*/
if(isset($_POST['ssid']) && $_POST['ssid'] == $_SESSION['ssid']){
	$Username 		=	md5($MainID[$bereich]['sc'].$MainID[$bereich]['username']);
	$Password		=	md5($MainID[$bereich]['sc'].$MainID[$bereich]['password']);
	$PostUsername	=	(isset($_POST['username']) && !empty($_POST['username']))?htmlspecialchars(trim($_POST['username'])):"";
	$PostPassword	=	(isset($_POST['password']) && !empty($_POST['password']))?htmlspecialchars(trim($_POST['password'])):"";
	$GenUsername	=	md5($MainID[$bereich]['sc'].$PostUsername);
	$GenPassword	=	md5($MainID[$bereich]['sc'].$PostPassword);

	if($Username == $GenUsername && $Password == $GenPassword){
		$_SESSION[$MainID[$bereich]['sc']."ssid"]		=	date("YmdHis", time());
		$_SESSION['ssid']								=  	mt_rand();
		$returnSSID = 	"";
	} else {
		$returnSSID	=	"Bei der Anmeldung ist ein Fehler aufgetreten! Bitte pr&uuml;fen Sie Ihre Eingaben";
	}
}

/*Logout
	Alle gesetzten Sessions werden geleert!!
*/
if(isset($_GET['ssid']) && $_GET['ssid'] == $_SESSION['ssid'] && isset($_GET['logoff'])){
	session_start();
    session_unset();
    session_destroy();
    session_write_close();
}



/*Session Parameter werden gesetzt :D */
$ssid 				= ($pid != $MainID[$bereich]['id'] || isset($_SESSION[$MainID[$bereich]['sc']."ssid"]))?true:false;
$_SESSION['ssid']	= (isset($_SESSION['ssid']))? $_SESSION['ssid'] : mt_rand();

?>









