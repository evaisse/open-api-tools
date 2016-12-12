<?php
/**
 * User: evaisse
 * Date: 12/12/2016
 * Time: 12:43
 */
namespace OpenApi;

/**
 * Class FormDataParameter
 * @package OpenApi
 */
class FormDataParameter extends StandardParameter
{

    /**
     * {@inheritDoc}
     */
    protected $in = "formData";

    /**
     * {@inheritDoc}
     */
    protected $collectionFormat = "multi";
}