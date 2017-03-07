<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

/**
 * Pre-commit hook installation:
 * vendor/bin/static-review.php hook:install dev/tools/Magento/Tools/StaticReview/pre-commit .git/hooks/pre-commit
 */

if (class_exists('PhpCsFixer\Finder')) {    // PHP-CS-Fixer 2.x
    $finder = PhpCsFixer\Finder::create()
        ->name('*.phtml')
        ->exclude('dev/tests/functional/generated')
        ->exclude('dev/tests/functional/var')
        ->exclude('dev/tests/functional/vendor')
        ->exclude('dev/tests/integration/tmp')
        ->exclude('dev/tests/integration/var')
        ->exclude('lib/internal/Cm')
        ->exclude('lib/internal/Credis')
        ->exclude('lib/internal/Less')
        ->exclude('lib/internal/LinLibertineFont')
        ->exclude('pub/media')
        ->exclude('pub/static')
        ->exclude('setup/vendor')
        ->exclude('var');

    return PhpCsFixer\Config::create()
        ->setFinder($finder)
        ->setRules([
            '@PSR2' => true,
            //'double_arrow_multiline_whitespaces',
            'no_multiline_whitespace_around_double_arrow' => true,
            //'duplicate_semicolon',
            'space_after_semicolon' => true,
            'no_multiline_whitespace_before_semicolons' => true,
            //'extra_empty_lines',
            'no_extra_consecutive_blank_lines' => ['break', 'continue', 'extra', 'return', 'throw', 'use', 'useTrait', 'curly_brace_block', 'parenthesis_brace_block', 'square_brace_block'],
            //'include',
            'include' => true,
            //'join_function',
            //'namespace_no_leading_whitespace',
            'no_leading_namespace_whitespace' => true,
            //'new_with_braces',
            'new_with_braces' => true,
            //'object_operator',
            'object_operator_without_whitespace' => true,
            //'operators_spaces',
            'not_operator_with_space' => true,
            'not_operator_with_successor_space' => true,
            'unary_operator_spaces' => true,
            //'remove_leading_slash_use',
            'no_leading_import_slash' => true,
            //'remove_lines_between_uses',
            //'single_array_no_trailing_comma',
            'no_trailing_comma_in_singleline_array' => true,
            //'spaces_before_semicolon',
            'no_singleline_whitespace_before_semicolons' => true,
            //'standardize_not_equal',
            'standardize_not_equals' => true,
            //'ternary_spaces',
            'ternary_operator_spaces' => true,
            //'unused_use',
            'no_unused_imports' => true,
            //'whitespacy_lines',
            //'concat_with_spaces',
            'concat_space' => ['spacing' => 'one'],
            //'multiline_spaces_before_semicolon',
            'no_multiline_whitespace_before_semicolons' => true,
            //'ordered_use',
            'ordered_imports' => true,
            //'short_array_syntax',
            'array_syntax' => ['syntax' => 'short'],
        ]);
} elseif (class_exists('Symfony\CS\Finder\DefaultFinder')) {  // PHP-CS-Fixer 1.x
    $finder = Symfony\CS\Finder\DefaultFinder::create()
        ->name('*.phtml')
        ->exclude('dev/tests/functional/generated')
        ->exclude('dev/tests/functional/var')
        ->exclude('dev/tests/functional/vendor')
        ->exclude('dev/tests/integration/tmp')
        ->exclude('dev/tests/integration/var')
        ->exclude('lib/internal/Cm')
        ->exclude('lib/internal/Credis')
        ->exclude('lib/internal/Less')
        ->exclude('lib/internal/LinLibertineFont')
        ->exclude('pub/media')
        ->exclude('pub/static')
        ->exclude('setup/vendor')
        ->exclude('var');

    return Symfony\CS\Config\Config::create()
        ->finder($finder)
        ->level(Symfony\CS\FixerInterface::PSR2_LEVEL)
        ->fixers([
            'double_arrow_multiline_whitespaces',
            'duplicate_semicolon',
            'extra_empty_lines',
            'include',
            'join_function',
            'namespace_no_leading_whitespace',
            'new_with_braces',
            'object_operator',
            'operators_spaces',
            'remove_leading_slash_use',
            'remove_lines_between_uses',
            'single_array_no_trailing_comma',
            'spaces_before_semicolon',
            'standardize_not_equal',
            'ternary_spaces',
            'unused_use',
            'whitespacy_lines',
            'concat_with_spaces',
            'multiline_spaces_before_semicolon',
            'ordered_use',
            'short_array_syntax',
        ]);
}
