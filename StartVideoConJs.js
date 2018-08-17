var userAgent = new SIP.UA({
    traceSip: true,
   uri: 'alice.123@sipjs.onsip.com',
   displayName: 'Alice'
});
 
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

 











 