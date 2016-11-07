var app = angular.module("app", ["chart.js"]);

app.factory('simpleFactory', function($q, $http) {
  //var tempData = [
    //[65, 59, 80, 81, 56, 55, 40],
    //[28, 48, 40, 19, 86, 27, 90]
  //];

var tempData = null;

function LoadData() {
    var defer = $q.defer();
    $http.get('content.json').success(function (data) {
        tempData = data;
        defer.resolve();
    });
    return defer.promise;
}

return {
    GetData: function () { return tempData ; },
    LoadData:LoadData
}
  //var deferred = $q.defer();
	//$http.get('content.json').then(function (data)
	//{
		//deferred.resolve(data);
	//});

	//factory.getTemps = function ()
	//{
		//return deferred.promise;
	//}

  //var factory = {content:null};

  //$http.get('content.json').success(function(data) {
        // you can do some processing here
    //    factory.content = data;
  //});

});

//define controllers
var controllers = {};

controllers.tempGraph = function ($scope, simpleFactory) {

$scope.labels = ["January", "February", "March", "April", "May", "June", "July"];
$scope.series = ['Series A', 'Series B'];


$scope.data = simpleFactory.GetData();


//$scope.data = simpleFactory.content();

$scope.onClick = function (points, evt) {
  console.log(points, evt);
};
$scope.datasetOverride = [{ yAxisID: 'y-axis-1' }, { yAxisID: 'y-axis-2' }];
$scope.options = {
  scales: {
    yAxes: [
      {
        id: 'y-axis-1',
        type: 'linear',
        display: true,
        position: 'left'
      },
      {
        id: 'y-axis-2',
        type: 'linear',
        display: true,
        position: 'right'
      }
    ]
  }
};
};

app.controller(controllers);
