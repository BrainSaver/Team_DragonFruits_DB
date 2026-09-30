<?php
// .env 파일에서 설정값을 읽어오는 함수
function env($key, $default = null) {
    static $vars = null;
    if ($vars === null) {
        $vars = [];
        $path = __DIR__ . '/.env';
        if (file_exists($path)) {
            foreach (file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
                $line = trim($line);
                if ($line === '' || $line[0] === '#' || strpos($line, '=') === false) continue;
                list($k, $v) = explode('=', $line, 2);
                $vars[trim($k)] = trim($v);
            }
        }
    }
    return isset($vars[$key]) ? $vars[$key] : $default;
}
?>
