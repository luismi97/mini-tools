/**
 * Client-side tool search. The index is embedded in the page as JSON
 * (<script type="application/json" id="search-index">), so no request is made.
 */
let cachedIndex = null;

function loadIndex() {
    if (cachedIndex === null) {
        const el = document.getElementById('search-index');
        try {
            cachedIndex = el ? JSON.parse(el.textContent) : [];
        } catch {
            cachedIndex = [];
        }
    }
    return cachedIndex;
}

function normalize(value) {
    return value.toLowerCase().normalize('NFD').replace(/[̀-ͯ]/g, '');
}

export default (options = {}) => ({
    query: '',
    open: false,
    active: 0,
    shortcut: options.shortcut ?? false,

    init() {
        if (this.shortcut) {
            window.addEventListener('keydown', (event) => {
                const target = event.target;
                const typing = target.isContentEditable || ['INPUT', 'TEXTAREA', 'SELECT'].includes(target.tagName);
                if (event.key === '/' && !typing) {
                    event.preventDefault();
                    this.$refs.input.focus();
                }
            });
        }
    },

    get results() {
        const index = loadIndex();
        const terms = normalize(this.query.trim()).split(/\s+/).filter(Boolean);
        if (terms.length === 0) {
            return index.slice(0, 6);
        }

        return index
            .map((tool) => {
                const name = normalize(tool.name);
                const haystack = `${name} ${normalize(tool.alias ?? '')} ${normalize(tool.description)} ${normalize(tool.category)}`;
                if (!terms.every((term) => haystack.includes(term))) {
                    return null;
                }
                const score = terms.reduce((sum, term) => sum + (name.startsWith(term) ? 3 : name.includes(term) ? 2 : 1), 0);
                return { tool, score };
            })
            .filter(Boolean)
            .sort((a, b) => b.score - a.score)
            .slice(0, 8)
            .map((entry) => entry.tool);
    },

    show() {
        this.open = true;
        this.active = 0;
    },

    close() {
        this.open = false;
    },

    move(step) {
        const count = this.results.length;
        if (!count) return;
        this.open = true;
        this.active = (this.active + step + count) % count;
    },

    go() {
        const tool = this.results[this.active];
        if (tool) {
            window.location.href = tool.url;
        }
    },
});
