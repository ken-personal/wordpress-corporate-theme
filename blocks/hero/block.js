
const { registerBlockType } = wp.blocks;
const { TextControl } = wp.components;
const { __ } = wp.i18n;

registerBlockType('lightning-child/hero', {
    edit: function({ attributes, setAttributes }) {
        return wp.element.createElement('div', { style: { padding: '20px', background: '#1e3a5f', color: 'white' } },
            wp.element.createElement('p', {}, 'ヒーローブロック（編集画面）'),
            wp.element.createElement(TextControl, {
                label: 'タイトル',
                value: attributes.title || '',
                onChange: (val) => setAttributes({ title: val })
            }),
            wp.element.createElement(TextControl, {
                label: 'サブタイトル',
                value: attributes.subtitle || '',
                onChange: (val) => setAttributes({ subtitle: val })
            }),
            wp.element.createElement(TextControl, {
                label: 'ボタンテキスト',
                value: attributes.btnText || '',
                onChange: (val) => setAttributes({ btnText: val })
            }),
            wp.element.createElement(TextControl, {
                label: 'ボタンURL',
                value: attributes.btnUrl || '',
                onChange: (val) => setAttributes({ btnUrl: val })
            })
        );
    },
    save: function() {
        return null;
    }
});
