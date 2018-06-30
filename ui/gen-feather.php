<?php
    // width/height
    $wh = 18;

    $ids = [
        'activity', 'airplay', 'alert-circle', 'alert-octagon', 'alert-triangle', 'align-center',
        'align-justify', 'align-left', 'align-right', 'anchor', 'aperture', 'archive', 'arrow-down-circle',
        'arrow-down-left', 'arrow-down-right', 'arrow-down', 'arrow-left-circle', 'arrow-left', 'arrow-right-circle',
        'arrow-right', 'arrow-up-circle', 'arrow-up-left', 'arrow-up-right', 'arrow-up', 'at-sign', 'award',
        'bar-chart', 'battery-charging', 'battery', 'bell-off', 'bell', 'bluetooth', 'bold', 'book-open',
        'book', 'bookmark', 'box', 'briefcase', 'calendar', 'camera-off', 'camera', 'cast', 'check-circle',
        'check-square', 'check', 'chevron-down', 'chevron-left', 'chevron-right', 'chevron-up', 'chevrons-down',
        'chevrons-left', 'chevrons-right', 'chevrons-up', 'chrome', 'circle', 'clipboard', 'clock', 'cloud-drizzle',
        'cloud-lightning', 'cloud-off', 'cloud-rain', 'cloud-snow', 'cloud', 'code', 'codepen', 'command',
        'compass', 'copy', 'corner-down-left', 'corner-down-right', 'corner-left-down', 'corner-left-up',
        'corner-right-down', 'corner-right-up', 'corner-up-left', 'corner-up-right', 'cpu', 'credit-card',
        'crop', 'crosshair', 'database', 'delete', 'disc', 'dollar-sign', 'download-cloud', 'download', 'droplet',
        'edit', 'external-link', 'eye-off', 'eye', 'facebook', 'fast-forward', 'feather', 'file-minus', 'file-plus',
        'file-text', 'file', 'film', 'filter', 'flag', 'folder-minus', 'folder-plus', 'folder', 'gift', 'git-branch',
        'git-commit', 'git-merge', 'git-pull-request', 'github', 'gitlab', 'globe', 'grid', 'hard-drive', 'hash',
        'headphones', 'heart', 'help-circle', 'home', 'image', 'inbox', 'info', 'instagram', 'italic', 'layers',
        'layout', 'life-buoy', 'link', 'linkedin', 'list', 'loader', 'lock', 'log-in', 'log-out', 'mail', 'map-pin',
        'map', 'maximize', 'menu', 'message-circle', 'message-square', 'mic-off', 'mic', 'minimize', 'minus-circle',
        'minus-square', 'minus', 'monitor', 'moon', 'more-horizontal', 'more-vertical', 'move', 'music', 'navigation',
        'octagon', 'package', 'paperclip', 'pause-circle', 'pause', 'percent', 'phone-call', 'phone-forwarded',
        'phone-incoming', 'phone-missed', 'phone-off', 'phone-outgoing', 'phone', 'pie-chart', 'play-circle', 'play',
        'plus-circle', 'plus-square', 'plus', 'pocket', 'power', 'printer', 'radio', 'refresh-ccw', 'refresh-cw',
        'repeat', 'rewind', 'rotate-ccw', 'rotate-cw', 'rss', 'save', 'scissors', 'search', 'send', 'server',
        'settings', 'share', 'shield-off', 'shield', 'shopping-bag', 'shopping-cart', 'shuffle', 'sidebar',
        'skip-back', 'skip-forward', 'slack', 'slash', 'sliders', 'smartphone', 'speaker', 'square', 'star',
        'stop-circle', 'sun', 'sunrise', 'sunset', 'tablet', 'tag', 'target', 'terminal', 'thermometer',
        'thumbs-down', 'thumbs-up', 'toggle-left', 'toggle-right', 'trash', 'trending-down', 'trending-up',
        'triangle', 'truck', 'tv', 'twitter', 'type', 'umbrella', 'underline', 'unlock', 'upload-cloud', 'upload',
        'user-check', 'user-minus', 'user-plus', 'user-x', 'user', 'users', 'video-off', 'video', 'voicemail',
        'volume-x', 'volume', 'watch', 'wifi-off', 'wifi', 'wind', 'x-circle', 'x-square', 'x', 'youtube',
        'zap-off', 'zap', 'zoom-in', 'zoom-out',
    ];

    $header = <<<'EOL'
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
  width="%d"
  height="%d"
  fill="none"
  stroke="currentColor"
  stroke-width="2"
  stroke-linecap="round"
  stroke-linejoin="round">

EOL;

    $contents = file_get_contents('feather-sprite.svg');
    $start = strpos($contents, '<defs>');
    $len   = strpos($contents, '</defs>') + 7 - $start;

    $height = count($ids) * $wh;
    $fp = fopen('feather.svg', 'w');
    fwrite($fp, sprintf($header, $wh, $height));
    fwrite($fp, sprintf("    %s\n", substr($contents, $start, $len)));

    for ($i = 0; $i < count($ids); $i++) {
        fwrite($fp, sprintf('    <view id="icon-%1$s" viewBox="0 %2$d %3$s %3$s" />' . PHP_EOL,
                $ids[$i], ($i * $wh), $wh));
        fwrite($fp, sprintf('    <use xlink:href="#%1$s" width="%3$s" height="%3$s" x="0" y="%2$d" id="%1$s-use"></use>' . PHP_EOL,
            $ids[$i], ($i * $wh), $wh));
    }

    fwrite($fp, '</svg>');
    fclose($fp);
