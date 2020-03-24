<?php
/**
 * This file is part of the Cloudinary PHP package.
 *
 * (c) Cloudinary
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cloudinary\Transformation;

use Cloudinary\Transformation\Parameter\BaseParameter;

/**
 * Class AudioCodec
 */
class AudioCodec extends BaseParameter
{
    /**
     * Removes the audio channel.
     */
    const NONE   = 'none';
    /**
     * Sets the audio codec to aac (mp4 or flv only).
     */
    const AAC    = 'aac';
    /**
     * Sets the audio codec to vorbis (ogv or webm only).
     */
    const VORBIS = 'vorbis';

    /**
     * Sets the audio codec to mp3 (mp4 or flv only).
     */
    const MP3    = 'mp3';

    /**
     * Removes the audio channel
     *
     * @return AudioCodec
     */
    public static function none()
    {
        return new static(static::NONE);
    }

    /**
     * mp4 or flv only
     *
     * @return AudioCodec
     */
    public static function aac()
    {
        return new static(static::AAC);
    }

    /**
     * ogv or webm only
     *
     * @return AudioCodec
     */
    public static function vorbis()
    {
        return new static(static::VORBIS);
    }

    /**
     * mp4 or flv only
     *
     * @return AudioCodec
     */
    public static function mp3()
    {
        return new static(static::MP3);
    }
}
