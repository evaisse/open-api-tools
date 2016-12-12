<?php
/**
 * User: evaisse
 * Date: 12/12/2016
 * Time: 12:42
 */
namespace OpenApi;

/**
 * Class QueryParameter
 * @package OpenApi
 */
class QueryParameter extends StandardParameter
{

    /**
     * {@inheritDoc}
     */
    protected $in = "query";

    /**
     * {@inheritDoc}
     */
    protected $collectionFormat = "multi";
}