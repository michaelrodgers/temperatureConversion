<head> 
 <title>Convert Temperature</title> 
    <style>
        body{
            background: lightblue;
        }
        
        h2{
            text-align: center;
            margin-top:40px;
        }
        main{
            width:350px;
            margin:40px auto;
        }
        
        input{
            margin-bottom: 8px;
        }
        
        table{
            background: white;
            width:350px;
            margin: 40px auto;
        }
    </style>
 </head> 
 <body> 
 <h2>Temperature Conversion</h2> 
    <main> 
 <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "GET"> 
 Degrees:
 <input type = "text" name = "degree" size=10> <br />
 Please select one:<br />
 <input type="radio" value="celcius" name="scale"> Celcius <br />
 <input type="radio" value="fahrenheit" name="scale"> Fahrenheit <br />
 <input type="radio" value="kelvin" name="scale"> Kelvin <br />
     
 <input type = "submit" name = "Convert Temperature"/> 
 </form> 
</main>
        
<?php 
 //check for input
if (array_key_exists('degree', $_GET)) {
    $scale = $_GET['scale'];
    $degree = $_GET['degree'];
    $firstLength = strlen($_GET['degree']);

    if (($firstLength > 0) && (is_numeric($_GET['degree']))) {
        if ($scale == "celcius") {
            print "<table border><tr><th colspan=2> Conversion Results</th></tr><tr><td>$degree</td><td>Celsius</td></tr>";
            $c_2_f = round($degree*9/5+32, 2);
            print "<tr><td>$c_2_f</td><td>Fahrenheit</td></tr>";
            $c_2_k = round($degree+273.15, 2);
            print "<tr><td>$c_2_k </td><td>Kelvin</td></tr>";
        }
        if ($scale == "fahrenheit") {
            print "<table border><tr><th colspan=2> Conversion Results</th></tr><tr><td>$degree</td><td>Fahrenheit</td></tr>";
            $f_2_c = round(($degree -32)*5/9, 2);
            print "<tr><td>$f_2_c</td><td>Celsius</td></tr>";
            $f_2_k = round($f_2_c+273.15, 2);
            print "<tr><td>$f_2_k </td><td>Kelvin</td></tr>";
        }

        if ($scale == "kelvin") {
            print "<table border><tr><th colspan=2> Conversion Results</th></tr><tr><td>$degree</td><td>Kelvin</td></tr>";
            $k_2_f = round(($degree - 273.15) * 9 / 5 + 32, 2);
            print "<tr><td>$k_2_f</td><td>Fahrenheit</td></tr>";
            $k_2_c = round($degree-273.15, 2);
            print "<tr><td>$k_2_c </td><td>Celsius</td></tr>";
        }
        //check that input is not NULL
        if (is_null($scale)) {
            //print an error message if scale is not selected
            echo "<span style = \"color:red\">*Please Select A Unit of Measure.</span>";
        }
    } else {
        //print an error message if input is NULL or NaN
        echo "<span style= \"color:red\">*Please Enter A Valid Temperature.</span>";
    }
}

?> 
</body>
