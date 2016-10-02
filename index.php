<?php if(!isset($_SESSION))
        session_start();
?>
<!DOCTYPE html>
<html ng-app="myApp">
<head> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta charset="utf-8">
    <title>OnDiet</title>
    <script src="libraries/jquery.min.js"></script>
    <script src="libraries/angular.js"></script>
    <script src="libraries/angular-sanitize.min.js"></script> 
    <script src="js/bin/materialize.min.js"></script>
    <link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="css/materialize.css" />
    <link rel="stylesheet" href="css/rating.css" />
    <link rel="stylesheet" href="css/index.css" /> 
</head>
<body ng-controller = "controller-mainpage">
	<div class="navbar-fixed">
		<nav class ="z-depth-2">
		    <div class="nav-wrapper deep-orange darken-4"> 
		    	<?php
		    		if(isset($_SESSION['perfil']))
		    			echo '<a class = "link-login" href="profile">'.$_SESSION['perfil']['name'].'</a>';		    		
		    		else echo '<a class = "link-login" href="login">Inicia sesión</a>';
		    	?> 
		      	<div class="logo"><object data="img/system/logo_horizontal_whitetext.svg" type="image/svg+xml">Logo</object></div>
		    </div>  
		</nav> 
	</div>
	<div class="card-wrapper"> 
		<div class="card" id = "card-{{x.id}}" ng-repeat = "x in array | orderBy: '-id'">
		    <div class="card-image">
		      	<div class="image activator waves-block waves-effect waves-light" back-img="img/diets/{{x.id}}/preview.jpg">
		      	</div>
		    </div>
		    <div class="card-content">
		      	<span class="card-title activator grey-text text-darken-4">
		      		{{x.name}}
		      		<i class="material-icons right more-btn">more_vert</i>		
		      		<span class="material-icons right buy-btn" ng-click="shopping(x.alimento)">shopping_cart</span>		      		 
		      	</span> 
		      	<div class="chip">
					<div back-img="img/profile/{{profile.id}}/preview.jpg" class="img-profile" letter = "{{x.nutriologo.name[0]}}"></div>
				    {{x.nutriologo.name}} {{x.nutriologo.apPat}}
				</div><br/>
				<div class="rating-container" diet-id = "{{x.id}}" ng-click = "rate($event)">
  					<i class="material-icons star" val = "{{$index+1}}" ng-repeat = "s in x.stars">{{s.val}}</i> 
				</div> 
				<!-- <div class = "diet-rating">{{x.rating}}<span> / {{x.stars.length}}</span></div> -->
		    </div>
		    <div class="card-reveal">
		      	<span class="card-title grey-text text-darken-4">
		      		<h1 class = "deep-orange-text text-accent-4">{{x.name}}</h1>
		      		<i class="material-icons right close-card">close</i>		      		 
		      	</span>
		      	<h2>Ingredientes</h2> 
		      	<ul>
		      		<li ng-repeat = "y in x.alimento">
		      			<div back-img = "img/food/{{y.id}}.jpg"></div>
		      			<span>{{y.name}}</span>
		      		</li>
		      	</ul>
		      	<h2>Preparación</h2>
		      	<p>{{x.descripcion | replaceBr}}</p>
		    </div>
		</div>
	</div>   

	<script>
	var app = angular.module("myApp", ['ngSanitize']); 

	// Replace <br/> structure with new line format in diet description
	app.filter('replaceBr', function () { 
	    return function (text, target, otherProp) {
	    	var regex = /<br[^>]*>/gi;
	    	return text.replace(regex, "\n"); 
	    };
	});

	app.controller("controller-mainpage", function($scope, $http, $window){

		$scope.shopping = function(food){
			var string = "";
			var cont = 0;
			angular.forEach(food, function(value, key){
				string += "f[" + cont + "]=" + value.id + "&"; 
				cont++;
			});
			string = string.slice(0, -1);
			$window.location.href = "../dbcontroller?"+string;
		};

		// Rating event 
		$scope.rate = function($event){
			var star = $($event.target);
			var parent = star.parent();
			parent.find(".star").removeClass("is-selected");
			parent.find(".star").html("star_border");
			star.html("star");
			star.addClass("is-selected");
			star.prevAll(".star").html("star");
			star.prevAll(".star").addClass("is-selected");			
			var rate = star.attr("val");
			var diet = $($event.currentTarget).attr("diet-id");
			$http.get("controlador/newRating?diet="+diet+"&rate="+rate);
		};

		// Get the diets data
		$http.get("controlador/diet_data").then(function(response){ 	 
			$.each(response.data,function(index, val){ 
				var stars = [];
				for(var i = 0; i < 5; i++){
					stars[i] = {}; 
					if((i+1) <= val.rating)
						stars[i]["val"] = "star"; 
					else 
						stars[i]["val"] = "star_outlined";
				}
				response.data[index]["stars"] = stars; 
			});	
			$scope.array = response.data; 		
		}).then(function(){
			// Get the rating data
			$http.get("controlador/rating_data").then(function(response){ 
				$.each(response.data, function(key, value){ 
					var card = $("#card-"+key);
					var star = $(card.find(".rating-container .star")[value.rate-1]); 
					var parent = star.parent();

					parent.find(".star").removeClass("is-selected");
					parent.find(".star").html("star_border");
					star.html("star");
					star.addClass("is-selected");
					star.prevAll(".star").html("star");
					star.prevAll(".star").addClass("is-selected"); 
				});  
			});			
		});
	});
    </script>    
    <script src="js/directives/backImg.js"></script>
    <script src="js/directives/fileModel.js"></script>  
     <script src="js/functions/diet.js"></script> 
</body>
</html>