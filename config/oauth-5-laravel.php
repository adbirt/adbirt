<?php

return [

    /*
    |--------------------------------------------------------------------------
    | oAuth Config
    |--------------------------------------------------------------------------
    */

    /**
     * Storage
     */
    'storage' => 'Session',

    /**
     * Consumers
     */
    'consumers' => [
//using Steambd Pin
        'Facebook' => [
            'client_id'     => '1066714296684623',
            'client_secret' => '9ab6c74df65b6dabf3e5ebd334d04f06',
            'scope'         => array('email'),
        ],


        'Google' => array(
            'client_id'     => '204699774975-sgsbvg8plfpj4hbtb88u624dsd0f2ubf.apps.googleusercontent.com',
            'client_secret' => 'ateAnhGDlDS5I3fd6OT1VLDP',
            'scope'         => array('userinfo_email','userinfo_profile'),
        ),

    ]

];
