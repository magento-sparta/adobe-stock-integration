<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\MediaGalleryMetadataApi\Model;

use Magento\MediaGalleryMetadataApi\Api\AddMetadataInterface;
use Magento\MediaGalleryMetadataApi\Api\Data\MetadataInterface;

/**
 * Metadata writer pool
 */
class WriterComposite
{
    /**
     * @var AddMetadataInterface[]
     */
    private $writers;

    /**
     * @param AddMetadataInterface[] $writers
     */
    public function __construct(array $writers)
    {
        $this->writers = $writers;
    }

    /**
     * @return AddMetadataInterface[]
     */
    public function execute(string $path, MetadataInterface $data): void
    {
        foreach ($this->writers as $writer) {
            $writer->execute($path, $data);
        }
    }
}
