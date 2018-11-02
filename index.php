<!DOCTYPE html>
<!--
Author: Van Nguyen
The purpose of this site is to allow customers to buy desserts online and have them delivered. 
Customers should be able to view dessert options and prices. They should then be able to decide
what they would like to order and how much of it.
This form should then take them to an invoice page showing them a summary of their order and 
the breakdown of prices overall including taxes and shipping. 



-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Jeff & Van's Bakery</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        
    </head>
    <body>
        
        <h1 style="color:rgb(23,162,184);font-family:garamond;text-align:center;">Jeff and Van's Bakery</h1>
 
        <form action ='invoice.php' method = 'POST'>
        <table class="bakeryTable" border="3" cellpadding="5" cellspacing="5" style="text-align:center" >
            
            <style type="text/css">
                .bakeryTable tr:nth-child(odd){ 
		background: #FCEAF3;
	}
	
	.bakeryTable tr:nth-child(even){
		background: #FEFEDC;
                </style>
            <?php //these are the Table headers?>
            
            <tr>
                <th width="200" <b> Type </b> </th>
                <th width="200" <b> Image </b> </th>
                <th width="200" <b> Flavors </b> </th>
                <th width="200" <b> Flavor Choice </b> </th>
                <th width="200" <b> Price </b> </th>
                <th width="200" <b> Quantity </b> </th>
                
            </tr>
            
           

            
        <?php
       //here is where I have my data that will go into the table
       // I want to make the flavors a drop down box or make the "Flavor Choice" a text box but I'm not sure how to code that yet
       // I have also put the input boxes in the Quantity field so that customers are able to fill in how many of each item they want
       // to disallow negative values, using keypress constraints https://stackoverflow.com/questions/32777184/html-input-for-positive-whole-numbers-only-type-number/32784911
        $dessert1 = array(
                        'Type' => 'Cakes',
                        'Image' => '<IMG SRC="Cakes.jpg" height="145" width="200" alt="Example of resizing an image" />',
                        'Flavors' => 'Red Velvet, Carrot Cake, Chocolate Raspberry, Chocolate Peanut Butter, Cheesecake',
                        'Flavor Choice' => '<select name="cakes">
                            <option value="Velvet">Red Velvet</option>
                            <option value="Carrot">Carrot Cake</option>
                            <option value="Raspberry">Chocolate Raspberry</option>
                            <option value="Peanut butter">Chocolate Peanut Butter</option>
                            <option value="Cheesecake">Cheesecake</option>
                            </select>',
                        'Price' => number_format(42.99, 2),
                        'Quantity' => '<input type="number" name="Quantity1" value="0" min="0" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57">'
                            );
        $dessert2 = array(
                        'Type' => 'Pies',
                        'Image' => '<IMG SRC="Pies.jpg" height="145" width="200" alt="Example of resizing an image" />',
                        'Flavors' => 'Apple, Pecan, Pumpkin, Key Lime',
                        'Flavor Choice' => '<select name="pies">
                            <option value="apple">Apple</option>
                            <option value="pecan">Pecan</option>
                            <option value="pumpkin">Pumpkin</option>
                            <option value="lime">Key Lime</option>
                            </select>',
                        'Price' => number_format(18.5, 2),
                        'Quantity' => '<input type="number" name="Quantity2" value="0" min="0" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57">'
                            );
        $dessert3 = array(
                        'Type' => 'Cupcakes<br>(6 count)',
                        'Image' => '<IMG SRC="Cupcakes.jpg" height="145" width="200" alt="Example of resizing an image" />',
                        'Flavors' => 'Assorted, Red Velvet, Carrot Cake, Pistachio, Chocolate Peanut Butter, Lemon Crunch',
                        'Flavor Choice' => '<select name="cupcakes">
                            <option value="assorted">Assorted</option>
                            <option value="velvet">Red Velvet</option>
                            <option value="carrot">Carrot Cake</option>
                            <option value="pistachio">Pistachio</option>
                            <option value="chocopb">Chocolate Peanut Butter</option>
                            <option value="lemon">Lemon Crunch</option>
                                </select>',
                        'Price' => number_format(26.79, 2),
                        'Quantity' => '<input type="number" name="Quantity3" value="0" min="0" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57">'
                            );
        $dessert4 = array(
                        'Type' => 'Macarons<br>(6 count)',
                        'Image' => '<IMG SRC="Macarons.jpg" height="145" width="200" alt="Example of resizing an image" />',
                        'Flavors' => 'Assorted, Salted Caramel, Matcha Green Tea, Strawberry Guava, White Chocolate Chip, Red Velvet',
                        'Flavor Choice' => '<select name="macarons">
                            <option value="assorted">Assorted</option>
                            <option value="caramel">Salted Caramel</option>
                            <option value="matcha">Matcha Green Tea</option>
                            <option value="strawguav">Strawberry Guava</option>
                            <option value="white">White Chocolate</option>
                            <option value="velvet">Red Velvet</option>
                            </select>',
                        'Price' => number_format(14.5, 2),
                        'Quantity' => '<input type="number" name="Quantity4" value="0" min="0" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57">'
                            );
        $dessert5 = array(
                        'Type' => 'Cookies<br>(6 count)',
                        'Image' => '<IMG SRC="Cookies.jpg" height="145" width="200" alt="Example of resizing an image" />',
                        'Flavors' => 'Assorted, Snickerdoodle, Chocolate Chip, Sugar, Peanut Butter, Oatmeal Raisin, White Macadamian Nut',
                        'Flavor Choice' => '<select name="cookies">
                            <option value="velvet">Assorted</option>
                            <option value="carrot">Snickerdoodle</option>
                            <option value="chocras">Chocolate Chip</option>
                            <option value="chocpb">Sugar</option>
                            <option value="cheese">Peanut Butter</option>
                            <option value="chocpb">Oatmeal Raisin</option>
                            <option value="cheese">White Macadamian Nut</option>
                            </select>',
                        'Price' => number_format(10.79, 2),
                        'Quantity' => '<input type="number" name="Quantity5" value="0" min="0" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57">'
                            );

        //$masterDesserts is my master array that will allow me to call the other arrays easier by index
        $masterDesserts = array($dessert1, $dessert2, $dessert3, $dessert4, $dessert5);
       //the following will be an efficient way to populate all of the characteristics of the desserts needed in the 
       //table without having to manually handjam each cell with each characteristic
        for ($i=0; $i<count($masterDesserts); $i++)
        {
   
        echo "<tr>";
        echo "<td>{$masterDesserts[$i]['Type']}</td>";
        echo "<td>{$masterDesserts[$i]['Image']}</td>";
        echo "<td>{$masterDesserts[$i]['Flavors']}</td>";
        echo "<td>{$masterDesserts[$i]['Flavor Choice']}</td>";
        echo "<td>$ {$masterDesserts[$i]['Price']}</td>";
        echo "<td>{$masterDesserts[$i]['Quantity']}</td>";
        echo "</tr>";
        
 
        }

        // I added the if array_key_exists for when the submit button is clicked because otherwise the form would just be 
        // ran before anything is inputted and more likely than not result in an error message.
        // Next, if any of the quantities inputted are less than 0 then the loop will stop and it will echo an error message
        // Therefore if the quantity is more than zero then the loop will proceed and print out the values inputed.
        if(array_key_exists('submit_button',$_POST))
        {
                if($_POST['Quantity1']<0 || $_POST['Quantity2']<0 || $_POST['Quantity3']<0 || $_POST['Quantity4']<0 || $_POST['Quantity5']<0)
            {
            echo "Uh oh! Please enter valid quantity.";
            }
            else 
            {
            print $_POST['Quantity1']; 
            print $_POST['Quantity2']; 
            print $_POST['Quantity3']; 
            print $_POST['Quantity4']; 
            print $_POST['Quantity5']; 
            
            }
        }
        
        // below is where I put my Submit button. I put it after closing the table so that it would be under the table and not 
        // change the table in any way. This is the button that submits the customer's quantity inputs and takes you to the invoice.  
 ?>
        
        </table>
            <br>
           
        <input type = 'SUBMIT' name = 'submit_button' value = 'Order!' class='float-right btn btn-lg btn-outline-info' 
               style='margin:1em;'
        />
            
       
            </form>
    </body>
</html>
