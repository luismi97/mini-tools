{{--
    Loads a heavy third-party script on the first interaction or 3.5 s after load, whichever
    comes first. Calls made before that wait in the script's own queue (dataLayer, adsbygoogle).
--}}
@props(['src', 'crossorigin' => null])
<script>
    (function () {
        var events = ['pointerdown', 'keydown', 'scroll'], loaded = false;
        function load() {
            if (loaded) return;
            loaded = true;
            events.forEach(function (name) { removeEventListener(name, load); });
            var script = document.createElement('script');
            script.async = true;
            script.src = '{{ $src }}';
            @if ($crossorigin) script.crossOrigin = '{{ $crossorigin }}'; @endif
            document.head.appendChild(script);
        }
        events.forEach(function (name) { addEventListener(name, load, { passive: true }); });
        addEventListener('load', function () { setTimeout(load, 3500); });
    })();
</script>
