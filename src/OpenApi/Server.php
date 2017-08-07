<?php
/**
 * User: evaisse
 * Date: 12/09/2017
 * Time: 15:02
 */
namespace OpenApi;

/**
 * Class Server
 * @package OpenApi
 */
class Server implements \JsonSerializable
{

    /**
     * @var string A URL to the target host. This URL supports Server Variables and MAY be relative,
     *             to indicate that the host location is relative to the location where the OpenAPI document
     *             is being served. Variable substitutions will be made when a variable is named in {brackets}.
     */
    protected $url;

    /**
     * @var string An optional string describing the host designated by the URL. CommonMark syntax MAY be used
     *             for rich text representation.
     */
    protected $description;


    /**
     * @var string[]|ServerVariable[] A map between a variable name and its value. The value is used for
     *                                substitution in the server's URL template.
     */
    protected $variables = [];


    /**
     * Server constructor.
     * @param string                     $url
     * @param string                     $description
     * @param ServerVariable[]|\string[] $variables
     */
    public function __construct($url, $description = null, array $variables = [])
    {
        $this->url = $url;
        $this->description = $description;
        $this->variables = $variables;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }


    /**
     * @return string
     */
    public function getDescription()
    {
        return (string)$this->description;
    }

    /**
     * @return ServerVariable[]|\string[]
     */
    public function getVariables()
    {
        return $this->variables;
    }

    /**
     * @param ServerVariable[]|\string[] $variables
     * @return Server
     */
    public function setVariables($variables)
    {
        $this->variables = $variables;

        return $this;
    }

    /**
     * @return array
     */
    function jsonSerialize()
    {
        $r = [];
        foreach ($this as $k => $v) {
            if (!empty($v)) {
                $r[$k] = $v;
            }
        }

        return $r;
    }

}