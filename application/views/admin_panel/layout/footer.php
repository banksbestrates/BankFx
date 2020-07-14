</div>

<div class="modal" id="myModal">
	<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
	
		<button type="button" class="close" data-dismiss="modal">&times;</button>
	</div>
	<div class="modal-body">
		
	</div>	
	<div class="modal-footer">
		
	</div>
	</div>
	</div>
</div>
	<!--   Core JS Files   -->
	<script src="<?php echo base_url()?>assets/admin_panel/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?php echo base_url();?>assets/admin_panel/js/core/popper.min.js"></script>
	<script src="<?php echo base_url();?>assets/admin_panel/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="<?php echo base_url();?>assets/admin_panel/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?php echo base_url();?>assets/admin_panel/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="<?php echo base_url();?>assets/admin_panel/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<!-- Chart JS -->
	<script src="<?php echo base_url();?>assets/admin_panel/js/plugin/chart.js/chart.min.js"></script>
	<!-- jQuery Sparkline -->
	<!-- <script src="<?php echo base_url();?>assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script> -->
	<!-- Chart Circle -->
	<script src="<?php echo base_url();?>assets/admin_panel/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="<?php echo base_url();?>assets/admin_panel/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
	<!-- jQuery Vector Maps -->
	<script src="<?php echo base_url();?>assets/admin_panel/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="<?php echo base_url();?>assets/admin_panel/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>
	<!-- Sweet Alert -->
	<script src="<?php echo base_url();?>assets/admin_panel/js/plugin/sweetalert/sweetalert.min.js"></script>
	<!-- Atlantis JS -->
	<script src="<?php echo base_url();?>assets/admin_panel/js/atlantis.min.js"></script>
	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="<?php echo base_url();?>assets/admin_panel/js/setting-demo.js"></script>
    <!-- <script src="<?php echo base_url();?>assets/admin_panel/js/demo.js"></script> -->
    <script src="<?php echo base_url();?>assets/admin_panel/libs/common.js"></script>
    <script src="<?php echo base_url();?>assets/admin_panel/libs/headerProcess.js"></script>
	<script>
		var pageURL = window.location.href;
		var lastURLSegment = pageURL.substr(pageURL.lastIndexOf('/') + 1);
		$(".nav-item").removeClass("active");
		$("#"+lastURLSegment).addClass("active");
	
		
	
	
		// Circles.create({
		// 	id:'circles-1',
		// 	radius:45,
		// 	value:60,
		// 	maxValue:100,
		// 	width:7,
		// 	text: 5,
		// 	colors:['#f1f1f1', '#FF9E27'],
		// 	duration:400,
		// 	wrpClass:'circles-wrp',
		// 	textClass:'circles-text',
		// 	styleWrapper:true,
		// 	styleText:true
		// })

		// Circles.create({
		// 	id:'circles-2',
		// 	radius:45,
		// 	value:70,
		// 	maxValue:100,
		// 	width:7,
		// 	text: 36,
		// 	colors:['#f1f1f1', '#2BB930'],
		// 	duration:400,
		// 	wrpClass:'circles-wrp',
		// 	textClass:'circles-text',
		// 	styleWrapper:true,
		// 	styleText:true
		// })

		// Circles.create({
		// 	id:'circles-3',
		// 	radius:45,
		// 	value:40,
		// 	maxValue:100,
		// 	width:7,
		// 	text: 12,
		// 	colors:['#f1f1f1', '#F25961'],
		// 	duration:400,
		// 	wrpClass:'circles-wrp',
		// 	textClass:'circles-text',
		// 	styleWrapper:true,
		// 	styleText:true
		// })

		// var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

		// var mytotalIncomeChart = new Chart(totalIncomeChart, {
		// 	type: 'bar',
		// 	data: {
		// 		labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
		// 		datasets : [{
		// 			label: "Total Income",
		// 			backgroundColor: '#ff9e27',
		// 			borderColor: 'rgb(23, 125, 255)',
		// 			data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
		// 		}],
		// 	},
		// 	options: {
		// 		responsive: true,
		// 		maintainAspectRatio: false,
		// 		legend: {
		// 			display: false,
		// 		},
		// 		scales: {
		// 			yAxes: [{
		// 				ticks: {
		// 					display: false //this will remove only the label
		// 				},
		// 				gridLines : {
		// 					drawBorder: false,
		// 					display : false
		// 				}
		// 			}],
		// 			xAxes : [ {
		// 				gridLines : {
		// 					drawBorder: false,
		// 					display : false
		// 				}
		// 			}]
		// 		},
		// 	}
		// });

		// $('#lineChart').sparkline([105,103,123,100,95,105,115], {
		// 	type: 'line',
		// 	height: '70',
		// 	width: '100%',
		// 	lineWidth: '2',
		// 	lineColor: '#ffa534',
		// 	fillColor: 'rgba(255, 165, 52, .14)'
		// });

    
		
	</script>
</body>
</html>