<!doctype html>
<html ng-app="anitaStatusApp">
   <head>
      <!-- Bootstrap -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/myccs.css" rel="stylesheet">

      <!--Make changes in config immediate-->
      <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">

     <!--Refresh every 5 mins-->
     <META HTTP-EQUIV="refresh" CONTENT="300">


   </head>
   <body>
      <!--header banner-->
      <?php include 'includes/header.php';?>


      <div class="container">
         <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="panel panel-default" ng-controller="timeController">
                  <div class="panel-body">
                     <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                           <b>Flight Status:</b> Live
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">

                          <!--UTC CLOCK-->
                           <span class="label label-primary">
                           <a href="https://time.is/London" id="time_is_link"
                              rel="nofollow" style="font-size:13px">
                           <font color="white">Current UTC:</font></a>
                           <span id="UTC_za00" style="font-size:13px"></span></span>
                           <!--/UTC CLOCK-->


                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
               <!--Tabs-->
               <div id="content">
                  <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                     <li class="active"><a href="#overview" data-toggle="tab"><img src="fonts/menu.svg" alt="" width="25" height="15" align="middle">Overview</a></li>
                     <!--<li><a href="#config" data-toggle="tab"><img src="fonts/cog.svg" alt="" width="25" height="15" align="middle">Config</a></li>-->
                  </ul>


               </div>
               <div id="my-tab-content" class="tab-content">
                  <div class="tab-pane active" id="overview">
                     <!--Overview Table-->
                     <div ng-controller="configController">
                        <div class="panel panel-default">
                           <table class="table table-bordered">
                              <thead class="text-center">
                                 <th></th>
                                 <th class="text-center">Item</th>
                                 <th class="text-center">Average Value</th>
                                 <th class="text-center">Status</th>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td colspan="1"> <img src="fonts/speed-meter.svg" alt="" width="42" height="15" align="middle"><b>Current</b> <text class="text-muted">[Amps]</text></td>
                                 </tr>
                                 <tr ng-repeat="vital in varList.slice(0,1)">
                                    <!--NAME-->
                                    <td></td>
                                    <td> {{ vital.label }} </td>
                                    <!--TIME STAMP-->
                                    <td> {{ vital.timeList[0].mean | number : 2 }}</td>
                                    <!--STATUS BADGE-->
                                    <td>
                                       <!--Check if status is good/bad and alter badge css-->
                                       <div ng-if="vital.timeList[0].mean <= configs[0].PV[0].current[0].max
                                          && vital.timeList[0].mean >= configs[0].PV[0].current[0].min ">
                                          <?php include 'includes/goodLabel.php';?>
                                       </div>
                                       <div ng-if="vital.timeList[0].mean > configs[0].PV[0].current[0].max
                                          || vital.timeList[0].mean < configs[0].PV[0].current[0].min">
                                          <?php include 'includes/warningLabel.php';?>
                                       </div>
                                    </td>
                                 </tr>
                                 <tr ng-repeat="vital in varList.slice(1,2)">
                                    <!--NAME-->
                                    <td></td>
                                    <td> {{ vital.label }} </td>
                                    <!--TIME STAMP-->
                                    <td> {{ vital.timeList[0].mean | number : 2}}</td>
                                    <!--STATUS BADGE-->
                                    <td>
                                       <!--Check if status is good/bad and alter badge css-->
                                       <div ng-if="vital.timeList[0].mean <= configs[0].Batt[0].current[0].max
                                          && vital.timeList[0].mean >= configs[0].Batt[0].current[0].min ">
                                          <?php include 'includes/goodLabel.php';?>
                                       </div>
                                       <div ng-if="vital.timeList[0].mean > configs[0].Batt[0].current[0].max
                                          || vital.timeList[0].mean < configs[0].Batt[0].current[0].min">
                                          <?php include 'includes/warningLabel.php';?>
                                       </div>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td colspan="1"><img src="fonts/thermometer.svg" alt="" width="42" height="15" align="middle"> <b> Temperature </b> <text class="text-muted">[Degrees Celsius]</text> </td>
                                 </tr>
                                 <tr ng-repeat="vital in varList.slice(2,3)">
                                    <td></td>
                                    <td> {{ vital.label }} </td>
                                    <!--TIME STAMP-->
                                    <td> {{ vital.timeList[0].mean | number : 2}}</td>
                                    <!--STATUS BADGE-->
                                    <td>
                                       <!--Check if status is good/bad and alter badge css-->
                                       <div ng-if="vital.timeList[0].mean <= configs[0].CPU[0].temp[0].max
                                          && vital.timeList[0].mean >= configs[0].CPU[0].temp[0].min ">
                                          <?php include 'includes/goodLabel.php';?>
                                       </div>
                                       <div ng-if="vital.timeList[0].mean > configs[0].CPU[0].temp[0].max
                                          || vital.timeList[0].mean < configs[0].CPU[0].temp[0].min">
                                          <?php include 'includes/warningLabel.php';?>
                                       </div>
                                    </td>
                                 </tr>
                                 <tr ng-repeat="vital in varList.slice(3,4)">
                                    <td></td>
                                    <td> {{ vital.label }} </td>
                                    <!--TIME STAMP-->
                                    <td> {{ vital.timeList[0].mean | number : 2}}</td>
                                    <!--STATUS BADGE-->
                                    <td>
                                       <!--Check if status is good/bad and alter badge css-->
                                       <div ng-if="vital.timeList[0].mean <= configs[0].Core1[0].temp[0].max
                                          && vital.timeList[0].mean >= configs[0].Core1[0].temp[0].min ">
                                          <?php include 'includes/goodLabel.php';?>
                                       </div>
                                       <div ng-if="vital.timeList[0].mean > configs[0].Core1[0].temp[0].max
                                          || vital.timeList[0].mean < configs[0].Core1[0].temp[0].min">
                                          <?php include 'includes/warningLabel.php';?>
                                       </div>
                                    </td>
                                 </tr>
                                 <tr ng-repeat="vital in varList.slice(4,5)">
                                    <td></td>
                                    <td> {{ vital.label }} </td>
                                    <!--TIME STAMP-->
                                    <td> {{ vital.timeList[0].mean | number : 2}}</td>
                                    <!--STATUS BADGE-->
                                    <td>
                                       <!--Check if status is good/bad and alter badge css-->
                                       <div ng-if="vital.timeList[0].mean <= configs[0].Core2[0].temp[0].max
                                          && vital.timeList[0].mean >= configs[0].Core2[0].temp[0].min ">
                                          <?php include 'includes/goodLabel.php';?>
                                       </div>
                                       <div ng-if="vital.timeList[0].mean > configs[0].Core2[0].temp[0].max
                                          || vital.timeList[0].mean < configs[0].Core2[0].temp[0].min">
                                          <?php include 'includes/warningLabel.php';?>
                                       </div>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td colspan="1"><img src="fonts/high-voltage.svg" alt="" width="42" height="20" align="middle"><b>Voltage</b> <text class="text-muted">[Volts]</text></td>
                                 </tr>
                                 <tr ng-repeat="vital in varList.slice(5,6)">
                                    <td></td>
                                    <td> {{ vital.label }} </td>
                                    <!--TIME STAMP-->
                                    <td> {{ vital.timeList[0].mean | number : 2 }}</td>
                                    <!--STATUS BADGE-->
                                    <td>
                                       <!--Check if status is good/bad and alter badge css-->
                                       <div ng-if="vital.timeList[0].mean <= configs[0]['+24'][0].voltage[0].max
                                          && vital.timeList[0].mean >= configs[0]['+24'][0].voltage[0].min ">
                                          <?php include 'includes/goodLabel.php';?>
                                       </div>
                                       <div ng-if="vital.timeList[0].mean > configs[0]['+24'][0].voltage[0].max
                                          || vital.timeList[0].mean < configs[0]['+24'][0].voltage[0].min">
                                          <?php include 'includes/warningLabel.php';?>
                                       </div>
                                    </td>
                                 </tr>
                                 <tr ng-repeat="vital in varList.slice(6,7)">
                                    <td> </td>
                                    <td> {{ vital.label }} </td>
                                    <!--TIME STAMP-->
                                    <td> {{ vital.timeList[0].mean | number : 2 }}</td>
                                    <!--STATUS BADGE-->
                                    <td>
                                       <!--Check if status is good/bad and alter badge css-->
                                       <div ng-if="vital.timeList[0].mean <= configs[0].PV[0].voltage[0].max
                                          && vital.timeList[0].mean >= configs[0].PV[0].voltage[0].min ">
                                          <?php include 'includes/goodLabel.php';?>
                                       </div>
                                       <div ng-if="vital.timeList[0].mean > configs[0].PV[0].voltage[0].max
                                          || vital.timeList[0].mean < configs[0].PV[0].voltage[0].min">
                                          <?php include 'includes/warningLabel.php';?>
                                       </div>
                                    </td>
                                 </tr>
                              <tbody>
                           </table>
                        </div>
                     </div>
                  </div>
                <!--  <div class="tab-pane active" id="config">
                     IYA
                  </div>-->

               </div>
            </div>


            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">


               <!--Packet Data Display-->
               <div class ng-controller="timeController">
                  <div class="panel panel-default">
                     <div class="panel-heading"><b>Packet Data</b></div>
                     <ul class="list-group">

                        <li class="list-group-item">


                           <p> <b>Start Time</b> : {{ time }}</p>

                           <p><b>Last Recieved</b> <?php include 'includes/getModTime.php';?> </p>

                           <p> <b>Run Number</b> : {{ run }}</p>

                        </li>

                     </ul>
                  </div>
               </div>
               <!--/Packet Data Display-->

               <!--ANITA INFO PANEL-->
               <?php include 'includes/anitaInfo.php';?>

            </div>
         </div>
      </div>


      <!--Footer-->
      <?php include 'includes/footer.php';?>


      <!--angularjs-->
      <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
      <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-animate.js"></script>

      <!--appframework-->
      <script src="app/main.js"></script>
      <script src="//widget.time.is/en.js"></script>
      <script src="app/time.js"></script>

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="modules/bootstrap.min.js"></script>

   </body>

</html>
