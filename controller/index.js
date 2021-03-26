var app = angular.module("myApp", []);
app.controller('home', function($scope,$http) {
  $scope.startPage = function() {
   
};
  $scope.logout = function(){
      Swal.fire({
        title: 'ออกจากระบบหรือไม่',
        text: "ต้องการออกจากระบบ",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            'ออกจากระบบ!',
            'ออกจากระบบเเล้ว',
            'success'
          )
          window.location.replace('/ecommerce/index.php');
        }
      })
  };

});