@if (\Settings::get("yandex_analytics"))
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function () {
                try {
                    w.yaCounter{{\Settings::get("yandex_analytics")}} = new Ya.Metrika({
                        id: {{\Settings::get("yandex_analytics")}},
                        clickmap: true,
                        trackLinks: true,
                        accurateTrackBounce: true,
                        webvisor: true,
                        trackHash: true
                    });
                } catch (e) {
                }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () {
                    n.parentNode.insertBefore(s, n);
                };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else {
                f();
            }
        })(document, window, "yandex_metrika_callbacks");

        window.reachGoal = function(event) {
            yaCounter{{\Settings::get("yandex_analytics")}}.reachGoal(event);
        }
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/{{\Settings::get("yandex_analytics")}}" style="position:absolute; left:-9999px;" alt=""/></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
@endif