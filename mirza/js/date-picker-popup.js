//date picker start

    if (top.location != location) {
        top.location.href = document.location.href ;
    }
    $(function(){
        window.prettyPrint && prettyPrint();
       
	   $('.default-date-picker').datepicker({
            format: 'dd-mm-yyyy'
        });
        
        var startDate = new Date(2012,1,20);
        var endDate = new Date(2012,1,25);
       
        // disabling dates
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

        var checkin = $('.exp-sdate').datepicker({
            onRender: function(date) {
                return date.valueOf() < now.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function(ev) { 
                if (ev.date.valueOf() > checkout.date.valueOf()) {
                    var newDate = new Date(ev.date)
                    newDate.setDate(newDate.getDate() + 1);
                    checkout.setValue(newDate);
                }
                checkin.hide();
                $('.exp-edate')[0].focus();
            }).data('datepicker');
        var checkout = $('.exp-edate').datepicker({ 
            onRender: function(date) {
                return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function(ev) {			
			   
			    var sdate = Date.parse($('.exp-sdate').val());
				var edate = Date.parse($('.exp-edate').val());
						
		         if ( sdate > edate ){ 	
				 			   
						$('#expdate-error').html('The end date < the start date');
						$("#exp-edate").val("");
						 $('#expdate-error').css({color:"#CC0000"})
						.hide().fadeIn(2000, function() {
											   $('#expdate-error').hide('slow'); 
											   $('#expdate-error').val('');
										 });
						return false;
                    }else{$("#expdate-error").val("");}
				
                checkout.hide();
            }).data('datepicker');
		
		
		 $("#never_exp").on('click',function(){
											 
			 $("#exp-sdate").val("");
			 $("#exp-edate").val("");
			
	     });
 
		
		
    });

//date picker end



   