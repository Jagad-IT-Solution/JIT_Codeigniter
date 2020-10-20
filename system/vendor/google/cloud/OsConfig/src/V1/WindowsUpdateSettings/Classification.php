<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/osconfig/v1/patch_jobs.proto

namespace Google\Cloud\OsConfig\V1\WindowsUpdateSettings;

use UnexpectedValueException;

/**
 * Microsoft Windows update classifications as defined in
 * [1]
 * https://support.microsoft.com/en-us/help/824684/description-of-the-standard-terminology-that-is-used-to-describe-micro
 *
 * Protobuf type <code>google.cloud.osconfig.v1.WindowsUpdateSettings.Classification</code>
 */
class Classification
{
    /**
     * Invalid. If classifications are included, they must be specified.
     *
     * Generated from protobuf enum <code>CLASSIFICATION_UNSPECIFIED = 0;</code>
     */
    const CLASSIFICATION_UNSPECIFIED = 0;
    /**
     * "A widely released fix for a specific problem that addresses a critical,
     * non-security-related bug." [1]
     *
     * Generated from protobuf enum <code>CRITICAL = 1;</code>
     */
    const CRITICAL = 1;
    /**
     * "A widely released fix for a product-specific, security-related
     * vulnerability. Security vulnerabilities are rated by their severity. The
     * severity rating is indicated in the Microsoft security bulletin as
     * critical, important, moderate, or low." [1]
     *
     * Generated from protobuf enum <code>SECURITY = 2;</code>
     */
    const SECURITY = 2;
    /**
     * "A widely released and frequent software update that contains additions
     * to a product's definition database. Definition databases are often used
     * to detect objects that have specific attributes, such as malicious code,
     * phishing websites, or junk mail." [1]
     *
     * Generated from protobuf enum <code>DEFINITION = 3;</code>
     */
    const DEFINITION = 3;
    /**
     * "Software that controls the input and output of a device." [1]
     *
     * Generated from protobuf enum <code>DRIVER = 4;</code>
     */
    const DRIVER = 4;
    /**
     * "New product functionality that is first distributed outside the context
     * of a product release and that is typically included in the next full
     * product release." [1]
     *
     * Generated from protobuf enum <code>FEATURE_PACK = 5;</code>
     */
    const FEATURE_PACK = 5;
    /**
     * "A tested, cumulative set of all hotfixes, security updates, critical
     * updates, and updates. Additionally, service packs may contain additional
     * fixes for problems that are found internally since the release of the
     * product. Service packs my also contain a limited number of
     * customer-requested design changes or features." [1]
     *
     * Generated from protobuf enum <code>SERVICE_PACK = 6;</code>
     */
    const SERVICE_PACK = 6;
    /**
     * "A utility or feature that helps complete a task or set of tasks." [1]
     *
     * Generated from protobuf enum <code>TOOL = 7;</code>
     */
    const TOOL = 7;
    /**
     * "A tested, cumulative set of hotfixes, security updates, critical
     * updates, and updates that are packaged together for easy deployment. A
     * rollup generally targets a specific area, such as security, or a
     * component of a product, such as Internet Information Services (IIS)." [1]
     *
     * Generated from protobuf enum <code>UPDATE_ROLLUP = 8;</code>
     */
    const UPDATE_ROLLUP = 8;
    /**
     * "A widely released fix for a specific problem. An update addresses a
     * noncritical, non-security-related bug." [1]
     *
     * Generated from protobuf enum <code>UPDATE = 9;</code>
     */
    const UPDATE = 9;

    private static $valueToName = [
        self::CLASSIFICATION_UNSPECIFIED => 'CLASSIFICATION_UNSPECIFIED',
        self::CRITICAL => 'CRITICAL',
        self::SECURITY => 'SECURITY',
        self::DEFINITION => 'DEFINITION',
        self::DRIVER => 'DRIVER',
        self::FEATURE_PACK => 'FEATURE_PACK',
        self::SERVICE_PACK => 'SERVICE_PACK',
        self::TOOL => 'TOOL',
        self::UPDATE_ROLLUP => 'UPDATE_ROLLUP',
        self::UPDATE => 'UPDATE',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Classification::class, \Google\Cloud\OsConfig\V1\WindowsUpdateSettings_Classification::class);

