<?php
/**
 * Example for Console_Getargs class
 * 
 * $Id$
 */

require_once('Console/Getargs.php');

$config = array(
            // Option takes 2 values
            'files|images' => array('short' => 'f|i', 'min' => 2, 'max' => 2, 'desc' => 'Set the source and destination image files.'),
            // Option takes 1 value
            'width' => array('short' => 'w', 'min' => 1, 'max' => 1, 'desc' => 'Set the new width of the image.'),
            // Option is a switch
            'debug' => array('short' => 'd', 'max' => 0, 'desc' => 'Switch to debug mode.'),
            // Option takes from 1 to 3 values, using the default value(s) if the arg is not present
            'formats' => array('min' => 1, 'max' => 3, 'desc' => 'Set the image destination format.', 'default' => array('jpegbig', 'jpegsmall')),
            // Option takes from 1 to an unlimited number of values
            'filters' => array('short' => 'fi', 'min' => 1, 'max' => -1, 'desc' => 'Set the filters to be applied to the image upon conversion. The filters will be used in the order they are set.'),
            // Option accept 1 value or nothing. If nothing, then the default value is used
            'verbose' => array('short' => 'v', 'min' => 0, 'max' => 1, 'desc' => 'Set the verbose level.', 'default' => 3)
            );

$args =& Console_Getargs::factory($config);

if (PEAR::isError($args)) {
    if ($args->getCode() === CONSOLE_GETARGS_ERROR_USER) {
        echo Console_Getargs::getHelp($config, null, $args->getMessage())."\n";
    } else if ($args->getCode() === CONSOLE_GETARGS_HELP) {
        echo Console_Getargs::getHelp($config)."\n";
    }
    exit;
}

echo 'Verbose: '.$args->getValue('verbose')."\n";
echo 'Formats: '.(is_array($args->getValue('formats')) ? implode(', ', $args->getValue('formats'))."\n" : $args->getValue('formats')."\n");
echo 'Files: '.($args->isDefined('files') ? implode(', ', $args->getValue('files'))."\n" : "undefined\n");
if ($args->isDefined('fi')) {
    echo 'Filters: '.(is_array($args->getValue('fi')) ? implode(', ', $args->getValue('fi'))."\n" : $args->getValue('fi')."\n");
} else {
    echo "Filters: undefined\n";
}
echo 'Width: '.$args->getValue('w')."\n";
echo 'Debug: '.($args->isDefined('d') ? "YES\n" : "NO\n");

// Test with:
// ----------
// php -q example.php -h
// php -q example.php -v -f src.tiff dest.tiff
// php -q example.php -v5 -f src.tiff dest.tiff -d
// php -q example.php -v 1 -f src.tiff dest.tiff -d --width=100
// php -q example.php -v -f src.tiff dest.tiff -fi sharp blur
// php -q example.php --format gif jpeg png

?>