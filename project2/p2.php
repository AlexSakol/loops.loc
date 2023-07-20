<a href="/index.php">Main</a><br>
<?php
/*
 y(x) = sin^2x - x/5 -1
 Find x for which y = 0
*/
$a; $b; $h; $a1; $a2;
$a = -4;
$b = 0;
$h = ($b - $a) / 20;
$eps = pow(10, -4);
for ($a; $a <= $b; $a += $h) {
    $a1 = $a;
    $a2 = $a + $h;
    if ((y($a1)*y($a2)) < 0) {
        iter($a1, $a2, $eps);
        delen($a1, $a2, $eps);
    }
}

function y($x)
{
   return pow(sin($x), 2) - $x / 5 - 1;
}	


function iter($a1, $a2, $eps) {
	$n = 0;
	$x1 = 0;
	$x2 = 0;
	for ($a1; $a1 <= $a2; $a1 += $eps)
	{
	    $x1 = $a1;
		$x2 = $x1 + $eps;
		++$n;
		if ((y($x1)*y($x2)) < 0) {
			echo "Iteration y=0 for x=$a1 iterations $n <br>";
		}
	}

}

function delen($a1, $a2, $eps) {
	$n = 0;
	while (($a2 - $a1) > $eps) {
		$a0 = ($a1 + $a2) / 2;
		if ((y($a0)*y($a2)) > 0) { $a2 = $a0; }
		if ((y($a0)*y($a1)) > 0) { $a1 = $a0; }
		++$n;
		if ((y($a1)*y($a2)) < 0 && ($a2 - $a1) < $eps) 
        { echo "Delenie y=0 for x=$a1 iterations $n<br>"; }
	}
}
?>