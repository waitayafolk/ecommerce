app.controller('ShopController', function($scope,$http) {
    $scope.startPage = function() {
        $product_detail = [];
        $scope.data = [];
        $scope.branch();
        $scope.loadProduct();
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

    $scope.addToCart = function(item){
        $scope.product_detail.push(item);
        // for ($scope.i = 0; i < $scope.product_detail.length; i++) {
        //     if (
             
        //     ) {
        //       $scope.product_detail[i].qty =
        //         $scope.product_detail[i].qty + Number($scope.quotation_form.value.qty);
        //       $scope.product_detail[i].discount = Number(
        //         $scope.quotation_form.value.discount
        //       );
        console.log(item)
              console.log( $scope.product_detail)
            //   return $scope.clearpatch();
        
    }
        
    
    
  });