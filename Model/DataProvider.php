<?php
namespace AHT\Slider\Model;

use Magento\Framework\App\Request\Http;
use  Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use \Magento\Ui\DataProvider\AbstractDataProvider;

class DataProvider extends  AbstractDataProvider
{
    /**
     * @var \Magento\Ui\DataProvider\AddFieldToCollectionInterface[]
     */
    protected $addFieldStrategies;

    /**
     * @var \Magento\Ui\DataProvider\AddFilterToCollectionInterface[]
     */
    protected $addFilterStrategies;

    /**
     * @var \Magento\Framework\App\Request\Http
     */
    protected $request;

    /**
     * Construct
     *
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        Http $request,
        CollectionFactory $productcollection,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->request = $request;
        $this->productCollection = $productcollection;
    }

    public function getData()
    {
        if (isset($this->_loadedData)) {
            return $this->_loadedData;
        }

        $pagesize = intval($this->request->getParam('paging')['pageSize']);
        $pageCurrent = intval($this->request->getParam('paging')['current']);
        $pageoffset = ($pageCurrent - 1) * $pagesize;

        $items = $this->productCollection->addAttributeToSelect('*')->AttributeToFilter('is_featured', '1');
        var_dump($items);
        return [
            'totalRecords' => count($items),
            'items' => array_slice($items, $pageoffset, $pageoffset + $pagesize),
        ];
    }
}