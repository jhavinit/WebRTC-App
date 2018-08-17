<?php
require 'check.php';
?>


<DOCTYPE! html>
<html>
<head>
	<title>AUDIO CALL</title>
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
 		<button id="acbutt2" onclick="endcall()">END CALL</button>
 		<button id="acbutt3">RECORD CALL</button>
 		<button id="acbutt4"><a href="dashboard.html" id="aHome">HOME</a></button>
 	</div>
 </div>

 <div id="acContacts">

  <h1 id="contactHead">CONTACTS</h1><input type="text" id="search" placeholder="Search"><button id="searchButn" onclick="searchIt()">Click</button>
  <div id="contactsButts">
  	<button onclick="addContact()" id="cb1">ADD</button>
  	<button id="cb2">DELETE</button>
  	<button id="cb3">EDIT</button>
  </div>

  <div id="contactBody">
  
    <div id="displayArea">
      <p class="message">
      	<span class="message-from"></span>
      	<span class="message-body"></span>
      </p>
    </div>

    <textarea id="newMessage1" placeholder="NAME OF CONTACT" style="margin-left:43px"></textarea>
    <textarea id="newMessage2" placeholder="CALLER ID" ></textarea>
  
  </div>
	
 </div>
<!-- ------------------------------------------------------------------ -->
  <div id="remoteDiv">
      <video id="remoteVideo"  width="500" height="500" controls style="display: none"></video>
   </div>

  <div id="localDiv">
  <video id="localVideo" muted="muted" width="500" height="500" controls style="display: none"></video>
  </div>
 


</div> 

    <script src="https://rawgit.com/onsip/SIP.js/0.8.0/dist/sip-0.8.0.js"></script>
    <script src="sip-0.8.0.js"></script>
<script src="audiocallJs.js"></script>
</body>
</html>
 
