/**
* app Module
*
* Description
*/
var app = angular.module('app', ['ngRoute']);

app.config(['$routeProvider', function($routeProvider) {
		$routeProvider
			.when('/', {
				templateUrl: '/app/home/home-template.html',
				controller:  'HomeController'
			})
			.when('/movies/', {
				templateUrl: '/app/movies/movies-template.html',
				controller:  'MoviesController'
			})
			.when('/movie/:id', {
				templateUrl: '/app/movies/movie-template.html',
				controller:  'MovieController'
			})
			.when('/about', {
				templateUrl: '/app/about/about-template.html',
				controller:  'AboutController'
			})
			.when('/contact', {
				templateUrl: '/app/contact/contact-template.html',
				controller:  'ContactController'
			})
			.otherwise({
				redirectTo: '/'
			});
	}
]);


app.factory('_', function() {
	return window._; // assumes underscore has already been loaded on the page
});


app.controller('HomeController', function($rootScope, $scope) {
	$rootScope.title = "Andy's Movies";
});