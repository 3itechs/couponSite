//date picker start

    if (top.location != location) {
        top.location.href = document.location.href ;
    }
    
	$(function(){			   
        // disabling dates
       
	   var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

        var checkin2 = $('.up-sdate').datepicker({
            onRender: function(date) {
                return date.valueOf() < now.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function(ev) { 
                if (ev.date.valueOf() > checkout2.date.valueOf()) {
                    var newDate = new Date(ev.date)
                    newDate.setDate(newDate.getDate() + 1);
                    checkout2.setValue(newDate);
                }
                checkin2.hide();
                $('.up-edate')[0].focus();
            }).data('datepicker');
        var checkout2 = $('.up-edate').datepicker({ 
            onRender: function(date) {
                return date.valueOf() <= checkin2.date.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function(ev) {  
		
		         if ( $('.up-sdate').val() > $('.up-edate').val() ){ 				   
						$('#udate-error').html('The end date < the start date');
						$("#up-edate").val("");
						$('#up-edate').attr('value',''); 						
					     $('#udate-error').css({color:"#CC0000"})
						.hide().fadeIn(2000, function() {
											   $('#udate-error').hide('slow'); 
											   $('#udate-error').val('');
										 });						
						return false;
                  }else{$("#udate-error").val("");}
				
                checkout2.hide();
            }).data('datepicker');
		
		
		
		
		
         var checkin = $('.ad-sdate').datepicker({
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
                $('.ad-edate')[0].focus();
            }).data('datepicker');
        var checkout = $('.ad-edate').datepicker({ 
            onRender: function(date) {
                return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function(ev) {
			
			     var sdate = Date.parse($('.ad-sdate').val());
				var edate = Date.parse($('.ad-edate').val());
						
		         if ( sdate > edate ){ 
						   
						$('#adate-error').html('The end date < the start date');
						$("#ad-edate").val("");
						$('#ad-edate').attr('value',''); 
						 $('#adate-error').css({color:"#CC0000"})
						.hide().fadeIn(2000, function() {
											   $('#adate-error').hide('slow'); 
											   $('#adate-error').val('');
										 });
						return false;
                    }else{$("#adate-error").val("");}
				
                checkout.hide();
            }).data('datepicker');
		
		
    });

//timepicker start
$('.timepicker-default').timepicker();

//colorpicker end

//multiselect start


   /* $('#my_multi_select1').multiSelect();
    $('#my_multi_select2').multiSelect({
        selectableOptgroup: true
    });

    $('#my_multi_select3').multiSelect({
        selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
        selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
        afterInit: function (ms) {
            var that = this,
                $selectableSearch = that.$selectableUl.prev(),
                $selectionSearch = that.$selectionUl.prev(),
                selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

            that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                .on('keydown', function (e) {
                    if (e.which === 40) {
                        that.$selectableUl.focus();
                        return false;
                    }
                });

            that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                .on('keydown', function (e) {
                    if (e.which == 40) {
                        that.$selectionUl.focus();
                        return false;
                    }
                });
        },
        afterSelect: function () {
            this.qs1.cache();
            this.qs2.cache();
        },
        afterDeselect: function () {
            this.qs1.cache();
            this.qs2.cache();
        }
    });



$('.wysihtml5').wysihtml5();
*/
//wysihtml5 end
