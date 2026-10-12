import { CASES, convertCase } from '../lib/text';
import { textTool } from '../lib/text-tool';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('caseConverter', () => ({
        ...textTool({
            options: { mode: 'title' },
            convert: (input, o) => convertCase(input, o.mode),
            filename: 'converted-text.txt',
            sample: 'the quick brown fox jumps over the lazy dog. it was a sunny day in the city of new york.',
        }),
        cases: CASES,
    }));
});
