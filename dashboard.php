<?php
require 'check.php';
?>

<DOCTYPE! html>
<html>
<head>
	<title>Dashboard</title>
</head>
<body id="dbBody">

<link rel="stylesheet" type="text/css" href="styles.css">

<div id="dashcontainer">
	
	<div id="dbheader">
	    <a href="http://www.uiet.puchd.ac.in/"><img src="images/uiet.jpg" id="uiet_image"></a>
		<h1 id="td">WebRTC APP</h1>
        <div id="personal"> 
        <!-- <h3 id="user_name">HELLO <?php echo $_SESSION['Username']?><br><a href="login.php">Log Out</a></h3>-->
        <h3 style="margin-top: 24px">HOWDY <?php echo $_SESSION['Username']?> &nbsp !</h3> 
        <img src="dp/<?php echo $_SESSION["CallerId"]?>" id="user_dp" onmouseover="over()">
        <div id="setOnHover" style="display: none"><h3 style="margin-top: -27px;">CALLER ID:<?php echo $_SESSION["CallerId"]?></h3>
            <a href="login.php"><button style="width:100px">Log Out</button></a>
        </div>
        </div>
	</div>

<h2 id="ds">DASHBOARD</h2>

	<div id="leftPart">
		
		<div id="vam"><a href="calling.php"><button id="vamtext">VIDEO | AUDIO | MESSAGES</button></a><video controls loop autoplay="autoplay" id="vamVideo"><source src="images/vam.mp4"></video></div>
    
    <div id="m"><a href="message.php"><button id="mtext">MESSAGING</button></a><video controls loop autoplay="autoplay" id="mVideo"><source src="images/text.mp4"></video></div>
<!-- 
    <div id="vc"><button id="vctext">VIDEO CALL</button><video controls loop autoplay="autoplay" id="vcVideo"><source src="images/vdcall.mp4"></video></div> -->

     
    <div id="ac"><a href="audiocall.php"><button id="actext">AUDIO CALL</button></a><video controls loop autoplay="autoplay" id="acVideo"><source src="images/adcall.mp4"></video></div>

	</div>
	
	<div id="rightPart">
		

        <div>
        	<video controls loop id="vid" autoplay="autoplay"></video><button onclick="see()" id="seebtn">SEE THROUGH WEBCAM</button>
        </div>
    
     <div id="newFeature">
        	<h3 id="gpchat">VIDEO CONFERENCING</h3> 
            <a href="StartVideoCon.html"><button>START A NEW CONFERENCE</button></a>
            <article>
               <center> <h2 id="instruc">INSTRUCTIONS</h2></center><br> 
                <div id="Icontent">
                1. Always allow the browser to access camera and mic.<br>
                2. Always click on show next video after step 1.<br>
                3. For accepting video conferencing click<i> "GO TO CONFERENCE "</i>.
                </div><br><br>

            <a href="RvideoCon.html"><button>GO TO CONFERENCE </button></a>

            </article>
    </div>
   
    <script type="text/javascript">
        function over(){
            document.getElementById('setOnHover').style.display="block";
        }
        
    </script>

    <script src="https://rawgit.com/onsip/SIP.js/0.8.0/dist/sip-0.8.0.js"></script>
    <script src="sip-0.8.0.js"></script>
    <script src="dbCode.js"></script> 
</div>

</body>
</html>
