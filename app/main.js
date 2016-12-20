/////////////////////////////////////////////////
//    AngularJs code to control the anita      //
//             status web page                 //
//                                             //
//           @author Peter McGill              //
//      @contact petermcgill94@gmail.com       //
/////////////////////////////////////////////////


//development vairable to retrieve test data when working locally.
var dev = false;

if (dev) {
    var PATH_TO_STATUS_DATA = 'hkStatus.json';
    var PATH_TO_STATUS_MONITOR= 'monitorHk.json';
} else {
    var PATH_TO_STATUS_DATA =
		'../../../../uhen/anita/aware/output/ANITA4/statusPage/hkStatus.json.gz';
    var PATH_TO_STATUS_MONITOR =
		'../../../../uhen/anita/aware/output/ANITA4/statusPage/monitorhkStatus.json.gz';
}

// Start of App.
var anitaStatusApp = angular.module('anitaStatusApp', ['ngAnimate','angular.filter'])

anitaStatusApp.factory('getStatus', function($http) {
	return {
		getStatusAsync: function(callback) {
			$http.get(PATH_TO_STATUS_DATA).success(callback);
		}
	};
});

//grabs most rencent disk spaces.
anitaStatusApp.factory('getMem', function($http) {
	return {
		getMemAsync: function(callback) {
			$http.get(PATH_TO_STATUS_MONITOR).success(callback);
		}
	};
});

// Factories used to asynchronous load config and live ANITA data
anitaStatusApp.factory('getConfig', function($http) {
	return {
		getConfigAsync: function(callback) {
			$http.get('config.json').success(callback);
		}
	};
});

// grabs packet meta data.
anitaStatusApp.controller('timeController', function($scope, getStatus) {

	getStatus.getStatusAsync(function(results) {
	console.log('timeController async returned value');
	$scope.run = results.timeSum.run;
	$scope.time = results.timeSum.startTime;
	});
});

// grabs config settings and indvidual component data.
anitaStatusApp.controller('configController', function($scope, getStatus, getConfig,getMem) {
	getConfig.getConfigAsync(function(results) {
		console.log('config async returned value');
		$scope.configs= results.configList;
	});

	getStatus.getStatusAsync(function(results) {
		console.log('data async returned value');
		$scope.varList = results.timeSum.varList;
	});

  getMem.getMemAsync(function(results) {
		console.log('Mem async returned value');
		$scope.percentRam = results.timeSum.varList.slice(0,1)[0].timeList[0].mean;
    $scope.memRam = results.timeSum.varList.slice(3,4)[0].timeList[0].mean;
    $scope.percentHel1 = results.timeSum.varList.slice(1,2)[0].timeList[0].mean;
    $scope.memHel1 = results.timeSum.varList.slice(4,5)[0].timeList[0].mean;
    $scope.percentHel2 = results.timeSum.varList.slice(2,3)[0].timeList[0].mean;
    $scope.memHel2 = results.timeSum.varList.slice(5,6)[0].timeList[0].mean;
	});
});

// convert bytes to MB
anitaStatusApp.filter('toMB', function() {
    return function(input) {
      return input / 1000000;
    }

  });
