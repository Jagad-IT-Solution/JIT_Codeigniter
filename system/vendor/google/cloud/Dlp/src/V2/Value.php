<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/privacy/dlp/v2/dlp.proto

namespace Google\Cloud\Dlp\V2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Set of primitive values supported by the system.
 * Note that for the purposes of inspection or transformation, the number
 * of bytes considered to comprise a 'Value' is based on its representation
 * as a UTF-8 encoded string. For example, if 'integer_value' is set to
 * 123456789, the number of bytes would be counted as 9, even though an
 * int64 only holds up to 8 bytes of data.
 *
 * Generated from protobuf message <code>google.privacy.dlp.v2.Value</code>
 */
class Value extends \Google\Protobuf\Internal\Message
{
    protected $type;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $integer_value
     *           integer
     *     @type float $float_value
     *           float
     *     @type string $string_value
     *           string
     *     @type bool $boolean_value
     *           boolean
     *     @type \Google\Protobuf\Timestamp $timestamp_value
     *           timestamp
     *     @type \Google\Type\TimeOfDay $time_value
     *           time of day
     *     @type \Google\Type\Date $date_value
     *           date
     *     @type int $day_of_week_value
     *           day of week
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Privacy\Dlp\V2\Dlp::initOnce();
        parent::__construct($data);
    }

    /**
     * integer
     *
     * Generated from protobuf field <code>int64 integer_value = 1;</code>
     * @return int|string
     */
    public function getIntegerValue()
    {
        return $this->readOneof(1);
    }

    public function hasIntegerValue()
    {
        return $this->hasOneof(1);
    }

    /**
     * integer
     *
     * Generated from protobuf field <code>int64 integer_value = 1;</code>
     * @param int|string $var
     * @return $this
     */
    public function setIntegerValue($var)
    {
        GPBUtil::checkInt64($var);
        $this->writeOneof(1, $var);

        return $this;
    }

    /**
     * float
     *
     * Generated from protobuf field <code>double float_value = 2;</code>
     * @return float
     */
    public function getFloatValue()
    {
        return $this->readOneof(2);
    }

    public function hasFloatValue()
    {
        return $this->hasOneof(2);
    }

    /**
     * float
     *
     * Generated from protobuf field <code>double float_value = 2;</code>
     * @param float $var
     * @return $this
     */
    public function setFloatValue($var)
    {
        GPBUtil::checkDouble($var);
        $this->writeOneof(2, $var);

        return $this;
    }

    /**
     * string
     *
     * Generated from protobuf field <code>string string_value = 3;</code>
     * @return string
     */
    public function getStringValue()
    {
        return $this->readOneof(3);
    }

    public function hasStringValue()
    {
        return $this->hasOneof(3);
    }

    /**
     * string
     *
     * Generated from protobuf field <code>string string_value = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setStringValue($var)
    {
        GPBUtil::checkString($var, True);
        $this->writeOneof(3, $var);

        return $this;
    }

    /**
     * boolean
     *
     * Generated from protobuf field <code>bool boolean_value = 4;</code>
     * @return bool
     */
    public function getBooleanValue()
    {
        return $this->readOneof(4);
    }

    public function hasBooleanValue()
    {
        return $this->hasOneof(4);
    }

    /**
     * boolean
     *
     * Generated from protobuf field <code>bool boolean_value = 4;</code>
     * @param bool $var
     * @return $this
     */
    public function setBooleanValue($var)
    {
        GPBUtil::checkBool($var);
        $this->writeOneof(4, $var);

        return $this;
    }

    /**
     * timestamp
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp timestamp_value = 5;</code>
     * @return \Google\Protobuf\Timestamp
     */
    public function getTimestampValue()
    {
        return $this->readOneof(5);
    }

    public function hasTimestampValue()
    {
        return $this->hasOneof(5);
    }

    /**
     * timestamp
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp timestamp_value = 5;</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setTimestampValue($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->writeOneof(5, $var);

        return $this;
    }

    /**
     * time of day
     *
     * Generated from protobuf field <code>.google.type.TimeOfDay time_value = 6;</code>
     * @return \Google\Type\TimeOfDay
     */
    public function getTimeValue()
    {
        return $this->readOneof(6);
    }

    public function hasTimeValue()
    {
        return $this->hasOneof(6);
    }

    /**
     * time of day
     *
     * Generated from protobuf field <code>.google.type.TimeOfDay time_value = 6;</code>
     * @param \Google\Type\TimeOfDay $var
     * @return $this
     */
    public function setTimeValue($var)
    {
        GPBUtil::checkMessage($var, \Google\Type\TimeOfDay::class);
        $this->writeOneof(6, $var);

        return $this;
    }

    /**
     * date
     *
     * Generated from protobuf field <code>.google.type.Date date_value = 7;</code>
     * @return \Google\Type\Date
     */
    public function getDateValue()
    {
        return $this->readOneof(7);
    }

    public function hasDateValue()
    {
        return $this->hasOneof(7);
    }

    /**
     * date
     *
     * Generated from protobuf field <code>.google.type.Date date_value = 7;</code>
     * @param \Google\Type\Date $var
     * @return $this
     */
    public function setDateValue($var)
    {
        GPBUtil::checkMessage($var, \Google\Type\Date::class);
        $this->writeOneof(7, $var);

        return $this;
    }

    /**
     * day of week
     *
     * Generated from protobuf field <code>.google.type.DayOfWeek day_of_week_value = 8;</code>
     * @return int
     */
    public function getDayOfWeekValue()
    {
        return $this->readOneof(8);
    }

    public function hasDayOfWeekValue()
    {
        return $this->hasOneof(8);
    }

    /**
     * day of week
     *
     * Generated from protobuf field <code>.google.type.DayOfWeek day_of_week_value = 8;</code>
     * @param int $var
     * @return $this
     */
    public function setDayOfWeekValue($var)
    {
        GPBUtil::checkEnum($var, \Google\Type\DayOfWeek::class);
        $this->writeOneof(8, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->whichOneof("type");
    }

}

