app.controller('OrderController', function($scope, $http) {
    $scope.startPage = function() {
        $scope.loadorder();
    };

    $scope.loadorder = function() {
        $http.post('../api/Order.php').then(res => {
            $scope.orders = res.data.order;
        });
    };

    $scope.detail = function(input){
        $http.post('../api/Order_detail.php', input).then(function(res) {
            $scope.orders_detail = res.data.order_detail;
            $('#modalorder_detail').modal('show');
        });
    }
    $scope.send = function(input){
        $http.post('../api/Order_send.php', input).then(function(res) {
            Swal.fire({
                icon: 'success',
                title: 'Save Success',
                text: 'บันทึกสำเร็จ'
              })
              $scope.loadorder();
        });
    }

    $scope.delete = function(input){
        $http.post('../api/Order_delete.php', input).then(function(res) {
            Swal.fire({
                icon: 'success',
                title: 'Save Success',
                text: 'ลบสำเร็จ'
              })
              $scope.loadorder();
        });
    }
    

    $scope.print = function(input){
        // console.log(input)
        let name = input.name
        let address = input.address
        let tel = input.tel

        var id = input.id;
        var url = "../api/Bill_Send_product.php?name=" + name + "&address=" + address  +"&tel="+tel;
        window.open(url,"_blank");
    }
})