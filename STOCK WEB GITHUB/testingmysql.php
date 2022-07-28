<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="stock.php" method="post">
        <!-- in form action, add the link so that the data will be transmitted to the server -->
            <fieldset>
                <select name="category" id="category" style="width: 24%; height: 30px;">
                    <!-- dropdown for category -->
                    <optgroup label="CATEGORY">
                        <option name="CATEGORY" value="<?php echo empty($_GET["CATEGORY"]) ? "*" : $_GET["CATEGORY"]; ?>">CATEGORY</option>
                        <option name="CRAWLER CRANE" value="<?php echo empty($_GET["CRAWLER CRANE"]) ? "*" : $_GET["CRAWLER CRANE"]; ?>">CRAWLER CRANE</option>
                        <option name="ROUGH TERRAIN CRANE" value="<?php echo empty($_GET["ROUGH TERRAIN CRANE"]) ? "*" : $_GET["ROUGH TERRAIN CRANE"]; ?>">ROUGH TERRAIN CRANE</option>
                        <option name="ALL TERRAIN CRANE/TRUCK CRANE" value="<?php echo empty($_GET["ALL TERRAIN CRANE/TRUCK CRANE"]) ? "*" : $_GET["ALL TERRAIN CRANE/TRUCK CRANE"]; ?>">ALL TERRAIN CRANE/TRUCK CRANE</option>
                        <option name="EXCAVATOR" value="<?php echo empty($_GET["EXCAVATOR"]) ? "*" : $_GET["EXCAVATOR"]; ?>">EXCAVATOR</option>
                        <option name="OTHER" value="<?php echo empty($_GET["OTHER"]) ? "*" : $_GET["OTHER"]; ?>">OTHER</option>
                    </optgroup>
                </select>
            </fieldset>
            <button type="submit">Submit</button>
</form>
</body>
</html>