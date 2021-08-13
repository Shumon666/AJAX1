<?php 
	
	require '../../controllers/productController.php';
  

?>
<?php
    require_once ('../../controllers/adminController.php');

 

	session_start();
	if(!isset($_SESSION['loggedinuser']))
	{
		header("Location:../login.php");
    }
    $aid = $_SESSION["loggedinuser"];
    $admin=getAdmin($aid);


    $products=getAllProduct();
    
    
?>
<?php
    if(isset($_POST['logout']))
	{
        session_destroy();
		header("Location:../login.php");
    }

    if(isset($_POST['edit']))
	{
        
		header("Location:editProfile.php");
    }
    if(isset($_POST['chgpass']))
	{
        
		header("Location:changePassword.php");
    }
?>


<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="Css/home.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <style>
            .mySlides {display:none;}
            body, html {
            height: 100%;
            margin: 0;
            }
            .bg {
            
            height: 100%; 
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            }
            .footer {
                position: absolute;;
                left: 0;
                top: 1150px;
                width: 100%;
                background-color: rgb(35, 35, 119);
                color: rgb(216, 205, 205);
                
            }
        </style>
        <script>                                      
            function search()
            {
              http = new XMLHttpRequest();
              var search_word=document.getElementById("search_input").value;
              http.onreadystatechange=function()
              {
                if(http.readyState == 4 && http.status == 200)
                {
                  document.getElementById("search_result").innerHTML=http.responseText;
                }
              }
              http.open("GET","productSearch.php?key="+search_word,true);
              http.send();
            }
          </script>
          
        
    </head>
    <body class="bg">
    <ul class="active">
        <li><a href="home.php">Home</a></li>
       
            
          </ul>

        <div style="position:absolute; top: 100px; left: 30px;">
            <font size="60"><h3>Welcome <?php echo $_SESSION['loggedinuser'];?></h3><hr> </font>
			<form method="post" action="">
                <table>
                    <tbody>
                         
                        <tr>
                            <td>Name: </td>
                            <td><?php echo $admin["name"];?></td>
                        </tr>
                        <tr>
                            <td>Date of birth: </td>
                            <td><?php echo $admin["dob"];?></td>
                        </tr>
                        <tr>
                            <td>Age: </td>
                            <td><?php echo $admin["age"];?></td>
                        </tr>
                        <tr>
                            <td>Mobile</td>
                            <td><?php echo $admin["mobile"];?></td>
                        </tr>
                        <tr>
                            <td>Address: </td>
                            <td><?php echo $admin["address"];?></td>
                        </tr>
                       
                        <tr>
                            <td>Gender: </td>
                            <td><?php echo $admin["gender"];?></td>
                        </tr>
                        <tr>
                            <td>Email: </td>
                            <td><?php echo $admin["email"];?></td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="logout" value="Logout"></td>
                        </tr>
                    </tbody>
                </table>
                <table>
                    <tbody>
                        
                    </tbody>
                </table>
            </form>
            
        </div>

        
        
        <?php //product ?>
        <form method="post" action="">
            <table style="position: absolute; top: 200; left: 500;">
              <tbody>
                <tr>
                    <td>Product List: </td>
                    <td>
                        <select id="search_input" onchange="search()">
                          <option></option>
                          <?php
                                    
                                foreach($products as $product)
                                {
                                  echo '<option value="'.$product['name'].'">'.$product['name'].'<option>';
                                }

                          ?>
                          
                        </select>  
                    </td>
                </tr>
                <tr>
                <td></td>
                </tr>
                <tr>
                  
                </tr>
              </tbody>
            </table>
            <table border="1" style="position: absolute; top: 250; left: 500;">
                  <tbody>
                        <tr>
                          <td>Id</td>
                          <td>name</td>
                          <td>Quantity</td>
                          <td>Price</td>
                          <td>Remarks</td>
                          <td>Vendor Id</td>
                        </tr>
                        <tr id="search_result">
                        </tr>
                        
                  </tbody>
            </table>
          </form>
        
        <div class="footer">
            <p style="position: absolute;">Hot Line : +88012345678 <br>
               Facebook : www.facebook.com/tourism_bd <br>
               fax : 026666
            </p>
            <p align="right">Powered by :Tour Management <br>
               www.tourism.com <br>
               +8809612345  
            </p>
          </div>
        
    </body>
</html>
