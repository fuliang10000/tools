<?php

$rules = [
    '@PSR2' => true,
    '@Symfony' => true,
    '@PhpCsFixer' => true,
    'array_syntax' => ['syntax' => 'short'],
    'no_multiline_whitespace_before_semicolons' => true,
    'no_short_echo_tag' => true,
    'no_unused_imports' => true,
    'not_operator_with_successor_space' => true,
    'phpdoc_no_empty_return' => false,
    'linebreak_after_opening_tag' => true,
    'ordered_imports' => [
        'imports_order' => [
            'class', 'function', 'const',
        ],
        'sort_algorithm' => 'alpha',
    ],
    'blank_line_after_opening_tag' => true,
    'trim_array_spaces' => true,
    'braces' => ['allow_single_line_closure' => true],
    'compact_nullable_typehint' => true,
    'concat_space' => ['spacing' => 'one'],
    'declare_equal_normalize' => ['space' => 'none'],
    'function_typehint_space' => true,
    'new_with_braces' => true,
    'method_argument_space' => ['on_multiline' => 'ensure_fully_multiline'],
    'no_empty_statement' => true,
    'no_leading_import_slash' => true,
    'no_leading_namespace_whitespace' => true,
    'no_whitespace_in_blank_line' => true,
    'return_type_declaration' => ['space_before' => 'none'],
    'single_trait_insert_per_statement' => true,
    'binary_operator_spaces' => [
        'default' => 'align_single_space_minimal',
    ],
    'encoding' => true,
    'list_syntax' => [
        'syntax' => 'short'
    ],
    'concat_space' => [
        'spacing' => 'one'
    ],
    'blank_line_before_statement' => [
        'statements' => [
            'declare', 'return'
        ],
    ],
    'single_line_comment_style' => [
        'comment_types' => [
        ],
    ],
    'phpdoc_align' => [
        'align' => 'left',
    ],
    'constant_case' => [
        'case' => 'lower',
    ],
    'class_attributes_separation' => true,
    'combine_consecutive_unsets' => true,
    'lowercase_static_reference' => true,
    'no_useless_else' => true,
    'not_operator_with_space' => false,
    'ordered_class_elements' => true,
    'php_unit_strict' => false,
    'phpdoc_separation' => false,
    'single_quote' => true,
    'standardize_not_equals' => true,
    'multiline_comment_opening_closing' => true,
    'phpdoc_align' => [
        'align' => 'vertical'
    ],
];
$excludes = [
    'vendor',
    'node_modules',
    'scratch',
];

$finder = PhpCsFixer\Finder::create()
    ->notPath('bootstrap/cache')
    ->notPath('storage')
    ->notPath('vendor')
    ->in(__DIR__)
    ->name('*.php')
    ->notName('*.blade.php')
    ->notName('.*.php')
    ->notName('_ide_helper.php')
    ->notName('Controller.php')
    ->notName('server.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

return PhpCsFixer\Config::create()
    ->setRules($rules)
    ->setUsingCache(false)
    ->setFinder($finder);
