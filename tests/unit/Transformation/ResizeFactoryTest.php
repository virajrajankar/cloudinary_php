<?php
/**
 * This file is part of the Cloudinary PHP package.
 *
 * (c) Cloudinary
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cloudinary\Test\Transformation\Image;

use Cloudinary\Transformation\Pad;
use Cloudinary\Transformation\ResizeFactory;
use PHPUnit\Framework\TestCase;

/**
 * Class SampleTest
 */
final class ResizeFactoryTest extends TestCase
{
    public function testResizeFactory()
    {
        $pad = ResizeFactory::createResize('pad');

        self::assertInstanceOf(Pad::class, $pad);
    }
}
