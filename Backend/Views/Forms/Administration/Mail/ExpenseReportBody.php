

                  
         <!--[if mso | IE]>
         <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="1000" align="center" style="width:1000px;">
            <tr>
               <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
                  <![endif]-->
                  <div style="margin:0px auto;max-width:1000px;background:#84b3dc;">
                     <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#84b3dc;" align="center" border="0">
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
                                                         <div class="" style="cursor:auto;color:#ffffff;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:15px;line-height:22px;text-align:left;">Main Expense</div>
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
                                                               <th align="left"> Date</th>
                                                               <th align="left">Currency</th>
                                                               <th align="left">Exchange Rate</th>
                                                               <th align="left">Location</th>
                                                               <th align="left">Transportation</th>
                                                               <th align="left">Lodging</th>
                                                               <th align="left">Personal Meals</th>
                                                               <th align="left">Incidental</th>
                                                               <th align="left">  Total({{model.meta.Country.Currency}})</th>
                                                            </tr>
                                                           
                                                             {% for exp in model.mainexp %}


                                                                <tr style="text-align:left">
                                                                    <td align="left">{{exp.MainDate|date("d/m/Y") }}</td>
                                                                    <td align="left">{{exp.MainCurrency}}</td>
                                                                    <td align="left">{{exp.MainExchangeRate}}</td>
                                                                    <td align="left">{{exp.MainLocation}}</td>
                                                                    <td align="left">{{exp.MainTransportation}}</td>
                                                                    <td align="left">{{exp.MainLodging}}</td>
                                                                    <td align="left">{{exp.MainPersonalMeals}}</td>
                                                                    <td align="left">{{exp.MainIncidental}}</td>
                                                                    <td align="left">{{exp.MainTotal}}</td>
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
         <!--[if mso | IE]>
         <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="1000" align="center" style="width:1000px;">
            <tr>
               <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
                  <![endif]-->
                  <div style="margin:0px auto;max-width:1000px;background:#EF4836;">
                     <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#EF4836;" align="center" border="0">
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
                                                         <div class="" style="cursor:auto;color:#ffffff;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:15px;line-height:22px;text-align:left;">Other Business Expenses</div>
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
                                                            <tr style="border-bottom:1px solid #ecedee;text-align:left">
                                                               <th align="left">Date</th>
                                                               <th align="left">Currency</th>
                                                               <th align="left">Exchange Rate</th>
                                                               <th align="left">Entertain</th>
                                                               <th align="left">Gifts</th>
                                                               <th align="left">Description</th>
                                                               <th align="left">otal({{model.meta.Country.Currency}})</th>
                                                            </tr>
                                                            
                                                               {% for exp in model.otherexp %}

                                                            <tr style="text-align:left">
                                                                <td align="left">{{exp.OtherDate|date("d/m/Y")}}</td>
                                                                <td align="left">{{exp.OtherCurrency}}</td>
                                                                <td align="left">{{exp.OtherExchangeRate}}</td>
                                                                <td align="left">{{exp.OtherEntertain}}</td>
                                                                <td align="left">{{exp.OtherGifts}}</td>
                                                                <td align="left">{{exp.OtherDescription}}</td>
                                                                <td align="left">{{exp.OtherTotal}}</td>
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
         <!--[if mso | IE]>
         <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="1000" align="center" style="width:1000px;">
            <tr>
               <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
                  <![endif]-->
                  <div style="margin:0px auto;max-width:1000px;background:#e9edef;">
                     <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#e9edef;" align="center" border="0">
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
                                                         <div class="" style="cursor:auto;color:#80898e;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:15px;line-height:22px;text-align:left;">Automotive Expense</div>
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
                                                               <th align="left">Date</th>
                                                               <th align="left">Currency</th>
                                                               <th align="left">Exchange Rate</th>
                                                               <th align="left">Fuel Cost</th>
                                                               <th align="left">Oil Cost</th>
                                                               <th align="left">Wash</th>
                                                               <th align="left">Tires</th>
                                                               <th align="left">Repair/Maintain</th>
                                                               <th align="left">Park</th>
                                                               <th align="left">Tolls</th>
                                                               <th align="left">Misc</th>
                                                               <th align="left">Total({{model.meta.Country.Currency}})</th>
                                                            </tr>
                                                            
                                                              {% for exp in model.autoexp %}
                                                            <tr style="text-align:left">
                                                                <td align="left">{{exp.AutoDate|date("d/m/Y")}}</td>
                                                                <td align="left">{{exp.AutoCurrency}}</td>
                                                                <td align="left">{{exp.AutoExchangeRate}}</td>
                                                                <td align="left">{{exp.AutoFuelCost}}</td>
                                                                <td align="left">{{exp.AutoOilCost}}</td>
                                                                <td align="left">{{exp.AutoWash}}</td>
                                                                <td align="left">{{exp.AutoTires}}</td>
                                                                <td align="left">{{exp.AutoRepairs}}</td>
                                                                <td align="left">{{exp.AutoPark}}</td>
                                                                <td align="left">{{exp.AutoTolls}}</td>
                                                                <td align="left">{{exp.AutoMisc}}</td>
                                                                <td align="left">{{exp.AutoTotal}}</td>
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
         <!--[if mso | IE]>
         <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="1000" align="center" style="width:1000px;">
            <tr>
               <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
                  <![endif]-->
                  <div style="margin:0px auto;max-width:1000px;background:#d3ca90;">
                     <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#d3ca90;" align="center" border="0">
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
                                                         <div class="" style="cursor:auto;color:#ffffff;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:15px;line-height:22px;text-align:left;">Check Advances and Company Paid Charges</div>
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
                                                               <th align="left">Date</th>
                                                               <th align="left">Currency</th>
                                                               <th align="left">Exchange Rate</th>
                                                               <th align="left">Description</th>
                                                               <th align="left">Amount</th>
                                                               <th align="left">Total ({{model.meta.Country.Currency}})</th>
                                                            </tr>
                                                            
                                                             {% for exp in model.checks %}
                                                            <tr style="text-align:left">
                                                                <td align="left">{{exp.CheckDate|date("d/m/Y")}}</td>
                                                                <td align="left">{{exp.CheckCurrency}}</td>
                                                                <td align="left">{{exp.CheckExchangeRate}}</td>
                                                                <td align="left">{{exp.CheckDescription}}</td>
                                                                <td align="left">{{exp.CheckAmount}}</td>
                                                                <td align="left">{{exp.CheckTotal}}</td>
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
         <!--[if mso | IE]>
         <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="1000" align="center" style="width:1000px;">
            <tr>
               <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
                  <![endif]-->
                  <div style="margin:0px auto;max-width:1000px;background:#d3ca90;">
                     <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#d3ca90;" align="center" border="0">
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
                                                         <div class="" style="cursor:auto;color:#ffffff;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:15px;line-height:22px;text-align:left;">Summary</div>
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
                                       <td style="vertical-align:top;width:1000px;">
                                          <![endif]-->
                                          <div class="mj-column-per-100" style="vertical-align:top;display:inline-block;font-size:0px;line-height:0px;text-align:left;width:100%;">
                                             <!--[if mso | IE]>
                                             <table  role="presentation" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                   <td style="vertical-align:middle;width:500px;">
                                                      <![endif]-->
                                                      <div class="mj-column-per-50 outlook-group-fix" style="vertical-align:middle;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:50%;">
                                                         <table role="presentation" cellpadding="0" cellspacing="0" style="vertical-align:middle;" width="100%" border="0">
                                                            <tbody>
                                                               <tr>
                                                                  <td style="word-break:break-word;font-size:0px;padding:0px;" align="left">
                                                                     <div class="" style="cursor:auto;color:#000000;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:15px;line-height:22px;text-align:left;"> Total Gross expense ({{model.meta.Country.Currency}}) : {{model.mainform.GrossTotal}}</div>
                                                                  </td>
                                                               </tr>
                                                            </tbody>
                                                         </table>
                                                      </div>
                                                      <!--[if mso | IE]>
                                                   </td>
                                                   <td style="vertical-align:middle;width:500px;">
                                                      <![endif]-->
                                                      <div class="mj-column-per-50 outlook-group-fix" style="vertical-align:middle;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:50%;">
                                                         <table role="presentation" cellpadding="0" cellspacing="0" style="vertical-align:middle;" width="100%" border="0">
                                                            <tbody>
                                                               <tr>
                                                                  <td style="word-break:break-word;font-size:0px;padding:0px;" align="left">
                                                                     <div class="" style="cursor:auto;color:#000000;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:15px;line-height:22px;text-align:left;">Total Check Advances ({{model.meta.Country.Currency}}) : {{model.mainform.CheckAdvances}}</div>
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
                              <td style="text-align:left;vertical-align:top;direction:ltr;font-size:0px;padding:20px 0px;padding-top:10px;">
                                 <!--[if mso | IE]>
                                 <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                       <td style="vertical-align:top;width:1000px;">
                                          <![endif]-->
                                          <div class="mj-column-per-100" style="vertical-align:top;display:inline-block;font-size:0px;line-height:0px;text-align:left;width:100%;">
                                             <!--[if mso | IE]>
                                             <table  role="presentation" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                   <td style="vertical-align:middle;width:500px;">
                                                      <![endif]-->
                                                      <div class="mj-column-per-50 outlook-group-fix" style="vertical-align:middle;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:50%;">
                                                         <table role="presentation" cellpadding="0" cellspacing="0" style="vertical-align:middle;" width="100%" border="0">
                                                            <tbody>
                                                               <tr>
                                                                  <td style="word-break:break-word;font-size:0px;padding:0px;" align="left">
                                                                     <div class="" style="cursor:auto;color:#000000;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:15px;line-height:22px;text-align:left;">Net Total ({{model.meta.Country.Currency}}) : {{model.mainform.NetTotal}}</div>
                                                                  </td>
                                                               </tr>
                                                            </tbody>
                                                         </table>
                                                      </div>
                                                      <!--[if mso | IE]>
                                                   </td>
                                                   <td style="vertical-align:middle;width:500px;">
                                                      <![endif]-->
                                                      <div class="mj-column-per-50 outlook-group-fix" style="vertical-align:middle;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:50%;">
                                                         <table role="presentation" cellpadding="0" cellspacing="0" style="vertical-align:middle;" width="100%" border="0">
                                                            <tbody>
                                                               <tr>
                                                                  <td style="word-break:break-word;font-size:0px;padding:0px;" align="left">
                                                                      <div class="" style="cursor:auto;color:#000000;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:15px;line-height:22px;text-align:left;">&nbsp;</div>
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