<?php

echo "2. testent.php<br/><br/>";

$str = "<p>AKAKOM -&gt; &quot;</p>";

echo htmlspecialchars_decode($str);
echo htmlspecialchars_decode($str, ENT_NOQUOTES);
