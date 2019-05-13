<?php
// Change your ETH address.
$url = "https://api.nanopool.org/v1/eth/user/0xfd286e89f240e9d03bcbb547bb0ac936dfec8ec4";
$url2 = "https://api.nanopool.org/v1/eth/balance/0xfd286e89f240e9d03bcbb547bb0ac936dfec8ec4";
$url3 = "https://api.nanopool.org/v1/eth/usersettings/0xfd286e89f240e9d03bcbb547bb0ac936dfec8ec4";
$url4 = "https://api.nanopool.org/v1/eth/network/lastblocknumber";
$url5 = "https://api.nanopool.org/v1/eth/pool/hashrate";
$url6 = "https://api.nanopool.org/v1/eth/pool/activeworkers";
$url7 = "https://api.nanopool.org/v1/eth/pool/activeminers";

$contents7 = file_get_contents($url7);
$contents6 = file_get_contents($url6);
$contents5 = file_get_contents($url5);
$contents4 = file_get_contents($url4);
$contents3 = file_get_contents($url3);
$contents2 = file_get_contents($url2);
$contents = file_get_contents($url);
$api1=json_decode($contents);
$api2=json_decode($contents2);
$api3=json_decode($contents3);
$api4=json_decode($contents4);
$api5=json_decode($contents5);
$api6=json_decode($contents6);
$api7=json_decode($contents7);

$lastblocknumber=$api4->data;
$hashrateworld=$api5->data;
$activeworkerssworld=$api6->data;
$activeminersworld=$api7->data;
$pay=$api3->data->payout;
$address=$api1->data->account;
$balance=$api2->data;
$hashrate=$api1->data->hashrate;
$hashrate1=$api1->data->avgHashrate->h1;
$hashrate2=$api1->data->avgHashrate->h3;
$hashrate3=$api1->data->avgHashrate->h6;
$hashrate4=$api1->data->avgHashrate->h12;
$hashrate5=$api1->data->avgHashrate->h24;

file_put_contents('mehid.txt', var_export($balance, true));



$date = date("j F Y, g:i:s");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>nanopool stats and bootstrap by Mehid Hassan</title>
  </head>
  <body>
  	<h1><strong>User stats</strong></h1>
    <p><strong>Day:</strong><br> <?php echo "$date<br>";?></p>
    <p><strong>ETH Address</strong><br> <?php echo "$address<br>";?></p>
    <p><strong>Balance</strong><br> <?php echo "$balance<br>";?></p>
    <p><strong>Payment Limit</strong><br> <?php echo "$pay<br>";?></p>
    <p><strong>Current Calculated Hashrate</strong><br> <?php echo "$hashrate<br>";?></p>
    <p><strong>Hashrate Estimatives</strong><br></p>


	<table id="tablePreview" class="table table-striped table-hover table-sm table-borderless">

  	<thead>
    <tr>
      <th>Hour</th>
      <th>Hashrate</th>
    </tr>
  	</thead>
  	
  	<tbody>
    <tr>
      <td>1 hour</td>
      <td> <?php echo "$hashrate1 MH/s<br>";?></td>

    </tr>
    <tr>
      <td>3 hours</td>
      <td> <?php echo "$hashrate2 MH/s<br>";?></td>
    </tr>

    <tr>
      <td>6 hours</td>
      <td> <?php echo "$hashrate3 MH/s<br>";?></td>
     
    </tr>
  	</tbody>

  	 <tr>
      <td>12 hours</td>
      <td><?php echo "$hashrate4 MH/s<br>";?></td>
     
    </tr>

        <tr>
      <td>24 hours</td>
      <td> <?php echo "$hashrate5 MH/s<br>";?></td>
     
    </tr>
	</table>

	<h1><strong>Network stats</strong></h1>
    <p><strong>Last block mined</strong><br> <?php echo "$lastblocknumber<br>";?></p>
    <p><strong>Number of miners</strong><br> <?php echo "$activeminersworld<br>";?></p>
    <p><strong>Number of workers</strong><br> <?php echo "$activeworkerssworld<br>";?></p>
    <p><strong>Pool hashrate</strong><br> <?php echo "$hashrateworld<br>";?></p>

    <!-- Scripts --->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>

  <footer>
  	<center><strong><p>By Mehid. Please donate for me: <br> ETH 0xfd286e89f240e9d03bcbb547bb0ac936dfec8ec4</p></strong></center>
  </footer>
</html>