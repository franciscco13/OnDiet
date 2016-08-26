app.directive('backImg', function(){ 
    return function(scope, element, attrs){ 
         attrs.$observe('backImg', function(value) {

         	if(value == undefined)
         		return;         	

            element.css({
                'background-image': 'url(' + value +')',
                'background-size' : 'cover',
                'background-position': 'center center'
            }); 
        });
    };
}); 