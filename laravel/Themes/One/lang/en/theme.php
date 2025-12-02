<?php

declare(strict_types=1);

return [
    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */
    'nav' => [
        'menu' => 'Menu',
        'close' => 'Close',
        'home' => 'Home',
        'about' => 'About Us',
        'services' => 'Services',
        'contact' => 'Contact',
        'login' => 'Login',
        'register' => 'Register',
        'profile' => 'Profile',
        'logout' => 'Logout',
        'search' => 'Search',
        'toggle_menu' => 'Toggle Menu',
        'toggle_search' => 'Toggle Search',
        'toggle_theme' => 'Change Theme',
        'back_to_top' => 'Back to Top',
    ],

    /*
    |--------------------------------------------------------------------------
    | Form
    |--------------------------------------------------------------------------
    */
    'form' => [
        'required' => 'Required field',
        'email' => 'Enter a valid email address',
        'min' => 'Field must contain at least :min characters',
        'max' => 'Field cannot exceed :max characters',
        'submit' => 'Submit',
        'cancel' => 'Cancel',
        'save' => 'Save',
        'delete' => 'Delete',
        'edit' => 'Edit',
        'view' => 'View',
        'search' => 'Search...',
        'filter' => 'Filter',
        'reset' => 'Reset',
        'select' => 'Select',
        'choose' => 'Choose...',
    ],

    /*
    |--------------------------------------------------------------------------
    | Messages
    |--------------------------------------------------------------------------
    */
    'messages' => [
        'success' => 'Operation completed successfully',
        'error' => 'An error occurred',
        'warning' => 'Warning',
        'info' => 'Information',
        'loading' => 'Loading...',
        'no_results' => 'No results found',
        'confirm_delete' => 'Are you sure you want to delete this item?',
        'yes' => 'Yes',
        'no' => 'No',
        'cookie_consent' => 'This site uses cookies to improve your experience',
        'accept' => 'Accept',
        'decline' => 'Decline',
    ],

    /*
    |--------------------------------------------------------------------------
    | Footer
    |--------------------------------------------------------------------------
    */
    'footer' => [
        'copyright' => 'All rights reserved',
        'privacy' => 'Privacy',
        'terms' => 'Terms and Conditions',
        'cookies' => 'Cookie Policy',
        'social' => [
            'follow' => 'Follow us on',
            'facebook' => 'Facebook',
            'twitter' => 'Twitter',
            'instagram' => 'Instagram',
            'linkedin' => 'LinkedIn',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Errors
    |--------------------------------------------------------------------------
    */
    'errors' => [
        '404' => [
            'title' => 'Page not found',
            'message' => 'The page you are looking for does not exist',
        ],
        '500' => [
            'title' => 'Server error',
            'message' => 'An internal server error occurred',
        ],
        '403' => [
            'title' => 'Access denied',
            'message' => 'You do not have permission to access this page',
        ],
        'offline' => [
            'title' => 'Offline',
            'message' => 'You are not connected to the Internet',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Hero Components
    |--------------------------------------------------------------------------
    */
    'hero' => [
        'patient_profile' => [
            'my_data' => [
                'label' => 'My Data',
                'tooltip' => 'View and edit your personal information',
                'help' => 'Manage your personal and demographic data',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Error Pages - 429 Rate Limiting
    |--------------------------------------------------------------------------
    */
    'error_429' => [
        'title' => 'Virtual Waiting Room - SaluteOra',
        'queue_position' => 'Position',
        'waiting_messages' => [
            'doctor_busy' => 'The doctor is very popular today! 👨‍⚕️✨',
            'waiting_room_full' => 'Waiting room full: we are a success! 🎉',
            'too_much_love' => 'Too many patients at once = too much love! ❤️',
            'server_coffee_break' => 'The server needs a coffee break ☕',
            'computer_tired' => 'Even computers get tired after so many visits! 💻😴',
            'quality_over_quantity' => 'Quality over quantity: we prefer to treat well! 🩺',
            'sterilizing_server' => 'We are sterilizing the server... 🧼💻',
        ],
        'tips' => [
            'book_appointments' => '💡 Tip: Book appointments to avoid queues',
            'best_hours' => '⏰ Less crowded hours: early morning or late afternoon',
            'use_app' => '📱 Use our app for faster checkups',
            'plan_ahead' => '🗓️ Plan control visits well in advance',
            'newsletter' => '💌 Subscribe to newsletter for priority updates',
        ],
        'trivia' => [
            'question_1' => [
                'question' => 'How many times a day should you brush your teeth?',
                'options' => ['1 time', '2 times', '3 times', '4 times'],
                'explanation' => 'Twice a day is ideal for good oral hygiene!',
            ],
            'question_2' => [
                'question' => 'During pregnancy, gums can be more:',
                'options' => ['Dry', 'Sensitive', 'Hard', 'Cold'],
                'explanation' => 'Gums during pregnancy become more sensitive due to hormonal changes.',
            ],
            'question_3' => [
                'question' => 'What is the most important mineral for teeth?',
                'options' => ['Iron', 'Calcium', 'Magnesium', 'Zinc'],
                'explanation' => 'Calcium is essential for maintaining strong and healthy teeth!',
            ],
        ],
        'alerts' => [
            'popularity_alert' => '🩺 Alert: Too much popularity can cause virtual queues!',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Components - Feature Sections
    |--------------------------------------------------------------------------
    */
    'components' => [
        'feature_sections' => [
            'discover_more' => 'Discover more',
        ],
        'stats' => [
            'medical_impact' => [
                'patronage' => 'Patronage',
                'ministry_of_health' => 'Ministry of Health',
                'integrated_with' => 'Integrated with',
                'national_health_service' => 'National Health Service',
                'certification' => 'Certification',
                'iso_9001_2015' => 'ISO 9001:2015',
            ],
        ],
        'certifications' => [
            'subtitle' => 'The quality of our services is guaranteed by prestigious national and international certifications',
            'iso_9001' => [
                'description' => 'Quality management system compliant with the most rigorous international standards',
            ],
            'gdpr_compliance' => [
                'description' => 'Compliance with European regulations on the protection of personal and health data',
            ],
            'reliability' => 'Reliability',
            'credibility_breakdown' => 'Credibility Breakdown',
            'certified_quality' => 'Certified quality',
        ],
        'privacy_principles' => [
            'subtitle' => 'Every process is designed to maximize your privacy and security',
        ],
        'cta' => [
            'simple' => [
                'text' => 'Discover more',
            ],
            'privacy_contact' => [
                'subtitle' => 'Our team is here to help you with any questions',
            ],
        ],
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Components - Calendar
    |--------------------------------------------------------------------------
    */
    'calendar' => [
        'month_names' => [
            'January' => 'January',
            'February' => 'February',
            'March' => 'March',
            'April' => 'April',
            'May' => 'May',
            'June' => 'June',
            'July' => 'July',
            'August' => 'August',
            'September' => 'September',
            'October' => 'October',
            'November' => 'November',
            'December' => 'December',
        ],
        'day_abbreviations' => [
            'M' => 'Mon',
            'T' => 'Tue',
            'W' => 'Wed',
            'Th' => 'Thu',
            'F' => 'Fri',
            'S' => 'Sat',
            'Su' => 'Sun',
        ],
        'upcoming_events' => 'Upcoming events',
        'no_events' => 'No scheduled events',
        'view_house' => 'View house with real estate agent',
        'bank_meeting' => 'Meeting with bank manager',
    ],
];
