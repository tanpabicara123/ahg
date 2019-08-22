<?php 
/**
*@author yudha tira pamunkas
*@version 1.0
*/
function curl($url, $fields = null, $headers = null) { $ch = curl_init(); curl_setopt($ch, CURLOPT_URL, $url); curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); if ($fields !== null) { curl_setopt($ch, CURLOPT_POST, 1); curl_setopt($ch, CURLOPT_POSTFIELDS, $fields); } if ($headers !== null) { curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); } $result = curl_exec($ch); $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE); curl_close($ch); return array( $result, $httpcode ); }

function start() {
	print("=============================\n");
	print("   Spotify account creator  \n");
	print("         Version 1.0        \n");
	print("   Created by yudha tira p  \n");
	print("=============================\n");
	echo "\n[#] Email: ";
	$mau = trim(fgets(STDIN));

			echo "\n";
			 
				echo "[#] Password: ";
				$pass = trim(fgets(STDIN));

				$mail = $mau 
				
		$send =curl("https://spclient.wg.spotify.com:443/signup/public/v1/account/', 'iagree=true&birth_day=12&platform=Android-ARM&creation_point=client_mobile&password='.$pass.'&key=142b583129b2df829de3656f9eb484e6&birth_year=2000&email='.$mail.'&gender=male&app_version=849800892&birth_month=12&password_repeat='.$pass.");
		
			 
	$data = json_decode($send[0]);
		if ($data->status == 1) {
		echo "[+] Success | ".$mail." | ".$pass."\r\n";
		$fopen = fopen('result_spotify.txt', 'a');
		fwrite($fopen, $data);
		fclose($fopen);
	} else {
		echo "[!] Failed | ".$email." | ".$pass."\n";
	}
		}		

start();

while (true) {
	echo "\nWanna register again? (y/n): ";
	$select = trim(fgets(STDIN));
	if ($select == "y") {
		echo "\n";
		start();
	} else {
		die("Done!\n");
	}
}

?>