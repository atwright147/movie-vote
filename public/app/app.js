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
app.controller('MoviesController', function($rootScope, $scope, $http) {
	$rootScope.title = "Andy's Movies";

	$http.get('/api/v1/movies').then(function(response) {
		$scope.movies = response.data;
	});

	$scope.vote = function(id, direction) {
		$http.post('/api/v1/movies/vote', {"id": id, "direction": direction});
	};
});
