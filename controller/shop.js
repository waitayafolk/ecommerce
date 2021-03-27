app.controller('ShopController', function($scope,$http) {
    $scope.startPage = function() {
        $product_detail = [];
        $scope.data = {};
        $scope.branch();
        $scope.loadProduct();
        // $scope.loadHistory();
        $scope.readFromCart();
  };
    $scope.branch = function(){
        $http.post('api/branch.php').then(res => {
            $scope.branch = res.data.branch[0];
            console.log($scope.branch)
        });
    };

    $scope.loadProduct = function(){
        $http.post('api/Product.php').then(res => {
            $scope.products = res.data.product;
        });
    }
    
    $scope.getRandomInt = (max) => {
        return Math.floor(Math.random() * Math.floor(max));
      }

    $scope.addToCart = function(item){
    $scope.customerCode = localStorage.getItem('customerCode');
    if ($scope.customerCode == undefined) {
      $scope.customerCode = $scope.getRandomInt(999999);
      console.log($scope.customerCode)
    }
    localStorage.setItem('customerCode', $scope.customerCode);
    item.customerCode = $scope.customerCode;

    $http.post('api/sale_online_save.php', item).then(res => {
        if (res.data.message == 'success') {
            Swal.fire({
                icon: 'success',
                title: 'Save Success',
                text: 'นำสินค้าลงตะกร้าเเล้ว'
              })
          $scope.readFromCart();
        }
      })
    }

    $scope.readFromCart = function() {
        $scope.customerCode = localStorage.getItem('customerCode');
        var params = {
          customerCode: $scope.customerCode
        }
        $http.post('api/sale_online_select.php', params).then(res => {
          $scope.carts = res.data.sale_temp;
          $scope.sumQty = 0;
          $scope.sumPrice = 0;
          $scope.countItem = 0;
    
          angular.forEach($scope.carts, item => {
            var pricePerRow = Number(item.price) * Number(item.qty);
            $scope.sumQty += Number(item.qty);
            $scope.sumPrice += pricePerRow;
            $scope.countItem += Number(item.qty);
          });
        })
      }
     $scope.addQtyFromCart = function(item){
        $http.post('api/sale_online_addqty.php', item).then(res => {
            if (res.data.message == 'success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Save Success',
                    text: 'เพิ่มจำนวนเเล้ว'
                  })
              $scope.readFromCart();
            }
          })
     } 

    $scope.reduceFromCart = function(item){
        $http.post('api/sale_online_deleteqty.php', item).then(res => {
            if (res.data.message == 'success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Save Success',
                    text: 'ลดจำนวนเเล้ว'
                  })
              $scope.readFromCart();
            }
          })
     } 

     $scope.confirm = function(){
        $('#modalForm').modal('show');
     }


     $scope.confirmSave = () => {
        if ($scope.data.name == undefined || $scope.data.tel == undefined || $scope.data.address == undefined) {
            Swal.fire({
                icon: 'Error',
                title: 'Error Save',
                text: 'โปรดตรวจสอบข้อมูลให้ดี'
              })
        } else {
            let params ={
                'customer_code': $scope.customerCode,
                'carts': $scope.carts,
                'customer' : $scope.data,
            }
             $http.post('api/sale_online_confirm.php', params).then(res => {
                 if(res.data.message == 'success'){
                    Swal.fire(
                        'Save !',
                        'บันทึกสำเร็จ',
                        'success'
                      )
                      $scope.readFromCart();
                      $('#modalForm').modal('hide');
                 }else{
                    Swal.fire(
                        'Save Error!',
                        'บันทึกไม่สำเร็จ',
                        'error'
                      ) 
                 }
                
                });
        }
      }

});