app.controller('ProductController', function($scope, $http) {
    $scope.groups = [];
    $scope.input = {};
    $scope.importdata = {};
    $scope.importdata.data = "";

    $scope.startPage = function() {
        $scope.loadproduct();
        $scope.loadGroupProduct();
        $scope.input.name = "";
    };

    $scope.actionSave = function() {
        $http.post('../api/ProductSave.php', $scope.input).then(res => {
            // console.log(res.data.message)
            if (res.data.message == "success") {
                Swal.fire({
                    icon: 'success',
                    title: 'Save Success',
                    text: 'บันทึกสำเร็จ'
                  })
                $scope.loadproduct();
                $('#modalUser').modal('hide');
            }
        });
    };

    $scope.loadGroupProduct = function() {
        $http.post('../api/GroupProduct.php').then(res => {
            $scope.groupProducts = res.data.group_product;
        });
    }


    $scope.loadproduct = function() {
        $http.post('../api/Product.php').then(res => {
            $scope.product = res.data.product;
        });
    };

    $scope.modalAdd = function() {
        $scope.input = {};
        $('#modalUser').modal('show');
    };

    $scope.modalEdit = function(input) {
        $scope.input = {};
        $scope.input = input;
        $('#modalUser').modal('show');
    };

    $scope.delete = function(input) {
        var name = "สินค้า: " + input.name;
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
                $http.post('../api/ProductDelete.php', input).then(function(res) {
                if (res.data.message == 'success') {
                    $scope.users = res.data.user;
                    $scope.loadproduct(); 
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

    $scope.serach_product = function(input){
        $http.post('../api/search_product.php', input).then(function(res) {
            $scope.product = res.data.find_product;
        });
    }

    $scope.print_barcode = function(input){
        var id = input.id;
        var url = "../api/barcode.php?id=" + id;
        window.open(url,"_blank");

    }
});