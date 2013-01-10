var chbx = 0;
var chatusers = new Array();
var unord =false;
var m = 1;
var me = '';
var ru = new Array();//users whose data is to be received
var tim;
//update users on php
function updateUsers() 
{	$.ajax({
	url:'chat/update.php',success: function(im){me=im;}});
}

$(document).ready(function(e) {
    updateUsers();
});

function toggle()
{
	$(".users_div").toggle('fast',function(){
		if($(".users_div").is(':hidden'))
			;//clearInterval(tim);
		else
			//tim=setInterval(refreshuserlist,5000);
			refreshuserlist();
	});
}
function refreshuserlist(){
	var temp = $('#chatblock').html();
	/*$('#chatblock').load('chat/users.php',function (e){
		if(e=='no')
		$('#chatblock').html(temp);
	});*/
	$.ajax({url:"chat/users.php",type:"POST",data:"users="+temp,timeout:26000,error: function(){refreshuserlist;},success: function(us)
		{
			$('#chatblock').html(us);
			//if($(".users_div").is(':visible'))
			setTimeout(refreshuserlist,7000);
		}});
	
	
}
//change chat button to list
function cb_click(){
	setInterval("$.ajax({url:'chat/update.php',success: function(im){me=im;}});",7000);
	//tim = setInterval(refreshuserlist,5000);
	$("#chat_div").hide('fast',function(){
		$("#chatbox").show('fast');
		refreshuserlist();	
	});
}
//msg to usr in parameter
function msg(usr)
{
	if(!srch(usr))
	{
		chbx++;
		$('body').append('<div class="chatboxes" id="chat_'+usr+'"><table><tr onclick="minimize(\''+usr+'\')"><td class="chat_bar" id="chat_bar_'+usr+'"><div class="chat_title">'+usr+'</div><div class="chat_option" onclick="clos(\''+usr+'\')">[X]</div></td></tr><tr class="chat_content" id="chat_content_'+usr+'"></tr><tr><td><textarea rows="1" id="chat_text_'+usr+'" class="chat_text" onkeyup="msgsend(this.value,\''+usr+'\')" ></textarea></td></tr></table></div>');
		var d = '<td style="color:gray;font-size:0.8em;">No message please chat to have some</td>';
		$("#chat_content_"+usr).html(d);
		
		//var te = crypto.btoa(d);
		var r =function()
		{
			{		
				d= $("#chat_content_"+usr).html();
				//check hash here then send receive data
				$.ajax({data:"user="+usr,type:"POST",url:"chat/receive.php",success: function(message)
				{
					if(d!=message && message!= '')
					{
						$("#chat_content_"+usr).html(message);
						d = message;
						var sc = $("#chat_content_"+usr);
						sc.scrollTop(sc[0].scrollHeight - sc.height());
					}
				}
				});
			}
		}		
		r();
		var ti = setInterval(r,1000);
		if(!unord)
		{
			chatusers.push(usr);
			ru.push(ti);
		}
		if(unord)
		{
			var count=0;
			for(var i=0;i<chatusers.length;i++)
			{
				if(chatusers[i]=='')
				{
					count++;
					if(count>1)
					{	unord =true;
						break;
					}
					chatusers[i]=usr;
					ru[i]=ti;
					var right = ((i+1)*170+(i)*35)+'px';
					unord =false;
				}	
			}
		}
		else
			var right = (chbx*170+(chbx-1)*35)+'px';	

			$("#chat_"+usr).css('right',right);
	}
}

function srch(usr)
{
	var r =false;
	for(var i=0;i<chatusers.length;i++)
	{
		if(chatusers[i]==usr)
		r=true;
	}
	return r;
}

function remov(usr)
{
		for(var i=0;i<chatusers.length;i++){
			if(chatusers[i]==usr)
			{	if(chbx!=i)
				{
					unord = true;
					chatusers[i]='';
					clearInterval(ru[i]);
				}
				else
					chatusers.splice(i,1);
					clearInterval(ru[i]);
			}	
		}
}
function clos(usr)
{
	chbx--;
	remov(usr);
	//clearInterval(r);
	$("#chat_"+usr).remove();
}
function minimize(usr)
{
	$("#chat_content_"+usr).toggle('fast');
	$("#chat_text_"+usr).toggle('fast');
}
function msgsend(message,usr)
{
	if(message.charCodeAt(message.length-1)==10)
	{		
		if(message.substring(0,message.length-1)=='')
			$("#chat_text_"+usr).attr("value",'');
		else
		{
			$("#chat_text_"+usr).attr("value",'');
			//send msg store in message var
			$("#chat_content_"+usr).append('<tr><td><b><div id="Chatfrom" class="chat_me">'+me+'</div></b><div class="chat_message">'+message+'</div></td></tr>');
			$.ajax({type:"POST",url:"chat/send.php",data:"to="+usr+"&msg="+message});
			var sc = $("#chat_content_"+usr);
			sc.scrollTop(sc[0].scrollHeight - sc.height());
		}
	}
	//20 is the default height textbox
	$("#chat_text_"+usr).height(20*(Math.floor(message.length/20)+1)); 
}
//return key of element to be search else return -1 if not found
function arrsearch(array,searchElement)
{
	for(var i=0;i<array.length;i++)
	if(array[i]==searchElement)
	return i;
	return -1;
}