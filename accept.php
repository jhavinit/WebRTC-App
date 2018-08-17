<?php
require 'check.php';
?>


<DOCTYPE! html>
  <head>
    <title>Recieving</title>
  </head>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <body id="callBody">
   
    <div id="callContainer">

    
  <div id="callHead">
    <h1 id="callHeading">WEB APP</h1>
    <div id="buttons">
    <button id="butt1"><a href="dashboard.html" id="gtd" style="color: white">GO TO DASHBOARD</a></button>&nbsp&nbsp
    <button id="butt2" onclick="startVideoCall()">START VIDEO CALL</button>&nbsp&nbsp
    <button id="butt3" onclick="msg()">SEND MESSAGE</button>&nbsp&nbsp
    <button id="butt4" onclick="endcall()">END CALL</button>&nbsp&nbsp
    </div>
  </div>


     <div id="actionArea">

      <div id="remoteDiv">
    
     <video id="remoteVideo"  width="500" height="500" controls></video>
   </div>

   <div id="messagesLog">
    <div id="bob-message-display" class="message-display">
      <p class="message"><span class="message-from" style="font-size:40px"></span> <span class="message-body placeholder"></span></p>
    </div>
    <textarea placeholder="Type your message here" id="newMessage" style="opacity: 0.5"></textarea>
    <br>
   </div>

   <div id="localDiv">
    <video id="localVideo" muted="muted" width="500" height="500" controls></video>
  </div>

   
   </div>

    <script src="https://rawgit.com/onsip/SIP.js/0.8.0/dist/sip-0.8.0.js"></script>
    <script src="sip-0.8.0.js"></script>
    <script src="acceptJs.js"></script>
  </div>
  </body>
</html>