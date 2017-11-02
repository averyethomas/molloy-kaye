var app = angular.module('angularApp', []);

app.controller('mainCtrl', ['$scope', function ($scope) {

    
}]);


app.controller('galleryCtrl', ['$scope', function($scope){

    $scope.lightbox = function(n){
        $scope.gallery = document.getElementsByClassName('image');
        
        $scope.active = $scope.gallery[n];
    }
}])