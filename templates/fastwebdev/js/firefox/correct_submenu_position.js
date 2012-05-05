// JavaScript Document
//for Firefox:
function correctPosition(tdMenu){
	var aMenu=tdMenu.getElementsByTagName('div')[0]; //submenu
	var b=tdMenu.getBoundingClientRect();
	var leftPos=Math.round(b.left);	
	var eHeight=Math.round(tdMenu.offsetHeight); 
	var eTop=Math.round(b.top); 	
	var eWidth=Math.round(tdMenu.offsetWidth); 
	pLeft=leftPos-eWidth;
	aMenu.style.left=pLeft+'px';
	aMenu.style.top=eHeight+eTop-4+'px';
}
