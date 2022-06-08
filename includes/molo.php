<?php
	//function(+Obligatory,-Optional)
	//Calcul Time between Now() And a DateTime ==> molo_dateDiff(+dateTime)
		//English Version
			if (!function_exists('molo_dateDiff')) {
				function molo_dateDiff($date){
					$post=substr($date,2);
					$d=date('y-m-d h:i:s');
					$y=substr($post,0,2);
					$m=substr($post,3,2);
					$d=substr($post,6,2);
					$h=substr($post,9,2);
					$i=substr($post,12,2);
					$s=substr($post,15,2);
					$ptime=time()-mktime($h,$i,$s,$m,$d,$y);
					if ($ptime<60){$finaltime="right now";}
					if(($ptime>=60)&&($ptime<3600)){$atime=$ptime/60;
					  if(floor($atime)>1){$finaltime=floor($atime)."mins ago";}else{$finaltime=floor($atime)."min ago";}}
					
					if(($ptime>=3600)&&($ptime<86400)){$atime=$ptime/3600;
					  if(floor($atime)>1){$finaltime=floor($atime)."hours ago";}else{$finaltime=floor($atime)."hour ago";}}

					if(($ptime>=86400)&&($ptime<604800)){$atime=$ptime/86400;
					  if(floor($atime)>1){$finaltime=floor($atime)."days ago";}else{$finaltime=floor($atime)."day ago";}}

					if(($ptime>=604800)&&($ptime<2592000)){$atime=$ptime/604800;
					  if(floor($atime)>1){$finaltime=floor($atime)."weeks ago";}else{$finaltime=floor($atime)."week ago";}}
					
					if(($ptime>=2592000)&&($ptime<31104000)){$atime=$ptime/2592000;
					  if(floor($atime)>1){$finaltime=floor($atime)."months ago";}else{$finaltime=floor($atime)."month ago";}}

					if(($ptime>=31104000)){$a=$ptime/31104000;
					  if(floor($atime)>1){$finaltime=floor($atime)."years ago";}else{$finaltime=floor($atime)."year ago";}}

					return($finaltime);
				}
			}
		//Arabic Version
			if (!function_exists('molo_dateDiffAr')) {
				function molo_dateDiffAr($date){
					$post=substr($date,2);
					$d=date('y-m-d h:i:s');
					$y=substr($post,0,2);
					$m=substr($post,3,2);
					$d=substr($post,6,2);
					$h=substr($post,9,2);
					$i=substr($post,12,2);
					$s=substr($post,15,2);
					$ptime=time()-mktime($h,$i,$s,$m,$d,$y);
					if ($ptime<60){$finaltime=" الآن  ";}
					if(($ptime>=60)&&($ptime<3600)){$atime=$ptime/60;
					  if(floor($atime)>1){$finaltime=floor($atime)." دقيقة ";}else{$finaltime=floor($atime)." دقيقة ";}}

					if(($ptime>=3600)&&($ptime<86400)){$atime=$ptime/3600;
					  if(floor($atime)>1){$finaltime=floor($atime)." ساعة ";}else{$finaltime=floor($atime)." ساعة ";}}

					if(($ptime>=86400)&&($ptime<604800)){$atime=$ptime/86400;
					  if(floor($atime)>1){$finaltime=floor($atime)."يوم ";}else{$finaltime=floor($atime)." يوم ";}}

					if(($ptime>=604800)&&($ptime<2592000)){$atime=$ptime/604800;
					  if(floor($atime)>1){$finaltime=floor($atime)."اسبوع ";}else{$finaltime=floor($atime)." اسبوع ";}}

					if(($ptime>=2592000)&&($ptime<31104000)){$atime=$ptime/2592000;
					  if(floor($atime)>1){$finaltime=floor($atime)." شهر ";}else{$finaltime=floor($atime)." شهر ";}}

					if(($ptime>=31104000)){$a=$ptime/31104000;
					  if(floor($atime)>1){$finaltime=floor($atime)." سنة ";}else{$finaltime=floor($atime)." سنة ";}}

					return(' منذ  '.$finaltime );
				}
			}

	//Generate random id ==> molo_generateRandomId(+Length,-Request)
	/* Ps --> Request : database request to make sure that the id doesn't exist before
		      example : "SELECT * FROM [*Table_Name*] Where [*id_Column_Name*]='$randomString';" */
		    if (!function_exists('molo_generateRandomId')) {
		   		$randomString = '';
				function molo_generateRandomId($length,$tableName="",$idColumnName=""){
					include "dbconnect.php";
					$req="";
					$randomString=0;
					if ($idColumnName!='' && $tableName!='') {
						$req="SELECT * FROM `$tableName` Where $idColumnName=? ;";
					}

		            $characters = '123456789';
		   			$charactersLength = strlen($characters);
		   			$randomString = '';
		   			if ($req!="") {	
						$a=1;
		 				while($a!=0){
		    				$randomString = '';
							for ($i = 0; $i < $length; $i++) {
		       					 $randomString .= $characters[rand(0, $charactersLength - 1)];
		    				}
		   					$idr=$connect->prepare($req);
		   					$idr->execute([$randomString]);
		   					$a=$idr->rowCount();
		 				}
		 			}else{
		 				$randomString = '';
						for ($i = 0; $i < $length; $i++) {
		       				 $randomString .= $characters[rand(0, $charactersLength - 1)];
		    			}
		 			}
					return($randomString);
				}
			}

	//Calcul Distance From 2 Points ==> molo_calcDistance(+$lat1,+$lon1,+$lat2,+$lon2,-$unit)
	/* Ps --> unit : 'k' for kilometre
					 'm' for miles 
					  -- default = 'k' */
		if (!function_exists('molo_calcDistance')) {
			function molo_calcDistance($lat1, $lon1, $lat2, $lon2, $unit="") {
	 			if (($lat1 == $lat2) && ($lon1 == $lon2)) {
	    			return 0;
	 			}else {
	   				$theta = $lon1 - $lon2;
	   				$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
	   				$dist = acos($dist);
	   				$dist = rad2deg($dist);
	   				$miles = $dist * 60 * 1.1515;
	   				$unit = strtoupper($unit);

	   				if ($unit == "m") {
	   				  return ($miles);
	   				} else if ($unit == "n") {
	   				  return ($miles * 0.8684);
	   				} else {
	   				  return $miles * 1.609344;
	   				}
	 			}
			}
		}

	//Upload Picture And return the name of it ==> molo_uploadPicture(+$inputName,-$file)
	/* Ps --> inputName : the name of the input type="file"
			  file : the path where you want to upload the picture */
		if (!function_exists('molo_uploadPicture')) {	  
			function molo_uploadPicture($inputName,$file){
	     		$folder = $file; 
				$image = time(); 
				$path = $folder . $image ; 
				$target_file=$folder.basename($_FILES[$inputName]["name"]);
				$imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
				$filename=$_FILES[$inputName]['name']; 
				$ext=pathinfo($filename, PATHINFO_EXTENSION);
					$image.='.'.$ext;
					$path.='.'.$ext;
					move_uploaded_file( $_FILES[$inputName] ['tmp_name'], $path); 
					return $image;
			}
		}


		if (!function_exists('molo_setCookie')) {	
			function molo_setCookie($name,$value){
				setcookie($name, $value, time() + (86400 * 30), "/");
			}
		}


		if (!function_exists('molo_mail')) {	
			function molo_mail($to,$from,$subject,$cmessage){

			    $headers = "From: $from";
				$headers = "From: " . $from . "\r\n";
				$headers .= "Reply-To: ". $from . "\r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

				$body = '<!DOCTYPE html>
<html>
<head>
  <title>Email</title>
</head>
<body >
  <div  style="background-image: linear-gradient(to right, #000,#88001b,#000);">
    <div style="width: 100%;background-color: #88001b;text-align: center;">
        <div class="container" style="color:#fff;padding: 10px 30px;text-align: left;">
            <span>support@flexboosting.com</span>
            <span style="float: right;">
                <a href="https://discord.com/invite/7ZBq3rN" target="_blank"  style="text-decoration: none;color:#fff;">Discord</a>
            </span>
        </div>
    </div>
    <header class="header-section" style="background-color: #000;text-align: center;">
        <div class="logo">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center" style="padding: 30px 0;">
                       <a href="index.php"><img src="https://flexboosting.com/img/118308333_2703467356577358_818668813639652032_n.gif"></a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container" style="padding: 30px 0;text-align:center;"><b  style="color:#fff;">'.$subject.'</b>'.
      '<p style="color:#fff;">'.$cmessage.'</p>'
      .'
    </div>

  
<br> <br> <br> 
                <div style="background-color: #000;padding: 0px 30px 20px 30px;">
         <div class="container">
                    <div  class="row" style="padding: 10px 0 30px 0;">
                    <div class="col-lg-6">
                        <div class="ca-text">
                            <p style="color:#fff;display: inline-block;">
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Powered By  <a href="http://walid-sammoud.tn" target="_blank" style="font-weight: bold;text-decoration: none;color:#88001b;font-weight: bold;">Walid</a> | 
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6" style="text-align: right;margin-top: -40px;">
                        <div class="ca-links">
                            
                        </div>
                    </div>
                    </div>
                </div>
                  </div>
</div>
</body>
</html>';

			    if (mail($to, $subject, $body, $headers)) {
			    	return 1;
			    }else{
			    	return 0;
			    }
			}
		}
		if (!function_exists('molo_getFullUrl')) {
			function molo_getFullUrl(){
				$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
				return $actual_link;
			}
		}
?>