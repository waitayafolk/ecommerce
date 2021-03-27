var app = angular.module("myApp" , []);
app.controller('home',function($scope,$http){
    $scope.logout = function(){
        Swal.fire({
            title: 'Are you sure?',
            text: "ต้องการออกจากระบบหรือไม่",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ใช่'
          }).then((result) => {
            if (result.isConfirmed) {
                window.location.replace('/ecommerce/index.php');
            }
          })
    }
})