<?php
return array(
    // set your paypal credential older id
    //'client_id' => 'AaWHKeaeNZ0AEMGfgCeU1mAQazAISegkwoepRbz11C0jQB3FNiz5MWOQxWeYztekOVdkkd8k2AqapGpW',
    //'secret' => 'EJQ5T-FB_uGGEPhnMDbGGpdznLiKA_fK8w9UNbr6zYcJnXxh9LUL65ZwRAglHQkRw35kUxyFuQY9vHrK',

    'client_id' => 'AYdcch4XiIZyh27f2P63VmsM_dEoV4edzQTz4rcNQbs1b129JrSxbjEJwcG2sDgl7RKHolwyR3KwUvxE',
    'secret' => 'EAbV4lFoKcWuvdGEcxwwSX75dqmkTo369xieILxRuWilZMKrJakKJjl4iHorCca_ahPW76puUJ2mzwI6',

    
   // 'client_id' => 'AeO0XkJq8GJW6FT2Fs4L-GBLt7CFyAEltdoKQvqptw9JAzh3SgpWQhzXQH6kgtJxaFHlcWV3qJ6RirBO',
   // 'secret' => 'ECiiBVtTIc23mAaZOmIAFFlWfkutFKaRIjILbMcIFiceeRoN-c69HuZUK34M2QW13mfpCY24bqpDU6Kw',

    /**
     * SDK configuration
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'live',

        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,

        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,

        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',

        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);
