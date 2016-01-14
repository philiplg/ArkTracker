<?php
require_once ('core/core.php');

if (isset($_POST["ID"])) {

	$id = $_POST["ID"];
	$name = $_POST["name"];
	$type = $_POST["type"];
	$weight = $_POST["weight"];
	$stack = $_POST["stack"];
	$craftXP = $_POST["craftXP"];
	$craftedIn = $_POST["craftedIn"];
	$resources = $_POST["resources"];

	if (!($stmt = $mysqli -> prepare("INSERT INTO items(id,name,type,weight,stack,craftXP,craftedIn,resources) VALUES (?, ?, ?, ?, ?, ?, ?, ?)"))) {
		echo "Prepare failed: (" . $mysqli -> errno . ") " . $mysqli -> error;
	}

	if (!$stmt -> bind_param("issdidss", $id, $name, $type, $weight, $stack, $craftXP, $craftedIn, $resources)) {
		echo "Binding parameters failed: (" . $stmt -> errno . ") " . $stmt -> error;
	}

	if (!$stmt -> execute()) {
		echo "Execute failed: (" . $stmt -> errno . ") " . $stmt -> error;
	}

}

if (!($stmt = $mysqli -> prepare("SELECT name,ID FROM items ORDER BY name"))) {
	echo "Prepare failed: (" . $mysqli -> errno . ") " . $mysqli -> error;
}

if (!$stmt -> execute()) {
	echo "Execute failed: (" . $stmt -> errno . ") " . $stmt -> error;
}

if (!$stmt -> bind_result($returnedName, $returnedID)) {
	echo "Binding parameters failed: (" . $stmt -> errno . ") " . $stmt -> error;
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>ArkTracker - Add Item</title>
		<meta name="description" content="">
		<meta name="author" content="Philip Golding">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
		<script>
			function appendItems() {
				
				var itemID = document.getElementById("itemList").value;
				var amount = document.getElementById("itemAmount").value;

				var n = document.getElementById("resources");
				if (n.value.length < 1) {
					n.value = itemID + ":" + amount;
				} else {
					n.value = n.value + "," + itemID + ":" + amount;
				}
			}
		</script>

	</head>

	<body>
		<div>
			<form method="post" action="add_item.php">
				<input type="text" name="ID" placeholder="ID" />
				<input type="text" name="name" placeholder="name" />
				<select name="type" placeholder="type">
					<option value="UNSET">Type</option>
					<option value="Resource">Resource</option>
					<option value="Structure">Structure</option>
					<option value="Consumable">Consumable</option>
					<option value="Armour">Armour</option>
					<option value="Weapon">Weapon</option>
					<option value="Ammunition">Ammunition</option>
					<option value="Saddle">Saddle</option>
				</select>
				<input type="text" name="weight" placeholder="weight" />
				<input type="text" name="stack" placeholder="stacks amount" />
				<input type="text" name="craftXP" placeholder="XP Gained" />
				<select name="craftedIn" placeholder="craftedIn">
					<option value="USNET">Crafted In</option>
					<option value="Smithy">Smithy</option>
					<option value="Fabricator">Fabricator</option>
					<option value="Pestle & Mortar">Pestle & Mortar</option>
					<option value="Campfire/Grill">Campfire/Grill</option>
					<option value="Cooker">Cooker</option>
					<option value="Harvested">Harvested</option>
				</select>
				<input type="text" id="resources" name="resources" placeholder="Resources itemID:amount,itemID:amount..." />
				<input type="submit" name="commit" value="Add Item">
			</form>
			<br />
			<br />
			<br />


				<select multiple size="10" style="width: 200px;" id="itemList">
					<?php
					while ($stmt -> fetch()) {
						printf("<option value=\"" . $returnedID . "\"> %s (%s)</option>", $returnedName, $returnedID);
					}
					?>
				</select>
				<br />
				<input type="text" id="itemAmount" />
				<input type="submit" value="Append" onclick="appendItems()">


		</div>
	</body>
</html>
