<?php
/**
 * This file is part of the Cloudinary PHP package.
 *
 * (c) Cloudinary
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cloudinary\Test\Asset;

use Cloudinary\Test\Tag\TestTag;
use PHPUnit\Framework\TestCase;


/**
 * Class TagTest
 */
final class TagTest extends TestCase
{
    /**
     * @var TestTag
     */
    private $tag;

    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->tag = new TestTag();
    }

    public function testSimpleTag()
    {
        $this->assertEquals(
            '<test></test>',
            (string)$this->tag
        );
    }

    public function testTagWithContent()
    {
        $content1 = 'Test content';
        $this->tag->setContent($content1);

        $this->assertEquals(
            implode("\n", ['<test>', $content1, '</test>']),
            (string)$this->tag
        );

        $tag2 = (new TestTag())->setContent($this->tag);

        $this->assertEquals(
            implode("\n", ['<test>', $this->tag, '</test>']),
            (string)$tag2
        );
    }

    public function testTagWithClasses()
    {
        $class1     = 'class1';
        $class2     = 'class2';
        $classes    = [$class1, $class2];
        $classesStr = "$class1 $class2";

        $this->tag->addClass($class1);

        $this->assertEquals(
            "<test class=\"$class1\"></test>",
            (string)$this->tag
        );

        $this->tag->addClass($class2);

        $this->assertEquals(
            "<test class=\"$classesStr\"></test>",
            (string)$this->tag
        );

        // Add duplicate class
        $this->tag->addClass($class2);

        $this->assertEquals(
            "<test class=\"$classesStr\"></test>",
            (string)$this->tag
        );

        // Clear class
        $this->tag->setClass([]);

        $this->assertEquals(
            '<test></test>',
            (string)$this->tag
        );

        // Set class from array
        $this->tag->setClass($classes);

        $this->assertEquals(
            "<test class=\"$classesStr\"></test>",
            (string)$this->tag
        );

        // Set multiple classes from string
        $this->tag->setClass($classesStr);

        $this->assertEquals(
            "<test class=\"$classesStr\"></test>",
            (string)$this->tag
        );
    }
}
