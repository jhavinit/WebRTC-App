var al;

var userAgent = new SIP.UA({                // creating the user agent
    traceSip: true,
    //uri: '7015@192.168.54.112',
    //authorizationUser: '7015',
    //password: '1234',
    //wsServers: 'ws://192.168.54.112:5066',
   uri: 'alice.123@sipjs.onsip.com',
   displayName: 'Alice'
});


var session = userAgent.invite('bob.111@sipjs.onsip.com');    // sending the invite request

var remoteVideo = document.getElementById('remoteVideo');        // getting elements from html
var localVideo = document.getElementById('localVideo');

function startVideoCall(){
    var pc = session.sessionDescriptionHandler.peerConnection;      // creating a peer connection with client

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

var messageRender = document.getElementById("alice-message-display");


userAgent.on('message', function(msg){
    al=0;                                                                   // recieving msgs from bob
	var msgTag = createMsgTag(msg.remoteIdentity.displayName, msg.body);   // createmsgtag recieves display name and msg of bob.
	messageRender.style.color="red";
    messageRender.style.fontSize="x-large";
    messageRender.appendChild(msgTag);                          // append the recieved messages by whom and msg to  log area    
});

function message(){
    al=1;
	var text = document.getElementById("newMessage");                 //textarea id
	userAgent.message("bob.111@sipjs.onsip.com", text.value);         
	var msgTag = createMsgTag("Alice", text.value);                      //appending alices own text to log
    messageRender.style.color="green";
    messageRender.style.fontSize="x-large";
    messageRender.appendChild(msgTag);                                //appending alices own text to log
    text.value = "";
                           
}

function createMsgTag(from, msgBody) {
    var msgTag = document.createElement('p');
    msgTag.className = 'message';
    // Create the "from" section
    var fromTag = document.createElement('span');
    fromTag.className = 'message-from';
    fromTag.style.fontSize="x-large";
    if(al==0)
        {fromTag.style.color="brown";
          fromTag.appendChild(document.createTextNode(from + ':'));
          }
     if(al==1)
        {fromTag.style.color="violet";
         fromTag.appendChild(document.createTextNode(from + ':'));
         }

    // Create the message body
    var msgBodyTag = document.createElement('span');
    msgBodyTag.className = 'message-body';
    if(al==0)
    {
    msgBodyTag.appendChild(document.createTextNode(' ' + msgBody));
   }
   if(al==1)
    {
    msgBodyTag.appendChild(document.createTextNode(' ' + msgBody));
   }
    // Put everything in the message tag
    msgTag.appendChild(fromTag);
    msgTag.appendChild(msgBodyTag);
    if(al==0){
        msgTag.style.cssFloat="right";
    }

    if(al==1){
        msgTag.style.cssFloat="left";
    }
    return msgTag;
}
function endcall(){
	session.terminate();
}
// simple.on('ended', function() {
//         remoteVideoElement.style.visibility = 'hidden';
//         button.firstChild.nodeValue = 'video';
//     });


