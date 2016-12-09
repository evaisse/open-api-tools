<?php
/**
 * User: evaisse
 * Date: 08/12/2016
 * Time: 17:54
 */
namespace OpenApi;

/**
 * Class PathItem
 * @package OpenApi
 */
class PathItem
{
    /**
     * @var	string	Allows for an external definition of this path item. The referenced structure MUST be in the format of a Path Item Object. If there are conflicts between the referenced definition and this Path Item's definition, the behavior is undefined.
     */
    protected $ref;
    /**
     * @var	Operation A definition of a GET operation on this path.
     */
    protected $get;
    /**
     * @var	Operation A definition of a PUT operation on this path.
     */
    protected $put;
    /**
     * @var	Operation A definition of a POST operation on this path.
     */
    protected $post;
    /**
     * @var	Operation A definition of a DELETE operation on this path.
     */
    protected $delete;
    /**
     * @var	Operation A definition of a OPTIONS operation on this path.
     */
    protected $options;
    /**
     * @var	Operation A definition of a HEAD operation on this path.
     */
    protected $head;
    /**
     * @var	Operation A definition of a PATCH operation on this path.
     */
    protected $patch;
    /**
     * @var	Parameter[]|Reference[]	A list of parameters that are applicable for all the operations described under this path. These parameters can be overridden at the operation level, but cannot be removed there. The list MUST NOT include duplicated parameters. A unique parameter is defined by a combination of a name and location. The list can use the Reference Object to link to parameters that are defined at the Swagger Object's parameters. There can be one "body" parameter at most.
     */
    protected $parameters;
}