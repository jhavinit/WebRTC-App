var bo;
var userAgent = new SIP.UA({                            // creating user agent 
    traceSip: true,
   // uri: '7020@192.168.54.112',
   // authorizationUser: '7020',
   // password: '1234',
   // wsServers: 'ws://192.168.54.112:5066',
   uri:'bob.111@sipjs.onsip.com',
    displayName: 'Bob'
});

var session1;

userAgent.on('invite', function(session) {
  session1 = session;
  session.accept();
});

var remoteVideo = document.getElementById('remoteVideo');        // getting elements from html
var localVideo = document.getElementById('localVideo');


function startVideoCall(){
    var pc = session1.sessionDescriptionHandler.peerConnection;
	// Gets remote tracks
	var remoteStream = new MediaStream();
	pc.getReceivers().forEach(function(receiver) {
	remoteStream.addTrack(receiver.track);
	});
	remoteVideo.srcObject = remoteStream;
	remoteVideo.play();

	// Gets local tracks
	var localStream = new MediaStream();
	pc.getSenders().forEach(function(sender) {
	localStream.addTrack(sender.track);
	});
	localVideo.srcObject = localStream;
	localVideo.play();
}

userAgent.on('message', function(msg){
  bo=0;
	var msgTag = createMsgTag(msg.remoteIdentity.displayName, msg.body);
	messageRender.style.color="red";
   messageRender.style.fontSize="x-large";
    messageRender.appendChild(msgTag);
});

var messageRender = document.getElementById("bob-message-display");

function msg(){
  bo=1;
	var text = document.getElementById("newMessage");
	userAgent.message("alice.123@sipjs.onsip.com", text.value);
	var msgTag = createMsgTag("Bob", text.value);
	messageRender.style.color="green";
   messageRender.style.fontSize="x-large";
    messageRender.appendChild(msgTag);
    text.value = ""; 
}

function createMsgTag(from, msgBody) {
    var msgTag = document.createElement('p');
    msgTag.className = 'message';
    // Create the "from" section
    var fromTag = document.createElement('span');
    fromTag.className = 'message-from';
    
    fromTag.style.fontSize="x-large";
    if(bo==0)
        {fromTag.style.color="brown";
          fromTag.appendChild(document.createTextNode(from + ':'));
          }
     if(bo==1)
        {fromTag.style.color="violet";
         fromTag.appendChild(document.createTextNode(from + ':'));
         }

    // Create the message body
    var msgBodyTag = document.createElement('span');
    msgBodyTag.className = 'message-body';
    if(bo==0)
    {
    msgBodyTag.appendChild(document.createTextNode(' ' + msgBody));
   }
   if(bo==1)
    {
    msgBodyTag.appendChild(document.createTextNode(' ' + msgBody));
   }
    // Put everything in the message tag
    msgTag.appendChild(fromTag);
    msgTag.appendChild(msgBodyTag);
    if(bo==0){
        msgTag.style.cssFloat="right";
    }

    if(bo==1){
        msgTag.style.cssFloat="left";
    }
    
    return msgTag;
}

function endcall(){
	session.terminate();
}
 