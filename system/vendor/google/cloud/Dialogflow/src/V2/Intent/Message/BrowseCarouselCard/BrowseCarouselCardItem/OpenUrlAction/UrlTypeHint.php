<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/dialogflow/v2/intent.proto

namespace Google\Cloud\Dialogflow\V2\Intent\Message\BrowseCarouselCard\BrowseCarouselCardItem\OpenUrlAction;

use UnexpectedValueException;

/**
 * Type of the URI.
 *
 * Protobuf type <code>google.cloud.dialogflow.v2.Intent.Message.BrowseCarouselCard.BrowseCarouselCardItem.OpenUrlAction.UrlTypeHint</code>
 */
class UrlTypeHint
{
    /**
     * Unspecified
     *
     * Generated from protobuf enum <code>URL_TYPE_HINT_UNSPECIFIED = 0;</code>
     */
    const URL_TYPE_HINT_UNSPECIFIED = 0;
    /**
     * Url would be an amp action
     *
     * Generated from protobuf enum <code>AMP_ACTION = 1;</code>
     */
    const AMP_ACTION = 1;
    /**
     * URL that points directly to AMP content, or to a canonical URL
     * which refers to AMP content via <link rel="amphtml">.
     *
     * Generated from protobuf enum <code>AMP_CONTENT = 2;</code>
     */
    const AMP_CONTENT = 2;

    private static $valueToName = [
        self::URL_TYPE_HINT_UNSPECIFIED => 'URL_TYPE_HINT_UNSPECIFIED',
        self::AMP_ACTION => 'AMP_ACTION',
        self::AMP_CONTENT => 'AMP_CONTENT',
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
class_alias(UrlTypeHint::class, \Google\Cloud\Dialogflow\V2\Intent_Message_BrowseCarouselCard_BrowseCarouselCardItem_OpenUrlAction_UrlTypeHint::class);

