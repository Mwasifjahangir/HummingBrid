<tr>
    <td align="left" valign="top" id="wrappercell"><br>
        <strong>Total Value</strong> ({{model.meta.Country.Currency}}): {{model.mainform.PRTotal}}<br>

        <table cellpadding="0" cellspacing="0"  width="100%" style="border:1px #00438a dashed;text-align: left"  >
            <thead>
                <tr>
                  
                    <th style="text-align: left">Description</th>
                    <th style="text-align: left">Currency</th>
                    <th style="text-align: left">Exchange Rate</th>
                    <th style="text-align: left">Units</th>
                    <th style="text-align: left">Unit Cost</th>
                    <th style="text-align: left">Line Total</th>
                </tr>
            </thead>
            <tbody>
                {% for form in model.prlineitems %}
                <tr>
                    <td style="text-align: left">{{ form.Description}}</td>
                    <td style="text-align: left">{{ form.Currency}}</td>
                    <td style="text-align: left">{{ form.ExchangeRate}}</td>
                    <td style="text-align: left">{{ form.Units}}</td>
                    <td style="text-align: left">{{ form.UnitCost}}</td>
                    <td style="text-align: left">{{ form.LineTotal}}</td>
                </tr>
                {% endfor %}
            </tbody>
        </table>
    </td>
</tr>
<tr>