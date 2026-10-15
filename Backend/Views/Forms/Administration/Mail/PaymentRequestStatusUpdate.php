<tr>
    <td align="left" valign="top" id="wrappercell">
        Dear {{user.DisplayName}},<br><br>
        Your Payment Request Form <a href="http://portal.ahmedk.me/index.php?module=PaymentRequest&method=ViewForm&formid={{form.FRMPaymentRequestID}}">{{form.Code}}</a> was just <strong>{{status}}</strong> by {{appuser.DisplayName}}.<br><br>
        <strong>Payment Request Summary</strong>
    </td>
</tr>
{{content|raw}}
<br>
<tr>
    <td align="left" valign="top" id="wrappercell"> 
        Regards,<br>
        Del Monte Portal
    </td>
</tr>