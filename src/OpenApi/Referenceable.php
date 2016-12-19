<?php
/**
 * User: evaisse
 * Date: 15/12/2016
 * Time: 10:15
 */
namespace OpenApi;

/**
 * Class Referenceable
 * @package OpenApi
 */
interface Referenceable
{

    /**
     * @return string a name to reference in /#/definitions/ReferenceName
     */
    public function getName();

}