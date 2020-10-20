<?php
/*
 * Copyright 2018 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/*
 * GENERATED CODE WARNING
 * This file was generated from the file
 * https://github.com/google/googleapis/blob/master/google/privacy/dlp/v2/dlp.proto
 * and updates to that file get reflected here through a refresh process.
 */

namespace Google\Cloud\Dlp\V2\Gapic;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\PathTemplate;
use Google\ApiCore\RequestParamsHeaderDescriptor;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use Google\Cloud\Dlp\V2\ByteContentItem;
use Google\Cloud\Dlp\V2\CancelDlpJobRequest;
use Google\Cloud\Dlp\V2\ContentItem;
use Google\Cloud\Dlp\V2\CreateDeidentifyTemplateRequest;
use Google\Cloud\Dlp\V2\CreateDlpJobRequest;
use Google\Cloud\Dlp\V2\CreateInspectTemplateRequest;
use Google\Cloud\Dlp\V2\CreateJobTriggerRequest;
use Google\Cloud\Dlp\V2\CreateStoredInfoTypeRequest;
use Google\Cloud\Dlp\V2\DeidentifyConfig;
use Google\Cloud\Dlp\V2\DeidentifyContentRequest;
use Google\Cloud\Dlp\V2\DeidentifyContentResponse;
use Google\Cloud\Dlp\V2\DeidentifyTemplate;
use Google\Cloud\Dlp\V2\DeleteDeidentifyTemplateRequest;
use Google\Cloud\Dlp\V2\DeleteDlpJobRequest;
use Google\Cloud\Dlp\V2\DeleteInspectTemplateRequest;
use Google\Cloud\Dlp\V2\DeleteJobTriggerRequest;
use Google\Cloud\Dlp\V2\DeleteStoredInfoTypeRequest;
use Google\Cloud\Dlp\V2\DlpJob;
use Google\Cloud\Dlp\V2\DlpJobType;
use Google\Cloud\Dlp\V2\FinishDlpJobRequest;
use Google\Cloud\Dlp\V2\GetDeidentifyTemplateRequest;
use Google\Cloud\Dlp\V2\GetDlpJobRequest;
use Google\Cloud\Dlp\V2\GetInspectTemplateRequest;
use Google\Cloud\Dlp\V2\GetJobTriggerRequest;
use Google\Cloud\Dlp\V2\GetStoredInfoTypeRequest;
use Google\Cloud\Dlp\V2\HybridContentItem;
use Google\Cloud\Dlp\V2\HybridInspectDlpJobRequest;
use Google\Cloud\Dlp\V2\HybridInspectJobTriggerRequest;
use Google\Cloud\Dlp\V2\HybridInspectResponse;
use Google\Cloud\Dlp\V2\InspectConfig;
use Google\Cloud\Dlp\V2\InspectContentRequest;
use Google\Cloud\Dlp\V2\InspectContentResponse;
use Google\Cloud\Dlp\V2\InspectJobConfig;
use Google\Cloud\Dlp\V2\InspectTemplate;
use Google\Cloud\Dlp\V2\JobTrigger;
use Google\Cloud\Dlp\V2\ListDeidentifyTemplatesRequest;
use Google\Cloud\Dlp\V2\ListDeidentifyTemplatesResponse;
use Google\Cloud\Dlp\V2\ListDlpJobsRequest;
use Google\Cloud\Dlp\V2\ListDlpJobsResponse;
use Google\Cloud\Dlp\V2\ListInfoTypesRequest;
use Google\Cloud\Dlp\V2\ListInfoTypesResponse;
use Google\Cloud\Dlp\V2\ListInspectTemplatesRequest;
use Google\Cloud\Dlp\V2\ListInspectTemplatesResponse;
use Google\Cloud\Dlp\V2\ListJobTriggersRequest;
use Google\Cloud\Dlp\V2\ListJobTriggersResponse;
use Google\Cloud\Dlp\V2\ListStoredInfoTypesRequest;
use Google\Cloud\Dlp\V2\ListStoredInfoTypesResponse;
use Google\Cloud\Dlp\V2\RedactImageRequest;
use Google\Cloud\Dlp\V2\RedactImageRequest\ImageRedactionConfig;
use Google\Cloud\Dlp\V2\RedactImageResponse;
use Google\Cloud\Dlp\V2\ReidentifyContentRequest;
use Google\Cloud\Dlp\V2\ReidentifyContentResponse;
use Google\Cloud\Dlp\V2\RiskAnalysisJobConfig;
use Google\Cloud\Dlp\V2\StoredInfoType;
use Google\Cloud\Dlp\V2\StoredInfoTypeConfig;
use Google\Cloud\Dlp\V2\UpdateDeidentifyTemplateRequest;
use Google\Cloud\Dlp\V2\UpdateInspectTemplateRequest;
use Google\Cloud\Dlp\V2\UpdateJobTriggerRequest;
use Google\Cloud\Dlp\V2\UpdateStoredInfoTypeRequest;
use Google\Protobuf\FieldMask;
use Google\Protobuf\GPBEmpty;

/**
 * Service Description: The Cloud Data Loss Prevention (DLP) API is a service that allows clients
 * to detect the presence of Personally Identifiable Information (PII) and other
 * privacy-sensitive data in user-supplied, unstructured data streams, like text
 * blocks or images.
 * The service also includes methods for sensitive data redaction and
 * scheduling of data scans on Google Cloud Platform based data sets.
 *
 * To learn more about concepts and find how-to guides see
 * https://cloud.google.com/dlp/docs/.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $dlpServiceClient = new DlpServiceClient();
 * try {
 *     $response = $dlpServiceClient->inspectContent();
 * } finally {
 *     $dlpServiceClient->close();
 * }
 * ```
 *
 * Many parameters require resource names to be formatted in a particular way. To assist
 * with these names, this class includes a format method for each type of name, and additionally
 * a parseName method to extract the individual identifiers contained within formatted names
 * that are returned by the API.
 */
class DlpServiceGapicClient
{
    use GapicClientTrait;

    /**
     * The name of the service.
     */
    const SERVICE_NAME = 'google.privacy.dlp.v2.DlpService';

    /**
     * The default address of the service.
     */
    const SERVICE_ADDRESS = 'dlp.googleapis.com';

    /**
     * The default port of the service.
     */
    const DEFAULT_SERVICE_PORT = 443;

    /**
     * The name of the code generator, to be included in the agent header.
     */
    const CODEGEN_NAME = 'gapic';

    /**
     * The default scopes required by the service.
     */
    public static $serviceScopes = [
        'https://www.googleapis.com/auth/cloud-platform',
    ];
    private static $deidentifyTemplateNameTemplate;
    private static $dlpJobNameTemplate;
    private static $inspectTemplateNameTemplate;
    private static $jobTriggerNameTemplate;
    private static $locationNameTemplate;
    private static $organizationNameTemplate;
    private static $organizationDeidentifyTemplateNameTemplate;
    private static $organizationInspectTemplateNameTemplate;
    private static $organizationLocationNameTemplate;
    private static $organizationLocationDeidentifyTemplateNameTemplate;
    private static $organizationLocationInspectTemplateNameTemplate;
    private static $organizationLocationStoredInfoTypeNameTemplate;
    private static $organizationStoredInfoTypeNameTemplate;
    private static $projectNameTemplate;
    private static $projectDeidentifyTemplateNameTemplate;
    private static $projectDlpJobNameTemplate;
    private static $projectInspectTemplateNameTemplate;
    private static $projectJobTriggerNameTemplate;
    private static $projectLocationDeidentifyTemplateNameTemplate;
    private static $projectLocationDlpJobNameTemplate;
    private static $projectLocationInspectTemplateNameTemplate;
    private static $projectLocationJobTriggerNameTemplate;
    private static $projectLocationStoredInfoTypeNameTemplate;
    private static $projectStoredInfoTypeNameTemplate;
    private static $storedInfoTypeNameTemplate;
    private static $pathTemplateMap;

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'apiEndpoint' => self::SERVICE_ADDRESS.':'.self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__.'/../resources/dlp_service_client_config.json',
            'descriptorsConfigPath' => __DIR__.'/../resources/dlp_service_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__.'/../resources/dlp_service_grpc_config.json',
            'credentialsConfig' => [
                'scopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__.'/../resources/dlp_service_rest_client_config.php',
                ],
            ],
        ];
    }

    private static function getDeidentifyTemplateNameTemplate()
    {
        if (null == self::$deidentifyTemplateNameTemplate) {
            self::$deidentifyTemplateNameTemplate = new PathTemplate('organizations/{organization}/deidentifyTemplates/{deidentify_template}');
        }

        return self::$deidentifyTemplateNameTemplate;
    }

    private static function getDlpJobNameTemplate()
    {
        if (null == self::$dlpJobNameTemplate) {
            self::$dlpJobNameTemplate = new PathTemplate('projects/{project}/dlpJobs/{dlp_job}');
        }

        return self::$dlpJobNameTemplate;
    }

    private static function getInspectTemplateNameTemplate()
    {
        if (null == self::$inspectTemplateNameTemplate) {
            self::$inspectTemplateNameTemplate = new PathTemplate('organizations/{organization}/inspectTemplates/{inspect_template}');
        }

        return self::$inspectTemplateNameTemplate;
    }

    private static function getJobTriggerNameTemplate()
    {
        if (null == self::$jobTriggerNameTemplate) {
            self::$jobTriggerNameTemplate = new PathTemplate('projects/{project}/jobTriggers/{job_trigger}');
        }

        return self::$jobTriggerNameTemplate;
    }

    private static function getLocationNameTemplate()
    {
        if (null == self::$locationNameTemplate) {
            self::$locationNameTemplate = new PathTemplate('projects/{project}/locations/{location}');
        }

        return self::$locationNameTemplate;
    }

    private static function getOrganizationNameTemplate()
    {
        if (null == self::$organizationNameTemplate) {
            self::$organizationNameTemplate = new PathTemplate('organizations/{organization}');
        }

        return self::$organizationNameTemplate;
    }

    private static function getOrganizationDeidentifyTemplateNameTemplate()
    {
        if (null == self::$organizationDeidentifyTemplateNameTemplate) {
            self::$organizationDeidentifyTemplateNameTemplate = new PathTemplate('organizations/{organization}/deidentifyTemplates/{deidentify_template}');
        }

        return self::$organizationDeidentifyTemplateNameTemplate;
    }

    private static function getOrganizationInspectTemplateNameTemplate()
    {
        if (null == self::$organizationInspectTemplateNameTemplate) {
            self::$organizationInspectTemplateNameTemplate = new PathTemplate('organizations/{organization}/inspectTemplates/{inspect_template}');
        }

        return self::$organizationInspectTemplateNameTemplate;
    }

    private static function getOrganizationLocationNameTemplate()
    {
        if (null == self::$organizationLocationNameTemplate) {
            self::$organizationLocationNameTemplate = new PathTemplate('organizations/{organization}/locations/{location}');
        }

        return self::$organizationLocationNameTemplate;
    }

    private static function getOrganizationLocationDeidentifyTemplateNameTemplate()
    {
        if (null == self::$organizationLocationDeidentifyTemplateNameTemplate) {
            self::$organizationLocationDeidentifyTemplateNameTemplate = new PathTemplate('organizations/{organization}/locations/{location}/deidentifyTemplates/{deidentify_template}');
        }

        return self::$organizationLocationDeidentifyTemplateNameTemplate;
    }

    private static function getOrganizationLocationInspectTemplateNameTemplate()
    {
        if (null == self::$organizationLocationInspectTemplateNameTemplate) {
            self::$organizationLocationInspectTemplateNameTemplate = new PathTemplate('organizations/{organization}/locations/{location}/inspectTemplates/{inspect_template}');
        }

        return self::$organizationLocationInspectTemplateNameTemplate;
    }

    private static function getOrganizationLocationStoredInfoTypeNameTemplate()
    {
        if (null == self::$organizationLocationStoredInfoTypeNameTemplate) {
            self::$organizationLocationStoredInfoTypeNameTemplate = new PathTemplate('organizations/{organization}/locations/{location}/storedInfoTypes/{stored_info_type}');
        }

        return self::$organizationLocationStoredInfoTypeNameTemplate;
    }

    private static function getOrganizationStoredInfoTypeNameTemplate()
    {
        if (null == self::$organizationStoredInfoTypeNameTemplate) {
            self::$organizationStoredInfoTypeNameTemplate = new PathTemplate('organizations/{organization}/storedInfoTypes/{stored_info_type}');
        }

        return self::$organizationStoredInfoTypeNameTemplate;
    }

    private static function getProjectNameTemplate()
    {
        if (null == self::$projectNameTemplate) {
            self::$projectNameTemplate = new PathTemplate('projects/{project}');
        }

        return self::$projectNameTemplate;
    }

    private static function getProjectDeidentifyTemplateNameTemplate()
    {
        if (null == self::$projectDeidentifyTemplateNameTemplate) {
            self::$projectDeidentifyTemplateNameTemplate = new PathTemplate('projects/{project}/deidentifyTemplates/{deidentify_template}');
        }

        return self::$projectDeidentifyTemplateNameTemplate;
    }

    private static function getProjectDlpJobNameTemplate()
    {
        if (null == self::$projectDlpJobNameTemplate) {
            self::$projectDlpJobNameTemplate = new PathTemplate('projects/{project}/dlpJobs/{dlp_job}');
        }

        return self::$projectDlpJobNameTemplate;
    }

    private static function getProjectInspectTemplateNameTemplate()
    {
        if (null == self::$projectInspectTemplateNameTemplate) {
            self::$projectInspectTemplateNameTemplate = new PathTemplate('projects/{project}/inspectTemplates/{inspect_template}');
        }

        return self::$projectInspectTemplateNameTemplate;
    }

    private static function getProjectJobTriggerNameTemplate()
    {
        if (null == self::$projectJobTriggerNameTemplate) {
            self::$projectJobTriggerNameTemplate = new PathTemplate('projects/{project}/jobTriggers/{job_trigger}');
        }

        return self::$projectJobTriggerNameTemplate;
    }

    private static function getProjectLocationDeidentifyTemplateNameTemplate()
    {
        if (null == self::$projectLocationDeidentifyTemplateNameTemplate) {
            self::$projectLocationDeidentifyTemplateNameTemplate = new PathTemplate('projects/{project}/locations/{location}/deidentifyTemplates/{deidentify_template}');
        }

        return self::$projectLocationDeidentifyTemplateNameTemplate;
    }

    private static function getProjectLocationDlpJobNameTemplate()
    {
        if (null == self::$projectLocationDlpJobNameTemplate) {
            self::$projectLocationDlpJobNameTemplate = new PathTemplate('projects/{project}/locations/{location}/dlpJobs/{dlp_job}');
        }

        return self::$projectLocationDlpJobNameTemplate;
    }

    private static function getProjectLocationInspectTemplateNameTemplate()
    {
        if (null == self::$projectLocationInspectTemplateNameTemplate) {
            self::$projectLocationInspectTemplateNameTemplate = new PathTemplate('projects/{project}/locations/{location}/inspectTemplates/{inspect_template}');
        }

        return self::$projectLocationInspectTemplateNameTemplate;
    }

    private static function getProjectLocationJobTriggerNameTemplate()
    {
        if (null == self::$projectLocationJobTriggerNameTemplate) {
            self::$projectLocationJobTriggerNameTemplate = new PathTemplate('projects/{project}/locations/{location}/jobTriggers/{job_trigger}');
        }

        return self::$projectLocationJobTriggerNameTemplate;
    }

    private static function getProjectLocationStoredInfoTypeNameTemplate()
    {
        if (null == self::$projectLocationStoredInfoTypeNameTemplate) {
            self::$projectLocationStoredInfoTypeNameTemplate = new PathTemplate('projects/{project}/locations/{location}/storedInfoTypes/{stored_info_type}');
        }

        return self::$projectLocationStoredInfoTypeNameTemplate;
    }

    private static function getProjectStoredInfoTypeNameTemplate()
    {
        if (null == self::$projectStoredInfoTypeNameTemplate) {
            self::$projectStoredInfoTypeNameTemplate = new PathTemplate('projects/{project}/storedInfoTypes/{stored_info_type}');
        }

        return self::$projectStoredInfoTypeNameTemplate;
    }

    private static function getStoredInfoTypeNameTemplate()
    {
        if (null == self::$storedInfoTypeNameTemplate) {
            self::$storedInfoTypeNameTemplate = new PathTemplate('organizations/{organization}/storedInfoTypes/{stored_info_type}');
        }

        return self::$storedInfoTypeNameTemplate;
    }

    private static function getPathTemplateMap()
    {
        if (null == self::$pathTemplateMap) {
            self::$pathTemplateMap = [
                'deidentifyTemplate' => self::getDeidentifyTemplateNameTemplate(),
                'dlpJob' => self::getDlpJobNameTemplate(),
                'inspectTemplate' => self::getInspectTemplateNameTemplate(),
                'jobTrigger' => self::getJobTriggerNameTemplate(),
                'location' => self::getLocationNameTemplate(),
                'organization' => self::getOrganizationNameTemplate(),
                'organizationDeidentifyTemplate' => self::getOrganizationDeidentifyTemplateNameTemplate(),
                'organizationInspectTemplate' => self::getOrganizationInspectTemplateNameTemplate(),
                'organizationLocation' => self::getOrganizationLocationNameTemplate(),
                'organizationLocationDeidentifyTemplate' => self::getOrganizationLocationDeidentifyTemplateNameTemplate(),
                'organizationLocationInspectTemplate' => self::getOrganizationLocationInspectTemplateNameTemplate(),
                'organizationLocationStoredInfoType' => self::getOrganizationLocationStoredInfoTypeNameTemplate(),
                'organizationStoredInfoType' => self::getOrganizationStoredInfoTypeNameTemplate(),
                'project' => self::getProjectNameTemplate(),
                'projectDeidentifyTemplate' => self::getProjectDeidentifyTemplateNameTemplate(),
                'projectDlpJob' => self::getProjectDlpJobNameTemplate(),
                'projectInspectTemplate' => self::getProjectInspectTemplateNameTemplate(),
                'projectJobTrigger' => self::getProjectJobTriggerNameTemplate(),
                'projectLocationDeidentifyTemplate' => self::getProjectLocationDeidentifyTemplateNameTemplate(),
                'projectLocationDlpJob' => self::getProjectLocationDlpJobNameTemplate(),
                'projectLocationInspectTemplate' => self::getProjectLocationInspectTemplateNameTemplate(),
                'projectLocationJobTrigger' => self::getProjectLocationJobTriggerNameTemplate(),
                'projectLocationStoredInfoType' => self::getProjectLocationStoredInfoTypeNameTemplate(),
                'projectStoredInfoType' => self::getProjectStoredInfoTypeNameTemplate(),
                'storedInfoType' => self::getStoredInfoTypeNameTemplate(),
            ];
        }

        return self::$pathTemplateMap;
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a deidentify_template resource.
     *
     * @param string $organization
     * @param string $deidentifyTemplate
     *
     * @return string The formatted deidentify_template resource.
     */
    public static function deidentifyTemplateName($organization, $deidentifyTemplate)
    {
        return self::getDeidentifyTemplateNameTemplate()->render([
            'organization' => $organization,
            'deidentify_template' => $deidentifyTemplate,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a dlp_job resource.
     *
     * @param string $project
     * @param string $dlpJob
     *
     * @return string The formatted dlp_job resource.
     */
    public static function dlpJobName($project, $dlpJob)
    {
        return self::getDlpJobNameTemplate()->render([
            'project' => $project,
            'dlp_job' => $dlpJob,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a inspect_template resource.
     *
     * @param string $organization
     * @param string $inspectTemplate
     *
     * @return string The formatted inspect_template resource.
     */
    public static function inspectTemplateName($organization, $inspectTemplate)
    {
        return self::getInspectTemplateNameTemplate()->render([
            'organization' => $organization,
            'inspect_template' => $inspectTemplate,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a job_trigger resource.
     *
     * @param string $project
     * @param string $jobTrigger
     *
     * @return string The formatted job_trigger resource.
     */
    public static function jobTriggerName($project, $jobTrigger)
    {
        return self::getJobTriggerNameTemplate()->render([
            'project' => $project,
            'job_trigger' => $jobTrigger,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a location resource.
     *
     * @param string $project
     * @param string $location
     *
     * @return string The formatted location resource.
     */
    public static function locationName($project, $location)
    {
        return self::getLocationNameTemplate()->render([
            'project' => $project,
            'location' => $location,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a organization resource.
     *
     * @param string $organization
     *
     * @return string The formatted organization resource.
     */
    public static function organizationName($organization)
    {
        return self::getOrganizationNameTemplate()->render([
            'organization' => $organization,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a organization_deidentify_template resource.
     *
     * @param string $organization
     * @param string $deidentifyTemplate
     *
     * @return string The formatted organization_deidentify_template resource.
     */
    public static function organizationDeidentifyTemplateName($organization, $deidentifyTemplate)
    {
        return self::getOrganizationDeidentifyTemplateNameTemplate()->render([
            'organization' => $organization,
            'deidentify_template' => $deidentifyTemplate,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a organization_inspect_template resource.
     *
     * @param string $organization
     * @param string $inspectTemplate
     *
     * @return string The formatted organization_inspect_template resource.
     */
    public static function organizationInspectTemplateName($organization, $inspectTemplate)
    {
        return self::getOrganizationInspectTemplateNameTemplate()->render([
            'organization' => $organization,
            'inspect_template' => $inspectTemplate,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a organization_location resource.
     *
     * @param string $organization
     * @param string $location
     *
     * @return string The formatted organization_location resource.
     */
    public static function organizationLocationName($organization, $location)
    {
        return self::getOrganizationLocationNameTemplate()->render([
            'organization' => $organization,
            'location' => $location,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a organization_location_deidentify_template resource.
     *
     * @param string $organization
     * @param string $location
     * @param string $deidentifyTemplate
     *
     * @return string The formatted organization_location_deidentify_template resource.
     */
    public static function organizationLocationDeidentifyTemplateName($organization, $location, $deidentifyTemplate)
    {
        return self::getOrganizationLocationDeidentifyTemplateNameTemplate()->render([
            'organization' => $organization,
            'location' => $location,
            'deidentify_template' => $deidentifyTemplate,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a organization_location_inspect_template resource.
     *
     * @param string $organization
     * @param string $location
     * @param string $inspectTemplate
     *
     * @return string The formatted organization_location_inspect_template resource.
     */
    public static function organizationLocationInspectTemplateName($organization, $location, $inspectTemplate)
    {
        return self::getOrganizationLocationInspectTemplateNameTemplate()->render([
            'organization' => $organization,
            'location' => $location,
            'inspect_template' => $inspectTemplate,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a organization_location_stored_info_type resource.
     *
     * @param string $organization
     * @param string $location
     * @param string $storedInfoType
     *
     * @return string The formatted organization_location_stored_info_type resource.
     */
    public static function organizationLocationStoredInfoTypeName($organization, $location, $storedInfoType)
    {
        return self::getOrganizationLocationStoredInfoTypeNameTemplate()->render([
            'organization' => $organization,
            'location' => $location,
            'stored_info_type' => $storedInfoType,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a organization_stored_info_type resource.
     *
     * @param string $organization
     * @param string $storedInfoType
     *
     * @return string The formatted organization_stored_info_type resource.
     */
    public static function organizationStoredInfoTypeName($organization, $storedInfoType)
    {
        return self::getOrganizationStoredInfoTypeNameTemplate()->render([
            'organization' => $organization,
            'stored_info_type' => $storedInfoType,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a project resource.
     *
     * @param string $project
     *
     * @return string The formatted project resource.
     */
    public static function projectName($project)
    {
        return self::getProjectNameTemplate()->render([
            'project' => $project,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a project_deidentify_template resource.
     *
     * @param string $project
     * @param string $deidentifyTemplate
     *
     * @return string The formatted project_deidentify_template resource.
     */
    public static function projectDeidentifyTemplateName($project, $deidentifyTemplate)
    {
        return self::getProjectDeidentifyTemplateNameTemplate()->render([
            'project' => $project,
            'deidentify_template' => $deidentifyTemplate,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a project_dlp_job resource.
     *
     * @param string $project
     * @param string $dlpJob
     *
     * @return string The formatted project_dlp_job resource.
     */
    public static function projectDlpJobName($project, $dlpJob)
    {
        return self::getProjectDlpJobNameTemplate()->render([
            'project' => $project,
            'dlp_job' => $dlpJob,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a project_inspect_template resource.
     *
     * @param string $project
     * @param string $inspectTemplate
     *
     * @return string The formatted project_inspect_template resource.
     */
    public static function projectInspectTemplateName($project, $inspectTemplate)
    {
        return self::getProjectInspectTemplateNameTemplate()->render([
            'project' => $project,
            'inspect_template' => $inspectTemplate,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a project_job_trigger resource.
     *
     * @param string $project
     * @param string $jobTrigger
     *
     * @return string The formatted project_job_trigger resource.
     */
    public static function projectJobTriggerName($project, $jobTrigger)
    {
        return self::getProjectJobTriggerNameTemplate()->render([
            'project' => $project,
            'job_trigger' => $jobTrigger,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a project_location_deidentify_template resource.
     *
     * @param string $project
     * @param string $location
     * @param string $deidentifyTemplate
     *
     * @return string The formatted project_location_deidentify_template resource.
     */
    public static function projectLocationDeidentifyTemplateName($project, $location, $deidentifyTemplate)
    {
        return self::getProjectLocationDeidentifyTemplateNameTemplate()->render([
            'project' => $project,
            'location' => $location,
            'deidentify_template' => $deidentifyTemplate,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a project_location_dlp_job resource.
     *
     * @param string $project
     * @param string $location
     * @param string $dlpJob
     *
     * @return string The formatted project_location_dlp_job resource.
     */
    public static function projectLocationDlpJobName($project, $location, $dlpJob)
    {
        return self::getProjectLocationDlpJobNameTemplate()->render([
            'project' => $project,
            'location' => $location,
            'dlp_job' => $dlpJob,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a project_location_inspect_template resource.
     *
     * @param string $project
     * @param string $location
     * @param string $inspectTemplate
     *
     * @return string The formatted project_location_inspect_template resource.
     */
    public static function projectLocationInspectTemplateName($project, $location, $inspectTemplate)
    {
        return self::getProjectLocationInspectTemplateNameTemplate()->render([
            'project' => $project,
            'location' => $location,
            'inspect_template' => $inspectTemplate,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a project_location_job_trigger resource.
     *
     * @param string $project
     * @param string $location
     * @param string $jobTrigger
     *
     * @return string The formatted project_location_job_trigger resource.
     */
    public static function projectLocationJobTriggerName($project, $location, $jobTrigger)
    {
        return self::getProjectLocationJobTriggerNameTemplate()->render([
            'project' => $project,
            'location' => $location,
            'job_trigger' => $jobTrigger,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a project_location_stored_info_type resource.
     *
     * @param string $project
     * @param string $location
     * @param string $storedInfoType
     *
     * @return string The formatted project_location_stored_info_type resource.
     */
    public static function projectLocationStoredInfoTypeName($project, $location, $storedInfoType)
    {
        return self::getProjectLocationStoredInfoTypeNameTemplate()->render([
            'project' => $project,
            'location' => $location,
            'stored_info_type' => $storedInfoType,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a project_stored_info_type resource.
     *
     * @param string $project
     * @param string $storedInfoType
     *
     * @return string The formatted project_stored_info_type resource.
     */
    public static function projectStoredInfoTypeName($project, $storedInfoType)
    {
        return self::getProjectStoredInfoTypeNameTemplate()->render([
            'project' => $project,
            'stored_info_type' => $storedInfoType,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a stored_info_type resource.
     *
     * @param string $organization
     * @param string $storedInfoType
     *
     * @return string The formatted stored_info_type resource.
     */
    public static function storedInfoTypeName($organization, $storedInfoType)
    {
        return self::getStoredInfoTypeNameTemplate()->render([
            'organization' => $organization,
            'stored_info_type' => $storedInfoType,
        ]);
    }

    /**
     * Parses a formatted name string and returns an associative array of the components in the name.
     * The following name formats are supported:
     * Template: Pattern
     * - deidentifyTemplate: organizations/{organization}/deidentifyTemplates/{deidentify_template}
     * - dlpJob: projects/{project}/dlpJobs/{dlp_job}
     * - inspectTemplate: organizations/{organization}/inspectTemplates/{inspect_template}
     * - jobTrigger: projects/{project}/jobTriggers/{job_trigger}
     * - location: projects/{project}/locations/{location}
     * - organization: organizations/{organization}
     * - organizationDeidentifyTemplate: organizations/{organization}/deidentifyTemplates/{deidentify_template}
     * - organizationInspectTemplate: organizations/{organization}/inspectTemplates/{inspect_template}
     * - organizationLocation: organizations/{organization}/locations/{location}
     * - organizationLocationDeidentifyTemplate: organizations/{organization}/locations/{location}/deidentifyTemplates/{deidentify_template}
     * - organizationLocationInspectTemplate: organizations/{organization}/locations/{location}/inspectTemplates/{inspect_template}
     * - organizationLocationStoredInfoType: organizations/{organization}/locations/{location}/storedInfoTypes/{stored_info_type}
     * - organizationStoredInfoType: organizations/{organization}/storedInfoTypes/{stored_info_type}
     * - project: projects/{project}
     * - projectDeidentifyTemplate: projects/{project}/deidentifyTemplates/{deidentify_template}
     * - projectDlpJob: projects/{project}/dlpJobs/{dlp_job}
     * - projectInspectTemplate: projects/{project}/inspectTemplates/{inspect_template}
     * - projectJobTrigger: projects/{project}/jobTriggers/{job_trigger}
     * - projectLocationDeidentifyTemplate: projects/{project}/locations/{location}/deidentifyTemplates/{deidentify_template}
     * - projectLocationDlpJob: projects/{project}/locations/{location}/dlpJobs/{dlp_job}
     * - projectLocationInspectTemplate: projects/{project}/locations/{location}/inspectTemplates/{inspect_template}
     * - projectLocationJobTrigger: projects/{project}/locations/{location}/jobTriggers/{job_trigger}
     * - projectLocationStoredInfoType: projects/{project}/locations/{location}/storedInfoTypes/{stored_info_type}
     * - projectStoredInfoType: projects/{project}/storedInfoTypes/{stored_info_type}
     * - storedInfoType: organizations/{organization}/storedInfoTypes/{stored_info_type}.
     *
     * The optional $template argument can be supplied to specify a particular pattern, and must
     * match one of the templates listed above. If no $template argument is provided, or if the
     * $template argument does not match one of the templates listed, then parseName will check
     * each of the supported templates, and return the first match.
     *
     * @param string $formattedName The formatted name string
     * @param string $template      Optional name of template to match
     *
     * @return array An associative array from name component IDs to component values.
     *
     * @throws ValidationException If $formattedName could not be matched.
     */
    public static function parseName($formattedName, $template = null)
    {
        $templateMap = self::getPathTemplateMap();

        if ($template) {
            if (!isset($templateMap[$template])) {
                throw new ValidationException("Template name $template does not exist");
            }

            return $templateMap[$template]->match($formattedName);
        }

        foreach ($templateMap as $templateName => $pathTemplate) {
            try {
                return $pathTemplate->match($formattedName);
            } catch (ValidationException $ex) {
                // Swallow the exception to continue trying other path templates
            }
        }
        throw new ValidationException("Input did not match any known format. Input: $formattedName");
    }

    /**
     * Constructor.
     *
     * @param array $options {
     *                       Optional. Options for configuring the service API wrapper.
     *
     *     @type string $serviceAddress
     *           **Deprecated**. This option will be removed in a future major release. Please
     *           utilize the `$apiEndpoint` option instead.
     *     @type string $apiEndpoint
     *           The address of the API remote host. May optionally include the port, formatted
     *           as "<uri>:<port>". Default 'dlp.googleapis.com:443'.
     *     @type string|array|FetchAuthTokenInterface|CredentialsWrapper $credentials
     *           The credentials to be used by the client to authorize API calls. This option
     *           accepts either a path to a credentials file, or a decoded credentials file as a
     *           PHP array.
     *           *Advanced usage*: In addition, this option can also accept a pre-constructed
     *           {@see \Google\Auth\FetchAuthTokenInterface} object or
     *           {@see \Google\ApiCore\CredentialsWrapper} object. Note that when one of these
     *           objects are provided, any settings in $credentialsConfig will be ignored.
     *     @type array $credentialsConfig
     *           Options used to configure credentials, including auth token caching, for the client.
     *           For a full list of supporting configuration options, see
     *           {@see \Google\ApiCore\CredentialsWrapper::build()}.
     *     @type bool $disableRetries
     *           Determines whether or not retries defined by the client configuration should be
     *           disabled. Defaults to `false`.
     *     @type string|array $clientConfig
     *           Client method configuration, including retry settings. This option can be either a
     *           path to a JSON file, or a PHP array containing the decoded JSON data.
     *           By default this settings points to the default client config file, which is provided
     *           in the resources folder.
     *     @type string|TransportInterface $transport
     *           The transport used for executing network requests. May be either the string `rest`
     *           or `grpc`. Defaults to `grpc` if gRPC support is detected on the system.
     *           *Advanced usage*: Additionally, it is possible to pass in an already instantiated
     *           {@see \Google\ApiCore\Transport\TransportInterface} object. Note that when this
     *           object is provided, any settings in $transportConfig, and any `$apiEndpoint`
     *           setting, will be ignored.
     *     @type array $transportConfig
     *           Configuration options that will be used to construct the transport. Options for
     *           each supported transport type should be passed in a key for that transport. For
     *           example:
     *           $transportConfig = [
     *               'grpc' => [...],
     *               'rest' => [...]
     *           ];
     *           See the {@see \Google\ApiCore\Transport\GrpcTransport::build()} and
     *           {@see \Google\ApiCore\Transport\RestTransport::build()} methods for the
     *           supported options.
     * }
     *
     * @throws ValidationException
     */
    public function __construct(array $options = [])
    {
        $clientOptions = $this->buildClientOptions($options);
        $this->setClientOptions($clientOptions);
    }

    /**
     * Finds potentially sensitive info in content.
     * This method has limits on input size, processing time, and output size.
     *
     * When no InfoTypes or CustomInfoTypes are specified in this request, the
     * system will automatically choose what detectors to run. By default this may
     * be all types, but may change over time as detectors are updated.
     *
     * For how to guides, see https://cloud.google.com/dlp/docs/inspecting-images
     * and https://cloud.google.com/dlp/docs/inspecting-text,
     *
     * Sample code:
     * ```
     * $dlpServiceClient = new DlpServiceClient();
     * try {
     *     $response = $dlpServiceClient->inspectContent();
     * } finally {
     *     $dlpServiceClient->close();
     * }
     * ```
     *
     * @param array $optionalArgs {
     *                            Optional.
     *
     *     @type string $parent The parent resource name. Please note, unless you have
     *           authenticated using an API key this option will be required.
     *
     *          The format of this value varies depending on whether you have [specified a
     *          processing
     *          location](https://cloud.google.com/dlp/docs/specifying-location):
     *
     *          + Projects scope, location specified:<br/>
     *            `projects/`<var>PROJECT_ID</var>`/locations/`<var>LOCATION_ID</var>
     *          + Projects scope, no location specified (defaults to global):<br/>
     *            `projects/`<var>PROJECT_ID</var>
     *
     *          The following example `parent` string specifies a parent project with the
     *          identifier `example-project`, and specifies the `europe-west3` location
     *          for processing data:
     *
     *              parent=projects/example-project/locations/europe-west3
     *     @type InspectConfig $inspectConfig
     *          Configuration for the inspector. What specified here will override
     *          the template referenced by the inspect_template_name argument.
     *     @type ContentItem $item
     *          The item to inspect.
     *     @type string $inspectTemplateName
     *          Template to use. Any configuration directly specified in
     *          inspect_config will override those set in the template. Singular fields
     *          that are set in this request will replace their corresponding fields in the
     *          template. Repeated fields are appended. Singular sub-messages and groups
     *          are recursively merged.
     *     @type string $locationId
     *          Deprecated. This field has no effect.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dlp\V2\InspectContentResponse
     *
     * @throws ApiException if the remote call fails
     */
    public function inspectContent(array $optionalArgs = [])
    {
        $request = new InspectContentRequest();
        if (isset($optionalArgs['parent'])) {
            $request->setParent($optionalArgs['parent']);
        }
        if (isset($optionalArgs['inspectConfig'])) {
            $request->setInspectConfig($optionalArgs['inspectConfig']);
        }
        if (isset($optionalArgs['item'])) {
            $request->setItem($optionalArgs['item']);
        }
        if (isset($optionalArgs['inspectTemplateName'])) {
            $request->setInspectTemplateName($optionalArgs['inspectTemplateName']);
        }
        if (isset($optionalArgs['locationId'])) {
            $request->setLocationId($optionalArgs['locationId']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'InspectContent',
            InspectContentResponse::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Redacts potentially sensitive info from an image.
     * This method has limits on input size, processing time, and output size.
     * See https://cloud.google.com/dlp/docs/redacting-sensitive-data-images to
     * learn more.
     *
     * When no InfoTypes or CustomInfoTypes are specified in this request, the
     * system will automatically choose what detectors to run. By default this may
     * be all types, but may change over time as detectors are updated.
     *
     * Sample code:
     * ```
     * $dlpServiceClient = new DlpServiceClient();
     * try {
     *     $response = $dlpServiceClient->redactImage();
     * } finally {
     *     $dlpServiceClient->close();
     * }
     * ```
     *
     * @param array $optionalArgs {
     *                            Optional.
     *
     *     @type string $parent The parent resource name. Please note, unless you have
     *           authenticated using an API key this option will be required.
     *
     *          The format of this value varies depending on whether you have [specified a
     *          processing
     *          location](https://cloud.google.com/dlp/docs/specifying-location):
     *
     *          + Projects scope, location specified:<br/>
     *            `projects/`<var>PROJECT_ID</var>`/locations/`<var>LOCATION_ID</var>
     *          + Projects scope, no location specified (defaults to global):<br/>
     *            `projects/`<var>PROJECT_ID</var>
     *
     *          The following example `parent` string specifies a parent project with the
     *          identifier `example-project`, and specifies the `europe-west3` location
     *          for processing data:
     *
     *              parent=projects/example-project/locations/europe-west3
     *     @type string $locationId
     *          Deprecated. This field has no effect.
     *     @type InspectConfig $inspectConfig
     *          Configuration for the inspector.
     *     @type ImageRedactionConfig[] $imageRedactionConfigs
     *          The configuration for specifying what content to redact from images.
     *     @type bool $includeFindings
     *          Whether the response should include findings along with the redacted
     *          image.
     *     @type ByteContentItem $byteItem
     *          The content must be PNG, JPEG, SVG or BMP.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dlp\V2\RedactImageResponse
     *
     * @throws ApiException if the remote call fails
     */
    public function redactImage(array $optionalArgs = [])
    {
        $request = new RedactImageRequest();
        if (isset($optionalArgs['parent'])) {
            $request->setParent($optionalArgs['parent']);
        }
        if (isset($optionalArgs['locationId'])) {
            $request->setLocationId($optionalArgs['locationId']);
        }
        if (isset($optionalArgs['inspectConfig'])) {
            $request->setInspectConfig($optionalArgs['inspectConfig']);
        }
        if (isset($optionalArgs['imageRedactionConfigs'])) {
            $request->setImageRedactionConfigs($optionalArgs['imageRedactionConfigs']);
        }
        if (isset($optionalArgs['includeFindings'])) {
            $request->setIncludeFindings($optionalArgs['includeFindings']);
        }
        if (isset($optionalArgs['byteItem'])) {
            $request->setByteItem($optionalArgs['byteItem']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'RedactImage',
            RedactImageResponse::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * De-identifies potentially sensitive info from a ContentItem.
     * This method has limits on input size and output size.
     * See https://cloud.google.com/dlp/docs/deidentify-sensitive-data to
     * learn more.
     *
     * When no InfoTypes or CustomInfoTypes are specified in this request, the
     * system will automatically choose what detectors to run. By default this may
     * be all types, but may change over time as detectors are updated.
     *
     * Sample code:
     * ```
     * $dlpServiceClient = new DlpServiceClient();
     * try {
     *     $response = $dlpServiceClient->deidentifyContent();
     * } finally {
     *     $dlpServiceClient->close();
     * }
     * ```
     *
     * @param array $optionalArgs {
     *                            Optional.
     *
     *     @type string $parent The parent resource name. Please note, unless you have
     *           authenticated using an API key this option will be required.
     *
     *          The format of this value varies depending on whether you have [specified a
     *          processing
     *          location](https://cloud.google.com/dlp/docs/specifying-location):
     *
     *          + Projects scope, location specified:<br/>
     *            `projects/`<var>PROJECT_ID</var>`/locations/`<var>LOCATION_ID</var>
     *          + Projects scope, no location specified (defaults to global):<br/>
     *            `projects/`<var>PROJECT_ID</var>
     *
     *          The following example `parent` string specifies a parent project with the
     *          identifier `example-project`, and specifies the `europe-west3` location
     *          for processing data:
     *
     *              parent=projects/example-project/locations/europe-west3
     *     @type DeidentifyConfig $deidentifyConfig
     *          Configuration for the de-identification of the content item.
     *          Items specified here will override the template referenced by the
     *          deidentify_template_name argument.
     *     @type InspectConfig $inspectConfig
     *          Configuration for the inspector.
     *          Items specified here will override the template referenced by the
     *          inspect_template_name argument.
     *     @type ContentItem $item
     *          The item to de-identify. Will be treated as text.
     *     @type string $inspectTemplateName
     *          Template to use. Any configuration directly specified in
     *          inspect_config will override those set in the template. Singular fields
     *          that are set in this request will replace their corresponding fields in the
     *          template. Repeated fields are appended. Singular sub-messages and groups
     *          are recursively merged.
     *     @type string $deidentifyTemplateName
     *          Template to use. Any configuration directly specified in
     *          deidentify_config will override those set in the template. Singular fields
     *          that are set in this request will replace their corresponding fields in the
     *          template. Repeated fields are appended. Singular sub-messages and groups
     *          are recursively merged.
     *     @type string $locationId
     *          Deprecated. This field has no effect.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dlp\V2\DeidentifyContentResponse
     *
     * @throws ApiException if the remote call fails
     */
    public function deidentifyContent(array $optionalArgs = [])
    {
        $request = new DeidentifyContentRequest();
        if (isset($optionalArgs['parent'])) {
            $request->setParent($optionalArgs['parent']);
        }
        if (isset($optionalArgs['deidentifyConfig'])) {
            $request->setDeidentifyConfig($optionalArgs['deidentifyConfig']);
        }
        if (isset($optionalArgs['inspectConfig'])) {
            $request->setInspectConfig($optionalArgs['inspectConfig']);
        }
        if (isset($optionalArgs['item'])) {
            $request->setItem($optionalArgs['item']);
        }
        if (isset($optionalArgs['inspectTemplateName'])) {
            $request->setInspectTemplateName($optionalArgs['inspectTemplateName']);
        }
        if (isset($optionalArgs['deidentifyTemplateName'])) {
            $request->setDeidentifyTemplateName($optionalArgs['deidentifyTemplateName']);
        }
        if (isset($optionalArgs['locationId'])) {
            $request->setLocationId($optionalArgs['locationId']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'DeidentifyContent',
            DeidentifyContentResponse::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Re-identifies content that has been de-identified.
     * See
     * https://cloud.google.com/dlp/docs/pseudonymization#re-identification_in_free_text_code_example
     * to learn more.
     *
     * Sample code:
     * ```
     * $dlpServiceClient = new DlpServiceClient();
     * try {
     *     $formattedParent = $dlpServiceClient->projectName('[PROJECT]');
     *     $response = $dlpServiceClient->reidentifyContent($formattedParent);
     * } finally {
     *     $dlpServiceClient->close();
     * }
     * ```
     *
     * @param string $parent Required. Parent resource name.
     *
     * The format of this value varies depending on whether you have [specified a
     * processing
     * location](https://cloud.google.com/dlp/docs/specifying-location):
     *
     * + Projects scope, location specified:<br/>
     *   `projects/`<var>PROJECT_ID</var>`/locations/`<var>LOCATION_ID</var>
     * + Projects scope, no location specified (defaults to global):<br/>
     *   `projects/`<var>PROJECT_ID</var>
     *
     * The following example `parent` string specifies a parent project with the
     * identifier `example-project`, and specifies the `europe-west3` location
     * for processing data:
     *
     *     parent=projects/example-project/locations/europe-west3
     * @param array $optionalArgs {
     *                            Optional.
     *
     *     @type DeidentifyConfig $reidentifyConfig
     *          Configuration for the re-identification of the content item.
     *          This field shares the same proto message type that is used for
     *          de-identification, however its usage here is for the reversal of the
     *          previous de-identification. Re-identification is performed by examining
     *          the transformations used to de-identify the items and executing the
     *          reverse. This requires that only reversible transformations
     *          be provided here. The reversible transformations are:
     *
     *           - `CryptoDeterministicConfig`
     *           - `CryptoReplaceFfxFpeConfig`
     *     @type InspectConfig $inspectConfig
     *          Configuration for the inspector.
     *     @type ContentItem $item
     *          The item to re-identify. Will be treated as text.
     *     @type string $inspectTemplateName
     *          Template to use. Any configuration directly specified in
     *          `inspect_config` will override those set in the template. Singular fields
     *          that are set in this request will replace their corresponding fields in the
     *          template. Repeated fields are appended. Singular sub-messages and groups
     *          are recursively merged.
     *     @type string $reidentifyTemplateName
     *          Template to use. References an instance of `DeidentifyTemplate`.
     *          Any configuration directly specified in `reidentify_config` or
     *          `inspect_config` will override those set in the template. The
     *          `DeidentifyTemplate` used must include only reversible transformations.
     *          Singular fields that are set in this request will replace their
     *          corresponding fields in the template. Repeated fields are appended.
     *          Singular sub-messages and groups are recursively merged.
     *     @type string $locationId
     *          Deprecated. This field has no effect.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dlp\V2\ReidentifyContentResponse
     *
     * @throws ApiException if the remote call fails
     */
    public function reidentifyContent($parent, array $optionalArgs = [])
    {
        $request = new ReidentifyContentRequest();
        $request->setParent($parent);
        if (isset($optionalArgs['reidentifyConfig'])) {
            $request->setReidentifyConfig($optionalArgs['reidentifyConfig']);
        }
        if (isset($optionalArgs['inspectConfig'])) {
            $request->setInspectConfig($optionalArgs['inspectConfig']);
        }
        if (isset($optionalArgs['item'])) {
            $request->setItem($optionalArgs['item']);
        }
        if (isset($optionalArgs['inspectTemplateName'])) {
            $request->setInspectTemplateName($optionalArgs['inspectTemplateName']);
        }
        if (isset($optionalArgs['reidentifyTemplateName'])) {
            $request->setReidentifyTemplateName($optionalArgs['reidentifyTemplateName']);
        }
        if (isset($optionalArgs['locationId'])) {
            $request->setLocationId($optionalArgs['locationId']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'ReidentifyContent',
            ReidentifyContentResponse::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Returns a list of the sensitive information types that the DLP API
     * supports. See https://cloud.google.com/dlp/docs/infotypes-reference to
     * learn more.
     *
     * Sample code:
     * ```
     * $dlpServiceClient = new DlpServiceClient();
     * try {
     *     $response = $dlpServiceClient->listInfoTypes();
     * } finally {
     *     $dlpServiceClient->close();
     * }
     * ```
     *
     * @param array $optionalArgs {
     *                            Optional.
     *
     *     @type string $parent The parent resource name. Please note, unless you have
     *           authenticated using an API key this option will be required.
     *
     *          The format of this value is as follows:
     *
     *              locations/<var>LOCATION_ID</var>
     *     @type string $languageCode
     *          BCP-47 language code for localized infoType friendly
     *          names. If omitted, or if localized strings are not available,
     *          en-US strings will be returned.
     *     @type string $filter
     *          filter to only return infoTypes supported by certain parts of the
     *          API. Defaults to supported_by=INSPECT.
     *     @type string $locationId
     *          Deprecated. This field has no effect.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dlp\V2\ListInfoTypesResponse
     *
     * @throws ApiException if the remote call fails
     */
    public function listInfoTypes(array $optionalArgs = [])
    {
        $request = new ListInfoTypesRequest();
        if (isset($optionalArgs['parent'])) {
            $request->setParent($optionalArgs['parent']);
        }
        if (isset($optionalArgs['languageCode'])) {
            $request->setLanguageCode($optionalArgs['languageCode']);
        }
        if (isset($optionalArgs['filter'])) {
            $request->setFilter($optionalArgs['filter']);
        }
        if (isset($optionalArgs['locationId'])) {
            $request->setLocationId($optionalArgs['locationId']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'ListInfoTypes',
            ListInfoTypesResponse::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Creates an InspectTemplate for re-using frequently used configuration
     * for inspecting content, images, and storage.
     * See https://cloud.google.com/dlp/docs/creating-templates to learn more.
     *
     * Sample code:
     * ```
     * $dlpServiceClient = new DlpServiceClient();
     * try {
     *     $formattedParent = $dlpServiceClient->organizationLocationName('[ORGANIZATION]', '[LOCATION]');
     *     $inspectTemplate = new InspectTemplate();
     *     $response = $dlpServiceClient->createInspectTemplate($formattedParent, $inspectTemplate);
     * } finally {
     *     $dlpServiceClient->close();
     * }
     * ```
     *
     * @param string $parent Required. Parent resource name.
     *
     * The format of this value varies depending on the scope of the request
     * (project or organization) and whether you have [specified a processing
     * location](https://cloud.google.com/dlp/docs/specifying-location):
     *
     * + Projects scope, location specified:<br/>
     *   `projects/`<var>PROJECT_ID</var>`/locations/`<var>LOCATION_ID</var>
     * + Projects scope, no location specified (defaults to global):<br/>
     *   `projects/`<var>PROJECT_ID</var>
     * + Organizations scope, location specified:<br/>
     *   `organizations/`<var>ORG_ID</var>`/locations/`<var>LOCATION_ID</var>
     * + Organizations scope, no location specified (defaults to global):<br/>
     *   `organizations/`<var>ORG_ID</var>
     *
     * The following example `parent` string specifies a parent project with the
     * identifier `example-project`, and specifies the `europe-west3` location
     * for processing data:
     *
     *     parent=projects/example-project/locations/europe-west3
     * @param InspectTemplate $inspectTemplate Required. The InspectTemplate to create.
     * @param array           $optionalArgs    {
     *                                         Optional.
     *
     *     @type string $templateId
     *          The template id can contain uppercase and lowercase letters,
     *          numbers, and hyphens; that is, it must match the regular
     *          expression: `[a-zA-Z\d-_]+`. The maximum length is 100
     *          characters. Can be empty to allow the system to generate one.
     *     @type string $locationId
     *          Deprecated. This field has no effect.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dlp\V2\InspectTemplate
     *
     * @throws ApiException if the remote call fails
     */
    public function createInspectTemplate($parent, $inspectTemplate, array $optionalArgs = [])
    {
        $request = new CreateInspectTemplateRequest();
        $request->setParent($parent);
        $request->setInspectTemplate($inspectTemplate);
        if (isset($optionalArgs['templateId'])) {
            $request->setTemplateId($optionalArgs['templateId']);
        }
        if (isset($optionalArgs['locationId'])) {
            $request->setLocationId($optionalArgs['locationId']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'CreateInspectTemplate',
            InspectTemplate::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Updates the InspectTemplate.
     * See https://cloud.google.com/dlp/docs/creating-templates to learn more.
     *
     * Sample code:
     * ```
     * $dlpServiceClient = new DlpServiceClient();
     * try {
     *     $formattedName = $dlpServiceClient->organizationInspectTemplateName('[ORGANIZATION]', '[INSPECT_TEMPLATE]');
     *     $response = $dlpServiceClient->updateInspectTemplate($formattedName);
     * } finally {
     *     $dlpServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. Resource name of organization and inspectTemplate to be updated, for
     *                             example `organizations/433245324/inspectTemplates/432452342` or
     *                             projects/project-id/inspectTemplates/432452342.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type InspectTemplate $inspectTemplate
     *          New InspectTemplate value.
     *     @type FieldMask $updateMask
     *          Mask to control which fields get updated.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dlp\V2\InspectTemplate
     *
     * @throws ApiException if the remote call fails
     */
    public function updateInspectTemplate($name, array $optionalArgs = [])
    {
        $request = new UpdateInspectTemplateRequest();
        $request->setName($name);
        if (isset($optionalArgs['inspectTemplate'])) {
            $request->setInspectTemplate($optionalArgs['inspectTemplate']);
        }
        if (isset($optionalArgs['updateMask'])) {
            $request->setUpdateMask($optionalArgs['updateMask']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'UpdateInspectTemplate',
            InspectTemplate::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Gets an InspectTemplate.
     * See https://cloud.google.com/dlp/docs/creating-templates to learn more.
     *
     * Sample code:
     * ```
     * $dlpServiceClient = new DlpServiceClient();
     * try {
     *     $formattedName = $dlpServiceClient->organizationInspectTemplateName('[ORGANIZATION]', '[INSPECT_TEMPLATE]');
     *     $response = $dlpServiceClient->getInspectTemplate($formattedName);
     * } finally {
     *     $dlpServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. Resource name of the organization and inspectTemplate to be read, for
     *                             example `organizations/433245324/inspectTemplates/432452342` or
     *                             projects/project-id/inspectTemplates/432452342.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dlp\V2\InspectTemplate
     *
     * @throws ApiException if the remote call fails
     */
    public function getInspectTemplate($name, array $optionalArgs = [])
    {
        $request = new GetInspectTemplateRequest();
        $request->setName($name);

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'GetInspectTemplate',
            InspectTemplate::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Lists InspectTemplates.
     * See https://cloud.google.com/dlp/docs/creating-templates to learn more.
     *
     * Sample code:
     * ```
     * $dlpServiceClient = new DlpServiceClient();
     * try {
     *     $formattedParent = $dlpServiceClient->organizationLocationName('[ORGANIZATION]', '[LOCATION]');
     *     // Iterate over pages of elements
     *     $pagedResponse = $dlpServiceClient->listInspectTemplates($formattedParent);
     *     foreach ($pagedResponse->iteratePages() as $page) {
     *         foreach ($page as $element) {
     *             // doSomethingWith($element);
     *         }
     *     }
     *
     *
     *     // Alternatively:
     *
     *     // Iterate through all elements
     *     $pagedResponse = $dlpServiceClient->listInspectTemplates($formattedParent);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $dlpServiceClient->close();
     * }
     * ```
     *
     * @param string $parent Required. Parent resource name.
     *
     * The format of this value varies depending on the scope of the request
     * (project or organization) and whether you have [specified a processing
     * location](https://cloud.google.com/dlp/docs/specifying-location):
     *
     * + Projects scope, location specified:<br/>
     *   `projects/`<var>PROJECT_ID</var>`/locations/`<var>LOCATION_ID</var>
     * + Projects scope, no location specified (defaults to global):<br/>
     *   `projects/`<var>PROJECT_ID</var>
     * + Organizations scope, location specified:<br/>
     *   `organizations/`<var>ORG_ID</var>`/locations/`<var>LOCATION_ID</var>
     * + Organizations scope, no location specified (defaults to global):<br/>
     *   `organizations/`<var>ORG_ID</var>
     *
     * The following example `parent` string specifies a parent project with the
     * identifier `example-project`, and specifies the `europe-west3` location
     * for processing data:
     *
     *     parent=projects/example-project/locations/europe-west3
     * @param array $optionalArgs {
     *                            Optional.
     *
     *     @type string $pageToken
     *          A page token is used to specify a page of values to be returned.
     *          If no page token is specified (the default), the first page
     *          of values will be returned. Any page token used here must have
     *          been generated by a previous call to the API.
     *     @type int $pageSize
     *          The maximum number of resources contained in the underlying API
     *          response. The API may return fewer values in a page, even if
     *          there are additional values to be retrieved.
     *     @type string $orderBy
     *          Comma separated list of fields to order by,
     *          followed by `asc` or `desc` postfix. This list is case-insensitive,
     *          default sorting order is ascending, redundant space characters are
     *          insignificant.
     *
     *          Example: `name asc,update_time, create_time desc`
     *
     *          Supported fields are:
     *
     *          - `create_time`: corresponds to time the template was created.
     *          - `update_time`: corresponds to time the template was last updated.
     *          - `name`: corresponds to template's name.
     *          - `display_name`: corresponds to template's display name.
     *     @type string $locationId
     *          Deprecated. This field has no effect.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\PagedListResponse
     *
     * @throws ApiException if the remote call fails
     */
    public function listInspectTemplates($parent, array $optionalArgs = [])
    {
        $request = new ListInspectTemplatesRequest();
        $request->setParent($parent);
        if (isset($optionalArgs['pageToken'])) {
            $request->setPageToken($optionalArgs['pageToken']);
        }
        if (isset($optionalArgs['pageSize'])) {
            $request->setPageSize($optionalArgs['pageSize']);
        }
        if (isset($optionalArgs['orderBy'])) {
            $request->setOrderBy($optionalArgs['orderBy']);
        }
        if (isset($optionalArgs['locationId'])) {
            $request->setLocationId($optionalArgs['locationId']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->getPagedListResponse(
            'ListInspectTemplates',
            $optionalArgs,
            ListInspectTemplatesResponse::class,
            $request
        );
    }

    /**
     * Deletes an InspectTemplate.
     * See https://cloud.google.com/dlp/docs/creating-templates to learn more.
     *
     * Sample code:
     * ```
     * $dlpServiceClient = new DlpServiceClient();
     * try {
     *     $formattedName = $dlpServiceClient->organizationInspectTemplateName('[ORGANIZATION]', '[INSPECT_TEMPLATE]');
     *     $dlpServiceClient->deleteInspectTemplate($formattedName);
     * } finally {
     *     $dlpServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. Resource name of the organization and inspectTemplate to be deleted, for
     *                             example `organizations/433245324/inspectTemplates/432452342` or
     *                             projects/project-id/inspectTemplates/432452342.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @throws ApiException if the remote call fails
     */
    public function deleteInspectTemplate($name, array $optionalArgs = [])
    {
        $request = new DeleteInspectTemplateRequest();
        $request->setName($name);

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'DeleteInspectTemplate',
            GPBEmpty::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Creates a DeidentifyTemplate for re-using frequently used configuration
     * for de-identifying content, images, and storage.
     * See https://cloud.google.com/dlp/docs/creating-templates-deid to learn
     * more.
     *
     * Sample code:
     * ```
     * $dlpServiceClient = new DlpServiceClient();
     * try {
     *     $formattedParent = $dlpServiceClient->organizationLocationName('[ORGANIZATION]', '[LOCATION]');
     *     $deidentifyTemplate = new DeidentifyTemplate();
     *     $response = $dlpServiceClient->createDeidentifyTemplate($formattedParent, $deidentifyTemplate);
     * } finally {
     *     $dlpServiceClient->close();
     * }
     * ```
     *
     * @param string $parent Required. Parent resource name.
     *
     * The format of this value varies depending on the scope of the request
     * (project or organization) and whether you have [specified a processing
     * location](https://cloud.google.com/dlp/docs/specifying-location):
     *
     * + Projects scope, location specified:<br/>
     *   `projects/`<var>PROJECT_ID</var>`/locations/`<var>LOCATION_ID</var>
     * + Projects scope, no location specified (defaults to global):<br/>
     *   `projects/`<var>PROJECT_ID</var>
     * + Organizations scope, location specified:<br/>
     *   `organizations/`<var>ORG_ID</var>`/locations/`<var>LOCATION_ID</var>
     * + Organizations scope, no location specified (defaults to global):<br/>
     *   `organizations/`<var>ORG_ID</var>
     *
     * The following example `parent` string specifies a parent project with the
     * identifier `example-project`, and specifies the `europe-west3` location
     * for processing data:
     *
     *     parent=projects/example-project/locations/europe-west3
     * @param DeidentifyTemplate $deidentifyTemplate Required. The DeidentifyTemplate to create.
     * @param array              $optionalArgs       {
     *                                               Optional.
     *
     *     @type string $templateId
     *          The template id can contain uppercase and lowercase letters,
     *          numbers, and hyphens; that is, it must match the regular
     *          expression: `[a-zA-Z\d-_]+`. The maximum length is 100
     *          characters. Can be empty to allow the system to generate one.
     *     @type string $locationId
     *          Deprecated. This field has no effect.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dlp\V2\DeidentifyTemplate
     *
     * @throws ApiException if the remote call fails
     */
    public function createDeidentifyTemplate($parent, $deidentifyTemplate, array $optionalArgs = [])
    {
        $request = new CreateDeidentifyTemplateRequest();
        $request->setParent($parent);
        $request->setDeidentifyTemplate($deidentifyTemplate);
        if (isset($optionalArgs['templateId'])) {
            $request->setTemplateId($optionalArgs['templateId']);
        }
        if (isset($optionalArgs['locationId'])) {
            $request->setLocationId($optionalArgs['locationId']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'CreateDeidentifyTemplate',
            DeidentifyTemplate::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Updates the DeidentifyTemplate.
     * See https://cloud.google.com/dlp/docs/creating-templates-deid to learn
     * more.
     *
     * Sample code:
     * ```
     * $dlpServiceClient = new DlpServiceClient();
     * try {
     *     $formattedName = $dlpServiceClient->organizationDeidentifyTemplateName('[ORGANIZATION]', '[DEIDENTIFY_TEMPLATE]');
     *     $response = $dlpServiceClient->updateDeidentifyTemplate($formattedName);
     * } finally {
     *     $dlpServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. Resource name of organization and deidentify template to be updated, for
     *                             example `organizations/433245324/deidentifyTemplates/432452342` or
     *                             projects/project-id/deidentifyTemplates/432452342.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type DeidentifyTemplate $deidentifyTemplate
     *          New DeidentifyTemplate value.
     *     @type FieldMask $updateMask
     *          Mask to control which fields get updated.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dlp\V2\DeidentifyTemplate
     *
     * @throws ApiException if the remote call fails
     */
    public function updateDeidentifyTemplate($name, array $optionalArgs = [])
    {
        $request = new UpdateDeidentifyTemplateRequest();
        $request->setName($name);
        if (isset($optionalArgs['deidentifyTemplate'])) {
            $request->setDeidentifyTemplate($optionalArgs['deidentifyTemplate']);
        }
        if (isset($optionalArgs['updateMask'])) {
            $request->setUpdateMask($optionalArgs['updateMask']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'UpdateDeidentifyTemplate',
            DeidentifyTemplate::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Gets a DeidentifyTemplate.
     * See https://cloud.google.com/dlp/docs/creating-templates-deid to learn
     * more.
     *
     * Sample code:
     * ```
     * $dlpServiceClient = new DlpServiceClient();
     * try {
     *     $formattedName = $dlpServiceClient->organizationDeidentifyTemplateName('[ORGANIZATION]', '[DEIDENTIFY_TEMPLATE]');
     *     $response = $dlpServiceClient->getDeidentifyTemplate($formattedName);
     * } finally {
     *     $dlpServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. Resource name of the organization and deidentify template to be read, for
     *                             example `organizations/433245324/deidentifyTemplates/432452342` or
     *                             projects/project-id/deidentifyTemplates/432452342.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dlp\V2\DeidentifyTemplate
     *
     * @throws ApiException if the remote call fails
     */
    public function getDeidentifyTemplate($name, array $optionalArgs = [])
    {
        $request = new GetDeidentifyTemplateRequest();
        $request->setName($name);

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'GetDeidentifyTemplate',
            DeidentifyTemplate::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Lists DeidentifyTemplates.
     * See https://cloud.google.com/dlp/docs/creating-templates-deid to learn
     * more.
     *
     * Sample code:
     * ```
     * $dlpServiceClient = new DlpServiceClient();
     * try {
     *     $formattedParent = $dlpServiceClient->organizationLocationName('[ORGANIZATION]', '[LOCATION]');
     *     // Iterate over pages of elements
     *     $pagedResponse = $dlpServiceClient->listDeidentifyTemplates($formattedParent);
     *     foreach ($pagedResponse->iteratePages() as $page) {
     *         foreach ($page as $element) {
     *             // doSomethingWith($element);
     *         }
     *     }
     *
     *
     *     // Alternatively:
     *
     *     // Iterate through all elements
     *     $pagedResponse = $dlpServiceClient->listDeidentifyTemplates($formattedParent);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $dlpServiceClient->close();
     * }
     * ```
     *
     * @param string $parent Required. Parent resource name.
     *
     * The format of this value varies depending on the scope of the request
     * (project or organization) and whether you have [specified a processing
     * location](https://cloud.google.com/dlp/docs/specifying-location):
     *
     * + Projects scope, location specified:<br/>
     *   `projects/`<var>PROJECT_ID</var>`/locations/`<var>LOCATION_ID</var>
     * + Projects scope, no location specified (defaults to global):<br/>
     *   `projects/`<var>PROJECT_ID</var>
     * + Organizations scope, location specified:<br/>
     *   `organizations/`<var>ORG_ID</var>`/locations/`<var>LOCATION_ID</var>
     * + Organizations scope, no location specified (defaults to global):<br/>
     *   `organizations/`<var>ORG_ID</var>
     *
     * The following example `parent` string specifies a parent project with the
     * identifier `example-project`, and specifies the `europe-west3` location
     * for processing data:
     *
     *     parent=projects/example-project/locations/europe-west3
     * @param array $optionalArgs {
     *                            Optional.
     *
     *     @type string $pageToken
     *          A page token is used to specify a page of values to be returned.
     *          If no page token is specified (the default), the first page
     *          of values will be returned. Any page token used here must have
     *          been generated by a previous call to the API.
     *     @type int $pageSize
     *          The maximum number of resources contained in the underlying API
     *          response. The API may return fewer values in a page, even if
     *          there are additional values to be retrieved.
     *     @type string $orderBy
     *          Comma separated list of fields to order by,
     *          followed by `asc` or `desc` postfix. This list is case-insensitive,
     *          default sorting order is ascending, redundant space characters are
     *          insignificant.
     *
     *          Example: `name asc,update_time, create_time desc`
     *
     *          Supported fields are:
     *
     *          - `create_time`: corresponds to time the template was created.
     *          - `update_time`: corresponds to time the template was last updated.
     *          - `name`: corresponds to template's name.
     *          - `display_name`: corresponds to template's display name.
     *     @type string $locationId
     *          Deprecated. This field has no effect.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\PagedListResponse
     *
     * @throws ApiException if the remote call fails
     */
    public function listDeidentifyTemplates($parent, array $optionalArgs = [])
    {
        $request = new ListDeidentifyTemplatesRequest();
        $request->setParent($parent);
        if (isset($optionalArgs['pageToken'])) {
            $request->setPageToken($optionalArgs['pageToken']);
        }
        if (isset($optionalArgs['pageSize'])) {
            $request->setPageSize($optionalArgs['pageSize']);
        }
        if (isset($optionalArgs['orderBy'])) {
            $request->setOrderBy($optionalArgs['orderBy']);
        }
        if (isset($optionalArgs['locationId'])) {
            $request->setLocationId($optionalArgs['locationId']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->getPagedListResponse(
            'ListDeidentifyTemplates',
            $optionalArgs,
            ListDeidentifyTemplatesResponse::class,
            $request
        );
    }

    /**
     * Deletes a DeidentifyTemplate.
     * See https://cloud.google.com/dlp/docs/creating-templates-deid to learn
     * more.
     *
     * Sample code:
     * ```
     * $dlpServiceClient = new DlpServiceClient();
     * try {
     *     $formattedName = $dlpServiceClient->organizationDeidentifyTemplateName('[ORGANIZATION]', '[DEIDENTIFY_TEMPLATE]');
     *     $dlpServiceClient->deleteDeidentifyTemplate($formattedName);
     * } finally {
     *     $dlpServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. Resource name of the organization and deidentify template to be deleted,
     *                             for example `organizations/433245324/deidentifyTemplates/432452342` or
     *                             projects/project-id/deidentifyTemplates/432452342.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @throws ApiException if the remote call fails
     */
    public function deleteDeidentifyTemplate($name, array $optionalArgs = [])
    {
        $request = new DeleteDeidentifyTemplateRequest();
        $request->setName($name);

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'DeleteDeidentifyTemplate',
            GPBEmpty::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Creates a job trigger to run DLP actions such as scanning storage for
     * sensitive information on a set schedule.
     * See https://cloud.google.com/dlp/docs/creating-job-triggers to learn more.
     *
     * Sample code:
     * ```
     * $dlpServiceClient = new DlpServiceClient();
     * try {
     *     $formattedParent = $dlpServiceClient->projectName('[PROJECT]');
     *     $jobTrigger = new JobTrigger();
     *     $response = $dlpServiceClient->createJobTrigger($formattedParent, $jobTrigger);
     * } finally {
     *     $dlpServiceClient->close();
     * }
     * ```
     *
     * @param string $parent Required. Parent resource name.
     *
     * The format of this value varies depending on whether you have [specified a
     * processing
     * location](https://cloud.google.com/dlp/docs/specifying-location):
     *
     * + Projects scope, location specified:<br/>
     *   `projects/`<var>PROJECT_ID</var>`/locations/`<var>LOCATION_ID</var>
     * + Projects scope, no location specified (defaults to global):<br/>
     *   `projects/`<var>PROJECT_ID</var>
     *
     * The following example `parent` string specifies a parent project with the
     * identifier `example-project`, and specifies the `europe-west3` location
     * for processing data:
     *
     *     parent=projects/example-project/locations/europe-west3
     * @param JobTrigger $jobTrigger   Required. The JobTrigger to create.
     * @param array      $optionalArgs {
     *                                 Optional.
     *
     *     @type string $triggerId
     *          The trigger id can contain uppercase and lowercase letters,
     *          numbers, and hyphens; that is, it must match the regular
     *          expression: `[a-zA-Z\d-_]+`. The maximum length is 100
     *          characters. Can be empty to allow the system to generate one.
     *     @type string $locationId
     *          Deprecated. This field has no effect.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dlp\V2\JobTrigger
     *
     * @throws ApiException if the remote call fails
     */
    public function createJobTrigger($parent, $jobTrigger, array $optionalArgs = [])
    {
        $request = new CreateJobTriggerRequest();
        $request->setParent($parent);
        $request->setJobTrigger($jobTrigger);
        if (isset($optionalArgs['triggerId'])) {
            $request->setTriggerId($optionalArgs['triggerId']);
        }
        if (isset($optionalArgs['locationId'])) {
            $request->setLocationId($optionalArgs['locationId']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'CreateJobTrigger',
            JobTrigger::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Updates a job trigger.
     * See https://cloud.google.com/dlp/docs/creating-job-triggers to learn more.
     *
     * Sample code:
     * ```
     * $dlpServiceClient = new DlpServiceClient();
     * try {
     *     $formattedName = $dlpServiceClient->projectJobTriggerName('[PROJECT]', '[JOB_TRIGGER]');
     *     $response = $dlpServiceClient->updateJobTrigger($formattedName);
     * } finally {
     *     $dlpServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. Resource name of the project and the triggeredJob, for example
     *                             `projects/dlp-test-project/jobTriggers/53234423`.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type JobTrigger $jobTrigger
     *          New JobTrigger value.
     *     @type FieldMask $updateMask
     *          Mask to control which fields get updated.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dlp\V2\JobTrigger
     *
     * @throws ApiException if the remote call fails
     */
    public function updateJobTrigger($name, array $optionalArgs = [])
    {
        $request = new UpdateJobTriggerRequest();
        $request->setName($name);
        if (isset($optionalArgs['jobTrigger'])) {
            $request->setJobTrigger($optionalArgs['jobTrigger']);
        }
        if (isset($optionalArgs['updateMask'])) {
            $request->setUpdateMask($optionalArgs['updateMask']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'UpdateJobTrigger',
            JobTrigger::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Inspect hybrid content and store findings to a trigger. The inspection
     * will be processed asynchronously. To review the findings monitor the
     * jobs within the trigger.
     * Early access feature is in a pre-release state and might change or have
     * limited support. For more information, see
     * https://cloud.google.com/products#product-launch-stages.
     *
     * Sample code:
     * ```
     * $dlpServiceClient = new DlpServiceClient();
     * try {
     *     $formattedName = $dlpServiceClient->projectJobTriggerName('[PROJECT]', '[JOB_TRIGGER]');
     *     $response = $dlpServiceClient->hybridInspectJobTrigger($formattedName);
     * } finally {
     *     $dlpServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. Resource name of the trigger to execute a hybrid inspect on, for example
     *                             `projects/dlp-test-project/jobTriggers/53234423`.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type HybridContentItem $hybridItem
     *          The item to inspect.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dlp\V2\HybridInspectResponse
     *
     * @throws ApiException if the remote call fails
     */
    public function hybridInspectJobTrigger($name, array $optionalArgs = [])
    {
        $request = new HybridInspectJobTriggerRequest();
        $request->setName($name);
        if (isset($optionalArgs['hybridItem'])) {
            $request->setHybridItem($optionalArgs['hybridItem']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'HybridInspectJobTrigger',
            HybridInspectResponse::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Gets a job trigger.
     * See https://cloud.google.com/dlp/docs/creating-job-triggers to learn more.
     *
     * Sample code:
     * ```
     * $dlpServiceClient = new DlpServiceClient();
     * try {
     *     $formattedName = $dlpServiceClient->projectJobTriggerName('[PROJECT]', '[JOB_TRIGGER]');
     *     $response = $dlpServiceClient->getJobTrigger($formattedName);
     * } finally {
     *     $dlpServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. Resource name of the project and the triggeredJob, for example
     *                             `projects/dlp-test-project/jobTriggers/53234423`.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dlp\V2\JobTrigger
     *
     * @throws ApiException if the remote call fails
     */
    public function getJobTrigger($name, array $optionalArgs = [])
    {
        $request = new GetJobTriggerRequest();
        $request->setName($name);

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'GetJobTrigger',
            JobTrigger::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Lists job triggers.
     * See https://cloud.google.com/dlp/docs/creating-job-triggers to learn more.
     *
     * Sample code:
     * ```
     * $dlpServiceClient = new DlpServiceClient();
     * try {
     *     $formattedParent = $dlpServiceClient->projectName('[PROJECT]');
     *     // Iterate over pages of elements
     *     $pagedResponse = $dlpServiceClient->listJobTriggers($formattedParent);
     *     foreach ($pagedResponse->iteratePages() as $page) {
     *         foreach ($page as $element) {
     *             // doSomethingWith($element);
     *         }
     *     }
     *
     *
     *     // Alternatively:
     *
     *     // Iterate through all elements
     *     $pagedResponse = $dlpServiceClient->listJobTriggers($formattedParent);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $dlpServiceClient->close();
     * }
     * ```
     *
     * @param string $parent Required. Parent resource name.
     *
     * The format of this value varies depending on whether you have [specified a
     * processing
     * location](https://cloud.google.com/dlp/docs/specifying-location):
     *
     * + Projects scope, location specified:<br/>
     *   `projects/`<var>PROJECT_ID</var>`/locations/`<var>LOCATION_ID</var>
     * + Projects scope, no location specified (defaults to global):<br/>
     *   `projects/`<var>PROJECT_ID</var>
     *
     * The following example `parent` string specifies a parent project with the
     * identifier `example-project`, and specifies the `europe-west3` location
     * for processing data:
     *
     *     parent=projects/example-project/locations/europe-west3
     * @param array $optionalArgs {
     *                            Optional.
     *
     *     @type string $pageToken
     *          A page token is used to specify a page of values to be returned.
     *          If no page token is specified (the default), the first page
     *          of values will be returned. Any page token used here must have
     *          been generated by a previous call to the API.
     *     @type int $pageSize
     *          The maximum number of resources contained in the underlying API
     *          response. The API may return fewer values in a page, even if
     *          there are additional values to be retrieved.
     *     @type string $orderBy
     *          Comma separated list of triggeredJob fields to order by,
     *          followed by `asc` or `desc` postfix. This list is case-insensitive,
     *          default sorting order is ascending, redundant space characters are
     *          insignificant.
     *
     *          Example: `name asc,update_time, create_time desc`
     *
     *          Supported fields are:
     *
     *          - `create_time`: corresponds to time the JobTrigger was created.
     *          - `update_time`: corresponds to time the JobTrigger was last updated.
     *          - `last_run_time`: corresponds to the last time the JobTrigger ran.
     *          - `name`: corresponds to JobTrigger's name.
     *          - `display_name`: corresponds to JobTrigger's display name.
     *          - `status`: corresponds to JobTrigger's status.
     *     @type string $filter
     *          Allows filtering.
     *
     *          Supported syntax:
     *
     *          * Filter expressions are made up of one or more restrictions.
     *          * Restrictions can be combined by `AND` or `OR` logical operators. A
     *          sequence of restrictions implicitly uses `AND`.
     *          * A restriction has the form of `{field} {operator} {value}`.
     *          * Supported fields/values for inspect jobs:
     *              - `status` - HEALTHY|PAUSED|CANCELLED
     *              - `inspected_storage` - DATASTORE|CLOUD_STORAGE|BIGQUERY
     *              - 'last_run_time` - RFC 3339 formatted timestamp, surrounded by
     *              quotation marks. Nanoseconds are ignored.
     *              - 'error_count' - Number of errors that have occurred while running.
     *          * The operator must be `=` or `!=` for status and inspected_storage.
     *
     *          Examples:
     *
     *          * inspected_storage = cloud_storage AND status = HEALTHY
     *          * inspected_storage = cloud_storage OR inspected_storage = bigquery
     *          * inspected_storage = cloud_storage AND (state = PAUSED OR state = HEALTHY)
     *          * last_run_time > \"2017-12-12T00:00:00+00:00\"
     *
     *          The length of this field should be no more than 500 characters.
     *     @type string $locationId
     *          Deprecated. This field has no effect.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\PagedListResponse
     *
     * @throws ApiException if the remote call fails
     */
    public function listJobTriggers($parent, array $optionalArgs = [])
    {
        $request = new ListJobTriggersRequest();
        $request->setParent($parent);
        if (isset($optionalArgs['pageToken'])) {
            $request->setPageToken($optionalArgs['pageToken']);
        }
        if (isset($optionalArgs['pageSize'])) {
            $request->setPageSize($optionalArgs['pageSize']);
        }
        if (isset($optionalArgs['orderBy'])) {
            $request->setOrderBy($optionalArgs['orderBy']);
        }
        if (isset($optionalArgs['filter'])) {
            $request->setFilter($optionalArgs['filter']);
        }
        if (isset($optionalArgs['locationId'])) {
            $request->setLocationId($optionalArgs['locationId']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->getPagedListResponse(
            'ListJobTriggers',
            $optionalArgs,
            ListJobTriggersResponse::class,
            $request
        );
    }

    /**
     * Deletes a job trigger.
     * See https://cloud.google.com/dlp/docs/creating-job-triggers to learn more.
     *
     * Sample code:
     * ```
     * $dlpServiceClient = new DlpServiceClient();
     * try {
     *     $formattedName = $dlpServiceClient->projectJobTriggerName('[PROJECT]', '[JOB_TRIGGER]');
     *     $dlpServiceClient->deleteJobTrigger($formattedName);
     * } finally {
     *     $dlpServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. Resource name of the project and the triggeredJob, for example
     *                             `projects/dlp-test-project/jobTriggers/53234423`.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @throws ApiException if the remote call fails
     */
    public function deleteJobTrigger($name, array $optionalArgs = [])
    {
        $request = new DeleteJobTriggerRequest();
        $request->setName($name);

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'DeleteJobTrigger',
            GPBEmpty::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Creates a new job to inspect storage or calculate risk metrics.
     * See https://cloud.google.com/dlp/docs/inspecting-storage and
     * https://cloud.google.com/dlp/docs/compute-risk-analysis to learn more.
     *
     * When no InfoTypes or CustomInfoTypes are specified in inspect jobs, the
     * system will automatically choose what detectors to run. By default this may
     * be all types, but may change over time as detectors are updated.
     *
     * Sample code:
     * ```
     * $dlpServiceClient = new DlpServiceClient();
     * try {
     *     $formattedParent = $dlpServiceClient->projectName('[PROJECT]');
     *     $response = $dlpServiceClient->createDlpJob($formattedParent);
     * } finally {
     *     $dlpServiceClient->close();
     * }
     * ```
     *
     * @param string $parent Required. Parent resource name.
     *
     * The format of this value varies depending on whether you have [specified a
     * processing
     * location](https://cloud.google.com/dlp/docs/specifying-location):
     *
     * + Projects scope, location specified:<br/>
     *   `projects/`<var>PROJECT_ID</var>`/locations/`<var>LOCATION_ID</var>
     * + Projects scope, no location specified (defaults to global):<br/>
     *   `projects/`<var>PROJECT_ID</var>
     *
     * The following example `parent` string specifies a parent project with the
     * identifier `example-project`, and specifies the `europe-west3` location
     * for processing data:
     *
     *     parent=projects/example-project/locations/europe-west3
     * @param array $optionalArgs {
     *                            Optional.
     *
     *     @type InspectJobConfig $inspectJob The configuration details for an inspect
     *          job. Only one of $inspectJob and $riskJob may be provided.
     *          Set to control what and how to inspect.
     *     @type RiskAnalysisJobConfig $riskJob The configuration details for a risk
     *          analysis job. Only one of $inspectJob and $riskJob may be provided.
     *          Set to choose what metric to calculate.
     *     @type string $jobId
     *          The job id can contain uppercase and lowercase letters,
     *          numbers, and hyphens; that is, it must match the regular
     *          expression: `[a-zA-Z\d-_]+`. The maximum length is 100
     *          characters. Can be empty to allow the system to generate one.
     *     @type string $locationId
     *          Deprecated. This field has no effect.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dlp\V2\DlpJob
     *
     * @throws ApiException if the remote call fails
     */
    public function createDlpJob($parent, array $optionalArgs = [])
    {
        $request = new CreateDlpJobRequest();
        $request->setParent($parent);
        if (isset($optionalArgs['inspectJob'])) {
            $request->setInspectJob($optionalArgs['inspectJob']);
        }
        if (isset($optionalArgs['riskJob'])) {
            $request->setRiskJob($optionalArgs['riskJob']);
        }
        if (isset($optionalArgs['jobId'])) {
            $request->setJobId($optionalArgs['jobId']);
        }
        if (isset($optionalArgs['locationId'])) {
            $request->setLocationId($optionalArgs['locationId']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'CreateDlpJob',
            DlpJob::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Lists DlpJobs that match the specified filter in the request.
     * See https://cloud.google.com/dlp/docs/inspecting-storage and
     * https://cloud.google.com/dlp/docs/compute-risk-analysis to learn more.
     *
     * Sample code:
     * ```
     * $dlpServiceClient = new DlpServiceClient();
     * try {
     *     $formattedParent = $dlpServiceClient->projectName('[PROJECT]');
     *     // Iterate over pages of elements
     *     $pagedResponse = $dlpServiceClient->listDlpJobs($formattedParent);
     *     foreach ($pagedResponse->iteratePages() as $page) {
     *         foreach ($page as $element) {
     *             // doSomethingWith($element);
     *         }
     *     }
     *
     *
     *     // Alternatively:
     *
     *     // Iterate through all elements
     *     $pagedResponse = $dlpServiceClient->listDlpJobs($formattedParent);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $dlpServiceClient->close();
     * }
     * ```
     *
     * @param string $parent Required. Parent resource name.
     *
     * The format of this value varies depending on whether you have [specified a
     * processing
     * location](https://cloud.google.com/dlp/docs/specifying-location):
     *
     * + Projects scope, location specified:<br/>
     *   `projects/`<var>PROJECT_ID</var>`/locations/`<var>LOCATION_ID</var>
     * + Projects scope, no location specified (defaults to global):<br/>
     *   `projects/`<var>PROJECT_ID</var>
     *
     * The following example `parent` string specifies a parent project with the
     * identifier `example-project`, and specifies the `europe-west3` location
     * for processing data:
     *
     *     parent=projects/example-project/locations/europe-west3
     * @param array $optionalArgs {
     *                            Optional.
     *
     *     @type string $filter
     *          Allows filtering.
     *
     *          Supported syntax:
     *
     *          * Filter expressions are made up of one or more restrictions.
     *          * Restrictions can be combined by `AND` or `OR` logical operators. A
     *          sequence of restrictions implicitly uses `AND`.
     *          * A restriction has the form of `{field} {operator} {value}`.
     *          * Supported fields/values for inspect jobs:
     *              - `state` - PENDING|RUNNING|CANCELED|FINISHED|FAILED
     *              - `inspected_storage` - DATASTORE|CLOUD_STORAGE|BIGQUERY
     *              - `trigger_name` - The resource name of the trigger that created job.
     *              - 'end_time` - Corresponds to time the job finished.
     *              - 'start_time` - Corresponds to time the job finished.
     *          * Supported fields for risk analysis jobs:
     *              - `state` - RUNNING|CANCELED|FINISHED|FAILED
     *              - 'end_time` - Corresponds to time the job finished.
     *              - 'start_time` - Corresponds to time the job finished.
     *          * The operator must be `=` or `!=`.
     *
     *          Examples:
     *
     *          * inspected_storage = cloud_storage AND state = done
     *          * inspected_storage = cloud_storage OR inspected_storage = bigquery
     *          * inspected_storage = cloud_storage AND (state = done OR state = canceled)
     *          * end_time > \"2017-12-12T00:00:00+00:00\"
     *
     *          The length of this field should be no more than 500 characters.
     *     @type int $pageSize
     *          The maximum number of resources contained in the underlying API
     *          response. The API may return fewer values in a page, even if
     *          there are additional values to be retrieved.
     *     @type string $pageToken
     *          A page token is used to specify a page of values to be returned.
     *          If no page token is specified (the default), the first page
     *          of values will be returned. Any page token used here must have
     *          been generated by a previous call to the API.
     *     @type int $type
     *          The type of job. Defaults to `DlpJobType.INSPECT`
     *          For allowed values, use constants defined on {@see \Google\Cloud\Dlp\V2\DlpJobType}
     *     @type string $orderBy
     *          Comma separated list of fields to order by,
     *          followed by `asc` or `desc` postfix. This list is case-insensitive,
     *          default sorting order is ascending, redundant space characters are
     *          insignificant.
     *
     *          Example: `name asc, end_time asc, create_time desc`
     *
     *          Supported fields are:
     *
     *          - `create_time`: corresponds to time the job was created.
     *          - `end_time`: corresponds to time the job ended.
     *          - `name`: corresponds to job's name.
     *          - `state`: corresponds to `state`
     *     @type string $locationId
     *          Deprecated. This field has no effect.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\PagedListResponse
     *
     * @throws ApiException if the remote call fails
     */
    public function listDlpJobs($parent, array $optionalArgs = [])
    {
        $request = new ListDlpJobsRequest();
        $request->setParent($parent);
        if (isset($optionalArgs['filter'])) {
            $request->setFilter($optionalArgs['filter']);
        }
        if (isset($optionalArgs['pageSize'])) {
            $request->setPageSize($optionalArgs['pageSize']);
        }
        if (isset($optionalArgs['pageToken'])) {
            $request->setPageToken($optionalArgs['pageToken']);
        }
        if (isset($optionalArgs['type'])) {
            $request->setType($optionalArgs['type']);
        }
        if (isset($optionalArgs['orderBy'])) {
            $request->setOrderBy($optionalArgs['orderBy']);
        }
        if (isset($optionalArgs['locationId'])) {
            $request->setLocationId($optionalArgs['locationId']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->getPagedListResponse(
            'ListDlpJobs',
            $optionalArgs,
            ListDlpJobsResponse::class,
            $request
        );
    }

    /**
     * Gets the latest state of a long-running DlpJob.
     * See https://cloud.google.com/dlp/docs/inspecting-storage and
     * https://cloud.google.com/dlp/docs/compute-risk-analysis to learn more.
     *
     * Sample code:
     * ```
     * $dlpServiceClient = new DlpServiceClient();
     * try {
     *     $name = '';
     *     $response = $dlpServiceClient->getDlpJob($name);
     * } finally {
     *     $dlpServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. The name of the DlpJob resource.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dlp\V2\DlpJob
     *
     * @throws ApiException if the remote call fails
     */
    public function getDlpJob($name, array $optionalArgs = [])
    {
        $request = new GetDlpJobRequest();
        $request->setName($name);

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'GetDlpJob',
            DlpJob::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Deletes a long-running DlpJob. This method indicates that the client is
     * no longer interested in the DlpJob result. The job will be cancelled if
     * possible.
     * See https://cloud.google.com/dlp/docs/inspecting-storage and
     * https://cloud.google.com/dlp/docs/compute-risk-analysis to learn more.
     *
     * Sample code:
     * ```
     * $dlpServiceClient = new DlpServiceClient();
     * try {
     *     $name = '';
     *     $dlpServiceClient->deleteDlpJob($name);
     * } finally {
     *     $dlpServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. The name of the DlpJob resource to be deleted.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @throws ApiException if the remote call fails
     */
    public function deleteDlpJob($name, array $optionalArgs = [])
    {
        $request = new DeleteDlpJobRequest();
        $request->setName($name);

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'DeleteDlpJob',
            GPBEmpty::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Starts asynchronous cancellation on a long-running DlpJob. The server
     * makes a best effort to cancel the DlpJob, but success is not
     * guaranteed.
     * See https://cloud.google.com/dlp/docs/inspecting-storage and
     * https://cloud.google.com/dlp/docs/compute-risk-analysis to learn more.
     *
     * Sample code:
     * ```
     * $dlpServiceClient = new DlpServiceClient();
     * try {
     *     $name = '';
     *     $dlpServiceClient->cancelDlpJob($name);
     * } finally {
     *     $dlpServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. The name of the DlpJob resource to be cancelled.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @throws ApiException if the remote call fails
     */
    public function cancelDlpJob($name, array $optionalArgs = [])
    {
        $request = new CancelDlpJobRequest();
        $request->setName($name);

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'CancelDlpJob',
            GPBEmpty::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Creates a pre-built stored infoType to be used for inspection.
     * See https://cloud.google.com/dlp/docs/creating-stored-infotypes to
     * learn more.
     *
     * Sample code:
     * ```
     * $dlpServiceClient = new DlpServiceClient();
     * try {
     *     $formattedParent = $dlpServiceClient->organizationLocationName('[ORGANIZATION]', '[LOCATION]');
     *     $config = new StoredInfoTypeConfig();
     *     $response = $dlpServiceClient->createStoredInfoType($formattedParent, $config);
     * } finally {
     *     $dlpServiceClient->close();
     * }
     * ```
     *
     * @param string $parent Required. Parent resource name.
     *
     * The format of this value varies depending on the scope of the request
     * (project or organization) and whether you have [specified a processing
     * location](https://cloud.google.com/dlp/docs/specifying-location):
     *
     * + Projects scope, location specified:<br/>
     *   `projects/`<var>PROJECT_ID</var>`/locations/`<var>LOCATION_ID</var>
     * + Projects scope, no location specified (defaults to global):<br/>
     *   `projects/`<var>PROJECT_ID</var>
     * + Organizations scope, location specified:<br/>
     *   `organizations/`<var>ORG_ID</var>`/locations/`<var>LOCATION_ID</var>
     * + Organizations scope, no location specified (defaults to global):<br/>
     *   `organizations/`<var>ORG_ID</var>
     *
     * The following example `parent` string specifies a parent project with the
     * identifier `example-project`, and specifies the `europe-west3` location
     * for processing data:
     *
     *     parent=projects/example-project/locations/europe-west3
     * @param StoredInfoTypeConfig $config       Required. Configuration of the storedInfoType to create.
     * @param array                $optionalArgs {
     *                                           Optional.
     *
     *     @type string $storedInfoTypeId
     *          The storedInfoType ID can contain uppercase and lowercase letters,
     *          numbers, and hyphens; that is, it must match the regular
     *          expression: `[a-zA-Z\d-_]+`. The maximum length is 100
     *          characters. Can be empty to allow the system to generate one.
     *     @type string $locationId
     *          Deprecated. This field has no effect.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dlp\V2\StoredInfoType
     *
     * @throws ApiException if the remote call fails
     */
    public function createStoredInfoType($parent, $config, array $optionalArgs = [])
    {
        $request = new CreateStoredInfoTypeRequest();
        $request->setParent($parent);
        $request->setConfig($config);
        if (isset($optionalArgs['storedInfoTypeId'])) {
            $request->setStoredInfoTypeId($optionalArgs['storedInfoTypeId']);
        }
        if (isset($optionalArgs['locationId'])) {
            $request->setLocationId($optionalArgs['locationId']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'CreateStoredInfoType',
            StoredInfoType::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Updates the stored infoType by creating a new version. The existing version
     * will continue to be used until the new version is ready.
     * See https://cloud.google.com/dlp/docs/creating-stored-infotypes to
     * learn more.
     *
     * Sample code:
     * ```
     * $dlpServiceClient = new DlpServiceClient();
     * try {
     *     $formattedName = $dlpServiceClient->organizationStoredInfoTypeName('[ORGANIZATION]', '[STORED_INFO_TYPE]');
     *     $response = $dlpServiceClient->updateStoredInfoType($formattedName);
     * } finally {
     *     $dlpServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. Resource name of organization and storedInfoType to be updated, for
     *                             example `organizations/433245324/storedInfoTypes/432452342` or
     *                             projects/project-id/storedInfoTypes/432452342.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type StoredInfoTypeConfig $config
     *          Updated configuration for the storedInfoType. If not provided, a new
     *          version of the storedInfoType will be created with the existing
     *          configuration.
     *     @type FieldMask $updateMask
     *          Mask to control which fields get updated.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dlp\V2\StoredInfoType
     *
     * @throws ApiException if the remote call fails
     */
    public function updateStoredInfoType($name, array $optionalArgs = [])
    {
        $request = new UpdateStoredInfoTypeRequest();
        $request->setName($name);
        if (isset($optionalArgs['config'])) {
            $request->setConfig($optionalArgs['config']);
        }
        if (isset($optionalArgs['updateMask'])) {
            $request->setUpdateMask($optionalArgs['updateMask']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'UpdateStoredInfoType',
            StoredInfoType::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Gets a stored infoType.
     * See https://cloud.google.com/dlp/docs/creating-stored-infotypes to
     * learn more.
     *
     * Sample code:
     * ```
     * $dlpServiceClient = new DlpServiceClient();
     * try {
     *     $formattedName = $dlpServiceClient->organizationStoredInfoTypeName('[ORGANIZATION]', '[STORED_INFO_TYPE]');
     *     $response = $dlpServiceClient->getStoredInfoType($formattedName);
     * } finally {
     *     $dlpServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. Resource name of the organization and storedInfoType to be read, for
     *                             example `organizations/433245324/storedInfoTypes/432452342` or
     *                             projects/project-id/storedInfoTypes/432452342.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dlp\V2\StoredInfoType
     *
     * @throws ApiException if the remote call fails
     */
    public function getStoredInfoType($name, array $optionalArgs = [])
    {
        $request = new GetStoredInfoTypeRequest();
        $request->setName($name);

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'GetStoredInfoType',
            StoredInfoType::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Lists stored infoTypes.
     * See https://cloud.google.com/dlp/docs/creating-stored-infotypes to
     * learn more.
     *
     * Sample code:
     * ```
     * $dlpServiceClient = new DlpServiceClient();
     * try {
     *     $formattedParent = $dlpServiceClient->organizationLocationName('[ORGANIZATION]', '[LOCATION]');
     *     // Iterate over pages of elements
     *     $pagedResponse = $dlpServiceClient->listStoredInfoTypes($formattedParent);
     *     foreach ($pagedResponse->iteratePages() as $page) {
     *         foreach ($page as $element) {
     *             // doSomethingWith($element);
     *         }
     *     }
     *
     *
     *     // Alternatively:
     *
     *     // Iterate through all elements
     *     $pagedResponse = $dlpServiceClient->listStoredInfoTypes($formattedParent);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $dlpServiceClient->close();
     * }
     * ```
     *
     * @param string $parent Required. Parent resource name.
     *
     * The format of this value varies depending on the scope of the request
     * (project or organization) and whether you have [specified a processing
     * location](https://cloud.google.com/dlp/docs/specifying-location):
     *
     * + Projects scope, location specified:<br/>
     *   `projects/`<var>PROJECT_ID</var>`/locations/`<var>LOCATION_ID</var>
     * + Projects scope, no location specified (defaults to global):<br/>
     *   `projects/`<var>PROJECT_ID</var>
     * + Organizations scope, location specified:<br/>
     *   `organizations/`<var>ORG_ID</var>`/locations/`<var>LOCATION_ID</var>
     * + Organizations scope, no location specified (defaults to global):<br/>
     *   `organizations/`<var>ORG_ID</var>
     *
     * The following example `parent` string specifies a parent project with the
     * identifier `example-project`, and specifies the `europe-west3` location
     * for processing data:
     *
     *     parent=projects/example-project/locations/europe-west3
     * @param array $optionalArgs {
     *                            Optional.
     *
     *     @type string $pageToken
     *          A page token is used to specify a page of values to be returned.
     *          If no page token is specified (the default), the first page
     *          of values will be returned. Any page token used here must have
     *          been generated by a previous call to the API.
     *     @type int $pageSize
     *          The maximum number of resources contained in the underlying API
     *          response. The API may return fewer values in a page, even if
     *          there are additional values to be retrieved.
     *     @type string $orderBy
     *          Comma separated list of fields to order by,
     *          followed by `asc` or `desc` postfix. This list is case-insensitive,
     *          default sorting order is ascending, redundant space characters are
     *          insignificant.
     *
     *          Example: `name asc, display_name, create_time desc`
     *
     *          Supported fields are:
     *
     *          - `create_time`: corresponds to time the most recent version of the
     *          resource was created.
     *          - `state`: corresponds to the state of the resource.
     *          - `name`: corresponds to resource name.
     *          - `display_name`: corresponds to info type's display name.
     *     @type string $locationId
     *          Deprecated. This field has no effect.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\PagedListResponse
     *
     * @throws ApiException if the remote call fails
     */
    public function listStoredInfoTypes($parent, array $optionalArgs = [])
    {
        $request = new ListStoredInfoTypesRequest();
        $request->setParent($parent);
        if (isset($optionalArgs['pageToken'])) {
            $request->setPageToken($optionalArgs['pageToken']);
        }
        if (isset($optionalArgs['pageSize'])) {
            $request->setPageSize($optionalArgs['pageSize']);
        }
        if (isset($optionalArgs['orderBy'])) {
            $request->setOrderBy($optionalArgs['orderBy']);
        }
        if (isset($optionalArgs['locationId'])) {
            $request->setLocationId($optionalArgs['locationId']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->getPagedListResponse(
            'ListStoredInfoTypes',
            $optionalArgs,
            ListStoredInfoTypesResponse::class,
            $request
        );
    }

    /**
     * Deletes a stored infoType.
     * See https://cloud.google.com/dlp/docs/creating-stored-infotypes to
     * learn more.
     *
     * Sample code:
     * ```
     * $dlpServiceClient = new DlpServiceClient();
     * try {
     *     $formattedName = $dlpServiceClient->organizationStoredInfoTypeName('[ORGANIZATION]', '[STORED_INFO_TYPE]');
     *     $dlpServiceClient->deleteStoredInfoType($formattedName);
     * } finally {
     *     $dlpServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. Resource name of the organization and storedInfoType to be deleted, for
     *                             example `organizations/433245324/storedInfoTypes/432452342` or
     *                             projects/project-id/storedInfoTypes/432452342.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @throws ApiException if the remote call fails
     */
    public function deleteStoredInfoType($name, array $optionalArgs = [])
    {
        $request = new DeleteStoredInfoTypeRequest();
        $request->setName($name);

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'DeleteStoredInfoType',
            GPBEmpty::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Inspect hybrid content and store findings to a job.
     * To review the findings inspect the job. Inspection will occur
     * asynchronously.
     * Early access feature is in a pre-release state and might change or have
     * limited support. For more information, see
     * https://cloud.google.com/products#product-launch-stages.
     *
     * Sample code:
     * ```
     * $dlpServiceClient = new DlpServiceClient();
     * try {
     *     $name = '';
     *     $response = $dlpServiceClient->hybridInspectDlpJob($name);
     * } finally {
     *     $dlpServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. Resource name of the job to execute a hybrid inspect on, for example
     *                             `projects/dlp-test-project/dlpJob/53234423`.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type HybridContentItem $hybridItem
     *          The item to inspect.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dlp\V2\HybridInspectResponse
     *
     * @throws ApiException if the remote call fails
     */
    public function hybridInspectDlpJob($name, array $optionalArgs = [])
    {
        $request = new HybridInspectDlpJobRequest();
        $request->setName($name);
        if (isset($optionalArgs['hybridItem'])) {
            $request->setHybridItem($optionalArgs['hybridItem']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'HybridInspectDlpJob',
            HybridInspectResponse::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Finish a running hybrid DlpJob. Triggers the finalization steps and running
     * of any enabled actions that have not yet run.
     * Early access feature is in a pre-release state and might change or have
     * limited support. For more information, see
     * https://cloud.google.com/products#product-launch-stages.
     *
     * Sample code:
     * ```
     * $dlpServiceClient = new DlpServiceClient();
     * try {
     *     $name = '';
     *     $dlpServiceClient->finishDlpJob($name);
     * } finally {
     *     $dlpServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. The name of the DlpJob resource to be cancelled.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @throws ApiException if the remote call fails
     */
    public function finishDlpJob($name, array $optionalArgs = [])
    {
        $request = new FinishDlpJobRequest();
        $request->setName($name);

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'FinishDlpJob',
            GPBEmpty::class,
            $optionalArgs,
            $request
        )->wait();
    }
}
