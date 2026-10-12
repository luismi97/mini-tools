import { makeTeams, pickRandom } from '../lib/random';
import { track } from '../lib/analytics';
import { copyText } from '../lib/utils';
import { t } from '../lib/i18n';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('randomNamePicker', () => ({
        input: 'Ada\nAlan\nGrace\nLinus\nMargaret\nTim\nKatherine\nDennis',
        mode: 'pick',
        count: 1,
        teams: 2,
        removePicked: false,
        winners: [],
        groups: [],
        shuffling: false,
        display: '',
        copied: false,

        names() {
            return this.input.split(/\r?\n/).map((n) => n.trim()).filter(Boolean);
        },

        pick() {
            const names = this.names();
            if (names.length === 0) return;
            this.groups = [];
            this.shuffling = true;
            track('tool_use', { action: this.mode, entries: names.length });

            // Short "drum roll" that cycles through names before revealing the result.
            let ticks = 0;
            const timer = setInterval(() => {
                this.display = names[Math.floor(Math.random() * names.length)];
                if (++ticks >= 14) {
                    clearInterval(timer);
                    this.finish(names);
                }
            }, 60);
        },

        finish(names) {
            this.shuffling = false;
            if (this.mode === 'teams') {
                this.groups = makeTeams(names, Math.min(Number(this.teams) || 2, names.length));
                this.winners = [];
                return;
            }
            this.winners = pickRandom(names, Number(this.count) || 1);
            if (this.removePicked) {
                const remaining = [...names];
                for (const w of this.winners) remaining.splice(remaining.indexOf(w), 1);
                this.input = remaining.join('\n');
            }
        },

        async copy() {
            const text = this.mode === 'teams'
                ? this.groups.map((g, i) => `${t('Team :n', { n: i + 1 })}: ${g.join(', ')}`).join('\n')
                : this.winners.join('\n');
            this.copied = await copyText(text);
            setTimeout(() => (this.copied = false), 1500);
        },
    }));
});
