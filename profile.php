<?php if(!isset($_SESSION))
	    session_start();

	if(empty($_SESSION['perfil']))
		header("Location: login"); 	
?>

<!DOCTYPE html>
<html ng-app="myApp">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta charset="utf-8">
    <title>OnDiet | Perfil</title>
    <script src="libraries/jquery.min.js"></script>
    <script src="libraries/angular.js"></script>
    <script src="libraries/angular-sanitize.min.js"></script> 
    <script src="js/bin/materialize.min.js"></script>
    <link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="css/materialize.css" /> 
    <link rel="stylesheet" href="css/profile.css" />
</head>

<body ng-controller = "controller-profile">

	<div class="navbar-fixed">
		<nav class ="z-depth-0 deep-orange darken-4">
		    <div class="nav-wrapper"> 
		    	<a href=".">
		    	<div class="logo">
		      		<object data="img/system/logo_horizontal_whitetext.svg" type="image/svg+xml">Logo</object>
		      	</div> 
		    	</a>		      
		      	<div class="profile-btn"  ng-click = "logout()" >
		      		<div class="img" back-img="img/profile/{{profile.id}}/preview.jpg" letter = "{{profile.name[0]}}"></div>
		      		<div class="name">Cerrar sesión</div>
		      	</div>
		    </div> 
		</nav>
    </div>
    
    <div class="header deep-orange darken-4">
    	<div class="profile-img" back-img="img/profile/{{profile.id}}/preview.jpg" letter = "{{profile.name[0]}}"></div>
		<div class="profile-name"> {{profile.fullname}}</div>
		<a class="btn-floating btn-large waves-effect waves amber darken-1 z-depth-4" ng-click="newDiet()"><i class="material-icons">add</i></a>
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
		      		<span class="material-icons right edit-btn"  ng-click = "editDiet(x.id, x.name, x.descripcion, x.alimento)">edit</span>	
		      		<span class="material-icons right delete-btn" ng-click = "deleteDiet(x.id)">delete</span>	
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

	<div class="new-diet" ng-click="closeDiet($event)">
		<div class="new-diet-container z-depth-4">
			<i class="material-icons close-btn" ng-click="closeDiet($event)">close</i>
			<form action="POST" enctype="multipart/form-data" id = "form-diet">
				<h5>Nueva Dieta</h5> 
				<div class="input-field">
					<input type="text" id="diet-name" length="45" class="validate" id="diet-name">
					<label for="diet-name">Nombre de la dieta</label>
				</div>
				<div class="input-field">
		            <textarea id="diet-description" class="materialize-textarea validate" length="1000" id="diet-description"></textarea>
		            <label for="diet-description">Descripción</label>
		        </div>
				<br>
				<div class="chips chips-placeholder"></div>
				<div class="file-field input-field">
				    <div class="btn">
				        <span>Imagen</span>
				        <input type="file" name="dietImg"/> 
				    </div>
			    	<div class="file-path-wrapper">
			       		<input class="file-path" type="text" placeholder="Carga una imagen de la dieta">
			  		</div>
				</div>
				<a class="btn-floating btn-large waves-effect waves amber darken-1 z-depth-4" id="postDietBtn">
					<i class="material-icons">check</i>
				</a>
		    </form>
		</div>
	</div>  

	<div class="edit-diet" ng-click="closeDiet($event)">
		<div class="new-diet-container z-depth-4">
			<i class="material-icons close-btn" ng-click="closeDiet($event)">close</i>
			<form action="POST" enctype="multipart/form-data" id = "form-diet">
				<h5>Editar Dieta</h5> 
				<div class="input-field">
					<input placeholder = "" type="text" id="diet-name" length="45" class="validate" id="diet-name" ng-model = "edit.name">
					<label for="diet-name">Nombre de la dieta</label>
				</div>
				<div class="input-field">
		            <textarea placeholder = "" id="diet-description" class="materialize-textarea validate" length="1000" id="diet-description" ng-model = "edit.description"></textarea>
		            <label for="diet-description">Descripción</label>
		        </div>
				<br>
				<div class="chips chips-edit chips-placeholder"> 
					<input class = "input" placeholder="+Ingrediente">
				</div> 
				<a class="btn-floating btn-large waves-effect waves orange darken-3 z-depth-4" ng-click="sendEditDiet()">
					<i class="material-icons">check</i>
				</a>
		    </form>
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


	// Profile controller
	app.controller("controller-profile", function($scope, $http, $window){		 

		// Open new Diet panel
		$scope.newDiet = function(){
			$(".new-diet").addClass("show-panel");
			$('body').addClass("stop-scrolling"); 
		};

		// Close new Diet panel
		$scope.closeDiet = function($event){
			var target = $($event.target);
			if(target.hasClass("new-diet") || target.hasClass("edit-diet") || target.hasClass("close-btn")){
				$(".new-diet").removeClass("show-panel");
				$(".edit-diet").removeClass("show-panel");
				$('body').removeClass("stop-scrolling"); 
			}
		}; 

		$scope.logout = function(){
			console.log("entre");
			$http.get("controlador/logout").then(function(response){
				$window.location.href = "";
			}); 
			
		}; 

		$scope.editDiet = function(id, name, descrip, food){ 
			$(".edit-diet").addClass("show-panel");
			$('body').addClass("stop-scrolling"); 
			$scope.edit = [];
			$scope.edit.id = id;
			$scope.edit.name = name;
			$scope.edit.description = descrip;
			$scope.edit.food = food; 
			var food_data = [];
			$http.get("controlador/food_data").then(function(response){ 
				food_data = response.data;  
				angular.forEach($scope.edit.food, function(obj, key){
					angular.forEach(food_data, function(obj_food, key_food){ 
						if(obj.name == obj_food.tag){
							obj.image = true; return false;		 
						}
					}); 
					var img = (!obj.image) ? '' 
					: '<div class=\'img\' style=\'background-image:url(img/food/'+obj.id+'.jpg)\'></div>';
					$('.chips-edit').find(".chip:contains("+obj.name+")").remove();
					$('.chips-edit input').before(""+
						"<div class = 'chip' food-id='"+obj.id+"'>"+img+obj.name+
						"<i class='material-icons close'>close</i>"+
					"</div>"); 
				});
			});   						
		} 

		$scope.sendEditDiet = function(){
			var id = $scope.edit.id;
			var name = $scope.edit.name;
			var descrip = $scope.edit.description;
			var chips = $(".chips-edit .chip");
			var food = [];
			angular.forEach(chips, function(obj, key){
  				var aux = {};
				var isObject = !$(obj.childNodes[1]).is("i");
				var index = (isObject) ? 1 : 0; 
				if(isObject)
					aux.id = $(obj).attr("food-id");  
				aux.name = obj.childNodes[index].data;    
				food.push(aux);
			});	  

			$http.get("controlador/session_data").then(function(response){ 
				userid = response.data.id;
				$http.get("controlador/editDiet",
				{ 
					params : 
					{ 
						"user_id": userid,
						"food_id" : id,
						"food_name": name,
						"food_description": descrip,
						"products": angular.toJson(food)
					}
				}).then(function(response){
					console.log(response); 
					$window.location.reload(); 
				});
			});
		};


		// Delete a diet
		$scope.deleteDiet = function(id){ 
			$http.get("controlador/deleteDiet?iddiet="+id).then(function(response){
				$.each($scope.array, function(key, object){		
				if(object != undefined)		
					if(object.id == id)					
						$scope.array.splice(key, 1); 					
				});
			}); 			
		} 

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
		}
 	 
		// Get the current user session data
		$http.get('controlador/session_data.php').then(function(response){  
			$scope.profile = response.data;  
			$scope.profile.fullname	= $scope.profile.name +" "+$scope.profile.ap+" "+$scope.profile.am; 
		}).then(function(){

			// Get the diets data 
			$http.get("controlador/diet_data?profile="+$scope.profile.id).then(function(response){  
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
	});   
    </script>
     <script src="js/directives/backImg.js"></script>
     <script src="js/functions/diet.js"></script> 
</body>
</html>