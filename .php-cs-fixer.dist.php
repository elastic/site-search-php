<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude('vendor')
    ->exclude('.circleci')
    ->exclude('resources')
    ->in(__DIR__)
;

return (new PhpCsFixer\Config())
    ->setRules([
        '@Symfony' => true,
        'phpdoc_no_package' => false,
        'phpdoc_annotation_without_dot' => false,
        'concat_space' => ['spacing' => 'one'],
    ])
    ->setFinder($finder)
;
