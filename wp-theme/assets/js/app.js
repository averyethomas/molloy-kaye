var app = angular.module('angularApp', []);

app.controller('mainCtrl', ['$scope', function ($scope) {

    
}]);


app.controller('galleryCtrl', ['$scope', function($scope){
    
    $scope.galleryOpen = false;
    
    $scope.galleryItems = document.getElementsByClassName('image');
    
    $scope.primaryId = 0;
   
    $scope.primaryImage = $scope.galleryItems[$scope.primaryId].getElementsByTagName('img')[0].src;
   
    $scope.changePrimary = function(id){
       $scope.primaryId = id;
       $scope.primaryImage = $scope.galleryItems[$scope.primaryId].getElementsByTagName('img')[0].src;
    }
    
    $scope.selectedIndex = 0;
     
    $scope.openGallery = function(id){
        $scope.selectedIndex = id;
        $scope.galleryOpen = true;
        $scope.disable();
        $scope.selectedItem = $scope.galleryItems[$scope.selectedIndex].getElementsByTagName('img')[0].src;
    }
   
    $scope.change = function(num){
        $scope.selectedIndex = $scope.selectedIndex += num;
        $scope.disable();
        $scope.selectedItem = $scope.galleryItems[$scope.selectedIndex].getElementsByTagName('img')[0].src;

    }
    
    $scope.selectedItem = $scope.galleryItems[$scope.selectedIndex].getElementsByTagName('img')[0].src;

   
    $scope.disable = function(){
        if($scope.selectedIndex == 0) {
            document.getElementById('prev').disabled = true;
            document.getElementById('next').disabled = false;
        } else if($scope.selectedIndex == $scope.galleryItems.length - 1){
            document.getElementById('prev').disabled = false;
            document.getElementById('next').disabled = true;
        } else if ($scope.galleryItems.length == 1) {
            document.getElementById('next').disabled = true;
            document.getElementById('prev').disabled = true;
        } else {
            document.getElementById('next').disabled = false;
            document.getElementById('prev').disabled = false;
        }
   }
   
   // $(document).keydown(function (e){
    //  if(e.keyCode == 39 ){       
      //  document.getElementById('next').click();
   //   } else if(e.keyCode == 37 ){        
   //     document.getElementById('prev').click();
    //  }
   // });
}])