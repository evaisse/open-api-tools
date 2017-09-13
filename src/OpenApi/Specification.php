<?php

namespace OpenApi;

/**
 * User: evaisse
 * Date: 08/12/2016
 * Time: 17:22
 * @see https://github.com/OAI/OpenAPI-Specification/blob/master/versions/3.0.md#schemaObject
 */
class Specification implements \JsonSerializable
{
    /**
     * @var string	Required. Specifies the Swagger Specification version being used. It can be used by the Swagger UI and other clients to interpret the API listing. The value MUST be "2.0".
     */
    protected $openapi = "3.0.0";

    /**
     * @var MetaData Object	Required. Provides metadata about the API. The metadata can be used by the clients if needed.
     */
    protected $info;

    /**
     * @var Server[] An array of Server Objects, which provide connectivity information to a target server. If the servers property is not provided, or is an empty array, the default value would be a Server Object with a url value of /
     */
    protected $servers = [];

    /**
     * @var PathsCollection Object	Required. The available paths and operations for the API.
     */
    protected $paths;

    /**
     * @var Components An element to hold various schemas for the specification.
     */
    protected $components;

    /**
     * @var ArrayList|SecurityRequirement[] A declaration of which security schemes are applied for the API as a whole. The list of values describes alternative security schemes that can be used (that is, there is a logical OR between the security requirements). Individual operations can override this definition.
     */
    protected $security;

    /**
     * @var ArrayList|Tag[] A list of tags used by the specification with additional metadata. The order of the tags can be used to reflect on their order by the parsing tools. Not all tags that are used by the Operation Object must be declared. The tags that are not declared may be organized randomly or based on the tools' logic. Each tag name in the list MUST be unique.
     */
    protected $tags;
    /**
     * @var ExternalDocumentation Additional external documentation.
     */
    protected $externalDocs;


    /**
     *
     */
    function __construct()
    {
        $this->info = new MetaData(); // Object	Required. Provides metadata about the API. The metadata can be used by the clients if needed.
        $this->host = "";	// The host (name or ip) serving the API. This MUST be the host only and does not include the scheme nor sub-paths. It MAY include a port. If the host is not included, the host serving the documentation is to be used (including the port). The host does not support path templating.
        $this->servers = [];
        $this->paths = new PathsCollection(); // Object	Required. The available paths and operations for the API.
        $this->components = new Components();
        $this->security = new ArrayList([], function ($item) { return $item instanceof SecurityRequirement; }); // A declaration of which security schemes are applied for the API as a whole. The list of values describes alternative security schemes that can be used (that is, there is a logical OR between the security requirements). Individual operations can override this definition.
        $this->tags = new ArrayList([], function ($item) { return $item instanceof Tag; });
    }


    /**
     * @return MetaData
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param MetaData $info
     * @return Specification
     */
    public function setInfo($info)
    {
        $this->info = $info;

        return $this;
    }


    /**
     * @return PathsCollection
     */
    public function getPaths()
    {
        return $this->paths;
    }

    /**
     * @param PathsCollection $paths
     * @return Specification
     */
    public function setPaths(PathsCollection $paths)
    {
        $this->paths = $paths;

        return $this;
    }

    /**
     * @return ArrayList|SecurityRequirement[]
     */
    public function getSecurity()
    {
        return $this->security;
    }

    /**
     * @param ArrayList|SecurityRequirement[] $security
     * @return Specification
     */
    public function setSecurity(ArrayList $security)
    {
        $this->security = $security;

        return $this;
    }

    /**
     * @return ArrayList|Tag[]
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param ArrayList|Tag[] $tags
     * @return Specification
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * @return ExternalDocumentation
     */
    public function getExternalDocs()
    {
        return $this->externalDocs;
    }

    /**
     * @param ExternalDocumentation $externalDocs
     * @return Specification
     */
    public function setExternalDocs(ExternalDocumentation $externalDocs)
    {
        $this->externalDocs = $externalDocs;

        return $this;
    }

    /**
     * @return string
     */
    public function getOpenapi()
    {
        return $this->openapi;
    }

    /**
     * @param string $openapi
     * @return Specification
     */
    public function setOpenapi($openapi)
    {
        $this->openapi = $openapi;

        return $this;
    }

    /**
     * @return Server[]
     */
    public function getServers()
    {
        return $this->servers;
    }

    /**
     * @param Server[] $servers
     * @return Specification
     */
    public function setServers(array $servers)
    {
        $this->servers = $servers;

        return $this;
    }


    /**
     * @param Server $server
     * @return Specification
     */
    public function addServer(Server $server)
    {
        $this->servers[] = $server;
        return $this;
    }

    /**
     * @return Components
     */
    public function getComponents()
    {
        return $this->components;
    }

    /**
     * @param Components $components
     * @return Specification
     */
    public function setComponents(Components $components)
    {
        $this->components = $components;

        return $this;
    }


    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $properties = [];
        foreach ($this as $k => $p) {
            if ($p === null) {
                continue;
            }
            $properties[$k] = $p;
        }
        return $properties;
    }

}