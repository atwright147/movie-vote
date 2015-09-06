<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
	<meta charset="UTF-8">
	<title>{{title}}</title>
	<link rel="stylesheet" href="/bower/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="/bower/bootstrap/dist/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="/bower/font-awesome/css/font-awesome.min.css">
</head>
<body>
	<div class="container">
		<div class="page-header">
			<h1>{{title}}</h1>
		</div>

		<ng-view></ng-view>
	</div>
	
	<script src="/bower/angular/angular.min.js"></script>
	<script src="/bower/angular-route/angular-route.min.js"></script>
	<script src="/bower/lodash/lodash.min.js"></script>
	<script src="/app/app.js"></script>
</body>
</html>