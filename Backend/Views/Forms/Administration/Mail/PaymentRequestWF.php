<tr>
    <td align="left" valign="top" id="wrappercell">
        Dear {{user.DisplayName}},<br><br>
        Payment Request Form <a href="http://portal.ahmedk.me/index.php?module=PaymentRequest&method=ViewForm&formid={{form.FRMPaymentRequestID}}">{{form.Code}}</a> requires your review and action.<br>
        One Click APPROVE: <a href="http://portal.ahmedk.me/rpc.php?module=PaymentRequest&method=QuickApprove&d={{qa}}">Click Here</a><br><br>
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