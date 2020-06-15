<?php

declare(strict_types=1);

/*
 * This file is part of the uptime-robot bundle package.
 * (c) Connect Holland.
 */

namespace ConnectHolland\UptimeRobotBundle\Api\UptimeRobot;

class Client extends \Jane\OpenApiRuntime\Client\Psr7HttplugClient
{
    /**
     * Account details (max number of monitors that can be added and number of up/down/paused monitors) can be grabbed using this method.
     *
     * @param array $formParameters {
     *
     *     @var string $api_key API key
     *     @var string $format Response format
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\GetAccountDetailsBadRequestException
     * @throws \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\GetAccountDetailsInternalServerErrorException
     *
     * @return \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Model\AccountDetailsResponse|\Psr\Http\Message\ResponseInterface|null
     */
    public function getAccountDetails(array $formParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Endpoint\GetAccountDetails($formParameters), $fetch);
    }

    /**
     * This is a Swiss-Army knife type of a method for getting any information on monitors. By default, it lists all the monitors in a user's account, their friendly names, types (http, keyword, port, etc.), statuses (up, down, etc.) and uptime ratios. There are optional parameters which lets the getMonitors method to output information on any given monitors rather than all of them.
     *
     * @param array $queryParameters {
     *
     *     @var string $search optional (a keyword of your choice to search within monitorURL and monitorFriendlyName and get filtered results)
     * }
     *
     * @param array $formParameters {
     *
     *     @var string $api_key API key
     *     @var string $format Response format
     *     @var string $monitors optional (if not used, will return all monitors in an account. Else, it is possible to define any number of monitors with their IDs like: monitors=15830-32696-83920)
     *     @var string $types optional (if not used, will return all monitors types (HTTP, keyword, ping..) in an account. Else, it is possible to define any number of monitor types like: types=1-3-4)
     *     @var string $statuses optional (if not used, will return all monitors statuses (up, down, paused) in an account. Else, it is possible to define any number of monitor statuses like: statuses=2-9)
     *     @var string $custom_uptime_ratios optional (defines the number of days to calculate the uptime ratio(s) for. Ex: customUptimeRatio=7-30-45 to get the uptime ratios for those periods)
     *     @var int $logs optional (defines if the logs of each monitor will be returned. Should be set to 1 for getting the logs. Default is 0)
     *     @var string $logs_limit optional (the number of logs to be returned (descending order). If empty, all logs are returned.
     *     @var string $response_times optional (defines if the response time data of each monitor will be returned. Should be set to 1 for getting them. Default is 0)
     *     @var string $response_times_limits
     *     @var string $response_times_average optional (by default, response time value of each check is returned. The API can return average values in given minutes. Default is 0. For ex: the Uptime Robot dashboard displays the data averaged/grouped in 30 minutes)
     *     @var string $response_times_start_date optional (the number of response time logs to be returned (descending order). If empty, last 24 hours of logs are returned (if responseTimesStartDate and responseTimesEndDate are not used).
     *     @var string $response_times_end_date optional and works only for the Pro Plan as 24 hour+ logs are kept only in the Pro Plan (ending date of the response times, formatted as 2015-04-23 and must be used with responseTimesStartDate) (can only be used if monitors parameter is used with a single monitorID and responseTimesEndDate - responseTimesStartDate can't be more than 7 days)
     *     @var string $alert_contacts optional (defines if the notified alert contacts of each notification will be returned. Should be set to 1 for getting them. Default is 0. Requires logs to be set to1)
     *     @var int $offset optional (used for pagination. Defines the record to start paginating. Default is 0)
     *     @var int $limit optional (used for pagination. Defines the max number of records to return for the response. Default and max. is 50)
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\GetMonitorsBadRequestException
     * @throws \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\GetMonitorsInternalServerErrorException
     *
     * @return \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Model\GetMonitorsResponse|\Psr\Http\Message\ResponseInterface|null
     */
    public function getMonitors(array $queryParameters = [], array $formParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Endpoint\GetMonitors($queryParameters, $formParameters), $fetch);
    }

    /**
     * New monitors of any type can be created using this method.
     *
     * @param array $formParameters {
     *
     *     @var string $api_key API key
     *     @var string $format Response format
     *     @var string $friendly_name name of monitor
     *     @var string $url URL to monitor
     *     @var int $type type of monitor
     *     @var string $sub_type required for port monitoring
     *     @var int $port required for port monitoring
     *     @var string $keyword_type required for keyword monitoring
     *     @var string $keyword_value required for keyword monitoring
     *     @var int $interval optional (in seconds)
     *     @var string $http_username optional
     *     @var string $http_password optional
     *     @var string $alert_contacts optional (the alert contacts to be notified when the monitor goes up/down.Multiple alert_contact>ids can be sent like alert_contacts=457_0_0-373_5_0-8956_2_3 where alert_contact>ids are seperated with - and threshold + recurrence are seperated with _. For ex: alert_contacts=457_5_0 refers to 457 being the alert_contact>id, 5 being the threshold and 0 being the recurrence. As the threshold and recurrence is only available in the Pro Plan, they are always 0 in the Free Plan)
     *     @var int $mwindows optional (the maintenance windows for the monitor which can be mentioned with their IDs like 345-2986-71)
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\NewMonitorBadRequestException
     * @throws \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\NewMonitorInternalServerErrorException
     *
     * @return \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Model\MonitorResponse|\Psr\Http\Message\ResponseInterface|null
     */
    public function newMonitor(array $formParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Endpoint\NewMonitor($formParameters), $fetch);
    }

    /**
     * Monitors can be edited using this method. Important: The type of a monitor can not be edited (like changing a HTTP monitor into a Port monitor). For such cases, deleting the monitor and re-creating a new one is advised.
     *
     * @param array $formParameters {
     *
     *     @var string $api_key API key
     *     @var string $format Response format
     *     @var int $id ID of the monitor
     *     @var int $status Status of the monitor (1=resume, 0=pause)
     *     @var string $friendly_name name of monitor
     *     @var string $url URL to monitor
     *     @var int $type type of monitor
     *     @var string $sub_type required for port monitoring
     *     @var int $port required for port monitoring
     *     @var string $keyword_type required for keyword monitoring
     *     @var string $keyword_value required for keyword monitoring
     *     @var int $interval optional (in seconds)
     *     @var string $http_username optional
     *     @var string $http_password optional
     *     @var string $alert_contacts optional (the alert contacts to be notified when the monitor goes up/down.Multiple alert_contact>ids can be sent like alert_contacts=457_0_0-373_5_0-8956_2_3 where alert_contact>ids are seperated with - and threshold + recurrence are seperated with _. For ex: alert_contacts=457_5_0 refers to 457 being the alert_contact>id, 5 being the threshold and 0 being the recurrence. As the threshold and recurrence is only available in the Pro Plan, they are always 0 in the Free Plan)
     *     @var int $mwindows optional (the maintenance windows for the monitor which can be mentioned with their IDs like 345-2986-71)
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\EditMonitorBadRequestException
     * @throws \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\EditMonitorInternalServerErrorException
     *
     * @return \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Model\MonitorResponse|\Psr\Http\Message\ResponseInterface|null
     */
    public function editMonitor(array $formParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Endpoint\EditMonitor($formParameters), $fetch);
    }

    /**
     * Monitors can be deleted using this method.
     *
     * @param array $formParameters {
     *
     *     @var string $api_key API key
     *     @var string $format Response format
     *     @var int $id ID of monitor to delete
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\DeleteMonitorBadRequestException
     * @throws \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\DeleteMonitorInternalServerErrorException
     *
     * @return \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Model\MonitorResponse|\Psr\Http\Message\ResponseInterface|null
     */
    public function deleteMonitor(array $formParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Endpoint\DeleteMonitor($formParameters), $fetch);
    }

    /**
     * Monitors can be reset (deleting all stats and response time data) using this method.
     *
     * @param array $formParameters {
     *
     *     @var string $api_key API key
     *     @var string $format Response format
     *     @var int $id ID of monitor to reset
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\ResetMonitorBadRequestException
     * @throws \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\ResetMonitorInternalServerErrorException
     *
     * @return \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Model\MonitorResponse|\Psr\Http\Message\ResponseInterface|null
     */
    public function resetMonitor(array $formParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Endpoint\ResetMonitor($formParameters), $fetch);
    }

    /**
     * The list of alert contacts can be called with this method.
     *
     * @param array $formParameters {
     *
     *     @var string $api_key API key
     *     @var string $format Response format
     *     @var string $alertcontacts if not used, will return all alert contacts in an account. Else, it is possible to define any number of alert contacts with their IDs like: alertcontacts=236-1782-4790
     *     @var int $offset used for pagination. Defines the record to start paginating. Default is 0
     *     @var int $limit used for pagination. Defines the max number of records to return for the response. Default and max. is 50
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\GetAlertContactsBadRequestException
     * @throws \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\GetAlertContactsInternalServerErrorException
     *
     * @return \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Model\GetAlertContactsResponse|\Psr\Http\Message\ResponseInterface|null
     */
    public function getAlertContacts(array $formParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Endpoint\GetAlertContacts($formParameters), $fetch);
    }

    /**
     * New alert contacts of any type (mobile/SMS alert contacts are not supported yet) can be created using this method. The alert contacts created using the API are validated with the same way as they were created from uptimerobot.com (activation link for e-mails, tc.).
     *
     * @param array $formParameters {
     *
     *     @var string $api_key API key
     *     @var string $format Response format
     *     @var string $type 1 - SMS, 2 - E-mail, 3 - Twitter DM, 4 - Boxcar, 5 - Web-Hook, 6 - Pushbullet, 7 - Zapier, 9 - Pushover, 10 - HipChat, 11 - Slack - he type of the alert contact notified (SMS is not supported yet)
     *     @var string $value address qualifier depending on type, e.g. email address
     *     @var string $friendly_name
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\NewAlertContactBadRequestException
     * @throws \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\NewAlertContactInternalServerErrorException
     *
     * @return \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Model\AlertContactResponse|\Psr\Http\Message\ResponseInterface|null
     */
    public function newAlertContact(array $formParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Endpoint\NewAlertContact($formParameters), $fetch);
    }

    /**
     * Update alert contacts of any type (mobile/SMS alert contacts are not supported yet) can be created using this method. The alert contacts created using the API are validated with the same way as they were created from uptimerobot.com (activation link for e-mails, tc.).
     *
     * @param array $formParameters {
     *
     *     @var string $api_key API key
     *     @var string $format Response format
     *     @var int $id
     *     @var string $type 1 - SMS, 2 - E-mail, 3 - Twitter DM, 4 - Boxcar, 5 - Web-Hook, 6 - Pushbullet, 7 - Zapier, 9 - Pushover, 10 - HipChat, 11 - Slack - he type of the alert contact notified (SMS is not supported yet)
     *     @var string $value address qualifier depending on type (can only be used if it is a web-hook alert contact)
     *     @var string $friendly_name
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\EditAlertContactBadRequestException
     * @throws \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\EditAlertContactInternalServerErrorException
     *
     * @return \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Model\AlertContactUnderscoreResponse|\Psr\Http\Message\ResponseInterface|null
     */
    public function editAlertContact(array $formParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Endpoint\EditAlertContact($formParameters), $fetch);
    }

    /**
     * Alert contacts can be deleted using this method.
     *
     * @param array $formParameters {
     *
     *     @var string $api_key API key
     *     @var string $format Response format
     *     @var string $id ID of the alert contact to delete
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\DeleteAlertContactBadRequestException
     * @throws \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\DeleteAlertContactInternalServerErrorException
     *
     * @return \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Model\AlertContactUnderscoreResponse|\Psr\Http\Message\ResponseInterface|null
     */
    public function deleteAlertContact(array $formParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Endpoint\DeleteAlertContact($formParameters), $fetch);
    }

    /**
     * The list of maintenance windows can be called with this method.
     *
     * @param array $formParameters {
     *
     *     @var string $api_key API key
     *     @var string $format Response format
     *     @var string $mwindows optional (if not used, will return all mwindows in an account. Else, it is possible to define any number of mwindows with their IDs like: mwindows=236-1782-4790)
     *     @var int $offset optional (used for pagination. Defines the record to start paginating. Default is 0)
     *     @var int $limit optional (used for pagination. Defines the max number of records to return for the response. Default and max. is 10)
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\GetMaintenanceWindowsBadRequestException
     * @throws \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\GetMaintenanceWindowsInternalServerErrorException
     *
     * @return \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Model\GetMWindowsResponse|\Psr\Http\Message\ResponseInterface|null
     */
    public function getMaintenanceWindows(array $formParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Endpoint\GetMaintenanceWindows($formParameters), $fetch);
    }

    /**
     * The list of public status pages can be called with this method.
     *
     * @param array $formParameters {
     *
     *     @var string $api_key API key
     *     @var string $format Response format
     *     @var string $psps optional (if not used, will return all alert contacts in an account. Else, it is possible to define any number of alert contacts with their IDs like: psps=236-1782-4790)
     *     @var int $offset optional (used for pagination. Defines the record to start paginating. Default is 0)
     *     @var int $limit optional (used for pagination. Defines the max number of records to return for the response. Default and max. is 10)
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\GetPSPsBadRequestException
     * @throws \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\GetPSPsInternalServerErrorException
     *
     * @return \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Model\GetPSPsResponse|\Psr\Http\Message\ResponseInterface|null
     */
    public function getPSPs(array $formParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Endpoint\GetPSPs($formParameters), $fetch);
    }

    /**
     * New public status pages can be created using this method.
     *
     * @param array $formParameters {
     *
     *     @var string $api_key API key
     *     @var string $format Response format
     *     @var string $friendly_name name of monitor
     *     @var string $monitors required (The monitors to be displayed can be sent as 15830-32696-83920. Or 0 for displaying all monitors)
     *     @var string $custom_domain optinal
     *     @var int $sort required for port monitoring
     *     @var int $hide_url_links optional (for hiding the Uptime Robot links and only available in the Pro Plan)
     *     @var int $status optional
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\NewPSPBadRequestException
     * @throws \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\NewPSPInternalServerErrorException
     *
     * @return \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Model\PSPResponse|\Psr\Http\Message\ResponseInterface|null
     */
    public function newPSP(array $formParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Endpoint\NewPSP($formParameters), $fetch);
    }

    /**
     * Public status pages can be edited using this method.
     *
     * @param array $formParameters {
     *
     *     @var string $api_key API key
     *     @var string $format Response format
     *     @var int $id ID
     *     @var string $friendly_name name of monitor
     *     @var string $monitors optional (The monitors to be displayed can be sent as 15830-32696-83920. Or 0 for displaying all monitors)
     *     @var string $custom_domain optional
     *     @var int $sort optional
     *     @var int $hide_url_links optional (for hiding the Uptime Robot links and only available in the Pro Plan)
     *     @var int $status optional
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\EditPSPBadRequestException
     * @throws \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\EditPSPInternalServerErrorException
     *
     * @return \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Model\PSPResponse|\Psr\Http\Message\ResponseInterface|null
     */
    public function editPSP(array $formParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Endpoint\EditPSP($formParameters), $fetch);
    }

    /**
     * Public status pages can be deleted using this method.
     *
     * @param array $formParameters {
     *
     *     @var string $api_key API key
     *     @var string $format Response format
     *     @var int $id ID of public status page to delete
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\DeletePSPBadRequestException
     * @throws \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\DeletePSPInternalServerErrorException
     *
     * @return \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Model\PSPResponse|\Psr\Http\Message\ResponseInterface|null
     */
    public function deletePSP(array $formParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Endpoint\DeletePSP($formParameters), $fetch);
    }

    public static function create($httpClient = null)
    {
        if (null === $httpClient) {
            $httpClient = \Http\Discovery\HttpClientDiscovery::find();
            $plugins    = [];
            $uri        = \Http\Discovery\UriFactoryDiscovery::find()->createUri('https://api.uptimerobot.com/v2');
            $plugins[]  = new \Http\Client\Common\Plugin\AddHostPlugin($uri);
            $plugins[]  = new \Http\Client\Common\Plugin\AddPathPlugin($uri);
            $httpClient = new \Http\Client\Common\PluginClient($httpClient, $plugins);
        }
        $messageFactory = \Http\Discovery\MessageFactoryDiscovery::find();
        $streamFactory  = \Http\Discovery\StreamFactoryDiscovery::find();
        $serializer     = new \Symfony\Component\Serializer\Serializer([new \Symfony\Component\Serializer\Normalizer\ArrayDenormalizer(), new \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Normalizer\JaneObjectNormalizer()], [new \Symfony\Component\Serializer\Encoder\JsonEncoder(new \Symfony\Component\Serializer\Encoder\JsonEncode(), new \Symfony\Component\Serializer\Encoder\JsonDecode())]);

        return new static($httpClient, $messageFactory, $serializer, $streamFactory);
    }
}
