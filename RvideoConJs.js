var userAgent = new SIP.UA({                // creating the user agent
    traceSip: true,
	/*uri: '7016@pbx.telelabs.com',
	authorizationUser: '7016',
	password: '1234',
	wsServers: 'wss://pbx.telelabs.com:443',
	*/
	uri: 'bob.112@sipjs.onsip.com',
	displayName: 'Alice'
});

var flag=0;
var session1;

userAgent.on('invite', function(session) {
  session1 = session;
  session.accept();
  var flag=1;
    startVideoCall();
});

userAgent.on('message', function(msg){                                    // recieving msgs from bob
	var uri = "" + msg.body;   // createmsgtag recieves display name and msg of bob.                     // append the recieved messages by whom and msg to  log area    
    var session = userAgent.invite(uri);
    flag=1;
    session1 = session;
    startVideoCall();
});


function startVideoCall(){
      if(flag==1){
		var node = document.createElement("video");
		var videos = document.getElementById("videos");
		node.height = 300;
		node.width = 654;
		node.controls = true;
		node.style.border = "thick solid brown";
		node.style.marginLeft = "10px";
        node.style.marginBottom = "10px";

		//document.getElementById("videos").appendChild(node);
		var pc = session1.sessionDescriptionHandler.peerConnection;
		// Gets remote tracks
		var remoteStream = new MediaStream();
		pc.getReceivers().forEach(function(receiver) {
		remoteStream.addTrack(receiver.track);
		});
		node.srcObject = remoteStream;
		node.play();
  		videos.appendChild(node);
        flag=0;
 }
 flag=1;
}

// ==============================================

function adminSwitch(){
var j; 
var list=[];
var uRi;
var session1;
var newDiv; 
var newURI;

function start(){
uRi=prompt("whom do you want to start a session with?");
list.push(uRi);
newURI=uRi+'@sipjs.onsip.com';
session1 = userAgent.invite(newURI);
newDiv=document.getElementById('newStream');
}
 

function show(){
	if((list.length)>1)
{
	for(j=0;j<(list.length)-1;j++)
   { 
   	userAgent.message(list[j],newURI);
    }
 }
    //create the video stream element
    var vid1 = document.createElement("VIDEO");
    vid1.className = 'remoteVideo1';
    vid1.height=300;
    vid1.width=654;
    vid1.style.border = "thick solid brown";
    vid1.controls=true;
    vid1.style.marginLeft = "10px";
    vid1.style.marginBottom = "10px";
     //establishing the peer connection
    var pc1 = session1.sessionDescriptionHandler.peerConnection;
    //create a new stream

    //gets remote stream
    var remoteStream1 = new MediaStream();
	pc1.getReceivers().forEach(function(receiver) {
	remoteStream1.addTrack(receiver.track);
	});
	vid1.srcObject = remoteStream1;
	vid1.play();
 
 	newDiv.appendChild(vid1);  
}
}