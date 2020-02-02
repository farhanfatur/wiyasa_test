<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="asset/css/chart.min.css">
<link rel="stylesheet" type="text/css" href="asset/css/style.css">
	<title>Wiyasa Test Coding</title>
</head>
<body>
<nav class="navbar navbar-inverse" style="border-radius: 0px;">
	<div class="container-fluid">
	  <div class="navbar-header">
	    <a class="navbar-brand" href="#" style="color: #fff;">EACIIT</a>
	  </div>
	</div>
</nav>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<h4>E-Commerse Banking Report</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<select class="form-control" id="cmgunmaskedname">
				<option>Select Company Name (CMGUnmaskedName)</option>
			</select>
		</div>
		<div class="col-md-2">
			<button class="btn btn-primary" onclick="getCompanyName()">Submit</button>
		</div>
	</div>
</div>
<div class="container-fluid">
	<hr>
</div>
<div class="container-fluid" style="margin-bottom: 50px;">
	<div class="row">
		<div class="col-md-1 col-sm-2" >
			<h5 class="font-weight-bold">Client Tier:</h5>
			<span>(Client Tier)</span>
		</div>
		<div class="col-md-1 col-sm-2">
			<h5 class="font-weight-bold">Commercial Stream:</h5>
			<span>(GCPStream)</span>
		</div>
		<div class="col-md-1 col-sm-2">
			<h5 class="font-weight-bold">Commercial Business:</h5>
			<span>(GCPBusiness)</span>
		</div>
		<div class="col-md-1 col-sm-2">
			<h5 class="font-weight-bold">Business Category:</h5>
			<span>(CMGGlobalBU)</span>
		</div>
		<div class="col-md-1 col-sm-2">
			<h5 class="font-weight-bold">Business Segment:</h5>
			<span>(CMGSegmentName)</span>
		</div>
		<div class="col-md-2 col-sm-2">
			<h5 class="font-weight-bold">Country:</h5>
			<span>(GlobalControlPoint)</span>
		</div>
		<div class="col-md-2 col-sm-2">
			<h5 class="font-weight-bold">World Region:</h5>
			<span>(GlobalControlPoint)</span>
		</div>
		<div class="col-md-1 col-sm-2">
			<h5 class="font-weight-bold">Manager in Contact:</h5>
			<span>(GlobalRelationshipManagerName)</span>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<h5 class="font-weight-bold">ROE FY14 vs FY15</h5>
			<canvas id="chartROE"></canvas>
		</div>
		<div class="col-md-3">
			<h5 class="font-weight-bold">Revenue & RWA FY14 vs FY15</h5>
			<canvas id="chartRevenue"></canvas>
		</div>
		<div class="col-md-3">
			<h5 class="font-weight-bold">Total Limit EOP FY14 vs FY15</h5>
			<canvas id="chartTotalLimitEOP"></canvas>
		</div>
		<div class="col-md-3">
			<h5 class="font-weight-bold">Company Average Activity FY14 vs FY15</h5>
			<canvas id="chartCompanyAverage"></canvas>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h4>ROE Summary Detail</h4>
			<table class="table table-bordered">
				<thead class="bg-default">
				<tr>
					<th>ROE_FY14</th>
					<th>ROE_FY15</th>
					<th>REVENUE_FY14</th>
					<th>REVENUE_FY15</th>
					<th>RWAFY14</th>
					<th>RWAFY15</th>
					<th>TotalLimits_EOP_FY14</th>
					<th>TotalLimits_EOP_FY15</th>
					<th>Com_Avg_Act_FY14</th>
					<th>Com_Avg_Act_FY15</th>
				</tr>
				</thead>
				<tbody id="gridDetail">
					
				</tbody>
			</table>
			<button class="btn btn-primary">Re-submit</button>
		</div>
	</div>
</div>
</body>
<script type="text/javascript" src="asset/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
<script type="text/javascript" src="asset/js/chart.min.js"></script>
<script type="text/javascript">
	var ROEArray = []
	$.ajax({
		url: "process/getAll.php",
		method: 'GET',
		dataType: 'json',
		success: function(data, status) {
			var cmgunmaskedname = $("#cmgunmaskedname")

			$.each(data, function(i, val) {
				$("<option value='"+val[1]+"'>"+val[1]+"</option>").appendTo(cmgunmaskedname)
			})
		},
		error: function(data, status) {

		}
	})

	function getCompanyName() {
		var name = $("#cmgunmaskedname").val()
		$.ajax({
			url: "process/findById.php",
			method: "GET",
			data: {
				name: name
			},
			dataType: 'json',
			success: function(data, status) {
				var gridDetail = $("#gridDetail")
				gridDetail.empty()
				ROEArray = [parseFloat(data[25]), parseFloat(data[26])]
				var tr = $("<tr></tr>").appendTo(gridDetail)

				$("<td></td>").html("<b>"+data[25]+"</b>").appendTo(tr)
				$("<td></td>").html("<b>"+data[26]+"</b>").appendTo(tr)
				$("<td></td>").html("<b>"+data[10]+"</b>").appendTo(tr)
				$("<td></td>").html("<b>"+data[11]+"</b>").appendTo(tr)
				$("<td></td>").html("<b>"+data[18]+"</b>").appendTo(tr)
				$("<td></td>").html("<b>"+data[17]+"</b>").appendTo(tr)
				$("<td></td>").html("<b>"+data[14]+"</b>").appendTo(tr)
				$("<td></td>").html("<b>"+data[15]+"</b>").appendTo(tr)
				$("<td></td>").html("<b>"+data[23]+"</b>").appendTo(tr)
				$("<td></td>").html("<b>"+data[24]+"</b>").appendTo(tr)
			},
			error: function(data, status) {
				console.log(data, status)
			}
		})
	}
	var dataChart = {
		'chartROE' : document.getElementById("chartROE").getContext('2d'),
		'chartRevenue' : document.getElementById("chartRevenue").getContext('2d'),
		'chartTotalLimitEOP' : document.getElementById("chartTotalLimitEOP").getContext('2d'),
		'chartCompanyAverage': document.getElementById("chartCompanyAverage").getContext('2d')
	}

	var chart = {
		chartROE: new Chart(dataChart.chartROE, {
			type: 'pie',
			data: {
				labels: ["Red", "Blue"],
				datasets: [{
					data: [12, 19],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)'
					],
					borderWidth: 1
				}]
			},
		}),
		chartRevenue: new Chart(dataChart.chartRevenue, {
			type: 'bar',
			data: {
				labels: ["Red", "Blue"],
				datasets: [{
					label: '# of Votes',
					data: [12, 19],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)'
					],
					borderWidth: 1
				}]
			},
			
		}),
		chartTotalLimitEOP: new Chart(dataChart.chartTotalLimitEOP, {
			type: 'line',
			data: {
				labels: ["Red", "Blue"],
				datasets: [{
					label: '# of Votes',
					data: [12, 19],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)'
					],
					borderWidth: 1
				}]
			},
			
		}),
		chartCompanyAverage: new Chart(dataChart.chartCompanyAverage, {
			type: 'horizontalBar',
			data: {
				labels: ["Red", "Blue"],
				datasets: [{
					label: '# of Votes',
					data: [12, 19],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)'
					],
					borderWidth: 1
				}]
			},
			
		})
	}
	
</script>
</html>

<!-- 

Sekarang Anda perlu membuat CRUD menggunakan teknologi apa pun untuk masing-masing data pada file

Hal-hal yang perlu dimasukkan:
 

1. Silakan buat halaman kotak, gunakan sumber company.csv, silakan gunakan paging tentang data yang terlalu besar.

2. Saring berdasarkan: Nama Perusahaan, Tingkat Klien, Nama Segmen.

3. Harap diingat, data dibagi menjadi 2 tahun untuk 14 dan 15

4. Saat mengklik perusahaan dan masuk ke detail perusahaan, kami ingin melihat grafik untuk melihat perbandingan angka antara Y14 dan Y15 untuk titik data numerik dan kami dapat memperbarui nomor itu juga. Silakan buat yang serupa dengan gambar dari drobox

5. Mohon buat, perbarui fungsi ketika kita memperbarui nilai grafik dan ketika menekan tombol kirim ulang akan memperbarui data dan grafik juga

 -->