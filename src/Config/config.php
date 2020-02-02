<?php

return [

    /*
     * Enable or disable the LaraFeed.
     */
    'enabled' => env('LARAFEED_ENABLED', true),

    /*
     * Feedback button settings
     */
    'button' => [
        'title' => '&#9993; Feedback',
        'animate' => true,
        'position' => 'right', // left or right - shown on bottom
        'x_margin' => '25px', // margin from left or right
        'y_margin' => '25px', // margin from bottom
    ],

    /*
     * Feedback settings
     */
    'feedback' => [
        /*
         * Text to be shown on top of feedback dialog. Can contain HTML.
         */
        'feedback_dialog_text' => 'Send Us Your Feedback',

        /*
         * Message to be shown after successful feedback submission
         * Note: LaraFeed will populate "$message" variable which you can use after submission.
         */
        'success_message' => 'Thanks for your feedback!',
    ],

    /*
     * Screenshots settings
     */
    'screenshots' => [
        /*
         * Specify wheather to capture page's screenshot.
         */
        'capture_screenshots' => true,

        /*
         * The selector that will be used to capture screenshot.
         */
        'screenshot_selector' => 'body',

        /*
         * Path where feedback screenshots will be stored.
         */
        'screenshots_store_folder' => storage_path('feedback_screenshots'),
    ],

    /*
     * Specify wheather to save feedbacks in "larafeeds" table.
     */
    'store_in_db' => true,

    /*
     * On these paths/patterns LaraFeed button will NOT be visible.
     */
    'ignore_paths' => [
        // 'foo',
        // 'foo*',
        // '*foo',
        // '*foo*',
    ],

    /*
     * Mail settings
     */
    'mail' => [
        /*
         * Define mail subject and who should receive new feedback mails.
         * Leave "mail_receivers" empty [] to not send any mail.
         */
        'mail_subject' => 'New Feedback Received',
        'mail_receivers' => ['admin@example.com'],
    ],
];
