<?php

/**
 * Twilio TaskRouter TaskQueue Capability assigner
 *
 * @category Services
 * @package  Services_Twilio
 * @author Justin Witz <justin.witz@twilio.com>
 * @license  https://creativecommons.org/licenses/MIT/ MIT
 */
class Services_Twilio_TaskRouter_TaskQueue_Capability extends Services_Twilio_TaskRouter_Capability
{
	public function __construct($accountSid, $authToken, $workspaceSid, $taskQueueSid, $overrideBaseUrl = null, $overrideBaseWSUrl = null)
	{
		parent::__construct($accountSid, $authToken, $workspaceSid, $taskQueueSid, null, $overrideBaseUrl, $overrideBaseWSUrl);
	}

	protected function setupResource() {
		$this->resourceUrl = $this->baseUrl.'/TaskQueues/'.$this->channelId;
	}
}