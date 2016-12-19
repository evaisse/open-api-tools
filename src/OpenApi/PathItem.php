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
class PathItem implements \JsonSerializable
{

    /**
     * @var string path to operation
     */
    protected $path;

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
     * @var	Parameter[]|Reference[]|ArrayList	A list of parameters that are applicable for all the operations described under this path. These parameters can be overridden at the operation level, but cannot be removed there. The list MUST NOT include duplicated parameters. A unique parameter is defined by a combination of a name and location. The list can use the Reference Object to link to parameters that are defined at the Swagger Object's parameters. There can be one "body" parameter at most.
     */
    protected $parameters;

    /**
     * @param string      $path       path to this item e.g. /foo/bar/{param}
     * @param Operation[] $operations A list of operation by http verb
     * @param string      $ref        ref to another path
     */
    function __construct($path, array $operations = [], $ref = null)
    {
        $this->path = $path;

        foreach ($operations as $ope) {
            $this->{"set".$ope->getMethod()}($ope);
        }

        $this->parameters = new ArrayList([], function ($item) {
            return $item instanceof Parameter || $item instanceof Reference;
        });
    }

    /**
     * @return Parameter[]|Reference[]|ArrayList
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param Parameter[]|Reference[]|ArrayList $parameters
     * @return PathItem
     */
    public function setParameters(ArrayList $parameters)
    {
        $this->parameters = $parameters;

        return $this;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param string $path
     * @return PathItem
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }


    /**
     * @param Operation $operation
     * @return self
     */
    public function setOperation(Operation $operation)
    {
        $this->{$operation->getMethod()} = $operation;
        return $this;
    }

    /**
     * @return Operation[] operations indexed by http verb/method
     */
    public function getOperations()
    {
        $ops = [];
        foreach (Operation::$verbs as $verb) {
            $ops[$verb] = $this->{$verb};
        }
        return $ops;
    }

    public function jsonSerialize()
    {
        $data = [];

        if ($this->ref) {
            $data['$ref'] = $this->ref;
        }

        foreach (Operation::$verbs as $verb) {
            if ($this->$verb) {
                $data[$verb] = $this->$verb;
            }
        }

        return $data;
    }


}