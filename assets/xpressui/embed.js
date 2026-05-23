(function () {
  function toPositiveNumber(value, fallback) {
    var parsed = Number.parseInt(value, 10);
    return Number.isFinite(parsed) && parsed > 0 ? parsed : fallback;
  }

  function mountEmbed(container, index) {
    if (container.dataset.xpressuiEmbedReady === 'true') {
      return;
    }

    var url = container.getAttribute('data-xpressui-embed-url');
    if (!url) {
      return;
    }

    var minHeight = toPositiveNumber(container.getAttribute('data-xpressui-embed-min-height'), 720);
    var title = container.getAttribute('data-xpressui-embed-title') || 'XPressUI hosted workflow';
    var iframe = document.createElement('iframe');

    iframe.src = url;
    iframe.title = title;
    iframe.loading = container.getAttribute('data-xpressui-embed-loading') || 'eager';
    iframe.referrerPolicy = 'strict-origin-when-cross-origin';
    iframe.setAttribute('data-xpressui-embed-frame', String(index));
    iframe.style.display = 'block';
    iframe.style.width = '100%';
    iframe.style.height = minHeight + 'px';
    iframe.style.minHeight = minHeight + 'px';
    iframe.style.border = '0';
    iframe.style.background = '#fff';

    container.dataset.xpressuiEmbedReady = 'true';
    container.innerHTML = '';
    container.appendChild(iframe);
  }

  function mountEmbeds() {
    var containers = Array.prototype.slice.call(document.querySelectorAll('[data-xpressui-embed-url]'));
    containers.forEach(mountEmbed);
  }

  function resizeEmbeddedFrame(event) {
    var data = event.data || {};
    var isHeightMessage =
      data &&
      typeof data === 'object' &&
      (data.type === 'xpressui-embed-height' || data.type === 'xpressui-contact-height');

    if (!isHeightMessage) {
      return;
    }

    var height = toPositiveNumber(data.height, 0);
    if (height < 240) {
      return;
    }

    var frames = Array.prototype.slice.call(document.querySelectorAll('iframe[data-xpressui-embed-frame]'));
    frames.forEach(function (frame) {
      if (event.source === frame.contentWindow) {
        frame.style.height = Math.ceil(height) + 'px';
      }
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', mountEmbeds);
  } else {
    mountEmbeds();
  }

  window.addEventListener('message', resizeEmbeddedFrame);
})();
