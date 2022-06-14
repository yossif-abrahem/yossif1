<html>
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <script src="https://kit.fontawesome.com/55db5a83a3.js" crossorigin="anonymous"></script>
      <style>
         .icon-btn {
         height: 58px;
         width: 58px;
         font-size: 25px;
         margin-left: 10px;
         margin-right: 10px;
         background-image: linear-gradient(to bottom right, #AA6890, #AA6890);
         }
         .header-section{
         background-image: linear-gradient(to bottom right, #AA6890, #AA6890);
         }
         .header-section h1 {
            font-weight: bold;
        }
        .submit-button{
        border-radius: 20px;
    width: 100%;
    background-image: linear-gradient(to bottom right, #AA6890, #AA6890);
        }
      </style>
   </head>
   <body>
   	
<?php /*
-------------------------------------------------------------------------
- Cod BY : SidraELEzz
- Github : https://github.com/SidraELEzz
- Telegram: https://t.me/SidraTools
- Telegram: https://t.me/tt_rq
-------------------------------------------------------------------------
*/

error_reporting(0); ?>
<section>
    <div class="header-section container pt-5 pb-1 px-5 text-center text-light">
        <h1> TEP FOLLOWERS  SCRIPT (Check Coins) </h1>
        <p class="text-light">BY - SidraELEzz</p>
    </div>
</section>

<?php
/*
-------------------------------------------------------------------------
- Cod BY : SidraELEzz
- Github : https://github.com/SidraELEzz
- Telegram: https://t.me/SidraTools
- Telegram: https://t.me/tt_rq
-------------------------------------------------------------------------
*/

error_reporting(0);

if (isset($_GET['submit'])) {
     $userid = $_GET['target'];
     $sessionid = $_GET['sessionid'];

     function rando($length)
     {
          $sidra = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
          $sidre = strlen($sidra);
          $randomString = '';
          for ($i = 0; $i < $length; $i++) {
               $randomString .= $sidra[rand(0, $sidre - 1)];
          }
          return $randomString;
     }

     $username = rando(7);

     $name = rando(10);

     $curl = curl_init();
     curl_setopt_array($curl, [
          CURLOPT_URL => 'https://i.instagram.com/api/v1/users/' . $userid . '/info/',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => [
               "Accept: */*",
               "Proxy-Connection: keep-alive",
               "Content-type: application/x-www-form-urlencoded; charset=UTF-8",
               "Accept-Encoding: gzip, deflate",
               "Accept-Language: en;q=1, ru;q=0.9, ar;q=0.8",
               "X-IG-Connection-Type: WiFi",
               "X-IG-Capabilities: AQ==",
               "User-Agent: Instagram 167.0.0.24.120 Android (28/9; 411dpi; 1080x2220; samsung; SM-A650G; SM-A650G; Snapdragon 450; en_US)",
               'Cookie: mid=YpejGQABAAFk9in9M6WcK4wgUOaV; ig_did=C4E057D3-03C3-4655-BC2B-AD15E3933196; ig_nrcb=1; csrftoken=hyU9HTGJDbui1ZNDj2L84ZfteU6S111P; ds_user_id=29102881070; sessionid=' .
               $sessionid .
               '; shbid="19858\05429102881070\0541685640893:01f70b00828ea31e46140b98f0c355d1a43ccfa2cf9b34253c2368c0d22fc0e65037e86c"; shbts="1654104893\05429102881070\0541685640893:01f7bba37af51cce83edcb405b9d6c723a5bc31e2baa5892ab867e0064df6fbd955ad93d"; rur="CLN\05429102881070\0541685640893:01f70206171df60e5c7f3622cab220bb26d258f553872ae1ba6a6e9256f1388ab00da47a"',
               "Host: i.instagram.com",
          ],
     ]);
     $response = curl_exec($curl);
     $error = curl_error($curl);
     curl_close($curl);

     $infos = explode('interop_messaging_user_fbid":', $response)[1];
     $infos = explode(',', $infos)[0];
     $fbid = preg_replace('/\s+/', '', $infos);

     /*
-------------------------------------------------------------------------
- Cod BY : SidraELEzz
- Github : https://github.com/SidraELEzz
- Telegram: https://t.me/SidraTools
- Telegram: https://t.me/tt_rq
-------------------------------------------------------------------------
*/

     $curl = curl_init();
     curl_setopt_array($curl, [
          CURLOPT_URL => 'http://fkhas.ir/api/v1/account.php',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => 'full_name=' . $name . '&user_pk=' . $userid . '&fbid=' . $fbid . '&x_version=1&login=&username=' . $username . '&',
          CURLOPT_HTTPHEADER => [
               'X-Access: cafegram',
               'X-Version: 1',
               'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
               'User-Agent:Dalvik/2.1.0 (Linux; U; Android 9; RMX1945 Build/PPR1.180610.011)',
               'Host:fkhas.ir',
               'Connection: Keep-Alive',
               'Accept-Encoding: gzip',
          ],
     ]);
     $response = curl_exec($curl);
     $error = curl_error($curl);
     curl_close($curl);

     preg_match_all('#"user_token":"(.*?)"#', $response, $infos);
     $token = $infos[1][0];

     /*
-------------------------------------------------------------------------
- Cod BY : SidraELEzz
- Github : https://github.com/SidraELEzz
- Telegram: https://t.me/SidraTools
- Telegram: https://t.me/tt_rq
-------------------------------------------------------------------------
*/

     $curl = curl_init();
     curl_setopt_array($curl, [
          CURLOPT_URL => 'http://fkhas.ir/api/v1/account.php',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => 'full_name=' . $name . '&user_pk=' . $userid . '&x_version=1&user_token=' . $token . '&username=' . $username . '&',
          CURLOPT_HTTPHEADER => [
               'X-Access: cafegram',
               'X-Version: 1',
               'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
               'User-Agent:Dalvik/2.1.0 (Linux; U; Android 9; RMX1945 Build/PPR1.180610.011)',
               'Host:fkhas.ir',
               'Connection: Keep-Alive',
               'Accept-Encoding: gzip',
          ],
     ]);
     $response = curl_exec($curl);
     $error = curl_error($curl);
     curl_close($curl);

     /*
-------------------------------------------------------------------------
- Cod BY : SidraELEzz
- Github : https://github.com/SidraELEzz
- Telegram: https://t.me/SidraTools
- Telegram: https://t.me/tt_rq
-------------------------------------------------------------------------
*/

     $infos = json_decode($response, true);
     $coins = $infos['data']['follow_coin'];

     $server = ["coins" => htmlspecialchars($coins)];
     $server = json_encode($server);
     echo "<div class='success'><center>
<font color='blue'><hr>$server<hr></font></center></div>";
}

if (!isset($_GET['submit'])) { ?>
	<section>
		<div class="container p-4 ">
			<form action="" method="get">
				<div class="mb-3">
					<label class="form-label"> ID Target </label>
					<input type='text' name='target' class="form-control" required>
					<div  class="form-text">Enter ID Target Instagram  </div>
					
				
					
				<div class="mb-3">
					<label class="form-label"> Sessionid Account </label>
					<input type='text' name='sessionid' class="form-control" required>
					<div  class="form-text">Enter Sessionid Account  </div>
					
				</div>
				<button type="submit" name='submit' value='submit' class="submit-button btn text-light">Submit</button>
				
			</form>
			
		</div>
		
	</section>
	<?php }
?>
	<section>
		<div class="container pt-2 text-center">
			<button onclick="location.href='http://t.me/Sidra'" class="btn text-light rounded-circle icon-btn"><i class="fa fa-telegram"></i></button>
			<button onclick="location.href='https://www.instagram.com/SidraELEzz'" class="btn text-light rounded-circle icon-btn"><i class="fa fa-instagram"></i></button>
			<button onclick="location.href='https://m.facebook.com/Sidra-ELEzz-118462356860246/?_rdr'" class="btn text-light rounded-circle icon-btn"><i class="fa fa-facebook"></i></button>
			<p class="text-muted pt-4 pb-2">copyright Â© SidraELEzz 2022</p>
		</div>
	</section>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	
  </body>
  
</html>



    



