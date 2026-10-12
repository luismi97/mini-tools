{{--
    Analytics loader. Renders nothing when disabled. GTM takes precedence over GA4.
    Events are sent from JS via track() in resources/js/lib/analytics.js.
--}}
@php
    $gtm = config('analytics.gtm_id');
    $ga = config('analytics.ga_id');
@endphp
@if (config('analytics.enabled'))
    @if ($gtm)
        <script>
            (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer',@json($gtm));
        </script>
    @elseif ($ga)
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ urlencode($ga) }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            // Consent Mode v2: denied by default where the law requires opt-in (EEA, UK, CH);
            // Google's consent banner (AdSense "Privacy & messaging") updates it. Granted elsewhere.
            gtag('consent', 'default', { ad_storage: 'denied', ad_user_data: 'denied', ad_personalization: 'denied', analytics_storage: 'denied', wait_for_update: 500, region: @json(config('analytics.consent_regions')) });
            gtag('consent', 'default', { ad_storage: 'granted', ad_user_data: 'granted', ad_personalization: 'granted', analytics_storage: 'granted' });
            gtag('js', new Date());
            gtag('config', @json($ga), { anonymize_ip: true });
        </script>
    @endif
@endif
