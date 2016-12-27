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
                     <li class="active"><a href="#overview" data-toggle="tab"><img src="fonts/component.svg" alt="" width="30" height="20" align="middle">Components</a></li>
                     <li><a href="#memory" data-toggle="tab"><img src="fonts/memory.svg" alt="" width="25" height="15" align="middle">Storage</a></li>
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

                <div class="tab-pane" id="memory">
                  <div ng-controller="configController">
                  <table class="table table-bordered">
                     <thead class="text-center">
                        <th class="text-center">Drive</th>
                        <th class="text-center">Space Remaining [Mb]</th>
                        <th class="text-center">Percent Full</th>
                     </thead>

                     <tbody class="text-center">
                     <tr>
                        <td> Ram </td>

                        <td> {{memRam}} </td>

                        <td>

                          <div ng-if="percentRam <= configs[0].Ram[0].memory[0].max && percentRam >= configs[0].Ram[0].memory[0].min">
                           <div class="progress">
                           <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{percentRam | number : 0}}"
                            aria-valuemin="0" aria-valuemax="100" ng-style="{width : ( percentRam  + '%' ) }">
                            <span> Good : {{percentRam | number : 0 }} %</span>
                          </div>
                           </div>
                          </div>
                          <div ng-if="percentRam > configs[0].Ram[0].memory[0].max || percentRam < configs[0].Ram[0].memory[0].min">
                          <div class="progress">
                          <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="{{percentRam | number : 0}}"
                           aria-valuemin="0" aria-valuemax="100" ng-style="{width : ( percentRam  + '%' ) }">
                           <span> Warning : {{percentRam | number : 0 }} %</span>
                          </div>
                          </div>
                          </div>

                        </td>
                     </tr>

                     <tr>
                        <td> Helium1 </td>

                        <td> {{memHel1}} </td>

                        <td>
                          <div ng-if="percentHel1 <= configs[0].Hel1[0].memory[0].max && percentHel2 >= configs[0].Hel1[0].memory[0].min">
                           <div class="progress">
                           <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{percentHel1 | number : 0}}"
                            aria-valuemin="0" aria-valuemax="100" ng-style="{width : ( percentHel1  + '%' ) }">
                            <span> Good : {{percentHel1 | number : 0 }} %</span>
                          </div>
                           </div>
                         </div>
                         <div ng-if="percentHel1 > configs[0].Hel1[0].memory[0].max || percentHel1 < configs[0].Hel1[0].memory[0].min">
                          <div class="progress">
                          <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="{{ 100 - percentHel1 | number : 0}}"
                           aria-valuemin="0" aria-valuemax="100" ng-style="{width : ( percentHel1  + '%' ) }">
                           <span> Warning : {{percentHel1 | number : 0 }} %</span>
                         </div>
                          </div>
                        </div>
                       </td>
                     </tr>

                     <tr>
                        <td> Helium2 </td>

                        <td> {{memHel2}} </td>

                        <td>
                          <div ng-if="percentHel2 <= configs[0].Hel2[0].memory[0].max && percentHel2 >= configs[0].Hel2[0].memory[0].min">
                           <div class="progress">
                           <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{percentHel2 | number : 0}}"
                            aria-valuemin="0" aria-valuemax="100" ng-style="{width : ( percentHel2  + '%' ) }">
                            <span> Good : {{percentHel2 | number : 0 }} %</span>
                          </div>
                           </div>
                         </div>
                         <div ng-if="percentHel2 > configs[0].Hel2[0].memory[0].max || percentHel2 < configs[0].Hel2[0].memory[0].min">
                          <div class="progress">
                          <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="{{percentHel2 | number : 0}}"
                           aria-valuemin="0" aria-valuemax="100" ng-style="{width : ( percentHel2  + '%' ) }">
                           <span> Warning : {{percentHel2 | number : 0 }} %</span>
                         </div>
                          </div>
                        </div>
                       </td>
                     </tr>
                   </tbody>

                  </table>
                </div>
              </div>
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

                           <p><b>Last Received</b> <?php


                           $filename = '../../../uhen/anita/aware/output/ANITA4/statusPage/hkStatus.json.gz';
                           if (file_exists($filename)) {
                               $file_time = new DateTime(date ("Y-m-d H:i:s.", filemtime($filename)));
                               $current_time = new DateTime(date('Y-m-d H:i:s'));

                               $diff_time = $file_time->diff($current_time);

                               if ($diff_time->i < 5) {
                                 echo '<span class="label label-sucess">' . $file_time->format('Y-m-d H:i:s') . '</span>';
                               } else if ($diff_time->i < 10) {
                                 echo '<span class="label label-warning">' . $file_time->format('Y-m-d H:i:s') . '</span>';
                               } else {
                                 echo '<span class="label label-danger">' . $file_time->format('Y-m-d H:i:s') . '</span>';
                               }


                           } else {
                               echo "No Info";
                           }
                           clearstatcache();
                           ?> </p>

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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-filter/0.5.14/angular-filter.js"></script>

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
