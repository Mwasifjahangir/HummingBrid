<tr>
    <td align="left" valign="top" id="wrappercell"><br>
        <strong>Total Value</strong> (USD):{{mainform.USDTotal}}<br>
        <strong>Raised By:</strong>{{user.DisplayName}}<br><br>
        <table cellpadding="0" cellspacing="0"  width="100%" style="border:1px #00438a dashed;text-align: left"  >
            <thead>
                <tr>
                    <th style="text-align: left">Date</th>
                    <th style="text-align: left">Vendor</th>
                    <th style="text-align: left">Item</th>
                    <th style="text-align: left">Quantity</th>
                    <th style="text-align: left">Cost/Unit</th>
                    <th style="text-align: left">Currency</th>
                    <th style="text-align: left">Amount</th>
                </tr>
            </thead>
            <tbody>
                {% for form in formlist %}
                <tr>
                    <td style="text-align: left">{{ form.ItemDate|date("m/d/Y") }}</td>
                    <td style="text-align: left">{{ form.Vendor}}</td>
                    <td style="text-align: left">{{ form.Item}}</td>
                    <td style="text-align: left">{{ form.Quantity}}</td>
                    <td style="text-align: left">{{ form.UnitCost}}</td>
                    <td style="text-align: left">{{ form.Currency}}</td>
                    <td style="text-align: left">{{ form.Amount}}</td>
                </tr>
                {% endfor %}
            </tbody>
        </table>
    </td>
</tr>
<tr>
    <td align="center" valign="top" id="wrappercell">
    </td>
</tr>
<tr>
    <td align="left" valign="top" id="wrappercell">
        <h3>Approvers</h3>
        <table cellpadding="0" cellspacing="0"  width="100%" style="text-align: left">
            <thead>
                <tr>
                    <th style="text-align: left">Approver</th>
                    <th style="text-align: left">Status</th>
                    <th style="text-align: left">Comment</th>
                </tr>
            </thead>
            <tbody>
                {% for app in workflow %}
                <tr>
                    <td style="text-align: left">{{ app.DisplayName }}</td>
                    <td style="text-align: left">{{ app.Status }}</td>
                    <td style="text-align: left">{{ app.Comments }}</td>
                </tr>
                {% endfor %}
            </tbody>
        </table>
    </td>
</tr>