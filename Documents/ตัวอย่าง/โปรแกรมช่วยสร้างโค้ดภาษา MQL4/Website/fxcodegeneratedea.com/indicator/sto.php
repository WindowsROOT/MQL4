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
                <span>K Period</span>
            </td>
            <td>
                <input name="KPeriod" type="number" value="5">
                &nbsp;
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <span>D Period</span>
            </td>
            <td>
                <input name="DPeriod" type="number" value="3">
                &nbsp;
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <span>Slowing</span>
            </td>
            <td>
                <input name="Slowing" type="number" value="3">
                &nbsp;
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <span>Method</span>
            </td>
            <td>
                <select name="Method">
                    <option selected="selected" value="--Select--">--Select--</option>
                    <option value="MODE_SMA" selected="">MODE_SMA</option>
                    <option value="MODE_EMA">MODE_EMA</option>
                    <option value="MODE_SMMA">MODE_SMMA</option>
                    <option value="MODE_LWMA">MODE_LWMA</option>
                </select>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <span>Price Field</span>
            </td>
            <td>
                <select name="price_field">

                    <option value="0" selected="">Low/High</option>
                    <option value="1">close/close</option>

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