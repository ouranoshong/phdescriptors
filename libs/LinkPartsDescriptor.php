<?php
/**
 * Created by PhpStorm.
 * User: hong
 * Date: 9/28/16
 * Time: 2:22 PM.
 */

namespace PhDescriptors;

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
     *
     *
     * @param string $url
     */
    public function __construct($url = '')
    {
        if ($url) {
            $this->init($url);
        }
    }

    /**
     * @param array $parts
     *
     * @return $this
     */
    public function init($parts)
    {
        $this->protocol = $parts['protocol'];
        $this->host = $parts['host'];
        $this->path = $parts['path'];
        $this->file = $parts['file'];
        $this->query = $parts['query'];
        $this->domain = $parts['domain'];
        $this->port = $parts['port'];
        $this->auth_username = $parts['auth_username'];
        $this->auth_password = $parts['auth_password'];

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
