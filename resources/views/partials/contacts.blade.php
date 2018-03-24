<div class="email-phones">
    <div class="pull-left">
        <span class="address"><i class="glyphicon glyphicon-map-marker"></i> {{\Settings::get("address")}}</span>
        <span class="time"><i class="glyphicon glyphicon-time"></i> {{\Settings::get("working_time")}}</span>
    </div>
    <div class="pull-right">
            <span class="phone-link" style="margin-right: 1em;"><i class="glyphicon glyphicon-phone"></i>
                <a href="tel:{{\Settings::get("phone")}}"> {{\Settings::get("phone")}}</a>
            </span>
        <span class="email-link">
                <i class="glyphicon glyphicon-envelope"></i>
                <a href="mailto:{{\Settings::get("email")}}">{{\Settings::get("email")}}</a>
            </span>
    </div>
    <div class="clearfix"></div>
</div>