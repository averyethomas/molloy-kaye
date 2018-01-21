var app = angular.module('angularApp', ['ngResource', 'ngSanitize']);

app.controller('mainCtrl', ['$scope', function ($scope) {

    
}]);

app.factory('apiCall', ['$location', function($location){

    var protocol = $location.protocol() + '://';
    var host = $location.host();
    var origin = protocol + host + '/molloy-kaye-wordpress';
    var apiPoint = appInfo.api_url;
    var apiCall = origin + '/' + apiPoint;
    
    return apiCall;

}]);

app.controller('listingsCtrl', ['$scope', '$window','$http','apiCall', function($scope, $window, $http, apiCall){
    var count = 1;
    $scope.listings = [];
    $scope.closedListings = [];
    $scope.rawUrl =  apiCall + 'listings';
    
    $scope.init = function(){
        $scope.loading = true;
        $http({
            method: 'GET',
            url: $scope.rawUrl,
            params:{
                'per_page': 90,
                'page': 1,
                'orderby' : 'date',
                'order' : 'desc'
            }
        }).
        success(function(data, status, headers, config){
            $scope.loading = false;
            //$scope.listings = $scope.listings.concat(data);
            $scope.currentDataNumber = data.length;
            console.log(data);
            
            angular.forEach(data, function(value){                
                if (value.acf.sale_status == "Closed") {
                    $scope.closedListings = $scope.closedListings.concat(value);
                } else {
                    $scope.listings = $scope.listings.concat(value);
                }
            })
        }).
        error(function(data, status, headers, config){});
    };
    
    $scope.init();

    $scope.getData = function(){
        $scope.loading = true;
        count = count+1;
        $http({
            method: 'GET',
            url: $scope.rawUrl,
            params:{
                'per_page': 90,
                'page': count,
                'orderby' : 'date',
                'order' : 'desc'
            }
        }).
        success(function(data, status, headers, config){
            $scope.currentDataNumber = data.length;
            //$scope.listings = $scope.listings.concat(data);
            $scope.loading = false;
            
            angular.forEach(data, function(value){                
                if (value.acf.sale_status == "Closed") {
                    $scope.closedListings = $scope.closedListings.concat(value);
                } else {
                    $scope.listings = $scope.listings.concat(value);
                }
            })
        }).
        error(function(data, status, headers, config){});
    };
    $scope.dataCheck = function(){
        if($scope.currentDataNumber === 90){
            $scope.getData()
        } else if($scope.currentDataNumber < 90){
            $scope.loading = false;
        }
    };
    angular.element($window).bind("scroll", function() {
        var windowHeight = "innerHeight" in window ? window.innerHeight : document.documentElement.offsetHeight;
        var body = document.body, html = document.documentElement;
        var docHeight = Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight,  html.scrollHeight, html.offsetHeight);

        windowBottom = windowHeight + window.pageYOffset;

        if (windowBottom >= docHeight) {
            $scope.$apply(function(){
                $scope.dataCheck();
            })
        }
    });
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


app.filter('spaceless',function() {
    return function(input) {
        if (input) {
            return input.replace(/\s+/g, '-').toLowerCase();    
        }
    }
});