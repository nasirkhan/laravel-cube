<script>
    (() => {
        if (window.CubeShare) {
            window.CubeShare.init();
            return;
        }

        const selectors = {
            root: '[data-cube-share]',
            button: '[data-cube-share-button]'
        };

        const readMeta = (queries) => {
            for (const query of queries) {
                const node = document.querySelector(query);
                if (!node) continue;
                if (node.getAttribute('content')) return node.getAttribute('content');
                if (node.getAttribute('href')) return node.getAttribute('href');
            }
            return '';
        };

        const pageMetadata = () => ({
            url: readMeta(['meta[property="og:url"]', 'link[rel="canonical"]']) || window.location.href,
            title: readMeta(['meta[property="og:title"]', 'meta[name="twitter:title"]']) || document.title,
            text: readMeta(['meta[property="og:title"]', 'meta[name="twitter:title"]']) || document.title,
            description: readMeta(['meta[property="og:description"]', 'meta[name="description"]', 'meta[name="twitter:description"]']),
            image: readMeta(['meta[property="og:image"]', 'meta[name="twitter:image"]'])
        });

        const encode = (value) => encodeURIComponent(value || '');

        const buildUrl = (network, metadata) => {
            const url = encode(metadata.url);
            const title = encode(metadata.title);
            const text = encode(metadata.text || metadata.title);
            const via = encode(metadata.via);
            const hashtags = encode(metadata.hashtags);

            switch (network) {
                case 'facebook': return `https://www.facebook.com/sharer/sharer.php?u=${url}`;
                case 'x': return `https://twitter.com/intent/tweet?url=${url}&text=${text}${metadata.via ? `&via=${via}` : ''}${metadata.hashtags ? `&hashtags=${hashtags}` : ''}`;
                case 'linkedin': return `https://www.linkedin.com/sharing/share-offsite/?url=${url}`;
                case 'whatsapp': return `https://wa.me/?text=${encode(`${metadata.text || metadata.title} ${metadata.url}`.trim())}`;
                case 'telegram': return `https://t.me/share/url?url=${url}&text=${text}`;
                case 'reddit': return `https://www.reddit.com/submit?url=${url}&title=${title}`;
                case 'email': return `mailto:?subject=${title}&body=${encode(`${metadata.text || metadata.title}\n\n${metadata.url}${metadata.description ? `\n\n${metadata.description}` : ''}`)}`;
                default: return metadata.url;
            }
        };

        const popup = (shareUrl, width, height) => {
            const left = Math.max((window.screen.width - width) / 2, 0);
            const top = Math.max((window.screen.height - height) / 2, 0);
            window.open(shareUrl, 'cube-share', `toolbar=0,status=0,width=${width},height=${height},top=${top},left=${left}`);
        };

        const copyToClipboard = async (button, metadata) => {
            try {
                await navigator.clipboard.writeText(metadata.url);
                const label = button.querySelector('[data-cube-share-label]');
                if (!label) return;
                const original = label.textContent;
                label.textContent = button.dataset.cubeShareCopiedLabel || 'Copied';
                window.setTimeout(() => {
                    label.textContent = original;
                }, 1600);
            } catch (error) {
                window.prompt('Copy this link:', metadata.url);
            }
        };

        const resolveMetadata = (root) => {
            const page = pageMetadata();
            return {
                url: root.dataset.cubeShareUrl || page.url,
                title: root.dataset.cubeShareTitle || page.title,
                text: root.dataset.cubeShareText || page.text,
                description: root.dataset.cubeShareDescription || page.description,
                image: root.dataset.cubeShareImage || page.image,
                via: root.dataset.cubeShareVia || '',
                hashtags: root.dataset.cubeShareHashtags || ''
            };
        };

        const initRoot = (root) => {
            if (root.dataset.cubeShareReady === 'true') return;

            const metadata = resolveMetadata(root);
            const popupWidth = Number(root.dataset.cubeSharePopupWidth || 620);
            const popupHeight = Number(root.dataset.cubeSharePopupHeight || 700);
            const usePopup = root.dataset.cubeSharePopup !== 'false';
            const allowNative = root.dataset.cubeShareNative === 'true' && typeof navigator.share === 'function';

            root.querySelectorAll(selectors.button).forEach((button) => {
                const network = button.dataset.cubeShareNetwork;
                const href = buildUrl(network, metadata);
                button.dataset.cubeShareCopiedLabel = root.dataset.cubeShareCopiedLabel || 'Copied';

                if (button.tagName === 'A') {
                    button.setAttribute('href', href);
                }

                if (network === 'native') {
                    if (!allowNative) {
                        button.hidden = true;
                        return;
                    }

                    button.hidden = false;
                    button.addEventListener('click', async () => {
                        await navigator.share({
                            url: metadata.url,
                            title: metadata.title,
                            text: metadata.description || metadata.text || metadata.title
                        });
                    });
                    return;
                }

                if (network === 'copy') {
                    button.addEventListener('click', () => copyToClipboard(button, metadata));
                    return;
                }

                if (button.tagName !== 'A') {
                    button.addEventListener('click', () => {
                        if (usePopup && network !== 'email') {
                            popup(href, popupWidth, popupHeight);
                            return;
                        }
                        window.location.href = href;
                    });
                }
            });

            root.dataset.cubeShareReady = 'true';
        };

        window.CubeShare = {
            init(scope = document) {
                scope.querySelectorAll(selectors.root).forEach(initRoot);
            }
        };

        document.addEventListener('DOMContentLoaded', () => window.CubeShare.init());
        document.addEventListener('livewire:navigated', () => window.CubeShare.init());
    })();
</script>
