
$(function() {
 
  $("#submit_coupon").click(function() {  
		// validate and process form
	$(".errorMessage").remove();
    $('.error').hide();
		
	  var store_id = $("input#store_id").val();
	  var ccode = $("input#code").val();
	  
	  var emailaddress = $("#sub_email").val();		
   if (detail == "" || detail =="Your email address") {
        $('#sub+email').after("<span class='error'>Enter your email address</span>");
        $("#sub+email").focus();
        return false;
    }
	
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	if(reg.test(emailaddress) == false){
		$('#sub_email').after("<span class='error'>Enter valid email address</span>");
        $("#sub_email").focus();
        return false;
	}
	
	
	var detail = $("#detail").val();		
	 if (detail == "" || detail == "Description") {
      $('#detail_error').after("<span class='error'>Enter offer details</span>");
      $("#detail").focus();
      return false;
    }
	
   var security_code = $("#security_code").val();
	if (security_code == "" ) {
      $('#code-error').after("<span class='error'>Enter security code</span>");
      $("#security_code").focus();
      return false;
    } 
   //var dataString = 'sid='+ store + '&coupon=' + detail + '&security_code=' + security_code;
		
 $.post(domain+"/ajax/response.html", { task: 'sharecoupon', sid: store_id, coupon: detail, security: security_code, code: ccode, email: emailaddress },
   function(data) { 
	   if(data == 1){ $('#code-error').after("<span class='error'>Enter valid security code</span>"); $("#security_code").focus();return false;}
	  $('#no_error').html("<span class='errortrue'>Thanks for submiting coupon</span>").hide().fadeIn(2000, function() {
													   $('#no_error').hide('slow'); 
													   $('#no_error').val('');
													});
	 
   });
	 
	 
    return false;
	});
  
  
 $("#subscribe_btn").click(function() {   			
  var emailaddress = $("input#subs_email").val();
  var store_id = $("input#subs_store").val();
	if (emailaddress == "") { 
       $('#email_error').html("Please enter valid email address.")
		$('#email_error').css({color:"#FD0828"})
		$('#email_error').css({display:"block"})
		$('#email_error').css({fontSize:"12px"})
		$('#email_error').css({marginLeft:"10px"})
        .hide().fadeIn(700, function() {
          $('#email_error');
		 $("input#email").focus();
        });
		return false;
    }else{
		   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	       if(reg.test(emailaddress) == false){
		       $('#email_error').html("Please enter valid email address.")
			   $('#email_error').css({color:"#FD0828"})
			   $('#email_error').css({display:"block"})
			   $('#email_error').css({fontSize:"12px"})
			   $('#email_error').css({marginLeft:"10px"})
				.hide().fadeIn(700, function() {
				$('#email_error');
				$("input#email").focus();		
				});
				return false;
		   }
		}
		
  $.post(domain+"/ajax/response.html", { task: 'subscribe',  email: emailaddress,  store: store_id },
   function(data) { 
	              if(data == 1){$('#email_error').html("Email already exits")}else{$('#email_error').html("Thanks for subscribing")}
								 $('#email_error').css({color:"#007215"})
								 $('#email_error').css({display:"block"})
								 $('#email_error').css({fontSize:"12px"})
		                         $('#email_error').css({marginLeft:"10px"})
								 .hide().fadeIn(2000, function() {
											   $('#email_error'); 
											   $('#email_error').val('');
										 });	  
	
     });	
    return false;
	});
 
 $("#copCmnt_btn").click(function() { 								     
  $('.error').hide(); 			
  var comnts = $("#cmnt-comments").val();
  var cid    = $("#cmnt-cid").val();
  var sid    = $("#cmnt-sid").val();
  var emailadrs   = $("#cmnt-email").val();
	
	if (comnts == "") { 
       $('#cmnt-comments').after("<span class='error'>Enter your comments!<br/></span>")		
		 $("#cmnt-comments").focus();
        
		return false;
    }
		
	$.post(domain+"/ajax/response.html", { task: 'copCmnt',  email: emailadrs,  copid: cid,  storeid: sid,  comments: comnts },
   function(data) { 
	             if(data == 0){$('#cmnt-comments').after("Enter your comments")}else{$('#frmComnt').html("Thanks! Your comment has been submitted. It will be posted after admin review!")}
								 
	
     });
	
    return false;
	});
 
  
});
function showCodes(id){
	
	$("#getcode"+id).css("display","none"); $("#hcode"+id).css("display","block") ;return false;
}

function showAllCodes(id){$(".offerouter").css("display","none");$(".offer_inner").css("display","block");$(".offer_inner").css("display","block");return false;
}

function copyMyCodes(id){
	
	var preElement = $('#ccode'+id)[0];
	
    copyToClipboard(preElement, showSuccessMsg(id));
}

function showSuccessMsg(id) {
    $('#successMsg'+id).finish().fadeIn(30).fadeOut(9000);
  }

  function copyToClipboard(element, successCallback) {
    selectText(element);

    var succeeded;
    try {
      succeeded = document.execCommand('copy');
    } catch (e) {
      succeeded = false;
    }

    if (succeeded && typeof(successCallback) === 'function') {
      successCallback();
    }

    deselect(element);
  }

  function selectText(element) {
    if (/INPUT|TEXTAREA/i.test(element.tagName)) {
      element.focus();
      if (element.setSelectionRange) {
        element.setSelectionRange(0, element.value.length);
      } else {
        element.select();
      }
      return;
    }
    
    var rangeObj, selection;
    if (document.createRange) { // IE 9+ and all other browsers
      rangeObj = document.createRange();
      rangeObj.selectNodeContents(element);
      selection = window.getSelection();
      selection.removeAllRanges();
      selection.addRange(rangeObj);
    } else if (document.body.createTextRange) { // IE <=8
      rangeObj = document.body.createTextRange();
      rangeObj.moveToElementText(element);
      rangeObj.select();
    }
  }

  function deselect(element) {
    if (element && /INPUT|TEXTAREA/i.test(element.tagName)) {
      if ('selectionStart' in element) {
        element.selectionEnd = element.selectionStart;
      }
      element.blur();
    }

    if (window.getSelection) { // IE 9+ and all other browsers
      window.getSelection().removeAllRanges();
    } else if (document.selection) { // IE <=8
      document.selection.empty();
    }
  }


$('.popup').click(function(e){ 
	var $height = 605; var $width = 450; var $toppos = 30;
	 var $leftpos = (screen.width-$width)-$toppos; window.focus();
	   var $id1 = $(this).attr('id');
	    var $id2 = $id1.replace("title", "");
	     var $id3 = $id2.replace("out", "");
		  var $id4 = $id3.replace("get", "");
		  var $id = $id4.replace("cp", "");
	   var $poplocation = domain+'/popup.html?oid='+$id;
	  var $popname = 'popup';
	var $popsize = 'width= '+$width+',height='+$height+',screenX='+$leftpos+',screenY='+$toppos+',left='+$leftpos+',top='+$toppos+', resizable=no, scrollbars=yes';
	if($poplocation != '') {
		newwindow=window.open($poplocation, $popname, $popsize);
		if (window.focus) {newwindow.focus()} return false;
	}
	e.preventDefault();
});

$('.spopup').click(function(e){ 
	var $height = 605; var $width = 450; var $toppos = 30;
	 var $leftpos = (screen.width-$width)-$toppos; window.focus();
	   var $id1 = $(this).attr('id');
	    var $id2 = $id1.replace("title", "");
	     var $id3 = $id2.replace("out", "");
		  var $id4 = $id3.replace("get", "");
		  var $id = $id4.replace("cp", "");
	   var $poplocation = domain+'/popup.html?sid='+$id;
	  var $popname = 'popup';
	var $popsize = 'width= '+$width+',height='+$height+',screenX='+$leftpos+',screenY='+$toppos+',left='+$leftpos+',top='+$toppos+', resizable=no, scrollbars=yes';
	if($poplocation != '') {
		newwindow=window.open($poplocation, $popname, $popsize);
		if (window.focus) {newwindow.focus()} return false;
	}
	e.preventDefault();
});

$('.yesSmile').click(function(e){ 

	var id = $(this).attr('id');
	var result = $.ajax({
			type: "GET",
			url: domain+"/ajax/response.html",
			data: "task=yesSmile&cid="+id,
			async: false
		}).responseText.split(',');
	
	  if(result == 0){$('#voteBox_'+id).after("Enter your comments")}else{$('#voteBox_'+id).html("Thanks for voting")}

});

$('.noSmile').click(function(e){ 
	
	var id = $(this).attr('id');
	var result = $.ajax({
			type: "GET",
			url: domain+"/ajax/response.html",
			data: "task=noSmile&cid="+id,
			async: false
		}).responseText.split(',');
	
	 if(result == 0){$('#voteBox_'+id).after("Enter your comments")}else{$('#voteBox_'+id).html("Thanks for voting")}

});
