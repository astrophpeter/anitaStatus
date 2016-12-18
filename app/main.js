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
} else {
    var PATH_TO_STATUS_DATA =
		'../../../../uhen/anita/aware/output/ANITA4/statusPage/hkStatus.json.gz';
}

// Start of App.
var anitaStatusApp = angular.module('anitaStatusApp', ['ngAnimate'])

anitaStatusApp.factory('getStatus', function($http) {
	return {
		getStatusAsync: function(callback) {
			$http.get(PATH_TO_STATUS_DATA).success(callback);
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
