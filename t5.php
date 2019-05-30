
<?php
ini_set('default_socket_timeout', 45);
$json_string	=	file_get_contents("http://api.raidmax.org:5000/instance");
$serverlist		=	json_decode($json_string,true);


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<header>
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

</header>
<body background="css/background.png">
<div class="container">
<div class="top_bar base" style="width: 85%;margin: 0 auto;">
   
    <ul class="menu">
      <li style="font-size:16px"><a style="font-size:16px" href="../index.php">Forums</a></li>
      <li style="font-size:16px"><a  style="font-size:16px" href="http://forums.verum-clutch.com/serverlist">IW4X SERVERLIST</a></li>
	  <li style="font-size:16px" class="active"><a  style="font-size:16px" href="http://forums.verum-clutch.com/serverlist/t5.php">REKT T5 SERVERLIST</a></li> 
	  <li style="font-size:16px"><a  style="font-size:16px" href="http://forums.verum-clutch.com/serverlist/t6.php">PLUTONIUM T6 SERVERLIST</a></li>  
	</ul>
	<div class="social_links_header">
    <a href="http://forums.verum-clutch.com/serverlist/searchplayer.php" class="navbar_top_search"><span class="icon fa-search"></span></a>    </div>
</div>
</br>
</div>
</br>
<div class="here">
<table class="container" id="tablelist" style="width: 85%;margin: 0 auto;">
<thead>
<tr>
<th onclick="table_sort(people, 0, asc1); asc1 *= -1; asc2 = 1; asc3 = 1;" scope="col">SERVERNAME</th>
<th onclick="table_sort(people, 0, asc1); asc1 *= -1; asc2 = 1; asc3 = 1;" scope="col">LOCATION</th>
<th onclick="table_sort(people, 0, asc1); asc1 *= -1; asc2 = 1; asc3 = 1;" scope="col">GAMETYPE</th>
<th onclick="table_sort(people, 0, asc1); asc1 *= -1; asc2 = 1; asc3 = 1;" scope="col">MAPNAME</th>
<th onclick="table_sort(people, 0, asc1); asc1 *= -1; asc2 = 1; asc3 = 1;" scope="col">IP ADDRESS</th>
<th onclick="table_sort(people, 0, asc1); asc1 *= -1; asc2 = 1; asc3 = 1;" scope="col">PLAYERS</th>
</tr>
</thead>
<tbody>
<?php
	$servers = 0;
	$players = 0;
	
	foreach($serverlist as $serverinfo)
	{
		
		foreach($serverinfo['servers'] as $server)
		{
			
			if($server['game'] == "T5" || $server['game'] == "T5M")
			{
			echo '<tr>';
			$json_str	=	file_get_contents('http://extreme-ip-lookup.com/json/' .$server['ip']);
			$location	=	json_decode($json_str,true);
			
			switch ($server['map'])
            {
                case "mp_array": $server['map'] = str_replace($server['map'], "Array",$server['map']); break;
                case "mp_berlinwall2": $server['map'] = str_replace($server['map'], "Berlin Wall",$server['map']); break;
                case "mp_gridlock": $server['map'] = str_replace($server['map'], "Convoy",$server['map']); break;
                case "mp_cracked": $server['map'] = str_replace($server['map'], "Cracked",$server['map']); break;
                case "mp_crisis": $server['map'] = str_replace($server['map'], "Crisis",$server['map']); break;
				case "mp_discovery": $server['map'] = str_replace($server['map'], "Discovery",$server['map']); break;
                case "mp_drivein": $server['map'] = str_replace($server['map'], "Drive-In",$server['map']); break;
                case "mp_firingrange": $server['map'] = str_replace($server['map'], "Firing Range",$server['map']); break;
                case "mp_duga": $server['map'] = str_replace($server['map'], "Grid",$server['map']); break;
                case "mp_area51": $server['map'] = str_replace($server['map'], "Hangar 18",$server['map']); break;
                case "mp_hanoi": $server['map'] = str_replace($server['map'], "Hanoi",$server['map']); break;
                case "mp_golfcourse": $server['map'] = str_replace($server['map'], "Hazard",$server['map']); break;
                case "mp_hotel": $server['map'] = str_replace($server['map'], "Hotel",$server['map']); break;
                case "mp_havoc": $server['map'] = str_replace($server['map'], "Jungle",$server['map']); break;
                case "mp_kowloon": $server['map'] = str_replace($server['map'], "Kowloon",$server['map']); break;
                case "mp_cosmodrome": $server['map'] = str_replace($server['map'], "Launch",$server['map']); break;
                case "mp_nuked": $server['map'] = str_replace($server['map'], "Nuketown",$server['map']); break;
                case "mp_radiation": $server['map'] = str_replace($server['map'], "Radiation",$server['map']); break;
                case "mp_silo": $server['map'] = str_replace($server['map'], "Silo",$server['map']); break;
                case "mp_stadium": $server['map'] = str_replace($server['map'], "Stadium",$server['map']); break;
                case "mp_outskirts": $server['map'] = str_replace($server['map'], "Stockpile",$server['map']); break;
                case "mp_mountain": $server['map'] = str_replace($server['map'], "Summit",$server['map']); break;
                case "mp_villa": $server['map'] = str_replace($server['map'], "Villa",$server['map']); break;
                case "mp_russianbase": $server['map'] = str_replace($server['map'], "WMD",$server['map']); break;
                case "mp_zoo": $server['map'] = str_replace($server['map'], "Zoo",$server['map']); break;
				case "mp_cairo": $server['map'] = str_replace($server['map'], "Havana",$server['map']); break;
                default: $server['map']; break;
            }
			
			
			echo '<td data-label="SERVERNAME">'.$server['hostname'].'</td>';
			echo '<td data-label="LOCATION"><span class="hidden">'.  $location['countryCode']  .'</span><span><img title="'.$location['country'].'" src="https://www.countryflags.io/' .  $location['countryCode']  . '/shiny/32.png"></span></td>';
			
				switch ($server['gametype'])
            {
                case "tdm": $server['gametype'] = str_replace($server['gametype'], "Team Deathmatch",$server['gametype']); break;
                case "dm": $server['gametype'] = str_replace($server['gametype'], "Free For All",$server['gametype']); break;
                case "koth": $server['gametype'] = str_replace($server['gametype'], "Headquarters",$server['gametype']); break;
                case "shrp": $server['gametype'] = str_replace($server['gametype'], "Sharpshooter",$server['gametype']); break;
				case "dem": $server['gametype'] = str_replace($server['gametype'], "Demolition",$server['gametype']); break;
				case "gun": $server['gametype'] = str_replace($server['gametype'], "Gun Game",$server['gametype']); break;
				case "oic": $server['gametype'] = str_replace($server['gametype'], "One in the Chamber",$server['gametype']); break;
				case "sas": $server['gametype'] = str_replace($server['gametype'], "Sticks and Stones",$server['gametype']); break;
				case "sd": $server['gametype'] = str_replace($server['gametype'], "Search And Destroy",$server['gametype']); break;
                case "gtnw": $server['gametype'] = str_replace($server['gametype'], "Global Termonuclear War",$server['gametype']); break;
                case "oneflag": $server['gametype'] = str_replace($server['gametype'], "One Flag - Capture The Flag",$server['gametype']); break;
                case "ctf": $server['gametype'] = str_replace($server['gametype'], "Capture The Flag",$server['gametype']); break;
                case "sab": $server['gametype'] = str_replace($server['gametype'], "Sabotage",$server['gametype']); break;
                case "vip": $server['gametype'] = str_replace($server['gametype'], "VIP",$server['gametype']); break;
                default: $server['gametype']; break;
            }
			
			
			echo '<td data-label="GAMETYPE">'.$server['gametype'].'</td>';
			echo '<td data-label="MAPNAME">'.$server['map'].'</td>';
			echo '<td data-label="IP ADDRESS">'.$server['ip'].':'.$server['port'].'</td>';
			if($server['clientnum'] < 10 && $server['clientnum'] != 0 )
			{
			echo '<td data-label="PLAYERS"><p class="hidden">0</p>'.$server['clientnum'].'/'.$server['maxclientnum'].'</td>';
			}
			else
			{
			echo '<td data-label="PLAYERS">'.$server['clientnum'].'/'.$server['maxclientnum'].'</td>';
			}
			echo '</tr>';
			
			$servers = $servers + 1;
			$players = $players + $server['clientnum'];
			}
		}
		
	}

echo '<h1 style="color:#cecece">'.$servers.' SERVERS - '.$players.' PLAYERS</h1>';
?>
</br>
</tbody>
</table>
<script>
window.onload = function(){
   TableSorter.makeSortable(document.getElementById("tablelist"));
};
</script>
</div>

<a href="#" class="scrollToTop" style="display: inline-block;"><span class="fa fa-arrow-up"></span></a>

</head>
<body>
</body>
</html>


