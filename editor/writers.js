 (function() {
   var app = angular.module('store-directives', []);
   
    app.factory("services", ['$http', function($http) {
  var serviceBase = 'services/'
    var obj = {};
    obj.getwriters = function(){
        console.log("in get writers");
        return $http.get(serviceBase + 'writers');
    }
    
    obj.getwriters_sample = function(){
        console.log("in get writers sample");
        return $http.get(serviceBase + 'writers_sample');
    }
    
    obj.getwriter = function(writerID){
        return $http.get(serviceBase + 'writer?id=' + writerID);
    }

    obj.insertwriter = function (writer) {
    return $http.post(serviceBase + 'insertwriter', writer).then(function (results) {
        return results;
    });
  };

  obj.updateWriter = function (id,writer) {
      return $http.post(serviceBase + 'updatewriter', {id:id, writer:writer}).then(function (status) {
          return status.data;
      });
  };

  obj.deletewriter = function (id) {
      return $http.delete(serviceBase + '0?id=' + id).then(function (status) {
          return status.data;
      });
  };

    return obj;   
}]);







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
         services.updateWriter(customerID, customer);
        
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