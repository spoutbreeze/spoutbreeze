<?php

/**
 * SpoutBreeze open source platform - https://www.spoutbreeze.org/
 *
 * Copyright (c) 2021 Frictionless Solutions Inc., RIADVICE SUARL and by respective authors (see below).
 *
 * This program is free software; you can redistribute it and/or modify it under the
 * terms of the GNU Lesser General Public License as published by the Free Software
 * Foundation; either version 3.0 of the License, or (at your option) any later
 * version.
 *
 * SpoutBreeze is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
 * PARTICULAR PURPOSE. See the GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License along
 * with SpoutBreeze; if not, see <http://www.gnu.org/licenses/>.
 */

namespace src\Utils;

use Base;
use BigBlueButton\BigBlueButton;
use BigBlueButton\Parameters\EndMeetingParameters;
use BigBlueButton\Parameters\GetMeetingInfoParameters;
use BigBlueButton\Parameters\JoinMeetingParameters;
use BigBlueButton\Responses\GetMeetingInfoResponse;
use BigBlueButton\Util\UrlBuilder;
use Log\LogWriterTrait;
use Models\Server;

class BigBlueButtonRequester extends BigBlueButton
{
    use LogWriterTrait;

    /**
     * f3 instance.
     *
     * @var Base f3
     */
    protected $f3;

    private const BBB_PATH = '/bigbluebutton/';

    /**
     * The name of the call api method name
     *
     * @var string
     */
    protected $apiCall;

    /**
     * initialize controller.
     */
    public function __construct()
    {
        BigBlueButton::__construct();

        $this->f3 = Base::instance();
        $this->initLogger();

        $this->apiCall = basename(Base::instance()->get('PATH'));
    }

    /**
     * @param  Server                $server
     * @param  JoinMeetingParameters $params
     * @return string
     */
    public function getJoinMeetingURLForServer(Server $server, JoinMeetingParameters $params)
    {
        $this->prepareUrlBuild($server);

        return $this->getJoinMeetingURL($params);
    }
    /**
     * @param  Server                   $server
     * @param  GetMeetingInfoParameters $params
     * @return GetMeetingInfoResponse
     */
    public function getMeetingInfoForServer(Server $server, GetMeetingInfoParameters $params)
    {
        $this->prepareUrlBuild($server);

        return $this->getMeetingInfo($params);
    }

    /**
     * @param  Server                                      $server
     * @param  EndMeetingParameters                        $params
     * @return \BigBlueButton\Responses\EndMeetingResponse
     */
    public function endMeetingForServer(Server $server, EndMeetingParameters $params)
    {
        $this->prepareUrlBuild($server);

        return $this->endMeeting($params);
    }

    /**
     * Prepares the URLBuilder to use the new target
     *
     * @param Server $server
     */
    private function prepareUrlBuild($server): void
    {
        $this->securitySecret   = $server->shared_secret;
        $this->bbbServerBaseUrl = 'https://'. $server->fqdn . self::BBB_PATH;
        $this->urlBuilder       = new UrlBuilder($this->securitySecret, $this->bbbServerBaseUrl);
    }
}
