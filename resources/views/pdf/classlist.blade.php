<!DOCTYPE html>
<html>
<head>
    <title></title>
   <style>
h2{ padding : 0;
    margin : 0;}
    		
p {
    padding : 0;
    margin : 0;
    font-size: 15px;
}

table.pos_fixed1 { position:fixed; top:250px; left:10px; width:45%}

table.pos_fixed2 { position:fixed; top:250px; left:400px; width:45%}

table, th, td, tr {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td, tr{
    padding: 5px;
    text-align: center;    
}

td:nth-of-type(1) {width:20px;}

thead, tfoot { display: table-row-group }

#totalstud { position:fixed; top:650px; left:15px;}
#line1 { 
    display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    border-style: inset;
    border-width: 1px;
    width:150px;
    position:fixed; top:840px; left:125px
}


#line2 { 
    display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    border-style: inset;
    border-width: 1px;
    width:150px;
    position:fixed; top:840px; left:470px
}

#signature1 {
	position:fixed; top:850px; left:150px;
}

#signature2{
	position:fixed; top:850px; left:500px;
}


		</style>
</head>
<body>
<image src=public_path(images/School Logo/logo.png>
<h2><center> Kiddo Academy and Development Center </center></h2>
<center> <p> 2/F GA Tower, # 83 EDSA, Mandaluyong City 1550, Philippines  </p> </center>
<center> <p>Telephone nos.: 576-4171/0905-5529605 </center> </p> 
<center> <p> E-mail: kiddo_academy@yahoo.com </center> </p>
<center> <p>  Website: www.kiddoacademy.com </center> </p>
<br><br><br>
<p> Level: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Section: </p>
<p> Teacher: </p>  
<br>
<center> <h2> Class List </h2> </center>
<br><br><br><br>
	<table style="float: left" class="pos_fixed1">
		<thead>
			<tr>
			<th colspan="2">Boys</th>
		</thead>

		<tbody>
	   		<tr>
			<td>1</td>
			<td>Bataan, Christian Joseph</td>
	 		</tr>
	 		<!--<tr>
			<td>2</td>
			<td>Galang, Camille</td>
	 		</tr>-->
		</tbody>
	</table>

	<table style="float: left" class="pos_fixed2">
		<thead>
			<tr>
			<th colspan="2">Girls</th>
		</thead>

		<tbody>
	   		<tr>
			<td>1</td>
			<td>Galang, Camille</td>
	 		</tr>
	 		<!--<tr>
			<td>1</td>
			<td>Bataan, Christian Joseph</td>
	 		</tr>-->
		</tbody>
	</table>

<br><br><br><br>
<table id="totalstud" style="float: left" border="0">
			<tr>
			<td>Boys</td>
			<td>10</td>
	 		</tr>
	 		<tr>
			<td>Girls</td>
			<td>10</td>
	 		</tr>
	 		<tr>
			<td>Total</td>
			<td>20</td>
	 		</tr>

</table>

<div id="signature1"><hr id="line1" align="left"><p> Aimee Tayag Ang </p>
<p> &nbsp; &nbsp;School Head </p> </div>


<div id="signature2"><hr id="line2"><p> Karla Austria </p> <!--Need to be generated from db-->
<p> &nbsp; &nbsp;Teacher </p> </div>


</body>
</html>

