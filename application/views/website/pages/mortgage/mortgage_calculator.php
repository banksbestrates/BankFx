<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],      
          ['Sleep',    7]
        ]);

        var options = {       
          pieHole: 0.5,
          colors: ['#e0440e', '#e6693e', '#CB9D24'],
          pieSliceTextStyle: {
            color: 'black',
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
</script> -->

<style>

input{
  border:none;
  background-color: transparent;
  width:95%
}
input:focus,
select:focus,
textarea:focus,
button:focus {
    outline: none;
}
select{
  border:none;
  background-color: transparent;
  width:100%
}



.input-group{
    border: 2px #626262 solid;
    padding: 6px 10px 6px 10px;
    border-radius: 10px;
}

.mortgage_calculator{
    border:1px solid #626262;
}
.pie_chart_div{
    border-left:1px solid #626262;
}
.pie_chart_div .top_div{
    border-bottom:1px solid #626262;
    color: #626262!important;
    text-align:center;
    font-size:20px;
} 
.pie_chart_div .top_div .active{
    color: #CB9D24!important;
   
} 


</style>
<!-- Bank Review -->
<div class="col-md-10 mx-auto py-5">
    <div class="row">
        <div class="col-md-8">
            <h1 class="font-weight-bold mb-2">Mortgage Calculator</h1>
            <p>Published on July 30. Do you want to get more information ?</p>
        </div>
        <div class="col-md-4 text-right pt-3">
            <button class="btn button_yellow">DOWNLOAD OUR APP</button>
        </div>
    </div>
</div>


<div class="col-md-10 mx-auto ">
    <!-- 1st div starts here -->
    <div class="row mortgage_calculator mx-1">
            <div class="col-md-5 p-4 calculator_form_div">  
                <p class="text-justify"> Enter your details below to estimate your monthly mortgage payment with tases, feeds and insurance</p>
              <!-- first input  -->
                <lable class="pl-2">Purchase Price</lable>
                <div class="input-group mt-1">  
                    <span>
                        <i class="fa fa-dollar" aria-hidden="true"></i>
                    </span>
                    <input type="text"  placeholder="24,400"  />                  
                </div>
                <input type="range" min="1" max="100" value="50" class="w-100 my-3" id="myRange"> 


              <!--third input  -->
              <lable class="pl-2">Intrest Rate</lable>
                <div class="input-group mt-1">  
                   
                    <input type="text"  placeholder="3.69"  />    
                    <span>
                        <i class="fa fa-percent" aria-hidden="true"></i>
                    </span>              
                </div>
                <input type="range" min="1" max="100" value="50" class="w-100 my-3" id="myRange">  
              <!--forth input  -->
              <lable class="pl-2">Intrest Rate</lable>
                <div class="input-group mt-1"> 
                    <select>  
                        <option>30 Year Fixed</option>
                        <option>20 Year Fixed </option>
                        <option>15 Year Fixed </option>
                        <option>10 Year Fixed</option>                       
                    </select>               
                </div>
            </div>
            <div class="col-md-7 py-4 px-0 pie_chart_div">
                <div class="col-md-12 px-0 top_div">
                    <div class="row pb-3 px-0">
                        <div class="col-md-6 active">Payment Breakdown</div>
                        <div class="col-md-6">Payment Over Time</div>
                    </div>                  
                </div>  

                <div id="donutchart" style="width:100%; height: 500px;"></div>
            </div>
    </div>
</div> 
  






  <!-- Darker Gold #CB9D24
Lighter Gold #E6C245
Grey #top_div
Blue #002A75 -->

 



