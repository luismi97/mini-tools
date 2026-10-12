// Runs regex matching off the main thread; the page terminates it on timeout.
import { findMatches, replaceAll } from './regex';

self.onmessage = (event) => {
    const { id, pattern, flags, text, replacement } = event.data;
    try {
        const result = findMatches(pattern, flags, text);
        const replaced = replacement === null ? null : replaceAll(pattern, flags, text, replacement);
        self.postMessage({ id, ok: true, ...result, replaced });
    } catch (e) {
        self.postMessage({ id, ok: false, error: e.message });
    }
};
