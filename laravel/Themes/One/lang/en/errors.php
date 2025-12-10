<?php

declare(strict_types=1);

return [
    /*
    |--------------------------------------------------------------------------
    | Error Pages
    |--------------------------------------------------------------------------
    */
    'http_403' => [
        'title' => [
            'label' => 'Error 403',
            'tooltip' => 'Access denied error',
            'helper_text' => 'HTTP status code 403',
        ],
        'message' => [
            'label' => 'You don\'t have permission to access this page',
            'tooltip' => 'Error message for access denied',
            'helper_text' => 'The user doesn\'t have the necessary privileges to view this resource',
        ],
    ],

    'http_404' => [
        'title' => [
            'label' => 'Error 404',
            'tooltip' => 'Page not found',
            'helper_text' => 'HTTP status code 404',
        ],
        'message' => [
            'label' => 'The page you are looking for does not exist',
            'tooltip' => 'Error message for page not found',
            'helper_text' => 'The requested resource was not found on the server',
        ],
    ],

    'http_429' => [
        'title' => [
            'label' => 'Error 429',
            'tooltip' => 'Too many requests',
            'helper_text' => 'HTTP status code 429',
        ],
        'virtual_waiting_room' => [
            'title' => [
                'label' => 'Virtual waiting room',
                'tooltip' => 'Queue management system',
                'helper_text' => 'System to limit simultaneous access',
            ],
            'description' => [
                'label' => 'We are handling many requests to guarantee you the best service!',
                'tooltip' => 'Explanation of the waiting system',
                'helper_text' => 'Informative message to reassure the user',
            ],
        ],
        'countdown' => [
            'retry_message' => [
                'label' => 'You can try again in',
                'tooltip' => 'Waiting time before next attempt',
                'helper_text' => 'Indicates when the user can make a new request',
            ],
            'start_waiting' => [
                'label' => 'Start waiting',
                'tooltip' => 'Beginning of the waiting period',
                'helper_text' => 'Timestamp of countdown start',
            ],
        ],
        'queue' => [
            'position' => [
                'label' => 'Queue position',
                'tooltip' => 'Number in the virtual line',
                'helper_text' => 'Indicates the user\'s position in the waiting queue',
            ],
            'people_ahead' => [
                'label' => 'People ahead of you in the virtual waiting room',
                'tooltip' => 'Number of users preceding in the queue',
                'helper_text' => 'Estimate of users waiting before the current user',
            ],
        ],
        'activities' => [
            'breathing' => [
                'title' => [
                    'label' => '🫁 Breathe and Relax',
                    'tooltip' => 'Breathing exercise',
                    'helper_text' => 'Activity to help the user relax during the wait',
                ],
                'start_exercise' => [
                    'label' => 'Start Exercise',
                    'tooltip' => 'Start the breathing exercise',
                    'helper_text' => 'Button to begin the guided breathing session',
                ],
                'breaths_completed' => [
                    'label' => 'Breaths completed',
                    'tooltip' => 'Counter of breathing cycles',
                    'helper_text' => 'Number of deep breaths taken',
                ],
            ],
            'quiz' => [
                'title' => [
                    'label' => '🧠 Medical Quiz',
                    'tooltip' => 'Educational quiz on health topics',
                    'helper_text' => 'Educational activity to keep the user engaged',
                ],
                'start_quiz' => [
                    'label' => 'Start Quiz',
                    'tooltip' => 'Launch the medical quiz',
                    'helper_text' => 'Button to start the educational quiz',
                ],
                'new_quiz' => [
                    'label' => 'New Quiz',
                    'tooltip' => 'Generate a new question',
                    'helper_text' => 'Button to get a new quiz question',
                ],
            ],
            'tips' => [
                'title' => [
                    'label' => '💡 Smart Tips',
                    'tooltip' => 'Useful suggestions',
                    'helper_text' => 'Tips to improve user experience',
                ],
                'avoid_queues' => [
                    'label' => 'Avoid queues with our priority updates!',
                    'tooltip' => 'Suggestion to avoid traffic peaks',
                    'helper_text' => 'Advice to use the service during less crowded times',
                ],
            ],
        ],
        'retry' => [
            'retry_in' => [
                'label' => 'Retry in',
                'tooltip' => 'Time remaining before next attempt',
                'helper_text' => 'Countdown for the next available attempt',
            ],
            'retry_now' => [
                'label' => '🔄 Retry Now',
                'tooltip' => 'Try to access again',
                'helper_text' => 'Button to retry immediate access',
            ],
        ],
        'emergency' => [
            'no_wait_emergency' => [
                'label' => 'Don\'t wait in case of emergency',
                'tooltip' => 'Warning for emergency situations',
                'helper_text' => 'Reminder that in case of emergency one should not wait',
            ],
        ],
        'footer' => [
            'powered_by' => [
                'label' => 'Powered by',
                'tooltip' => 'System credits',
                'helper_text' => 'Attribution of the queue management system',
            ],
            'tech_team' => [
                'label' => 'SaluteOra Tech Team',
                'tooltip' => 'Development team',
                'helper_text' => 'Name of the team responsible for development',
            ],
        ],
    ],

    'http_500' => [
        'title' => [
            'label' => 'Error 500',
            'tooltip' => 'Internal server error',
            'helper_text' => 'HTTP status code 500',
        ],
        'message' => [
            'label' => 'An internal server error occurred',
            'tooltip' => 'Error message for server problems',
            'helper_text' => 'Generic error indicating a server-side problem',
        ],
    ],
]; 