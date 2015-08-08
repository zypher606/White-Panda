 <?php echo $txnid ?> <?php echo $orderID ?>
 
 <?php
                        // Merchant key here as provided by Payu
                        $MERCHANT_KEY = "IYjt2G";
                        
                        // Merchant Salt as provided by Payu
                        $SALT = "lkXTUXtR";
                        
                        // End point - change to https://secure.payu.in for LIVE mode
                        $PAYU_BASE_URL = "https://secure.payu.in";
                        
                        $action = '';
                        
                        $posted = array();
                        if(!empty($_POST)) {
                            //print_r($_POST);
                          foreach($_POST as $key => $value) {    
                            $posted[$key] = $value; 
                            
                          }
                        }
                        
                        $formError = 0;
                        
                        if(empty($posted['txnid'])) {
                          // Generate random transaction id
                          $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
                        } else {
                          $txnid = $posted['txnid'];
                        }
                        $hash = '';
                        // Hash Sequence
                        $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
                        if(empty($posted['hash']) && sizeof($posted) > 0) {
                          if(
                                  empty($posted['key'])
                                  || empty($posted['txnid'])
                                  || empty($posted['amount'])
                                  || empty($posted['firstname'])
                                  || empty($posted['email'])
                                  || empty($posted['phone'])
                                  || empty($posted['productinfo'])
                                  || empty($posted['surl'])
                                  || empty($posted['furl'])
                                  || empty($posted['service_provider'])
                          ) {
                            $formError = 1;
                          } else {
                            //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
                            $hashVarsSeq = explode('|', $hashSequence);
                            $hash_string = '';  
                            foreach($hashVarsSeq as $hash_var) {
                              $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
                              $hash_string .= '|';
                            }
                        
                            $hash_string .= $SALT;
                        
                        
                            $hash = strtolower(hash('sha512', $hash_string));
                            $action = $PAYU_BASE_URL . '/_payment';
                          }
                        } elseif(!empty($posted['hash'])) {
                          $hash = $posted['hash'];
                          $action = $PAYU_BASE_URL . '/_payment';
                        }
                        ?>
                        
                       

<?php
session_start();
if (!isset($_SESSION['username']) || empty($_SESSION['username']))
{
    header("Location: ../businessLogin.html");

}

$fontsize='15px';
$fontWeight='100';
$color= 'black';

$display1='block';
$display2='none';
$display3='none';
$display4='none';
$display5='none';


$selformatBackground1='#2eb161';
$selformatBackground2='#c6c6c6';

$selcolor1='#fff';
$selcolor2='black';


if (isset($_GET['order']))
{
    $ordVar=$_GET['order'];
    
    $fontsize='15.8px';
    $fontWeight='900';
    $color= '#2eb161';
    
    $display1='none';
    $display2='block';
    
    
    
    $display4='block';
    $display5='none';
    
    $selformatBackground2='2eb161';
$selformatBackground1='c6c6c6';

$selcolor2='#fff';
$selcolor1='#black';
    
}



if (isset($_GET['prevVal']))
{
    $dataEntry1=$_GET['noPosts'];
    $dataEntry2=$_GET['deliveryTime'];
    $dataEntry3=$_GET['prevVal'];
    
$quality=$_GET['quality'];
$topic=$_GET['topic'];
$industry=$_GET['industry'];



function checkbox($checkArray)
{
    $inputVar='';
    
    if(!empty($_GET[$checkArray])) {
    foreach($_GET[$checkArray] as $check) {
            if($inputVar=='')
            {
                $inputVar=$check;
            }
            else
            {
                $inputVar=$inputVar.", ".$check;
            }
        
    }
}
    return $inputVar;
}

    $goal= checkbox('goal');

    $styleOfWriting=checkbox('style');
  

    
$sampleBlog=$_GET['sampleBlog'];

    
    
function radio($name)
{   
    if (isset($_GET[$name]))
    {
        return $_GET[$name];
    }
    else
    {
        return 0;
    }
}
    
$pointOfView=radio('pointOfView');
    
    

    
$blogStructure=checkbox('blogStructure');
    
    
$targetAudience=$_GET['targetAudience'];
$keyPoints=$_GET['keyPoints'];
$avoid=$_GET['avoid'];
$keywords=$_GET['keywords'];
$specialInstructions=$_GET['specialInstructions'];
    
    
    
    
    $display3='block';
    $display1='none';
    $display2='block';
    $display4='none';
    $display5='none';

    
define('DB_NAME', 'whitepanda');
define('DB_USER', 'wpRootDatabase');
define('DB_PASSWORD', 'orthrox');
define('DB_HOST', 'localhost');

$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

if (!$link)
{
    die('Could not connect: ' . mysql_error());
}

$db_selected = mysql_select_db(DB_NAME, $link);

if (!$db_selected)
{
    die('Ca\'t use ' . DB_NAME . ': ' . mysql_error());
}






$user =$_SESSION['username'];

    
    


$date=date("Y-m-d H:i:s");
$orderID=rand(10000000,99999999);
$orderID = $txnid;

$sql ="INSERT INTO businesshomepage (email, txnid, orders, quality, noOfPosts, deliveryTime, topic, industry_of_experience, goal, style_of_writing, sample_blog, point_of_view, blog_structure, target_audience, key_points, things_to_avoid, keywords, special_instructions, dateOrder) VALUES ('$user', '$orderID', '$dataEntry3', '$quality', '$dataEntry1', '$dataEntry2', '$topic', '$industry', '$goal', '$styleOfWriting', '$sampleBlog', '$pointOfView', '$blogStructure', '$targetAudience', '$keyPoints', '$avoid', '$keywords', '$specialInstructions', '$date')";





mysql_query($sql);


mysql_close();
    
}


$servername = "localhost";
$username = "wpRootDatabase";
$password = "orthrox";
$dbname = "whitepanda";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$intercom="SELECT firstName, lastName FROM signup_business WHERE email='".$_SESSION['username']."'";


$con3=mysqli_fetch_object(mysqli_query($conn, $intercom));

$name= $con3->firstName." ".$con3->lastName;





?>




<?php // echo $orderID 
?>
<html>
    <head>


        <link rel="stylesheet" type="text/css" href="../css/businessHomepage.css">
        <link rel="stylesheet" type="text/css" href="../css/reset.css">
        
        
        <script src = "../jquery/jquery-1.11.1.js"></script>
        <script src = "../jquery/businessHomepage_jquery-1.11.1.js"></script>
  
        <title>Business- White Panda</title>
        
         <script>
  window.intercomSettings = {
    
    name: "<?php echo $name; ?>",
    email: "<?php echo $_SESSION['username']; ?>",
    created_at: 1234567890,
    app_id: "nkuzzniw"
  };
    </script>
<script>(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',intercomSettings);}else{var d=document;var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Intercom=i;function l(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/nkuzzniw';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);}if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})()</script>








<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-63498607-1', 'auto');
  ga('send', 'pageview');

</script>
        
        
<style type="text/css">
    
    #order
    {
        font-size:<?php echo $fontsize ?>;
        font-weight:<?php echo $fontWeight ?>;
        color:<?php echo $color ?>;
        
    }
    
    #welcome
    {
        display:<?php echo $display1 ?>;      
    }

    .business_main .tab_result .order_now .sel_format
    {
        display:<?php echo $display5 ?>;     
    }
    
    .business_main .tab_result .order_now
    {
        display:<?php echo $display2 ?>;
    }
    
    .business_main .tab_result .order_now .content_requirement
    {
        display:<?php echo $display4 ?>;
    }
    
    .business_main .tab_result .order_now .pay_now
    {
        display:<?php echo $display3 ?>;
        
    }
    
    #format li
    {
        background-color:<?php echo $selformatBackground1 ?>;
        color:<?php echo $selcolor1 ?>;
    }
    #requirement li
    {
        background-color:<?php echo $selformatBackground2 ?>;
        color:<?php echo $selcolor2 ?>;
    }
    
    
    
</style>
        
        
        
        
    </head>
    
    <body  onload="submitPayuForm()">
        <div class='nav_bar-writer'>
                <ul>
                    <li id="logo"><a href="../index.html"><img src='../images/full_logo.png'/></a></li>     
                    <li id='username' name='email'><a href="#"><?php echo $_SESSION['username']; $Username; ?>  &#x25BC;</a></li>
                        
<!--                    <li><img src='../images/EmptyProfile.png'/></li>-->
                </ul>
                <br/>
                <ul class="accnt">
                    <li>
                        <ul>
                            <a href="#"><li>&nbsp; &nbsp; Edit account info</li></a>
                            <a href="signOutBusiness.php"><li>&nbsp; &nbsp; Sign out</li></a>
                        </ul>
                    </li>
                </ul>
        </div>
        
        
        
    
        
        <div class="business_main">
            
            
           

            <div class="business_tab">
                <ul>
                    
                    <a href="#"><li id="order">Order now</li></a>
                    <a href="#"><li id="received">Received files</li></a>
<!--                    <a href="#"><li id="wallet">Wallet</li></a>-->
            </div>
            
            <div class='tab_result'>
                <div id="welcome">
                    <h1>Welcome to our desk</h1>
                    <h5><img src="../images/desk2.png"/></h5>
                </div>
                
                
                <div class="order_now">
                    <div id="ord_tab">
                        <ul>
                            <a href="#" id='format'><li>SELECT FORMAT<img src="../images/businessArrow.png"/></li></a>
                            <a href="#" id="requirement"><li>CONTENT REQUIREMENTS<img src="../images/businessArrow.png"/></li></a>
                            <a href="#" id='pay'><li>PAYMENT</li></a>
                        </ul>
                       
                    </div>
                    
                    
                    <div class="sel_format">
                        <ul class="c1">
                            <li><img src="../images/Temp/Blog_post.png"/>
                                <p><span>Blog Post</span><br/>
                                    350-450 words<br/>
                                    
                                </p> 
                                 
                                <a href="#"  onclick="orderid('Blog Post')"><h4>Order</h4></a>
                            </li>
                           
                            <li><img src="../images/Temp/Facebook_post.png"/>
                                <p><span>Facebook Posts</span><br/>
                                    1-2 sentences<br/>
                                    
                                </p>
                                <a onclick="orderid('Facebook Posts')" href="#"><h4>Order</h4></a>
                            </li>
                            <li><img src="../images/Temp/Tweets.png"/>
                                
                                <p><span>Tweets</span><br/>
                                    up to 140 characters<br/>
                                    
                                </p>
                                <a onclick="orderid('Tweets')" href="#"><h4>Order</h4></a>
                            </li>
                        </ul>
                        
                        
                        <ul class="c2">
                            <li><img src="../images/Temp/website_pages.png"/>
                                <p><span>Website Content</span><br/>
                                    350-450 words<br/>
                                    
                                </p>
                                <a onclick="orderid('Website Pages')" href="#"><h4>Order</h4></a>
                            </li>
                            <li><img src="../images/article.png"/>
                                <p><span>Articles</span><br/>
                                    850-950 words<br/>
                                
                                </p>
                                <a onclick="orderid('Articles')" href="#"><h4>Order</h4></a>
                            </li>
                          
                            <li><img src="../images/Temp/product_description.png"/>
                                <p><span>Custom Content</span><br/>
                                    1-2 sentences<br/>
                                  
                                </p>
                                <a onclick="orderid('Custom Content')" href="#"><h4>Order</h4></a>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="content_requirement">
                        
                        <form method="get" action="businessHomepage.php">
                            
                            <h2>Content Quality</h2>
                            <select  required name="quality">
                                <option value="">Select your required quality</option>
                                <option value="250">Bronze (Rs. 250.00/-)</option>
                                <option value="500">Silver (Rs. 500.00/-)</option>
                                <option value="1000">Gold (Rs. 1000.00/-)</option>
                                <option value="2000">Platinum (Rs. 2000.00/-)</option>
                            </select>
                            <h2>How many post do you need?</h2>
                            <select name="noPosts">
                                <option value="1">1</option>
                                
<!--
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
-->
                            </select>
                            <br/><br/><br/>
                            <h2>When do you need the first draft delivered by?</h2>
                            <select name="deliveryTime">
                                <option value="5 business days">5 business days</option>
<!--                                <option value="2">3 business days, +20% surcharge</option>-->
                            
                            </select>
                            <br/><br/><br/>
                            
                            <h2>Topic of your content</h2>
                            <input required id='textbox' type="text" name="topic" placeholder="Focus of your Content" />
                            <br/><br/><br/>
                            
                            <h2>Industry in which the writer may have experience</h2>
                            <select required id='industryid' name="industry" >
                                <option value="">--select your area--</option>
                                <option value="Sports and Fitness">Sports & Fitness</option>
                                <option value="Business">Business</option>
                                <option value="Art and Design">Art & Design</option>
                                <option value="Food and Beverage">Food & Beverage</option>
                                <option value="Entertainment">Entertainment</option>
                                <option value="Healthcare and Sciences">Healthcare and Sciences</option>
                                <option value="Publishing and Journalism">Journalism & Publishing</option>
                                <option value="Lifestyle and Travel">Lifestyle & Travel</option>
                                <option value="Education">Education</option>
                                <option value="Software and Technology">Software and Technology</option>
                            </select>
                            
                            <br/>
                            <br/><br/><hr><br/><br/><br/>
                            
                            <h1><u>Optional Part</u></u></h1>
                        <br/>
                            <h2>Goal: </h2>
                            
                          
                        <p class="goal">
                        <span id="goal"><input type="checkbox" name="goal[]" value='Generate clicks/SEO'/>Generate clicks/SEO </span> <span id="goal"><input type="checkbox" name="goal[]" value='Informed analysis'/>Informed analysis</span> <span id="goal"> <input type="checkbox" name="goal[]" value='Thought leadership'/>Thought leadership</span><br> <br><br><br><br><span id="goal"> <input type="checkbox" name="goal[]" value='Repurpose existing writing'/>Repurpose existing writing</span> <span id="goal"> <input type="checkbox" name="goal[]" value='Promote topic'/>Promote topic</span> <span id="goal"> <input type="checkbox" name="goal[]" value='Educate/provide instructions'/>Educate/provide instructions</span>
                        </p>
                        <br/><br/><br/>
                        <h2>Style of Writing:</h2>
                          
                        <p class="goal">
                        <span id="goal"><input type="checkbox" name="style[]" value='Authoritative/Informed'/>Authoritative/Informed</span> <span id="goal"><input type="checkbox" name="style[]" value='Serious/Formal'/>Serious/Formal</span> <span id="goal"> <input type="checkbox" name="style[]" value='Advice/Instructional'/>Advice/Instructional</span><br> <br><br><br><br><span id="goal"> <input type="checkbox" name="style[]" value='Viral/Catchy'/>Viral/Catchy</span> <span id="goal"> <input type="checkbox" name="style[]" value='Casual/Tabloid'/>Casual/Tabloid</span> <span id="goal"> <input type="checkbox" name="style[]" value='Satirical/Witty'/>Satirical/Witty</span>
                        </p>
                        
                        <br/><br/><br/>
                        
                        <h2>Sample Blog:</h2>
                        <input id='textbox' type="text" name="sampleBlog" placeholder="Link to an existing content and describe why it's a good sample"/>
                        <br/><br/><br/>
                        <h2>Point of View:</h2>
                        <p class="goal">
                        <span id="goal"><input type="radio" name="pointOfView" value='1st person - I'/>1st person - I</span> <span id="goal"><input type="radio" name="pointOfView" value='2nd person - you'/>2nd person - you</span> <span id="goal"> <input type="radio" name="pointOfView" value='3rd person - she / he'/>3rd person - she / he</span>  
                        </p>
                        
                        <br/><br/><br/>
                        
                        <h2>Blog Structure:</h2>
                        <p class="goal">
                        <span id="goal"><input type="checkbox" name="blogStructure[]" value='Paragraphs'/>Paragraphs</span> <span id="goal"><input type="checkbox" name="blogStructure[]" value='Subheads'/>Subheads</span> <span id="goal"> <input type="checkbox" name="blogStructure[]" value='Lists'/>Lists</span>  
                        </p>
                        
                        <br/><br/><br/>
                        <h2>Target Audience:</h2>
                        <input name='targetAudience' type="text" id="textbox" placeholder="Describe the particular group at which your content is aimed"/>
                        <br/><br/><br/>
                        
                        <h2>Key Points:</h2>
                        <input name='keyPoints' type="text" id="textbox" placeholder="List key points your writer should address"/>
                        
                        <br/><br/><br/>
                        
                        <h2>Things to Avoid:</h2>
                        <input name="avoid" type="text" id="textbox" placeholder="List specific examples (e.g. if competitors, list competitor names)"/>
                        
                        <br/><br/><br/>
                        <h2>Keywords:</h2>
                        <input name="keywords" type="text" id="textbox" placeholder="List keywords and how they should be integrated into post"/>
                        
                        
                        <br/><br/><br/>
                        <h2>Special Instructions:</h2>
                        <input name="specialInstructions" type="text" id="textbox" placeholder="Additional guidelines your writer should follow (e.g. should there be a call to action? what should the reader take away from the piece?)"/>
                        
                        
                        
                        
                            <br><br><br><br><br><br>
                            <button id='proceedPay' type="submit" name='prevVal' value="<?php echo $ordVar ?>">Proceed for payment</button>
                       </form>
                    </div>
                    
                    <div class='pay_now'>
                       
                        
                          <script>
                            var hash = '<?php echo $hash ?>';
                            function submitPayuForm() {
                              if(hash == '') {
                                return;
                              }
                              var payuForm = document.forms.payuForm;
                              payuForm.submit();
                            }
                            </script>
                          
    
                    <script type="text/javascript">
    
                        function reply_click(element)
                        {
                        document.getElementById('product_name').value = element.getAttribute('data-product-name');
                        }    
                        

                    
               </script>
                          
                          
                            <h2>Enter your contact detail and confirm order</h2>
                            <br/>
                            <?php if($formError) { ?>
                            
                              <span style="color:red">Please fill all mandatory fields.</span>
                              <br/>
                              <br/>
                            <?php } ?>
                            <form action="<?php echo $action; ?>" method="post" name="payuForm">
                              <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
                              <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
                              <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
                              <table>
                                <tr>
                                  <td><b>Mandatory Parameters</b></td>
                                </tr>
                                <tr>
                                     
                                  <td>Amount: Rs.<?php echo $quality; ?></td>
                                  <td><input type="hidden" name="amount" id="product_name" value="<?php echo (empty($posted['amount'])) ? '1': $posted['amount'] ?>" /></td>
                                  <td> &nbsp&nbsp Name:  <?php echo $name; ?> </td>
                                  <td><input type="hidden" name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? $name : $posted['firstname']; ?>" /></td>
                                </tr>
                                <tr> 
                                  <td>Email: <?php echo $_SESSION['username'] ?> </td>
                                  <td><input type="hidden" name="email" id="email" value="<?php echo (empty($posted['email'])) ? $_SESSION['username'] : $posted['email']; ?>" /></td>
                                  <td>&nbsp&nbsp Phone: </td>
                                  <td><input name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" /></td>
                                </tr>
                                <tr>
                                  <td>Product Info: <?php echo $dataEntry3; ?></td>
                                  <td colspan="3"><textarea name="productinfo" style="display:none;"><?php echo (empty($posted['productinfo'])) ? $dataEntry3 : $posted['productinfo'] ?></textarea></td>
                                </tr>
                                <tr>
                                  
                                  <td colspan="3"><input type="hidden" name="surl" value="<?php echo (empty($posted['surl'])) ? 'http://whitepanda.in/success.php' : $posted['surl'] ?>" size="64" /></td>
                                </tr>
                                <tr>
                                  
                                  <td colspan="3"><input type="hidden" name="furl" value="<?php echo (empty($posted['furl'])) ? 'http://whitepanda.in/failure.php' : $posted['furl'] ?>" size="64" /></td>
                                </tr>
                        
                                <tr>
                                  <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" size="64" /></td>
                                </tr>
                        
                               
                                <tr>
                                  <?php if(!$hash) { ?>
                                    <td colspan="4"><input type="submit" value="Submit" /></td>
                                  <?php } ?>
                                </tr>
                              </table>
                            </form>
                        

                    </div>
                    
                </div>
                
                <div class="received_content">
                    <h1>No Content Received</h1>
                    <img src="../images/receivedContent.png"/>
                </div>
                
                
            </div>


        </div>
            
        <div class="foot">
            <br/>
            <a href = "../privacy.html">Privacy</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href = "../termsUse.html">Terms of Use</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href = "../writersAgreement.html">Writers' Privacy Agreement</a>
        </div>
    </body>
</html>