<?php
// World stat cURL
$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://coronavirus-monitor.p.rapidapi.com/coronavirus/worldstat.php",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => array(
		"x-rapidapi-host: coronavirus-monitor.p.rapidapi.com",
		"x-rapidapi-key: 8ca5dbd881msh6ff46780657753bp16712ajsn7d89f4904385"
	),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
    $response = json_decode($response, true);
}

//Country cURL
$curl2 = curl_init();

curl_setopt_array($curl2, array(
	CURLOPT_URL => "https://coronavirus-monitor.p.rapidapi.com/coronavirus/cases_by_country.php",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => array(
		"x-rapidapi-host: coronavirus-monitor.p.rapidapi.com",
		"x-rapidapi-key: 8ca5dbd881msh6ff46780657753bp16712ajsn7d89f4904385"
	),
));

$response2 = curl_exec($curl2);
$err2 = curl_error($curl2);

curl_close($curl2);

if ($err2) {
	echo "cURL Error #:" . $err2;
} else {
    $response2 = json_decode($response2, true);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COVID-19 Tracker</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-sm">
        <div class="header-body">
            <div class="row align-items-end">
              <div class="col">
                <!-- Title -->
                <h1 class="header-title">
                  COVID-19 Tracker
                </h1>

              </div>
            </div> <!-- / .row -->
          </div>
        <div class="row">
            <div class="col-12 col-lg-6 col-xl">
    
              <!-- Value  -->
              <div class="card">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col">
    
                      <!-- Title -->
                      <h6 class="text-uppercase text-muted mb-2">
                        Total Recovery
                      </h6>
    
                      <!-- Heading -->
                      <span class="h2 mb-0" id="total_recovered">
                        <?php echo $response['total_recovered'];?>
                      </span>
    
                      <!-- Badge -->
                    </div>
                    <div class="col-auto">
    
                      <!-- Icon -->
                      <span class="h2 fe fe-dollar-sign text-muted mb-0"></span>
    
                    </div>
                  </div> <!-- / .row -->
                </div>
              </div>
    
            </div>
            <div class="col-12 col-lg-6 col-xl">
    
              <!-- Hours -->
              <div class="card">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col">
    
                      <!-- Title -->
                      <h6 class="text-uppercase text-muted mb-2">
                        Total Death
                      </h6>
    
                      <!-- Heading -->
                      <span class="h2 mb-0" id="total_death">
                        <?php echo $response['total_deaths'];?>
                      </span>
    
                    </div>
                    <div class="col-auto">
    
                      <!-- Icon -->
                      <span class="h2 fe fe-briefcase text-muted mb-0"></span>
    
                    </div>
                  </div> <!-- / .row -->
                </div>
              </div>
    
            </div>
            <div class="col-12 col-lg-6 col-xl">
    
              <!-- Exit -->
              <div class="card">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col">
    
                      <!-- Title -->
                      <h6 class="text-uppercase text-muted mb-2">
                        Total Cases
                      </h6>
    
                      <!-- Heading -->
                      <span class="h2 mb-0" id="total_cases">
                      <?php echo $response['total_cases'];?>
                      </span>
    
                    </div>
                    <div class="col-auto">
    
                      <!-- Chart -->
                      <div class="chart chart-sparkline"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                        <canvas class="chart-canvas chartjs-render-monitor" id="sparklineChart" width="75" height="35" style="display: block; width: 75px; height: 35px;"></canvas>
                      </div>
    
                    </div>
                  </div> <!-- / .row -->
                </div>
              </div>
    
            </div>
            <div class="col-12 col-lg-6 col-xl">
    
              <!-- Time -->
              <div class="card">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col">
    
                      <h6 class="text-uppercase text-muted mb-2">
                        New Case
                      </h6>
    
                      <span class="h2 mb-0" id="new_case">
                      <?php echo $response['new_cases'];?>
                      </span>
    
                    </div>
                    <div class="col-auto">
    
                      <!-- Icon -->
                      <span class="h2 fe fe-clock text-muted mb-0"></span>
    
                    </div>
                  </div>
                </div>
              </div>
    
            </div>
            <div class="col-12 col-lg-6 col-xl">
    
                <!-- Time -->
                <div class="card">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col">
      
                        <!-- Title -->
                        <h6 class="text-uppercase text-muted mb-2">
                            New Death
                        </h6>
      
                        <!-- Heading -->
                        <span class="h2 mb-0" id="new_death">
                        <?php echo $response['new_deaths'];?>
                        </span>
      
                      </div>
                      <div class="col-auto">
      
                        <!-- Icon -->
                        <span class="h2 fe fe-clock text-muted mb-0"></span>
      
                      </div>
                    </div>
                  </div>
                </div>
      
              </div>
          </div>
          <div class="row">
            <div class="col-12">
  <br>
              <!-- Goals -->
              <div class="card">
                <div class="table-responsive mb-0" data-toggle="lists" data-options="{&quot;valueNames&quot;: [&quot;goal-project&quot;, &quot;goal-status&quot;, &quot;goal-progress&quot;, &quot;goal-date&quot;]}">
                    <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search for Country name.." title="Type in a name">
                    <button onclick="sortTable()">Sort by Country</button>
                    <table class="table table-sm table-nowrap card-table countries_stat" id="countries_stat">
                    <thead>
                      <tr>
                        <th>
                          <a href="#" class="text-muted sort" data-sort="goal-project">
                            Country
                          </a>
                        </th>
                        <th>
                            <a href="#" class="text-muted sort" data-sort="goal-project">
                            Cases
                            </a>
                        </th>
                        <th>
                          <a href="#" class="text-muted sort" data-sort="goal-status">
                            Death
                          </a>
                        </th>
                        <th>
                          <a href="#" class="text-muted sort" data-sort="goal-progress">
                            Serious critical
                          </a>
                        </th>
                        <th>
                          <a href="#" class="text-muted sort" data-sort="goal-date">
                            Total Recovered
                          </a>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        $response2count=count($response2['countries_stat']);
                        for($x = 0;$x < $response2count;$x++){
                    ?>
                        <tr>
                            <td><?php echo $response2['countries_stat'][$x]['country_name']; ?></td>
                            <td><?php echo $response2['countries_stat'][$x]['cases']; ?></td>
                            <td><?php echo $response2['countries_stat'][$x]['deaths']; ?></td>
                            <td><?php echo $response2['countries_stat'][$x]['serious_critical']; ?></td>
                            <td><?php echo $response2['countries_stat'][$x]['total_recovered']; ?></td>
                        </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                  </table>
                </div>
              </div>
  
            </div>
          </div>
          <br>
          <button class="btn btn-success" onclick="rapidapicredit()">API By astsiatsko RapidAPI</button>
    </div>
<script src="script.js"></script>
</body>
</html>