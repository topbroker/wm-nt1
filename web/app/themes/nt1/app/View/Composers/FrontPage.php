<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class FrontPage extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'front-page',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            //'testimonial_items' => $this->testimonial_items(),
            'posts' => $this->posts(),
            //'clients' => $this->clients(),
        ];
    }

    public function testimonial_items()
    {
        return get_field('testimonial_items');
    }

    public function posts()
    {
        $args = [
            'post_type' => 'post',
            'posts_per_page' => 3,
        ];

        $query = new \WP_Query($args);

        return $query->get_posts();
    }

    public function clients()
    {
        return get_field('clients');
    }
}
