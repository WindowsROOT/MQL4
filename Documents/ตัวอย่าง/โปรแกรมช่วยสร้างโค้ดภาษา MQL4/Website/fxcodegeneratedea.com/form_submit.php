<?php

@session_start();
$operation_sign = [
    'more' => ' > ',
    'more_equal_to' => ' >= ',
    'less' => ' < ',
    'less_equal_to' => ' <= ',
    'equal' => ' == ',
];

$logic = [
    'and' => '  &&  ',
    'or' => '  ||  '
];

$arr_function = [
    1 => "iADX({{text}})",
    2 => "iATR({{text}})",
    3 => "iBands({{text}})",
    4 => "iCCI({{text}})",
    5 => "iEnvelopes({{text}})",
    6 => "iIchimoku({{text}})",
    7 => "iMA({{text}})",
    8 => "iMACD({{text}})",
    9 => "iMomentum({{text}})",
    10 => "iOsMA({{text}})",
    11 => "iRSI({{text}})",
    12 => "iSAR({{text}})",
    13 => "iStdDev({{text}})",
    14 => "iStochastic({{text}})",
    15 => "iClose({{text}})",
    16 => "iOpen({{text}})",
    17 => "iHigh({{text}})",
    18 => "iLow({{text}})",
    19 => "{{text}}"
];

$arr_map = [
    1 => [0, 3, 1, 2, 4],
    2 => [0, 1, 2],
    3 => [0, 3, 4, 5, 1, 2, 6],
    4 => [0, 2, 1, 3],
    5 => [0, 4, 1, 5, 2, 6, 3, 7],
    6 => [0, 2, 3, 4, 1, 5],
    7 => [0, 3, 4, 1, 2, 5],
    8 => [0, 3, 4, 5, 1, 2, 6],
    9 => [0, 2, 1, 3],
    10 => [0, 2, 3, 4, 1, 5],
    11 => [0, 2, 1, 3],
    12 => [0, 1, 2, 3],
    13 => [0, 3, 4, 1, 2, 5],
    14 => [0, 4, 5, 6, 1, 2, 3, 7],
    15 => [0, 1],
    16 => [0, 1],
    17 => [0, 1],
    18 => [0, 1],
    19 => [0]
];

$arr_text_start = [
    0 => "bool Open_Buy(){<br>",
    1 => "bool Open_Sell(){<br>",
    2 => "bool Close_Buy(){<br>",
    3 => "bool Close_Sell(){<br>",
    4 => "bool Option(){<br>",
];

$arr_text_start_if = [
    0 => " if( {{_operation_}} ) { <br> return 1; <br> } else <br>",
    1 => " if( {{_operation_}} ) { <br> return 1; <br> } else <br>",
    2 => " if( {{_operation_}} ) { <br> return 1; <br>} else <br>",
    3 => " if( {{_operation_}} ) { <br> return 1; <br>} else <br>",
    4 => " if( {{_operation_}} ) { <br> return 1; <br>} else <br>",
];

$arr_text_end = [
    0 => "return 0; }",
    1 => "return 0; }",
    2 => "return 0; }",
    3 => "return 0; }",
    4 => "return 0; }",
];

$text_ = [
    0 => "",
    1 => "",
    2 => "",
    3 => "",
    4 => ""
];
//$name_ea = substr(md5(date('Ymd')), 0, 10) . '_' . $_SESSION['user'] . '_' . substr(md5(date('dmy')), 0, 10) . '_' . $_POST['action_submit'];
$name_ea = substr(md5(date('YmdsiH')), 0, 10) . str_pad($_SESSION['user'], 3, "0", STR_PAD_LEFT) . substr(md5(date('dmyHis')), 0, 10) . '_' . $_POST['action_submit'];
if (!file_exists('code_backup/' . $name_ea . '/')) {
    mkdir('code_backup/' . $name_ea . '/', 0777, true);
}
echo 'code_backup/' . $name_ea . '/fxcodegeneratedea_' . $name_ea . '.zip';
echo "|";
$magic_number = $_POST['magic_number'];
//echo "double TP" . ";<br>";
//echo "double SL" . ";<br>";
//echo "double Lots" . ";<br>";
//echo "double Magic = " . $magic_number . ";<br>";
//echo 'string ea_name = "' . $name_ea . '_";<br>';
$code = '';
$code .= "double TP" . ";<br>";
$code .= "double SL" . ";<br>";
$code .= "double Lots" . ";<br>";
$code .= "double Magic = " . $magic_number . ";<br>";
$code .= 'string ea_name = "' . $name_ea . '_";<br>';
//echo 'extern string ea_name = "' . $name_ea . '-' . date('YmdHi') . '-' . $name_ea[10] . $name_ea[11] . $name_ea[12] . '";<br>';
for ($t = 1; $t <= 4; $t++) {
//    echo "Tab : " . $t . '<br>';

    $idc_true = 0;
    $decision = "";
    $opt = '';
//    echo $arr_text_start[$t - 1];
    $code .= $arr_text_start[$t - 1];
    for ($idc = 0; $idc < $_POST['tab_' . $t . '_idc_n']; $idc ++) {
//        echo "Indicator ที่ " . $idc;
        if (isset($_POST['tab_' . $t . '_idc_' . $idc . '_num_ele_first']) && $_POST['tab_' . $t . '_idc_' . $idc . '_num_ele_first'] > 0 && $_POST['tab_' . $t . '_idc_' . $idc . '_num_ele_last'] > 0) {
            if ($idc_true > 0) {
                $opt .= ' ' . $logic[$_POST['tab_' . $t . '_idc_' . $idc . '_logic']] . ' <br>';
            }
//            echo "<br>";
//            echo " value : " . $_POST['tab_' . $t . '_idc_left_' . $idc] . "<br>";
            // ฝั่งซ้าย
//            echo "ซ้าย ---> ";
            $arr_left = [];
            for ($ele = 1; $ele <= $_POST['tab_' . $t . '_idc_' . $idc . '_num_ele_first']; $ele ++) {
                $arr_left[] = $_POST['tab_' . $t . '_idc_' . $idc . '_sign_first_element_' . $ele];
//                echo $_POST['tab_' . $t . '_idc_' . $idc . '_sign_first_element_' . $ele] . ', ';
            }
            $operation_left = ($_POST['tab_' . $t . '_idc_left_' . $idc] == 19 ? "" : "NULL,");
            for ($ele = 0; $ele < $_POST['tab_' . $t . '_idc_' . $idc . '_num_ele_first']; $ele ++) {
                $operation_left.=$arr_left[$arr_map[$_POST['tab_' . $t . '_idc_left_' . $idc]][$ele]];
                if ($ele < $_POST['tab_' . $t . '_idc_' . $idc . '_num_ele_first'] - 1) {
                    $operation_left .= ',';
                }
            }


//            echo "<br>";
            //ฝั่งขวา
//            echo " value : " . $_POST['tab_' . $t . '_idc_right_' . $idc] . "<br>";
//            echo "ขวา ---> ";
            $arr_right = [];
            for ($ele = 1; $ele <= $_POST['tab_' . $t . '_idc_' . $idc . '_num_ele_last']; $ele ++) {
                $arr_right[] = $_POST['tab_' . $t . '_idc_' . $idc . '_sign_last_element_' . $ele];
//                echo $_POST['tab_' . $t . '_idc_' . $idc . '_sign_last_element_' . $ele] . ', ';
            }
            $operation_right = ($_POST['tab_' . $t . '_idc_right_' . $idc] == 19 ? "" : "NULL,");
            for ($ele = 0; $ele < $_POST['tab_' . $t . '_idc_' . $idc . '_num_ele_last']; $ele ++) {
                $operation_right.=$arr_right[$arr_map[$_POST['tab_' . $t . '_idc_right_' . $idc]][$ele]];
                if ($ele < $_POST['tab_' . $t . '_idc_' . $idc . '_num_ele_last'] - 1) {
                    $operation_right .= ',';
                }
            }
            $opt .= str_replace('{{text}}', $operation_left, $arr_function[$_POST['tab_' . $t . '_idc_left_' . $idc]]) . $operation_sign[$_POST['tab_' . $t . '_idc_middle_' . $idc]] . str_replace('{{text}}', $operation_right, $arr_function[$_POST['tab_' . $t . '_idc_right_' . $idc]]);
            $idc_true ++;

//            echo "<br>";
        } else {
//            echo "กดลบ" . "<br>";
        }
    }
    if ($_POST['tab_' . $t . '_idc_n'] > 0) {
//        echo str_replace('{{_operation_}}', $opt, $arr_text_start_if[$t - 1]);
        $code .= str_replace('{{_operation_}}', $opt, $arr_text_start_if[$t - 1]);
    }
//    echo $arr_text_end[$t];
    $code.= $arr_text_end[$t];
//    echo "<br>";
    $code.= "<br>";


//    echo "<hr>";
}

$Lots = $_POST['Lots'];
$TakeProfit = $_POST['TakeProfit'];
$StopLoss = $_POST['StopLoss'];
//echo "bool Option(){<br>";
//echo "TP = " . $TakeProfit . ";<br>";
//echo "SL = " . $StopLoss . ";<br>";
//echo "Lots = " . $Lots . ";<br>";
//echo "if( TP != 0 ){<br>";
//echo "return 1;<br>";
//echo "}else return 0;<br>}";

$code.= "bool Option(){<br>";
$code.= "TP = " . $TakeProfit . ";<br>";
$code.= "SL = " . $StopLoss . ";<br>";
$code.= "Lots = " . $Lots . ";<br>";
$code.= "if( TP != 0 ){<br>";
$code.= "return 1;<br>";
$code.= "}else return 0;<br>}";

// ---------------------------------------------------


/* create a compressed zip file */
function createZip($files = array(), $destination = '', $overwrite = false) {

    if (file_exists($destination) && !$overwrite) {
        return false;
    }


    $validFiles = [];
    if (is_array($files)) {
        foreach ($files as $file) {
            if (file_exists($file)) {
                $validFiles[] = $file;
            }
        }
    }


    if (count($validFiles)) {
        $zip = new ZipArchive();
        if ($zip->open($destination, $overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
            return false;
        }


        foreach ($validFiles as $file) {
            $temp = explode('/', $file);
            $zip->addFile($file, end($temp));
        }


        $zip->close();
        return file_exists($destination);
    } else {
        return false;
    }
}

$fileName = 'code_backup/' . $name_ea . '/fxcodegeneratedea_' . $name_ea . '.zip';
// ---
$myfile = fopen("code_backup/$name_ea/logic.mqh", "w") or die("Unable to open file!");
$breaks = array("<br />", "<br>", "<br/>");
$code = str_ireplace($breaks, "\r\n", $code);
fwrite($myfile, $code);
fclose($myfile);

$files_to_zip = [ "code_backup/$name_ea/logic.mqh", 'code_backup/MM.mq4'];
// ----
$result = createZip($files_to_zip, $fileName);
@header("Content-type: application/zip");
@header("Content-Disposition: attachment; filename=\"" . $fileName . "\"");
@header("Content-Length: " . filesize($fileName));
@readfile($fileName);
ob_end_flush();

