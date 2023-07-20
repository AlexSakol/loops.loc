
<!--Create table
 x     S(x)   Y(x)   |Y(x)-S(x)|
 x changes from a to b with step h
 user enters a, b, h and n from the keyboard
 Check a perfomance for a=0,1; b=1,0; h=0,1; value n is choisen by the user
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>LAB_2</title>        
    </head>
    <body>
        <a href="/index.php">Main</a>
            <form action="" method="POST">
            <label for="a">Введите a</label><br>
            <input type ="text" placeholder="1" id="a" name="a"><br>
            <label for="b">Введите b</label><br>
            <input type ="text" placeholder="1" id="b" name="b"><br>
            <label for="h">Введите h</label><br>
            <input type ="text" placeholder="1" id="h" name="h"><br>
            <label for="n">Введите n</label><br>
            <input type ="text" placeholder="1" id="n" name="n"><br>
            <input type = "submit">
            </form>                    
            <table>           
            <tr>    
            <th>x</th><th>S(x)</th><th>Y(x)</th><th>|Y(x)-S(x)|</th>   
            </tr>
            <?php
            if(!empty($_POST["a"]) && !empty($_POST["b"]) && !empty($_POST["h"]) && !empty($_POST["n"]))
            {
                if(preg_match("|^[\d]*[\.,]?[\d]*$|", $_POST['a']) && preg_match("|^[\d]*[\.,]?[\d]*$|", $_POST['b']) 
                && preg_match("|^[\d]*[\.,]?[\d]*$|", $_POST['h']) && preg_match("|^[\d]*[\.,]?[\d]*$|", $_POST['n']))
                {                 
                $n; $a = 0.1; $b = 1; $h = 0.1; $x; $y; $s; $delta; $k;
                $a = (float)$_POST["a"]; 
                $b = (float)$_POST["b"];
                $h = (float)$_POST["h"];
                $n = (int)$_POST["n"];                
                for ($x = $a; $x <= $b; $x += $h)
	            {
		            $y = (pow($x, 2) - pow(pi(), 2) / 3)*1 / 4;
		            $s = 0;
		            for ($k = 1; $k <= $n; $k++)
		            {
			            $s += pow(-1, $k)*cos($k*$x) / pow($k, 2);
		            }
		        $delta = abs($y - $s);                
            ?>	
                <tr>
                <td><?= $x?></td>
                <td><?= $s?></td>
                <td><?= $y?></td>
                <td><?= $delta?></td>
                </tr>       
            <?
                }
            }
        }
            ?>            
        </table> 
    </body>
</html>