{% if messages.GetErrors|length > 0  %}

{% for e in  messages.GetErrors %}

<div class="alert alert-danger display-hide" style="display: block;">
    <button data-close="alert" class="close"></button>
    <span>{{e}}</span>
</div>
{% endfor %}

{% endif %}


{% if messages.GetMessages|length > 0  %}

{% for m in  messages.GetMessages %}
<div class="alert alert-success  display-hide" style="display: block;">
    <button data-close="alert" class="close"></button>
    <span><strong>{{m}}</strong></span>
</div>

{% endfor %}

{% endif %}

