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
          colors: ['#e0440e', '#e6693e', '#D79F01'],
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

.progress_div p{
    font-size:18px;
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
            <button class="btn button_green">DOWNLOAD OUR APP</button>
        </div>
    </div>
</div>


<div class="col-md-10 mx-auto pb-5">
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
                <div class="range_slidecontainer">
                    <input type="range" min="1" max="100" value="50" class="slider mt-3 mb-4" id="myRange">
                </div> 
              <!-- second input  -->
                <lable class="pl-2">Dowpayment</lable>
                <div class="input-group mt-1">  
                    <span>
                        <i class="fa fa-dollar" aria-hidden="true"></i>
                    </span>
                    <input type="text"  placeholder="24,400"  />                  
                </div>
                <div class="range_slidecontainer">
                    <input type="range" min="1" max="100" value="35" class="slider mt-3 mb-4" id="myRange">
                </div> 
              <!--third input  -->
              <lable class="pl-2">Intrest Rate</lable>
                <div class="input-group mt-1">  
                   
                    <input type="text"  placeholder="3.69"  />    
                    <span>
                        <i class="fa fa-percent" aria-hidden="true"></i>
                    </span>              
                </div>
                <div class="range_slidecontainer">
                    <input type="range" min="1" max="100" value="30" class="slider mt-3 mb-4" id="myRange">
                </div>
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
              <!-- last input      -->
                <div class="input-group mt-4 no_border"> 
                    <select>  
                        <option>HOA Fees,Insurance & Taxes</option>                    
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
                <div class="col-md-12 px-0 progress_div">
                <!-- progress 1  -->
                        <div class="text-center pt-5 mx-5 ">
                            <h1 class="display-4 mb-2 font-weight-bold text_green">$1,523</h1>
                                <p class="font-weight-light text-secondary mb-1">Mortgage Rate</p>
                            <div class="progress">
                                <div class="progress-bar button_green" style="width:50%"></div>
                            </div>
                        </div>
                <!-- progress 2  -->
                        <div class="text-center pt-4 mx-5 ">
                            <h1 class="mb-2 text_blue">$500</h1>
                                <p class="font-weight-light text-secondary mb-1">Home Insurance</p>
                            <div class="progress">
                                <div class="progress-bar button_blue" style="width:50%"></div>
                            </div>
                        </div>
                <!-- progress 3  -->
                        <div class="text-center pt-4 mx-5 ">
                            <h1 class="mb-2  text_ligth_yellow">$500</h1>
                                <p class="font-weight-light text-secondary mb-1">Taxes & Other Fees</p>
                            <div class="progress">
                                <div class="progress-bar button_light_yellow" style="width:50%"></div>
                            </div>
                        </div>

                        <!-- <button class="btn btn-primary">TEST</button><button class="btn btn-success">TEST12</button> -->
                </div>  
                   
                
            </div>
    </div>
</div> 
  






  <!-- Darker Gold #D79F01
Lighter Gold #E6C245
Grey #top_div
Blue #002A75 -->

 



