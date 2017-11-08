var app = angular.module('angularApp', []);

app.controller('mainCtrl', ['$scope', function ($scope) {

    
}]);


app.controller('galleryCtrl', ['$scope', function($scope){
    
    $scope.galleryOpen = false;
    
    $scope.galleryItems = [
        {src:'http://adventures.averyethomas.com/wp-content/uploads/2017/07/kilmahog-05.jpg'},
        {src:'http://adventures.averyethomas.com/wp-content/uploads/2017/07/royal-mile-04-1.jpg'},
        {src:'http://adventures.averyethomas.com/wp-content/uploads/2017/07/holyrood-park-04.jpg'},
        {src:'http://adventures.averyethomas.com/wp-content/uploads/2017/07/southern-cross-01.jpg'},
        {src:'http://adventures.averyethomas.com/wp-content/uploads/2017/07/calton-hill-02.jpg'},
        {src:'http://adventures.averyethomas.com/wp-content/uploads/2017/07/kilmahog-02.jpg'}    
    ]
    
    $scope.primaryId = 0;
   
    $scope.primaryImage = $scope.galleryItems[$scope.primaryId];
   
    $scope.changePrimary = function(id){
       $scope.primaryId = id;
       $scope.primaryImage = $scope.galleryItems[$scope.primaryId];
    }
    
   $scope.selectedIndex = 0;
   
   $scope.selectedItem = $scope.galleryItems[$scope.selectedIndex];
  
   $scope.openGallery = function(id){
      $scope.selectedIndex = id;
      $scope.galleryOpen = true;
      $scope.disable();
   }
   
   $scope.change = function(num){
     $scope.selectedIndex = $scope.selectedIndex += num;
     $scope.disable();
   }
   
   $scope.disable = function(){
     if($scope.selectedIndex == 0) {
       document.getElementById('prev').disabled = true;
       document.getElementById('next').disabled = false;
     } else if($scope.selectedIndex == $scope.galleryItems.length - 1){
       document.getElementById('prev').disabled = false;
       document.getElementById('next').disabled = true;
     } else {
       document.getElementById('next').disabled = false;
       document.getElementById('prev').disabled = false;
     }
   }
   
    $(document).keydown(function (e){
      if(e.keyCode == 39 ){       
        document.getElementById('next').click();
      } else if(e.keyCode == 37 ){        
        document.getElementById('prev').click();
      }
    });
}])