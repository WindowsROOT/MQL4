
<style type="text/css">
    #container {
        min-width: 310px;
        max-width: 800px;
        height: 400px;
        margin: 0 auto
    }
</style>
<style>
    body {
        background: url(http://i.imgur.com/GHr12sH.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
</style>    
<?php
$active_menu = 1;

require './head_user.php';
require './db_con.php';
if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];
    $_SESSION['special'] = 1;
} else {
    $user_id = $_SESSION['user'];
}
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
?>
<body>

    <?php
    @session_start();
    $chose_ea = $_POST['ea_select'];
//        $ftp_server = 'gator4148.hostgator.com';
    $ftp_server = '192.185.4.160';
    $conn_id = ftp_connect($ftp_server);
    $ftp_user_name = 'vertical@doujin69-th.com';
    $ftp_user_pass = 'y4nlfwtkCz#H';
    $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
    $contents = ftp_nlist($conn_id, ".");
    ftp_close($conn_id);
    $layer1 = [];
    $layer2 = [];
    $layer3 = [];
    $layer4 = [];
    $balance = [];
    date_default_timezone_set('UTC');
    $ea_name = [];
//        echo 'Current PHP version: ' . phpversion() . '<br>';
    if (is_array($contents) || is_object($contents)) {
        foreach ($contents as $row) {
            if (isset($row[10])) {
                if ($user_id == round($row[10] . $row[11] . $row[12])) {
//                    echo $row . '<br>';
                    $temp = explode('_', $row);
                    if (!in_array($temp[1], $ea_name)) {
                        $ea_name[] = $temp[1];
                    }
                    $date = explode('.', $temp[2]);
                    if ($chose_ea == $temp[1]) {
                        $line = 1;

                        // ----------------------------------------------------------------------------------------------------
                        if (file_exists('temp/' . $row) == 0) {
                            $conn_id = ftp_connect($ftp_server);
                            $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
                            $local_file = 'temp/' . $row;
                            $server_file = $row;
                            if (ftp_get($conn_id, $local_file, $server_file, FTP_BINARY)) {
//                                    echo "Successfully written to $local_file\n";
                            } else {
//                                    echo "There was a problem\n";
                            }
                            ftp_close($conn_id);
                        }
                        // ----------------------------------------------------------------------------------------------------
                        $text_content = '';
                        $reader = fopen("temp/" . $row, "r") or die("Unable to open file!");
                        while (!feof($reader)) {
                            $text_content .= fgets($reader);
                        }
                        fclose($reader);
//                            echo $text_content;
                        foreach (explode(PHP_EOL, $text_content) as $key => $text) {
                            if ($key > 0) {
                                $temp = explode(',', $text);
                                if (isset($temp[8])) {
                                    $date_pick = date('Y-m-d', strtotime($date[0])) . ' ' . $temp[0];
                                    $date_conv = (strtotime($date_pick) * 1000);
                                    $layer1[] = [$date_conv, floatval($temp[8])];
                                    $layer2[] = [$date_conv, floatval($temp[9])];
                                    $layer3[] = [$date_conv, floatval($temp[10])];
                                    $layer4[] = [$date_conv, floatval($temp[11])];
                                    $balance[] = [$date_conv, floatval($temp[2])];

                                    $ac_money = $temp[1];
                                    $ac_bal = $temp[2];

                                    $money = 100.0;
                                    $aa_ = ($ac_money - $ac_bal != 0 ? ( ($ac_money - $ac_bal) / $ac_money ) * 100 : 0);
                                    $sum = $money - $aa_;
                                    //$AccMon = floatval($temp[1]);
                                    $percent = number_format(floatval(($sum > 100 ? 100 : $sum)), 2);

                                    $AccBal = floatval($temp[2]);
                                    $OrderTotal = floatval($temp[3]);
                                    $buy = floatval($temp[4]);
                                    $sell = floatval($temp[5]);
                                    $win = floatval($temp[6]);
                                    $Loss = floatval($OrderTotal - $win);
                                    $winRate = @floatval(($win > 0 ? ($win / $OrderTotal) : 0)) * 100;
                                    $buffer = floatval($temp[7]);
                                    $layer01 = floatval($temp[8]);
                                    $layer02 = floatval($temp[9]);
                                    $layer03 = floatval($temp[10]);
                                    $layer04 = floatval($temp[11]);
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    ?>
    <div class="container">
        <div class="col-md-12">
            <div class="form-horizontal">
                <div class="form-group text-center">
                    <h1 style="color: black;margin-top: 50px;">แสดงข้อมูลกราฟ</h1>
                </div>
                <div class="form-group">
                    <div id="balance" class="col-md-6" style="height: 400px;" ></div>
                    <div class="col-md-6">
                        <?php if (!isset($_SESSION['special'])) { ?>
                            <form action="graph.php" method="post">
                                <select class="form-control" name="ea_select" id="ea_select">

                                    <?php
                                    foreach ($ea_name as $row) {
                                        ?>
                                        <option value="<?= $row ?>" <?= ($row == $_POST['ea_select'] ? 'selected' : '') ?>><?= $row ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>

                                <button class="btn btn-primary" type="submit">เรียกดู</button>
                                <button class="btn btn-danger" type="button" onclick="window.location = 'del_ea.php?ea_select=' + $('#ea_select').val();">ลบ</button>

                                <a href="user.php" class="btn btn-default">กลับ</a>

                            </form>
                        <?php } ?>
                        <h5 style="font-weight: bold">AccountEquity : </h5>
                        <div class="progress" style="height: 50px;">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?= $percent ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $percent ?>%;color:black;padding-top: 20px;font-size: 20px;">
                                <?= $percent ?>%
                            </div>
                        </div>
                        <h5 style="font-weight: bold">AccountsMoney : <?= number_format($ac_money, 2) ?> USD</h5>
                        <h5 style="font-weight: bold">AccountsBalance : <?= number_format($AccBal, 2) ?> USD</h5>
                        <!--<h5 style="font-weight: bold">Profit/Loss : <?= number_format($aa_ * -1, 2) ?> %</h5>-->
                        <h5 style="font-weight: bold">OrderTotal : <?= number_format($OrderTotal, 0) ?> Orders</h5>
                        <h5 style="font-weight: bold">Buy : <?= number_format($buy, 0) ?> Orders</h5>
                        <h5 style="font-weight: bold">Sell : <?= number_format($sell, 0) ?> Orders</h5>
                        <h5 style="font-weight: bold">Win : <?= number_format($win, 0) ?> Orders</h5>
                        <h5 style="font-weight: bold">Loss : <?= number_format($Loss, 0) ?> Orders</h5>
                        <h5 style="font-weight: bold">Win Rate : <?= number_format($winRate, 2) ?> %</h5>
                        <h5 style="font-weight: bold">Buffer : <?= number_format($buffer, 2) ?> USD</h5>
                        <h5 style="font-weight: bold">Layer 1 : <?= number_format($layer01, 2) ?> USD</h5>
                        <h5 style="font-weight: bold">Layer 2 : <?= number_format($layer02, 2) ?> USD</h5>
                        <h5 style="font-weight: bold">Layer 3 : <?= number_format($layer03, 2) ?> USD</h5>
                        <h5 style="font-weight: bold">Layer 4 : <?= number_format($layer04, 2) ?> USD</h5>
                    </div>
                </div>
                <div class="form-group">
                    <div id="layer1" class="col-md-6" style="height: 400px;"></div>
                    <div id="layer2" class="col-md-6" style="height: 400px;"></div>

                </div>
                <div  class="form-group">
                    <div id="layer3" class="col-md-6" style="height: 400px;"></div>
                    <div id="layer4" class="col-md-6" style="height: 400px;"></div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        // Create the chart
        Highcharts.stockChart('balance', {
            rangeSelector: {
                selected: 1
            },
            title: {
                text: 'balance'
            },
            series: [{
                    name: 'balance',
                    data: <?= json_encode($balance) ?>,
                    tooltip: {
                        valueDecimals: 2
                    }
                }]
        });
    </script>

    <script type="text/javascript">
        // Create the chart
        Highcharts.stockChart('layer1', {
            rangeSelector: {
                selected: 1
            },
            title: {
                text: 'Layer1'
            },
            series: [{
                    name: 'Layer1',
                    data: <?= json_encode($layer1) ?>,
                    tooltip: {
                        valueDecimals: 2
                    }
                }]
        });
    </script>

    <script type="text/javascript">
        // Create the chart
        Highcharts.stockChart('layer2', {
            rangeSelector: {
                selected: 1
            },
            title: {
                text: 'Layer2'
            },
            series: [{
                    name: 'Layer2',
                    data: <?= json_encode($layer2) ?>,
                    tooltip: {
                        valueDecimals: 2
                    }
                }]
        });
    </script>

    <script type="text/javascript">
        // Create the chart
        Highcharts.stockChart('layer3', {
            rangeSelector: {
                selected: 1
            },
            title: {
                text: 'Layer3'
            },
            series: [{
                    name: 'Layer3',
                    data: <?= json_encode($layer3) ?>,
                    tooltip: {
                        valueDecimals: 2
                    }
                }]
        });
    </script>

    <script type="text/javascript">
        // Create the chart
        Highcharts.stockChart('layer4', {
            rangeSelector: {
                selected: 1
            },
            title: {
                text: 'Layer4'
            },
            series: [{
                    name: 'Layer4',
                    data: <?= json_encode($layer4) ?>,
                    tooltip: {
                        valueDecimals: 2
                    }
                }]
        });
    </script>
</body>
<?php require './footer.php'; ?>
