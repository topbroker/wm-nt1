<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class App extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'siteName' => $this->siteName(),
	        'logos' => $this->testimonial_logos(),
	        'testimonial_items' => $this->testimonial_items(),
        ];
    }

    /**
     * Returns the site name.
     *
     * @return string
     */
    public function siteName()
    {
        return get_bloginfo('name', 'display');
    }

    public function testimonial_logos()
    {
    	$logos = get_field('logos', 'options');
    	$logos_arr = [];

    	foreach ($logos as $logo) {
		    $logos_arr[] = wp_get_attachment_image_url($logo, 'medium');
	    }

    	return $logos_arr;
    }

    public function testimonial_items()
    {
    	return get_field('testimonial_items', 'options');
    }
}
