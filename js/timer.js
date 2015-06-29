$(document).ready(function () {
    function countDown(secs, elem)
            {
                var element = document.getElementById(elem);
                element.innerHTML = "<h2>You have <b>"+secs+"</b> seconds to answer the questions</h2>";
                if(secs < 1) {
                    document.quiz.submit();
                }
                else
                {
                    secs--;
                    setTimeout('countDown('+secs+',"'+elem+'")',1000);
                }
            }

            function validate() {
                return true;
            }
    
});