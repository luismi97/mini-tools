import { csvToJson } from '../lib/csv';
import { formatJson } from '../lib/json';
import { textTool } from '../lib/text-tool';

const SAMPLE = `id,name,email,city,zip,active
1,Ada Lovelace,ada@example.com,London,00501,true
2,Alan Turing,alan@example.com,"Manchester, UK",,false
3,Grace Hopper,grace@example.com,New York,10001,true`;

document.addEventListener('alpine:init', () => {
    window.Alpine.data('csvToJson', () =>
        textTool({
            options: { delimiter: 'auto', header: true, inferTypes: true, indent: '2' },
            convert(input, o) {
                const delimiter = o.delimiter === 'tab' ? '\t' : o.delimiter;
                const rows = csvToJson(input, { delimiter, header: o.header, inferTypes: o.inferTypes });
                return o.indent === 'min' ? JSON.stringify(rows) : formatJson(rows, o.indent);
            },
            filename: 'data.json',
            mimeType: 'application/json',
            sample: SAMPLE,
        }),
    );
});
