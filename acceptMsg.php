<?php
require 'check.php';
?>

<DOCTYPE! html>
<html>
<head>
	<title>ACCEPT MESSAGES</title>
</head>
<body id="amsgBODY">

<link rel="stylesheet" type="text/css" href="mstyles.css">

<div id="msgcontainer">
	
	<div id="msgHeader">
		<h1 id="msghead">MESSAGING</h1>
		<div id="msgbutt">
		<button id="msgbutt1" onclick="Startmessage()">START SESSION</button>
		<button id="msgbutt2" onclick="msg()">SEND MESSAGE</button>
		<button id="msgbutt3">VIDEO CONVERT</button>
		<button id="msgbutt4" onclick="endCall()">END SESSION</button>
		</div>
	</div>

	<div id="msgLeft">
    <div id="messagesLog">
    <div id="bob-message-display" class="message-display">
      <p class="message"><span class="message-from" style="font-size:30px">Bob:</span> <span class="message-body placeholder">No messages yet</span></p>
    </div>
    <textarea placeholder="Type your message here" id="newMessage" style="opacity: 0.5"></textarea>
    </div>
		
	</div>

	<div id="msgRight">
<!-- 		CONTACTS -->
	</div>
  
    <script src="https://rawgit.com/onsip/SIP.js/0.8.0/dist/sip-0.8.0.js"></script>
    <script src="sip-0.8.0.js"></script>
    <script src="acceptMsgJS.js"></script>

</div>

</body>
</html>