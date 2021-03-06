<?php
/**
 * This file is part of phpDocumentor.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright 2010-2015 Mike van Riel<mike@phpdoc.org>
 * @license   https://www.opensource.org/licenses/mit-license.php MIT
 * @link      https://phpdoc.org
 */

namespace phpDocumentor\Reflection\Types;

use Mockery as m;

/**
 * @coversDefaultClass \phpDocumentor\Reflection\Types\Context
 */
class ContextTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @covers ::getNamespace
     */
    public function testProvidesANormalizedNamespace()
    {
        $fixture = new Context('\My\Space');
        $this->assertSame('My\Space', $fixture->getNamespace());
    }

    /**
     * @covers ::__construct
     * @covers ::getNamespace
     */
    public function testInterpretsNamespaceNamedGlobalAsRootNamespace()
    {
        $fixture = new Context('global');
        $this->assertSame('', $fixture->getNamespace());
    }

    /**
     * @covers ::__construct
     * @covers ::getNamespace
     */
    public function testInterpretsNamespaceNamedDefaultAsRootNamespace()
    {
        $fixture = new Context('default');
        $this->assertSame('', $fixture->getNamespace());
    }

    /**
     * @covers ::__construct
     * @covers ::getNamespaceAliases
     */
    public function testProvidesNormalizedNamespaceAliases()
    {
        $fixture = new Context('', ['Space' => '\My\Space']);
        $this->assertSame(['Space' => 'My\Space'], $fixture->getNamespaceAliases());
    }
}
