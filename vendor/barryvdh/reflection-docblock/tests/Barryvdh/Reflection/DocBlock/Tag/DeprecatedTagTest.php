<?php
/**
 * phpDocumentor Deprecated Tag Test
 * 
 * PHP version 5.3
 *
 * @author    Vasil Rangelov <boen.robot@gmail.com>
 * @copyright 2010-2011 Mike van Riel / Naenius. (https://www.naenius.com)
 * @license   https://www.opensource.org/licenses/mit-license.php MIT
 * @link      https://phpdoc.org
 */

namespace Barryvdh\Reflection\DocBlock\Tag;

/**
 * Test class for \Barryvdh\Reflection\DocBlock\Tag\DeprecatedTag
 *
 * @author    Vasil Rangelov <boen.robot@gmail.com>
 * @copyright 2010-2011 Mike van Riel / Naenius. (https://www.naenius.com)
 * @license   https://www.opensource.org/licenses/mit-license.php MIT
 * @link      https://phpdoc.org
 */
class DeprecatedTagTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test that the \Barryvdh\Reflection\DocBlock\Tag\LinkTag can create
     * a link for the @deprecated doc block.
     *
     * @param string $type
     * @param string $content
     * @param string $exContent
     * @param string $exDescription
     * @param string $exVersion
     *
     * @covers \Barryvdh\Reflection\DocBlock\Tag\DeprecatedTag
     * @dataProvider provideDataForConstuctor
     *
     * @return void
     */
    public function testConstructorParesInputsIntoCorrectFields(
        $type,
        $content,
        $exContent,
        $exDescription,
        $exVersion
    ) {
        $tag = new DeprecatedTag($type, $content);

        $this->assertEquals($type, $tag->getName());
        $this->assertEquals($exContent, $tag->getContent());
        $this->assertEquals($exDescription, $tag->getDescription());
        $this->assertEquals($exVersion, $tag->getVersion());
    }

    /**
     * Data provider for testConstructorParesInputsIntoCorrectFields
     *
     * @return array
     */
    public function provideDataForConstuctor()
    {
        // $type, $content, $exContent, $exDescription, $exVersion
        return array(
            array(
                'deprecated',
                '1.0 First release.',
                '1.0 First release.',
                'First release.',
                '1.0'
            ),
            array(
                'deprecated',
                "1.0\nFirst release.",
                "1.0\nFirst release.",
                'First release.',
                '1.0'
            ),
            array(
                'deprecated',
                "1.0\nFirst\nrelease.",
                "1.0\nFirst\nrelease.",
                "First\nrelease.",
                '1.0'
            ),
            array(
                'deprecated',
                'Unfinished release',
                'Unfinished release',
                'Unfinished release',
                ''
            ),
            array(
                'deprecated',
                '1.0',
                '1.0',
                '',
                '1.0'
            ),
            array(
                'deprecated',
                'GIT: $Id$',
                'GIT: $Id$',
                '',
                'GIT: $Id$'
            ),
            array(
                'deprecated',
                'GIT: $Id$ Dev build',
                'GIT: $Id$ Dev build',
                'Dev build',
                'GIT: $Id$'
            )
        );
    }
}
