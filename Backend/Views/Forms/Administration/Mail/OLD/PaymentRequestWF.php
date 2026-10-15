<tr>
    <td align="left" valign="top" id="wrappercell">
        Dear {{user.DisplayName}},<br>
        Form <a href="http://portal.ahmedk.me/index.php?module=PaymentRequest&method=ViewForm&formid={{form.FRMPaymentRequestID}}">{{form.Code}}</a> Requires your review and action<br>
        One Click APPROVE: <a href="http://portal.ahmedk.me/rpc.php?module=PaymentRequest&method=QuickApprove&d={{qa}}">Click Here</a><br>
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