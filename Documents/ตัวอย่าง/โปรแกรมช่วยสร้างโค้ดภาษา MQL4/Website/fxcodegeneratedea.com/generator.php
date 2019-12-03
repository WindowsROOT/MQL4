
<?php
$active_menu = 2;
require './head_user.php';
?>
<div class="container">
    <br>

</div>
<div class="container">
    <ul class="nav nav-tabs" role="tablist" style="background: whitesmoke;opacity: 0.9;">
        <li role="presentation" class="active"><a href="#tab_1" aria-controls="post" role="tab" data-toggle="tab">OPEN BUY</a></li>
        <li role="presentation" class=""><a href="#tab_2" aria-controls="activity" role="tab" data-toggle="tab">OPEN SELL</a></li>
        <li role="presentation" class=""><a href="#tab_3" aria-controls="post" role="tab" data-toggle="tab">CLOSE BUY</a></li>
        <li role="presentation" class=""><a href="#tab_4" aria-controls="activity" role="tab" data-toggle="tab">CLOSE SELL</a></li>
        <li role="presentation" class=""><a href="#tab_5" aria-controls="activity" role="tab" data-toggle="tab">OPTION</a></li>
        <li role="presentation" class=""><a href="#tab_6" aria-controls="activity" role="tab" data-toggle="tab">GENERATE</a></li>
    </ul>
    <!-- Tab panes -->
    <form class="tab-content form-horizontal col-md-12" id="form_submit" action="javascript:void(0);" style="background: whitesmoke;opacity: 0.8;">
        <?php
        $hidden = 1;
        ?>

        <div role="tabpanel" style="padding-top: 10px;" class="tab-pane active form-horizontal col-md-12" id="tab_1">
            <!--<p>Hi Open Buy</p>-->
            <div class="form-group">
                <button class="btn btn-success" type="button" onclick="add('tab_1');">add</button>
            </div>
            <input id="tab_1_idc_n" name="tab_1_idc_n" type="<?= ($hidden == 1 ? 'hidden' : 'text') ?>" value="0">
        </div>
        <div role="tabpanel" style="padding-top: 10px;" class="tab-pane form-horizontal col-md-12" id="tab_2">
            <!--<p>hi open sell</p>-->
            <div class="form-group">
                <button class="btn btn-success" type="button" onclick="add('tab_2');">add</button>
            </div>
            <input id="tab_2_idc_n" name="tab_2_idc_n" type="<?= ($hidden == 1 ? 'hidden' : 'text') ?>" value="0">
        </div>
        <div role="tabpanel" style="padding-top: 10px;" class="tab-pane form-horizontal col-md-12" id="tab_3">
            <!--<p>hi close buy</p>-->
            <div class="form-group">
                <button class="btn btn-success" type="button" onclick="add('tab_3');">add</button>
            </div>
            <input id="tab_3_idc_n" name="tab_3_idc_n" type="<?= ($hidden == 1 ? 'hidden' : 'text') ?>" value="0">
        </div>
        <div role="tabpanel" style="padding-top: 10px;" class="tab-pane form-horizontal col-md-12" id="tab_4">
            <!--<p>hi close sell</p>-->
            <div class="form-group">
                <button class="btn btn-success" type="button" onclick="add('tab_4');">add</button>
            </div>
            <input id="tab_4_idc_n" name="tab_4_idc_n" type="<?= ($hidden == 1 ? 'hidden' : 'text') ?>" value="0">
        </div>
        <div role="tabpanel" style="padding-top: 10px;" class="tab-pane form-horizontal col-md-12" id="tab_5">
            <div class="form-group">
                <label class="control-label col-md-4">Magic Number : </label>
                <div class="col-md-4" >
                    <input type="number" name="magic_number" class="form-control" value="123456" required="">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">Lots : </label>
                <div class="col-md-4">
                    <input type="number" name="Lots" id="Lots" onchange="calculate();" class="form-control" value="0.01" required="">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">TakeProfit : </label>
                <div class="col-md-4">
                    <input type="number" name="TakeProfit" class="form-control" value="300" required=""> 
                </div>
                <div class="col-md-2">
                    <h4 style="font-weight: bold">( Pip )</h4>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">StopLoss : </label>
                <div class="col-md-4">
                    <input type="number" name="StopLoss" onchange="calculate();" id="StopLoss" class="form-control" value="300" required="">
                </div>
                <div class="col-md-2">
                    <h4 style="font-weight: bold">( Pip )</h4>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">Percent Money Error : </label>
                <div class="col-md-4">
                    <input type="number" name="Percen" onchange="calculate();" id="Percen" class="form-control" value="10" required="">
                </div>
                <div class="col-md-2">
                    <h4 style="font-weight: bold">( USD )</h4>
                </div>
            </div>
        </div>
        <div role="tabpanel" style="padding-top: 10px;" class="tab-pane form-horizontal col-md-12" id="tab_6">
            <div class="form-group">
                <label class="control-label col-md-4">ชื่อ EA</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" class="form-control" id="action_submit" name="action_submit" id="action_submit" required="" value="fxcodegeneratedea-<?= rand(111, 999) ?>" >
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4 text-danger">จำนวนเงินที่ต้องใช้</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" class="form-control text-danger" id="warn_money" required="" value="" readonly="" >
                </div>
                <div class="col-md-2">
                    <h4 style="font-weight: bold">( USD )</h4>
                </div>
            </div>
            <!--            <div class="form-group ">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <label for="chk" class="control-label"><input name="chk" type="checkbox" required="" class="checkbox" value="2">ยอมรับความเสี่ยง</label>
                            </div>
                        </div>-->
            <div class="form-group text-center">
                <button class="btn btn-success" onclick="chkStoploss();
                        submit_ner();" type="submit">ตกลง</button>
            </div>
        </div>
    </form>
</div>
<?php require './footer.php'; ?>



<script>
    $(function () {
        $.ajaxSetup({async: false});
        calculate();
    });
    function submit_ner() {
        $.post('form_submit.php', $('#form_submit').serialize(), function (x) {
            var to_redirect = x.split('|');
            openInNewTab('http://www.fxcodegeneratedea.com/' + to_redirect[0]);
        });
    }

    var num_tab = 4;
    var flag = [0, 0, 0, 0];
    var idc_name_array = ['none.php', 'adx_1.php', 'atr.php', 'bb.php', 'cci.php', 'envelopes.php', 'ichimoku.php', 'ma.php', 'macd.php'
                , 'momentum.php', 'osma.php', 'rsi.php', 'sar.php', 'stddev.php', 'sto.php', 'close.php', 'open.php', 'high.php', 'low.php', 'value.php'];
    function calculate() {
        var Lots = parseFloat($('#Lots').val());
        var StopLoss = parseFloat($('#StopLoss').val());
        var Percen = parseFloat($('#Percen').val());
        console.log(parseFloat(Lots * StopLoss * 4));
        console.log(parseFloat(Lots * StopLoss * 4 * Percen / 100.0));
        $('#warn_money').val(parseFloat(Lots * StopLoss * 4) + parseFloat(Lots * StopLoss * 4 * Percen / 100.0));
    }
    function chkStoploss() {
        if ($('#StopLoss').val() == '') {
            alert('please enter StopLoss !! ');
        }
    }

    function openInNewTab(url) {
        var win = window.open(url, '_blank');
        win.focus();
    }
    function add(tab_i) {
        var t_idx = tab_i.split('_');
        t_idx = t_idx[1];
        if (parseInt($('#tab_' + t_idx + '_idc_n').val()) <= 9)
            $.post('./indicator/a_option.php', {param1: 0}, function (result) {
                $('#' + tab_i).append(result);
                // logic 
                $('#logic__').attr('name', function () {
                    return tab_i + '_idc_' + parseInt($('#tab_' + t_idx + '_idc_n').val()) + '_logic';
                });
                $('#logic__').attr('id', function () {
                    return tab_i + '_idc_' + parseInt($('#tab_' + t_idx + '_idc_n').val()) + '_logic';
                });
                // ตัว remove
                $('#tab_i_idc_j').attr('id', function () {
                    return tab_i + '_idc_' + parseInt($('#tab_' + t_idx + '_idc_n').val());
                });
                // ฝั่งซ้าย
                $('#first').attr('name', function () {
                    return tab_i + '_idc_left_' + parseInt($('#tab_' + t_idx + '_idc_n').val());
                });
                $('#first').attr('id', function () {
                    return tab_i + '_idc_left_' + parseInt($('#tab_' + t_idx + '_idc_n').val());
                });
                // ตรงกลาง
                $('#operator').attr('name', function () {
                    return tab_i + '_idc_middle_' + parseInt($('#tab_' + t_idx + '_idc_n').val());
                });
                $('#operator').attr('id', function () {
                    return tab_i + '_idc_middle_' + parseInt($('#tab_' + t_idx + '_idc_n').val());
                });
                // ฝั่งขวา
                $('#last').attr('name', function () {
                    return tab_i + '_idc_right_' + parseInt($('#tab_' + t_idx + '_idc_n').val());
                });
                $('#last').attr('id', function () {
                    return tab_i + '_idc_right_' + parseInt($('#tab_' + t_idx + '_idc_n').val());
                });
                // body
                $('#body_first').attr('name', function () {
                    return tab_i + '_idc_' + parseInt($('#tab_' + t_idx + '_idc_n').val()) + '_body_first';
                });
                $('#body_first').attr('id', function () {
                    return tab_i + '_idc_' + parseInt($('#tab_' + t_idx + '_idc_n').val()) + '_body_first';
                });
                $('#body_last').attr('name', function () {
                    return tab_i + '_idc_' + parseInt($('#tab_' + t_idx + '_idc_n').val()) + '_body_last';
                });
                $('#body_last').attr('id', function () {
                    return tab_i + '_idc_' + parseInt($('#tab_' + t_idx + '_idc_n').val()) + '_body_last';
                });
                // num_element
                $('#num_ele_first').attr('name', function () {
                    return tab_i + '_idc_' + parseInt($('#tab_' + t_idx + '_idc_n').val()) + '_num_ele_first';
                });
                $('#num_ele_first').attr('id', function () {
                    return tab_i + '_idc_' + parseInt($('#tab_' + t_idx + '_idc_n').val()) + '_num_ele_first';
                });
                $('#num_ele_last').attr('name', function () {
                    return tab_i + '_idc_' + parseInt($('#tab_' + t_idx + '_idc_n').val()) + '_num_ele_last';
                });
                $('#num_ele_last').attr('id', function () {
                    return tab_i + '_idc_' + parseInt($('#tab_' + t_idx + '_idc_n').val()) + '_num_ele_last';
                });
                $('#tab_' + t_idx + '_idc_n').val(parseInt($('#tab_' + t_idx + '_idc_n').val()) + parseInt(1));
                // delete
                $('#tab_' + t_idx + ' > div').each(function (index) {
//                        console.log(index);
                    if (index === 1) {
                        var tempper = $(this).attr('id').split('_');
                        $('#tab_' + tempper[1] + '_idc_' + tempper[3] + '_logic').remove();
                    }
                });
            });
    }
    function getChild(id, sign) {
        // tab_1_idc_0_body_first
        var id_ = id.split('_');
        console.log(id_);
        if ($('#' + id).val() > 0) {
            $.post('./indicator/' + idc_name_array[$('#' + id).val()], {param1: 0}, function (result) {
                var counter = 0;
                $('#tab_' + id_[1] + '_idc_' + id_[4] + '_body_' + sign).html(result);
                $('#tab_' + id_[1] + '_idc_' + id_[4] + '_body_' + sign + ' select').each(function (index) {
                    //                            console.log('select -> ' + index + ": " + $(this).attr('name'));
                    //                            console.log($("select[name='" + $(this).attr('name') + "']").val());

                    $("select[name='" + $(this).attr('name') + "']").attr('name', function () {
                        counter += 1;
                        return 'tab_' + id_[1] + '_idc_' + id_[4] + '_sign_' + sign + '_element_' + counter;
                    });
                });
                $('#tab_' + id_[1] + '_idc_' + id_[4] + '_body_' + sign + ' input').each(function (index) {
                    //                            console.log('input -> ' + index + ": " + $(this).attr('name'));
                    $("input[name='" + $(this).attr('name') + "']").attr('name', function () {
                        counter += 1;
                        return 'tab_' + id_[1] + '_idc_' + id_[4] + '_sign_' + sign + '_element_' + counter;
                    });
                });
                $('#tab_' + id_[1] + '_idc_' + id_[4] + '_num_ele_' + sign).val(counter);
            });
        }

    }
    function removeIdc(id) {
        var temp = id.split('_');
        $('#' + id).remove();
        $('#tab_' + temp[1] + ' > div').each(function (index) {
            console.log(index);
            if (index === 1) {
                var tempper = $(this).attr('id').split('_');
                $('#tab_' + tempper[1] + '_idc_' + tempper[3] + '_logic').remove();
            }
        });
    }
</script>

