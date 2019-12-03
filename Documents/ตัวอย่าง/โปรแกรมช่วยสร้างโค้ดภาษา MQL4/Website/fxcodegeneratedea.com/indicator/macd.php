<table>
    <tbody><tr>
            <td>
                <span>TimeFrame</span>
            </td>
            <td>
                <select name="TimeFrame">
                    <option selected="selected" value="0">Current</option>
                    <option value="PERIOD_M1" selected="">PERIOD_M1</option>
                    <option value="PERIOD_M5">PERIOD_M5</option>
                    <option value="PERIOD_M15">PERIOD_M15</option>
                    <option value="PERIOD_M30">PERIOD_M30</option>
                    <option value="PERIOD_H1">PERIOD_H1</option>
                    <option value="PERIOD_H4">PERIOD_H4</option>
                    <option value="PERIOD_D1">PERIOD_D1</option>
                    <option value="PERIOD_W1">PERIOD_W1</option>
                    <option value="PERIOD_MN1">PERIOD_MN1</option>
                </select>
            </td>
        </tr> 
        <tr>
            <td>
                <span>Fast Period</span>
            </td>
            <td>
                <input name="FastPeriod" type="number" value="12">
                &nbsp;
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <span>Slow Period</span>
            </td>
            <td>
                <input name="SlowPeriod" type="number" value="26">
                &nbsp;
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <span>Signal Period</span>
            </td>
            <td>
                <input name="SignalPeriod" type="number" value="9">
                &nbsp;
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <span>Price</span>
            </td>
            <td>
                <select name="Price">
                    <option selected="selected" value="--Select--">--Select--</option>
                    <option value="PRICE_CLOSE" selected="">PRICE_CLOSE</option>
                    <option value="PRICE_OPEN">PRICE_OPEN</option>
                    <option value="PRICE_HIGH">PRICE_HIGH</option>
                    <option value="PRICE_LOW">PRICE_LOW</option>
                    <option value="PRICE_MEDIAN">PRICE_MEDIAN</option>
                    <option value="PRICE_TYPICAL">PRICE_TYPICAL</option>
                    <option value="PRICE_WEIGHTED">PRICE_WEIGHTED</option>
                </select>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <span>Mode</span>
            </td>
            <td>
                <select name="Mode">
                    <option selected="selected" value="--Select--">--Select--</option>
                    <option value="MODE_MAIN" selected="">MODE_MAIN</option>
                    <option value="MODE_SIGNAL">MODE_SIGNAL</option>
                </select>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <span>Shift</span>
            </td>
            <td>
                <input name="Shift" type="number" value="1">
                &nbsp;
                &nbsp;
            </td>
        </tr>
    </tbody>
</table>