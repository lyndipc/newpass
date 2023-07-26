#!/usr/bin/env php
<?php

$shortopts = 'lusnt:h';
$options = getopt($shortopts, [
    'lowercase',
    'uppercase',
    'symbols',
    'numbers',
    'length:',
    'help'
]);

isset($options['lowercase']) || isset($options['l']) ? $options['lowercase'] = true : $options['lowercase'] = false;
isset($options['uppercase']) || isset($options['u']) ? $options['uppercase'] = true : $options['uppercase'] = false;
isset($options['symbols']) || isset($options['s']) ? $options['symbols'] = true : $options['symbols'] = false;
isset($options['numbers']) || isset($options['n']) ? $options['numbers'] = true : $options['numbers'] = false;
isset($options['length']) || isset($options['t']) ? $options['length'] = $options['length'] ?? $options['t'] : $options['length'] = 28;

if (isset($options['help']) || isset($options['h'])) {
    echo <<<HELP
    Usage: newpass [options]
    
    Options:
    -l, --lowercase         Use lowercase letters. Default: true
    -u, --uppercase         Use uppercase letters. Default: true
    -s, --symbols           Use symbols. Default: true
    -n, --numbers           Use numbers. Default: true
    -c, --custom-symbols    Use custom symbols. Default: ''
    -p, --length <int>      The length of the password. Default: 28
    -h, --help              Display this help message and exit.
    
    HELP;
    exit;
}

// If no options are provided, use all character types
if (!($options['lowercase']) && !($options['uppercase']) && !($options['symbols']) && !($options['numbers'])) {
    $options['lowercase'] = true;
    $options['uppercase'] = true;
    $options['symbols'] = true;
    $options['numbers'] = true;
}

$lowercase = range('a', 'z');
$uppercase = range('A', 'Z');
$symbols = str_split('!@#$%^&*()_+-=[]{};:,.<>/?');
$numbers = range(0, 9);

$characters = array_filter([
    $options['lowercase'] ? $lowercase : null,
    $options['uppercase'] ? $uppercase : null,
    $options['symbols'] ? $symbols : null,
    $options['numbers'] ? $numbers : null,
]);

// Create a single array that contains all desired characters
$characters = array_merge(...$characters);
shuffle($characters);

$password = '';

// Randomly select characters to add to the password
for ($i = 0; $i < $options['length']; $i++) {
    $password .= $characters[array_rand($characters)];
}

echo $password . PHP_EOL;