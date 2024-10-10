<php
$exp = "200x^4000";
$regex = array(
    "(\w)\^(\d+)", // x^n power rule
    "(\d+)\*?(\w)\^(\d*)" // ax^n power rule
)

for ($i = 0; $i < count($regex); $i++) {
    if (preg_match("/^$regex[$i]$/", $exp, $matches) == 1) {
        if ($i == 0) { // x^n power rules
            $variable = $matches[1];
            $coefficient = $matches[2];
            $exponent = intval($matches[2])-1;

            $out = "$coefficient$variable^$exponent";
        } else if ($i == 1) { // ax^n power rule
            $variable = $matches[2];
            $coefficient = $matches[1] * $matches[3];
            $exponent = intval($matches[3]) - 1;

            $out = "$coefficient$variable^$exponent";
        }

        $display = makexxpretty($out); // remove unnecessary multiplication and powers
        break;
    }
}
?>