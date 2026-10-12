@php $site = config('site.name'); $email = config('site.contact_email'); @endphp
<x-page-layout :seo="$seo" :title="$title" updated="October 6, 2026">
    <p>This Privacy Policy explains what information {{ $site }} ("we", "us") collects when you use this website, and how it is used. We keep data collection to the minimum needed to run and improve the site.</p>

    <h2>Files and text you use with our tools</h2>
    <p>Our tools process your files and text <strong>locally in your browser</strong>. Images, PDFs, documents, passwords and any text you paste are not uploaded to, stored on or seen by our servers. When you close or reload the page, that data is gone.</p>

    <h2>Information collected automatically</h2>
    <p>Like most websites, our hosting provider may record standard server logs (IP address, browser type, pages requested and time of the request) for security and to keep the service running. These logs are kept for a limited time and are not used to identify you.</p>

    <h2>Analytics</h2>
    <p>We may use Google Analytics to understand how visitors use the site, for example which tools are popular. Analytics receives anonymous usage events such as "a tool was used" or "a file was downloaded", together with technical details like the number of files or the output format. <strong>We never send the content of your files or text to analytics.</strong> Google Analytics uses cookies; you can opt out with the <a href="https://tools.google.com/dlpage/gaoptout" rel="noopener" target="_blank">Google Analytics Opt-out Browser Add-on</a>.</p>

    <h2>Advertising and cookies</h2>
    <p>We may display ads served by Google AdSense. Third-party vendors, including Google, use cookies to serve ads based on your previous visits to this and other websites. Google's use of advertising cookies enables it and its partners to serve ads based on your visits to this site and/or other sites on the Internet.</p>
    <ul>
        <li>You can opt out of personalized advertising in <a href="https://adssettings.google.com" rel="noopener" target="_blank">Google Ads Settings</a>.</li>
        <li>You can opt out of some third-party vendors' use of cookies for personalized advertising at <a href="https://www.aboutads.info/choices/" rel="noopener" target="_blank">www.aboutads.info</a>.</li>
        <li>Learn more in <a href="https://policies.google.com/technologies/partner-sites" rel="noopener" target="_blank">How Google uses information from sites that use its services</a>.</li>
    </ul>
    <p>Where required by law (for example in the European Economic Area and the United Kingdom), we ask for your consent before setting non-essential cookies.</p>

    <h2>Accounts</h2>
    <p>{{ $site }} does not require an account, so we do not collect names, email addresses or passwords to use the tools.</p>

    <h2>Children</h2>
    <p>This website is not directed at children under 13, and we do not knowingly collect personal information from them.</p>

    <h2>Your rights</h2>
    <p>Depending on where you live, you may have the right to access, correct or delete personal data we hold about you. Because we do not store the content you process with our tools, there is usually nothing to delete. To make a request, contact us at <a href="mailto:{{ $email }}">{{ $email }}</a>.</p>

    <h2>Changes to this policy</h2>
    <p>We may update this policy from time to time. The date at the top of this page shows when it was last changed.</p>

    <h2>Contact</h2>
    <p>Questions about privacy? Email <a href="mailto:{{ $email }}">{{ $email }}</a>.</p>
</x-page-layout>
