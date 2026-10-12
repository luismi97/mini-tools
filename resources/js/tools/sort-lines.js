import { sortLines } from '../lib/text';
import { textTool } from '../lib/text-tool';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('sortLines', () =>
        textTool({
            options: { order: 'asc', natural: true, caseSensitive: false, removeEmpty: true, unique: false, seed: 0 },
            convert: (input, o) => sortLines(input, o),
            filename: 'sorted-lines.txt',
            sample: 'banana\nApple\nitem 10\ncherry\nitem 2\napple\nDate',
        }),
    );
});
