<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/container/v1/cluster_service.proto

namespace Google\Cloud\Container\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Kubernetes taint is comprised of three fields: key, value, and effect. Effect
 * can only be one of three types:  NoSchedule, PreferNoSchedule or NoExecute.
 * For more information, including usage and the valid values, see:
 * https://kubernetes.io/docs/concepts/configuration/taint-and-toleration/
 *
 * Generated from protobuf message <code>google.container.v1.NodeTaint</code>
 */
class NodeTaint extends \Google\Protobuf\Internal\Message
{
    /**
     * Key for taint.
     *
     * Generated from protobuf field <code>string key = 1;</code>
     */
    private $key = '';
    /**
     * Value for taint.
     *
     * Generated from protobuf field <code>string value = 2;</code>
     */
    private $value = '';
    /**
     * Effect for taint.
     *
     * Generated from protobuf field <code>.google.container.v1.NodeTaint.Effect effect = 3;</code>
     */
    private $effect = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $key
     *           Key for taint.
     *     @type string $value
     *           Value for taint.
     *     @type int $effect
     *           Effect for taint.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Container\V1\ClusterService::initOnce();
        parent::__construct($data);
    }

    /**
     * Key for taint.
     *
     * Generated from protobuf field <code>string key = 1;</code>
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Key for taint.
     *
     * Generated from protobuf field <code>string key = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setKey($var)
    {
        GPBUtil::checkString($var, True);
        $this->key = $var;

        return $this;
    }

    /**
     * Value for taint.
     *
     * Generated from protobuf field <code>string value = 2;</code>
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Value for taint.
     *
     * Generated from protobuf field <code>string value = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setValue($var)
    {
        GPBUtil::checkString($var, True);
        $this->value = $var;

        return $this;
    }

    /**
     * Effect for taint.
     *
     * Generated from protobuf field <code>.google.container.v1.NodeTaint.Effect effect = 3;</code>
     * @return int
     */
    public function getEffect()
    {
        return $this->effect;
    }

    /**
     * Effect for taint.
     *
     * Generated from protobuf field <code>.google.container.v1.NodeTaint.Effect effect = 3;</code>
     * @param int $var
     * @return $this
     */
    public function setEffect($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Container\V1\NodeTaint\Effect::class);
        $this->effect = $var;

        return $this;
    }

}

