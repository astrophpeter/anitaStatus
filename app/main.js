

// Chart config files
Chart.defaults.global.elements.line.fill = false;
Chart.defaults.global.legend.labels.usePointStyle = false;


var app = angular.module("app", ['ngAnimate',"chart.js","ui.bootstrap"]);



app.factory('simpleFactory', function($q, $http) {
  //var tempData = [
    //[65, 59, 80, 81, 56, 55, 40],
    //[28, 48, 40, 19, 86, 27, 90]
  //];

var tempData = null;


function LoadData() {
    var defer = $q.defer();
    $http.get('app/content.js').success(function (data) {
        tempData = data;
        console.log("Hello");
        defer.resolve();
    });
    return defer.promise;
}

    return LoadData();
//return {
//    GetData: function () { return tempData ; },
//    LoadData:LoadData
//}
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
//  scales: {
//    yAxes: [
//      {
//        id: 'y-axis-1',
//        type: 'linear',
//        display: true,
//        position: 'left'
//      },
//      {
//        id: 'y-axis-2',
//        type: 'linear',
//        display: true,
//        position: 'right'
//      }
//    ]
//  }
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

  var metaData = {};

  var object_by_id = $filter('filter')(foo.results, {name: data })[0];
  $scope.metaData = function($scope, $http) {
    $http.get("contnet.js").then(function (response) {
        return response.data.records;
    }
  )};

console.log(JSON.stringify(metaData))

//  $scope.metadata = [{telem: 'IYA', recieved: '12/12/16-:12:13', size: "53Kb"},
//{telem: 'TDRSS', recieved: '13/12/16-:12:13', size: "53Kb"},
//{telem: 'LOS', recieved: '12/12/16-:12:13', size: "60Kb"},
//{telem: 'IYA', recieved: '12/12/16-:12:13', size: "60Kb"}];

};

app.controller(controllers);
