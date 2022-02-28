<?php

$z = 0;
$file = fgets(STDIN);

$str = file_get_contents(trim($file));

for ($i = 0; $i < strlen($str); $i++) {
    $a = $str[$i];
    if ($a != PHP_EOL && $a != '\r' && $a != '\t' && $a != ' ' && $a != '(' && $a != ')') {
        throw new InvalidArgumentException('Разрешенные символы: "(", ")", пробел, "\r", "\n", "\t"');
    }

    if ($str[$i] == ')') {
        $z--;
    }
    if ($str[$i] == '(') {
        $z++;
    }
    if ($z == -1) {
        return false;
    }
}

if ($z == 0) {
    return true;
}

return false;
