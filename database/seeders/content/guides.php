<?php

/*
| English "How to use" steps and FAQ for each tool page, keyed by slug.
| Trusted HTML. Other languages live in content/{locale}/tools.php.
*/

return [
    'age-calculator' => [
        'steps' => [
            'Enter the <strong>date of birth</strong>.',
            'Leave <strong>Age on</strong> as today, or pick another date to find the age at a specific moment in the past or future.',
            'See the exact age in years, months and days, plus the total months, weeks, days and hours lived.',
            'Check the countdown to the next birthday and the day of the week it falls on.',
        ],
        'faq' => [
            ['q' => 'How is exact age calculated?', 'a' => 'The calculator counts complete years first, then complete months, then the remaining days, following the calendar. Months with fewer days are handled correctly.'],
            ['q' => 'What about people born on February 29?', 'a' => 'In years without a February 29, the birthday is counted on February 28.'],
            ['q' => 'Can I calculate the time between any two dates?', 'a' => 'Yes. Use the birth date as the start date and Age on as the end date. The result shows the exact years, months and days in between.'],
            ['q' => 'Is my date of birth stored?', 'a' => 'No. The calculation happens in your browser and nothing is sent to our servers.'],
        ],
    ],

    'auto-loan-calculator' => [
        'steps' => [
            'Enter the <strong>vehicle price</strong>, your <strong>down payment</strong> and, if you have one, your <strong>trade-in</strong> value and what you still owe on it.',
            'Add your state <strong>sales tax</strong> rate and dealer <strong>fees</strong> (documentation, title and registration).',
            'Enter the <strong>interest rate (APR)</strong> and choose the loan term.',
            'Compare the monthly payment and total interest for 36 to 84-month terms.',
        ],
        'faq' => [
            ['q' => 'How is an auto loan payment calculated?', 'a' => 'The amount financed is the price plus sales tax and fees, minus your down payment and net trade-in value. The monthly payment then follows the standard amortization formula for your rate and term.'],
            ['q' => 'Is sales tax charged on the trade-in?', 'a' => 'In most US states, sales tax applies only to the price minus your trade-in value, which saves money. A few states tax the full price — untick the option to calculate that way.'],
            ['q' => 'What if I owe more than my trade-in is worth?', 'a' => 'That is negative equity. The difference is added to your new loan, increasing the amount financed and the interest you pay.'],
            ['q' => 'Is a longer loan term a good idea?', 'a' => '72- or 84-month loans lower the monthly payment but cost much more in interest, and you may owe more than the car is worth for years. Compare terms in the table below the results.'],
            ['q' => 'Are the results exact?', 'a' => 'They are estimates. Your lender’s rate, fees and taxes determine the final numbers.'],
        ],
    ],

    'base64-encoder' => [
        'steps' => [
            'Choose <strong>Encode</strong> to convert text to Base64, or <strong>Decode</strong> to turn Base64 back into readable text.',
            'Paste your text or Base64 string. The result appears instantly as you type.',
            'Enable <strong>URL-safe</strong> to use <code>-</code> and <code>_</code> instead of <code>+</code> and <code>/</code> (used in JWTs and URLs).',
            'To encode an image or any file, use <strong>Encode a file</strong> below and copy the Base64 string or the complete data URI.',
        ],
        'faq' => [
            ['q' => 'What is Base64?', 'a' => 'Base64 is an encoding that represents binary data using 64 printable ASCII characters. It is used to embed images in HTML and CSS, send attachments in email, and transport data in JSON or URLs. It is an encoding, not encryption — anyone can decode it.'],
            ['q' => 'Does this tool support emoji and accented characters?', 'a' => 'Yes. Text is converted to UTF-8 before encoding, so emoji, accents and non-Latin scripts encode and decode correctly.'],
            ['q' => 'What is URL-safe Base64?', 'a' => 'URL-safe Base64 (Base64URL) replaces <code>+</code> with <code>-</code> and <code>/</code> with <code>_</code> and removes the <code>=</code> padding, so the result can be used in URLs and file names. The decoder accepts both variants automatically.'],
            ['q' => 'Why does Base64 make data bigger?', 'a' => 'Every 3 bytes of input become 4 Base64 characters, so encoded data is about 33% larger than the original.'],
            ['q' => 'Is my data uploaded?', 'a' => 'No. Encoding and decoding happen in your browser. Your text and files never leave your device.'],
        ],
    ],

    'bmi-calculator' => [
        'steps' => [
            'Choose <strong>US units</strong> (pounds, feet and inches) or <strong>Metric</strong> (kilograms and centimeters).',
            'Enter your weight and height. The result updates as you type.',
            'See your BMI, its category and where it falls on the scale.',
            'Check the healthy weight range for your height.',
        ],
        'faq' => [
            ['q' => 'How is BMI calculated?', 'a' => 'Body Mass Index is your weight in kilograms divided by your height in meters squared (kg/m²). In US units it equals 703 × pounds ÷ inches².'],
            ['q' => 'What are the BMI categories for adults?', 'a' => 'Below 18.5 is underweight, 18.5–24.9 is a healthy weight, 25–29.9 is overweight, and 30 or higher is obesity, according to the World Health Organization and the CDC.'],
            ['q' => 'Is BMI accurate?', 'a' => 'BMI is a quick screening tool, not a diagnosis. It does not distinguish muscle from fat, so athletes may score high, and it does not account for age, sex, ethnicity or body fat distribution. Talk to a healthcare professional about your health.'],
            ['q' => 'Can children use this BMI calculator?', 'a' => 'No. For children and teens, BMI must be compared with age- and sex-specific percentiles. This calculator is for adults 20 years and older.'],
            ['q' => 'Is my data stored?', 'a' => 'No. The calculation runs in your browser and nothing is sent to our servers.'],
        ],
    ],

    'calorie-calculator' => [
        'steps' => [
            'Choose your sex and enter your age.',
            'Enter your weight and height in US or metric units.',
            'Pick the activity level that best matches a typical week.',
            'See the calories you burn per day (TDEE) and daily targets to lose, maintain or gain weight.',
        ],
        'faq' => [
            ['q' => 'How are daily calories calculated?', 'a' => 'The calculator estimates your Basal Metabolic Rate with the Mifflin-St Jeor equation — considered one of the most accurate for most adults — and multiplies it by an activity factor to get your Total Daily Energy Expenditure (TDEE).'],
            ['q' => 'What is the difference between BMR and TDEE?', 'a' => 'BMR is the energy your body uses at complete rest. TDEE adds everything else: daily movement, exercise and digestion. TDEE is the number to eat to maintain your weight.'],
            ['q' => 'How many calories should I eat to lose weight?', 'a' => 'A deficit of about 500 calories per day leads to roughly 1 pound (0.5 kg) of weight loss per week. Most adults should not go below about 1,200 (women) or 1,500 (men) calories per day without medical supervision.'],
            ['q' => 'Why is my result different from my fitness tracker?', 'a' => 'All calorie numbers are estimates. Trackers and formulas use different assumptions. Use the result as a starting point and adjust based on how your weight changes over 2–3 weeks.'],
            ['q' => 'Is this medical advice?', 'a' => 'No. For pregnancy, medical conditions or athletic goals, consult a doctor or registered dietitian.'],
        ],
    ],

    'case-converter' => [
        'steps' => [
            'Paste or type your text into the input box.',
            'Pick a case: UPPERCASE, lowercase, Title Case, Sentence case and more.',
            'Developers can convert text to <strong>camelCase</strong>, <strong>snake_case</strong>, <strong>kebab-case</strong>, <strong>PascalCase</strong> or <strong>CONSTANT_CASE</strong>.',
            'Copy the converted text or download it as a file.',
        ],
        'faq' => [
            ['q' => 'What is Title Case?', 'a' => 'Title Case capitalizes the first letter of each important word, while short words such as <em>a</em>, <em>and</em>, <em>of</em> and <em>the</em> stay lowercase unless they are the first or last word — the style used for headlines and book titles.'],
            ['q' => 'What is the difference between Title Case and Capitalized Case?', 'a' => 'Capitalized Case capitalizes every single word, including short ones. Title Case follows headline rules and keeps small words lowercase.'],
            ['q' => 'How does Sentence case work?', 'a' => 'Sentence case lowercases everything and capitalizes the first letter of each sentence. Proper nouns such as names will need to be fixed by hand.'],
            ['q' => 'Can I fix text that was typed with Caps Lock on?', 'a' => 'Yes. Use iNVERSE cASE to swap upper and lower case, or Sentence case to rewrite it properly.'],
            ['q' => 'Is my text stored?', 'a' => 'No. The conversion runs in your browser and nothing is uploaded.'],
        ],
    ],

    'color-converter' => [
        'steps' => [
            'Type a color in any format — <code>#0f766e</code>, <code>rgb(15, 118, 110)</code> or <code>hsl(175, 77%, 26%)</code> — or pick one with the color picker.',
            'Copy the color as HEX, RGB or HSL for CSS, design tools or code.',
            'In <strong>Contrast checker</strong>, enter a text color and a background color.',
            'Check the WCAG results: aim for at least AA (4.5:1) for normal text.',
        ],
        'faq' => [
            ['q' => 'What is the difference between HEX, RGB and HSL?', 'a' => 'They describe the same colors in different ways. HEX and RGB specify the red, green and blue channels; HSL uses hue, saturation and lightness, which is easier for creating lighter or darker variations of a color.'],
            ['q' => 'What contrast ratio do I need?', 'a' => 'WCAG 2 level AA requires 4.5:1 for normal text and 3:1 for large text (about 24 px, or 19 px bold). Level AAA requires 7:1 and 4.5:1. Higher contrast makes text readable for more people, including those with low vision.'],
            ['q' => 'Why does accessibility contrast matter for SEO?', 'a' => 'Readable text keeps visitors on the page, and accessibility audits such as Lighthouse flag low-contrast text. Accessible sites also reach a larger audience.'],
            ['q' => 'Is anything uploaded?', 'a' => 'No. All conversions and contrast calculations run in your browser.'],
        ],
    ],

    'compound-interest-calculator' => [
        'steps' => [
            'Enter your <strong>initial investment</strong> and the expected <strong>annual interest rate</strong>.',
            'Set how many <strong>years</strong> you plan to invest and how often interest is compounded.',
            'Add a regular <strong>contribution</strong> — monthly or yearly — or leave it at 0.',
            'Review the future value, how much came from contributions versus interest, and the year-by-year table. Export it as CSV if you like.',
        ],
        'faq' => [
            ['q' => 'What is compound interest?', 'a' => 'Compound interest is interest earned on both your original money and the interest it has already earned. Over long periods it makes savings grow exponentially, which is why starting early matters so much.'],
            ['q' => 'What is the compound interest formula?', 'a' => 'Without contributions: <code>A = P (1 + r/n)<sup>nt</sup></code>, where P is the principal, r the annual rate, n the number of compounding periods per year and t the number of years. With regular contributions, the future value of each deposit is added.'],
            ['q' => 'Does compounding frequency make a big difference?', 'a' => 'More frequent compounding earns slightly more, but the effect is small compared with the interest rate, the time invested and the amount you contribute.'],
            ['q' => 'When are contributions added?', 'a' => 'Contributions are added at the end of each month (or year), after that period’s interest is applied.'],
            ['q' => 'Is this financial advice?', 'a' => 'No. Results are estimates that assume a constant rate of return. Real investments fluctuate, and taxes and fees are not included.'],
        ],
    ],

    'crop-image' => [
        'steps' => [
            'Drop an image into the box, click to browse, or paste one with Ctrl + V.',
            'Drag the selection to move it and drag the corners to resize it. Use the arrow keys for pixel-perfect adjustments (hold Shift for 10 px).',
            'Pick an aspect ratio such as <strong>1:1</strong> for profile pictures, <strong>16:9</strong> for thumbnails or <strong>9:16</strong> for stories, or type exact pixel values.',
            'Choose the output format and click <strong>Crop &amp; download</strong>.',
        ],
        'faq' => [
            ['q' => 'Which aspect ratio should I use?', 'a' => 'Use 1:1 for profile photos and Instagram posts, 4:5 for Instagram portrait posts, 16:9 for YouTube thumbnails and presentations, 9:16 for stories and Reels, and 3:2 or 4:3 for classic photo prints.'],
            ['q' => 'Does cropping reduce quality?', 'a' => 'Cropping keeps the original pixels of the selected area at full resolution. For JPG and WebP output you can choose the quality; PNG output is lossless.'],
            ['q' => 'Is my photo uploaded?', 'a' => 'No. The image is cropped in your browser and never leaves your device.'],
            ['q' => 'Which formats are supported?', 'a' => 'You can crop JPG, PNG and WebP images up to 25 MB and save the result as JPG, PNG or WebP.'],
        ],
    ],

    'csv-to-json' => [
        'steps' => [
            'Paste your CSV data into the input, or click <strong>Load sample</strong>. You can paste directly from Excel or Google Sheets.',
            'Leave the delimiter on <strong>Auto</strong> or pick comma, semicolon, tab or pipe.',
            'Keep <strong>First row is header</strong> enabled to get an array of objects, or disable it to get an array of arrays.',
            'With <strong>Detect types</strong>, numbers and true/false become real JSON values. Copy or download the result as <code>.json</code>.',
        ],
        'faq' => [
            ['q' => 'Can I paste data copied from Excel or Google Sheets?', 'a' => 'Yes. Spreadsheet data is copied as tab-separated text, and the Auto delimiter detects it automatically.'],
            ['q' => 'How are quotes and line breaks inside cells handled?', 'a' => 'The parser follows the CSV standard (RFC 4180): fields wrapped in double quotes may contain commas, line breaks and escaped quotes (<code>&quot;&quot;</code>).'],
            ['q' => 'Why do some numbers stay as text?', 'a' => 'Values with leading zeros, such as ZIP codes or IDs like <code>007</code>, are kept as strings so no information is lost. Very long numbers are also kept as text to avoid precision errors.'],
            ['q' => 'What happens with duplicate or empty column names?', 'a' => 'Duplicate headers get a suffix (<code>name_2</code>) and empty headers are named <code>column_N</code>, so every value is kept.'],
            ['q' => 'Is my data private?', 'a' => 'Yes. The conversion happens in your browser and your data is never uploaded.'],
        ],
    ],

    'date-calculator' => [
        'steps' => [
            'Choose <strong>Days between dates</strong> to count the time between two dates, or <strong>Add or subtract</strong> to find a future or past date.',
            'Pick the dates with the calendar or type them.',
            'Enable <strong>Include end date</strong> when both the first and the last day should count, such as for a booking or a project.',
            'Use <strong>Business days only</strong> to skip Saturdays and Sundays, for example to calculate a deadline.',
        ],
        'faq' => [
            ['q' => 'How many days are between two dates?', 'a' => 'Enter both dates in Days between dates. The result shows the total days plus the same span in weeks, months and years, and the number of business days.'],
            ['q' => 'Should I include the end date?', 'a' => 'By default the calculator counts the days from the start date up to the end date, like counting nights in a hotel. Include the end date when both days count, such as a 3-day event from Monday to Wednesday.'],
            ['q' => 'What counts as a business day?', 'a' => 'Monday to Friday. Public holidays are not excluded because they differ by country, so subtract them manually if needed.'],
            ['q' => 'What happens when I add a month to January 31?', 'a' => 'The result is the last day of February (28 or 29), because February has no 31st. This matches how banks and most calendars handle month-end dates.'],
            ['q' => 'Can I calculate someone’s age?', 'a' => 'Yes, but the Age Calculator is built for that and also shows the countdown to the next birthday.'],
        ],
    ],

    'debt-payoff-calculator' => [
        'steps' => [
            'List your debts with their <strong>balance</strong>, <strong>interest rate (APR)</strong> and <strong>minimum payment</strong>.',
            'Enter how much <strong>extra</strong> you can pay each month on top of the minimums.',
            'Compare the <strong>avalanche</strong> and <strong>snowball</strong> methods with paying only the minimums.',
            'Follow the payoff order for the method you choose. When a debt is paid off, its payment rolls over to the next one.',
        ],
        'faq' => [
            ['q' => 'What is the debt avalanche method?', 'a' => 'With the avalanche method you pay the minimum on every debt and put all extra money toward the debt with the highest interest rate. It saves the most money in interest.'],
            ['q' => 'What is the debt snowball method?', 'a' => 'With the snowball method you put extra money toward the smallest balance first. You pay a little more interest, but quick wins keep many people motivated.'],
            ['q' => 'What does rollover mean?', 'a' => 'When a debt is paid off, the money you were paying on it is added to the next debt. Your total monthly payment stays the same, so payoff accelerates over time.'],
            ['q' => 'Why does it say my debt will never be paid off?', 'a' => 'If your payments are smaller than the interest charged each month, the balance never goes down. Increase the minimum or extra payment.'],
            ['q' => 'Is my financial information stored?', 'a' => 'No. Everything is calculated in your browser and nothing is sent to our servers.'],
        ],
    ],

    'delete-pdf-pages' => [
        'steps' => [
            'Drop a PDF into the box or click to browse. A preview of every page appears.',
            'Click the pages you want to remove. They are marked in red — click again to keep a page.',
            'Check the counter to confirm how many pages will be removed.',
            'Click <strong>Download edited PDF</strong> to save a copy without those pages.',
        ],
        'faq' => [
            ['q' => 'How do I delete pages from a PDF?', 'a' => 'Open the PDF here, click every page you want to remove and download the edited file. The remaining pages stay in their original order.'],
            ['q' => 'Is the original file changed?', 'a' => 'No. Your original PDF stays the same; the tool downloads a new copy without the removed pages.'],
            ['q' => 'Can I remove blank pages from a scan?', 'a' => 'Yes. The previews make blank or duplicate scanned pages easy to spot — just click them to remove them.'],
            ['q' => 'Is my PDF uploaded?', 'a' => 'No. Everything happens in your browser, so private documents never leave your device.'],
            ['q' => 'Can I extract pages instead?', 'a' => 'Yes. To keep only a few pages, the Split PDF tool lets you type the page numbers to extract.'],
        ],
    ],

    'due-date-calculator' => [
        'steps' => [
            'Enter the <strong>first day of your last menstrual period</strong> (LMP).',
            'Adjust your <strong>average cycle length</strong> if it is not 28 days.',
            'See your estimated due date, how far along you are and your current trimester.',
            'Check the key milestones of the pregnancy timeline.',
        ],
        'faq' => [
            ['q' => 'How is the due date calculated?', 'a' => 'The calculator uses Naegele’s rule: 280 days (40 weeks) after the first day of your last menstrual period, adjusted for cycles longer or shorter than 28 days.'],
            ['q' => 'How accurate is the due date?', 'a' => 'It is an estimate. Only about 4% of babies are born on their exact due date; most arrive between 37 and 42 weeks. An early ultrasound gives the most accurate dating, and your healthcare provider may adjust the date.'],
            ['q' => 'Why are weeks counted from my last period?', 'a' => 'Pregnancy is dated from the first day of the last period because ovulation and conception dates are rarely known exactly. That is why you are considered about 2 weeks pregnant at conception.'],
            ['q' => 'What are the trimesters?', 'a' => 'The first trimester runs to the end of week 12, the second from week 13 to week 26, and the third from week 27 until birth.'],
            ['q' => 'Is this medical advice?', 'a' => 'No. This tool is for information only. Always follow the guidance of your doctor or midwife.'],
        ],
    ],

    'hash-generator' => [
        'steps' => [
            'Type or paste text, or choose <strong>Hash a file</strong> to compute a checksum of any file.',
            'MD5, SHA-1, SHA-256, SHA-384 and SHA-512 hashes are calculated at the same time.',
            'Copy the hash you need, in lowercase or uppercase.',
            'To verify a download, paste the expected checksum in <strong>Compare</strong> — a match turns green.',
        ],
        'faq' => [
            ['q' => 'What is a hash?', 'a' => 'A hash function turns any input into a fixed-length fingerprint. The same input always gives the same hash, and changing a single character changes it completely. Hashes are used to verify downloads, detect changes and index data.'],
            ['q' => 'How do I verify a file checksum?', 'a' => 'Hash the file you downloaded and paste the checksum published by the provider (usually SHA-256) into Compare. If they match, the file is complete and has not been altered.'],
            ['q' => 'Is MD5 or SHA-1 secure?', 'a' => 'No longer for security. Both have known collision attacks, so use SHA-256 or SHA-512 for anything security related. MD5 is still fine for quick, non-security checks.'],
            ['q' => 'Should I hash passwords with SHA-256?', 'a' => 'No. Passwords must be stored with slow, salted algorithms such as bcrypt, scrypt or Argon2. Fast hashes like SHA-256 can be brute-forced quickly.'],
            ['q' => 'Are my text and files uploaded?', 'a' => 'No. Hashes are computed in your browser with the Web Crypto API. Files of any type up to 200 MB stay on your device.'],
        ],
    ],

    'heic-to-jpg' => [
        'steps' => [
            'Drop your HEIC or HEIF photos (from an iPhone or iPad) into the box, or click to browse. You can convert many at once.',
            'Choose the output format — <strong>JPG</strong> for the smallest files that open everywhere, or <strong>PNG</strong> for lossless quality.',
            'Adjust the quality if needed. 85–92% keeps photos looking identical to the original.',
            'Download each photo or click <strong>Download All</strong> to get a ZIP with every converted image.',
        ],
        'faq' => [
            ['q' => 'What is a HEIC file?', 'a' => 'HEIC (High Efficiency Image Container) is the photo format iPhones and iPads use by default since iOS 11. It saves space, but many Windows apps, websites and older devices cannot open it.'],
            ['q' => 'Are my photos uploaded?', 'a' => 'No. Your photos are converted in your browser and never leave your device — important for personal pictures.'],
            ['q' => 'Is the photo orientation kept?', 'a' => 'Yes. Rotation information stored in the HEIC file is applied, so portrait photos stay upright.'],
            ['q' => 'Why does the first conversion take a few seconds?', 'a' => 'Most browsers cannot read HEIC on their own, so the converter downloads a HEIC decoder the first time you use it. After that, conversions are fast. Safari can decode HEIC natively.'],
            ['q' => 'Is location data (GPS) removed?', 'a' => 'Yes. Converted images do not include EXIF metadata such as GPS location or camera details.'],
            ['q' => 'How do I stop my iPhone from saving HEIC?', 'a' => 'Go to Settings › Camera › Formats and choose <strong>Most Compatible</strong>. New photos will be saved as JPG.'],
        ],
    ],

    'image-compressor' => [
        'steps' => [
            'Drag and drop your JPG, PNG or WebP images into the box, click to browse, or paste an image with Ctrl + V.',
            'Adjust the <strong>Quality</strong> slider. Around 70–80% usually cuts the file size dramatically with no visible difference.',
            'Optionally convert to another format or limit the maximum width — resizing large photos saves the most space.',
            'Download each image, or click <strong>Download All</strong> to get every compressed image in a single ZIP file.',
        ],
        'faq' => [
            ['q' => 'Are my images uploaded to a server?', 'a' => 'No. Compression happens entirely in your browser using your device. Your images are never uploaded, stored or seen by anyone else.'],
            ['q' => 'What quality setting should I use?', 'a' => 'For photos on websites, 70–80% is a great balance between size and quality. Use 85–95% for images where detail matters, and 50–65% when the smallest file size is the priority.'],
            ['q' => 'Why did my PNG barely get smaller?', 'a' => 'PNG is a lossless format, so the quality slider has little effect on it. For much smaller files, convert PNG photos to <strong>WebP</strong> or <strong>JPG</strong> using the Output format option, or reduce the maximum width. If re-encoding would make a file bigger, the original is kept.'],
            ['q' => 'Does compression remove EXIF metadata?', 'a' => 'Yes. Re-encoded images do not keep EXIF metadata such as camera details or GPS location, which also improves privacy. Image orientation is applied before the metadata is removed.'],
            ['q' => 'How many images can I compress at once?', 'a' => 'You can compress up to 30 images per batch, each up to 25 MB.'],
        ],
    ],

    'image-resizer' => [
        'steps' => [
            'Drop your JPG, PNG or WebP images into the box, browse for them, or paste with Ctrl + V. You can resize many images at once.',
            'Choose <strong>By percentage</strong> to scale everything (for example 50%), or <strong>By size</strong> to set an exact width and/or height in pixels.',
            'Keep <strong>Lock aspect ratio</strong> on to avoid stretching. With both width and height set, each image fits inside that box.',
            'Download each image or click <strong>Download All</strong> to get a ZIP file.',
        ],
        'faq' => [
            ['q' => 'Will resizing reduce image quality?', 'a' => 'Making an image smaller keeps it sharp. Enlarging an image beyond its original size cannot add detail, so it may look soft. For JPG and WebP you can also set the output quality.'],
            ['q' => 'How do I resize an image without stretching it?', 'a' => 'Keep <strong>Lock aspect ratio</strong> enabled and enter only the width or the height. The other side is calculated automatically to keep the original proportions.'],
            ['q' => 'What size should images be for websites?', 'a' => 'For most websites, 1200–1920 px wide is enough for full-width images and 600–800 px for content images. Smaller images load faster and improve Core Web Vitals.'],
            ['q' => 'Are my images uploaded?', 'a' => 'No. Images are resized in your browser and never leave your device.'],
            ['q' => 'How many images can I resize at once?', 'a' => 'Up to 30 images per batch, each up to 25 MB.'],
        ],
    ],

    'image-to-pdf' => [
        'steps' => [
            'Drop your images into the box or click to browse. JPG, PNG and WebP can be mixed in the same PDF.',
            'Reorder the images by dragging them or with the arrow buttons.',
            'Pick the page size, orientation and margin.',
            'Click <strong>Convert to PDF</strong> and your PDF downloads instantly.',
        ],
        'faq' => [
            ['q' => 'Which image formats can I convert to PDF?', 'a' => 'JPG, JPEG, PNG and WebP. You can combine different formats in the same PDF.'],
            ['q' => 'What happens to transparent PNG backgrounds?', 'a' => 'Transparent areas are placed on a white page, which is how they look when printed.'],
            ['q' => 'Can I convert screenshots into a PDF?', 'a' => 'Yes. Screenshots are usually PNG files — add them all, put them in order and convert. Use Fit to image to avoid white borders.'],
            ['q' => 'Are my images private?', 'a' => 'Yes. Everything happens in your browser, so your images are never uploaded.'],
        ],
    ],

    'jpg-to-pdf' => [
        'steps' => [
            'Drop your JPG photos or scanned pages into the box, or click to browse. Add as many as you need.',
            'Drag the images (or use the arrows) to set the page order.',
            'Choose the page size — <strong>A4</strong>, <strong>US Letter</strong> or <strong>Fit to image</strong> — plus orientation and margins.',
            'Click <strong>Convert to PDF</strong> to download one PDF with every image on its own page.',
        ],
        'faq' => [
            ['q' => 'How do I combine several JPGs into one PDF?', 'a' => 'Add all your JPG files, arrange them in the right order and click Convert to PDF. Each image becomes one page of the same PDF.'],
            ['q' => 'Will my photos be rotated correctly?', 'a' => 'Yes. The orientation stored by phones and cameras (EXIF) is applied, so portrait photos stay upright. Auto orientation also turns the page to landscape for wide images.'],
            ['q' => 'Which page size should I choose?', 'a' => 'Use A4 for most of the world and US Letter for the United States and Canada. Fit to image creates pages exactly the size of each photo, with no white borders.'],
            ['q' => 'Are my images uploaded?', 'a' => 'No. The PDF is created in your browser. Your photos and documents never leave your device.'],
            ['q' => 'Can I add PNG or WebP images?', 'a' => 'This page is for JPG files. Use the Image to PDF tool to combine JPG, PNG and WebP images in one PDF.'],
        ],
    ],

    'jpg-to-png' => [
        'steps' => [
            'Drop your JPG or JPEG images into the box, or click to browse. You can convert many at once.',
            'Each image is converted to PNG instantly in your browser.',
            'Check the new file size for each image.',
            'Download the PNG files individually or all together in a ZIP.',
        ],
        'faq' => [
            ['q' => 'Why convert JPG to PNG?', 'a' => 'PNG is lossless, so the image will not lose any more quality when you edit and save it again. Some apps, print services and design tools also require PNG files.'],
            ['q' => 'Will converting improve the quality?', 'a' => 'No. Converting cannot restore detail that JPG compression already removed, but it prevents further quality loss from future edits.'],
            ['q' => 'Why is the PNG file bigger?', 'a' => 'PNG stores every pixel without lossy compression, so photos usually become larger. For the web, JPG or WebP are better choices for photos.'],
            ['q' => 'Does the PNG have a transparent background?', 'a' => 'JPG images have no transparency, so the PNG keeps the same solid background as the original photo.'],
            ['q' => 'Are my images uploaded?', 'a' => 'No. Everything happens on your device.'],
        ],
    ],

    'jpg-to-webp' => [
        'steps' => [
            'Drag and drop your JPG images into the box, click to browse, or paste an image with Ctrl + V. You can add several images at once.',
            'Choose the <strong>Quality</strong>. 75–85% gives WebP files that look identical to the original and are much smaller.',
            'Each image is converted instantly in your browser. Check the new size and the percentage saved.',
            'Download images one by one, or click <strong>Download All</strong> to get a ZIP with every WebP file.',
        ],
        'faq' => [
            ['q' => 'What is WebP?', 'a' => 'WebP is a modern image format created by Google. At the same visual quality, WebP files are typically 25–35% smaller than JPG, which makes websites load faster and improves Core Web Vitals.'],
            ['q' => 'Are my images uploaded?', 'a' => 'No. Conversion happens entirely in your browser. Your images never leave your device.'],
            ['q' => 'Do all browsers support WebP?', 'a' => 'Yes. All modern browsers — Chrome, Edge, Firefox and Safari 14+ — display WebP images. Creating WebP files requires a recent browser; if yours cannot, the tool will tell you.'],
            ['q' => 'Can I convert PNG to WebP too?', 'a' => 'Yes. PNG files are accepted as well and transparency is preserved in the WebP output.'],
            ['q' => 'Is there a limit?', 'a' => 'You can convert up to 30 images per batch, each up to 25 MB.'],
        ],
    ],

    'json-formatter' => [
        'steps' => [
            'Paste or type your JSON into the <strong>Input</strong> box, or click <strong>Load sample</strong> to try it out.',
            'Click <strong>Format</strong> to beautify it, or <strong>Minify</strong> to remove all whitespace. Choose 2 spaces, 4 spaces or tabs and optionally sort keys alphabetically.',
            'If your JSON is invalid, the error message shows the exact line and column, and the cursor jumps to the problem.',
            'Copy the result or download it as a file. You can also convert the JSON to <strong>CSV</strong> or <strong>TypeScript</strong> interfaces.',
        ],
        'faq' => [
            ['q' => 'Is my JSON sent to a server?', 'a' => 'No. Formatting, validation and conversion happen entirely in your browser with JavaScript. Your data never leaves your device, so it is safe to use with private or sensitive data.'],
            ['q' => 'What is the difference between formatting and minifying JSON?', 'a' => 'Formatting (also called beautifying or pretty-printing) adds indentation and line breaks so JSON is easy to read. Minifying removes all unnecessary whitespace to make the payload as small as possible for production or network transfer.'],
            ['q' => 'Why is my JSON invalid?', 'a' => 'The most common causes are trailing commas, single quotes instead of double quotes, unquoted property names, comments, and missing commas between items. JSON is stricter than JavaScript object syntax. The validator shows the line and column of the first error it finds.'],
            ['q' => 'How does the JSON to CSV conversion work?', 'a' => 'An array of objects becomes one row per object, with a column for every key. Nested objects are flattened using dot notation (for example <code>owner.name</code>), and nested arrays are kept as JSON text inside the cell.'],
            ['q' => 'Is there a size limit?', 'a' => 'There is no fixed limit, but because everything runs in your browser, very large files (tens of megabytes) may be slow depending on your device.'],
        ],
    ],

    'json-to-csv' => [
        'steps' => [
            'Paste a JSON array of objects (or a single object) into the input, or click <strong>Load sample</strong>.',
            'Choose the delimiter: comma for most tools, semicolon for Excel in many European locales, or tab for TSV.',
            'The CSV appears instantly. Nested objects become columns such as <code>address.city</code>.',
            'Copy the CSV or download it as a <code>.csv</code> file ready for Excel, Google Sheets or Numbers.',
        ],
        'faq' => [
            ['q' => 'What JSON structure works best?', 'a' => 'An array of objects, like <code>[{&quot;name&quot;: &quot;Ada&quot;}, {&quot;name&quot;: &quot;Alan&quot;}]</code>. Each object becomes a row and each key becomes a column. Objects with different keys are merged; missing values are left empty.'],
            ['q' => 'How are nested objects and arrays handled?', 'a' => 'Nested objects are flattened with dot notation (<code>address.city</code>). Arrays are written into the cell as JSON text so no data is lost.'],
            ['q' => 'Why should I use a semicolon delimiter?', 'a' => 'In countries where the comma is the decimal separator, Excel expects semicolon-separated files. Choose semicolon if your columns appear merged when opening the file.'],
            ['q' => 'Is the CSV safe to open in Excel?', 'a' => 'Yes. Values that start with <code>=</code>, <code>+</code>, <code>-</code> or <code>@</code> are prefixed with an apostrophe to prevent formula injection.'],
            ['q' => 'Is my data uploaded?', 'a' => 'No. The conversion runs entirely in your browser.'],
        ],
    ],

    'jwt-decoder' => [
        'steps' => [
            'Paste a JSON Web Token (JWT) into the box. A leading <code>Bearer</code> prefix is removed automatically.',
            'The header and payload are decoded instantly and shown as formatted JSON.',
            'Check the <strong>exp</strong>, <strong>iat</strong> and <strong>nbf</strong> claims converted to readable dates, and whether the token is expired.',
            'Copy the decoded header or payload with one click.',
        ],
        'faq' => [
            ['q' => 'Is it safe to paste my JWT here?', 'a' => 'Yes. The token is decoded entirely in your browser and is never sent to a server. Still, treat production tokens like passwords and avoid sharing them.'],
            ['q' => 'Does this tool verify the signature?', 'a' => 'No. It only decodes the header and payload, which are Base64URL-encoded JSON. Verifying the signature requires the secret or public key and must be done by your server.'],
            ['q' => 'What are exp, iat and nbf?', 'a' => '<code>exp</code> is the expiration time, <code>iat</code> is when the token was issued and <code>nbf</code> is the time before which it must not be accepted. All are Unix timestamps in seconds.'],
            ['q' => 'What are the three parts of a JWT?', 'a' => 'A JWT has a header (algorithm and token type), a payload (the claims) and a signature, separated by dots: <code>header.payload.signature</code>.'],
        ],
    ],

    'loan-calculator' => [
        'steps' => [
            'Enter the <strong>loan amount</strong> you want to borrow.',
            'Enter the <strong>annual interest rate</strong> (APR) offered by your lender.',
            'Set the <strong>loan term</strong> in years or months and choose how often you will pay: monthly, biweekly or weekly.',
            'Review your payment, total interest and total cost, then explore the full <strong>amortization schedule</strong> by year or by payment. You can export it as CSV.',
        ],
        'faq' => [
            ['q' => 'How is the loan payment calculated?', 'a' => 'The calculator uses the standard amortization formula: <code>P = L × r / (1 − (1 + r)<sup>−n</sup>)</code>, where L is the loan amount, r is the interest rate per payment period and n is the total number of payments.'],
            ['q' => 'Does paying biweekly save money?', 'a' => 'Paying every two weeks means 26 payments a year. Because interest is charged on a slightly lower balance more often, you usually pay a little less interest overall. Compare the totals by switching the payment frequency.'],
            ['q' => 'How much do extra payments save?', 'a' => 'Enter an amount in <strong>Extra per payment</strong>. The calculator shows how much interest you save, how much sooner the loan ends and the new payoff date, and the chart compares both balances. Check with your lender that extra payments go to principal and carry no prepayment fee.'],
            ['q' => 'What is an amortization schedule?', 'a' => 'It is a table showing every payment over the life of the loan, split into the part that pays interest and the part that reduces the principal, along with the remaining balance after each payment.'],
            ['q' => 'Does this include taxes, insurance or fees?', 'a' => 'No. The results cover principal and interest only. Mortgages and car loans may also include property taxes, insurance, origination fees or other costs set by your lender.'],
            ['q' => 'Is my information stored?', 'a' => 'No. All calculations run in your browser and nothing you enter is sent to our servers.'],
        ],
    ],

    'lorem-ipsum-generator' => [
        'steps' => [
            'Choose how much placeholder text you need and whether to count it in <strong>paragraphs</strong>, <strong>sentences</strong> or <strong>words</strong>.',
            'Keep <strong>Start with “Lorem ipsum…”</strong> for the classic opening, or turn it off for fully random text.',
            'Enable <strong>HTML</strong> to wrap each paragraph in <code>&lt;p&gt;</code> tags, ready to paste into a web page.',
            'Copy the text or download it. Click <strong>Generate</strong> for a new variation.',
        ],
        'faq' => [
            ['q' => 'What is Lorem Ipsum?', 'a' => 'Lorem Ipsum is scrambled Latin placeholder text derived from a work by Cicero. Designers and developers use it to fill layouts so the focus stays on the design instead of the content.'],
            ['q' => 'Why use placeholder text instead of real text?', 'a' => 'It shows how real text will flow in a layout — line lengths, paragraph spacing and typography — before the final copy is ready, without readers getting distracted by the meaning.'],
            ['q' => 'Can I use the generated text for free?', 'a' => 'Yes. Lorem Ipsum is not copyrighted and you can use the generated text in any project.'],
            ['q' => 'How much text can I generate?', 'a' => 'Up to 200 paragraphs or sentences, or 5,000 words at a time.'],
        ],
    ],

    'merge-pdf' => [
        'steps' => [
            'Drop two or more PDF files into the box or click to browse.',
            'Drag the files (or use the arrows) to put them in the order you want. The page count of each file is shown.',
            'Click <strong>Merge PDF</strong>.',
            'Your combined PDF downloads immediately as <code>merged.pdf</code>.',
        ],
        'faq' => [
            ['q' => 'Are my PDF files uploaded to a server?', 'a' => 'No. The PDFs are merged entirely in your browser, so confidential documents never leave your device.'],
            ['q' => 'Is there a limit on files or size?', 'a' => 'You can merge up to 30 PDFs at a time, each up to 100 MB. Very large files may take a little longer depending on your device.'],
            ['q' => 'Will links, bookmarks and form fields be kept?', 'a' => 'Page content, images and text are kept exactly as they are. Interactive extras such as bookmarks (outlines) and some form fields may not be carried over to the merged file.'],
            ['q' => 'Can I merge password-protected PDFs?', 'a' => 'No. Remove the password from the PDF first, then merge it.'],
            ['q' => 'Can I reorder or remove pages?', 'a' => 'You can reorder whole files here. To remove or extract specific pages, use the Split PDF tool before or after merging.'],
        ],
    ],

    'mortgage-calculator' => [
        'steps' => [
            'Enter the <strong>home price</strong> and your <strong>down payment</strong>, as a percentage or a dollar amount.',
            'Choose the <strong>loan term</strong> and enter the <strong>interest rate</strong> you were quoted.',
            'Add <strong>property tax</strong>, <strong>home insurance</strong>, <strong>PMI</strong> and <strong>HOA</strong> fees for your real monthly cost.',
            'Review the monthly breakdown, total interest and the year-by-year amortization schedule.',
        ],
        'faq' => [
            ['q' => 'What is included in a monthly mortgage payment?', 'a' => 'Most payments include principal and interest plus escrow for property taxes and homeowners insurance (often called PITI). With less than 20% down you usually pay PMI as well, and condos or planned communities may add HOA fees.'],
            ['q' => 'What is PMI and when does it go away?', 'a' => 'Private mortgage insurance protects the lender when you put less than 20% down on a conventional loan. It typically costs 0.3%–1.5% of the loan per year and is removed automatically when your balance reaches 78% of the original home value. The calculator estimates how many months you will pay it.'],
            ['q' => 'Should I pay extra on my mortgage?', 'a' => 'Extra principal payments shorten the loan and cut total interest, often by tens of thousands. Enter an amount in <strong>Extra payment per month</strong> to see the savings and the new payoff date. Compare that with other uses of the money, such as an emergency fund or higher-interest debt.'],
            ['q' => 'Is a 15-year or a 30-year mortgage better?', 'a' => 'A 15-year mortgage has higher monthly payments but a lower rate and dramatically less total interest. A 30-year mortgage keeps payments lower and more flexible. Compare both by changing the term.'],
            ['q' => 'How much house can I afford?', 'a' => 'A common guideline is to keep your total housing payment below about 28% of your gross monthly income, and all debt payments below about 36%. Lenders look at your full financial picture.'],
            ['q' => 'Are these results exact?', 'a' => 'They are estimates for planning. Taxes, insurance, PMI and closing costs vary by location, lender and credit profile.'],
        ],
    ],

    'online-timer' => [
        'steps' => [
            'Choose <strong>Timer</strong> for a countdown, <strong>Stopwatch</strong> to measure time with laps, or <strong>Pomodoro</strong> for focus sessions.',
            'For the timer, pick a preset (1 to 60 minutes) or type hours, minutes and seconds.',
            'Press <strong>Start</strong>. The remaining time also appears in the browser tab title, so you can switch tabs.',
            'An alarm sounds when time is up. Turn the sound off if you prefer a silent timer.',
        ],
        'faq' => [
            ['q' => 'Does the timer keep running if I switch tabs?', 'a' => 'Yes. The timer is based on the clock rather than counting ticks, so it stays accurate in background tabs, and the time left is shown in the tab title.'],
            ['q' => 'Why didn’t I hear the alarm?', 'a' => 'Check that the sound option is on and your device is not muted. Some browsers block sound until you have interacted with the page — pressing Start counts as interaction.'],
            ['q' => 'What is the Pomodoro technique?', 'a' => 'A time-management method: work with full focus for 25 minutes, then take a 5-minute break. After four rounds, take a longer 15–30 minute break. The timer switches between phases automatically.'],
            ['q' => 'How precise is the stopwatch?', 'a' => 'It displays hundredths of a second and uses your device clock, which is accurate to a few milliseconds. Use Lap to record split times.'],
            ['q' => 'Does it work offline?', 'a' => 'Once the page has loaded, the timer, stopwatch and Pomodoro all run in your browser without an internet connection.'],
        ],
    ],

    'password-generator' => [
        'steps' => [
            'Choose the password <strong>length</strong>. 16 characters or more is recommended for important accounts.',
            'Select which characters to include: lowercase, uppercase, numbers and symbols.',
            'Optionally exclude look-alike characters such as <code>l</code>, <code>1</code>, <code>O</code> and <code>0</code> if you will type the password by hand.',
            'Copy your password with one click. Click <strong>Generate</strong> for a new one, or create up to 50 at once.',
        ],
        'faq' => [
            ['q' => 'Are these passwords safe?', 'a' => 'Yes. They are generated in your browser with the Web Crypto API, a cryptographically secure random number generator, and they are never sent to or stored on any server.'],
            ['q' => 'How long should a password be?', 'a' => 'Use at least 12 characters, and 16 or more for email, banking and password-manager master passwords. Length adds more strength than complexity.'],
            ['q' => 'What does the strength in bits mean?', 'a' => 'Entropy measures how many guesses an attacker would need. Each extra bit doubles the work. 60+ bits is good for most accounts, and 80+ bits is strong even against offline attacks.'],
            ['q' => 'Should I reuse a strong password?', 'a' => 'No. Use a unique password for every account and store them in a password manager. If one site is breached, your other accounts stay safe.'],
            ['q' => 'Is every character type guaranteed?', 'a' => 'Yes. Each password includes at least one character from every type you select.'],
        ],
    ],

    'pdf-to-jpg' => [
        'steps' => [
            'Drop a PDF into the box or click to browse.',
            'Choose the resolution: <strong>72 DPI</strong> for screens, <strong>150 DPI</strong> for most uses, or <strong>300 DPI</strong> for printing.',
            'Click <strong>Convert to JPG</strong>. Every page is rendered as an image and shown as a preview.',
            'Download single pages or click <strong>Download All</strong> to get every page in a ZIP.',
        ],
        'faq' => [
            ['q' => 'What DPI should I choose?', 'a' => '150 DPI is a good default for sharing and documents. Use 300 DPI for printing or when you need to zoom into small text, and 72 DPI for small web previews. Higher DPI means larger files.'],
            ['q' => 'Is my PDF uploaded?', 'a' => 'No. Pages are rendered in your browser using PDF.js, the same engine used by Firefox. Your file never leaves your device.'],
            ['q' => 'How many pages can I convert?', 'a' => 'Up to 200 pages per PDF, with files up to 100 MB.'],
            ['q' => 'Can I convert a PDF to PNG instead?', 'a' => 'This tool creates JPG images, which are ideal for documents and photos. To get PNG, convert the JPGs with the Image Resizer by choosing PNG as the output format.'],
            ['q' => 'Does it work with password-protected PDFs?', 'a' => 'No. Remove the password from the PDF first.'],
        ],
    ],

    'percentage-calculator' => [
        'steps' => [
            'Pick the calculator that matches your question — each one answers a different kind of percentage problem.',
            'Type your numbers. Results update instantly; there is no button to press.',
            'Use <strong>Percentage change</strong> to compare an old and a new value, such as prices or salaries.',
            'Use <strong>Add or subtract a percentage</strong> for discounts, tax or price increases.',
        ],
        'faq' => [
            ['q' => 'How do I calculate a percentage of a number?', 'a' => 'Multiply the number by the percentage and divide by 100. For example, 15% of 200 is 200 × 15 / 100 = 30.'],
            ['q' => 'How do I find what percent one number is of another?', 'a' => 'Divide the part by the whole and multiply by 100. For example, 30 is (30 / 200) × 100 = 15% of 200.'],
            ['q' => 'How is percentage increase calculated?', 'a' => 'Subtract the old value from the new value, divide by the old value and multiply by 100. Going from 80 to 100 is an increase of (100 − 80) / 80 × 100 = 25%.'],
            ['q' => 'How do I calculate a discount?', 'a' => 'Use Add or subtract a percentage and choose decrease. A 20% discount on 50 is 50 × (1 − 0.20) = 40.'],
            ['q' => 'Why is a 50% increase followed by a 50% decrease not the original value?', 'a' => 'Because each percentage is taken from a different base. 100 + 50% = 150, but 150 − 50% = 75.'],
        ],
    ],

    'png-to-jpg' => [
        'steps' => [
            'Drop your PNG images into the box, click to browse, or paste a screenshot with Ctrl + V.',
            'Choose the JPG <strong>Quality</strong>. 85–92% keeps photos and screenshots looking sharp.',
            'Each PNG is converted to JPG instantly. Transparent areas become white, because JPG has no transparency.',
            'Download images one by one or click <strong>Download All</strong> for a ZIP.',
        ],
        'faq' => [
            ['q' => 'Why convert PNG to JPG?', 'a' => 'Photos and screenshots saved as PNG are often several times larger than the same image as JPG. Converting makes them easier to email, upload and share, and they open in every app.'],
            ['q' => 'What happens to transparent backgrounds?', 'a' => 'JPG cannot store transparency, so transparent areas are filled with white. To keep transparency and still get a small file, use PNG to WebP instead.'],
            ['q' => 'Will I lose quality?', 'a' => 'JPG uses lossy compression, but at 85% quality or higher the difference is not visible for photos. Graphics with sharp text may look slightly softer — keep those as PNG or WebP.'],
            ['q' => 'Are my images uploaded?', 'a' => 'No. The conversion runs in your browser and your images never leave your device.'],
        ],
    ],

    'png-to-webp' => [
        'steps' => [
            'Drop your PNG images into the box, click to browse, or paste a screenshot with Ctrl + V.',
            'Adjust the <strong>Quality</strong>. 80–90% keeps graphics and screenshots crisp while shrinking the file size a lot.',
            'Each PNG is converted to WebP instantly in your browser, keeping transparent backgrounds.',
            'Download images one by one or use <strong>Download All</strong> for a ZIP.',
        ],
        'faq' => [
            ['q' => 'Does WebP keep PNG transparency?', 'a' => 'Yes. WebP supports an alpha channel, so transparent and semi-transparent areas of your PNG are preserved.'],
            ['q' => 'How much smaller is WebP than PNG?', 'a' => 'For photos and complex images, WebP is often 50–80% smaller than PNG. For simple graphics with few colors the savings are smaller, but WebP is usually still lighter.'],
            ['q' => 'Can I use WebP on my website?', 'a' => 'Yes. All modern browsers support WebP, and smaller images improve page speed and Core Web Vitals.'],
            ['q' => 'Are my files uploaded?', 'a' => 'No. Conversion happens on your device. Your images are never uploaded.'],
        ],
    ],

    'qr-generator' => [
        'steps' => [
            'Choose what the QR code should contain: a <strong>URL</strong>, plain <strong>text</strong>, an <strong>email</strong>, a <strong>phone</strong> number or <strong>Wi-Fi</strong> credentials.',
            'Fill in the details. The preview updates instantly as you type.',
            'Customize the size, margin and colors. Keep a dark foreground on a light background so every phone can scan it.',
            'Download your QR code as <strong>PNG</strong> for documents and social media, or <strong>SVG</strong> for print and design tools.',
        ],
        'faq' => [
            ['q' => 'Do these QR codes expire?', 'a' => 'No. The QR codes are static: the content is encoded directly in the image, so they work forever and do not depend on our website.'],
            ['q' => 'Should I download PNG or SVG?', 'a' => 'Use PNG for websites, documents and social media. Use SVG for print, signs and design tools — it is a vector format that stays perfectly sharp at any size.'],
            ['q' => 'How does the Wi-Fi QR code work?', 'a' => 'When scanned with a phone camera, a Wi-Fi QR code offers to join the network automatically without typing the password. It works with modern iPhone and Android devices.'],
            ['q' => 'What is the error correction level?', 'a' => 'Error correction lets a QR code still scan when part of it is damaged or covered. Higher levels (Q, H) are more robust but make the code denser. M is a good default.'],
            ['q' => 'Is my data stored?', 'a' => 'No. QR codes are generated in your browser. Your URLs, messages and Wi-Fi passwords are never sent to our servers.'],
        ],
    ],

    'random-name-picker' => [
        'steps' => [
            'Paste or type the names, one per line. You can paste a column straight from a spreadsheet.',
            'Choose <strong>Pick winners</strong> to draw one or more names, or <strong>Make teams</strong> to split everyone into random groups.',
            'Optionally remove the picked names from the list, so the next draw only includes the rest.',
            'Click the button and copy the result to share it.',
        ],
        'faq' => [
            ['q' => 'Is the name picker fair?', 'a' => 'Yes. Winners are drawn with a cryptographically secure random generator, so every name has exactly the same chance. The animation is just for fun — it does not affect the result.'],
            ['q' => 'Can I pick several winners at once?', 'a' => 'Yes. Set how many winners you need; the same name is never picked twice in one draw.'],
            ['q' => 'How are teams created?', 'a' => 'Everyone is shuffled randomly and dealt into the number of teams you choose, so team sizes differ by at most one person.'],
            ['q' => 'What if a name appears twice?', 'a' => 'Each line counts as one entry, so a name listed twice has twice the chance. Use Remove Duplicate Lines first if that is not what you want.'],
            ['q' => 'Are the names stored?', 'a' => 'No. The list stays in your browser and is never uploaded.'],
        ],
    ],

    'random-number-generator' => [
        'steps' => [
            'Set the <strong>minimum</strong> and <strong>maximum</strong> values (both included), or pick a preset such as a dice roll or a lottery draw.',
            'Choose how many numbers you need — up to 10,000 at once.',
            'Enable <strong>No duplicates</strong> for raffles and draws, and sort the results if you like.',
            'Click <strong>Generate</strong> and copy the numbers.',
        ],
        'faq' => [
            ['q' => 'Are these numbers truly random?', 'a' => 'They are generated with your browser’s cryptographically secure random number generator (Web Crypto API), with unbiased sampling so every number in the range is equally likely.'],
            ['q' => 'Can I use it for a raffle or giveaway?', 'a' => 'Yes. Number your entries, set the range from 1 to the number of entries, enable No duplicates and generate as many winners as you need. For names, use the Random Name Picker.'],
            ['q' => 'Are the minimum and maximum included?', 'a' => 'Yes. A range of 1 to 6 can return 1, 2, 3, 4, 5 or 6 — exactly like a die.'],
            ['q' => 'Can I generate negative numbers?', 'a' => 'Yes. Use a negative minimum, for example −50 to 50.'],
        ],
    ],

    'regex-tester' => [
        'steps' => [
            'Type your regular expression in the <strong>Pattern</strong> field (without the surrounding slashes).',
            'Toggle the flags you need: <code>g</code> global, <code>i</code> ignore case, <code>m</code> multiline, <code>s</code> dot matches newlines, <code>u</code> Unicode.',
            'Paste your test text. Matches are highlighted instantly and listed with their capture groups.',
            'Enable <strong>Replace</strong> to preview a substitution using <code>$1</code>, <code>$2</code> or <code>$&lt;name&gt;</code>.',
        ],
        'faq' => [
            ['q' => 'Which regex flavor does this tester use?', 'a' => 'It uses the JavaScript (ECMAScript) regular expression engine of your browser, the same one used in Node.js and TypeScript. Most syntax is shared with PCRE, Python and Java, but some features such as lookbehind support or possessive quantifiers differ.'],
            ['q' => 'What are capture groups?', 'a' => 'Parentheses capture the part of the match they contain, so you can reuse it. Named groups like <code>(?&lt;year&gt;\\d{4})</code> make patterns easier to read. Use <code>(?:...)</code> to group without capturing.'],
            ['q' => 'Why did my pattern time out?', 'a' => 'Nested quantifiers such as <code>(a+)+</code> can cause catastrophic backtracking, where the engine tries an exponential number of combinations. The tester stops after 1.5 seconds to keep your browser responsive.'],
            ['q' => 'Is my text sent anywhere?', 'a' => 'No. Matching runs in your browser in a background worker. Nothing is uploaded.'],
        ],
    ],

    'remove-duplicate-lines' => [
        'steps' => [
            'Paste your list into the input box — one item per line.',
            'Duplicate lines are removed instantly. The first occurrence of each line is kept, in its original order.',
            'Choose whether <strong>Apple</strong> and <strong>apple</strong> count as the same line, and whether to trim spaces and remove empty lines.',
            'Copy the cleaned list or download it as a text file.',
        ],
        'faq' => [
            ['q' => 'Does it keep the original order?', 'a' => 'Yes. Lines stay in their original order and only later repeats are removed. To also sort the list, use the Sort Lines tool.'],
            ['q' => 'What does Ignore case do?', 'a' => 'With Ignore case on, lines that differ only in capitalization (such as <em>Email</em> and <em>email</em>) are treated as duplicates and only the first one is kept.'],
            ['q' => 'Why trim spaces?', 'a' => 'Lines copied from spreadsheets or documents often have invisible spaces at the start or end. Trimming makes sure those lines are recognized as duplicates.'],
            ['q' => 'Can I clean a list of emails or keywords?', 'a' => 'Yes. It works for any list: emails, URLs, keywords, product codes or names. Large lists with hundreds of thousands of lines are processed in a moment.'],
            ['q' => 'Is my data private?', 'a' => 'Yes. The text is processed in your browser and never uploaded.'],
        ],
    ],

    'rotate-pdf' => [
        'steps' => [
            'Drop a PDF into the box or click to browse. A preview of every page appears.',
            'Click a page (or its arrow buttons) to rotate it 90°. Use <strong>Rotate all</strong> to turn every page at once.',
            'Rotate only the pages that need it — for example scanned pages that came out sideways or upside down.',
            'Click <strong>Download rotated PDF</strong> to save the fixed file.',
        ],
        'faq' => [
            ['q' => 'Can I rotate just one page of a PDF?', 'a' => 'Yes. Each page has its own rotate buttons, so you can turn only the pages that are sideways and leave the rest untouched.'],
            ['q' => 'Is the rotation permanent?', 'a' => 'Yes. The new orientation is saved in the downloaded PDF, so it opens correctly in every PDF reader, browser and printer.'],
            ['q' => 'Does rotating reduce quality?', 'a' => 'No. Rotation only changes the page orientation setting. Text, images and quality stay exactly the same.'],
            ['q' => 'Is my PDF uploaded?', 'a' => 'No. The PDF is processed in your browser and never leaves your device.'],
            ['q' => 'Does it work with password-protected PDFs?', 'a' => 'No. Remove the password from the PDF first.'],
        ],
    ],

    'salary-calculator' => [
        'steps' => [
            'Enter your pay and choose what it represents: hourly, daily, weekly, biweekly, semi-monthly, monthly or annual.',
            'Adjust your schedule: hours per week, days per week and paid weeks per year.',
            'See your pay converted to every other period instantly.',
            'Use it to compare job offers, hourly rates and annual salaries on equal terms.',
        ],
        'faq' => [
            ['q' => 'How do I convert an hourly wage to an annual salary?', 'a' => 'Multiply the hourly wage by the hours you work per week and by the weeks you work per year. At 40 hours a week and 52 weeks, $25 per hour is 25 × 40 × 52 = $52,000 a year.'],
            ['q' => 'How do I convert an annual salary to hourly?', 'a' => 'Divide the annual salary by hours per week times weeks per year. $60,000 at 40 hours and 52 weeks is 60,000 / 2,080 ≈ $28.85 per hour.'],
            ['q' => 'What is the difference between biweekly and semi-monthly pay?', 'a' => 'Biweekly means every two weeks, which is 26 paychecks a year. Semi-monthly means twice a month, which is 24 paychecks a year, so each semi-monthly paycheck is slightly larger.'],
            ['q' => 'Are taxes included?', 'a' => 'No. The results are gross pay before taxes and deductions, which vary by country and personal situation.'],
            ['q' => 'Should I include vacation weeks?', 'a' => 'If you are paid for vacation (salaried), keep 52 weeks. If you are not paid for time off, as with many hourly or freelance jobs, reduce the paid weeks per year.'],
        ],
    ],

    'sort-lines' => [
        'steps' => [
            'Paste your list into the input box, one item per line.',
            'Choose the order: <strong>A → Z</strong>, <strong>Z → A</strong>, by length, reversed or random (shuffle).',
            'Keep <strong>Natural sort</strong> on so <em>item 2</em> comes before <em>item 10</em>.',
            'Optionally remove duplicates and empty lines, then copy or download the sorted list.',
        ],
        'faq' => [
            ['q' => 'What is natural sorting?', 'a' => 'Natural sorting orders numbers inside text by their value, the way people expect: <em>file 2</em> comes before <em>file 10</em>. Plain alphabetical sorting would put <em>file 10</em> first.'],
            ['q' => 'How do I sort a list alphabetically?', 'a' => 'Paste the list and choose A → Z. Sorting ignores capitalization unless you enable Case sensitive.'],
            ['q' => 'How do I shuffle a list randomly?', 'a' => 'Choose Random. Each click on <strong>Shuffle again</strong> produces a new random order — handy for raffles, team assignments or quiz questions.'],
            ['q' => 'Does it work with accented and non-English words?', 'a' => 'Yes. Sorting uses locale-aware comparison, so accented letters are placed next to their base letters.'],
            ['q' => 'Is my list uploaded?', 'a' => 'No. Sorting happens in your browser.'],
        ],
    ],

    'split-pdf' => [
        'steps' => [
            'Drop a PDF into the box or click to browse. The number of pages is shown once it loads.',
            'Choose a mode: <strong>Extract pages</strong> into one new PDF, <strong>Split by ranges</strong> into several PDFs, or <strong>Every page</strong> as a separate PDF.',
            'Type the pages or ranges, for example <code>1-3, 5, 8-</code> (<code>8-</code> means page 8 to the end).',
            'Click <strong>Split PDF</strong>. One file downloads directly; several files download together as a ZIP.',
        ],
        'faq' => [
            ['q' => 'How do I extract specific pages from a PDF?', 'a' => 'Choose Extract pages and type the page numbers, such as <code>2, 4-6</code>. You get a new PDF containing only those pages, in that order.'],
            ['q' => 'Can I split a PDF into multiple files?', 'a' => 'Yes. Use Split by ranges: each comma-separated range becomes its own PDF. Or choose Every page to save each page as a separate file.'],
            ['q' => 'Is my PDF uploaded?', 'a' => 'No. The PDF is split in your browser and never leaves your device, which makes it safe for contracts, invoices and other private documents.'],
            ['q' => 'Is the original file changed?', 'a' => 'No. Your original PDF stays exactly as it is; the tool only creates new files.'],
            ['q' => 'Does it work with password-protected PDFs?', 'a' => 'No. Remove the password from the PDF first.'],
        ],
    ],

    'svg-to-png' => [
        'steps' => [
            'Drop your SVG files into the box or click to browse. You can convert several at once.',
            'Choose the <strong>Scale</strong>. SVG is a vector format, so 2× or 4× gives crisp PNGs for high-resolution screens.',
            'Keep the background transparent, or pick a solid color.',
            'Download each PNG or click <strong>Download All</strong> for a ZIP.',
        ],
        'faq' => [
            ['q' => 'How big will the PNG be?', 'a' => 'The PNG uses the size defined in the SVG (its width and height, or its viewBox) multiplied by the scale you choose. A 24×24 icon at 4× becomes 96×96 pixels.'],
            ['q' => 'Is the transparent background kept?', 'a' => 'Yes, by default. Untick <strong>Transparent background</strong> to fill it with a color instead.'],
            ['q' => 'Why does my SVG look different?', 'a' => 'SVGs that load external fonts or images from other websites cannot include them in the PNG. Convert text to outlines in your design tool for an exact result.'],
            ['q' => 'Is it safe to convert SVG files?', 'a' => 'Yes. SVGs are rendered as images in your browser, so any scripts inside them never run, and the files are never uploaded.'],
        ],
    ],

    'text-compare' => [
        'steps' => [
            'Paste the original text on the left and the changed text on the right.',
            'The differences appear below instantly: <span class=\'rounded bg-danger-soft px-1 text-danger\'>removed</span> text in red and <span class=\'rounded bg-success-soft px-1 text-success\'>added</span> text in green.',
            'Compare <strong>by line</strong> for code, lists and documents, or <strong>by word</strong> to spot small edits in sentences.',
            'Ignore case or extra whitespace when only the wording matters.',
        ],
        'faq' => [
            ['q' => 'How does the text comparison work?', 'a' => 'The tool uses the Myers diff algorithm — the same approach used by Git — to find the smallest set of insertions and deletions that turns the original text into the new one.'],
            ['q' => 'Should I compare by line or by word?', 'a' => 'Line mode is best for code, CSV data, lists and long documents. Word mode highlights the exact words that changed inside sentences, which is ideal for proofreading and contract revisions.'],
            ['q' => 'Can I compare code?', 'a' => 'Yes. Use line mode. Enable Ignore whitespace to skip indentation-only changes.'],
            ['q' => 'Is there a size limit?', 'a' => 'Texts with thousands of lines compare instantly. If the two texts are extremely different, the tool asks you to compare smaller sections.'],
            ['q' => 'Is my text uploaded?', 'a' => 'No. The comparison runs entirely in your browser, so confidential documents stay private.'],
        ],
    ],

    'timestamp-converter' => [
        'steps' => [
            'The current Unix timestamp is shown at the top and updates every second.',
            'Paste a timestamp in <strong>Timestamp to date</strong>. Seconds and milliseconds are detected automatically.',
            'See it as local time, UTC, ISO 8601 and relative time (for example “3 days ago”).',
            'Use <strong>Date to timestamp</strong> to convert a date and time back, in your local time zone or UTC.',
        ],
        'faq' => [
            ['q' => 'What is a Unix timestamp?', 'a' => 'A Unix timestamp (epoch time) is the number of seconds since January 1, 1970 at 00:00:00 UTC. It is used by databases, APIs, logs and programming languages because it is the same in every time zone.'],
            ['q' => 'Seconds or milliseconds?', 'a' => 'Most systems (Unix, PHP, Python, databases) use seconds — 10 digits today. JavaScript and Java use milliseconds — 13 digits. The converter detects which one you pasted.'],
            ['q' => 'What is the year 2038 problem?', 'a' => 'Systems that store timestamps as signed 32-bit integers overflow on January 19, 2038 (timestamp 2147483647). Modern systems use 64-bit values, which last for billions of years.'],
            ['q' => 'How do I get the current timestamp in code?', 'a' => 'JavaScript: <code>Math.floor(Date.now() / 1000)</code>. PHP: <code>time()</code>. Python: <code>int(time.time())</code>. SQL (MySQL): <code>UNIX_TIMESTAMP()</code>.'],
        ],
    ],

    'tip-calculator' => [
        'steps' => [
            'Enter the bill amount (before or after tax — your choice).',
            'Choose a tip percentage with the quick buttons or type a custom one.',
            'Set how many people are splitting the bill.',
            'See the tip, the total and what each person pays. Turn on <strong>Round up</strong> to get a whole amount per person.',
        ],
        'faq' => [
            ['q' => 'How much should I tip?', 'a' => 'In the United States, 15–20% is standard for table service at restaurants, with 18–20% common for good service. Customs vary a lot by country — in many places a service charge is already included.'],
            ['q' => 'Should I tip on the amount before or after tax?', 'a' => 'Tipping on the pre-tax amount is common and perfectly acceptable. Tipping on the total including tax is slightly more generous.'],
            ['q' => 'How is the bill split?', 'a' => 'The tip is added to the bill and the total is divided equally by the number of people. With Round up enabled, each share is rounded up to the next whole unit and the extra goes to the tip.'],
            ['q' => 'How do I calculate a 20% tip quickly?', 'a' => 'Move the decimal point one place to the left to get 10%, then double it. For an $85 bill: 10% is $8.50, so 20% is $17.'],
        ],
    ],

    'unit-converter' => [
        'steps' => [
            'Pick a category: length, weight, temperature, volume, area, speed, time or data.',
            'Enter a value and choose the units to convert <strong>from</strong> and <strong>to</strong>.',
            'The result updates instantly. Use <strong>Swap</strong> to reverse the conversion.',
            'See the same value in every other unit of the category in the table below.',
        ],
        'faq' => [
            ['q' => 'How many centimeters are in an inch?', 'a' => 'Exactly 2.54 centimeters. One foot is 30.48 cm and one mile is 1.609344 kilometers — these are exact international definitions.'],
            ['q' => 'How do I convert Celsius to Fahrenheit?', 'a' => 'Multiply by 9/5 and add 32: °F = °C × 9/5 + 32. For example, 20 °C is 68 °F. To go back, subtract 32 and multiply by 5/9.'],
            ['q' => 'How many pounds are in a kilogram?', 'a' => 'One kilogram is about 2.2046 pounds, and one pound is exactly 0.45359237 kilograms.'],
            ['q' => 'Are cups and gallons US or UK units?', 'a' => 'Cups, fluid ounces, pints, quarts and gallons use US customary measures. UK (imperial) gallons are listed separately because they are about 20% larger.'],
            ['q' => 'What is the difference between MB and MiB?', 'a' => 'A megabyte (MB) is 1,000,000 bytes, used by storage makers. A mebibyte (MiB) is 1,048,576 bytes (1024²), used by many operating systems. That is why a 1 TB drive shows about 931 GiB.'],
        ],
    ],

    'url-encoder' => [
        'steps' => [
            'Choose <strong>Encode</strong> to percent-encode text, or <strong>Decode</strong> to convert <code>%20</code>-style sequences back to readable text.',
            'Paste your text or URL. The result updates as you type.',
            'Use <strong>Component</strong> for query values and path segments, or <strong>Full URL</strong> to keep characters like <code>/</code>, <code>?</code> and <code>&amp;</code> intact.',
            'When the input is a full URL, its parts and query parameters are listed in a table below.',
        ],
        'faq' => [
            ['q' => 'What is URL encoding?', 'a' => 'URL encoding (percent-encoding) replaces characters that are not allowed in URLs with a <code>%</code> followed by two hexadecimal digits. For example, a space becomes <code>%20</code> and <code>é</code> becomes <code>%C3%A9</code>.'],
            ['q' => 'What is the difference between Component and Full URL?', 'a' => 'Component mode (<code>encodeURIComponent</code>) encodes every reserved character, which is what you want for a single query value. Full URL mode (<code>encodeURI</code>) leaves characters that structure a URL — such as <code>:</code>, <code>/</code>, <code>?</code>, <code>&amp;</code> and <code>=</code> — untouched.'],
            ['q' => 'Why do some URLs use + for spaces?', 'a' => 'HTML forms encode spaces as <code>+</code> in query strings. Keep <strong>Treat + as space</strong> enabled when decoding form data or query strings.'],
            ['q' => 'Is my data sent anywhere?', 'a' => 'No. Everything is processed in your browser.'],
        ],
    ],

    'uuid-generator' => [
        'steps' => [
            'Choose how many UUIDs you need (up to 1,000 at a time).',
            'Pick the version: <strong>v4</strong> (random, the most common) or <strong>v7</strong> (time-ordered, ideal for database keys).',
            'Optionally switch to uppercase, remove hyphens or wrap each UUID in braces.',
            'Copy the list or download it as a text file. Click <strong>Generate</strong> for a fresh batch.',
        ],
        'faq' => [
            ['q' => 'What is a UUID?', 'a' => 'A UUID (Universally Unique Identifier), also called a GUID, is a 128-bit identifier written as 32 hexadecimal digits, for example <code>123e4567-e89b-42d3-a456-426614174000</code>. UUIDs can be generated anywhere without coordination and are practically guaranteed to be unique.'],
            ['q' => 'Should I use UUID v4 or v7?', 'a' => 'v4 is fully random and works everywhere. v7 starts with a timestamp, so new IDs sort in creation order — this makes database indexes faster and more compact. Use v7 for primary keys when your stack supports it.'],
            ['q' => 'Are these UUIDs secure and unique?', 'a' => 'They are generated with your browser\'s cryptographically secure random number generator (Web Crypto API). The chance of a v4 collision is astronomically small.'],
            ['q' => 'Is a GUID the same as a UUID?', 'a' => 'Yes. GUID is the name Microsoft uses for the same 128-bit identifier format. Use the uppercase and braces options to get the classic <code>{XXXXXXXX-...}</code> GUID style.'],
        ],
    ],

    'webp-to-jpg' => [
        'steps' => [
            'Drop your WebP images into the box or click to browse. Batch conversion is supported.',
            'Set the JPG <strong>Quality</strong>. 85–92% gives excellent results for photos.',
            'Each image is converted to JPG in your browser. Transparent areas become white, because JPG has no transparency.',
            'Download the JPG files individually or all at once as a ZIP.',
        ],
        'faq' => [
            ['q' => 'Why convert WebP to JPG?', 'a' => 'JPG works everywhere: older photo editors, email clients, office documents, printing services and social platforms that do not accept WebP uploads.'],
            ['q' => 'What happens to transparent backgrounds?', 'a' => 'JPG does not support transparency, so transparent areas are filled with white. To keep transparency, convert to PNG with the Image Compressor or Image Resizer instead.'],
            ['q' => 'Will the image quality drop?', 'a' => 'At 85% quality or higher the difference is not visible for photos. The JPG may be larger than the WebP because JPG compression is less efficient.'],
            ['q' => 'Are my images uploaded?', 'a' => 'No. Conversion happens in your browser and your images never leave your device.'],
        ],
    ],

    'webp-to-png' => [
        'steps' => [
            'Drop your WebP images into the box, or click to browse. Batch conversion is supported.',
            'Each image is converted to PNG instantly, keeping transparent backgrounds.',
            'Check the size of each converted file.',
            'Download images one by one or click <strong>Download All</strong> for a ZIP.',
        ],
        'faq' => [
            ['q' => 'Why convert WebP to PNG?', 'a' => 'Many image editors, design tools, presentation apps and upload forms still do not accept WebP. PNG works everywhere and keeps full quality.'],
            ['q' => 'Is transparency preserved?', 'a' => 'Yes. Unlike JPG, PNG supports transparency, so logos, icons and stickers keep their transparent background.'],
            ['q' => 'Should I choose PNG or JPG?', 'a' => 'Choose PNG for graphics, logos, screenshots and anything with transparency. For photos where a smaller file matters more, use WebP to JPG.'],
            ['q' => 'Are my images uploaded?', 'a' => 'No. The conversion runs entirely in your browser.'],
        ],
    ],

    'word-counter' => [
        'steps' => [
            'Type or paste your text into the box. Counts update instantly as you write.',
            'See the number of words, characters (with and without spaces), sentences, paragraphs and lines.',
            'Check the estimated reading and speaking time — useful for blog posts, speeches and presentations.',
            'Review the top keywords and their density to avoid overusing words and to check SEO focus.',
        ],
        'faq' => [
            ['q' => 'How are words counted?', 'a' => 'A word is any sequence of letters or numbers. Contractions such as <em>it’s</em> and hyphenated words such as <em>well-known</em> count as one word. Punctuation and emoji are not counted as words.'],
            ['q' => 'Are spaces included in the character count?', 'a' => 'Both are shown: <strong>Characters</strong> includes spaces and line breaks, and <strong>Characters (no spaces)</strong> excludes all whitespace. Emoji and accented letters count as one character each.'],
            ['q' => 'How is reading time calculated?', 'a' => 'Reading time assumes an average silent reading speed of 238 words per minute. Speaking time assumes 130 words per minute, a typical pace for presentations.'],
            ['q' => 'What is keyword density?', 'a' => 'Keyword density is how often a word appears compared with the total number of words. Common words such as <em>the</em> and <em>and</em> are ignored so you can see the words that define your text.'],
            ['q' => 'Is my text saved or uploaded?', 'a' => 'No. Everything is counted in your browser. Your text is never sent to a server.'],
        ],
    ],

    'credit-card-payoff-calculator' => [
        'steps' => [
            'Enter your <strong>card balance</strong> and its <strong>APR</strong> (you can find both on your statement).',
            'Choose <strong>Pay a fixed amount</strong> and enter your monthly payment, or <strong>Be debt-free by</strong> and pick a number of months.',
            'See your debt-free date, total interest and the comparison with paying only the minimum.',
            'Copy the link to save your plan or share it.',
        ],
        'faq' => [
            ['q' => 'How long will it take to pay off my credit card?', 'a' => 'It depends on the balance, the APR and how much you pay each month. Enter them above to see the exact number of months. Paying only the minimum can stretch a few thousand dollars of debt over 15 years or more.'],
            ['q' => 'How is credit card interest calculated?', 'a' => 'Cards charge interest monthly at roughly the APR divided by 12, applied to your balance. Most issuers use the average daily balance, so results here are a close estimate rather than an exact match with your statement.'],
            ['q' => 'How much should I pay to be debt-free in 2 years?', 'a' => 'Switch to <strong>Be debt-free by</strong> and enter 24 months. The calculator shows the fixed monthly payment that clears the balance in that time.'],
            ['q' => 'Why does the minimum payment take so long?', 'a' => 'The minimum is usually the interest plus about 1% of the balance, so it shrinks as the balance shrinks and most of each payment goes to interest. You can change these terms under <strong>Minimum payment terms</strong>.'],
            ['q' => 'Does this include new purchases?', 'a' => 'No. The estimate assumes you stop using the card, the rate stays the same and every payment is on time.'],
        ],
    ],

    'loan-comparison-calculator' => [
        'steps' => [
            'Enter each <strong>loan offer</strong>: amount, interest rate, term and any upfront <strong>fees</strong>.',
            'Add up to four offers with <strong>Add another offer</strong>.',
            'Compare the monthly payment, total interest, total cost of borrowing and effective APR of each one.',
            'Look for the <strong>Cheapest overall</strong> and <strong>Lowest payment</strong> badges to decide.',
        ],
        'faq' => [
            ['q' => 'How do I compare two loan offers?', 'a' => 'Compare the total cost of borrowing — interest plus fees — not just the rate or the monthly payment. Enter both offers here and the cheapest one is highlighted.'],
            ['q' => 'What is the effective APR?', 'a' => 'It is the annual rate that includes upfront fees as well as interest. Because fees reduce the money you actually receive, the effective APR is higher than the quoted rate whenever a loan has fees.'],
            ['q' => 'Is a lower monthly payment better?', 'a' => 'Not necessarily. A longer term lowers the payment but usually increases total interest. Choose the lowest payment only if you need the monthly room in your budget.'],
            ['q' => 'Which fees should I include?', 'a' => 'Include fees you pay to get the loan, such as origination, arrangement, application or closing fees. Do not include optional insurance or late-payment fees.'],
            ['q' => 'Is my information stored?', 'a' => 'No. All calculations run in your browser and nothing you enter is sent to our servers.'],
        ],
    ],

    'organize-pdf' => [
        'steps' => [
            'Drop a PDF into the box or click to browse. A preview of every page appears.',
            'Drag pages into the order you want, or use the arrows under each page.',
            'Click a page to rotate it, or use the trash icon to remove it.',
            'Click <strong>Download organized PDF</strong> to save the new file.',
        ],
        'faq' => [
            ['q' => 'How do I change the order of pages in a PDF?', 'a' => 'Open the PDF here and drag each page to its new position. On a phone, use the arrows under each page. Then download the organized file.'],
            ['q' => 'Can I rotate and delete pages at the same time?', 'a' => 'Yes. Clicking a page rotates it by 90 degrees and the trash icon marks it for removal, so you can fix everything in one pass.'],
            ['q' => 'Can I undo my changes?', 'a' => 'Use <strong>Original order</strong> to restore the initial order. Your original file is never modified; the tool downloads a new copy.'],
            ['q' => 'Is my PDF uploaded?', 'a' => 'No. Pages are previewed and rebuilt in your browser, so the document never leaves your device.'],
            ['q' => 'Can I organize pages from several PDFs?', 'a' => 'Combine the files with Merge PDF first, then open the merged file here to arrange its pages.'],
        ],
    ],

    'add-page-numbers-to-pdf' => [
        'steps' => [
            'Drop a PDF into the box or click to browse.',
            'Choose the <strong>position</strong> and the <strong>format</strong> of the numbers. The preview shows how they will look.',
            'To skip a cover page, start numbering on page 2. Change the first number if needed.',
            'Click <strong>Add page numbers</strong> to download the numbered PDF.',
        ],
        'faq' => [
            ['q' => 'How do I add page numbers to a PDF?', 'a' => 'Open the PDF here, pick where the numbers go and their format, then click <strong>Add page numbers</strong>. The numbered copy downloads in seconds.'],
            ['q' => 'Can I skip the first page?', 'a' => 'Yes. Set <strong>Start numbering on page</strong> to 2 and the cover stays clean. Set the first number to 1 if the second page should be numbered 1.'],
            ['q' => 'Which formats are available?', 'a' => 'A plain number, &quot;1 / 10&quot;, &quot;Page 1&quot; and &quot;Page 1 of 10&quot;, in small, medium or large text, in any corner or centered.'],
            ['q' => 'What about landscape or rotated pages?', 'a' => 'Numbers are placed relative to how each page is displayed, so they appear upright on rotated and landscape pages too.'],
            ['q' => 'Is my PDF uploaded?', 'a' => 'No. The numbers are added in your browser and the file never leaves your device.'],
        ],
    ],
];
