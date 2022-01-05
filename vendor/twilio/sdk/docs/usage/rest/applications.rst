==================
Applications
==================

Creating Applications
==============================

.. code-block:: php
    
    $client = new Services_Twilio('AC123', '123');
    $application = $client->account->applications->create('Application Friendly Name', 
      array(
        'FriendlyName' => 'My Application Name',
        'VoiceUrl' => 'https://foo.com/voice/url',
        'VoiceFallbackUrl' => 'https://foo.com/voice/fallback/url',
        'VoiceMethod' => 'POST',
        'SmsUrl' => 'https://foo.com/sms/url',
        'SmsFallbackUrl' => 'https://foo.com/sms/fallback/url',
        'SmsMethod' => 'POST'
      )
    );

    
Updating An Application
==============================

.. code-block:: php

    $client = new Services_Twilio('AC123', '123');
    $application = $client->account->applications->get('AP123');
    $application->update(array(
      'VoiceUrl' => 'https://foo.com/new/voice/url'
    )); 


Finding an Application by Name
==============================

Find an :class:`Application` by its name (full name match).

.. code-block:: php

    $client = new Services_Twilio('AC123', '123');
    $application = false;
    $params = array(
        'FriendlyName' => 'My Application Name'
      );
    foreach($client->account->applications->getIterator(0, 1, $params) as $_application) {
      $application = $_application;
    }