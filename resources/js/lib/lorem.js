/**
 * Lorem ipsum generator (pure, unit-tested). `random` is injectable for tests.
 */

const WORDS = ('lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua enim ad minim veniam quis nostrud exercitation ullamco laboris nisi aliquip ex ea commodo consequat duis aute irure in reprehenderit voluptate velit esse cillum fugiat nulla pariatur excepteur sint occaecat cupidatat non proident sunt culpa qui officia deserunt mollit anim id est laborum '
    + 'at vero eos accusamus iusto odio dignissimos ducimus blanditiis praesentium voluptatum deleniti atque corrupti quos dolores quas molestias excepturi occaecati cupiditate similique mollitia animi dolorum fuga harum quidem rerum facilis expedita distinctio nam libero tempore cum soluta nobis eligendi optio cumque nihil impedit quo minus quod maxime placeat facere possimus omnis voluptas assumenda repellendus temporibus autem quibusdam officiis debitis aut necessitatibus saepe eveniet voluptates repudiandae recusandae itaque earum hic tenetur sapiente delectus reiciendis voluptatibus maiores alias perferendis doloribus asperiores repellat')
    .split(' ');

const CLASSIC = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';

const pick = (random) => WORDS[Math.floor(random() * WORDS.length)];
const between = (random, min, max) => min + Math.floor(random() * (max - min + 1));

function sentence(random) {
    const count = between(random, 7, 15);
    const parts = Array.from({ length: count }, () => pick(random));
    // Occasionally add a comma for a natural rhythm.
    if (count > 9) parts[between(random, 3, count - 4)] += ',';
    const text = parts.join(' ');
    return text.charAt(0).toUpperCase() + text.slice(1) + '.';
}

function paragraph(random) {
    return Array.from({ length: between(random, 4, 7) }, () => sentence(random)).join(' ');
}

/**
 * @param {{count: number, unit: 'paragraphs'|'sentences'|'words', startWithLorem?: boolean, html?: boolean}} options
 */
export function generateLorem({ count, unit, startWithLorem = true, html = false }, random = Math.random) {
    const n = Math.min(unit === 'words' ? 5000 : 200, Math.max(1, Math.floor(Number(count)) || 1));

    if (unit === 'words') {
        const list = Array.from({ length: n }, () => pick(random));
        if (startWithLorem) ['lorem', 'ipsum', 'dolor', 'sit', 'amet'].slice(0, n).forEach((w, i) => (list[i] = w));
        const text = list.join(' ');
        return text.charAt(0).toUpperCase() + text.slice(1) + '.';
    }

    if (unit === 'sentences') {
        const list = Array.from({ length: n }, () => sentence(random));
        if (startWithLorem) list[0] = CLASSIC;
        return list.join(' ');
    }

    const list = Array.from({ length: n }, () => paragraph(random));
    if (startWithLorem) list[0] = `${CLASSIC} ${list[0]}`;
    return html ? list.map((p) => `<p>${p}</p>`).join('\n') : list.join('\n\n');
}
