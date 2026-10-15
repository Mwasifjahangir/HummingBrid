{% if saperror|length > 0  %}
<div class="col-sm-12">
    <div class="portlet box yellow-mint">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>SAP Messages (Latest)
            </div>

        </div>

        <div class="portlet-body">

           
                <table class="table">
                    <thead>
                    <tr>
                        <th>Type</th>
                        <th>ID</th>
                        <th>Number</th>
                        <th>Message</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>

                        {% for msg in saperror %}
                        {% if  msg.TYPE|trim == "E" %}
                    <tr class="danger">
                        {% else %}
                          <tr>
                     {% endif %}
                  
                        <td>{{ msg.TYPE|trim}}</td>
                        <td>{{ msg.ID|trim}}</td>
                        <td >{{ msg.NUMBER|trim}}</td>
                        <td >{{ msg.MESSAGE|trim}}</td>

                    </tr>
                    {% endfor %}
                    </tr>
                    </tbody>
                </table>

        </div>
    </div>
</div>
{%endif%}