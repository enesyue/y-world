<?php

namespace App\Navigation;

/**!
 * Breadcrumb
 */

class Breadcrumb
{
    private static $breadcrumb;

    public $show_on_home = false;


    public function __construct()
    {
        if (!self::$breadcrumb) {
            $this->buildBreadcrumb();
        }
    }

    public function buildBreadcrumb()
    {
        if ($this->show_on_home == false) {
            if (get_option('page_on_front') == get_the_ID()) {
                return;
            }
        }

        $breadcrumb = $this->getByType();
        if (!$breadcrumb) {
            return;
        }


        $breadcrumb = array_reverse($breadcrumb);

        // remove empty items
        foreach ($breadcrumb as $key => $item) {
            if (empty($item['title'])) {
                unset($breadcrumb[$key]);
            }
        }

        $breadcrumb = array_values($breadcrumb);
        $breadcrumb[count($breadcrumb) - 1]['url'] = null;
        self::$breadcrumb = $breadcrumb;
    }

    private function getBreadcrumbItem($post)
    {
        return [
            'title' => apply_filters('the_title', $post->post_title, $post->ID),
            'url' => get_permalink($post)
        ];
    }
    private function getBreadcrumbItemById($post_id)
    {
        return [
            'title' => get_the_title($post_id),
            'url' => get_permalink($post_id)
        ];
    }
    private function getBreadcrumbCustom($title, $url = null)
    {
        return [
            'title' => $title,
            'url' => $url
        ];
    }
    private function getBreadcrumbTaxonomy($taxonomy)
    {
        $tax = get_taxonomy($taxonomy);
        return [
            'title' => $tax->label,
            'url' => get_bloginfo('url') . '/' . $tax->rewrite['slug']
        ];
    }
    /**
     * Undocumented function
     *
     * @param WP_TERM|int $term
     * @return array
     */
    private function getBreadcrumbTerm($term, $taxonomy = "category")
    {
        if (is_numeric($term)) {
            $term = get_term($term);
        }

        $link = get_term_link($term->term_id, $taxonomy);
        return [
            'title' => $term->name,
            'url' => $link //get_bloginfo('url') . '/' . $tax->rewrite['slug']
        ];
    }

    private function getByType()
    {
        global $post;

        if (is_tax()) {
            $term = get_queried_object();

            if (method_exists($this, 'breadcrumbTaxonomy_' . $term->taxonomy)) {
                return call_user_func([$this, 'breadcrumbTaxonomy_' . $term->taxonomy]);
            }
            return $this->breadcrumbTaxonomy();
        }

        if (is_tag()) {
            return $this->breadcrumbTag();
        }

        if (is_category()) {
            return $this->breadcrumbCategory();
        }

        if (is_archive()) {
            if ($post && $post->post_type && method_exists($this, 'breadcrumbArchive_' . $post->post_type)) {
                return call_user_func([$this, 'breadcrumbArchive_' . $post->post_type]);
            }

            return $this->breadcrumbArchive();
        }
        if ($post) {
            if ($post->post_type == 'page') {
                return $this->breadcrumbPage();
            }
            if ($post->post_type && method_exists($this, 'breadcrumb_' . $post->post_type)) {
                return call_user_func([$this, 'breadcrumb_' . $post->post_type]);
            }

            return $this->breadcrumbPost();
        }

        return null;
    }

    public function breadcrumbPost()
    {
        global $post;
        $breadcrumb[] = $this->getBreadcrumbItem($post);

        // has archive?
        $archive = get_post_type_archive_link($post->post_type);
        if ($archive) {
            $id = url_to_postid($archive);
            $breadcrumb[] = $this->getBreadcrumbItemById($id);
        } else {
            $post_type_obj = get_post_type_object($post->post_type);
            $breadcrumb[] = [
                'title' => $post_type_obj->labels->name,
                'url' => null,
            ];
        }
        return $breadcrumb;
    }
    public function breadcrumbPage()
    {
        global $post;
        $breadcrumb[] = $this->getBreadcrumbItem($post);
        while ($post->post_parent) {
            $post = get_post($post->post_parent);
            $breadcrumb[] = $this->getBreadcrumbItem($post);
        }

        return $breadcrumb;
    }
    public function breadcrumbTag()
    {
        $term = get_queried_object();

        $breadcrumb[] = $this->getBreadcrumbCustom($term->name);
        $breadcrumb[] = $this->getBreadcrumbTaxonomy($term->taxonomy);
        return $breadcrumb;
    }

    public function breadcrumbArchive()
    {
        $obj = get_post_type_object(get_post_type());
        $breadcrumb[] = $this->getBreadcrumbCustom($obj->label);
        // $url = $obj->rewrite['slug'];
        ///print_rr($obj);
        return $breadcrumb;
    }


    public function breadcrumbTaxonomy()
    {
        $term = get_queried_object();

        $breadcrumb[] = $this->getBreadcrumbTerm($term, $term->taxonomy);

        $parents = get_ancestors($term->term_id, $term->taxonomy, 'taxonomy');
        foreach ($parents as $term_id) {
            $breadcrumb[] = $this->getBreadcrumbTerm($term_id, $term->taxonomy);
        }
        return $breadcrumb;

        /*
        $breadcrumb[] = $this->getBreadcrumbCustom($term->name);
        $breadcrumb[] = $this->getBreadcrumbTaxonomy($term->taxonomy);
        return $breadcrumb;*/
    }

    public function breadcrumbTaxonomyProductCategory()
    {
        $breadcrumb = $this->breadcrumbTaxonomy();
        $breadcrumb[] = $this->getBreadcrumbItemById(32);
        return $breadcrumb;
    }


    public function breadcrumbCategory()
    {
        $term = get_queried_object();
        $breadcrumb[] = $this->getBreadcrumbTerm($term, 'category');

        $parents = get_ancestors($term->term_id, 'category', 'taxonomy');
        foreach ($parents as $term_id) {
            $breadcrumb[] = $this->getBreadcrumbTerm($term_id, 'category');
        }
        return $breadcrumb;
    }


    /**
     * PostType Produkte. Suche tiefste Catetory
     *
     * @return void
     */
    public function breadcrumbProduct()
    {
        global $post;
        $breadcrumb[] = $this->getBreadcrumbItem($post);

        $best = null;
        $terms = wp_get_post_terms($post->ID, 'product_category');
        foreach ($terms as $term) {
            $parents = get_ancestors($term->term_id, $term->taxonomy, 'taxonomy');
            if ($best == null || count($parents) > count($best['parents'])) {
                $best['term'] = $term;
                $best['parents'] = $parents;
            }
        }

        // build terms
        $term = $best['term'];
        $parents = $best['parents'];
        $breadcrumb[] = $this->getBreadcrumbTerm($term, $term->taxonomy);
        foreach ($parents as $term_id) {
            $breadcrumb[] = $this->getBreadcrumbTerm($term_id, $term->taxonomy);
        }
        $breadcrumb[] = $this->getBreadcrumbItemById(32);
        return $breadcrumb;
    }



    /**
     * Prints the breadcrumb
     * @param bool $showHomeIcon
     * If the value of $showHomeIcon is equal to true, display a custom home-icon as your default "home"-breacrumb.
     *
     * @return void
     */
    public function print($showHomeIcon = false)
    {
        if (!self::$breadcrumb) {
            return;
        }

        // All elements, which contain the website-hierarchy, are saved within the $links Array as <a></a> elements.
        $links = [];
        foreach (self::$breadcrumb as $item) {
            $html = $item['title'];
            if ($item['url']) {
                $html = '<a ' . (isset($item['id']) ? ' data-id="' . $item['id'] . '"' : '') . ' href="' . esc_url($item['url']) . '" class="text-default fw-normal text-decoration-underline">' . $html . '</a>';
            }

            $links[] = $html;
        }
        if (!$links) {
            return;
        }

        // Count the amount of elements within the generated array
        $rowsLinks = count($links);

        ?>
        <div id="page-breadcrumb">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item <?= (!$links ? 'active' : '') ?>"><a href="<?= get_home_url(); ?>" class="text-default fw-normal"><?= $showHomeIcon ? '<span class="material-symbols-outlined">home</span>' : bloginfo('title') ?></a></li>
                <?php // If total amount of elements within the array is below 3, show every element as a click-able breadcrumb-link. ?>
                    <?php if ($rowsLinks < 3) : ?>
                        <?php foreach ($links as $index => $link) : ?>
                            <li class="breadcrumb-item <?= ($index == $rowsLinks - 1 ? 'active' : '') ?>" <?= ($index == $rowsLinks - 1 ? ' aria-current="page"' : '') ?>><?= $link; ?></li>
                        <?php endforeach; ?>
                        <?php // If the array exceeds 3 elements, hide every other link except for the home-icon, the collapse-span & the last 2 elements of the array.  ?>
                    <?php else : ?>
                        <li id="breadcrumb-collapse" class="breadcrumb-item text-decoration-underline cursor-pointer">...</li>
                        <?php foreach ($links as $index => $link) : ?>
                            <li class="breadcrumb-item <?= ($index < $rowsLinks - 2 ? 'd-none' : '') ?><?= ($index == $rowsLinks - 1 ? ' active' : '') ?>"
                            <?= ($index == $rowsLinks - 1 ? ' aria-current="page"' : '') ?> >
                                <?= $link; ?>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ol>
            </nav>
        </div><?php
    }

    public static function show($showHomeIcon = false)
    {
        $x = new Breadcrumb();
        $x->print($showHomeIcon);
    }
}
