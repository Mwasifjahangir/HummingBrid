
        {% if HideWFSummary == true %}
         <!--[if mso | IE]>
         <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="1000" align="center" style="width:1000px;">
            <tr>
               <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
                  <![endif]-->
                  <div style="margin:0px auto;max-width:1000px;background:#ffffff;">
                     <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#ffffff;" align="center" border="0">
                        <tbody>
                           <tr>
                              <td style="text-align:left;vertical-align:top;direction:ltr;font-size:0px;padding:20px 0px;">
                                 <!--[if mso | IE]>
                                 <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                       <td style="vertical-align:undefined;width:1000px;">
                                          <![endif]-->
                                          <div class="" style="cursor:auto;color:#000000;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:15px;line-height:18px;text-align:left;">
                                                   Dear {{model.User.Username}},<br>
                                             {{model.WorkFlowHTML|raw}}
                                             <br>
                                                  
                                          </div>
                                          <!--[if mso | IE]>
                                       </td>
                                    </tr>
                                 </table>
                                 <![endif]-->
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
                  <!--[if mso | IE]>
               </td>
            </tr>
         </table>
         <![endif]-->
        {% endif %}
         {{model.FormHeader|raw}}
         {{model.FormHTML|raw}}
         <!--[if mso | IE]>
         <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="1000" align="center" style="width:1000px;">
            <tr>
               <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
                  <![endif]-->
                  <div style="margin:0px auto;max-width:1000px;background:#8877a9;">
                     <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#8877a9;" align="center" border="0">
                        <tbody>
                           <tr>
                              <td style="text-align:left;vertical-align:top;direction:ltr;font-size:0px;padding:0px;">
                                 <!--[if mso | IE]>
                                 <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                       <td style="vertical-align:middle;width:1000px;">
                                          <![endif]-->
                                          <div class="mj-column-per-100 outlook-group-fix" style="vertical-align:middle;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;">
                                             <table role="presentation" cellpadding="0" cellspacing="0" style="vertical-align:middle;" width="100%" border="0">
                                                <tbody>
                                                   <tr>
                                                      <td style="word-break:break-word;font-size:0px;padding:0px;" align="left">
                                                         <div class="" style="cursor:auto;color:#ffffff;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:15px;line-height:22px;text-align:left;">Workflow</div>
                                                      </td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                          </div>
                                          <!--[if mso | IE]>
                                       </td>
                                    </tr>
                                 </table>
                                 <![endif]-->
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
                  <!--[if mso | IE]>
               </td>
            </tr>
         </table>
         <![endif]-->
         <!--[if mso | IE]>
         <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="1000" align="center" style="width:1000px;">
            <tr>
               <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
                  <![endif]-->
                  <div style="margin:0px auto;max-width:1000px;background:#ffffff;">
                     <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#ffffff;" align="center" border="0">
                        <tbody>
                           <tr>
                              <td style="text-align:left;vertical-align:top;direction:ltr;font-size:0px;padding:0px;">
                                 <!--[if mso | IE]>
                                 <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                       <td style="vertical-align:middle;width:1000px;">
                                          <![endif]-->
                                          <div class="mj-column-per-100 outlook-group-fix" style="vertical-align:middle;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;">
                                             <table role="presentation" cellpadding="0" cellspacing="0" style="vertical-align:middle;" width="100%" border="0">
                                                <tbody>
                                                   <tr>
                                                      <td style="word-break:break-word;font-size:0px;padding:10px 25px;" align="left">
                                                         <table cellpadding="0" cellspacing="0" style="cellspacing:0px;color:#000;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:13px;line-height:22px;table-layout:auto;" width="100%" border="0">
                                                            <tr style="border-bottom:1px solid #ecedee;text-align:left;">
                                                               <th align="left">Approver</th>
                                                               <th align="left">Status</th>
                                                               <th align="left">Comment</th>
                                                               <th align="left">Updated On</th>
                                                            </tr>
                                                              {% for w in  model.WorkFlow %}
                                                            <tr  style="text-align:left">
                                                                <td align="left">
                                                                    {{w.DisplayName}}
                                                                </td>
                                                                <td align="left"> {{w.Status}}</td>
                                                                <td align="left">{{w.UpdatedOn|date("Y-m-d")}}</td>
                                                                <td align="left">{{w.Comments|raw}}</td>

                                                            </tr>

                                                            {% endfor %}

                                                         </table>
                                                      </td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                          </div>
                                          <!--[if mso | IE]>
                                       </td>
                                    </tr>
                                 </table>
                                 <![endif]-->
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
                  <!--[if mso | IE]>
               </td>
            </tr>
         </table>
         <![endif]-->
         
