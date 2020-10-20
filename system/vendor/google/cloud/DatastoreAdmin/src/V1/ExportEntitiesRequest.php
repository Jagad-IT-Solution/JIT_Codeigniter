<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/datastore/admin/v1/datastore_admin.proto

namespace Google\Cloud\Datastore\Admin\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The request for
 * [google.datastore.admin.v1.DatastoreAdmin.ExportEntities][google.datastore.admin.v1.DatastoreAdmin.ExportEntities].
 *
 * Generated from protobuf message <code>google.datastore.admin.v1.ExportEntitiesRequest</code>
 */
class ExportEntitiesRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. Project ID against which to make the request.
     *
     * Generated from protobuf field <code>string project_id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $project_id = '';
    /**
     * Client-assigned labels.
     *
     * Generated from protobuf field <code>map<string, string> labels = 2;</code>
     */
    private $labels;
    /**
     * Description of what data from the project is included in the export.
     *
     * Generated from protobuf field <code>.google.datastore.admin.v1.EntityFilter entity_filter = 3;</code>
     */
    private $entity_filter = null;
    /**
     * Required. Location for the export metadata and data files.
     * The full resource URL of the external storage location. Currently, only
     * Google Cloud Storage is supported. So output_url_prefix should be of the
     * form: `gs://BUCKET_NAME[/NAMESPACE_PATH]`, where `BUCKET_NAME` is the
     * name of the Cloud Storage bucket and `NAMESPACE_PATH` is an optional Cloud
     * Storage namespace path (this is not a Cloud Datastore namespace). For more
     * information about Cloud Storage namespace paths, see
     * [Object name
     * considerations](https://cloud.google.com/storage/docs/naming#object-considerations).
     * The resulting files will be nested deeper than the specified URL prefix.
     * The final output URL will be provided in the
     * [google.datastore.admin.v1.ExportEntitiesResponse.output_url][google.datastore.admin.v1.ExportEntitiesResponse.output_url] field. That
     * value should be used for subsequent ImportEntities operations.
     * By nesting the data files deeper, the same Cloud Storage bucket can be used
     * in multiple ExportEntities operations without conflict.
     *
     * Generated from protobuf field <code>string output_url_prefix = 4 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $output_url_prefix = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $project_id
     *           Required. Project ID against which to make the request.
     *     @type array|\Google\Protobuf\Internal\MapField $labels
     *           Client-assigned labels.
     *     @type \Google\Cloud\Datastore\Admin\V1\EntityFilter $entity_filter
     *           Description of what data from the project is included in the export.
     *     @type string $output_url_prefix
     *           Required. Location for the export metadata and data files.
     *           The full resource URL of the external storage location. Currently, only
     *           Google Cloud Storage is supported. So output_url_prefix should be of the
     *           form: `gs://BUCKET_NAME[/NAMESPACE_PATH]`, where `BUCKET_NAME` is the
     *           name of the Cloud Storage bucket and `NAMESPACE_PATH` is an optional Cloud
     *           Storage namespace path (this is not a Cloud Datastore namespace). For more
     *           information about Cloud Storage namespace paths, see
     *           [Object name
     *           considerations](https://cloud.google.com/storage/docs/naming#object-considerations).
     *           The resulting files will be nested deeper than the specified URL prefix.
     *           The final output URL will be provided in the
     *           [google.datastore.admin.v1.ExportEntitiesResponse.output_url][google.datastore.admin.v1.ExportEntitiesResponse.output_url] field. That
     *           value should be used for subsequent ImportEntities operations.
     *           By nesting the data files deeper, the same Cloud Storage bucket can be used
     *           in multiple ExportEntities operations without conflict.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Datastore\Admin\V1\DatastoreAdmin::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. Project ID against which to make the request.
     *
     * Generated from protobuf field <code>string project_id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getProjectId()
    {
        return $this->project_id;
    }

    /**
     * Required. Project ID against which to make the request.
     *
     * Generated from protobuf field <code>string project_id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setProjectId($var)
    {
        GPBUtil::checkString($var, True);
        $this->project_id = $var;

        return $this;
    }

    /**
     * Client-assigned labels.
     *
     * Generated from protobuf field <code>map<string, string> labels = 2;</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * Client-assigned labels.
     *
     * Generated from protobuf field <code>map<string, string> labels = 2;</code>
     * @param array|\Google\Protobuf\Internal\MapField $var
     * @return $this
     */
    public function setLabels($var)
    {
        $arr = GPBUtil::checkMapField($var, \Google\Protobuf\Internal\GPBType::STRING, \Google\Protobuf\Internal\GPBType::STRING);
        $this->labels = $arr;

        return $this;
    }

    /**
     * Description of what data from the project is included in the export.
     *
     * Generated from protobuf field <code>.google.datastore.admin.v1.EntityFilter entity_filter = 3;</code>
     * @return \Google\Cloud\Datastore\Admin\V1\EntityFilter
     */
    public function getEntityFilter()
    {
        return isset($this->entity_filter) ? $this->entity_filter : null;
    }

    public function hasEntityFilter()
    {
        return isset($this->entity_filter);
    }

    public function clearEntityFilter()
    {
        unset($this->entity_filter);
    }

    /**
     * Description of what data from the project is included in the export.
     *
     * Generated from protobuf field <code>.google.datastore.admin.v1.EntityFilter entity_filter = 3;</code>
     * @param \Google\Cloud\Datastore\Admin\V1\EntityFilter $var
     * @return $this
     */
    public function setEntityFilter($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Datastore\Admin\V1\EntityFilter::class);
        $this->entity_filter = $var;

        return $this;
    }

    /**
     * Required. Location for the export metadata and data files.
     * The full resource URL of the external storage location. Currently, only
     * Google Cloud Storage is supported. So output_url_prefix should be of the
     * form: `gs://BUCKET_NAME[/NAMESPACE_PATH]`, where `BUCKET_NAME` is the
     * name of the Cloud Storage bucket and `NAMESPACE_PATH` is an optional Cloud
     * Storage namespace path (this is not a Cloud Datastore namespace). For more
     * information about Cloud Storage namespace paths, see
     * [Object name
     * considerations](https://cloud.google.com/storage/docs/naming#object-considerations).
     * The resulting files will be nested deeper than the specified URL prefix.
     * The final output URL will be provided in the
     * [google.datastore.admin.v1.ExportEntitiesResponse.output_url][google.datastore.admin.v1.ExportEntitiesResponse.output_url] field. That
     * value should be used for subsequent ImportEntities operations.
     * By nesting the data files deeper, the same Cloud Storage bucket can be used
     * in multiple ExportEntities operations without conflict.
     *
     * Generated from protobuf field <code>string output_url_prefix = 4 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getOutputUrlPrefix()
    {
        return $this->output_url_prefix;
    }

    /**
     * Required. Location for the export metadata and data files.
     * The full resource URL of the external storage location. Currently, only
     * Google Cloud Storage is supported. So output_url_prefix should be of the
     * form: `gs://BUCKET_NAME[/NAMESPACE_PATH]`, where `BUCKET_NAME` is the
     * name of the Cloud Storage bucket and `NAMESPACE_PATH` is an optional Cloud
     * Storage namespace path (this is not a Cloud Datastore namespace). For more
     * information about Cloud Storage namespace paths, see
     * [Object name
     * considerations](https://cloud.google.com/storage/docs/naming#object-considerations).
     * The resulting files will be nested deeper than the specified URL prefix.
     * The final output URL will be provided in the
     * [google.datastore.admin.v1.ExportEntitiesResponse.output_url][google.datastore.admin.v1.ExportEntitiesResponse.output_url] field. That
     * value should be used for subsequent ImportEntities operations.
     * By nesting the data files deeper, the same Cloud Storage bucket can be used
     * in multiple ExportEntities operations without conflict.
     *
     * Generated from protobuf field <code>string output_url_prefix = 4 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setOutputUrlPrefix($var)
    {
        GPBUtil::checkString($var, True);
        $this->output_url_prefix = $var;

        return $this;
    }

}

