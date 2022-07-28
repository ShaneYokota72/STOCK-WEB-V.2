<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="content" content="TAIHEI Trading Company STOCK">
    <link rel="icon" href="TAIHEI.png" type="image/x-icon">
    <title>STOCK</title>
    <link rel="stylesheet" href="./main.css" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        table{
            border-collapse: collapse;
            border: 1px solid black;
            display: inline-block;
            margin: 5px;
            /* width: 206px;
            table-layout:fixed; */
        }
        td{
            border: 1px solid black;
            /* word-wrap: break-word; */
        }
        .lefttd{
            background-color: rgba(42, 42, 141, 0.245);
            width: 79px;
        }
        tbody{
            word-break: break-word;
        }
    </style>
</head>



<body>
    <div class="navbar">
        <img src="./taiheilogo.png" alt="Company Logo" class="companylogo">
        <nav>
            <ul id="menulist">
                <li><a href="aboutus.html">ABOUT US</a></li>
                <li><a href="index.php">STOCK</a></li>
                <li><a href="rental.html">RENTAL</a></li>
                <li><a href="assessment.html">ASSESSMENT</a></li>
                <li><a href="">COMPANY</a></li>
                <li><a href="tel:03-3553-7811"><span class="material-icons" class="callicon">
                    call
                    </span></a>
                </li>
                <li><a href="mailto:xxxxxxxx@gmail.com"><i class="material-icons" class="mailicon">
                    mail
                </i></a>
                </li>
            </ul>
        </nav>
        
        <a onclick="togglemenu();" class="menuicon"><i class="material-icons">
            menu
        </i></a>
        
    </div>

    <div class="stocktitle">
        <h1 class="stockletter">STOCK</h1>
    </div>

    <div class="dropdownsection">
        <form action="index.php" method="post">
        <!-- in form action, add the link so that the data will be transmitted to the server -->
            <fieldset>
                <select name="category" id="category" style="width: 24%; height: 30px;">
                    <!-- dropdown for category -->
                    <optgroup label="CATEGORY">
                    <option value="CATEGORY">CATEGORY</option>
                        <option value="CRAWLER CRANE">CRAWLER CRANE</option>
                        <option value="ROUGH TERRAIN CRANE">ROUGH TERRAIN CRANE</option>
                        <option value="ALL TERRAIN CRANE/TRUCK CRANE">ALL TERRAIN CRANE/TRUCK CRANE</option>
                        <option value="EXCAVATOR">EXCAVATOR</option>
                        <option value="OTHER">OTHER</option>
                    </optgroup>
                </select>
                <!-- dropdown for maker -->
                <select name="maker" id="maker" style="width:24%; height: 30px;">
                    <optgroup label="MAKER">
                        <option value="MAKER">MAKER</option>
                        <option value="SUMITOMO">SUMITOMO</option>
                        <option value="HITACHI">HITACHI</option>
                        <option value="KOBELCO">KOBELCO</option>
                        <option value="IHI">IHI</option>
                        <option value="TADANO">TADANO</option>
                        <option value="KATO">KATO</option>
                        <option value="KOMATSU">KOMATSU</option>
                        <option value="OTHER">OTHER</option>
                    </optgroup>
                </select>
                <select name="class" id="class" style="width:24%; height: 30px;">
                    <optgroup label="CLASS">
                        <option value="CLASS">CLASS</option>
                        <option value="~25t">~25t</option>
                        <option value="26t~50t">26t~50t</option>
                        <option value="51t~75t">51t~75t</option>
                        <option value="76t~100t">76t~100t</option>
                        <option value="101t~200t">101t~200t</option>
                        <option value="200t~">201t~</option>
                    </optgroup>
                </select>
                <!-- dropdown for year -->
                <select name="year" id="year" style="width:24%; height: 30px;">
                    <optgroup label="YEAR">
                        <option value="YEAR">YEAR</option>
                        <option value="1991~1995">1991~1995</option>
                        <option value="1996~2000">1996~2000</option>
                        <option value="2001~2005">2001~2005</option>
                        <option value="2006~2010">2006~2010</option>
                        <option value="2011~2015">2011~2015</option>
                        <option value="2016~2020">2016~2020</option>
                        <option value="2021~2025">2021~2025</option>
                    </optgroup>
                </select>
                <button class="searchbutton" name="search" value="search" type="submit">
                    <b>Search</b>
                </button>
                <button class="viewallbutton" name="viewall" value="viewall" type="submit">
                    <b>View All</b>
                </button>
            </fieldset>
        </form>
    </div>
    
        
    </table>
    <?php
    if(array_key_exists('search', $_POST)) {
        serachbuttonclicked();
    }
    else if(array_key_exists('viewall', $_POST)) {
        viewallbuttonclicked();
    }
    /* function button1() {
        echo "This is search button that is selected";
    }
    function button2() {
        echo "This is view all button that is selected";
    } */
    $category;
    $maker;
    $class;
    $year;
    $start;
    $end;
    $yearstart;
    $yearend;

    $query = "SELECT * FROM taihei_stock.vehicle_info";

    function serachbuttonclicked(){
        global $category;
        global $maker;
        global $class;
        global $year;
        global $start;
        global $end;
        global $yearstart;
        global $yearend;
        
        global $query;

        $category = $_POST["category"];
        // $category = $_POST["category"] == "CATEGORY" ? "*" : $_POST["category"]; 
        $maker = $_POST["maker"];
        $class = $_POST["class"]; 
        $year = $_POST["year"];
        $start;
        $end;
        $yearstart;
        $yearend;
        if ($class == "~25t"){
            $start = 0;
            $end = 25;
        }
        else if ($class == "26t~50t"){
            $start = 26;
            $end = 50;
        }
        else if ($class == "51t~75t"){
            $start = 51;
            $end = 75;
        }
        else if ($class == "76t~100t"){
            $start = 76;
            $end = 100;
        }
        else if ($class == "101t~200t"){
            $start = 101;
            $end = 200;
        }
        else if ($class == "201t~"){
            $start = 201;
            $end = 500;
        }

        if($year == "1991~1995"){
            $yearstart = 1991;
            $yearend = 1995;
        }
        if($year == "1996~2000"){
            $yearstart = 1996;
            $yearend = 2000;
        }
        if($year == "2001~2005"){
            $yearstart = 2001;
            $yearend = 2005;
        }
        if($year == "2006~2010"){
            $yearstart = 2006;
            $yearend = 2010;
        }
        if($year == "2011~2015"){
            $yearstart = 2011;
            $yearend = 2015;
        }
        if($year == "2016~2020"){
            $yearstart = 2016;
            $yearend = 2020;
        }
        if($year == "2021~2025"){
            $yearstart = 2021;
            $yearend = 2025;
        }
        /* echo ("$category <br>");
        echo ("$maker <br>");
        echo ("$class <br>");
        echo ("$year <br>");
        echo ("$start <br>");
        echo ("$end <br>");
        echo ("$yearstart <br>");
        echo ("$yearend <br>"); */

        $query = "SELECT * FROM taihei_stock.vehicle_info  WHERE category = \"{$category}\" and maker = \"{$maker}\" and capacity BETWEEN \"{$start}\" and \"{$end}\" and year BETWEEN \"{$yearstart}\" and \"{$yearend}\"";
        display();
    }
    function viewallbuttonclicked(){
        global $category;
        global $maker;
        global $class;
        global $year;
        global $start;
        global $end;
        global $yearstart;
        global $yearend;

        global $query;

        // possibly unneccesary
        /* $category = "ANY";
        $maker = "ANY";
        $class = "ANY";
        $year = "ANY";
        $start = "ANY";
        $end = "ANY";
        $yearstart = "ANY";
        $yearend = "ANY"; */

        $query = "SELECT * FROM taihei_stock.vehicle_info  ";
        display();
    }
    /* echo ("$category <br>");
    echo ("$maker <br>");
    echo ("$class <br>");
    echo ("$year <br>");
    echo ("$start <br>");
    echo ("$end <br>");
    echo ("$yearstart <br>");
    echo ("$yearend <br>"); 
    echo("$query <br>"); */




    function display(){

        global $category;
        global $maker;
        global $class;
        global $year;
        global $start;
        global $end;
        global $yearstart;
        global $yearend;

        global $query;

        // connecting to DB
        $servername = "localhost";
        $username = "root";
        $password = "Shane4546?";
        $dbname = "vehicle_info";

        // Create connection
        $conn = new mysqli($servername, $username, $password);

        // Check connection
        // USE IF THERE ARE ANY PROBLEM WITH CONNECTING TO MYSQL SERVER
        /* if ($conn->connect_error) {
        echo "Connection Failed";
        die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully <br>"; */

        // SQL QUERY
        // SQL QUERY SQL QUERY SQL QUERY SQL QUERY SQL QUERY SQL QUERY SQL QUERY SQL QUERY SQL QUERY SQL QUERY SQL QUERY SQL QUERY SQL QUERY SQL QUERY SQL QUERY SQL QUERY SQL QUERY SQL QUERY SQL QUERY
        /* $query = "SELECT * FROM taihei_stock.vehicle_info  WHERE category = \"{$category}\" and maker = \"{$maker}\" and capacity BETWEEN \"{$start}\" and \"{$end}\" and year BETWEEN \"{$yearstart}\" and \"{$yearend}\""; */
        
        // FETCHING DATA FROM DATABASE
        $result = $conn->query($query);

        if ($result->num_rows > 0) 
        {
            // OUTPUT DATA OF EACH ROW
            while($row = $result->fetch_assoc())
            {
                // This will echo the list of the items 
                /* echo "vehicle informations - " .
                    "Category: " . $row["category"]. 
                    " | Maker: " . $row["maker"]. 
                    " | Model: " . $row["model"].
                    " | Capacity: " .$row["capacity"]. 
                    " | Year: " . $row["year"]. "<br>"; */
                
                

                // make a table that includes all of these results
            
                echo "<table style=\"width: 210px;\">
                <tr>
                <td colspan=\"2\"><img src=\"{$row["imglink"]}\" alt=\"vehicle image\" style=\"max-width: 200px;display: block; margin: 0 auto;\"></td>
                </tr>
                <tr>
                    <td class=\"lefttd\">MAKER</td>
                    <td> {$row["maker"]} </td>
                </tr>
                <tr>
                    <td class=\"lefttd\">MODEL</td>
                    <td>{$row["model"]}</td>
                </tr>
                <tr>
                    <td class=\"lefttd\">CAPACITY</td>
                    <td>{$row["capacity"]}</td>
                </tr>
                <tr>
                    <td class=\"lefttd\">S/NO.</td>
                    <td>{$row["serial_number"]}</td>
                </tr>
                <tr>
                    <td class=\"lefttd\">YEAR</td>
                    <td>{$row["year"]}</td>
                </tr>
                <tr>
                    <td class=\"lefttd\">KM</td>
                    <td>{$row["km"]}</td>
                </tr>
                <tr>
                    <td class=\"lefttd\">HR</td>
                    <td>{$row["hr"]}</td>
                </tr>
                <tr>
                    <td class=\"lefttd\">SPEC</td>
                    <td>{$row["spec"]}</td>
                </tr>
                </table>";
            }
        } 
        else {
            echo "<h1 style=\"text-align: center; color: rgb(3, 3, 143);\">0 results</h1>";
        }

        $conn->close();
    }
    ?>

    <script>

        var menuList = document.getElementById("menulist");
        menulist.style.maxHeight = "0px";
        function togglemenu(){
            if (menuList.style.maxHeight == "0px"){
                menuList.style.maxHeight = "270px"
            } else {
                menuList.style.maxHeight = "0px"
            }

        }

    </script>

<section class="footer">
    <h4 style="color: white;">CONTACT US</h4>
    <p style="color: white;">Equipment for sale, crane rental, sell your crane and excavator, and more.<br>Click here for inquiries.</p>
    <div class="icons" >
        <a  href="mailto:xxxxxxx@gmail.com" style="color: white; text-decoration: none;" ><i><span class="material-icons">mail</span></i>Inquiry</a>
        <a  href="tel:03-3553-7811" style="color: white; text-decoration: none;"><i><span class="material-icons">call</span></i>Contact</a>
    </div>
</section>

<footer>
    <div class="container4">
        <div class="TaiheiLogo">
            <img src="./Taiheilogo2.png" alt="Taihei Trading Logo">
        </div>
        <address class="address" style="color: white;">
            8F Nagai Building, 1-7-7 Hatchobori,<br>
            Chuo-ku, Tokyo 104-0032, Japan
        </address>
        <div class="TEL" style="color: white;">
            TEL:+81 3 3553 7811
        </div>
        <div class="FAX" style="color: white;">
            FAX:+81 3 3553 7821
        </div>
        <div class="langbutton">
            <button class="changelang"><a href="#" style="text-decoration: none;">Japanese</a></button>
        </div>
    </div>
    
    <div class="bottomnav">
        <ul>
            <li><a href="aboutus.html"><b>ABOUT US</b></a></li>
            <li><a href="index.html"><b>STOCK</b></a></li>
            <li><a href="rental.html"><b>RENTAL</b></a></li>
            <li><a href="assessment.html"><b>ASSESSMENT</b></a></li>
            <li><a href=""><b>COMPANY</b></a></li>
        </ul>
    </div>

    <div class="copyright">
        <p style="color: white; text-align: center;">Copyright © TAIHEI TRADING CO., LTD.</p>
        <br>
    </div>
</footer>
</body>




</html>