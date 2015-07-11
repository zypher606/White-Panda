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
  

  app.controller("ReviewController", function($scope){


    this.review = {};
    createdOn:Date.now();
    this.addReview = function(writer){
     
      writer.reviews.push(this.review);
      this.review = {};
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

  app.directive("writerSpecs", function() {
    return {
      restrict:"A",
      templateUrl: "writer-specs.html"
    };
  });

  })();


