<?php
/**
 * phpDocumentor Uses Tag Test
 * 
 * PHP version 5.3
 *
 * @author    Daniel O'Connor <daniel.oconnor@gmail.com>
 * @copyright 2010-2011 Mike van Riel / Naenius. (https://www.naenius.com)
 * @license   https://www.opensource.org/licenses/mit-license.php MIT
 * @link      https://phpdoc.org
 */

namespace Barryvdh\Reflection\DocBlock\Tag;

/**
 * Test class for \Barryvdh\Reflection\DocBlock\Tag\UsesTag
 *
 * @author    Daniel O'Connor <daniel.oconnor@gmail.com>
 * @copyright 2010-2011 Mike van Riel / Naenius. (https://www.naenius.com)
 * @license   https://www.opensource.org/licenses/mit-license.php MIT
 * @link      https://phpdoc.org
 */
class UsesTagTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test that the \Barryvdh\Reflection\DocBlock\Tag\UsesTag can create
     * a link for the @uses doc block.
     *
     * @param string $type
     * @param string $content
     * @param string $exContent
     * @param string $exReference
     *
     * @covers \Barryvdh\Reflection\DocBlock\Tag\UsesTag
     * @dataProvider provideDataForConstuctor
     *
     * @return void
     */
    public function testConstructorParesInputsIntoCorrectFields(
        $type,
        $content,
        $exContent,
        $exDescription,
        $exReference
    ) {
        $tag = new UsesTag($type, $content);

        $this->assertEquals($type, $tag->getName());
        $this->assertEquals($exContent, $tag->getContent());
        $this->assertEquals($exDescription, $tag->getDescription());
        $this->assertEquals($exReference, $tag->getReference());
    }

    /**
     * Data provider for testConstructorParesInputsIntoCorrectFields
     *
     * @return array
     */
    public function provideDataForConstuctor()
    {
        // $type, $content, $exContent, $exDescription, $exReference
        return array(
            array(
                'uses',
                'Foo::bar()',
                'Foo::bar()',
                '',
                'Foo::bar()'
            ),
            array(
                'uses',
                'Foo::bar() Testing',
                'Foo::bar() Testing',
                'Testing',
                'Foo::bar()',
            ),
            array(
                'uses',
                'Foo::bar() Testing comments',
                'Foo::bar() Testing comments',
                'Testing comments',
                'Foo::bar()',
            ),
        );
    }
}
