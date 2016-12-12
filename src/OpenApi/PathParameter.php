<?php
/**
 * User: evaisse
 * Date: 12/12/2016
 * Time: 12:43
 */
namespace OpenApi;

/**
 * Class PathParameter
 * @package OpenApi
 */
class PathParameter extends StandardParameter
{


    /**
     * @var string Required. The location of the parameter. Possible values are "query", "header", "path", "formData" or "body".
     */
    protected $in = "path";

    /**
     * @var boolean Determines whether this parameter is mandatory. If the parameter is in "path", this property is required and its value MUST be true. Otherwise, the property MAY be included and its default value is false.
     */
    protected $required = true;


}