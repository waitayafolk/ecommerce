app.controller("Clt_login",function($scope,$http){
    $scope.user = {};

    $scope.login = function(){
        if( $scope.user.username == undefined || $scope.user.password == undefined  ){
            Swal.fire({
                icon:'error',
                title:'login fail',
                text : 'กรุณากรอก User เเละ Password'
            }) 
        }else{
            $http({
                url:"api/login.php",
                method:"POST",
                data : $scope.user,
            }).then(function(data){
                if(data.data.message == "success"){
                    Swal.fire({
                        icon:'success',
                        title:'login Success',
                        text : 'รหัสผ่านถูกต้อง'
                    })
                    window.location.replace('/ecommerce/views/index.php');
                }else{
                    Swal.fire({
                        icon:'error',
                        title:'login fail',
                        text : 'รหัสผ่านไม่ถูกต้อง'
                    })
                }
            })
        }
        
    }
})