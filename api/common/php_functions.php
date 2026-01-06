<?php
function sanitize_input($input)
{
    // If input is an array, recursively sanitize each element
    if (is_array($input)) {
        return array_map('sanitize_input', $input);
    }
    // Trim whitespace
    $cleaned = trim($input);

    // Convert checkbox-like values
    if ($cleaned === 'on') {
        return '1';
    }

    // Escape HTML special characters
    // $cleaned = htmlspecialchars($cleaned, ENT_QUOTES, 'UTF-8');

    // Return null if empty string
    return $cleaned === '' || $cleaned == 'NULL' ? null : $cleaned;
}


function gen_code($prefix)
{
    return str_replace('.', '', uniqid($prefix, true));
}

function valid_code($input)
{
    $parts = explode('_', $input);
    if (count($parts) !== 2) {
        return false;
    }
    if (!preg_match('/^[a-zA-Z]+$/', $parts[0])) {
        return false;
    }
    if (strlen($parts[1]) !== 22 || !preg_match('/^[a-zA-Z0-9]+$/', $parts[1])) {
        return false;
    }
    return true;
}

function expand_scientific_notation($value)
{
    if (!preg_match('/^([0-9]+(?:\.[0-9]+)?)E([+-]?[0-9]+)$/i', $value, $m)) {
        return $value; // not scientific notation, return as-is
    }

    $base = $m[1];
    $exp = (int) $m[2];

    // Split base into whole/decimal
    $hasDecimal = strpos($base, '.') !== false;
    if ($hasDecimal) {
        list($intPart, $decPart) = explode('.', $base);
    } else {
        $intPart = $base;
        $decPart = '';
    }

    // Adjust decimal placement
    $digits = $intPart . $decPart;
    $expAdjustment = $exp - strlen($decPart);

    if ($expAdjustment >= 0) {
        // Add trailing zeroes
        $result = $digits . str_repeat('0', $expAdjustment);
    } else {
        // Insert decimal point
        $pos = strlen($digits) + $expAdjustment;
        $result = substr($digits, 0, $pos) . '.' . substr($digits, $pos);
    }

    // If original had a decimal → force 2 decimals
    if ($hasDecimal && is_numeric($result)) {
        return number_format((float)$result, 2, '.', '');
    }

    // Otherwise → return as-is (no .00)
    return $result;
}
