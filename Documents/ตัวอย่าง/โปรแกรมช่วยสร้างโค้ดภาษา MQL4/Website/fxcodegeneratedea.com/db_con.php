<?php

class MyDB extends SQLite3 {

    function __construct() {
        $this->open('db.db');
    }

}

$conn = new MyDB();
if (!$conn) {
    echo $conn->lastErrorMsg();
} else {
//    echo "Opened database successfully\n";
}

//$sql = "SELECT * FROM ac_user";
//$ret = $conn->query($sql);
//while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
//    echo "<pre>";
//    print_r($row);
//    echo "</pre>";
//}
//$conn->close();
