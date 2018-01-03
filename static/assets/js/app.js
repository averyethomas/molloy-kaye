var app = angular.module('angularApp', ['ngResource', 'ngSanitize']);

app.controller('mainCtrl', ['$scope', function ($scope) {

    
}]);

app.controller('filterCtrl', ['$scope', function($scope){
    
    $scope.isActive = false;
    
    $scope.runFilter = function (input){
        
        $scope.items = document.getElementsByClassName('listing');
        
        angular.forEach($scope.items, function(value){
            
        })  
    }
    
    $scope.runFilter();
    
}]);

app.controller('scrollTopCtrl', ['$scope', function ($scope) {

    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("scrollUp").style.display = "block";
        } else {
            document.getElementById("scrollUp").style.display = "none";
        }
    }
    
    $scope.scrollToTop = function() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
    
}]);

app.controller('mapCtrl',['$scope', '$window', function($scope, $window){
        
    $scope.initMap = function(lat, lng, themePath){
        var place = {lat: lat, lng: lng};
        var symbol = themePath + '/assets/images/map-marker.svg';
        var map = new google.maps.Map(document.getElementById('contactMap'), {
            zoom: 10,
            center: place,
            styles: [
              {
                "featureType": "administrative",
                "elementType": "geometry",
                "stylers": [
                  {
                    "visibility": "off"
                  }
                ]
              },
              {
                "featureType": "administrative.land_parcel",
                "elementType": "labels",
                "stylers": [
                  {
                    "visibility": "off"
                  }
                ]
              },
              {
                "featureType": "poi",
                "stylers": [
                  {
                    "visibility": "off"
                  }
                ]
              },
              {
                "featureType": "poi",
                "elementType": "labels.text",
                "stylers": [
                  {
                    "visibility": "off"
                  }
                ]
              },
              {
                "featureType": "road",
                "elementType": "labels.icon",
                "stylers": [
                  {
                    "visibility": "off"
                  }
                ]
              },
              {
                "featureType": "road.arterial",
                "elementType": "labels",
                "stylers": [
                  {
                    "visibility": "off"
                  }
                ]
              },
              {
                "featureType": "road.highway",
                "elementType": "geometry",
                "stylers": [
                  {
                    "saturation": -10
                  },
                  {
                    "lightness": 50
                  }
                ]
              },
              {
                "featureType": "road.highway",
                "elementType": "geometry.fill",
                "stylers": [
                  {
                    "color": "#fd6f10"
                  },
                  {
                    "saturation": -30
                  },
                  {
                    "lightness": 45
                  }
                ]
              },
              {
                "featureType": "road.highway",
                "elementType": "geometry.stroke",
                "stylers": [
                  {
                    "saturation": -75
                  },
                  {
                    "weight": 0.5
                  }
                ]
              },
              {
                "featureType": "road.highway",
                "elementType": "labels",
                "stylers": [
                  {
                    "visibility": "off"
                  }
                ]
              },
              {
                "featureType": "road.local",
                "stylers": [
                  {
                    "visibility": "off"
                  }
                ]
              },
              {
                "featureType": "road.local",
                "elementType": "labels",
                "stylers": [
                  {
                    "visibility": "off"
                  }
                ]
              },
              {
                "featureType": "transit",
                "stylers": [
                  {
                    "visibility": "off"
                  }
                ]
              },
              {
                "featureType": "water",
                "elementType": "geometry.fill",
                "stylers": [
                  {
                    "color": "#466aa0"
                  },
                  {
                    "saturation": -40
                  },
                  {
                    "lightness": 30
                  }
                ]
              },
              {
                "featureType": "water",
                "elementType": "labels.text.fill",
                "stylers": [
                  {
                    "visibility": "on"
                  }
                ]
              }
            ]
        });
        var marker = new google.maps.Marker({
          position: place,
          map: map,
          icon: symbol
        });
    };
}])

app.controller('galleryCtrl', ['$scope', function($scope){
    
    $scope.galleryOpen = false;
    $scope.galleryImages = document.getElementsByClassName('image');
    $scope.galleryItems = document.getElementsByClassName('item');
    $scope.galleryItemsClean = [];
    
    angular.forEach($scope.galleryItems, function(value, index){
        if ( value.classList.contains('image') == true ) {
            $scope.galleryItemsClean.push({type: "img", source: value.getElementsByTagName('img')[0].src})
        } else if ( value.classList.contains('video') == true){
            $scope.galleryItemsClean.push({type: "vid", source: value.getElementsByTagName('iframe')[0].src})
        }
    });
    
    $scope.primaryId = 0;
   
    $scope.primaryImage = $scope.galleryImages[$scope.primaryId].getElementsByTagName('img')[0].src;
   
    $scope.changePrimary = function(id){
       $scope.primaryId = id;
       $scope.primaryImage = $scope.galleryImages[$scope.primaryId].getElementsByTagName('img')[0].src;
    }
    
    $scope.selectedIndex = 0;
     
    $scope.openGallery = function(id){
        $scope.selectedIndex = id;
        $scope.galleryOpen = true;
        $scope.disable();
        $scope.selectedItem = $scope.galleryItemsClean[$scope.selectedIndex];
        console.log($scope.selectedItem);
    }
   
    $scope.change = function(num){
        $scope.selectedIndex = $scope.selectedIndex += num;
        $scope.disable();
        $scope.selectedItem = $scope.galleryItemsClean[$scope.selectedIndex]

    }
    
    $scope.selectedItem = $scope.galleryItemsClean[$scope.selectedIndex]

   
    $scope.disable = function(){
        if($scope.selectedIndex == 0) {
            document.getElementById('prev').disabled = true;
            document.getElementById('next').disabled = false;
        } else if($scope.selectedIndex == $scope.galleryItems.length - 1){
            document.getElementById('prev').disabled = false;
            document.getElementById('next').disabled = true;
        } else if ($scope.galleryItemsClean.length == 1) {
            document.getElementById('next').disabled = true;
            document.getElementById('prev').disabled = true;
        } else {
            document.getElementById('next').disabled = false;
            document.getElementById('prev').disabled = false;
        }
   };
   
   (function($){
        $(document).keydown(function (e){
            if(e.keyCode == 39 ){       
                document.getElementById('next').click();
            } else if(e.keyCode == 37 ){        
                document.getElementById('prev').click();
            }
        });
    }(jQuery));
}]);

app.filter('preserveHtml', function($sce) {
    return function(val) {
        return $sce.trustAsHtml(val);
    };
});

app.filter('trustAsResourceUrl', ['$sce', function($sce) {
    return function(val) {
        return $sce.trustAsResourceUrl(val);
    };
}]);