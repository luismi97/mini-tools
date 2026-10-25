<?php

/*
| Long-form SEO copy for each tool page, keyed by slug.
| Trusted HTML (h2, h3, p, ul, li, strong, em, code). Mentions of other tool
| names are linked automatically on the page by App\Support\InternalLinker.
*/

return [
    'json-formatter' => <<<'HTML'
<h2>Why format JSON?</h2>
<p>APIs and log files often return JSON as a single long line that is almost impossible to read. Formatting adds consistent indentation and line breaks so you can see the structure, spot missing fields and debug faster. Minifying does the opposite: it removes every unnecessary space so payloads and config files are as small as possible.</p>
<h2>Common JSON errors this validator catches</h2>
<ul>
<li>Trailing commas after the last item of an object or array.</li>
<li>Single quotes instead of double quotes around strings and keys.</li>
<li>Unquoted property names and comments, which JSON does not allow.</li>
<li>Missing commas, brackets or braces.</li>
</ul>
<p>Each error is reported with its exact line and column. Need the data in a spreadsheet instead? Use JSON to CSV, or go the other way with CSV to JSON.</p>
HTML,

    'merge-pdf' => <<<'HTML'
<h2>When to merge PDF files</h2>
<p>Combining PDFs is useful when you need to send a single document: a job application with a CV and cover letter, an expense report with all its receipts, or a contract with its annexes. One file is easier to email, upload to portals that accept a single attachment, and print in the right order.</p>
<h2>Merge PDFs without uploading them</h2>
<p>Most online PDF services upload your documents to their servers. This tool combines the files directly in your browser, so confidential documents such as bank statements, medical records and contracts never leave your computer or phone.</p>
<h2>Tips</h2>
<ul>
<li>Use Split PDF first if you only need some pages from a file.</li>
<li>Have photos or scans instead of PDFs? Convert them with JPG to PDF, then merge.</li>
<li>Need images of the pages instead? Use PDF to JPG.</li>
</ul>
HTML,

    'image-compressor' => <<<'HTML'
<h2>Why compress images?</h2>
<p>Large images are the most common reason websites load slowly. Compressing them reduces file size — often by 60–80% — with no visible difference, which improves page speed, Core Web Vitals and SEO. Smaller files are also easier to email, upload to forms with size limits and store.</p>
<h2>Lossy vs. lossless compression</h2>
<p>JPG and WebP use lossy compression: they discard detail the eye barely notices, which is why the quality slider has such a big effect. PNG is lossless, so for photos saved as PNG the biggest win comes from converting them to WebP or JPG, or from reducing their dimensions with the Image Resizer.</p>
<h2>Best formats for the web</h2>
<ul>
<li><strong>WebP</strong> — the best all-round choice for websites; see JPG to WebP and PNG to WebP.</li>
<li><strong>JPG</strong> — universal support for photos.</li>
<li><strong>PNG</strong> — screenshots, logos and graphics that need sharp edges or transparency.</li>
</ul>
HTML,

    'image-resizer' => <<<'HTML'
<h2>Why resize images?</h2>
<p>Phone cameras produce photos that are 4000 pixels wide or more — far larger than any screen needs. Resizing to the size you will actually display makes images load faster, take less storage and fit the requirements of websites, marketplaces and social networks.</p>
<h2>Recommended image sizes</h2>
<ul>
<li><strong>Website hero images:</strong> 1920 px wide.</li>
<li><strong>Blog and product images:</strong> 800–1200 px wide.</li>
<li><strong>Instagram posts:</strong> 1080 × 1080 px (square) or 1080 × 1350 px (portrait).</li>
<li><strong>YouTube thumbnails:</strong> 1280 × 720 px.</li>
<li><strong>Email attachments:</strong> 1200–1600 px on the longest side.</li>
</ul>
<p>Need an exact shape rather than a smaller size? Use Crop Image to cut the photo to a specific aspect ratio, then compress it with the Image Compressor.</p>
HTML,

    'heic-to-jpg' => <<<'HTML'
<h2>Why convert HEIC to JPG?</h2>
<p>iPhones save photos in HEIC by default because it takes about half the space of JPG. The problem is compatibility: Windows apps, many websites, online forms, older Android phones and printing services still cannot open HEIC files. Converting to JPG makes your photos open everywhere.</p>
<h2>How to open HEIC files on Windows</h2>
<p>Windows needs an extra codec to open HEIC. Instead of installing anything, drop the photos here and convert them to JPG in seconds — conversion runs in your browser, so your personal photos are never uploaded.</p>
<h2>JPG or PNG?</h2>
<p>Choose <strong>JPG</strong> for photos: files are small and work everywhere. Choose <strong>PNG</strong> only if you need lossless quality for editing. After converting, you can shrink the files further with the Image Compressor or the Image Resizer.</p>
HTML,

    'pdf-to-jpg' => <<<'HTML'
<h2>Why convert a PDF to JPG?</h2>
<p>Images are easier to share than PDFs in chats and on social media, they can be inserted into presentations and documents, and they preview instantly on any device. Converting a PDF page to JPG is also the simplest way to turn a slide, a flyer or a certificate into a picture.</p>
<h2>Choosing the right resolution</h2>
<ul>
<li><strong>72 DPI</strong> — small previews and thumbnails.</li>
<li><strong>150 DPI</strong> — sharing on screens, documents and presentations.</li>
<li><strong>300 DPI</strong> — printing and zooming into small text.</li>
</ul>
<p>Only need a few pages? Extract them first with Split PDF. To go back from images to a document, use JPG to PDF.</p>
HTML,

    'jpg-to-pdf' => <<<'HTML'
<h2>Turn photos and scans into one PDF</h2>
<p>PDF is the standard format for documents you send to schools, employers, banks and government offices. Converting JPG photos of receipts, IDs, homework or signed pages into a single PDF keeps everything in order and makes the file easy to upload and print.</p>
<h2>Tips for great results</h2>
<ul>
<li>Photograph documents in good light, flat and from straight above.</li>
<li>Use Crop Image to remove backgrounds and table edges before converting.</li>
<li>Choose A4 or US Letter for documents that will be printed, and Fit to image for photo albums.</li>
<li>Combine the result with other documents using Merge PDF.</li>
</ul>
<p>Have PNG screenshots or WebP images too? Use Image to PDF, which accepts every common image format.</p>
HTML,

    'qr-generator' => <<<'HTML'
<h2>What can you do with a QR code?</h2>
<ul>
<li><strong>URL</strong> — link to a website, menu, portfolio or review page.</li>
<li><strong>Wi-Fi</strong> — let guests join your network without typing the password.</li>
<li><strong>Email and phone</strong> — start an email or a call with one scan.</li>
<li><strong>Text</strong> — share a short note, coupon code or serial number.</li>
</ul>
<h2>Tips for QR codes that always scan</h2>
<p>Keep strong contrast — a dark code on a light background — and leave a quiet margin around it. Print it at least 2 × 2 cm (0.8 × 0.8 in), and larger if it will be scanned from a distance, such as on a poster. Use a higher error correction level if the code might get scratched or partially covered.</p>
<p>The codes you create here are static and free forever: they do not expire and do not depend on our website to work.</p>
HTML,

    'password-generator' => <<<'HTML'
<h2>What makes a password strong?</h2>
<p>Strength comes mainly from <strong>length</strong> and <strong>randomness</strong>. A random 16-character password using letters, numbers and symbols has more than 100 bits of entropy — far beyond what attackers can guess. Human-made passwords such as names, dates or words with a number at the end are predictable, no matter how clever they look.</p>
<h2>Password best practices</h2>
<ul>
<li>Use a different password for every account.</li>
<li>Store passwords in a password manager instead of reusing them.</li>
<li>Turn on two-factor authentication (2FA) for email, banking and social media.</li>
<li>Change a password immediately if a service reports a data breach.</li>
</ul>
<p>Need unique identifiers rather than secrets? Try the UUID Generator.</p>
HTML,

    'percentage-calculator' => <<<'HTML'
<h2>Percentage formulas</h2>
<ul>
<li><strong>X% of Y</strong> = Y × X / 100</li>
<li><strong>X is what percent of Y</strong> = X / Y × 100</li>
<li><strong>Percentage change</strong> = (new − old) / old × 100</li>
<li><strong>Increase Y by X%</strong> = Y × (1 + X / 100)</li>
</ul>
<h2>Everyday examples</h2>
<p>Work out a 25% discount on a price, the tax on a purchase, how much your salary increased, the share of a budget spent, or the percentage of correct answers in a test. Percentage points and percentages are different: a rate going from 10% to 12% rose by 2 percentage points, which is a 20% increase.</p>
<p>For money over time, use the Compound Interest Calculator or the Loan Calculator. To split a restaurant bill, try the Tip Calculator.</p>
HTML,

    'case-converter' => <<<'HTML'
<h2>Which text case should you use?</h2>
<ul>
<li><strong>Title Case</strong> — headlines, book and article titles.</li>
<li><strong>Sentence case</strong> — body text, UI labels and most modern headings.</li>
<li><strong>UPPERCASE</strong> — short labels, acronyms and emphasis (use sparingly).</li>
<li><strong>camelCase and PascalCase</strong> — variables, functions and classes in JavaScript, Java and C#.</li>
<li><strong>snake_case and CONSTANT_CASE</strong> — Python, Ruby, SQL columns and constants.</li>
<li><strong>kebab-case</strong> — URLs, CSS classes and file names.</li>
</ul>
<p>Accidentally typed a paragraph with Caps Lock on? Paste it here and convert it to Sentence case in one click instead of retyping. To count words or characters afterwards, use the Word Counter.</p>
HTML,

    'jpg-to-webp' => <<<'HTML'
<h2>Why convert JPG to WebP?</h2>
<p>WebP images are typically 25–35% smaller than JPG at the same visual quality. Smaller images make pages load faster, improve Largest Contentful Paint (LCP) and help rankings in Google, which uses page experience as a ranking signal. All modern browsers support WebP.</p>
<h2>Using WebP on your website</h2>
<p>Most content management systems, including WordPress, accept WebP uploads. For the best results, resize images to the size they will be displayed with the Image Resizer before converting, and keep quality around 75–85%.</p>
<p>Converting graphics with transparency? Use PNG to WebP. Need to go back to a universal format? Use WebP to JPG.</p>
HTML,

    'loan-calculator' => <<<'HTML'
<h2>How loan payments work</h2>
<p>With an amortizing loan, every payment is the same amount, but the split changes over time. Early payments are mostly interest; later payments are mostly principal. The amortization schedule shows exactly how much of each payment goes to interest and how fast the balance falls.</p>
<h2>How to pay less interest</h2>
<ul>
<li><strong>Shorter term:</strong> higher payments, but much less total interest.</li>
<li><strong>Lower rate:</strong> even 1% less can save thousands on a long loan.</li>
<li><strong>Biweekly payments:</strong> 26 half-payments a year reduce interest slightly.</li>
<li><strong>Extra payments:</strong> paying more than required goes straight to principal.</li>
</ul>
<p>Saving instead of borrowing? See how money grows with the Compound Interest Calculator.</p>
HTML,

    'split-pdf' => <<<'HTML'
<h2>Why split a PDF?</h2>
<p>Large PDFs are often more than you need to share. Splitting lets you send only the relevant pages of a contract, extract a single invoice from a monthly statement, separate scanned documents, or break a big file into parts that fit email and upload limits.</p>
<h2>Page range examples</h2>
<ul>
<li><code>1-3</code> — pages 1, 2 and 3.</li>
<li><code>1, 4, 7</code> — three separate pages.</li>
<li><code>5-</code> — page 5 to the last page.</li>
<li><code>1-2, 10-12</code> — two groups of pages.</li>
</ul>
<p>To put pages from different files together, use Merge PDF. To turn pages into images, use PDF to JPG.</p>
HTML,

    'crop-image' => <<<'HTML'
<h2>Cropping for social media</h2>
<ul>
<li><strong>1:1</strong> — profile pictures and square posts.</li>
<li><strong>4:5</strong> — Instagram portrait posts, which take more space in the feed.</li>
<li><strong>9:16</strong> — Stories, Reels, TikTok and YouTube Shorts.</li>
<li><strong>16:9</strong> — YouTube thumbnails, presentations and website banners.</li>
</ul>
<h2>Composition tip: the rule of thirds</h2>
<p>The grid inside the selection divides it into thirds. Placing your subject on one of the lines or intersections usually creates a more balanced, natural-looking photo than centering it.</p>
<p>After cropping, use the Image Resizer to reach an exact pixel size, or the Image Compressor to make the file smaller.</p>
HTML,

    'compound-interest-calculator' => <<<'HTML'
<h2>The power of compound interest</h2>
<p>With compound interest you earn returns on your returns. Over long periods the growth curve bends upward: in the later years, interest earned can exceed everything you contributed. That is why starting early — even with small amounts — matters more than investing large sums later.</p>
<h2>The rule of 72</h2>
<p>A quick way to estimate how long money takes to double: divide 72 by the annual interest rate. At 6%, money doubles in about 12 years; at 9%, in about 8 years.</p>
<h2>What affects your results</h2>
<ul>
<li>The interest rate or expected return.</li>
<li>How long you stay invested.</li>
<li>How much and how often you contribute.</li>
<li>Fees, taxes and inflation, which reduce real returns.</li>
</ul>
<p>Borrowing instead? The Loan Calculator shows how interest works against you.</p>
HTML,

    'age-calculator' => <<<'HTML'
<h2>How exact age is calculated</h2>
<p>Exact age counts complete calendar years, then complete months, then the remaining days. Because months have different lengths, simply dividing the number of days by 365 gives slightly wrong results — this calculator follows the calendar instead.</p>
<h2>Uses for an age calculator</h2>
<ul>
<li>Checking eligibility for school, sports, insurance or retirement.</li>
<li>Filling in forms that ask for age in years and months.</li>
<li>Finding the time between any two dates, such as an anniversary or a project duration.</li>
<li>Counting down to the next birthday.</li>
</ul>
HTML,

    'base64-encoder' => <<<'HTML'
<h2>What is Base64 used for?</h2>
<ul>
<li>Embedding small images in HTML or CSS as data URIs.</li>
<li>Sending binary attachments in email (MIME).</li>
<li>Storing binary data in JSON, XML or environment variables.</li>
<li>HTTP Basic authentication headers and JSON Web Tokens.</li>
</ul>
<h2>Base64 is not encryption</h2>
<p>Base64 only changes how data is represented — anyone can decode it instantly. Never use it to hide passwords or secrets. To create strong secrets, use the Password Generator; to inspect tokens that use Base64URL, use the JWT Decoder.</p>
HTML,

    'uuid-generator' => <<<'HTML'
<h2>When to use UUIDs</h2>
<p>UUIDs are ideal when IDs must be created in many places without a central counter: distributed databases, offline-first apps, message queues, file names and public resource IDs that should not reveal how many records exist.</p>
<h2>UUID versions at a glance</h2>
<ul>
<li><strong>v4</strong> — 122 random bits; the most widely supported.</li>
<li><strong>v7</strong> — starts with a Unix timestamp, so IDs sort by creation time and keep database indexes efficient.</li>
<li><strong>v1</strong> — time and machine based; largely replaced by v7.</li>
</ul>
<p>Need random secrets instead of identifiers? Use the Password Generator.</p>
HTML,

    'json-to-csv' => <<<'HTML'
<h2>Open JSON data in Excel or Google Sheets</h2>
<p>APIs and databases export JSON, but spreadsheets work with rows and columns. Converting JSON to CSV lets you sort, filter, chart and share the data with people who do not work with code.</p>
<h2>How the conversion handles your data</h2>
<ul>
<li>Each object in the array becomes a row.</li>
<li>Every key found in any object becomes a column.</li>
<li>Nested objects are flattened, for example <code>address.city</code>.</li>
<li>Values that could be interpreted as spreadsheet formulas are escaped for safety.</li>
</ul>
<p>Invalid JSON? Fix it first with the JSON Formatter. Need to go back? Use CSV to JSON.</p>
HTML,

    'csv-to-json' => <<<'HTML'
<h2>Why convert CSV to JSON?</h2>
<p>JSON is the format web applications, APIs and JavaScript understand natively. Converting a spreadsheet export to JSON makes it easy to seed a database, mock an API response, import data into a CMS or load configuration into an app.</p>
<h2>Clean data, real types</h2>
<p>With type detection, numbers become numbers and <code>true</code>/<code>false</code> become booleans, while values such as ZIP codes with leading zeros stay as text. Quoted fields with commas and line breaks are parsed correctly.</p>
<p>Want to check or prettify the result? Paste it into the JSON Formatter. To go back to a spreadsheet, use JSON to CSV.</p>
HTML,

    'png-to-webp' => <<<'HTML'
<h2>PNG vs. WebP</h2>
<p>PNG is great for graphics with transparency, but its files are large. WebP supports transparency too and is usually much smaller, so converting logos, icons, screenshots and product images with transparent backgrounds to WebP speeds up websites without losing the see-through areas.</p>
<h2>When to keep PNG</h2>
<p>Keep the original PNG as your master file for further editing, and for places that do not accept WebP. For JPG photos, use JPG to WebP instead; to shrink images without changing format, use the Image Compressor.</p>
HTML,

    'webp-to-jpg' => <<<'HTML'
<h2>Why do I get WebP images?</h2>
<p>Many websites serve images as WebP to load faster, so images you save from the web often end up as <code>.webp</code> files. Some apps, printers, email clients and upload forms still do not accept them — converting to JPG solves that.</p>
<h2>Tips</h2>
<ul>
<li>JPG has no transparency: transparent areas become white.</li>
<li>Use 85–92% quality for photos you may print.</li>
<li>Need the image smaller afterwards? Use the Image Compressor or the Image Resizer.</li>
</ul>
<h2>Is converting safe for my photos?</h2>
<p>Yes. The conversion happens on your own device, so your images are never uploaded. Your original WebP files are not changed — the tool creates new JPG copies that you can download one by one or together in a ZIP file.</p>
HTML,

    'image-to-pdf' => <<<'HTML'
<h2>Combine any images into a PDF</h2>
<p>Turn screenshots, scanned pages, photos of receipts and exported charts into a single PDF that anyone can open, print or attach to an email. JPG, PNG and WebP images can be mixed in the same document and arranged in any order.</p>
<h2>Choosing a page size</h2>
<ul>
<li><strong>A4</strong> — standard document size in most countries.</li>
<li><strong>US Letter</strong> — standard in the United States and Canada.</li>
<li><strong>Fit to image</strong> — each page matches its image exactly, with no white borders.</li>
</ul>
<p>Only JPG photos? JPG to PDF works the same way. To add the result to existing PDFs, use Merge PDF.</p>
HTML,

    'url-encoder' => <<<'HTML'
<h2>Why URLs need encoding</h2>
<p>URLs may only contain a limited set of characters. Spaces, accents, emoji and symbols such as <code>&amp;</code>, <code>?</code> and <code>#</code> have to be percent-encoded so browsers and servers interpret them correctly. Forgetting to encode a query value is a common cause of broken links and missing parameters.</p>
<h2>Common encodings</h2>
<ul>
<li>Space → <code>%20</code> (or <code>+</code> in form data)</li>
<li><code>&amp;</code> → <code>%26</code></li>
<li><code>/</code> → <code>%2F</code></li>
<li><code>é</code> → <code>%C3%A9</code></li>
</ul>
<h2>Encoding for developers</h2>
<p>In JavaScript, use <code>encodeURIComponent()</code> for individual query values and <code>encodeURI()</code> for complete URLs. In PHP, the equivalents are <code>rawurlencode()</code> and <code>urlencode()</code>, which encodes spaces as plus signs. Encoding a value twice is a common bug that produces sequences like <code>%2520</code>.</p>
<p>Working with tokens or binary data? The Base64 Encoder &amp; Decoder and the JWT Decoder can help.</p>
HTML,

    'jwt-decoder' => <<<'HTML'
<h2>How JWTs work</h2>
<p>A JSON Web Token carries claims about a user or session, such as an ID, roles and an expiration time. The header and payload are Base64URL-encoded JSON, and the signature lets the server verify that nobody changed them. Because the payload is only encoded, anyone holding a token can read it — never put secrets inside a JWT.</p>
<h2>Common debugging checks</h2>
<ul>
<li>Is the token expired (<code>exp</code> in the past)?</li>
<li>Is the clock skew causing <code>nbf</code> problems?</li>
<li>Does the <code>aud</code> or <code>iss</code> match what your API expects?</li>
<li>Is the algorithm (<code>alg</code>) the one your server is configured for?</li>
</ul>
<p>To decode other Base64 strings, use the Base64 Encoder &amp; Decoder.</p>
HTML,

    'tip-calculator' => <<<'HTML'
<h2>Tipping guide</h2>
<ul>
<li><strong>Restaurants (US):</strong> 15–20% for table service; 20% or more for excellent service.</li>
<li><strong>Bars:</strong> about $1–2 per drink or 15–20% of the tab.</li>
<li><strong>Food delivery:</strong> 15–20%, with a minimum of a few dollars.</li>
<li><strong>Taxis and rideshare:</strong> 10–20%.</li>
</ul>
<p>Tipping customs vary widely by country. In much of Europe and Asia, service is often included and leaving small change is enough. Check the bill for a service charge before adding a tip.</p>
<h2>Splitting the bill fairly</h2>
<p>When everyone ordered similar amounts, an even split is the simplest option. If orders were very different, each person can calculate their own share plus tip instead. Rounding up per person avoids fumbling for coins and leaves a slightly more generous tip.</p>
<p>For other everyday math, try the Percentage Calculator.</p>
HTML,

    'salary-calculator' => <<<'HTML'
<h2>Comparing job offers</h2>
<p>Offers are quoted in different ways — an hourly rate for one job, an annual salary for another. Converting both to the same period makes the comparison fair. Remember to account for paid vacation, overtime, bonuses and benefits such as health insurance and retirement contributions, which can be worth thousands per year.</p>
<h2>Quick conversions (40-hour week)</h2>
<ul>
<li>$20/hour ≈ $41,600/year</li>
<li>$25/hour ≈ $52,000/year</li>
<li>$30/hour ≈ $62,400/year</li>
<li>$50,000/year ≈ $24.04/hour</li>
</ul>
<p>Planning savings from your paycheck? See how they grow with the Compound Interest Calculator.</p>
HTML,

    'word-counter' => <<<'HTML'
<h2>Common length limits</h2>
<ul>
<li><strong>Meta description:</strong> about 150–160 characters.</li>
<li><strong>Page title for Google:</strong> about 50–60 characters.</li>
<li><strong>X (Twitter) post:</strong> 280 characters.</li>
<li><strong>LinkedIn post:</strong> 3,000 characters.</li>
<li><strong>College application essay:</strong> often 500–650 words.</li>
<li><strong>Blog post that ranks well:</strong> frequently 1,000–2,000 words, depending on the topic.</li>
</ul>
<h2>Writing tips</h2>
<p>Readers skim on screens, so break long paragraphs into shorter ones of two to four sentences, and use headings to guide them through the text. Shorter sentences are easier to read online. Use the keyword list to make sure your main topic appears naturally — and that no word is overused. To fix capitalization, use the Case Converter; to compare two drafts, use Text Compare.</p>
HTML,

    'text-compare' => <<<'HTML'
<h2>What you can compare</h2>
<ul>
<li>Two versions of a contract, essay or article.</li>
<li>Configuration files and code snippets.</li>
<li>Lists exported at different times, to see what was added or removed.</li>
<li>Translations or copy edits before publishing.</li>
</ul>
<h2>Line vs. word comparison</h2>
<p>Line mode shows which lines changed — perfect for code and data. Word mode pinpoints the exact words that changed inside a paragraph — ideal for proofreading. Combine it with Remove Duplicate Lines and Sort Lines to compare lists whose order does not matter.</p>
HTML,

    'remove-duplicate-lines' => <<<'HTML'
<h2>Clean up any list</h2>
<p>Duplicates sneak into email lists, keyword research, product catalogs and data exports. Removing them prevents sending the same email twice, double-counting keywords or importing repeated records into a database.</p>
<h2>Tips</h2>
<ul>
<li>Enable <strong>Ignore case</strong> for emails and keywords, where capitalization does not matter.</li>
<li>Keep <strong>Trim spaces</strong> on to catch duplicates that only differ by invisible spaces.</li>
<li>Need the list in alphabetical order too? Run it through Sort Lines.</li>
</ul>
<h2>Works with spreadsheet data</h2>
<p>Copy a single column from Excel or Google Sheets, paste it here, and paste the unique values back. Each cell becomes one line, so you can deduplicate thousands of rows in seconds without formulas.</p>
HTML,

    'sort-lines' => <<<'HTML'
<h2>Sort lists the way people expect</h2>
<p>Plain alphabetical sorting puts "Item 10" before "Item 2" because it compares character by character. Natural sorting compares numbers by their value, so lists of file names, versions, chapters and invoice numbers come out in the right order.</p>
<h2>Popular uses</h2>
<ul>
<li>Alphabetize names, glossaries and bibliographies.</li>
<li>Shuffle a list for raffles, random teams or quiz questions.</li>
<li>Reverse a log or a timeline.</li>
<li>Sort keywords or URLs before comparing them with Text Compare.</li>
</ul>
<p>To remove repeated entries without changing the order, use Remove Duplicate Lines.</p>
HTML,

    'unit-converter' => <<<'HTML'
<h2>Metric vs. imperial</h2>
<p>Most of the world uses the metric system (meters, kilograms, liters, °C), while the United States mainly uses US customary units (feet, pounds, gallons, °F) and the UK mixes both. Recipes, travel, online shopping, construction plans and science homework constantly require switching between them.</p>
<h2>Handy reference values</h2>
<ul>
<li>1 inch = 2.54 cm · 1 foot = 30.48 cm · 1 mile = 1.609 km</li>
<li>1 kg = 2.2046 lb · 1 oz = 28.35 g</li>
<li>1 US cup = 236.6 ml · 1 tablespoon = 3 teaspoons</li>
<li>0 °C = 32 °F · 100 °C = 212 °F</li>
<li>1 acre = 43,560 sq ft · 1 hectare = 2.471 acres</li>
</ul>
<p>Working with dates instead of measurements? Try the Date Calculator. For money, the Percentage Calculator handles discounts and increases.</p>
HTML,

    'mortgage-calculator' => <<<'HTML'
<h2>Understanding your mortgage payment</h2>
<p>Your monthly payment is more than principal and interest. Lenders usually collect property taxes and homeowners insurance in an escrow account, and conventional loans with less than 20% down add private mortgage insurance (PMI). Condos and planned communities may also charge HOA fees. Including all of them shows what you will really pay each month.</p>
<h2>Ways to lower your payment</h2>
<ul>
<li><strong>Put 20% down</strong> to avoid PMI entirely.</li>
<li><strong>Improve your credit score</strong> before applying — it directly affects your rate.</li>
<li><strong>Compare lenders</strong>: even 0.25% lower saves thousands over 30 years.</li>
<li><strong>Consider a 15-year term</strong> if you can afford it — far less total interest.</li>
</ul>
<p>For other loans, such as car or personal loans, use the Loan Calculator. To see how extra savings could grow instead, try the Compound Interest Calculator.</p>
HTML,

    'png-to-jpg' => <<<'HTML'
<h2>When to convert PNG to JPG</h2>
<p>Screenshots and exported images are often saved as PNG, which can be several megabytes for a single photo-like image. Converting them to JPG makes files much smaller — ideal for email attachments, upload forms with size limits, online listings and sharing on social media.</p>
<h2>Keep PNG when it matters</h2>
<p>PNG is better for logos, icons, diagrams and anything that needs a transparent background or perfectly sharp text. If you need a small file and transparency, use PNG to WebP instead.</p>
<p>Need the file even smaller after converting? Run it through the Image Compressor or reduce its dimensions with the Image Resizer.</p>
HTML,

    'date-calculator' => <<<'HTML'
<h2>Common uses</h2>
<ul>
<li><strong>Deadlines:</strong> what date is 30 business days from today?</li>
<li><strong>Countdowns:</strong> how many days until a wedding, exam, trip or launch?</li>
<li><strong>Contracts and notice periods:</strong> the date 90 days after signing.</li>
<li><strong>Pregnancy, warranties and subscriptions:</strong> adding weeks or months to a start date.</li>
<li><strong>Project planning:</strong> the number of working days between two milestones.</li>
</ul>
<h2>How months are counted</h2>
<p>Adding months follows the calendar, not a fixed number of days. One month after March 15 is April 15, whatever the month length. When the day does not exist — such as February 30 — the last day of the month is used instead.</p>
<p>To find someone's exact age and next birthday, use the Age Calculator.</p>
HTML,

    'jpg-to-png' => <<<'HTML'
<h2>Why use PNG?</h2>
<p>JPG loses a little quality every time it is edited and saved again. PNG is lossless, so converting a photo to PNG before editing protects it from further degradation. Many design tools, print services and app stores also ask for PNG files.</p>
<h2>What to expect</h2>
<p>The PNG will usually be larger than the original JPG, because lossless images store every pixel exactly. Converting does not recover detail already lost to JPG compression, and the background stays the same — JPG photos have no transparency to keep.</p>
<p>Need a small file for the web instead? Use JPG to WebP or the Image Compressor. To cut out part of the photo first, use Crop Image.</p>
HTML,

    'rotate-pdf' => <<<'HTML'
<h2>Fix sideways scans in seconds</h2>
<p>Scanners and phone scanning apps often save some pages sideways or upside down, especially when documents mix portrait and landscape pages. Rotating them makes the PDF readable on screen and prints it the right way.</p>
<h2>Rotate only what needs fixing</h2>
<p>The page previews let you rotate individual pages instead of the whole file. Each click turns a page 90° clockwise; the arrow buttons rotate left or right, and the rotation is saved permanently in the downloaded file without changing the quality.</p>
<p>Need to remove pages too? Use Delete PDF Pages. To combine several documents, use Merge PDF, and to turn pages into pictures, use PDF to JPG.</p>
HTML,

    'debt-payoff-calculator' => <<<'HTML'
<h2>Avalanche or snowball?</h2>
<p>Both methods pay the minimum on every debt and send all extra money to one target debt. The <strong>avalanche</strong> targets the highest interest rate first, which always costs the least. The <strong>snowball</strong> targets the smallest balance first, so you close accounts sooner — a motivation boost that helps many people stick to the plan. The best method is the one you will follow.</p>
<h2>Tips to get out of debt faster</h2>
<ul>
<li>Stop adding new charges to the cards you are paying off.</li>
<li>Ask your card issuer for a lower APR — it often works with a good payment history.</li>
<li>Consider a balance transfer or consolidation loan with a lower rate, after checking the fees.</li>
<li>Put windfalls such as tax refunds and bonuses straight into the target debt.</li>
</ul>
<p>Planning a new loan instead? The Loan Calculator shows its full cost before you sign.</p>
HTML,

    'delete-pdf-pages' => <<<'HTML'
<h2>Why remove pages from a PDF?</h2>
<p>Scanned documents often include blank pages, duplicate pages or cover sheets. Other times you need to share a document without pages that contain personal or confidential information. Removing those pages makes the file smaller, cleaner and safer to send.</p>
<h2>Remove, keep or extract</h2>
<p>This tool is ideal when you want to drop a few pages and keep the rest. If you only need a handful of pages from a long document, Split PDF lets you extract them by typing page numbers. Pages that are sideways can be fixed with Rotate PDF, and several cleaned-up files can be combined with Merge PDF.</p>
HTML,

    'webp-to-png' => <<<'HTML'
<h2>Why WebP images cause trouble</h2>
<p>Websites serve images as WebP because the files are small and load fast. But when you save one, many editors, presentation apps, older operating systems and upload forms refuse to open it. Converting to PNG gives you a universally supported file without losing quality.</p>
<h2>PNG keeps transparency</h2>
<p>Logos, stickers and product images saved from the web often have transparent backgrounds. PNG preserves them exactly, unlike JPG. If you prefer smaller files for photos, use WebP to JPG instead.</p>
<p>Want to go the other way for your own website? Convert images with PNG to WebP or JPG to WebP.</p>
HTML,

    'svg-to-png' => <<<'HTML'
<h2>When you need a PNG instead of an SVG</h2>
<p>SVG is perfect for logos and icons on websites because it stays sharp at any size. However, many places only accept raster images: social media profiles, email signatures, presentation slides, app store listings and some content management systems. Converting to PNG makes your vector artwork usable everywhere.</p>
<h2>Choosing the right scale</h2>
<ul>
<li><strong>1×</strong> — the size defined in the SVG.</li>
<li><strong>2×</strong> — sharp on high-resolution (Retina) screens.</li>
<li><strong>4× or 8×</strong> — print, large banners or further editing.</li>
</ul>
<p>Need a smaller file afterwards? Use the Image Compressor or convert the result with PNG to WebP.</p>
HTML,

    'bmi-calculator' => <<<'HTML'
<h2>What your BMI means</h2>
<p>Body Mass Index compares your weight with your height to give a single number that health organizations use to screen for weight categories. For most adults, a BMI between 18.5 and 24.9 is associated with the lowest health risks, while higher values are linked to a greater risk of conditions such as type 2 diabetes and heart disease.</p>
<h2>Limitations of BMI</h2>
<ul>
<li>It cannot tell muscle from fat, so muscular people may be classed as overweight.</li>
<li>It does not show where fat is stored; waist size is another useful measure.</li>
<li>Healthy ranges can differ by age, sex and ethnicity.</li>
</ul>
<p>To turn your goal into a daily plan, estimate your energy needs with the Calorie Calculator.</p>
HTML,

    'online-timer' => <<<'HTML'
<h2>Three tools in one</h2>
<p>Use the <strong>countdown timer</strong> for cooking, workouts, presentations, exams and naps; the <strong>stopwatch</strong> with laps for running, swimming or timing tasks; and the <strong>Pomodoro timer</strong> to study or work in focused 25-minute sessions with regular breaks. The current time is shown in the browser tab, so you can keep working in another tab and still see how much time is left.</p>
<h2>Tips for focused work</h2>
<ul>
<li>Pick one task per Pomodoro and silence notifications.</li>
<li>Use breaks to stand up, stretch and rest your eyes.</li>
<li>Track how many rounds a task takes to plan better next time.</li>
</ul>
<p>Need to count days instead of minutes? Use the Date Calculator.</p>
HTML,

    'calorie-calculator' => <<<'HTML'
<h2>How many calories do you need?</h2>
<p>Your daily calorie needs depend on your size, age, sex and how active you are. The calculator first estimates your basal metabolic rate — the energy needed to keep your body running at rest — and then multiplies it by an activity factor to estimate your total daily energy expenditure (TDEE). Eating about your TDEE keeps your weight stable.</p>
<h2>Making the numbers work</h2>
<ul>
<li>Choose your activity level honestly — most people overestimate it.</li>
<li>Aim for gradual change: about 0.5–1 lb (0.25–0.5 kg) per week.</li>
<li>Prioritize protein, vegetables and whole foods to stay full on fewer calories.</li>
<li>Re-calculate after every 5–10 lb (2–5 kg) of weight change.</li>
</ul>
<p>Check where you stand today with the BMI Calculator.</p>
HTML,

    'random-number-generator' => <<<'HTML'
<h2>Popular uses</h2>
<ul>
<li><strong>Giveaways and raffles:</strong> draw winning ticket numbers without repeats.</li>
<li><strong>Games:</strong> roll dice or pick a number between 1 and 10.</li>
<li><strong>Lottery numbers:</strong> generate six unique numbers from 1 to 49.</li>
<li><strong>Teaching and research:</strong> select random samples or assign groups.</li>
</ul>
<h2>Truly random and fair</h2>
<p>Many simple generators use predictable pseudo-random functions. This one uses the cryptographically secure generator built into your browser and avoids the subtle bias of naive methods, so every number in the range has the same chance. To draw names instead of numbers, use the Random Name Picker. For strong random passwords, use the Password Generator.</p>
HTML,

    'due-date-calculator' => <<<'HTML'
<h2>How pregnancy is dated</h2>
<p>A typical pregnancy lasts about 40 weeks (280 days) counted from the first day of the last menstrual period, not from conception. If your cycle is longer or shorter than 28 days, ovulation usually happens later or earlier, so the calculator shifts the due date by the difference.</p>
<h2>Key milestones</h2>
<ul>
<li><strong>Weeks 1–12:</strong> first trimester — the first prenatal visit and early ultrasound usually happen here.</li>
<li><strong>Weeks 18–22:</strong> the detailed anatomy scan.</li>
<li><strong>Weeks 27–40:</strong> third trimester, with more frequent check-ups.</li>
<li><strong>39–40 weeks:</strong> considered full term.</li>
</ul>
<p>Want to count down the days? The Date Calculator shows the exact number of days between today and your due date.</p>
HTML,

    'auto-loan-calculator' => <<<'HTML'
<h2>What goes into a car loan</h2>
<p>The amount you borrow is the vehicle price plus sales tax and dealer fees, minus your down payment and the equity in your trade-in. Fees such as documentation, title and registration add up quickly, so including them gives a realistic monthly payment before you talk to the dealer.</p>
<h2>Tips to pay less</h2>
<ul>
<li>Get pre-approved by a bank or credit union to compare with dealer financing.</li>
<li>Put at least 10–20% down to avoid owing more than the car is worth.</li>
<li>Choose the shortest term you can afford — the comparison table shows the interest saved.</li>
<li>Negotiate the price of the car separately from the trade-in and the financing.</li>
</ul>
<p>For other loans, use the Loan Calculator; for a home, the Mortgage Calculator.</p>
HTML,

    'hash-generator' => <<<'HTML'
<h2>Common uses for hashes</h2>
<ul>
<li><strong>Verify downloads:</strong> compare the SHA-256 checksum published by a software vendor with the file you downloaded.</li>
<li><strong>Detect changes:</strong> the same file always has the same hash, so different hashes mean different content.</li>
<li><strong>Development:</strong> generate cache keys, ETags and content identifiers.</li>
<li><strong>Deduplication:</strong> find identical files by comparing their hashes.</li>
</ul>
<h2>Which algorithm should I use?</h2>
<p>Use SHA-256 for most purposes — it is fast, widely supported and secure. SHA-512 gives an even longer digest. MD5 and SHA-1 are fine for quick integrity checks but should not be used for security. To encode data rather than fingerprint it, use the Base64 Encoder &amp; Decoder.</p>
HTML,

    'timestamp-converter' => <<<'HTML'
<h2>Why developers use Unix time</h2>
<p>Unix timestamps represent a moment as a single number that is the same everywhere in the world, which makes them ideal for databases, APIs, logs, JWT expiration claims and cache headers. Converting them to readable dates is a daily task when debugging.</p>
<h2>Common pitfalls</h2>
<ul>
<li>Mixing seconds and milliseconds — a 13-digit number is in milliseconds.</li>
<li>Forgetting time zones — timestamps are always UTC; only the display is local.</li>
<li>Storing dates as 32-bit integers, which overflow in January 2038.</li>
</ul>
<p>Decoding a token with <code>exp</code> and <code>iat</code> claims? The JWT Decoder converts them automatically. To count calendar days between dates, use the Date Calculator.</p>
HTML,

    'color-converter' => <<<'HTML'
<h2>Working with color formats</h2>
<p>Design tools often give colors in HEX, while CSS frameworks, canvas code and image libraries may need RGB or HSL. HSL is especially handy for building palettes: keep the hue, then change lightness to create hover states, borders and backgrounds that match.</p>
<h2>Accessible color contrast</h2>
<p>About one in twelve men has some form of color blindness, and many people read on bright phone screens outdoors. The Web Content Accessibility Guidelines (WCAG) require a contrast ratio of at least 4.5:1 for normal text and 3:1 for large text. Check every text and background pair in your design, including buttons and placeholder text.</p>
<p>Building a QR code in your brand colors? Test the contrast here first, then use the QR Code Generator.</p>
HTML,

    'regex-tester' => <<<'HTML'
<h2>Regex cheat sheet</h2>
<ul>
<li><code>\d</code> digit · <code>\w</code> word character · <code>\s</code> whitespace · <code>.</code> any character</li>
<li><code>*</code> 0 or more · <code>+</code> 1 or more · <code>?</code> optional · <code>{2,4}</code> between 2 and 4</li>
<li><code>^</code> start · <code>$</code> end · <code>\b</code> word boundary</li>
<li><code>[abc]</code> one of · <code>[^abc]</code> none of · <code>a|b</code> either</li>
<li><code>(…)</code> capture group · <code>(?:…)</code> non-capturing · <code>(?=…)</code> lookahead</li>
</ul>
<h2>Testing tips</h2>
<p>Paste real examples, including the cases that should not match, and watch the highlights while you edit. Keep patterns as specific as possible and avoid nested quantifiers to prevent slow matching. To transform text in bulk after finding the right pattern, the Case Converter and Sort Lines tools can help.</p>
HTML,

    'random-name-picker' => <<<'HTML'
<h2>Great for classrooms, teams and giveaways</h2>
<p>Teachers use name pickers to call on students fairly, managers to choose who presents first, and creators to select giveaway winners in front of their audience. Because the draw is random and transparent, nobody can say it was rigged.</p>
<h2>Tips</h2>
<ul>
<li>Enable <strong>Remove picked names</strong> so everyone gets a turn before anyone is picked twice.</li>
<li>Use <strong>Make teams</strong> for group projects, sports and party games.</li>
<li>Clean your list first with Remove Duplicate Lines if names were copied from several places.</li>
</ul>
<p>Drawing numbered tickets instead? Use the Random Number Generator.</p>
HTML,

    'lorem-ipsum-generator' => <<<'HTML'
<h2>Where does Lorem Ipsum come from?</h2>
<p>The classic passage comes from "De finibus bonorum et malorum", written by Cicero in 45 BC. Printers have used scrambled versions of it since the 1500s because it has a natural distribution of letters and word lengths, so layouts look realistic without the text distracting reviewers.</p>
<h2>Tips for designers and developers</h2>
<ul>
<li>Use realistic lengths: generate the number of words your real content will have.</li>
<li>Replace placeholder text with real copy as early as possible — content shapes design.</li>
<li>Use the HTML option to paste paragraphs directly into prototypes.</li>
</ul>
<p>Checking how long your real text is? Use the Word Counter.</p>
HTML,

    'credit-card-payoff-calculator' => <<<'HTML'
<h2>Why minimum payments keep you in debt</h2>
<p>Card issuers set the minimum payment at roughly the month's interest plus about 1% of the balance. As the balance falls, the minimum falls too, so most of every payment keeps going to interest. A $5,000 balance at 23% APR can take well over 15 years to clear this way and cost more in interest than the original purchases. A fixed payment, even a modest one, changes the picture completely.</p>
<h2>Two ways to plan your payoff</h2>
<ul>
<li><strong>Pay a fixed amount</strong>: enter what you can afford each month to see your debt-free date and total interest.</li>
<li><strong>Be debt-free by a date</strong>: choose a number of months to get the monthly payment you need.</li>
</ul>
<p>Paying off several cards and loans at once? The Debt Payoff Calculator compares the avalanche and snowball methods across all of them. Thinking about consolidating with a personal loan? Check the payment with the Loan Calculator and compare offers with the Loan Comparison Calculator.</p>
HTML,

    'loan-comparison-calculator' => <<<'HTML'
<h2>The lowest rate is not always the cheapest loan</h2>
<p>Lenders compete on the headline interest rate, but upfront fees such as origination, arrangement or closing fees change the real cost. A loan at 6.9% with an $800 fee can cost more than a loan at 7.5% with no fee. This calculator adds interest and fees together into the total cost of borrowing, and shows the effective APR: the rate you are really paying once fees are counted.</p>
<h2>Payment versus total cost</h2>
<p>A longer term lowers the monthly payment but almost always increases the total interest. The badges show which offer has the lowest monthly payment and which is cheapest overall, so you can choose consciously between cash flow and cost.</p>
<p>Once you have picked an offer, open the Loan Calculator to see its full amortization schedule and how extra payments shorten it. Buying a home or a car? The Mortgage Calculator and the Auto Loan Calculator include taxes, insurance and trade-ins.</p>
HTML,

    'organize-pdf' => <<<'HTML'
<h2>Put every page in the right place</h2>
<p>Scanned documents often come out in the wrong order, reports need an appendix moved to the end, and combined files need a cover page first. This tool shows a preview of every page so you can drag pages into the order you want, rotate the ones that were scanned sideways and remove blank or duplicate pages, all in one step.</p>
<h2>Private by design</h2>
<p>Your PDF is opened and rebuilt entirely in your browser. Nothing is uploaded, which makes it safe for contracts, bank statements and medical records.</p>
<p>To combine several files first, use Merge PDF. To pull out a few pages into a separate document, use Split PDF. If you only need to fix the orientation, Rotate PDF is the quickest option, and Add Page Numbers to PDF numbers the final document.</p>
HTML,

    'add-page-numbers-to-pdf' => <<<'HTML'
<h2>When page numbers matter</h2>
<p>Reports, theses, contracts, manuals and printed handouts are much easier to discuss and review when every page is numbered. Numbers also protect printed documents: a missing or reordered page is obvious at a glance. Many PDFs exported from scanners, phones or presentation apps have no page numbers at all.</p>
<h2>Choose the style</h2>
<ul>
<li>Place the number in any corner or centered, at the top or bottom.</li>
<li>Use a plain number, "1 / 10", "Page 1" or "Page 1 of 10".</li>
<li>Skip the cover page by starting on page 2, and choose the first number to continue a series.</li>
</ul>
<p>Getting the document ready first? Merge PDF combines files, Organize PDF fixes the page order and Delete PDF Pages removes pages you do not need.</p>
HTML,
];
