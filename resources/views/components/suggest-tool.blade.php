{{--
    "Suggest a tool" form. No backend: submitting opens the visitor's email app with the
    suggestion addressed to SITE_CONTACT_EMAIL, so nothing is stored and public pages stay
    cookie-free. "Copy suggestion" covers visitors without a configured email app.
--}}
@php
    $email = config('site.contact_email');
    $strings = [
        'subject' => __('Tool suggestion: :name', ['name' => '__NAME__']),
        'tool' => __('Tool'),
        'does' => __('What it should do'),
        'example' => __('Example'),
        'replyTo' => __('Reply to'),
        'page' => url()->current(),
    ];
@endphp
<div x-data="{
        name: '', details: '', example: '', reply: '', sent: false, copied: false,
        s: @js($strings),
        body() {
            return [
                this.s.tool + ': ' + this.name.trim(),
                '',
                this.s.does + ':',
                this.details.trim(),
                this.example.trim() ? '\n' + this.s.example + ': ' + this.example.trim() : '',
                this.reply.trim() ? this.s.replyTo + ': ' + this.reply.trim() : '',
                '',
                '— ' + this.s.page,
            ].filter((line, i, all) => line !== '' || all[i - 1] !== '').join('\n');
        },
        subject() { return this.s.subject.replace('__NAME__', this.name.trim()); },
        send() {
            window.location.href = 'mailto:' + @js($email) + '?subject=' + encodeURIComponent(this.subject()) + '&body=' + encodeURIComponent(this.body());
            this.sent = true;
        },
        async copy() {
            try { await navigator.clipboard.writeText(this.subject() + '\n\n' + this.body()); this.copied = true; setTimeout(() => this.copied = false, 2000); } catch (e) {}
        },
    }">
    <p>{{ __('Missing a tool? Tell us what you need and we will consider it for a future update. We read every suggestion, and the most requested tools are built first.') }}</p>

    <form class="panel not-prose mt-8 space-y-5 p-5 sm:p-6" @submit.prevent="send()">
        <div>
            <label for="suggest-name" class="label">{{ __('Tool name') }}</label>
            <input id="suggest-name" type="text" x-model="name" required maxlength="120" class="field" placeholder="{{ __('e.g. Markdown to HTML') }}">
        </div>
        <div>
            <label for="suggest-details" class="label">{{ __('What should it do?') }}</label>
            <textarea id="suggest-details" x-model="details" required maxlength="1500" rows="5" class="field" placeholder="{{ __('Describe the task it would solve and how you would use it.') }}"></textarea>
        </div>
        <div>
            <label for="suggest-example" class="label">{{ __('Example or link') }} <span class="font-normal text-faint">{{ __('(optional)') }}</span></label>
            <input id="suggest-example" type="text" x-model="example" maxlength="300" class="field" placeholder="{{ __('A file type, a website that does something similar…') }}">
        </div>
        <div>
            <label for="suggest-reply" class="label">{{ __('Your email') }} <span class="font-normal text-faint">{{ __('(optional)') }}</span></label>
            <input id="suggest-reply" type="email" x-model="reply" maxlength="200" class="field" autocomplete="email">
            <p class="mt-1 text-xs text-muted">{{ __('Only if you want a reply.') }}</p>
        </div>

        <div class="flex flex-wrap items-center gap-3">
            <button type="submit" class="btn btn-primary">
                <x-icon name="send" :size="16" /> {{ __('Send suggestion') }}
            </button>
            <button type="button" class="btn btn-secondary" @click="copy()" :disabled="!name.trim() || !details.trim()">
                <x-icon name="copy" :size="16" /> <span x-text="copied ? $t('Copied') : @js(__('Copy suggestion'))">{{ __('Copy suggestion') }}</span>
            </button>
        </div>
        <p class="text-sm text-muted">{{ __('Your email app opens with the suggestion ready to send. Nothing is stored on our servers.') }}</p>
        <p x-show="sent" x-cloak class="rounded-lg bg-success-soft px-3 py-2 text-sm text-ink" role="status">
            {{ __('Email app didn’t open? Copy the suggestion and send it to :email.', ['email' => $email]) }}
        </p>
    </form>

    <h2>{{ __('What makes a good suggestion') }}</h2>
    <ul>
        <li>{{ __('A clear, everyday task, for example “convert X to Y” or “calculate Z”.') }}</li>
        <li>{{ __('Something that can run privately in the browser, without uploading files.') }}</li>
        <li>{{ __('Who it would help: students, developers, small businesses…') }}</li>
    </ul>
</div>
