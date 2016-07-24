var appControllers = angular.module('appControllers', ['ngAnimate']);

appControllers.controller('MainController', ['$scope', '$http','$routeParams', function($scope, $http, $routeParams) {

	$scope.fruits =[
		{
			'name': 'apple',
			'taste': 'ok'
		},
		{
			'name': 'banana',
			'taste': 'yummy'
		},
		{
			'name': 'strawberry',
			'taste': 'delicious'
		},
		{
			'name': 'melon',
			'taste': 'scrumptious'
		},
		{
			'name': 'mango',
			'taste': 'ooh la la'
		}
	];

}]);

