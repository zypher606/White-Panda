
(function() {
  var app = angular.module('gem_Store', ['store-directives']);
   
 

  app.controller('StoreController',function($scope) {
   


    this.writers = gems;
  });



  
//ALL data to be retrieved from  database
//dummy data used

  var gems = [
    {
      
      area: "sports",
      budget: '250units',
      job_description: " Was founded in 1900 by eleven football players led by Franz John. Although Bayern won its first national cha"
 
   
    }, {
      area: "cyber_security",
      budget: '1000units',
      job_description: "Computer security, also known as cybersecurity or IT security, is security applied to computing devices "
 
    }, {
      area: "sports",
      budget: '250units',
      job_description: " Was founded in 1900 by eleven football players led by Franz John. Although Bayern won its first national cha"
 
        
    }
  ];

 





})();

