<?php
/**
 * phpDocumentor Link Tag Test
 * 
 * PHP version 5.3
 *
 * @author    Ben Selby <benmatselby@gmail.com>
 * @copyright 2010-2011 Mike van Riel / Naenius. (https://www.naenius.com)
 * @license   https://www.opensource.org/licenses/mit-license.php MIT
 * @link      https://phpdoc.org
 */

namespace Barryvdh\Reflection\DocBlock\Tag;

/**
 * Test class for \Barryvdh\Reflection\DocBlock\Tag\LinkTag
 *
 * @author    Ben Selby <benmatselby@gmail.com>
 * @copyright 2010-2011 Mike van Riel / Naenius. (https://www.naenius.com)
 * @license   https://www.opensource.org/licenses/mit-license.php MIT
 * @link      https://phpdoc.org
 */
class LinkTagTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test that the \Barryvdh\Reflection\DocBlock\Tag\LinkTag can create
     * a link for the @link doc block.
     *
     * @param string $type
     * @param string $content
     * @param string $exContent
     * @param string $exDescription
     * @param string $exLink
     *
     * @covers \Barryvdh\Reflection\DocBlock\Tag\LinkTag
     * @dataProvider provideDataForConstuctor
     *
     * @return void
     */
    public function testConstructorParesInputsIntoCorrectFields(
        $type,
        $content,
        $exContent,
        $exDescription,
        $exLink
    ) {
        $tag = new LinkTag($type, $content);

        $this->assertEquals($type, $tag->getName());
        $this->assertEquals($exContent, $tag->getContent());
        $this->assertEquals($exDescription, $tag->getDescription());
        $this->assertEquals($exLink, $tag->getLink());
    }

    /**
     * Data provider for testConstructorParesInputsIntoCorrectFields
     *
     * @return array
     */
    public function provideDataForConstuctor()
    {
        // $type, $content, $exContent, $exDescription, $exLink
        return array(
            array(
                'link',
                'https://www.phpdoc.org/',
                'https://www.phpdoc.org/',
                'https://www.phpdoc.org/',
                'https://www.phpdoc.org/'
            ),
            array(
                'link',
                'https://www.phpdoc.org/ Testing',
                'https://www.phpdoc.org/ Testing',
                'Testing',
                'https://www.phpdoc.org/'
            ),
            array(
                'link',
                'https://www.phpdoc.org/ Testing comments',
                'https://www.phpdoc.org/ Testing comments',
                'Testing comments',
                'https://www.phpdoc.org/'
            ),
        );
    }
}
