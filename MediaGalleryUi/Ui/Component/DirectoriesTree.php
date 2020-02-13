<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\MediaGalleryUi\Ui\Component;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Container;
use Magento\Framework\UrlInterface;

/**
 * Directories tree component
 */
class DirectoriesTree extends Container
{
    /**
     * @var UrlInterface
     */
    private $url;
   
    /**
     * Constructor
     *
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface $url
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UrlInterface $url,
        array $components = [],
        array $data = []
    ) {
        parent::__construct($context, $components, $data);
        $this->url = $url;
    }

    /**
     * @inheritdoc
     */
    public function prepare(): void
    {
        parent::prepare();
        $this->setData(
            'config',
            array_replace_recursive(
                (array) $this->getData('config'),
                [
                    'getDirectoryTreeUrl' => $this->url->getUrl("media_gallery/directories/gettree")
                ]
            )
        );
    }
}
