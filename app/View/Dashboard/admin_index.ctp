 <!-- Content Wrapper. Contains page content -->
 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
       
      
    
 
      </div>
    </section>
    <!-- /.content -->
  
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
  <!--<script>
google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawLogScales);

function drawLogScales() {
     var data = new google.visualization.DataTable();
data.addColumn('string', 'Month'); // Implicit domain label col.
data.addColumn('number', ''); // Implicit series 1 data col.
data.addRows([
<?php foreach($zonalHeadCountMonth as $usr){ ?>
  ['<?php echo $usr['0']['month_name']; ?>',<?php echo $usr['0']['tusers']; ?>],
<?php } ?>
]);
      var options = {
        hAxis: {
          title: 'Month',
          logScale: true
        },
        vAxis: {
          title: 'Zonal Heads',
          logScale: false
        },
        colors: ['#a52714', '#097138']
      };

      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
      chart.draw(data, options);





 var data2 = new google.visualization.DataTable();
data2.addColumn('string', 'Month'); // Implicit domain label col.
data2.addColumn('number', 'Call Center Admin'); // Implicit series 1 data col.
data2.addRows([
<?php foreach($callCenterCountMonth as $usr){ ?>
  ['<?php echo $usr['0']['month_name']; ?>',<?php echo $usr['0']['tusers']; ?>],
<?php } ?>
]);
      var options = {
        hAxis: {
          title: 'Month',
          logScale: true
        },
        vAxis: {
          title: 'Call Center Admin',
          logScale: false
        },
        colors: ['#a52714', '#097138']
      };

      var chart = new google.visualization.LineChart(document.getElementById('chart_div2'));
      chart.draw(data2, options);

    }
    </script>-->