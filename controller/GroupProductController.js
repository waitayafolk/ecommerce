app.controller('GroupProductController', function($scope, $http) {
    $scope.groups = [];
    $scope.startPage = function() {
        $scope.loadGroupProduct();
    };

    $scope.loadGroupProduct = function() {
        $http.post('../api/GroupProduct.php').then(res => {
            $scope.groups = res.data.group_product;
        });
    };

    $scope.modalAdd = function() {
        $scope.input = {};
        $('#modalGroupProduct').modal('show');
    };

    $scope.actionSave = function() {
        $http.post('../api/GroupProductSave.php', $scope.input).then(res => {
            if (res.data.message == 'success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Save Success',
                    text: 'บันทึกสำเร็จ'
                  })
                $scope.loadGroupProduct();
                $('#modalGroupProduct').modal('hide');
            }
        });
    };

    $scope.modalEdit = function(input) {
        $scope.input = {};
        $scope.input = input;
        $('#modalGroupProduct').modal('show');
    };

    $scope.delete = function(input) {
        var name = "ประเภทสินค้า: " + input.group_product_name;
        Swal.fire({
            title: 'ยืนยันการลบ' + name,
            text: "ต้องการลบหรือไม่",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
          }).then((result) => {
            if (result.isConfirmed) {
            $http.post('../api/GroupProductDelete.php', input).then(function(res) {
                if (res.data.message == 'success') {
                    $scope.users = res.data.user;
                    $scope.loadGroupProduct(); 
                    Swal.fire(
                        'ลบ!',
                        'ลบสำเร็จ',
                        'success'
                    )
                }else if (res.data.message == 'Found') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error Fail',
                        text: 'ลบไม่กสำเร็จ'
                      })
                }
            });
            }
          })
    };
})