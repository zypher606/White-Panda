 (function() {
   var app = angular.module('store-directives', []);
   

  app.directive("writerTabs", function() {
    return {
      restrict: 'E',
      templateUrl: "writer-tabs.html",
      controller: function(){ 
      this.tab = 1;

      this.isSet = function(checkTab) {
      return this.tab === checkTab;
                             };

    this.setTab = function(setTab) {
      this.tab = setTab;
                             };
    
    },
      controllerAs :'tab'
    };
    
  });
  

  app.controller("ReviewController", function($rootScope,$scope,$location,services){


  
   customer = {};
   $scope.customer = $scope.writer;
   var customerID = $scope.customer.ID
    console.log("customerID ");
   
   
    $scope.update = function(writer){
       writer.payGrade.push(writer.payGrade);
      };
     
    
    
    
       $scope.updateWriter = function(customer) {
        $location.path('/');
         services.updatewriter(customerID, $scope.customer);
        
    };
    
    
    
  });

  app.directive("writerDescription", function() {
    return {
      restrict: 'E',
      templateUrl: "writer-description.html"
    };
  });

  app.directive("writerReviews", function() {
    return {
      restrict: 'E',
      templateUrl: "writer-reviews.html"
    };
  });

  app.directive("writerPay", function() {
    return {
      restrict: 'E',
      templateUrl: "writer-pay.html"
    };
  });

  app.directive("writerSpecs", function() {
    return {
      restrict:"A",
      templateUrl: "writer-specs.html"
    };
  });

  })();