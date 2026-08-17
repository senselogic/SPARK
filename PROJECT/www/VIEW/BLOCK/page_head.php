<?php
    $meta_base_url = 'https://www.spark-project.com';
    $meta_title = 'Home';
    $meta_description = '';
    $meta_image_path = '/favicon-512x512.png';
    $meta_author = 'Spark Project';
    $meta_business_url = $meta_base_url;
    $meta_business_name = 'Spark Project';
    $meta_business_description = 'Your tourism partner in Brussels';
    $meta_street_address = 'Atomium Place 1';
    $meta_postal_code = '1020';
    $meta_city_name = 'Brussels';
    $meta_country_name = 'Belgium';
    $meta_country_code = 'BE';
    $meta_latitude = '50.89472';
    $meta_longitude = '4.34111';
    $meta_radius = '50000';
    $meta_area_array =
        [
            [ 'City', 'Brussels' ],
            [ 'Country', 'Belgium' ],
            [ 'Country', 'Germany' ],
            [ 'Country', 'France' ],
            [ 'Country', 'Netherlands' ]
        ];
    $meta_offer_name = 'Touristic Services';
    $meta_service_array =
        [
            [ 'Touristic Visit', 'Explore the iconic Atomium and enjoy breathtaking views of Brussels' ],
            [ 'Gift Shop', 'Buy unique souvenirs and Atomium-themed gifts' ],
            [ 'Restaurant', 'Savor Belgian cuisine with a panoramic view at the Atomium Restaurant' ],
            [ 'Exhibitions', 'Discover fascinating permanent and temporary exhibitions inside the spheres' ],
            [ 'Guided Tours', 'Join a guided tour to learn about the history, architecture, and symbolism of the Atomium' ],
            [ 'Events', 'Host or attend cultural events, workshops, and private receptions' ],
            [ 'Education', 'Take part in educational programs for schools and student groups' ],
            [ 'Tickets', 'Buy your entry tickets or combined passes online for convenience' ],
            [ 'Accessibility', 'Find visitor information for accessibility and special assistance' ],
            [ 'Photo Gallery', 'Browse photos of the Atomium and panoramic views of Brussels' ],
            [ 'Opening Hours', 'Check current visiting hours and closing days before your visit' ],
            [ 'Getting There', 'See directions, public transport, and parking information' ],
            [ 'Contact', 'Get in touch with the Atomium team for inquiries and group bookings' ]
        ];
    $meta_contact_phone = '+32 2 456 78 90';
    $meta_contact_email = 'contact@spark-project.com';
    $meta_contact_array =
        [
            [
                'Visitor Management',
                'Mickey Mouse',
                '+32 2 456 78 90',
                'booking@atomium.be'
            ],
            [
                'Shop Management',
                'Donald Duck',
                '+32 2 456 78 90',
                'shop@atomium.be'
            ]
        ];
    $meta_schedule_array =
        [
            [
                [
                    'Monday',
                    'Tuesday',
                    'Wednesday',
                    'Thursday',
                    'Friday',
                    'Saturday',
                    'Sunday'
                ],
                '09:00',
                '18:00',
                '',
                ''
            ]
        ];
    $meta_page_url_array =
        [
            'https://www.facebook.com/spark-project',
            'https://www.linkedin.com/spark-project'
        ];
    $meta_faq_array =
        [
            [ "What are the Atomium’s opening hours?", "The Atomium is open every day from 10:00 to 18:00, with the last admission at 17:30." ],
            [ "Where is the Atomium located?", "The Atomium is located at Square de l'Atomium, 1020 Brussels, Belgium, near Heysel/Heizel metro station." ],
            [ "How can I buy tickets for the Atomium?", "You can buy tickets online through the official website at https://atomium.be or at the on-site ticket counter." ],
            [ "Is the Atomium accessible for people with reduced mobility?", "Yes. The Atomium provides lifts and accessible facilities for visitors with reduced mobility, though some areas may have limited access." ],
            [ "Does the Atomium have a restaurant?", "Yes, the Atomium has a panoramic restaurant located in the upper sphere, serving Belgian and seasonal dishes." ],
            [ "Are there exhibitions inside the Atomium?", "Yes. The Atomium hosts a permanent exhibition about its history and architecture, as well as temporary art and design exhibitions." ],
            [ "Is there parking available near the Atomium?", "Yes. Paid parking is available near the Atomium, and additional parking spaces can be found around the Heysel area." ]
        ];

    $route = $this->Route;
    $meta_page_url = $route;

    if ( $route === 'home' )
    {
        $meta_page_url = '';
    }

    if ( isset( $this->PageByRouteMap[ $route ] ) )
    {
        $page = $this->PageByRouteMap[ $route ];

        $meta_title = GetTranslatedText( $page->MetaTitle, $this->LanguageCode );
        $meta_description = GetTranslatedText( $page->MetaDescription, $this->LanguageCode );
        $meta_image_path = GetTranslatedText( $page->MetaImagePath, $this->LanguageCode );

        if ( $meta_image_path === '' )
        {
            $meta_image_path = '/static/image/home/heading.avif';
        }
    }

    if ( !HasPrefix( $meta_image_path, 'http' ) )
    {
        $meta_image_path = $meta_base_url . $meta_image_path;
    }

    if ( !HasPrefix( $meta_page_url, 'http' ) )
    {
        if ( $this->LanguageCode === DefaultLanguageCode )
        {
            if ( $meta_page_url === '' )
            {
                $meta_page_url = $meta_base_url;
            }
            else
            {
                $meta_page_url = $meta_base_url . '/' . $meta_page_url;
            }
        }
        else
        {
            $meta_page_url = $meta_base_url . '/' . $this->LanguageCode . '/' . $meta_page_url;
        }
    }

    $meta_page_url = RemoveSuffix( $meta_page_url, '/' );
?>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1"/>
<meta name="title" content="<?php echo htmlspecialchars( $meta_title ); ?> | Spark Project"/>
<meta name="description" content="<?php echo htmlspecialchars( $meta_description ); ?>"/>
<meta name="author" content="<?php echo htmlspecialchars( $meta_author ); ?>">
<meta name="geo.region" content="<?php echo htmlspecialchars( $meta_country_code ); ?>"/>
<meta name="geo.placename" content="<?php echo htmlspecialchars( $meta_city_name ); ?>"/>
<meta name="geo.position" content="<?php echo htmlspecialchars( $meta_latitude ); ?>;<?php echo htmlspecialchars( $meta_longitude ); ?>"/>
<meta name="ICBM" content="<?php echo htmlspecialchars( $meta_latitude ); ?>, <?php echo htmlspecialchars( $meta_longitude ); ?>"/>
<meta name="format-detection" content="telephone=no"/>
<meta name="mobile-web-app-capable" content="yes"/>
<meta name="mobile-web-app-status-bar-style" content="black"/>
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="apple-mobile-web-app-status-bar-style" content="black"/>
<meta name="theme-color" content="#FFFFFF"/>
<meta name="msapplication-config" content="/browserconfig.xml"/>
<meta name="msapplication-TileColor" content="#FFFFFF"/>
<meta name="msapplication-TileImage" content="/favicon-512x512.png"/>
<meta name="twitter:site" content="@sparkproject">
<meta name="twitter:creator" content="@sparkproject">
<meta name="twitter:card" content="summary_large_image"/>
<meta name="twitter:title" content="<?php echo htmlspecialchars( $meta_title ); ?> | Spark Project"/>
<meta name="twitter:description" content="<?php echo htmlspecialchars( $meta_description ); ?>"/>
<meta name="twitter:image" content="<?php echo htmlspecialchars( $meta_image_path ); ?>.meta.jpg"/>
<meta property="og:type" content="website"/>
<meta property="og:site_name" content="Spark Project"/>
<meta property="og:title" content="<?php echo htmlspecialchars( $meta_title ); ?> | Spark Project"/>
<meta property="og:description" content="<?php echo htmlspecialchars( $meta_description ); ?>"/>
<meta property="og:url" content="<?php echo htmlspecialchars( $meta_page_url ); ?>"/>
<meta property="og:image" content="<?php echo htmlspecialchars( $meta_image_path ); ?>.meta.jpg"/>
<meta property="og:image:width" content="1200"/>
<meta property="og:image:height" content="630"/>
<meta property="og:image:alt" content="<?php echo htmlspecialchars( $meta_title ); ?>"/>
<meta property="og:locale" content="<?php echo htmlspecialchars( $this->LanguageCode ); ?>"/>
<?php foreach ( LanguageCodeArray as $meta_language_code ) { ?>
    <?php if ( $meta_language_code !== $this->LanguageCode ) { ?>
        <meta property="og:locale:alternate" content="<?php echo htmlspecialchars( $meta_language_code ); ?>"/>
    <?php } ?>
<?php } ?>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WebPage",
    "name": <?php echo GetJsonText( $meta_title . ' | Spark Project' ); ?>,
    "description": <?php echo GetJsonText( $meta_description ); ?>,
    "image": <?php echo GetJsonText( $meta_image_path . '.meta.jpg' ); ?>,
    "url": <?php echo GetJsonText( $meta_page_url ); ?>
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "LocalBusiness",
    "name": <?php echo GetJsonText( $meta_business_name ); ?>,
    "description": <?php echo GetJsonText( $meta_business_description ); ?>,
    "url": <?php echo GetJsonText( $meta_business_url ); ?>,
    "address": {
        "@type": "PostalAddress",
        "streetAddress": <?php echo GetJsonText( $meta_street_address ); ?>,
        "addressCountry": <?php echo GetJsonText( $meta_country_code ); ?>,
        "addressLocality": <?php echo GetJsonText( $meta_city_name ); ?>
    },
    "geo": {
        "@type": "GeoCoordinates",
        "latitude": <?php echo GetJsonText( $meta_latitude ); ?>,
        "longitude": <?php echo GetJsonText( $meta_longitude ); ?>
    },
    "serviceArea": {
        "@type": "GeoCircle",
        "geoMidpoint": {
            "@type": "GeoCoordinates",
            "latitude": <?php echo GetJsonText( $meta_latitude ); ?>,
            "longitude": <?php echo GetJsonText( $meta_longitude ); ?>
        },
        "geoRadius": <?php echo GetJsonText( $meta_radius ); ?>
    },
    "areaServed": [
    <?php foreach ( $meta_area_array as $meta_area_index => $meta_area ) { ?>
        {
            "@type": <?php echo GetJsonText( $meta_area[ 0 ] ); ?>,
            "name": <?php echo GetJsonText( $meta_area[ 1 ] ); ?>
        }<?php echo ( $meta_area_index + 1 < count( $meta_area_array ) ) ? ',' : ''; ?>
    <?php } ?>
    ],
    "telephone": <?php echo GetJsonText( $meta_contact_phone ); ?>,
    "email": <?php echo GetJsonText( $meta_contact_email ); ?>,
    "contactPoint": [
    <?php foreach ( $meta_contact_array as $meta_contact_index => $meta_contact ) { ?>
        {
            "@type": "ContactPoint",
            "contactType": <?php echo GetJsonText( $meta_contact[ 0 ] ); ?>,
            "name": <?php echo GetJsonText( $meta_contact[ 1 ] ); ?>,
            "telephone": <?php echo GetJsonText( $meta_contact[ 2 ] ); ?>,
            "email": <?php echo GetJsonText( $meta_contact[ 3 ] ); ?>
        }<?php echo ( $meta_contact_index + 1 < count( $meta_contact_array ) ) ? ',' : ''; ?>
    <?php } ?>
    ],
    "openingHoursSpecification": [
    <?php foreach ( $meta_schedule_array as $meta_schedule_index => $meta_schedule ) { ?>
        {
            "@type": "OpeningHoursSpecification",
            "dayOfWeek": [
                "<?php echo JoinArray( $meta_schedule[ 0 ], '", "' ); ?>"
            ],
            "opens": <?php echo GetJsonText( $meta_schedule[ 1 ] ); ?>,
            "closes": <?php echo GetJsonText( $meta_schedule[ 2 ] ); ?><?php if ( $meta_schedule[ 3 ] !== '' ) { ?>,
            "validFrom": <?php echo GetJsonText( $meta_schedule[ 3 ] ); ?>,
            "validThrough": <?php echo GetJsonText( $meta_schedule[ 4 ] ); ?>
            <?php } ?>
        }<?php echo ( $meta_schedule_index + 1 < count( $meta_schedule_array ) ) ? ',' : ''; ?>
    <?php } ?>
    ],
    "hasOfferCatalog": {
        "@type": "OfferCatalog",
        "name": <?php echo GetJsonText( $meta_offer_name ); ?>,
        "itemListElement": [
            <?php foreach ( $meta_service_array as $meta_service_index => $meta_service ) { ?>
            {
                "@type": "Offer",
                "itemOffered": {
                    "@type": "Service",
                    "name": <?php echo GetJsonText( $meta_service[ 0 ] ); ?>,
                    "description": <?php echo GetJsonText( $meta_service[ 1 ] ); ?>
                }
            }<?php echo ( $meta_service_index + 1 < count( $meta_service_array ) ) ? ',' : ''; ?>
            <?php } ?>
        ]
    },
    "sameAs": [
            "<?php echo JoinArray( $meta_page_url_array, '", "' ); ?>"
    ]
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        <?php foreach ( $meta_faq_array as $meta_faq_index => $meta_faq ) { ?>
        {
            "@type": "Question",
            "name": <?php echo GetJsonText( $meta_faq[ 0 ] ); ?>,
            "acceptedAnswer": {
                "@type": "Answer",
                "text": <?php echo GetJsonText( $meta_faq[ 1 ] ); ?>
            }
        }<?php echo ( $meta_faq_index + 1 < count( $meta_faq_array ) ) ? ',' : ''; ?>
    <?php } ?>
    ]
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        {
            "@type": "ListItem",
            "position": 1,
            "name": <?php echo GetJsonText( $meta_title ); ?>,
            "item": <?php echo GetJsonText( $meta_page_url ); ?>
        }
    ]
}
</script>
<title><?php echo htmlspecialchars( $meta_title ); ?> | Spark Project</title>
<link rel="canonical" href="<?php echo htmlspecialchars( $meta_page_url ); ?>">
<?php foreach ( LanguageCodeArray as $meta_language_code ) { ?>
    <?php if ( $meta_language_code === DefaultLanguageCode ) { ?>
        <link rel="alternate" hreflang="x-default" href="<?php echo htmlspecialchars( $meta_base_url ); ?>/<?php echo htmlspecialchars( $route ); ?>"/>
    <?php } else { ?>
        <link rel="alternate" hreflang="<?php echo htmlspecialchars( $meta_language_code ); ?>" href="<?php echo htmlspecialchars( $meta_base_url ); ?>/<?php echo htmlspecialchars( $meta_language_code ); ?>/<?php echo htmlspecialchars( $route ); ?>"/>
    <?php } ?>
<?php } ?>
<link rel="icon" href="<?php echo htmlspecialchars( $meta_base_url ); ?>/favicon.ico"/>
<link rel="icon" sizes="512x512" href="<?php echo htmlspecialchars( $meta_base_url ); ?>/favicon-512x512.png"/>
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo htmlspecialchars( $meta_base_url ); ?>/favicon-180x180.png"/>
<link rel="mask-icon" href="<?php echo htmlspecialchars( $meta_base_url ); ?>/favicon.svg" color="#FFFFFF"/>
<link rel="manifest" href="<?php echo htmlspecialchars( $meta_base_url ); ?>/site.webmanifest"/>
<link rel="stylesheet" href="/static/style.css?v=<?php echo VersionTimestamp; ?>"/>
<?php foreach ( $this->ImagePathArray as $image_path ) { ?>
    <link rel="preload" href="<?php echo GetPreloadImagePath( GetTranslatedText( $image_path, $this->LanguageCode ) ); ?>?v=<?php echo VersionTimestamp; ?>" as="image"/>
<?php } ?>
