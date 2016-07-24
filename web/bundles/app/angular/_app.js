var myApp = angular.module('myApp', [
	'ngRoute',
	'appControllers'
]);

myApp.config(['$routeProvider', function($routeProvider) {
	$routeProvider.
	when('/angularMain', {
		templateUrl: 'bundles/app/angular/views/main.html',
		controller: 'MainController'
	}).
	otherwise({
		redirectTo: '/angularMain'
	});
}]);
