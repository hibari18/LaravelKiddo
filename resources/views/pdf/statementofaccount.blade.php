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

table, th, td, tr {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td, tr{
    padding: 5px;
    text-align: center;    
}

thead, tfoot { display: table-row-group }
		</style>
</head>
<body>
<image src="{{ asset('images/School Logo/logo.png') }}">
<h2><center> Kiddo Academy and Development Center </center></h2>
<center> <p> 2/F GA Tower, # 83 EDSA, Mandaluyong City 1550, Philippines  </p> </center>
<center> <p>Telephone nos.: 576-4171/0905-5529605 </center> </p> 
<center> <p> E-mail: kiddo_academy@yahoo.com </center> </p>
<center> <p>  Website: www.kiddoacademy.com </center> </p>
<br><br><br>
<p>Name of Student: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;	@foreach($pdf as $a)Student Number: {{ $a->tblStudentId}}@endforeach</p>
<p> Level: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Date: </p>  
<br>
<center> <h2> Statement of Account </h2> </center>
<br><br>
	<table>
		<thead>
			<tr>
			<th>Due/Payment Date</th>
			<th>Code</th>
			<th>Details</th>
			<th>TN#</th>
			<th>Credit</th>
			<th>Receipt Number</th>
			<th>Payment Date</th>
			<th>Payment</th>
			<th>Running Balance</th>
			<th>Remarks</th>
			</tr>
		</thead>

		<tbody>
	   		<tr>
			<td>10/14/2017</td>
			<td>TF/MF</td>
			<td>Tuition Fee</td>
			<td>-</td>
			<td>2,250</td>
	    	<td>970</td>
			<td>10/14/2017</td>
	    	<td>2,250</td>
	    	<td>-</td>
	    	<td>-</td>
	 		</tr>
		</tbody>

		<tfoot>
	 		<tr>
			<td colspan="3">Total on School Year-End</td>
			<td></td>
			<td>545454</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>545454</td>
			<td>-</td>
			</tr>
		</tfoot>

	</table>
</body>
</html>

