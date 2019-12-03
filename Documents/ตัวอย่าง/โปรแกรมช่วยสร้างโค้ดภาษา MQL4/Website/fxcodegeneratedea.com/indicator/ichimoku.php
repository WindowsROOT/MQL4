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
                <span>Tenkan Sen</span>
            </td>
            <td>
                <input name="TenkanSen" type="number" value="9">
                &nbsp;
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <span>Kijun Sen</span>
            </td>
            <td>
                <input name="KijunSen" type="number" value="26">
                &nbsp;
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <span>Senkou Span B</span>
            </td>
            <td>
                <input name="SenkouSpanB" type="number" value="52">
                &nbsp;
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
                    <option value="MODE_TENKANSEN" selected="">MODE_TENKANSEN</option>
                    <option value="MODE_KIJUNSEN">MODE_KIJUNSEN</option>
                    <option value="MODE_SENKOUSPANA">MODE_SENKOUSPANA</option>
                    <option value="MODE_SENKOUSPANB">MODE_SENKOUSPANB</option>
                    <option value="MODE_CHIKOUSPAN">MODE_CHIKOUSPAN</option>
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