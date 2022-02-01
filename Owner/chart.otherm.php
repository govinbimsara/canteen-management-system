<?php 
//index.php
// $a = $_POST['']
include('header.php');

if(!isset($_SESSION['username'])){
    header("location: login.php");
    ob_end_flush();
}

include_once "includes/dbh.inc.php";
if(isset($_GET['food'])){
    $s = $_GET['food'];
}
else{
    $s = 'Milk rice';
}
$query1 = "SELECT DISTINCT name FROM fyp";
$result1 = mysqli_query($conn, $query1);
?>
<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="GET">
    <select name="food" id="food">
            <option disabled selected value> -- select food -- </option>
                <?php foreach ($result1 as $foods) { ?>

                    <option value="<?= $foods['name'] ?>"><?= $foods['name'] ?>
                </option>
                                <?php
                            }
                            ?>
    </select>
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit">Search</button>
    </div>
</form>
<?php
$b = "Bun";
$query = "SELECT *FROM(SELECT * FROM fyp WHERE name= '$s' ORDER BY time DESC LIMIT 30)sub ORDER BY time ASC";
$result = mysqli_query($conn, $query);
$chart_data = '';
$chart1_data = '';
$chart2_data = '';


while($row = mysqli_fetch_array($result))
{
 $a = date('l', strtotime($row["time"]));
 $chart_data .= "{ time:'".$a."', quantity:".$row["quantity"].", sales:".$row["sales"]."}, ";
 $chart1_data .= "{ label:'".$a."', value:".$row["quantity"]."}, ";
 $chart2_data .= "{ label:'".$a."', value:".$row["sales"]."}, ";
 
}
$chart_data = substr($chart_data, 0, -2);
$chart1_data = substr($chart1_data, 0, -2);
$chart2_data = substr($chart2_data, 0, -2);


// $query1 = "SELECT time,quantity FROM fyp WHERE name='A' ORDER BY 'time' LIMIT 5";
// $result1 = mysqli_query($conn, $query1);
// $chart1_data = '';
// while($row = mysqli_fetch_array($result1))
// {
//  $a = date('l', strtotime($row["time"]));
//  $chart1_data .= "{ label:'".$a."', value:".$row["quantity"]."}, ";
// }
// $chart1_data = substr($chart1_data, 0, -2);
?>




  <script src="https://code.jquery.com/jquery-3.4.0.js"></script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.1/dist/html2canvas.min.js"></script>

  
 
 
  <br /><br />
  <div class="container" style="width:900px;">
   <h2 class="text-center"><?php echo $s ?></h2>
   <h3 class="text-center">Dynamic Values of Quentity Graph</h3>   
   <br /><br />

   <div>
   <div id="chart"></div>
   <button onclick="save();" style="float: right;">Download</button> 
   <!-- <?php
    print_r($chart_data)
  ?> -->
    </div>
  <table style="width:1100px;">
    <tr>
      <td>
      <h3>Quantity Sold</h3>
   <div id="donutleft" style="align:left;"></div>
   <?php
    print_r($chart1_data)
  ?>
      </td>
      <td>
      <h3>Sales(Rs.'000')</h3>
   <div id="donutright" style="align:left;"></div>
   <?php
    print_r($chart2_data)
  ?>
      </td>
    </tr>

  </table>
  <div id="line"></div>
  <!-- <?php
    print_r($chart_data)
  ?> -->
  <div id="line1"></div>
    
  </div>

  <div class = "container">
  <button class = "btn btn-warning btn-sm"><a href = "index.php" style = "text-decoration: none; color: #333;">Back to Results</a></button>
</div>

<?php
    include('footer.php');
?>

<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'time',
 ykeys:['quantity','sales'],
 labels:['Quantity', 'Sales'],
 hideHover:'auto',
 xLabels: 'day',
 xLabelAngle: 45,
 stacked:false
});

function save() {
    html2canvas(document.getElementById('chart')).then(canvas => {
        var w = document.getElementById("chart").offsetWidth;
        var h = document.getElementById("chart").offsetHeight;

        var img = canvas.toDataURL("image/jpeg", 1);

        var doc = new jsPDF('L', 'pt', [w, h]);
        doc.addImage(img, 'JPEG', 10, 10, w, h);
        doc.save('sample-file.pdf');
    }).catch(function(e) {
        console.log(e.message);
    });
}

Morris.Line({
 element : 'line',
 data:[<?php echo $chart_data; ?>],
 xkey:'time',
 ykeys:['quantity','sales'],
 labels:['Quantity', 'Sales'],
 hideHover:'auto',
 stacked:false,
 xLabels: 'day',
 xLabelAngle: 45,
 resize:true
});

Morris.Line({
  element: 'line1',
  data: [
    { period: '2016-05-10', park1: 200, park2: 200, park3: 50, park4: 10, park5: 0 },
    { period: '2016-05-11', park1: 15, park2: 275, park3: 5, park4: 60, park5: 0 },
    { period: '2016-05-12', park1: 80, park2: 20, park3: 30, park4: 30, park5: 0 },
    { period: '2016-05-13', park1: 100, park2: 200, park3: 250, park4: 50, park5: 0 },
    { period: '2016-05-14', park1: 50, park2: 60, park3: 20, park4: 10, park5: 0 },
    { period: '2016-05-15', park1: 75, park2: 65, park3: 10, park4: 60, park5: 0 },
    { period: '2016-05-16', park1: 175, park2:95, park3: 110, park4: 30, park5: 0 },
    { period: '2016-05-17', park1: 150, park2:95, park3: 90, park4: 111, park5: 0 },
    { period: '2016-05-18', park1: 120, park2:95, park3: 60, park4: 47, park5: 0 },
    { period: '2016-05-19', park1: 60, park2:95, park3: 50, park4: 231, park5: 0 },
    { period: '2016-05-20', park1: 10, park2:95, park3: 100, park4: 80, park5: 0 }
  ],
  lineColors: ['#819C79', '#fc8710', '#FF6541', '#A4ADD3', '#766B56'],
  xkey: 'period',
  ykeys: ['park1','park2','park3','park4','park5'],
  labels: ['PARK 1', 'PARK 2', 'PARK 3', 'PARK 4', 'PARK 5'],
  xLabels: 'day',
  xLabelAngle: 45,

  resize: true
});

new Morris.Donut({
 element : 'donutleft',
 data:[<?php echo $chart1_data; ?>]
});

Morris.Donut({
 element : 'donutright',
 data:[<?php echo $chart2_data; ?>]
});

</script>