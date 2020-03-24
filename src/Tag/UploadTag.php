<?php
/**
 * This file is part of the Cloudinary PHP package.
 *
 * (c) Cloudinary
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cloudinary\Tag;

use Cloudinary\Asset\AssetType;
use Cloudinary\Configuration\Configuration;
use Cloudinary\JsonUtils;

/**
 * Class UploadTag
 *
 * Generates <input
 *              class="cloudinary-fileupload"
 *              data-cloudinary-field="..."
 *              data-form-data="..."
 *              data-url="..."
 *              name="file"
 *              type="file"
 *           >
 */
class UploadTag extends BaseConfigurableApiTag
{
    const NAME    = 'input';
    const IS_VOID = true;

    /**
     * @var array $attributes An array of tag attributes.
     */
    protected $attributes = [
        'name' => 'file',
        'type' => 'file',
    ];
    /**
     * @var array $classes An array of tag (unique) classes. Keys are used for uniqueness.
     */
    protected $classes = ['cloudinary-fileupload' => 0];

    /**
     * UploadTag constructor.
     *
     * @param string        $field         The name of an input field in the same form that will be updated post-upload
     *                                     with the asset's metadata.
     * @param Configuration $configuration The configuration instance.
     * @param array         $uploadParams
     * @param string        $assetType
     */
    public function __construct($field, $configuration = null, $uploadParams = [], $assetType = AssetType::AUTO)
    {
        parent::__construct($configuration, $uploadParams, $assetType);

        $this->setAttribute('data-cloudinary-field', $field);
    }


    /**
     * Serializes the tag attributes.
     *
     * @param array $attributes Optional. Additional attributes to add without affecting the tag state.
     *
     * @return string
     */
    public function serializeAttributes($attributes = [])
    {
        $attributes['data-max-chunk-size'] = $this->apiConfig->chunkSize;
        $attributes['data-form-data']      = JsonUtils::encode($this->getUploadParams());
        $attributes['data-url']            = $this->uploadApi->getUploadUrl($this->assetType);

        return parent::serializeAttributes($attributes);
    }

    /**
     * Builds an unsigned upload tag.
     *
     * @param               $field
     * @param string        $uploadPreset
     * @param Configuration $configuration The configuration instance.
     * @param array         $uploadParams
     * @param string        $assetType
     *
     * @return UploadTag
     */
    public static function unsigned(
        $field,
        $uploadPreset,
        $configuration = null,
        $uploadParams = [],
        $assetType = AssetType::AUTO
    ) {
        $uploadParams['upload_preset'] = $uploadPreset;

        $tag = new UploadTag(
            $field,
            $configuration,
            $uploadParams,
            $assetType
        );

        $tag->config->unsignedUpload = true;

        return $tag;
    }
}
