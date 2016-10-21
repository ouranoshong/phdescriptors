<?php
/**
 * Created by PhpStorm.
 * User: hong
 * Date: 9/28/16
 * Time: 2:22 PM.
 */

namespace PhDescriptors;
use phpDocumentor\Reflection\DocBlock\Tags\Link;
use PhUtils\LinkUtil;

/**
 * Class LinkPartsDescriptor
 *
 * @package PhDescriptors
 */
class LinkPartsDescriptor
{
    /**
     *
     */
    const PROTOCOL_PREFIX_HTTP = 'http://';

    /**
     *
     */
    const PROTOCOL_PREFIX_HTTPS = 'https://';

    /**
     * @var string
     */
    public $protocol;

    /**
     * @var string
     */
    public $host;

    /**
     * @var string
     */
    public $path;

    /**
     * @var string
     */
    public $file;

    /**
     * @var string
     */
    public $domain;

    /**
     * @var string
     */
    public $port;

    /**
     * @var string
     */
    public $query;

    /**
     * @var string
     */
    public $auth_username;

    /**
     * @var string
     */
    public $auth_password;

    /**
     * @var string
     */
    public $fragment;

    /**
     * LinkPartsDescriptor constructor.
     * @param string $url
     * @param \PhUtils\LinkUtil $parser
     */
    public function __construct($url = '', $parser = LinkUtil::class)
    {
        if ($url) {
            $this->init($parser::parse($url, $parser));
        }
    }

    /**
     * @param string|array $parts
     * @param \PhUtils\LinkUtil $parser
     *
     * @return string $this
     */
    public function init($parts, $parser = LinkUtil::class)
    {

        if (is_string($parts) && filter_var($parts, FILTER_VALIDATE_URL)) {
            $parts = $parser::parse($parts);
        }

        /**@var $Property \ReflectionProperty */
        foreach((new \ReflectionObject($this))->getProperties(\ReflectionProperty::IS_PUBLIC) as $Property) {
            if ((!$Property->getValue($this)) && isset($parts[$Property->getName()])) {
                $Property->setValue($this, $parts[$Property->getName()]);
            }
        }

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return get_object_vars($this);
    }

    /**
     * @return bool
     */
    public function isSSL()
    {
        return $this->protocol == self::PROTOCOL_PREFIX_HTTPS;
    }
}
