<?php
class XboxOneTheme {
	$ipaddress = '';
	function build_json_response($color){
		return array("primaryColor" => "$color", "secondaryColor" => "$color", "tertiaryColor" => "$color");
	}
	function get_vip_user_json($gamertag){
		return file_get_contents(strtolower("lib/vip/$gamertag.json"));
	}
	function random_color_part() {
	    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
	}
	function random_color() {
	    return $this->random_color_part() .  $this-random_color_part() .  $this-random_color_part();
	}
	function get_client_ip() {	    
	    if ($_SERVER['HTTP_CLIENT_IP'])
		$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	    else if($_SERVER['HTTP_X_FORWARDED_FOR'])
		$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    else if($_SERVER['HTTP_X_FORWARDED'])
		$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
	    else if($_SERVER['HTTP_FORWARDED_FOR'])
		$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
	    else if($_SERVER['HTTP_FORWARDED'])
		$ipaddress = $_SERVER['HTTP_FORWARDED'];
	    else if($_SERVER['REMOTE_ADDR'])
		$ipaddress = $_SERVER['REMOTE_ADDR'];
	    else
		$ipaddress = 'UNKNOWN';

	    return $ipaddress;
	}
	function get_client_color_by_ip($ip){
		if($ip !== "UNKNOWN"){
			switch($ip){
				case "your ip":
					echo $this->get_vip_user_json("your gamertag");
					break;
				case "friends ip":
					echo $this->get_vip_user_json("friends gamertag");
					break;
				default:
					echo $this->build_json_response($this->random_color());
					break;
			}
		}
	}
}
?>
