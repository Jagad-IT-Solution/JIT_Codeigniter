<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/talent/v4beta1/filters.proto

namespace Google\Cloud\Talent\V4beta1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Work experience filter.
 * This filter is used to search for profiles with working experience length
 * between [min_experience][google.cloud.talent.v4beta1.WorkExperienceFilter.min_experience] and [max_experience][google.cloud.talent.v4beta1.WorkExperienceFilter.max_experience].
 *
 * Generated from protobuf message <code>google.cloud.talent.v4beta1.WorkExperienceFilter</code>
 */
class WorkExperienceFilter extends \Google\Protobuf\Internal\Message
{
    /**
     * The minimum duration of the work experience (inclusive).
     *
     * Generated from protobuf field <code>.google.protobuf.Duration min_experience = 1;</code>
     */
    private $min_experience = null;
    /**
     * The maximum duration of the work experience (exclusive).
     *
     * Generated from protobuf field <code>.google.protobuf.Duration max_experience = 2;</code>
     */
    private $max_experience = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Protobuf\Duration $min_experience
     *           The minimum duration of the work experience (inclusive).
     *     @type \Google\Protobuf\Duration $max_experience
     *           The maximum duration of the work experience (exclusive).
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Talent\V4Beta1\Filters::initOnce();
        parent::__construct($data);
    }

    /**
     * The minimum duration of the work experience (inclusive).
     *
     * Generated from protobuf field <code>.google.protobuf.Duration min_experience = 1;</code>
     * @return \Google\Protobuf\Duration
     */
    public function getMinExperience()
    {
        return isset($this->min_experience) ? $this->min_experience : null;
    }

    public function hasMinExperience()
    {
        return isset($this->min_experience);
    }

    public function clearMinExperience()
    {
        unset($this->min_experience);
    }

    /**
     * The minimum duration of the work experience (inclusive).
     *
     * Generated from protobuf field <code>.google.protobuf.Duration min_experience = 1;</code>
     * @param \Google\Protobuf\Duration $var
     * @return $this
     */
    public function setMinExperience($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Duration::class);
        $this->min_experience = $var;

        return $this;
    }

    /**
     * The maximum duration of the work experience (exclusive).
     *
     * Generated from protobuf field <code>.google.protobuf.Duration max_experience = 2;</code>
     * @return \Google\Protobuf\Duration
     */
    public function getMaxExperience()
    {
        return isset($this->max_experience) ? $this->max_experience : null;
    }

    public function hasMaxExperience()
    {
        return isset($this->max_experience);
    }

    public function clearMaxExperience()
    {
        unset($this->max_experience);
    }

    /**
     * The maximum duration of the work experience (exclusive).
     *
     * Generated from protobuf field <code>.google.protobuf.Duration max_experience = 2;</code>
     * @param \Google\Protobuf\Duration $var
     * @return $this
     */
    public function setMaxExperience($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Duration::class);
        $this->max_experience = $var;

        return $this;
    }

}

