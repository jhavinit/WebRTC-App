<?php
require 'check.php';
?>


<DOCTYPE! html>
<html>
<head>
	<title>RECIEVE AUDIO CALL</title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="acStyle.css">

<div id="acContainer">
 
 <div id="phone">
    <div id="oooo">O&nbsp&nbsp&nbsp&nbspO&nbsp&nbsp&nbsp&nbspO&nbsp&nbsp&nbsp&nbspO&nbsp&nbsp&nbsp&nbsp</div>
 	<h1 id="achead">WebRTC APP

</h1>

<div id="f1_container">
<div id="f1_card" class="shadow">
  <div class="front face">
 <img src="images/w.png" id="callimg">
  </div>
  <div class="back face center">
  	<img src="images/back.jpg"  id="callimg">
  </div>
</div>
</div>

 	<div id="acbutts">
 		<button id="acbutt1" onclick="startAudioCall()">START VOICE CALL</button>
 		<button id="acbutt2" onclick="endCall()">END CALL</button>
 		<button id="acbutt3">RECORD CALL</button>
 	</div> 	
 </div>
</div>

<div id="remoteDiv">
      <video id="remoteVideo"  width="500" height="500" controls style="display: none"></video>
   </div>
 <div id="localDiv">
  <video id="localVideo" muted="muted" width="500" height="500" controls style="display: none"></video>
  </div>
 

    <script src="https://rawgit.com/onsip/SIP.js/0.8.0/dist/sip-0.8.0.js"></script>
    <script src="sip-0.8.0.js"></script>
<script src="RaudiocallJs.js"></script>
</body>
</html>
