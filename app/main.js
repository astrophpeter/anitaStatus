/////////////////////////////////////////////////
//    AngularJs code to control the anita      //
//             status web page                 //
//                                             //
//           @author Peter McGill              //
//      @contact petermcgill94@gmail.com       //
/////////////////////////////////////////////////


var PATH_TO_STATUS_DATA = '../';

// global chartjs config files
//Chart.defaults.global.elements.line.fill = false;
//Chart.defaults.global.legend.labels.usePointStyle = false;


var anitaStatusApp = angular.module('anitaStatusApp', ['ngAnimate',"chart.js","ui.bootstrap"])

anitaStatusApp.factory('getStatus', function($http) {
	return {
		getStatusAsync: function(callback) {
			$http.get(PATH_TO_STATUS_DATA + 'hkStatus.json').success(callback);
		}
	};
});


anitaStatusApp.factory('getConfig', function($http) {
	return {
		getConfigAsync: function(callback) {
			$http.get('config.json').success(callback);
		}
	};
});




//anitaStatusApp.controller('statusController', function($scope, getStatus) {
//	getStatus.getStatusAsync(function(results) {
//		console.log('statusController async returned value');
//		$scope.varList = results.timeSum.varList;


//	});
//});

anitaStatusApp.controller('timeController', function($scope, getStatus) {

	getStatus.getStatusAsync(function(results) {
	console.log('timeController async returned value');
	$scope.run = results.timeSum.run;
	$scope.time = results.timeSum.startTime;
	});
});


anitaStatusApp.controller('configController', function($scope, getStatus, getConfig) {
	getConfig.getConfigAsync(function(results) {
		console.log('config async returned value');
		$scope.configs= results.configList;
	});

	getStatus.getStatusAsync(function(results) {
		console.log('data async returned value');
		$scope.varList = results.timeSum.varList;


	});


});




















/*var app = angular.module("app", ['ngAnimate',"chart.js","ui.bootstrap"]);

// retrieves configuration data
app.factory('configFactory', function($http) {
	return {
		getConfigAsync: function(callback) {
			$http.get('config.json').success(callback);
		}
	};
});

//define controllers
var controllers = {};

controllers.statusController = function($scope, configFactory) {

     var init = function() {
        // get config settings
        configFactory.getConfigAsync(function(results) {
	      console.log('Config async returned value');
        $scope.tempConfig = results.temperature;
        $scope.powerConfig = results.power;
	      });
     };







  // dummy data
  //var data = [
//
  // [40, 42, 35, 32, 33, 30, 27],
    //[28, 48, 40, 19, 14, 27, 30],
    //[15, 20, 21, 18, 14, 19, 23],
  //];




};


controllers.tempGraph = function ($scope, configFactory) {

  //retrieve data from factories
  var init = function() {
     // get config settings
     configFactory.getConfigAsync(function(results) {
     console.log('Config async returned value');
     $scope.tempConfig = results.temperature;
     var arrTempConfig = results.temperature;
     });
  };

  init();




$scope.labels = ["5:10", "5:12", "5:14", "5:16", "5:18", "5:20", "5:22"];
$scope.series = ['CPU', 'SURF 8','TURFIO faceplate'];



$scope.data = [

 [40, 42, 35, 32, 33, 30, 27],
  [28, 48, 40, 19, 14, 27, 30],
  [15, 20, 21, 18, 14, 19, 23],
];


//$scope.data = simpleFactory.content();

$scope.onClick = function (points, evt) {
  console.log(points, evt);
};
//$scope.datasetOverride = [{ yAxisID: 'y-axis-1' }, { yAxisID: 'y-axis-2' }];
$scope.options = {
  legend: {
            display: true,
            labels: {
                fontColor: 'rgb(255, 99, 132)'
            }
        },

        scales: {
          yAxes: [{
            scaleLabel: {
              display: true,
              labelString: 'Temperature [Degrees]'
            }
          }],
          xAxes: [{
            scaleLabel: {
              display: true,
              labelString: 'Time [UTC]'
            }
          }]
        }

};
};


// controller to the overview tab
controllers.Status = function ($scope) {



$scope.dataStatus = [{name: 'Data', LastRecieved: "na", status: 'good'},
{name: 'Temperature', LastRecieved: "na", status: 'good'},
{name: 'Memory', LastRecieved: "na", status: 'bad'},
{name: 'Power', LastRecieved: "na", status: 'good'}];


};

// tab display controller
controllers.tabs = function ($scope) {
  $scope.tabs = [{name: 'Data'}, {name: 'Temperature'}, {name: 'Memory'}, {name: 'Power'}];
};

// meta data pannel controller
controllers.metadataCtrl = function($http ,$scope) {


//  $scope.metadata = [{telem: 'IYA', recieved: '12/12/16-:12:13', size: "53Kb"},
//{telem: 'TDRSS', recieved: '13/12/16-:12:13', size: "53Kb"},
//{telem: 'LOS', recieved: '12/12/16-:12:13', size: "60Kb"},
//{telem: 'IYA', recieved: '12/12/16-:12:13', size: "60Kb"}];

};

app.controller(controllers);
*/
