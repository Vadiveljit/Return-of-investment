var userselected = [];
	userselected['numofemp'] = jQuery('.rangeslider-numofemp').val();
	userselected['loginperday'] = jQuery('.rangeslider-loginperday').val();
	userselected['secondsperlogin'] = jQuery('.rangeslider-secondsperlogin').val();
	userselected['workdaysperyear'] = jQuery('.rangeslider-workdaysperyear').val();
	userselected['saleryperemp'] = jQuery('.rangeslider-saleryperemp').val();
	userselected['passwordresetemp'] = jQuery('.rangeslider-passwordresetemp').val();
	userselected['minperpasswordreset'] = jQuery('.rangeslider-minperpasswordreset').val();
	userselected['helpdeskperyear'] = jQuery('.rangeslider-helpdeskperyear').val();
	userselected['avgcostpercall'] = jQuery('.rangeslider-avgcostpercall').val();

function onchangeRangeSlider(key, from){
	var rangeMin = jQuery('.rangeslider-'+key).attr('min');
	var rangeMax = jQuery('.rangeslider-'+key).attr('max');
	if(from == 'input'){
		if(parseInt(jQuery('.rangeinput-'+key).val()) > rangeMin){
			var rangeVal = jQuery('.rangeinput-'+key).val();
			jQuery('.rangeslider-'+key).val(rangeVal);
		}else{
			//jQuery('.rangeinput-'+key).val(jQuery('.rangeslider-'+key).val());
			return;
		}
		
	}else{
		var rangeVal = jQuery('.rangeslider-'+key).val();
	}	
	userselected[key] = rangeVal;
	var newValue = Number( (rangeVal - rangeMin) * 100 / (rangeMax - rangeMin) );
	var newPosition = (10 - (newValue * 1));	
	jQuery('.rangevalue-'+key).html('<span>'+rangeVal+'</span>');
	var leftpos = `calc(${newValue}% + (${newPosition}px))`;
	jQuery('.rangevalue-'+key).css({'left':leftpos});
	if(from == 'range'){
		jQuery('.rangeinput-'+key).val(rangeVal);
	}
	updateReturnOfInvestment();
}
function updateReturnOfInvestment(){
	var productivity_gaintime = userselected['numofemp'] * userselected['loginperday'] * userselected['secondsperlogin'] * userselected['workdaysperyear'];
	var productivity_gain = userselected['numofemp'] * 9 * userselected['minperpasswordreset'];
	var helpdesk_costsaving = parseInt(userselected['numofemp'] * 9 * userselected['avgcostpercall']);
	jQuery('.productivity_gaintime span').html('$ '+numberWithCommas(productivity_gaintime));
	jQuery('.productivity_gain span').html('$ '+numberWithCommas(productivity_gain));
	jQuery('.helpdesk_costsaving span').html('$ '+numberWithCommas(helpdesk_costsaving));
	var totalcostsaving = productivity_gaintime+productivity_gain+helpdesk_costsaving;
	
	jQuery('.totalcostsaving').html('<h4>Total Cost savings</h4><span>$ '+numberWithCommas(totalcostsaving)+'</span><div class="yeartext">Per Year</div>');
}	
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
updateReturnOfInvestment();