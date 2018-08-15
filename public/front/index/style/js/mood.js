var moodzt = "0";
var http_request = false;
function makeRequest(url, functionName, httpType, sendData) {

	http_request = false;
	if (!httpType) httpType = "GET";

	if (window.XMLHttpRequest) { // Non-IE...
		http_request = new XMLHttpRequest();
		if (http_request.overrideMimeType) {
			http_request.overrideMimeType('text/plain');
		}
	} else if (window.ActiveXObject) { // IE
		try {
			http_request = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				http_request = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {}
		}
	}

	if (!http_request) {
		alert('Cannot send an XMLHTTP request');
		return false;
	}

	var changefunc="http_request.onreadystatechange = "+functionName;
	eval (changefunc);
	http_request.open(httpType, url, true);
	http_request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	http_request.send(sendData);
}
function _$_() {
  var elements = new Array();

  for (var i = 0; i < arguments.length; i++) {
    var element = arguments[i];
    if (typeof element == 'string')
      element = document.getElementById(element);

    if (arguments.length == 1)
      return element;

    elements.push(element);
  }

  return elements;
}
function get_mood(mood_id)
{
	if(moodzt == "1") 
	{
		alert("您已经投过票，请不要重复投票！");
	}
	else {
		url = "/e/extend/mood/?action=mood&classid="+Cid+"&id="+Id+"&typee="+mood_id+"&m=" + Math.random();
		makeRequest(url,'return_review1','GET','');
		moodzt = "1";
	}
}
function remood()
{
	url = "/e/extend/mood/?action=show&id="+Id+"&classid="+Cid+"&m=" + Math.random();
	makeRequest(url,'return_review1','GET','');
}
function return_review1(ajax)
{
	if (http_request.readyState == 4) {
		if (http_request.status == 200) {
			var str_error_num = http_request.responseText;
			if(str_error_num=="error")
			{
				alert("抱歉，系统错误!");
			}
			else if(str_error_num==0)
			{
				alert("您已经投过票，请不要重复投票！");
			}
			else
			{
				moodinner(str_error_num);
			}
		} else {
			alert('There was a problem with the request.');
		}
	}
}
function moodinner(moodtext)
{
	var heightz = "50";	//100%时的高
	var hmax = 0;
	var hmaxpx = 0;
	var heightarr = new Array();
	var moodarr = moodtext.split(",");
	var moodzs = 0;
	for(k=0;k<5;k++) {
		moodarr[k] = parseInt(moodarr[k]);
		moodzs += moodarr[k];
	}
	for(i=0;i<5;i++) {
		heightarr[i]= Math.round(moodarr[i]/moodzs*heightz);
		if(heightarr[i]<1) heightarr[i]=1;
		if(moodarr[i]>hmaxpx) {
		hmaxpx = moodarr[i];
		}
	}
	_$_("moodtitle").innerHTML = "已有<font>"+moodzs+"</font>人对本文发表态度";
	for(j=0;j<5;j++)
	{
		if(moodarr[j]==hmaxpx && moodarr[j]!=0) {
			_$_("moodinfo"+j).innerHTML = ""+moodarr[j]+"人";
		} else {
			_$_("moodinfo"+j).innerHTML = ""+moodarr[j]+"人";
		}
	}
}

document.writeln("<div id=\"Emoji\">");
document.writeln("    <div class=\"emoji-tip\" id=\"moodtitle\"></div>");
document.writeln("    <ul class=\"emoji-list\">");
document.writeln("                    <a class=\"emoji-item zhan\" onClick=\"get_mood(\'mood1\')\" type=\"radio\" name=\"radiobutton\" value=\"radiobutton\">");
document.writeln("                <div><img src=\"/style/images/1.gif\" title=\"鼓掌\"></div>");
document.writeln("                <p class=\"emoji-name\">鼓掌</p>");
document.writeln("                <span class=\"emoji-num\" id=\"moodinfo0\">0人</span>");
document.writeln("            </a>");
document.writeln("                    <a class=\"emoji-item\" onClick=\"get_mood(\'mood2\')\" type=\"radio\" name=\"radiobutton\" value=\"radiobutton\">");
document.writeln("                <div><img src=\"/style/images/2.gif\" title=\"鄙视\"></div>");
document.writeln("                <p class=\"emoji-name\">鄙视</p>");
document.writeln("                <p class=\"emoji-num\" id=\"moodinfo1\">0人</p>");
document.writeln("            </a>");
document.writeln("                    <a class=\"emoji-item\" onClick=\"get_mood(\'mood3\')\" type=\"radio\" name=\"radiobutton\" value=\"radiobutton\">");
document.writeln("                <div><img src=\"/style/images/3.gif\" title=\"开心\"></div>");
document.writeln("                <p class=\"emoji-name\">开心</p>");
document.writeln("                <p class=\"emoji-num\" id=\"moodinfo2\">0人</p>");
document.writeln("            </a>");
document.writeln("                    <a class=\"emoji-item\" onClick=\"get_mood(\'mood4\')\" type=\"radio\" name=\"radiobutton\" value=\"radiobutton\">");
document.writeln("                <div><img src=\"/style/images/4.gif\" title=\"愤怒\"></div>");
document.writeln("                <p class=\"emoji-name\">愤怒</p>");
document.writeln("                <p class=\"emoji-num\" id=\"moodinfo3\">0人</p>");
document.writeln("            </a>");
document.writeln("                    <a class=\"emoji-item\" onClick=\"get_mood(\'mood5\')\" type=\"radio\" name=\"radiobutton\" value=\"radiobutton\">");
document.writeln("                <div><img src=\"/style/images/5.gif\" title=\"可怜\"></div>");
document.writeln("                <p class=\"emoji-name\">可怜</p>");
document.writeln("                <p class=\"emoji-num\" id=\"moodinfo4\">0人</p>");
document.writeln("            </a>");
document.writeln("            </ul>");
document.writeln("</div>");
remood();



