<?php
namespace Amz;

use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\SearchItemsResponse;

class AmazonDataParser {

    private $response;

    public function __construct(SearchItemsResponse $response) {
        $this->response = $response;
    }

    public function parse() {
        $items = $this->response->getSearchResult()->getItems();

        $parsedItems = [];

        foreach ($items as $item) {
            $parsedItems[] = [
                'ASIN' => $item->getASIN(),
                'Title' => $item->getItemInfo()->getTitle()->getDisplayValue(),
                'Price' => $item->getOffers()->getListings()[0]->getPrice()->getDisplayAmount(),
                'URL' => $item->getDetailPageURL(),
            ];
        }

        return $parsedItems;
    }
}
