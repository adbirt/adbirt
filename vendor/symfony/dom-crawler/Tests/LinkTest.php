<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\DomCrawler\Tests;

use Symfony\Component\DomCrawler\Link;

class LinkTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \LogicException
     */
    public function testConstructorWithANonATag()
    {
        $dom = new \DOMDocument();
        $dom->loadHTML('<html><div><div></html>');

        new Link($dom->getElementsByTagName('div')->item(0), 'https://www.example.com/');
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testConstructorWithAnInvalidCurrentUri()
    {
        $dom = new \DOMDocument();
        $dom->loadHTML('<html><a href="/foo">foo</a></html>');

        new Link($dom->getElementsByTagName('a')->item(0), 'example.com');
    }

    public function testGetNode()
    {
        $dom = new \DOMDocument();
        $dom->loadHTML('<html><a href="/foo">foo</a></html>');

        $node = $dom->getElementsByTagName('a')->item(0);
        $link = new Link($node, 'https://example.com/');

        $this->assertEquals($node, $link->getNode(), '->getNode() returns the node associated with the link');
    }

    public function testGetMethod()
    {
        $dom = new \DOMDocument();
        $dom->loadHTML('<html><a href="/foo">foo</a></html>');

        $node = $dom->getElementsByTagName('a')->item(0);
        $link = new Link($node, 'https://example.com/');

        $this->assertEquals('GET', $link->getMethod(), '->getMethod() returns the method of the link');

        $link = new Link($node, 'https://example.com/', 'post');
        $this->assertEquals('POST', $link->getMethod(), '->getMethod() returns the method of the link');
    }

    /**
     * @dataProvider getGetUriTests
     */
    public function testGetUri($url, $currentUri, $expected)
    {
        $dom = new \DOMDocument();
        $dom->loadHTML(sprintf('<html><a href="%s">foo</a></html>', $url));
        $link = new Link($dom->getElementsByTagName('a')->item(0), $currentUri);

        $this->assertEquals($expected, $link->getUri());
    }

    /**
     * @dataProvider getGetUriTests
     */
    public function testGetUriOnArea($url, $currentUri, $expected)
    {
        $dom = new \DOMDocument();
        $dom->loadHTML(sprintf('<html><map><area href="%s" /></map></html>', $url));
        $link = new Link($dom->getElementsByTagName('area')->item(0), $currentUri);

        $this->assertEquals($expected, $link->getUri());
    }

    /**
     * @dataProvider getGetUriTests
     */
    public function testGetUriOnLink($url, $currentUri, $expected)
    {
        $dom = new \DOMDocument();
        $dom->loadHTML(sprintf('<html><head><link href="%s" /></head></html>', $url));
        $link = new Link($dom->getElementsByTagName('link')->item(0), $currentUri);

        $this->assertEquals($expected, $link->getUri());
    }

    public function getGetUriTests()
    {
        return array(
            array('/foo', 'https://localhost/bar/foo/', 'https://localhost/foo'),
            array('/foo', 'https://localhost/bar/foo', 'https://localhost/foo'),
            array('
            /foo', 'https://localhost/bar/foo/', 'https://localhost/foo'),
            array('/foo
            ', 'https://localhost/bar/foo', 'https://localhost/foo'),

            array('foo', 'https://localhost/bar/foo/', 'https://localhost/bar/foo/foo'),
            array('foo', 'https://localhost/bar/foo', 'https://localhost/bar/foo'),

            array('', 'https://localhost/bar/', 'https://localhost/bar/'),
            array('#', 'https://localhost/bar/', 'https://localhost/bar/#'),
            array('#bar', 'https://localhost/bar?a=b', 'https://localhost/bar?a=b#bar'),
            array('#bar', 'https://localhost/bar/#foo', 'https://localhost/bar/#bar'),
            array('?a=b', 'https://localhost/bar#foo', 'https://localhost/bar?a=b'),
            array('?a=b', 'https://localhost/bar/', 'https://localhost/bar/?a=b'),

            array('https://login.foo.com/foo', 'https://localhost/bar/', 'https://login.foo.com/foo'),
            array('https://login.foo.com/foo', 'https://localhost/bar/', 'https://login.foo.com/foo'),
            array('mailto:foo@bar.com', 'https://localhost/foo', 'mailto:foo@bar.com'),

            // tests schema relative URL (issue #7169)
            array('//login.foo.com/foo', 'https://localhost/bar/', 'https://login.foo.com/foo'),
            array('//login.foo.com/foo', 'https://localhost/bar/', 'https://login.foo.com/foo'),

            array('?foo=2', 'https://localhost?foo=1', 'https://localhost?foo=2'),
            array('?foo=2', 'https://localhost/?foo=1', 'https://localhost/?foo=2'),
            array('?foo=2', 'https://localhost/bar?foo=1', 'https://localhost/bar?foo=2'),
            array('?foo=2', 'https://localhost/bar/?foo=1', 'https://localhost/bar/?foo=2'),
            array('?bar=2', 'https://localhost?foo=1', 'https://localhost?bar=2'),

            array('foo', 'https://login.foo.com/bar/baz?/query/string', 'https://login.foo.com/bar/foo'),

            array('.', 'https://localhost/foo/bar/baz', 'https://localhost/foo/bar/'),
            array('./', 'https://localhost/foo/bar/baz', 'https://localhost/foo/bar/'),
            array('./foo', 'https://localhost/foo/bar/baz', 'https://localhost/foo/bar/foo'),
            array('..', 'https://localhost/foo/bar/baz', 'https://localhost/foo/'),
            array('../', 'https://localhost/foo/bar/baz', 'https://localhost/foo/'),
            array('../foo', 'https://localhost/foo/bar/baz', 'https://localhost/foo/foo'),
            array('../..', 'https://localhost/foo/bar/baz', 'https://localhost/'),
            array('../../', 'https://localhost/foo/bar/baz', 'https://localhost/'),
            array('../../foo', 'https://localhost/foo/bar/baz', 'https://localhost/foo'),
            array('../../foo', 'https://localhost/bar/foo/', 'https://localhost/foo'),
            array('../bar/../../foo', 'https://localhost/bar/foo/', 'https://localhost/foo'),
            array('../bar/./../../foo', 'https://localhost/bar/foo/', 'https://localhost/foo'),
            array('../../', 'https://localhost/', 'https://localhost/'),
            array('../../', 'https://localhost', 'https://localhost/'),

            array('/foo', 'https://localhost?bar=1', 'https://localhost/foo'),
            array('/foo', 'https://localhost#bar', 'https://localhost/foo'),
            array('/foo', 'file:///', 'file:///foo'),
            array('/foo', 'file:///bar/baz', 'file:///foo'),
            array('foo', 'file:///', 'file:///foo'),
            array('foo', 'file:///bar/baz', 'file:///bar/foo'),
        );
    }
}
