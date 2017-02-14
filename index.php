<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta fragment="" content="!">
	<base href="http://angularjs.learnwebtutorials.com/demo/24/">
    <title>Using Angular ng-route</title>
  </head>
  <body ng-app="app" ng-controller="ctrl">
  	  <p>The below <a href="content">content</a> 
	  and <a href="content2">content2</a> is included with ng-route...</p>
	  
	  <?php
		if ( isset($_GET['_escaped_fragment_']) ) {
		
			if ( trim($_GET['_escaped_fragment_']) === '' ) {
				include('partials/home.html');
			} else {
				$template = basename($_GET['_escaped_fragment_']);
				include('partials/' . $template . '.html');
			}
		} else { 
	  ?>
	  	<div ng-view></div>
	  <?php } ?>
	  
	  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.2/angular.min.js"></script>
	  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.2/angular-route.js"></script>
	  <script>
	  angular.module('app', ['ngRoute'])
	  .config(['$routeProvider', '$locationProvider', 
		  function($routeProvider, $locationProvider) {
	
			$locationProvider.hashPrefix('!');	  	
			$locationProvider.html5Mode(true);
			
			$routeProvider
			  .when('/', {
			  	templateUrl: 'partials/home.html'
			  })
			  .when('/content', {
				templateUrl: 'partials/content.html',
			  })
			  .when('/index.php/content', {
			  	redirectTo: '/content'
			  })
			  .when('/content2', {
				templateUrl: 'partials/content2.html',
			  })
			  .when('/index.php/content2', {
			  	redirectTo: '/content2'
			  })
			  .otherwise({
			  	redirectTo : '/'
			  });
			  
		}])
	  	.controller('ctrl', ['$scope', function($scope) {
			
		}]);
	  </script>
  </body>
</html>

