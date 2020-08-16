<?php 
$arrFormFields = '{
	"numofemp":{ "label":"Number of Employees in your organization (Quantity)", "min":"200", "max":"10000", "step":"100", "default":"1000"},
	"loginperday":{ "label":"Number of logins per day", "min":"1", "max":"100", "step":"1", "default":"10" },
	"secondsperlogin":{ "label":"Number of seconds per login", "min":"1", "max":"100", "step":"1", "default":"10" },
	"workdaysperyear":{ "label":"Number of Workdays per year", "min":"200", "max":"365", "step":"1", "default":"250" },
	"saleryperemp":{ "label":"Loaded salary per employee", "min":"1000", "max":"100000", "step":"1000", "default":"75000" },
	"passwordresetemp":{ "label":"Password resets /employee /year", "min":"1", "max":"100", "step":"1", "default":"10"},
	"minperpasswordreset":{ "label":"Number of Min per password reset", "min":"1", "max":"100", "step":"1", "default":"20"},
	"helpdeskperyear":{ "label":"Help desk calls per year for password resets per employee.", "min":"1", "max":"100", "step":"1", "default":"10"},
	"avgcostpercall":{ "label":"Average cost per help desk call", "min":"1", "max":"100", "step":"1", "default":"25"}
}';
$arrFormFields = json_decode($arrFormFields);

function renderFormFileds($fields){
	$html = '';
	foreach($fields as $key=>$field){
		$html .= '
		<div class="slider_row">
			<h4>'.$field->label.'</h4>
			<div class="range-wrap anirangeslider">
				<div class="leftrange">
					<div class="range-value rangevalue-'.$key.'" style="display:none;"><span>'.$field->default.'</span></div>
					<input class="rangeslider-'.$key.'" value="'.$field->default.'" type="range" min="'.$field->min.'" max="'.$field->max.'" step="'.$field->step.'" oninput="onchangeRangeSlider(\''.$key.'\', \'range\')">
					<div class="min-max">
						<span>'.$field->min.'</span>
						<span>'.$field->max.'</span>
					</div>					
				</div>
				<input class="rangeinput-'.$key.' rightinput" value="'.$field->default.'" type="number" min="'.$field->min.'" max="'.$field->max.'" step="'.$field->step.'" oninput="onchangeRangeSlider(\''.$key.'\', \'input\')">				
			</div>
		</div>		
		';
	}
	return $html;
}
?>

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Anival - Return of Investment(ROI)</title>
  <meta name="description" content="Return of investment, Vadivel Web Developer Coimbatore|Edappadi">
  <meta name="author" content="vadivel">
  <link rel="stylesheet" href="css/style.css">
</head>

<body style="margin-bottom:30px;">
<header style="text-align:center;width;100%;float;left;padding:10px;"><a href="http://anival.in"><img src="http://localhost/test/anival/images/logo-black.png" alt="anival logo" style="max-width:200px;" /></a></header>
<!--Calculator-->
<div class="calculationform">
	<div class="left"><?php echo renderFormFileds($arrFormFields); ?></div>
	<div class="right">
		<div class="col productivity_gaintime"><h4>Productivity Gain on time:</h4><span></span><div class="yeartext">Per Year</div></div>
		<div class="col productivity_gain"><h4>Productivity Gain:</h4><span></span><div class="yeartext">Per Year</div></div>
		<div class="col helpdesk_costsaving"><h4>Helpdesk Cost savings:</h4><span><div class="yeartext">Per Year</div></span></div>
		<div class="col totalcostsaving"></div>
	</div>
</div>
<!--Calculator-->

	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script src="js/scripts.js"></script>
</body>
</html>

