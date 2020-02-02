<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
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
			<h4>E-Commerse Banking</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<button class="btn btn-primary" onclick="window.location.href='detail.php'">Detail</button>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			  <select class="form-control" id="cmgunmaskedname" onchange="findPage(this.value)">
			    <option>Select for CMGUnmaskedName</option>
			  </select>
		</div>
		<div class="col-md-4">
			<select class="form-control" id="clienttier" onchange="findPage(this.value)">
				<option>Select for Client Tier</option>
			</select>
		</div>
		<div class="col-md-4">
			<select class="form-control" id="cmgsegmentname" onchange="findPage(this.value)">
				<option>Select for CMGSegmentName</option>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12" style="overflow: auto;max-width: 100%;max-height: 500px;">
			<table class="table table-stripped" style="margin-top:20px;">
				<thead id="head">
					<tr>
						<th>CMGUnmaskedID</th>
						<th>CMGUnmaskedName</th>
						<th>ClientTier</th>
						<th>GCPStream</th>
						<th>GCPBusiness</th>
						<th>CMGGlobalBU</th>
						<th>CMGSegmentName</th>
						<th>GlobalControlPoint</th>
						<th>GCPGeography</th>
						<th>GlobalRelationshipManagerName</th>
						<th>REVENUE_FY14</th>
						<th>REVENUE_FY15</th>
						<th>Deposits_EOP_FY14</th>
						<th>Deposits_EOP_FY15x</th>
						<th>TotalLimits_EOP_FY14</th>
						<th>TotalLimits_EOP_FY15</th>
						<th>TotalLimits_EOP_FY15x</th>
						<th>RWAFY15</th>
						<th>RWAFY14</th>
						<th>REV/RWA FY14</th>
						<th>REV/RWA FY15</th>
						<th>NPAT_AllocEq_FY14</th>
						<th>NPAT_AllocEq_FY15X</th>
						<th>Company_Avg_Activity_FY14</th>
						<th>Company_Avg_Activity_FY15</th>
						<th>ROE_FY14</th>
						<th>ROE_FY15</th>
					</tr>
				</thead>
				<tbody id="body"></tbody>
			</table>
		</div>
	</div>
	<div class="row">
		
		<div class="col-md-12">
		<nav>
		<span>Halaman : </span>
	  <ul class="pagination" id="gridPaging">
	  </ul>
</nav>
		</div>
	</div>	
</div>

</body>
<script type="text/javascript" src="asset/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
<script type="text/javascript">
	var cache = []
	var dataResult
	var dataPaging
	function getPaging(index) {
		var data = dataPaging[index]
		
		var body = $("#body").empty()
		
			$.each(data, function(i, val) {
				var tr = $("<tr></tr>").appendTo(body)
				$('<td><a href="#">'+val[0]+'</a></td>').appendTo(tr)
				$("<td></td>").html(val[1]).appendTo(tr)
				$("<td></td>").html(val[2]).appendTo(tr)
				$("<td></td>").html(val[3]).appendTo(tr)
				$("<td></td>").html(val[4]).appendTo(tr)
				$("<td></td>").html(val[5]).appendTo(tr)
				$("<td></td>").html(val[6]).appendTo(tr)
				$("<td></td>").html(val[7]).appendTo(tr)
				$("<td></td>").html(val[8]).appendTo(tr)
				$("<td></td>").html(val[9]).appendTo(tr)
				$("<td></td>").html(val[10]).appendTo(tr)
				$("<td></td>").html(val[11]).appendTo(tr)
				$("<td></td>").html(val[12]).appendTo(tr)
				$("<td></td>").html(val[13]).appendTo(tr)
				$("<td></td>").html(val[14]).appendTo(tr)
				$("<td></td>").html(val[15]).appendTo(tr)
				$("<td></td>").html(val[16]).appendTo(tr)
				$("<td></td>").html(val[17]).appendTo(tr)
				$("<td></td>").html(val[18]).appendTo(tr)
				$("<td></td>").html(val[19]).appendTo(tr)
				$("<td></td>").html(val[20]).appendTo(tr)
				$("<td></td>").html(val[21]).appendTo(tr)
				$("<td></td>").html(val[22]).appendTo(tr)
				$("<td></td>").html(val[23]).appendTo(tr)
				$("<td></td>").html(val[24]).appendTo(tr)
				$("<td></td>").html(val[25]).appendTo(tr)
				$("<td></td>").html(val[26]).appendTo(tr)
			})
// kucingkuluculoh		
	}

	function findPage(index) {
		var body = $("#body").empty()
		
		$.each(dataResult, function(i, val) {

			if(val.indexOf(index) > -1) {
				var tr = $("<tr></tr>").appendTo(body)
				$('<td><a href="#">'+val[0]+'</a></td>').appendTo(tr)
				$("<td></td>").html(val[1]).appendTo(tr)
				$("<td></td>").html(val[2]).appendTo(tr)
				$("<td></td>").html(val[3]).appendTo(tr)
				$("<td></td>").html(val[4]).appendTo(tr)
				$("<td></td>").html(val[5]).appendTo(tr)
				$("<td></td>").html(val[6]).appendTo(tr)
				$("<td></td>").html(val[7]).appendTo(tr)
				$("<td></td>").html(val[8]).appendTo(tr)
				$("<td></td>").html(val[9]).appendTo(tr)
				$("<td></td>").html(val[10]).appendTo(tr)
				$("<td></td>").html(val[11]).appendTo(tr)
				$("<td></td>").html(val[12]).appendTo(tr)
				$("<td></td>").html(val[13]).appendTo(tr)
				$("<td></td>").html(val[14]).appendTo(tr)
				$("<td></td>").html(val[15]).appendTo(tr)
				$("<td></td>").html(val[16]).appendTo(tr)
				$("<td></td>").html(val[17]).appendTo(tr)
				$("<td></td>").html(val[18]).appendTo(tr)
				$("<td></td>").html(val[19]).appendTo(tr)
				$("<td></td>").html(val[20]).appendTo(tr)
				$("<td></td>").html(val[21]).appendTo(tr)
				$("<td></td>").html(val[22]).appendTo(tr)
				$("<td></td>").html(val[23]).appendTo(tr)
				$("<td></td>").html(val[24]).appendTo(tr)
				$("<td></td>").html(val[25]).appendTo(tr)
				$("<td></td>").html(val[26]).appendTo(tr)
				return false
			}
		})


	}

	function renderGrid() {
		$.ajax({
			url: "process/getCsv.php",
			method: "GET",
			data: {
				'start': 1,
				'end': 20
			},
			dataType: 'json',
			success: function (data, status) {
				cache = data
				var body = $("#body").empty()
				var gridPaging = $("#gridPaging").empty()
				var numberPaging = 1
				dataPaging = cache.paging
				$.each(cache.paging, function(i, val) {

					if(i >= 1) {
						$("<li><a href='#' onclick=\"getPaging('"+i+"')\">"+numberPaging+"</a></li>").appendTo(gridPaging)
						numberPaging++	
					}
				})

				var cmgunmaskedname = $("#cmgunmaskedname")
				var clienttier = $("#clienttier")
				var cmgsegmentname = $("#cmgsegmentname")
				dataResult = cache.result
				$.each(cache.result, function(i, val) {
					$('<option value="'+val[1]+'">'+val[1]+'</option>').appendTo(cmgunmaskedname)
					$('<option value="'+val[2]+'">'+val[2]+'</option>').appendTo(clienttier)
					$('<option value="'+val[6]+'">'+val[6]+'</option>').appendTo(cmgsegmentname)
				})

				$.each(cache.data, function(i, val) {
					

					var tr = $("<tr></tr>").appendTo(body)
					$('<td><a href="#">'+val[0]+'</a></td>').appendTo(tr)
					$("<td></td>").html(val[1]).appendTo(tr)
					$("<td></td>").html(val[2]).appendTo(tr)
					$("<td></td>").html(val[3]).appendTo(tr)
					$("<td></td>").html(val[4]).appendTo(tr)
					$("<td></td>").html(val[5]).appendTo(tr)
					$("<td></td>").html(val[6]).appendTo(tr)
					$("<td></td>").html(val[7]).appendTo(tr)
					$("<td></td>").html(val[8]).appendTo(tr)
					$("<td></td>").html(val[9]).appendTo(tr)
					$("<td></td>").html(val[10]).appendTo(tr)
					$("<td></td>").html(val[11]).appendTo(tr)
					$("<td></td>").html(val[12]).appendTo(tr)
					$("<td></td>").html(val[13]).appendTo(tr)
					$("<td></td>").html(val[14]).appendTo(tr)
					$("<td></td>").html(val[15]).appendTo(tr)
					$("<td></td>").html(val[16]).appendTo(tr)
					$("<td></td>").html(val[17]).appendTo(tr)
					$("<td></td>").html(val[18]).appendTo(tr)
					$("<td></td>").html(val[19]).appendTo(tr)
					$("<td></td>").html(val[20]).appendTo(tr)
					$("<td></td>").html(val[21]).appendTo(tr)
					$("<td></td>").html(val[22]).appendTo(tr)
					$("<td></td>").html(val[23]).appendTo(tr)
					$("<td></td>").html(val[24]).appendTo(tr)
					$("<td></td>").html(val[25]).appendTo(tr)
					$("<td></td>").html(val[26]).appendTo(tr)
				})
			},
			error: function(data, status) {
				console.log(data, status)
			},
			beforeSend: function() {
				console.log("loading....")
			}
		})
	}

	$(function() {
		renderGrid()
	})
</script>