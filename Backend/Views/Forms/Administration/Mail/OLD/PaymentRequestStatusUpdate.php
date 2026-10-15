<tr>
    <td align="left" valign="top" id="wrappercell">
        Dear {{user.DisplayName}},<br>
        Your Form <a href="http://portal.ahmedk.me/index.php?module=PaymentRequest&method=ViewForm&formid={{form.FRMPaymentRequestID}}">{{form.Code}}</a> was just <strong>{{status}}</strong> by {{appuser.DisplayName}}<br>
        Summary
    </td>
</tr>
<br>
{{content|raw}}
<br>
<tr>
    <td align="left" valign="top" id="wrappercell"> 
        <br>
        <br>
        Regards,<br>
        Delmonte Portal
    </td>
</tr>