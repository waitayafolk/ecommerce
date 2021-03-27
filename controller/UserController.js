app.controller('UserController', function($scope, $http) {
    $scope.users = [];
    $scope.input = {};
    $scope.startPage = function() {
        $scope.loaduser();
    }; 

    $scope.loaduser = function() {
          $http.post('../api/User.php').then(res => {
            $scope.users = res.data.user;
            // console.log(res.data.user)
        });
    };

    $scope.modalAdd = function(){
        $scope.input = {};
        $('#modalUser').modal('show');
    };

    $scope.actionSave = function(){
        if($scope.input.username == undefined || $scope.input.password == undefined  ){
            Swal.fire({
                icon: 'error',
                title: 'Save Fail',
                text: 'โปรดกรอก User และ Password ให้ครบ'
              })
        }else{
            $http.post('../api/UserSave.php', $scope.input).then(res => {
                // console.log(res.data.message)
                if (res.data.message == 'success') {
                    Swal.fire({
                        icon: 'Success',
                        title: 'Save Success',
                        text: 'บันทึกสำเร็จ'
                      })
                      $scope.loaduser();
                      $scope.input = {};
                      $('#modalUser').modal('hide');
                }else if(res.data.message == 'invalid') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Save Fail',
                        text: 'บันทึกำม่สำเร็จ'
                      })
                }
              });
        }
    };

    $scope.modalEdit = function(input){
        $scope.input = input;
        $('#modalUser').modal('show');
    }

    $scope.delete = function(input){
        var id = input.id
        Swal.fire({
            title: 'ยืนยันการลบ',
            text: "ต้องการลบหรือไม่",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
          }).then((result) => {
            if (result.isConfirmed) {
            $http.post('../api/UserDelete.php', id).then(res => {
                $scope.users = res.data.user;
                $scope.loaduser(); Swal.fire(
                    'ลบ!',
                    'ลบสำเร็จ',
                    'success'
                  )
            });
            }
          })
    }
})