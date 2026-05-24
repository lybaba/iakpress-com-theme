(function () {
  function toPositiveNumber(value, fallback) {
    var parsed = Number.parseInt(value, 10);
    return Number.isFinite(parsed) && parsed > 0 ? parsed : fallback;
  }

  function withEmbedMode(url) {
    try {
      var parsed = new URL(url, window.location.href);
      parsed.searchParams.set('embed', '1');
      return parsed.toString();
    } catch (error) {
      var separator = url.indexOf('?') === -1 ? '?' : '&';
      return url + separator + 'embed=1';
    }
  }

  function createLaunchPlaceholder(container) {
    var title = (container.getAttribute('data-xpressui-embed-placeholder-title') || '').trim();
    var cta = (container.getAttribute('data-xpressui-embed-placeholder-cta') || '').trim();
    if (!title && !cta) {
      return null;
    }

    var placeholder = document.createElement('div');
    var card = document.createElement('div');
    placeholder.setAttribute('aria-hidden', 'true');
    placeholder.style.position = 'absolute';
    placeholder.style.inset = '0';
    placeholder.style.zIndex = '1';
    placeholder.style.display = 'grid';
    placeholder.style.placeItems = 'center';
    placeholder.style.padding = '18px';
    placeholder.style.pointerEvents = 'none';
    placeholder.style.transition = 'opacity 140ms ease';

    card.style.width = '100%';
    card.style.maxWidth = '760px';
    card.style.boxSizing = 'border-box';
    card.style.border = '1px solid #e2e8f0';
    card.style.borderRadius = '26px';
    card.style.background = '#fff';
    card.style.color = '#0f172a';
    card.style.textAlign = 'center';
    card.style.padding = '40px 32px';
    card.style.boxShadow = '0 34px 96px rgba(15,23,42,.16)';

    if (title) {
      var heading = document.createElement('div');
      heading.textContent = title;
      heading.style.fontSize = 'clamp(28px,3.2vw,36px)';
      heading.style.fontWeight = '900';
      heading.style.lineHeight = '1.08';
      heading.style.margin = cta ? '0 0 18px' : '0';
      card.appendChild(heading);
    }

    if (cta) {
      var button = document.createElement('div');
      button.textContent = cta;
      button.style.display = 'inline-flex';
      button.style.alignItems = 'center';
      button.style.justifyContent = 'center';
      button.style.borderRadius = '12px';
      button.style.padding = '13px 28px';
      button.style.background = '#0f172a';
      button.style.color = '#f8fafc';
      button.style.fontSize = '15px';
      button.style.fontWeight = '800';
      button.style.boxShadow = '0 16px 34px -22px rgba(15,23,42,.62)';
      card.appendChild(button);
    }

    placeholder.appendChild(card);
    return placeholder;
  }

  function revealFrame(frame) {
    frame.style.opacity = '1';
    frame.dataset.xpressuiEmbedMeasured = 'true';
    var placeholder = frame.parentElement && frame.parentElement.querySelector('[data-xpressui-embed-placeholder]');
    if (placeholder) {
      placeholder.style.opacity = '0';
      window.setTimeout(function () {
        if (placeholder.parentElement) {
          placeholder.parentElement.removeChild(placeholder);
        }
      }, 170);
    }
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
    var resizeFloor = toPositiveNumber(container.getAttribute('data-xpressui-embed-resize-floor'), 520);
    var resizeBuffer = toPositiveNumber(container.getAttribute('data-xpressui-embed-resize-buffer'), 96);
    var launchHeight = toPositiveNumber(container.getAttribute('data-xpressui-embed-launch-height'), 0);
    var initialHeight = launchHeight || minHeight;
    resizeFloor = Math.min(resizeFloor, minHeight);
    var title = container.getAttribute('data-xpressui-embed-title') || 'XPressUI hosted workflow';
    var placeholder = createLaunchPlaceholder(container);
    var iframe = document.createElement('iframe');

    iframe.src = withEmbedMode(url);
    iframe.title = title;
    iframe.loading = container.getAttribute('data-xpressui-embed-loading') || 'eager';
    iframe.referrerPolicy = 'strict-origin-when-cross-origin';
    iframe.scrolling = 'no';
    iframe.setAttribute('scrolling', 'no');
    iframe.setAttribute('data-xpressui-embed-frame', String(index));
    iframe.setAttribute('data-xpressui-embed-resize-floor', String(resizeFloor));
    iframe.setAttribute('data-xpressui-embed-resize-buffer', String(resizeBuffer));
    iframe.setAttribute('data-xpressui-embed-launch-height', String(launchHeight));
    iframe.style.display = 'block';
    iframe.style.width = '100%';
    iframe.style.height = initialHeight + 'px';
    iframe.style.minHeight = resizeFloor + 'px';
    iframe.style.border = '0';
    iframe.style.background = 'transparent';
    iframe.style.opacity = '0';
    iframe.style.transition = 'opacity 160ms ease';

    container.style.position = 'relative';
    container.style.minHeight = initialHeight + 'px';

    iframe.addEventListener('load', function () {
      window.setTimeout(function () {
        if (iframe.dataset.xpressuiEmbedMeasured !== 'true') {
          revealFrame(iframe);
        }
      }, 180);
    });

    container.dataset.xpressuiEmbedReady = 'true';
    container.innerHTML = '';
    if (placeholder) {
      placeholder.setAttribute('data-xpressui-embed-placeholder', 'true');
      container.appendChild(placeholder);
    }
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
      (data.type === 'xpressui-embed-height' ||
        data.type === 'xpressui-contact-height' ||
        data.type === 'xpressui:resize');

    if (!isHeightMessage) {
      return;
    }

    var height = toPositiveNumber(data.height, 0);
    if (height < 180) {
      return;
    }

    var frames = Array.prototype.slice.call(document.querySelectorAll('iframe[data-xpressui-embed-frame]'));
    frames.forEach(function (frame) {
      if (event.source === frame.contentWindow) {
        var isLaunch = data.mode === 'launch';
        var resizeFloor = toPositiveNumber(frame.getAttribute('data-xpressui-embed-resize-floor'), 520);
        var resizeBuffer = isLaunch ? 0 : toPositiveNumber(frame.getAttribute('data-xpressui-embed-resize-buffer'), 96);
        var resizedHeight = Math.max(isLaunch ? 180 : resizeFloor, Math.ceil(height + resizeBuffer));
        frame.style.height = resizedHeight + 'px';
        frame.style.minHeight = (isLaunch ? Math.min(resizeFloor, resizedHeight) : resizeFloor) + 'px';
        frame.style.overflow = 'hidden';
        revealFrame(frame);
        if (frame.parentElement) {
          frame.parentElement.style.minHeight = resizedHeight + 'px';
        }
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
