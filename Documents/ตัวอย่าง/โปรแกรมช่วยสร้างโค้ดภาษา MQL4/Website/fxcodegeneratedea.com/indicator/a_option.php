<?php 
header("Access-Control-Allow-Origin: *");
?>
<style>
    .border-ner {

    }
</style>

<div class="form-group" id="tab_i_idc_j">
    <div class="col-md-1">
        <div class="form-group">
            <div class="col-md-12">
                <select name="logic__" class="form-control" id="logic__" style="width: 87px;">
                    <option value="and">AND</option>
                    <option value="or">OR</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-4" id="body_head">
        <div class="form-group">
            <div class="col-md-12">
                <select name="first__" class="form-control" id="first" onchange="getChild(this.id, 'first');" required="">
                    <option value="">--Select--</option>
                    <option value="1">ADX : Average Directional Movement Index</option>
                    <option value="2">ATR : Average True Range</option>
                    <option value="3">BB : Bollinger Band</option>
                    <option value="4">CCI : Commodity Channel Index</option>
                    <option value="5">Envelopes</option>
                    <option value="6">Ichimoku</option>
                    <option value="7">MA : Moving Average</option>
                    <option value="8">MACD : Moving Averages Convergence/Divergence</option>
                    <option value="9">Momentum</option>
                    <option value="10">OsMA : Moving Average of Oscillator</option>
                    <option value="11">RSI : Relative Strength Index</option>
                    <option value="12">SAR : Parabolic Stop and Reverse</option>
                    <option value="13">StdDev : Standard Deviation</option>
                    <option value="14">STO : Stochastic oscillator</option>
                    <option value="15">CLOSE : Close</option>
                    <option value="16">Open : Open</option>
                    <option value="17">High : High</option>
                    <option value="18">Low : Low</option>
                    <option value="19">Value</option>
                </select>
            </div>
        </div>
        <div class="border-ner"  id="body_first">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <div class="col-md-12">
                <select name="operator__" class="form-control" id="operator" >
                    <option value="more">></option>
                    <option value="more_equal_to">>=</option>
                    <option value="less"><</option>
                    <option value="less_equal_to"><=</option>
                    <option value="equal">=</option>
                </select>
            </div>
        </div>
        <input name="num_ele" id="num_ele_first" value="0" type="hidden">
        <input name="num_ele" id="num_ele_last" value="0" type="hidden">
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <div class="col-md-12">
                <select name="right__" class="form-control" id="last" onchange="getChild(this.id, 'last');" required="">
                    <option value="">--Select--</option>
                    <option value="1">ADX : Average Directional Movement Index</option>
                    <option value="2">ATR : Average True Range</option>
                    <option value="3">BB : Bollinger Band</option>
                    <option value="4">CCI : Commodity Channel Index</option>
                    <option value="5">Envelopes</option>
                    <option value="6">Ichimoku</option>
                    <option value="7">MA : Moving Average</option>
                    <option value="8">MACD : Moving Averages Convergence/Divergence</option>
                    <option value="9">Momentum</option>
                    <option value="10">OsMA : Moving Average of Oscillator</option>
                    <option value="11">RSI : Relative Strength Index</option>
                    <option value="12">SAR : Parabolic Stop and Reverse</option>
                    <option value="13">StdDev : Standard Deviation</option>
                    <option value="14">STO : Stochastic oscillator</option>
                    <option value="15">CLOSE : Close</option>
                    <option value="16">Open : Open</option>
                    <option value="17">High : High</option>
                    <option value="18">Low : Low</option>
                    <option value="19">Value</option>
                </select>
            </div>
        </div>
        <div class="border-ner" id="body_last" >

        </div>
    </div>
    <div class="col-md-1">
        <button class="btn btn-danger" onclick="removeIdc($(this).parent().parent().attr('id'))" type="button">remove</button>
    </div>

</div>