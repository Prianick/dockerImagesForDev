<?php

$packageName = 'dr-profee/docker-images-for-dev';

$folders = [
    'docker' => __DIR__ . '/../docker',
    'logs' => __DIR__ . '/../logs',
    'docker-compose' => __DIR__ . '/../docker-compose',
];

$destination = str_replace('/vendor/' . $packageName, '', $_SERVER['PWD']) . '/dockerTest';

/**
 * @param string $from
 * @param string $to
 * @return void
 */
function rcopy(string $from, string $to): void
{
    $items = array_diff(scandir($from), ['.', '..']);

    foreach ($items as $item) {
        $fromPath = "{$from}/{$item}";
        $toPath = "{$to}/{$item}";
        if (is_dir($fromPath)) {
            if (!file_exists($toPath)) {
                mkdir($toPath, 0777, true);
            }
            rcopy($fromPath, $toPath);
        } else {
            copy($fromPath, $toPath);
        }
    }
}

foreach ($folders as $folderName => $path) {
    if (!file_exists("{$destination}/{$folderName}")) {
        mkdir("{$destination}/{$folderName}", 0777, true);
    }
    rcopy($path, "{$destination}/{$folderName}");
}

