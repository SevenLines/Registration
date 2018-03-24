@if (\Settings::get("google_analytics"))
<script async src="https://www.googletagmanager.com/gtag/js?id={{\Settings::get("google_analytics")}}"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', '{{\Settings::get("google_analytics")}}');
</script>
@endif