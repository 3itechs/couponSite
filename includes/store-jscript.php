<script type="text/javascript" src="<?php echo DOMAIN;?>/assets/js/domain_name.js"></script>
    
    <script>
$(document).ready(function(){
	$(document).on('click', '.edit', function(){
		var id = $(this).attr('id');
		var copname=$('#copname'+id).text();
		var copdesc=$('#copdesc'+id).text();
		var ccode=$('#ccode'+id).text();
	 
		$('#edit').modal('show');
		$('#copname').html(copname);
		$('#copdesc').html(copdesc);
		$('#ccode').html(ccode);
	});
});
</script>



<script>
filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("filterDiv");
  if (c == "all") c = "";
  // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

// Show filtered elements
function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

// Hide elements that are not selected
function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1); 
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current control button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}

$(".coupon-hcode").click(function(){ var id = $(this).attr('id');    
    $("#code"+id).hide();
});

</script>
   
   

    <script src="<?php echo DOMAIN;?>/assets/js/jquery.min.js"></script>
    <script src="<?php echo DOMAIN;?>/assets/js/jquery-ui.js"></script>
    <script src="<?php echo DOMAIN;?>/assets/js/popper.js"></script>
    <script src="<?php echo DOMAIN;?>/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo DOMAIN;?>/assets/js/jquery.counterup.min.js"></script>
    <script src="<?php echo DOMAIN;?>/assets/js/jquery.nav.js"></script>
    <script src="<?php echo DOMAIN;?>/assets/js/jquery.countdown.min.js"></script>
    <script src="<?php echo DOMAIN;?>/assets/js/jquery.rateyo.js"></script>
    <script src="<?php echo DOMAIN;?>/assets/js/jquery.scrollUp.min.js"></script>
    <script src="<?php echo DOMAIN;?>/assets/js/jquery.sticky.js"></script>
    <script src="<?php echo DOMAIN;?>/assets/js/mobile.js"></script>
    <script src="<?php echo DOMAIN;?>/assets/js/lightslider.min.js"></script>
    <script src="<?php echo DOMAIN;?>/assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo DOMAIN;?>/assets/js/circle-progress.min.js"></script>
    <script src="<?php echo DOMAIN;?>/assets/js/waypoints.min.js"></script>    
    <script src="<?php echo DOMAIN;?>/assets/js/simplePlayer.js"></script>    
    <script src="<?php echo DOMAIN;?>/assets/js/main.js"></script>          
    <script type="text/javascript" src="<?php echo DOMAIN;?>/assets/js/jquery.functions.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    
    <script type="text/javascript">
		$( document ).ready(function() {	
			$('input.typeahead').typeahead({
				source: function (query, process) {
					$.ajax({
						url: domain+"ajax/response.html",
						type: "POST",
						data: 'query='+query+'&task=fndStore',
						dataType: 'JSON',
						async: true,
						success: function(data){
								   var resultList = data.map(function (item) {
								   var link = { href: item.href, name: item.category };
								   return JSON.stringify(link);					  
								 });
							return process(resultList);
						}
					})
				},	
				matcher: function (obj) {
					var item = JSON.parse(obj);
					return item;
				},
				sorter: function (items) {          
				   var beginswith = [], caseSensitive = [], caseInsensitive = [], item;
				   while (link = items.shift()) {
						var item = JSON.parse(link);
						if (!item.name.toLowerCase().indexOf(this.query.toLowerCase())) beginswith.push(JSON.stringify(item));
						else if (item.name.indexOf(this.query)) caseSensitive.push(JSON.stringify(item));
						else caseInsensitive.push(JSON.stringify(item));
					}
					return beginswith.concat(caseSensitive, caseInsensitive)
				},
				highlighter: function (link) {		
					var item = JSON.parse(link);		
					var query = this.query.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g, '\\$&');
					return item.name.replace(new RegExp('(' + query + ')', 'ig'), function ($1, match) {
						return '<strong>' + match + '</strong>';
					})
				},
				updater: function (link) {
				   var item = JSON.parse(link);       
				   location.href=item.href;						 
				}
			});	
		});
</script>

<script language="JavaScript">
            
		function copyCode(id){ 
				
				var preElement = $('#cop'+id)[0];
				
				copyToClipboard(preElement, showSuccessMsg(id));
			}

			function copyMyCodes(id){ 
				
				var preElement = $('#in'+id)[0];
				
				copyToClipboard(preElement, showSuccessMsg(id));
			}
			
			function showSuccessMsg(id) {
				$('#successMsg'+id).finish().fadeIn(30).fadeOut(9000);
				$('#copyCode'+id).text("Copied");
				$('#ccopy'+id).text("Code Copied");
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
        </script>
   
   
   
   