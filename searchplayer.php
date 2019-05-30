<html>
<?php
ini_set('default_socket_timeout', 45);
$json_string	=	file_get_contents("http://206.221.177.194:28960/info");
$serverinfo		=	json_decode($json_string);

$json_string2	=	file_get_contents("http://206.221.177.194:28960/serverlist");
$serverlist		=	json_decode($json_string2);


?>
<head>
<script src="http://code.jquery.com/jquery-1.5.js"></script>
<script type="text/javascript">
      var TableSorter = {
    makeSortable: function(table){
        // Store context of this in the object
        var _this = this;
        var th = table.tHead, i;
        th && (th = th.rows[0]) && (th = th.cells);

        if (th){
            i = th.length;
        }else{
            return; // if no `<thead>` then do nothing
        }

        // Loop through every <th> inside the header
        while (--i >= 0) (function (i) {
            var dir = 1;

            // Append click listener to sort
            th[i].addEventListener('click', function () {
                _this._sort(table, i, (dir = 1 - dir));
            });
        }(i));
    },
    _sort: function (table, col, reverse) {
        var tb = table.tBodies[0], // use `<tbody>` to ignore `<thead>` and `<tfoot>` rows
        tr = Array.prototype.slice.call(tb.rows, 0), // put rows into array
        i;

        reverse = -((+reverse) || -1);

        // Sort rows
        tr = tr.sort(function (a, b) {
            // `-1 *` if want opposite order
            return reverse * (
                // Using `.textContent.trim()` for test
                a.cells[col].textContent.trim().localeCompare(
                    b.cells[col].textContent.trim()
                )
            );
        });

        for(i = 0; i < tr.length; ++i){
            // Append rows in new order
            tb.appendChild(tr[i]);
        }
    }
};
    </script>

<style>


 
  h1{
	  font-family: 'Abel', sans-serif;
	  margin:auto;
  }
 
  input[type=button], input[type=submit], input[type=reset] {
  background-color: #333333;
  border: none;
  color: white;
  padding: 5px 5px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  }
  
  /* Clear floats after image containers */
.row::after {
  content: "";
  clear: both;
  display: table;
}

.fullscreen-bg {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    overflow: hidden;
    z-index: -100;
}

.fullscreen-bg__video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
@media (min-aspect-ratio: 16/9) {
  .fullscreen-bg__video {
    height: 300%;
    top: -100%;
  }
}

@media (max-aspect-ratio: 16/9) {
  .fullscreen-bg__video {
    width: 300%;
    left: -100%;
  }
}


.base, .panel-container .panel, .cp-mini, .navigation a, .cp-main .pm {
    background: rgba(0, 0, 0, 0.5);
}

.base2 { /* Cat Headers */
	background: rgba(255,255,255,0.1);	
}

.tabs .tab > a {
	background: rgba(255,255,255,0.05);
}

.panel, .tabs .activetab > a, .tabs .activetab > a:hover, .navigation .active-subsection a {
	background-color: rgba(255,255,255,0.1);
}

li.row, hr, .signature, .postprofile, .pm .postprofile, .panel-container .panel li.row, fieldset.polls dl  {border-color: rgba(255,255,255,0.1);}

.post {border-color: rgba(255,255,255,0.5);}


/* Dark */

/* Main base is dynamically set in overall_header.html via H2O Control Panel */


.badge {
	background: rgba(0,0,0,0.2) !important;
}

.navbar a:hover {
	background: rgba(0,0,0,0.1);
}

/* Other */
.reported, .rules, p.post-notice, #phpbb_announcement {
	background: rgba(255,0,0,0.3) !important;	
}

.server:hover {
  background-color: #5e5e5e;
}

.hidden {
  visibility: hidden;
}

input {
    font-weight: normal;
    background-color: #6e6e6e;
}



</style>
<meta charset="UTF-8">
<link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="theme/animate.css">
<link rel="stylesheet" href="theme/base.css">
<link rel="stylesheet" href="theme/bidi.css">
<link rel="stylesheet" href="theme/buttons.css">
<link rel="stylesheet" href="theme/common.css">
<link rel="stylesheet" href="theme/fonts.css">
<link rel="stylesheet" href="theme/h2o.css">
<link rel="stylesheet" href="theme/normalize.css">
<link rel="stylesheet" href="theme/utilities.css">
<link rel="stylesheet" href="theme/icons.css">
<link rel="stylesheet" href="theme/colours.css">
<link rel="stylesheet" href="theme/icons_forums_topics.css">
<link rel="stylesheet" href="theme/links.css">
<link rel="stylesheet" href="theme/merlin.css">
<link rel="stylesheet" href="theme/opacity.css">
<link rel="stylesheet" href="theme/extensions.css">
<link rel="stylesheet" href="theme/stylesheet.css">
<link rel="stylesheet" href="theme/tooltipster.bundle.min.css">
<link rel="stylesheet" href="theme/tooltipster-sideTip-borderless.min.css">
<link rel="stylesheet" href="theme/tweaks.css">
<link rel="stylesheet" href="theme/responsive/large-desktops.css">
<link rel="stylesheet" href="theme/responsive/medium-ipad.css">
<link rel="stylesheet" href="theme/responsive/responsive.css">
<link rel="stylesheet" href="theme/responsive/small-smaller-tablets.css">
<link rel="stylesheet" href="theme/responsive/squishy.css">
<link rel="stylesheet" href="theme/responsive/xs-phones.css">
<link rel="stylesheet" href="theme/colour-presets/Orange.css">
<link rel="stylesheet" href="../assets/css/font-awesome.min.css">

<div class="fullscreen-bg">
    
        <source src="css/background.png">
    
</div>




<div class="container">
<div class="top_bar base" style="width: 85%;margin: 0 auto;">
   
    <ul class="menu">
      <li style="font-size:16px"><a style="font-size:16px" href="../index.php">Forums</a></li>
      <li style="font-size:16px"><a  style="font-size:16px" href="http://forums.verum-clutch.com/serverlist">IW4X SERVERLIST</a></li>
	  <li style="font-size:16px"><a  style="font-size:16px" href="http://forums.verum-clutch.com/serverlist/t5.php">REKT T5 SERVERLIST</a></li> 
	  <li style="font-size:16px"><a  style="font-size:16px" href="http://forums.verum-clutch.com/serverlist/t6.php">PLUTONIUM T6 SERVERLIST</a></li>  
	</ul>
	<div class="social_links_header">
    <a href="http://forums.verum-clutch.com/serverlist/searchplayer.php" class="navbar_top_search"><span class="icon fa-search"></span></a>    </div>
</div>
</br>
</br>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" style="margin-left:1%;">
  <font color="white">Name: </font> <input type="text" name="fname" required></br>
  <font color="white">Game: </font>
<select name="game">
    <option value="IW4X">IW4X</option>
    <option value="T6">T6</option>
</select>
  <input type="submit">
</form>


<table class="container" id="tablelist" style="width: 50%;margin: 0 auto;">
<thead>
<tr>
<th onclick="table_sort(people, 0, asc1); asc1 *= -1; asc2 = 1; asc3 = 1;" scope="col">PLAYER</th>
<th onclick="table_sort(people, 0, asc1); asc1 *= -1; asc2 = 1; asc3 = 1;" scope="col">SERVER</th>
<th onclick="table_sort(people, 0, asc1); asc1 *= -1; asc2 = 1; asc3 = 1;" scope="col">JOIN</th>
</tr>
</thead>
<tbody>
<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $name = htmlspecialchars($_REQUEST['fname']); 
	$game = htmlspecialchars($_REQUEST['game']);
	$needle = $name;
	
	
}

if(isset($_POST['game']) && $_POST['game'] == "IW4X")
{
	$ch = curl_init('http://206.221.177.194:28960/serverlist'); // Once again Starting point that acts like masterserver, can be any other game server.
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 5);
	$data = curl_exec($ch);
	$http = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	if(curl_errno($ch) == 0 AND $http == 200) {
	$serverinfo = json_decode($data,true);
	}

$playernum = 0;
	
	foreach($serverlist as $value)
					{		
						
					if($value != "192.223.27.163:28962" && $value != "192.223.27.163:28961" 
					&& $value != "192.223.27.163:28960" && $value != "192.223.27.163:28963" && $value != "192.223.27.163:28964"
					&& $value != "192.223.27.163:28965" && $value != "71.231.105.102:28974" && $value != "71.231.105.102:28978"
					&& $value != "71.231.105.102:28977" && $value != "71.231.105.102:28975" && $value != "116.203.58.65:28962"
					&& $value != "149.202.86.115:28963" && $value != "149.202.86.115:28961" && $value != "149.202.86.115:28964"
					&& $value != "139.99.130.37:28960"  && $value != "116.203.58.65:28960"  && $value != "149.202.86.115:28962"
					&& $value != "71.231.105.102:28973" && $value != "95.188.71.27:28971"   && $value != "18.231.179.140:28960"
					&& $value != "116.203.58.65:28961"  && $value != "3.122.180.40:28961"   && $value != "51.38.98.28:28962"
					&& $value != "192.159.65.156:28963" && $value != "192.159.65.156:28963" && $value != "149.202.86.115:28960"
					&& $value != "51.38.98.28:28960"    && $value != "77.255.21.134:28960"  && $value != "51.38.98.28:28963"
					&& $value != "51.38.98.28:28964"    && $value != "70.42.74.241:28961"   && $value != "51.38.98.28:28961"
					&& $value != "75.30.89.226:28961"   && $value != "159.253.117.169:28960"&& $value != "13.234.119.143:28960"
					&& $value != "127.0.0.1:28960"      && $value != "127.0.0.1:28970"      && $value != "127.0.0.1:28965"
					&& $value != "127.0.0.1:28975")
					{
						
						
						$ch = curl_init('http://' . $value . '/info');
						curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($ch, CURLOPT_TIMEOUT, 5);
						$data = curl_exec($ch);
						$http = curl_getinfo($ch, CURLINFO_HTTP_CODE);
						if(curl_errno($ch) == 0 AND $http == 200) {
						$serverinfo = json_decode($data,true);
						}
						if(isset($serverinfo['status']['sv_hostname'])){
						$serverinfo['status']['sv_hostname'] = str_replace(array('^:','^1','^2','^3','^4','^5','^6','^7','^8','^9','^0'), '',$serverinfo['status']['sv_hostname']);
						}
						if(isset($serverinfo['players']))
						{
						foreach($serverinfo['players'] as $value2)
						{
						$value2['name'] = str_replace(array('^:','^1','^2','^3','^4','^5','^6','^7','^8','^9','^0'), '',$value2['name']);
						if (stripos($value2['name'], $needle) !== false) 
						{
						echo '<tr>';
						echo '<td data-label="PLAYER">'.$value2['name'].'</td>';
						echo '<td class="server" data-label="SERVERNAME"><a target="_blank" style="color:white;text-decoration: none" href="serverinfo.php?id=' . $value . '">' .  $serverinfo['status']['sv_hostname']  . '</a></td>';
						echo '<td>';
						echo '<form action="iw4x://"' . $value . '>';
						echo '<input type="submit" value="Connect" />';
						echo '</form>';
						echo '</td>';
						echo '</tr>';
						
						$playernum = $playernum + 1;
						
					}
					}
					}
					}
					}
					if($playernum == 1)
					{
						echo '<h1 style="color:#cecece">Found '.$playernum.' player containing word '.$name.'</h2>';
					}
					else
					{
						echo '<h1 style="color:#cecece">Found '.$playernum.' players containing word '.$name.'</h2>';
					}
					
}
else if(isset($_POST['game']) && $_POST['game'] == "T6")
{
	$ch = curl_init('https://kerberos.plutonium.pw/servers'); //Plutonium masterserver API
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 5);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
	$data = curl_exec($ch);
	$http = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	if(curl_errno($ch) == 0 AND $http == 200) {
	$serverlist = json_decode($data,true);
	}
	else{
		print curl_errno($ch);
	}
	
	$playernum1 = 0;
	foreach($serverlist['servers'] as $server)
	{
		$server['hostname'] = str_replace(array('^:','^1','^2','^3','^4','^5','^6','^7','^8','^9','^0'), '',$server['hostname']);
		$arr = array($server['ip'],$server['port']);
		$ipaddress = implode(":",$arr);
		
		foreach($server['players'] as $key => $value2)
		{
			if (stripos($value2['name'], $needle) !== false) 
			{
			$value2['name'] = str_replace(array('^:','^1','^2','^3','^4','^5','^6','^7','^8','^9','^0'), '',$value2['name']);
			echo '<tr>';
			echo '<td data-label="PLAYER">'.$value2['name'].'</td>';
			echo '<td class="server" data-label="SERVERNAME"><a target="_blank" style="color:white;text-decoration: none" href="t6serverinfo.php?id=' . $ipaddress . '">' .  $server['hostname']  . '</a></td>';
			echo '<td data-label="IPADDRESS">'.$ipaddress.'</td>';
			echo '</tr>';
			
			$playernum1 = $playernum1 + 1;
			}
		}
	}
	
	
	if($playernum1 == 1)
					{
						echo '<h1 style="color:#cecece">Found '.$playernum1.' player containing word '.$name.'</h2>';
					}
					else
					{
						echo '<h1 style="color:#cecece">Found '.$playernum1.' players containing word '.$name.'</h2>';
					}
	
}
	
?>

</br>
</br>
</tbody>
</table>
<style>
.fa {
    margin-top: 24%;
}
.icon, .button .icon {
    margin-top: 24%;
}
</style>
<a href="#" class="scrollToTop" style="display: inline-block;"><span class="fa fa-arrow-up"></span></a>
</head>
<body>
</body>
</html>