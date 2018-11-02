<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<style>
    body {
        background-image: url("https://image.freepik.com/free-vector/background-with-desserts_1284-774.jpg");
    }
    table {
        border: 4px solid black;
        margin: 1em;
    }
    td {
        border: 1px solid black;
    }
    
    table tr:nth-child(odd){ 
    background: #FCEAF3;
    height: 30px;
        }

    table tr:nth-child(even){
    background: #FEFEDC;
    height: 30px;
    }
    

    h1 {
        color: white;
        margin: 1em;
    }
    
    label {
        color: white;
    }
    
</style>
</head>
<body>
    

<?php
include('simple_auth/simple_auth.php');

if(array_key_exists('submit_button',$_POST))
{
    foreach($_POST as $k => $v)
    {
    if($v == NULL)
        $_POST[$k] = 0;
    }
        //I couldn't figure out how to call from the arrays in index.php 
        //so I just copied those arrays to invoice.php so I could call upon the values. 
        // tried many ways including $cakePrice = $masterDesserts[0]['Price']
        // and 
        $dessert1 = array(    
                        'Type' => 'Cakes',
                        'Image' => '<IMG SRC="Cakes.jpg" height="145" width="200" alt="Example of resizing an image" />',
                        'Flavors' => 'Red Velvet, Carrot Cake, Chocolate Raspberry, Chocolate Peanut Butter, Cheesecake',
                        'Price' => number_format(42.99, 2),
                        'Quantity' => '<input type="text" name="Quantity1" default_value="0" >'
                            );
        $dessert2 = array(    
                        'Type' => 'Pies',
                        'Image' => '<IMG SRC="Pies.jpg" height="145" width="200" alt="Example of resizing an image" />',
                        'Flavors' => 'Apple, Pecan, Pumpkin, Key Lime',
                        'Price' => number_format(18.5, 2),
                        'Quantity' => '<input type="text" name="Quantity2" >'
                            );
        $dessert3 = array(    
                        'Type' => 'Cupcakes<br>(6 count)',
                        'Image' => '<IMG SRC="Cupcakes.jpg" height="145" width="200" alt="Example of resizing an image" />',
                        'Flavors' => 'Assorted, Red Velvet, Carrot Cake, Pistachio, Chocolate Peanut Butter, Lemon Crunch',
                        'Price' => number_format(26.79, 2),
                        'Quantity' => '<input type="text" name="Quantity3" >'
                            );                
        $dessert4 = array(    
                        'Type' => 'Macarons<br>(6 count)',
                        'Image' => '<IMG SRC="Macarons.jpg" height="145" width="200" alt="Example of resizing an image" />',
                        'Flavors' => 'Assorted, Salted Caramel, Matcha Green Tea, Strawberry Guava, White Chocolate Chip, Red Velvet',
                        'Price' => number_format(14.5, 2),
                        'Quantity' => '<input type="text" name="Quantity4" >'
                            );       
        $dessert5 = array(    
                        'Type' => 'Cookies<br>(6 count)',
                        'Image' => '<IMG SRC="Cookies.jpg" height="145" width="200" alt="Example of resizing an image" />',
                        'Flavors' => 'Snickerdoodle, Chocolate Chip, Sugar, Peanut Butter, Oatmeal Raisin, White Macadamian Nut',
                        'Price' => number_format(10.79, 2),
                        'Quantity' => '<input type="text" name="Quantity5">'
                            );   
 
        // referencing this so Prices are not hard coded 
        // I wish I could figure out how to get the price from master array > desserts array > price so that I dom't have to have that big chunk of text above.
        $cakePrice = $dessert1['Price'];
        $piePrice = $dessert2['Price'];
        $cupcakePrice = $dessert3['Price'];
        $macaronPrice = $dessert4['Price'];
        $cookiePrice = $dessert5['Price'];
        
        //item Subtotal before taxes and shipping is price * quantity
        $CakeSub = $cakePrice * $_POST['Quantity1'];
        $PieSub = $piePrice * $_POST['Quantity2'];
        $CupcakeSub = $cupcakePrice * $_POST['Quantity3'];
        $MacaronSub = $macaronPrice * $_POST['Quantity4'];
        $CookieSub = $cookiePrice * $_POST['Quantity5'];
        
        //subtotal of all orders * % tax + the subtotal + shipping will let the customer know how much their overall charge will be
        $subtotal = $CakeSub + $PieSub + $CupcakeSub + $MacaronSub + $CookieSub;
        $percentTax = 0.0575;
        $totalTax = $subtotal * $percentTax;
        if ($subtotal <= 50 && $subtotal > 0)
        {
            $shippingCost = 2;            
        }
        elseif ($subtotal > 50 && $subtotal <= 100)
        {
            $shippingCost = 5;
        }
        else
        {
            $shippingCost = $subtotal * 0.05; 
        }
        $totalCost = $subtotal + $totalTax + $shippingCost;
                
   
        
            
                
        ?>

<h1>Invoice:</h1> 
        
                    <table style="border-collapse: collapse;"
                      
                      cellpadding="0" cellspacing="0" width="514">
                       
                      <tbody>
                        <tr>
                          <td width="43%" align="center"><b>Item</b></td>
                          <td width="11%"><b>&nbsp;Quantity&nbsp;</b></td>
                          <td width="13%" align="center"><b>Price</b></td>
                          <td width="54%" align="center"><b>Extended
                              price</b></td>
                        </tr>
                        <tr>
                          <td width="43%" >&nbsp;Cakes (<?php echo $_POST['cakes'] ?>)</td>
                          <td width="11%" align="center"><?php echo $_POST['Quantity1'] ?></td>
                          <td width="13%">&nbsp;$&nbsp;<?php echo $cakePrice ?></td>
                          <td width="54%">&nbsp;$&nbsp; <?php echo $CakeSub ?></td>
                        </tr>
                        <tr>
                          <td width="43%">&nbsp;Pies (<?php echo $_POST['pies'] ?>)</td>
                          <td width="11%" align="center"><?php echo $_POST['Quantity2'] ?></td>
                          <td width="13%">&nbsp;$&nbsp;<?php echo $piePrice ?></td>
                          <td width="54%">&nbsp;$&nbsp; <?php echo $PieSub ?></td>
                        </tr>
                        <tr>
                          <td width="43%">&nbsp;Cupcakes (<?php echo $_POST['cupcakes'] ?>)</td>
                          <td width="11%" align="center"><?php echo $_POST['Quantity3'] ?></td>
                          <td width="13%">&nbsp;$&nbsp;<?php echo $cupcakePrice ?></td>
                          <td width="54%">&nbsp;$&nbsp; <?php echo $CupcakeSub ?></td>
                        </tr>
                        <tr>
                          <td width="43%">&nbsp;Macarons (<?php echo $_POST['macarons'] ?>)<br>
                          </td>
                          <td width="11%" align="center"><?php echo $_POST['Quantity4'] ?></td>
                          <td width="13%">&nbsp;$&nbsp;<?php echo $macaronPrice ?></td>
                          <td width="54%">&nbsp;$&nbsp; <?php echo $MacaronSub ?></td>
                        </tr>
                        <tr>
                          <td width="43%">&nbsp;Cookies (<?php echo $_POST['cookies'] ?>)<br>
                          </td>
                          <td width="11%" align="center"><?php echo $_POST['Quantity5'] ?></td>
                          <td width="13%">&nbsp;$&nbsp;<?php echo $cookiePrice ?></td>
                          <td width="54%">&nbsp;$&nbsp; <?php echo $CookieSub ?></td>
                        </tr>
                        <tr>
                          <td colspan="4" width="100%">&nbsp;</td>
                        </tr>
                        <tr>
                          <td colspan="3" width="67%">&nbsp;Sub-total</td>
                          <td width="54%">&nbsp;$&nbsp; <?php echo number_format($subtotal,2) ?></td>
                        </tr>
                        <tr>
                          <td colspan="3" width="67%"> <font
                              face="times">&nbsp;Tax @ 5.75%</font></td>
                        <td width="54%">&nbsp;$&nbsp; <?php echo number_format($totalTax,2) ?></td>
                        </tr>
                        <tr>
                          <td colspan="3" width="67%"> <font
                              face="times">&nbsp;Shipping</font></td>
                          <td width="54%">&nbsp;$&nbsp; <?php echo number_format($shippingCost,2) ?></td>
                        </tr>
                        <tr>
                          <td colspan="3" width="67%"><b>&nbsp;Total</b></td>
                          <td width="54%"><b>&nbsp;$&nbsp; <?php echo number_format($totalCost,2) ?></b></td>
                        </tr>
                      
                      
                    </tbody>
                    </table> 
        <?php } ?>

            </body>
</html>