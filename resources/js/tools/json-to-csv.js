import { jsonToCsv, parseJson } from '../lib/json';
import { textTool } from '../lib/text-tool';
import { t } from '../lib/i18n';

const SAMPLE = JSON.stringify([
    { id: 1, name: 'Ada Lovelace', email: 'ada@example.com', address: { city: 'London', country: 'UK' }, active: true },
    { id: 2, name: 'Alan Turing', email: 'alan@example.com', address: { city: 'Manchester', country: 'UK' }, active: false },
    { id: 3, name: 'Grace Hopper', email: 'grace@example.com', address: { city: 'New York', country: 'US' }, tags: ['navy', 'cobol'] },
], null, 2);

document.addEventListener('alpine:init', () => {
    window.Alpine.data('jsonToCsv', () =>
        textTool({
            options: { delimiter: ',' },
            convert(input, o) {
                const result = parseJson(input);
                if (!result.ok) {
                    const where = result.error.line ? t('Line :line, column :column: ', { line: result.error.line, column: result.error.column }) : '';
                    throw new Error(where + result.error.message);
                }
                return jsonToCsv(result.value, o.delimiter === 'tab' ? '\t' : o.delimiter);
            },
            filename: 'data.csv',
            mimeType: 'text/csv',
            sample: SAMPLE,
        }),
    );
});
