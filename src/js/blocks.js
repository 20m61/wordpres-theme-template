/**
 * Kawaii Ultra - Blocks Editor JavaScript
 * Block editor functionality for custom blocks
 */

(function() {
    'use strict';

    const { registerBlockType } = wp.blocks;
    const { createElement: el } = wp.element;
    const { 
        InspectorControls, 
        MediaUpload, 
        RichText, 
        URLInput,
        ColorPalette 
    } = wp.blockEditor;
    const { 
        PanelBody, 
        TextControl, 
        SelectControl, 
        ToggleControl, 
        RangeControl, 
        Button 
    } = wp.components;
    const { __ } = wp.i18n;

    /**
     * Register Kawaii Button Block
     */
    registerBlockType('kawaii-ultra/button', {
        title: __('Kawaii Button', 'kawaii-ultra'),
        icon: '🌸',
        category: 'kawaii-blocks',
        description: __('A cute button with kawaii styling', 'kawaii-ultra'),
        keywords: [__('button'), __('kawaii'), __('cute')],
        
        attributes: {
            text: {
                type: 'string',
                default: 'Click me!'
            },
            url: {
                type: 'string',
                default: ''
            },
            style: {
                type: 'string',
                default: 'primary'
            },
            size: {
                type: 'string',
                default: 'medium'
            },
            backgroundColor: {
                type: 'string',
                default: ''
            },
            textColor: {
                type: 'string',
                default: ''
            }
        },

        edit: function(props) {
            const { attributes, setAttributes } = props;
            const { text, url, style, size, backgroundColor, textColor } = attributes;

            return [
                el(InspectorControls, { key: 'inspector' },
                    el(PanelBody, { title: __('Button Settings', 'kawaii-ultra') },
                        el(TextControl, {
                            label: __('Button Text', 'kawaii-ultra'),
                            value: text,
                            onChange: (value) => setAttributes({ text: value })
                        }),
                        el(SelectControl, {
                            label: __('Button Style', 'kawaii-ultra'),
                            value: style,
                            options: [
                                { label: __('Primary', 'kawaii-ultra'), value: 'primary' },
                                { label: __('Secondary', 'kawaii-ultra'), value: 'secondary' },
                                { label: __('Ghost', 'kawaii-ultra'), value: 'ghost' },
                                { label: __('Round', 'kawaii-ultra'), value: 'round' }
                            ],
                            onChange: (value) => setAttributes({ style: value })
                        }),
                        el(SelectControl, {
                            label: __('Button Size', 'kawaii-ultra'),
                            value: size,
                            options: [
                                { label: __('Small', 'kawaii-ultra'), value: 'small' },
                                { label: __('Medium', 'kawaii-ultra'), value: 'medium' },
                                { label: __('Large', 'kawaii-ultra'), value: 'large' }
                            ],
                            onChange: (value) => setAttributes({ size: value })
                        })
                    )
                ),
                el('div', { key: 'editor', className: 'kawaii-button-editor' },
                    el('button', {
                        className: `kawaii-button kawaii-button--${style} kawaii-button--${size}`,
                        style: {
                            backgroundColor: backgroundColor,
                            color: textColor
                        }
                    }, text),
                    el(URLInput, {
                        value: url,
                        onChange: (value) => setAttributes({ url: value })
                    })
                )
            ];
        },

        save: function() {
            // Rendered server-side
            return null;
        }
    });

    /**
     * Register Kawaii Card Block
     */
    registerBlockType('kawaii-ultra/card', {
        title: __('Kawaii Card', 'kawaii-ultra'),
        icon: '🎴',
        category: 'kawaii-blocks',
        description: __('A cute card component with kawaii styling', 'kawaii-ultra'),
        keywords: [__('card'), __('kawaii'), __('content')],
        
        attributes: {
            title: {
                type: 'string',
                default: 'Card Title'
            },
            content: {
                type: 'string',
                default: 'Card content goes here...'
            },
            imageUrl: {
                type: 'string',
                default: ''
            },
            imageAlt: {
                type: 'string',
                default: ''
            },
            buttonText: {
                type: 'string',
                default: ''
            },
            buttonUrl: {
                type: 'string',
                default: ''
            },
            style: {
                type: 'string',
                default: 'default'
            }
        },

        edit: function(props) {
            const { attributes, setAttributes } = props;
            const { title, content, imageUrl, imageAlt, buttonText, buttonUrl, style } = attributes;

            return [
                el(InspectorControls, { key: 'inspector' },
                    el(PanelBody, { title: __('Card Settings', 'kawaii-ultra') },
                        el(SelectControl, {
                            label: __('Card Style', 'kawaii-ultra'),
                            value: style,
                            options: [
                                { label: __('Default', 'kawaii-ultra'), value: 'default' },
                                { label: __('Minimal', 'kawaii-ultra'), value: 'minimal' },
                                { label: __('Cute', 'kawaii-ultra'), value: 'cute' },
                                { label: __('Pastel', 'kawaii-ultra'), value: 'pastel' }
                            ],
                            onChange: (value) => setAttributes({ style: value })
                        }),
                        el(MediaUpload, {
                            onSelect: (media) => {
                                setAttributes({ 
                                    imageUrl: media.url,
                                    imageAlt: media.alt 
                                });
                            },
                            type: 'image',
                            render: ({ open }) => el(Button, {
                                onClick: open,
                                className: 'button'
                            }, imageUrl ? __('Change Image', 'kawaii-ultra') : __('Add Image', 'kawaii-ultra'))
                        })
                    )
                ),
                el('div', { key: 'editor', className: `kawaii-card kawaii-card--${style}` },
                    imageUrl && el('div', { className: 'kawaii-card__image' },
                        el('img', { src: imageUrl, alt: imageAlt })
                    ),
                    el('div', { className: 'kawaii-card__content' },
                        el(RichText, {
                            tagName: 'h3',
                            className: 'kawaii-card__title',
                            value: title,
                            onChange: (value) => setAttributes({ title: value }),
                            placeholder: __('Card title...', 'kawaii-ultra')
                        }),
                        el(RichText, {
                            tagName: 'div',
                            className: 'kawaii-card__text',
                            value: content,
                            onChange: (value) => setAttributes({ content: value }),
                            placeholder: __('Card content...', 'kawaii-ultra')
                        }),
                        el(TextControl, {
                            label: __('Button Text', 'kawaii-ultra'),
                            value: buttonText,
                            onChange: (value) => setAttributes({ buttonText: value })
                        }),
                        buttonText && el(URLInput, {
                            value: buttonUrl,
                            onChange: (value) => setAttributes({ buttonUrl: value })
                        })
                    )
                )
            ];
        },

        save: function() {
            // Rendered server-side
            return null;
        }
    });

    /**
     * Register Kawaii Gallery Block
     */
    registerBlockType('kawaii-ultra/gallery', {
        title: __('Kawaii Gallery', 'kawaii-ultra'),
        icon: '🖼️',
        category: 'kawaii-blocks',
        description: __('A cute gallery with kawaii styling', 'kawaii-ultra'),
        keywords: [__('gallery'), __('images'), __('kawaii')],
        
        attributes: {
            images: {
                type: 'array',
                default: []
            },
            columns: {
                type: 'number',
                default: 3
            },
            style: {
                type: 'string',
                default: 'grid'
            },
            spacing: {
                type: 'string',
                default: 'medium'
            },
            showCaptions: {
                type: 'boolean',
                default: false
            },
            lightbox: {
                type: 'boolean',
                default: true
            }
        },

        edit: function(props) {
            const { attributes, setAttributes } = props;
            const { images, columns, style, spacing, showCaptions, lightbox } = attributes;

            return [
                el(InspectorControls, { key: 'inspector' },
                    el(PanelBody, { title: __('Gallery Settings', 'kawaii-ultra') },
                        el(RangeControl, {
                            label: __('Columns', 'kawaii-ultra'),
                            value: columns,
                            onChange: (value) => setAttributes({ columns: value }),
                            min: 1,
                            max: 6
                        }),
                        el(SelectControl, {
                            label: __('Gallery Style', 'kawaii-ultra'),
                            value: style,
                            options: [
                                { label: __('Grid', 'kawaii-ultra'), value: 'grid' },
                                { label: __('Masonry', 'kawaii-ultra'), value: 'masonry' },
                                { label: __('Carousel', 'kawaii-ultra'), value: 'carousel' },
                                { label: __('Collage', 'kawaii-ultra'), value: 'collage' }
                            ],
                            onChange: (value) => setAttributes({ style: value })
                        }),
                        el(SelectControl, {
                            label: __('Spacing', 'kawaii-ultra'),
                            value: spacing,
                            options: [
                                { label: __('None', 'kawaii-ultra'), value: 'none' },
                                { label: __('Small', 'kawaii-ultra'), value: 'small' },
                                { label: __('Medium', 'kawaii-ultra'), value: 'medium' },
                                { label: __('Large', 'kawaii-ultra'), value: 'large' }
                            ],
                            onChange: (value) => setAttributes({ spacing: value })
                        }),
                        el(ToggleControl, {
                            label: __('Show Captions', 'kawaii-ultra'),
                            checked: showCaptions,
                            onChange: (value) => setAttributes({ showCaptions: value })
                        }),
                        el(ToggleControl, {
                            label: __('Enable Lightbox', 'kawaii-ultra'),
                            checked: lightbox,
                            onChange: (value) => setAttributes({ lightbox: value })
                        })
                    )
                ),
                el('div', { key: 'editor', className: 'kawaii-gallery-editor' },
                    images.length === 0 ? 
                        el(MediaUpload, {
                            onSelect: (media) => {
                                setAttributes({ images: media });
                            },
                            multiple: true,
                            type: 'image',
                            render: ({ open }) => el(Button, {
                                onClick: open,
                                className: 'button button-large'
                            }, __('Add Images', 'kawaii-ultra'))
                        }) :
                        el('div', { 
                            className: `kawaii-gallery kawaii-gallery--${style} kawaii-gallery--columns-${columns} kawaii-gallery--spacing-${spacing}` 
                        },
                            images.map((image, index) => 
                                el('div', { 
                                    key: index, 
                                    className: 'kawaii-gallery__item' 
                                },
                                    el('img', {
                                        src: image.url,
                                        alt: image.alt,
                                        className: 'kawaii-gallery__image'
                                    }),
                                    showCaptions && image.caption && 
                                        el('div', { 
                                            className: 'kawaii-gallery__caption' 
                                        }, image.caption)
                                )
                            ),
                            el(Button, {
                                onClick: () => {
                                    wp.media({
                                        title: __('Edit Gallery', 'kawaii-ultra'),
                                        multiple: true,
                                        library: { type: 'image' }
                                    }).open().on('select', function() {
                                        const selection = this.state().get('selection');
                                        const images = selection.map(attachment => ({
                                            id: attachment.id,
                                            url: attachment.attributes.url,
                                            alt: attachment.attributes.alt,
                                            caption: attachment.attributes.caption
                                        }));
                                        setAttributes({ images: images });
                                    });
                                },
                                className: 'button'
                            }, __('Edit Gallery', 'kawaii-ultra'))
                        )
                )
            ];
        },

        save: function() {
            // Rendered server-side
            return null;
        }
    });

    /**
     * Register block category
     */
    wp.blocks.getCategories().push({
        slug: 'kawaii-blocks',
        title: __('Kawaii Blocks', 'kawaii-ultra'),
        icon: '🌸'
    });

})();