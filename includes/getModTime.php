<?php
// outputs e.g.  somefile.txt was last modified: December 29 2002 22:16:23.

$filename = '../../../../uhen/anita/aware/output/ANITA4/statusPage/hkStatus.json.gz';
if (file_exists($filename)) {
    echo "$filename was last modified: " . date ("m - d - y H:i:s.", filemtime($filename));
}

?>
