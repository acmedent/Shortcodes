<?php

if (!defined('ABSPATH')) {
    die;
};

$promo = get_option('AcmeShortCode_Plugin_CurrentWeek')?:array(
"title"=>"",
"message"=>"",
"products"=>array(
    1 =>array("id"=>"","promo" => "", "promo-price" => "", "net-price" => ""),
    2 =>array("id"=>"","promo" => "", "promo-price" => "", "net-price" => ""),
    3 =>array("id"=>"","promo" => "", "promo-price" => "", "net-price" => ""),
    4 =>array("id"=>"","promo" => "", "promo-price" => "", "net-price" => ""),
    5 =>array("id"=>"","promo" => "", "promo-price" => "", "net-price" => ""),
    6 =>array("id"=>"","promo" => "", "promo-price" => "", "net-price" => "")
)
);

$nextweek_promo = get_option('AcmeShortCode_Plugin_NextWeek')?:array(
"title"=>"",
"message"=>"",
"start-date"=>date("Y-m-d"),
"days"=>0,
"products"=>array(
    1 =>array("id"=>"","promo" => "", "promo-price" => "", "net-price" => ""),
    2 =>array("id"=>"","promo" => "", "promo-price" => "", "net-price" => ""),
    3 =>array("id"=>"","promo" => "", "promo-price" => "", "net-price" => ""),
    4 =>array("id"=>"","promo" => "", "promo-price" => "", "net-price" => ""),
    5 =>array("id"=>"","promo" => "", "promo-price" => "", "net-price" => ""),
    6 =>array("id"=>"","promo" => "", "promo-price" => "", "net-price" => "")
)
);

$savedMessage = "<span id='posted-message' style='position:absolute;width:fit-content;padding:5px 10px;margin:25px auto;border:1px solid #3e6f1d; border-radius:5px;background-color:#eaffea;transition:1s'>Promo successfully saved.</span>";

$messageScript ="<script>var messageFadeOut = setTimeout(function(){ document.getElementById('posted-message').style.opacity = '0';}, 2000);var messageDisapear = setTimeout(function(){ document.getElementById('posted-message').style.display = 'none';}, 3000);</script>";

// var_dump($promo);

if(isset($_POST['save-promos'])){
    
    $savedPromo = array(
    "title"=>$_POST['promo-title'],
    "message"=>$_POST['promo-message'],
    "products"=>array(
            1 =>array("id"=>$_POST['id1'],"promo" => $_POST['promo1'], "promo-price" => $_POST['promoPrice1'], "net-price" => $_POST['netPrice1']),
            2 =>array("id"=>$_POST['id2'],"promo" => $_POST['promo2'], "promo-price" => $_POST['promoPrice2'], "net-price" => $_POST['netPrice2']),
            3 =>array("id"=>$_POST['id3'],"promo" => $_POST['promo3'], "promo-price" => $_POST['promoPrice3'], "net-price" => $_POST['netPrice3']),
            4 =>array("id"=>$_POST['id4'],"promo" => $_POST['promo4'], "promo-price" => $_POST['promoPrice4'], "net-price" => $_POST['netPrice4']),
            5 =>array("id"=>$_POST['id5'],"promo" => $_POST['promo5'], "promo-price" => $_POST['promoPrice5'], "net-price" => $_POST['netPrice5']),
            6 =>array("id"=>$_POST['id6'],"promo" => $_POST['promo6'], "promo-price" => $_POST['promoPrice6'], "net-price" => $_POST['netPrice6']),
    ),
    );

    echo $savedMessage;
    echo $messageScript;
    update_site_option('AcmeShortCode_Plugin_CurrentWeek', $savedPromo);
    $promo = $savedPromo;
}

if(isset($_POST['save-nextweek-promos'])){
    $savedPromo = array(
    "title"=>$_POST['promo-title'],
    "message"=>$_POST['promo-message'],
    "start-date"=>$_POST['start-date'],
    "days"=>$_POST['days'],
    "products"=>array(
            1 =>array("id"=>$_POST['nextweek_id1'],"promo" => $_POST['nextweek_promo1'], "promo-price" => $_POST['nextweek_promoPrice1'], "net-price" => $_POST['nextweek_netPrice1']),
            2 =>array("id"=>$_POST['nextweek_id2'],"promo" => $_POST['nextweek_promo2'], "promo-price" => $_POST['nextweek_promoPrice2'], "net-price" => $_POST['nextweek_netPrice2']),
            3 =>array("id"=>$_POST['nextweek_id3'],"promo" => $_POST['nextweek_promo3'], "promo-price" => $_POST['nextweek_promoPrice3'], "net-price" => $_POST['nextweek_netPrice3']),
            4 =>array("id"=>$_POST['nextweek_id4'],"promo" => $_POST['nextweek_promo4'], "promo-price" => $_POST['nextweek_promoPrice4'], "net-price" => $_POST['nextweek_netPrice4']),
            5 =>array("id"=>$_POST['nextweek_id5'],"promo" => $_POST['nextweek_promo5'], "promo-price" => $_POST['nextweek_promoPrice5'], "net-price" => $_POST['nextweek_netPrice5']),
            6 =>array("id"=>$_POST['nextweek_id6'],"promo" => $_POST['nextweek_promo6'], "promo-price" => $_POST['nextweek_promoPrice6'], "net-price" => $_POST['nextweek_netPrice6']),
    ),
    );

    echo $savedMessage;
    echo $messageScript;
    update_site_option('AcmeShortCode_Plugin_NextWeek', $savedPromo);
    $nextweek_promo = $savedPromo;
}

$divStyle = "width:550px; max-width:95%; height:fit-content; background-color:#fff; margin:25px auto; padding:25px; border-radius:25px; border:1px #ccc solid";

?>

<h1>Acmedent Shortcodes</h1>

<div style="<?php echo $divStyle ?>">

<h2 style="text-align:center">Current Week</h2>

<form action="" method="POST">

<label for="promo-title">Promo title: </label> <br>
<input autocomplete='off' type="text" style="width:100%" id="promo-title" name="promo-title" value="<?php echo $promo["title"];?>"><br>
<label for="promo-message">Promo message: </label> <br>
<input autocomplete='off' type="text" style="width:100%" id="promo-message" name="promo-message" value="<?php echo $promo["message"];?>"><br>
<table style="margin:20px auto;">
<tr>
<th style="width:20%">ID</th>
<th style="width:30%">Promo</th>
<th style="width:25%">Promo Price</th>
<th style="width:25%">Net Price</th>
</tr>
<?php
    foreach($promo["products"] as $key=>$item){
        echo "<tr>";
        echo "<td><input autocomplete='off' style='width:100%' type='text' name='id".$key."' value='" . $item["id"] . "'/></td>";
        echo "<td><input autocomplete='off' style='width:100%' type='text' name='promo".$key."' value='" . $item["promo"] . "'/></td>";
        echo "<td><input autocomplete='off' style='width:100%' type='text' name='promoPrice".$key."' value='" . $item["promo-price"] . "'/></td>";
        echo "<td><input autocomplete='off' style='width:100%' type='text' name='netPrice".$key."' value='" . $item["net-price"] . "'/></td>";
        echo "</tr>";
    }
?>
</table>
<input type="submit" style ="cursor:pointer" name="save-promos" value="Save">
</form>
</div>

<div style="<?php echo $divStyle ?>">

<h2 style="text-align:center">Next Week</h2>

<form action="" method="POST">

<label for="promo-title">Promo title: </label> <br>
<input  autocomplete='off' type="text" style="width:100%" id="nextweek-promo-title" name="promo-title" value="<?php echo $nextweek_promo["title"];?>"><br>
<label for="promo-message">Promo message: </label> <br>
<input  autocomplete='off' type="text" style="width:100%" id="nextweek-promo-message" name="promo-message" value="<?php echo $nextweek_promo["message"];?>"><br>
<label for="start-date">Start Date: </label> <br>
<input  autocomplete='off' type="date" style="width:200px" id="start-date" name="start-date" value="<?php echo $nextweek_promo["start-date"]?:date("Y-m-d");?>"><br>
<label for="days">Promo duration in days: </label> <br>
<input  autocomplete='off' type="number" style="width:50px" id="days" name="days" value="<?php echo $nextweek_promo["days"];?>"><br>

<table style="margin:20px auto;">
<tr>
<th style="width:20%">ID</th>
<th style="width:30%">Promo</th>
<th style="width:25%">Promo Price</th>
<th style="width:25%">Net Price</th>
</tr>
<?php
    foreach($nextweek_promo["products"] as $key=>$item){
        echo "<tr>";
        echo "<td><input autocomplete='off' style='width:100%' type='text' name='nextweek_id".$key."'  value='" . $item["id"]  ."'/></td>";
        echo "<td><input autocomplete='off' style='width:100%' type='text' name='nextweek_promo".$key."' value='" . $item["promo"] . "'/></td>";
        echo "<td><input autocomplete='off' style='width:100%' type='text' name='nextweek_promoPrice".$key."' value='" . $item["promo-price"] . "'/></td>";
        echo "<td><input autocomplete='off' style='width:100%' type='text' name='nextweek_netPrice".$key."' value='" . $item["net-price"] . "'/></td>";
        echo "</tr>";
    }
?>

</table>
<input type="submit" style ="cursor:pointer" name="save-nextweek-promos" value="Save">
</form>
</div>