<?php

$folder = "./DWIN_SET";

$files = glob($folder . "/*.*");
$regexp = "/^(\d{1,2}).*\.(bin|hzk|icl|wae)$/i";
$sector_size_bytes = 256 * 1024;
$sector_total = 64;

$files = array_filter($files, function ($file) use ($regexp) {
    return preg_match($regexp, basename($file));
});

$memory = [];
$memory_usage = 0;
$cluster_usage = 0;

foreach ($files as $file) {
    $filename = basename($file);
    $size = filesize($file);

    preg_match($regexp, basename($file), $sector);
    $sector_start = $sector[1];
    $sector_size = intval(ceil($size / $sector_size_bytes));

    $memory[] = [
        'name' => $filename,
        'path' => $file,
        'size' => $size,
        'sector' => [
            'start' => $sector_start,
            'size' => $sector_size,
            'end' => $sector_start + $sector_size - 1
        ]
    ];

    $memory_usage += $size;
    $cluster_usage += $sector_size;
}

$longest_name = array_reduce($memory, function ($max, $item) {
    return max($max, strlen($item['name']));
}, 12);

echo "\r\n";
echo "Memory space usage (bytes/sectors/bytes left in last sector)";
echo "\r\n";
echo "\r\n";
$memory_sectors = array_fill(0, $sector_total, 0);

foreach ($memory as $file) {
    echo str_pad($file['name'], $longest_name + 1);

    for ($sector = 0; $sector < $sector_total; $sector++) {
        if ($sector >= $file['sector']['start'] and $sector <= $file['sector']['end']) {
            echo "x";
            $memory_sectors[$sector]++;
        } else {
            echo ".";
        }
    }

    echo " ";
    echo str_pad($file['size'], 8, " ", STR_PAD_LEFT);
    echo " / ";
    echo str_pad($file['sector']['size'], 2, " ", STR_PAD_LEFT);
    echo " / ";
    echo str_pad(($file['sector']['size'] * $sector_size_bytes) - $file['size'], 7, " ", STR_PAD_LEFT);
    echo "\r\n";
}

echo "\r\n";
echo str_pad("Fingerprint:", $longest_name + 1);
foreach ($memory_sectors as $usage) {
    if ($usage > 1) {
        echo "#";
    } elseif ($usage == 1) {
        echo "x";
    } else {
        echo ".";
    }
}

echo "\r\n\r\n";
$total_size = $sector_total * $sector_size_bytes;
printf(
    "Size: %s/%s (%d%%)\r\n",
    number($memory_usage),
    number($total_size),
    round(($memory_usage / $total_size) * 100, 0)
);
printf(
    "Clusters: %d/%d (%d%%)\r\n",
    $cluster_usage,
    $sector_total,
    round(($cluster_usage / $sector_total) * 100, 0)
);

function number($number, $decimals = 0): string
{
    return number_format($number, $decimals, '.', ' ');
}