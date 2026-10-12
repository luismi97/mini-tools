import { removeDuplicateLines } from '../lib/text';
import { textTool } from '../lib/text-tool';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('removeDuplicateLines', () =>
        textTool({
            options: { caseSensitive: false, trim: true, removeEmpty: true },
            convert(input, o) {
                const { text, removed, kept } = removeDuplicateLines(input, o);
                return { text, meta: { removed, kept } };
            },
            filename: 'unique-lines.txt',
            sample: 'apple\nbanana\nApple\ncherry\nbanana\n\nbanana\ndate',
        }),
    );
});
