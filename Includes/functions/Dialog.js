/****************************************************
 * Project:     Svenska
 * Filename:    Dialog.js
 * Encoding:    UTF-8
 * Created:     2015-11-19
 *
 * Author       https://www.developphp.com/video/JavaScript/Custom-Confirm-Box-Programming-Tutorial
 ***************************************************/

function CustomAlert(){
	this.render = function(dialog){
            var winW = window.innerWidth;
	    var winH = window.innerHeight;
            var dialogoverlay = document.getElementById('dialogoverlay');
	    var dialogbox = document.getElementById('dialogbox');
            
            dialogoverlay.style.display = "block";
	    dialogoverlay.style.height = winH+"px";
            dialogbox.style.left = (winW/2) - (550 * .5)+"px";
	    dialogbox.style.top = "100px";
	    dialogbox.style.display = "block";
            
            document.getElementById('dialogboxhead').innerHTML = "Acknowledge This Message";
	    document.getElementById('dialogboxbody').innerHTML = dialog;
            document.getElementById('dialogboxfoot').innerHTML = '<button onclick="Alert.ok()">OK</button>';
	}
	this.ok = function(){
		document.getElementById('dialogbox').style.display = "none";
		document.getElementById('dialogoverlay').style.display = "none";
	}
}

var Alert = new CustomAlert();

function deletePost(id){
	var db_id = id.replace("post_", "");
	// Run Ajax request here to delete post from database
	document.body.removeChild(document.getElementById(id));
}
function CustomConfirm(){
	this.render = function(dialog,op,id){
            var winW = window.innerWidth;
	    var winH = window.innerHeight;
            var dialogoverlay = document.getElementById('dialogoverlay');
	    var dialogbox = document.getElementById('dialogbox');
            
            dialogoverlay.style.display = "block";
	    dialogoverlay.style.height = winH+"px";
            dialogbox.style.left = (winW/2) - (550 * .5)+"px";
	    dialogbox.style.top = "100px";
	    dialogbox.style.display = "block";
		
            document.getElementById('dialogboxhead').innerHTML = "Confirm that action";
	    document.getElementById('dialogboxbody').innerHTML = dialog;
            document.getElementById('dialogboxfoot').innerHTML = '<button onclick="Confirm.yes(\''+op+'\',\''+id+'\')">Yes</button> <button onclick="Confirm.no()">No</button>';
	}
	this.no = function(){
		document.getElementById('dialogbox').style.display = "none";
		document.getElementById('dialogoverlay').style.display = "none";
	}
	this.yes = function(op,id){
		if(op == "delete_post"){
			deletePost(id);
		}
		document.getElementById('dialogbox').style.display = "none";
		document.getElementById('dialogoverlay').style.display = "none";
	}
}
var Confirm = new CustomConfirm();

