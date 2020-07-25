<!DOCTYPE html>
<head><title>Ahmed Helal Ahmed MD5 Cracker</title></head>
<body>
<h1>MD5 cracker</h1>
<p>This application takes an MD5 hash of a four digit pin and check all 10,000 possible four digit PINs to determine the PIN.</p>
<pre>
Debug Output:
<?php
$pin = "Not found";
// If there is no parameter, this code is all skipped
if (isset($_GET['md5'])) {
    $time_pre = microtime(true);
    $md5 = $_GET['md5'];

    // This is our alphabet
    $txt = "0123456789";
    $show = 15;
    $timesOfChecks=0;
    // Outer loop go go through the alphabet for the
    // first position in our "possible" pre-hash
    // text
    for ($i=0; $i<strlen($txt); $i++) {
        $digit1 = $txt[$i];
        
        for ($j=0; $j<strlen($txt); $j++) {
            $digit2 = $txt[$j];
         
            for ($m=0; $m<strlen($txt); $m++) {
                $digit3 = $txt[$m];
               
                for ($n=0; $n<strlen($txt); $n++) {
                    $digit4 = $txt[$n];
                    $try = $digit1.$digit2.$digit3.$digit4;
                    $check = hash('md5', $try);
                    $timesOfChecks++;
                    if ($check == $md5) {
                        $pin = $try;
                        break;
                    }

                    if ($show > 0) {
                        print "$check $try\n";
                        $show = $show - 1;
                    }
                }
                if ($check == $md5) {
                    break;
                }
            }
            if ($check == $md5) {
                break;
            }
        }
        if ($check == $md5) {
            break;
        }
    }
    // Compute elapsed time
    $time_post = microtime(true);
    print "Total checks: ";
    print $timesOfChecks;
    print "\n";
    print "Elapsed time: ";
    print $time_post-$time_pre;
    print "\n";
}
?>
</pre>
<!-- Use the very short syntax and call htmlentities() -->
<p>PIN: <?= htmlentities($pin); ?></p>
<form method="get">
<input type="text" name="md5" size="40" value="<?php echo $_GET['md5']; ?>" />
<input type="submit" value="Crack MD5"/>
</form>
<ul>
<li><a href="index.php">Reset</a></li>
<li><a href="md5.php">MD5 Encoder</a></li>
<li><a href="makecode.php">MD5 Code Maker</a></li>
</ul>
</body>
</html>

