$(function(){

	// Publica nueva dieta
	$(document).on("click", "#postDietBtn", function(){

		// obten valores para enviar al servidor
		var dietInfo = new FormData($('#form-diet')[0]); 
		var dietName = $("#diet-name").val();
		var dietDescription = $("#diet-description").val().replace(/\n/g, "<br/>"); 
		var chips = $(".new-diet .chips .chip");
		var dietFood = [];
		$.each(chips, function(index, value){
			var this_chip = $(".new-diet .chips .chip")[index];
			var this_chip__elements = this_chip.childNodes.length;
			var food = [];
			food.name 	= this_chip.childNodes[this_chip__elements-2].nodeValue;
			food.id 	= this_chip.attributes['food-id'];
			food.id  	= (food.id === undefined) ? undefined : food.id.nodeValue;
			dietFood[index] = {};
			dietFood[index].id = food.id; 
			dietFood[index].name = food.name; 
		});  
 
		// Añadir al objeto a enviar
		dietInfo.append('name', dietName);
		dietInfo.append('description', dietDescription); 
		dietInfo.append('food', JSON.stringify(dietFood))

		// peticion ajax
	    $.ajax({
		  	url: 'controlador/newDiet', 
		  	type: 'POST', 
		  	data: dietInfo,	
		  	cache: false,
		  	processData: false,
		  	contentType: false     
		}).done(function(data){
		  	console.log(data);
		  	$(".close-btn").click();
		  	location.reload();
		}).fail(function(){
		  	console.log("An error occurred, the files couldn't be sent!");
		});
	});

	var chip_var;

	$.post("controlador/food_data", function(response){ 
		chip_var = $.parseJSON(response); 
	});

	
	$('.chips-placeholder').material_chip({
	   placeholder: '+ingrediente',
	   secondaryPlaceholder: 'Ingredientes', 
	}); 

	$('.chips').on('chip.add', function(e, chip){ 	 
		var obj = [];
		obj = isAlready(chip.tag);	 
		if(obj != undefined){ 
			var img = (!obj.image) ? '' 
				: '<div class=\'img\' style=\'background-image:url(img/food/'+obj.id+'.jpg)\'></div>';
			$('.chips').find(".chip:contains("+chip.tag+")").remove();
			$('.chips input').before(""+
				"<div class = 'chip' food-id='"+obj.id+"'>"+
					img+
						obj.tag+
					"<i class='material-icons close'>close</i>"+
				"</div>"); 
		}
	});

	function isAlready(name){   
		toReturn = undefined;
		$.each(chip_var, function(index){					
			var s = chip_var[index];  
			if(normalize(name) == normalize(s.tag)){
				toReturn = [];
				toReturn = chip_var[index];
				return false;		 
			}
		});	 			
		return toReturn;
	}

	function normalize(name){	 
		return name.
			toLowerCase().
			replace(/[áàäâå]/, 'a').
			replace(/[éèëê]/,  'e').
			replace(/[íìïî]/,  'i').
			replace(/[óòöô]/,  'o').
			replace(/[úùüû]/,  'u').
			replace(/[ýÿ]/,    'y').
			replace(/[ñ]/,     'n').
			replace(/[ç]/,     'c').
			replace(/['"]/,    '');  
	}

});