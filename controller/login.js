app.controller("Clt_login",function ($scope, $http) {
    $scope.startPage = function() {
    };
    $scope.user = {};

    $scope.login = function(){
        // console.log($scope.user)
        if($scope.user.username == undefined || $scope.user.password == undefined ){
            Swal.fire({
                icon: 'error',
                title: 'Login Fail',
                text: 'โปรดกรอก User และ Password ให้ครบ'
              })
        }else{
            $http({
                url:"api/login.php",
                method: "POST",
                data: $scope.user,
              }).then(function (data) {
                if (data.data.message == "success") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Login Success',
                        text: 'รหัสผ่านถูกต้อง'
                      })
                      window.location.replace('/ecommerce/views/index.php');
                }else if(data.data.message == "invalid") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Login Fail',
                        text: 'รหัสผ่านไม่ถูกต้อง'
                      })
                }
              });
        }
    }
})