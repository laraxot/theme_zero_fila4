<?php

declare(strict_types=1);

return [
    'title' => 'Send Us a Message',
    'subtitle' => 'Fill out the form to receive personalized support. We will respond within 2 business hours.',
    
    'form' => [
        'priority' => [
            'label' => 'Priority Level',
            'low' => 'Low',
            'normal' => 'Normal',
            'high' => 'High',
        ],
        'service_type' => [
            'label' => 'Request Type',
            'general' => 'General Information',
            'appointment' => 'Appointment Booking',
            'billing' => 'Billing',
            'other' => 'Other',
        ],
        'fields' => [
            'full_name' => 'Full Name',
            'email' => 'Email Address',
            'phone' => 'Phone Number',
            'message' => 'Your Message',
        ],
        'submit' => 'Send Request',
        'submitting' => 'Sending...',
        'success' => [
            'title' => 'Message Sent!',
            'message' => 'Thank you for contacting us. We have received your request and will get back to you as soon as possible.',
            'button' => 'Send Another Message',
        ],
        'error' => [
            'title' => 'Error',
            'message' => 'An error occurred while sending your message. Please try again later or contact us by phone.',
            'button' => 'Try Again',
        ],
    ],
    
    'benefits' => [
        'title' => 'Benefits of Our Support',
        'items' => [
            [
                'title' => 'Quick Response',
                'description' => 'Our team will respond to your request within 2 business hours.',
            ],
            [
                'title' => 'Specialized Support',
                'description' => 'Our qualified staff is ready to assist you with any questions.',
            ],
            [
                'title' => 'Data Security',
                'description' => 'Your personal information is protected and managed with respect for privacy.',
            ],
        ],
    ],
    
    'methods' => [
        'title' => 'Other Ways to Contact Us',
        'phone' => [
            'title' => 'Call Us',
            'description' => 'Mon-Sat 8:00 AM - 7:00 PM',
        ],
        'emergency' => [
            'title' => 'Emergency',
            'description' => '24/7 always available',
        ],
        'email' => [
            'title' => 'Email',
            'description' => 'Response within 2 hours',
        ],
    ],
    
    'contact_info' => [
        'title' => 'Contact Information',
        'email' => 'Email',
        'phone' => 'Phone',
        'hours' => 'Opening Hours',
        'address' => 'Address',
    ],
];
