<?php
$inventory = [
    "WarehouseA" => [
        "Electronics" => [
            "Laptop" => ["price" => 35000,"stock" => 35],
            "Smartphone" => ["price" => 15000,"stock" => 70],
        ],
        "Clothing" => [
            "Shirts" => ["price" => 350,"stock" => 170],
            "Pants" => ["price" => 400,"stock" => 150],
        ],
    ],
    "WarehouseB" => [
        "Electronics" => [
            "Laptop" => ["price" => 25000,"stock" => 45],
            "Smartphone" => ["price" => 10000,"stock" => 9],
        ],
        "Clothing" => [
            "Shirts" => ["price" => 300,"stock" => 170],
            "Pants" => ["price" => 450,"stock" => 0],
        ],
    ],
];
//******************************************************************************************* */
print_r("The price of laptop in warehouse A is ".$inventory['WarehouseA']['Electronics']['Laptop']['price']."<br>");
//********************************************************************************************* */
print_r("The smartphones stock in warehouse B is ".$inventory['WarehouseB']['Electronics']['Laptop']['stock']."<br>");
//*********************************************************************************************************
print_r("The stock level of Shirts in WarehouseA is ".$inventory['WarehouseA']['Clothing']['Pants']['stock']."<br>");
//********************************************************************************************************** */
print_r("The price of Pants in WarehouseB is ".$inventory['WarehouseB']['Clothing']['Pants']['price']."<br>");
//************************************************************************************************************ */
$higher=0;
$warehouse_name= "";
foreach($inventory as $key => $value) {
    if($value['Electronics']['Laptop']['stock']>=$higher){
        $higher=$value['Electronics']['Laptop']['stock'];
        $warehouse_name=$key;
    }
}
print_r($warehouse_name." warehouse has a higher stock of Laptops<br>");
//**************************************************************************************************************** */
$cheaper = PHP_INT_MAX;
$warehouse_name = "";
foreach ($inventory as $key => $value) {
    if ($value['Electronics']['Smartphone']['price'] < $cheaper) {
        $cheaper = $value['Electronics']['Smartphone']['price'];
        $warehouse_name = $key;
    }
}
print_r( $warehouse_name . " warehouse has cheaper smartphones<br>");
//*************************************************************************************************************** */
$higher=0;
$warehouse_name = "";
foreach ($inventory as $key => $value) {
    if ($value["Clothing"]["Shirts"]["stock"] >= $higher){
        $higher=$value["Clothing"]["Shirts"]["stock"];
        $warehouse_name = $warehouse_name .$key;
}}
print_r($warehouse_name."has more shirts in stock<br>");
//*************************************************************************************************************** */
foreach ($inventory as $key => $value) {
    if($value["Clothing"]["Shirts"]["stock"]==0){
        echo "Yes";
    }
    else{
        echo "No";
    }
}
//***************************************************************************************************************** */
$a=$inventory['WarehouseA']['Electronics']['Smartphone']['stock']+$inventory['WarehouseB']['Electronics']['Smartphone']['stock'];
echo "$a<br>";
//**************************************************************************************************************** */
$price=0;
foreach ($inventory as $key => $value) {
    $price+=$value['Electronics']['Laptop']['price'];
}
$ans=$price/2;
echo("$ans"."<br>");
//********************************************************************************************************************* */
$a=$inventory['WarehouseB']['Electronics']['Laptop']['stock']*$inventory['WarehouseB']['Electronics']['Laptop']['price'];
print_r("the total value of the Laptop inventory in WarehouseA is".$a.'<br>');
$a=$inventory['WarehouseB']['Clothing']['Pants']['stock']*$inventory['WarehouseB']['Clothing']['Pants']['price'];
$b=$inventory['WarehouseB']['Clothing']['Shirts']['stock']*$inventory['WarehouseB']['Clothing']['Shirts']['price'];
print_r("the total value of the Clothing inventory in WarehouseB is ".$a+$b."<br>");
$a=$inventory['WarehouseA']['Clothing']['Shirts']['stock']+$inventory['WarehouseB']['Clothing']['Shirts']['stock'];
print_r("the total number of shirts in all warehouses is ".$a."<br>");
$a=$inventory['WarehouseA']['Electronics']['Laptop']['price']*$inventory['WarehouseA']['Electronics']['Laptop']['stock'];
$b=$inventory['WarehouseA']['Electronics']['Smartphone']['price']*$inventory['WarehouseA']['Electronics']['Smartphone']['stock'];
print_r('the total value of all electronics in warehouse A is '.$a+$b.'<br>');
$a=$inventory['WarehouseA']['Electronics']['Smartphone']['stock']+$inventory['WarehouseB']['Electronics']['Smartphone']['stock'];
if($a> 100){
    echo('Yes the warehouse fulfil the order<br>');
}
else{
    echo('No, the warehouse dont fulfil the order<br>');
}
$lower=PHP_INT_MAX;
$warehouse_name= "";
foreach($inventory as $key => $value) {
    if($value['Electronics']['Smartphone']['stock']<=$lower){
        $lower=$value['Electronics']['Smartphone']['stock'];
        $warehouse_name=$key;
    }
}
print_r($warehouse_name.'<br>');
//************************************************************************ *
foreach($inventory as $key => $value) {
    if($value['Electronics']['Smartphone']['stock']==0){
        echo 'Yes';
    }
    else{
        echo 'No';
    }
    if($value['Electronics']['Laptop']['stock']==0){
        echo 'Yes';
    }
    else{
        echo 'No <br>';
    }
}
//************************************************************************* */
if($inventory['WarehouseA']['Electronics']['Laptop']['price']>$inventory['WarehouseB']['Electronics']['Laptop']['price']){
    echo 'Yes,the price of laptops higher in warehouse A than warehouse B<br>';
}
else{
    echo 'No,the price of laptops not higher in warehouse A than warehouse B<br>';
}
//*************************************************************************** */
$a=$inventory['WarehouseA']['Clothing']['Shirts']['stock']*$inventory['WarehouseA']['Clothing']['Shirts']['price'];
$b=$inventory['WarehouseB']['Clothing']['Shirts']['stock']*$inventory['WarehouseB']['Clothing']['Shirts']['price'];
print_r("We need Rs.".$a+$b." for buying all the shirts<br>");
//**************************************************************************** */
$highest_value = 0;
$warehouse_name = "";
foreach ($inventory as $key => $value) {
    $total_value = 0;
    if (isset($value['Electronics'])) {
        foreach ($value['Electronics'] as $product) {
            if (isset($product['price'], $product['stock'])) {
                $total_value += $product['price'] * $product['stock'];
            }
        }
    }
    if (isset($value['Clothing'])) {
        foreach ($value['Clothing'] as $product) {
            if (isset($product['price'], $product['stock'])) {
                $total_value += $product['price'] * $product['stock'];
            }
        }
    }
    if ($total_value > $highest_value) {
        $highest_value = $total_value;
        $warehouse_name = $key;
    }
}
echo $warehouse_name . " has the highest total inventory value.";

?>