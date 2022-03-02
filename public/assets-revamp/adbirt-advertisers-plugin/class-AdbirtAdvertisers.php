<?php

/**
 * @package adbirt-advertisers
 * @version 1.0.0
 */

$is_debug_mode = false;

/**
 * For Adbirt
 *
 * @class
 */
class AdbirtAdvertisers
{

    public function __construct()
    {
        add_filter('wp_enqueue_scripts', array($this, 'register_css_and_js'));
        // add_filter('the_content', array($this, 'add_advertisers_js_filter'), 1);

        add_shortcode('adbirt-landing-page-tracker', array($this, 'adbirt_landing_page_tracker_shortcode'));
        add_shortcode('adbirt-success-page-tracker', array($this, 'adbirt_success_page_tracker_shortcode'));
        // 
        add_shortcode('adbirt-download-link', array($this, 'adbirt_download_button_shortcode'));
        // 
        add_shortcode('adbirt-async-form-submit', array($this, 'adbirt_async_form_submit'));
        add_shortcode('adbirt-redirect-form-submit-init', array($this, 'adbirt_redirect_form_submit_init'));
        add_shortcode('adbirt-redirect-form-submit-success', array($this, 'adbirt_redirect_form_success'));
        add_shortcode('adbirt-payment-init', array($this, 'adbirt_payment_init'));
        add_shortcode('adbirt-payment-success', array($this, 'adbirt_payment_success'));

        return $this;
    }

    public function adbirt_download_button_shortcode($attributes = array(), $content = '')
    {

        $attrs = shortcode_atts(
            array(
                'href' => '',
                'download' => null
            ),
            $attributes
        );

        $unique_id = 'adbirt-' . $this->generate_random_string();

        ob_start();
?>
        <a id="<?php echo $unique_id; ?>" href="<?php echo $attrs['href'] ?>" <?php echo isset($attrs['download']) ? 'download="' . $attrs['download'] . '"' : ''; ?>>
            <button class="button btn adbirt-btn">
                <?php echo $content; ?>
            </button>
        </a>
        <script>
            (() => {
                const AB = window.adbirtNoConflict();

                AB.download("<?php echo $unique_id; ?>")
            })();
        </script>
    <?php
        return ob_get_clean();
    }

    public function adbirt_async_form_submit_shortcode($attributes = array(), $content = '')
    {
        return $this->adbirt_js_snippets('adbirt_async_form_submit');
    }

    public function adbirt_redirect_form_submit_init_shortcode($attributes = array(), $content = '')
    {
        return $this->adbirt_js_snippets('adbirt_redirect_form_submit_init');
    }

    public function adbirt_landing_page_tracker_shortcode($attributes = array(), $content = '')
    {
        return $this->adbirt_js_snippets('adbirt_redirect_form_submit_init');
    }

    public function adbirt_redirect_form_success_shortcode($attributes = array(), $content = '')
    {
        return $this->adbirt_js_snippets('adbirt_redirect_form_success');
    }

    public function adbirt_success_page_tracker_shortcode($attributes = array(), $content = '')
    {
        return $this->adbirt_js_snippets('adbirt_redirect_form_success');
    }

    public function adbirt_payment_init_shortcode($attributes = array(), $content = '')
    {
        return $this->adbirt_js_snippets('adbirt_payment_init');
    }

    public function adbirt_payment_success($attributes = array(), $content = '')
    {
        return $this->adbirt_js_snippets('adbirt_payment_success');
    }

    public function adbirt_js_snippets($snippet_type)
    {
        $snippet_types = array(
            'adbirt_async_form_submit' => 'AB.asyncFormSubmit();',
            'adbirt_redirect_form_submit_init' => 'AB.redirectFormSubmitInit();',
            'adbirt_redirect_form_success' => 'AB.redirectFormSubmit();',
            'adbirt_payment_init' => 'AB.paymentPageInit();',
            'adbirt_payment_success' => 'AB.paymentSuccessPageConsume();'
        );

        $snippet = $snippet_types[$snippet_type];

        ob_start();
    ?>
        <script>
            (async () => {
                const AB = window.adbirtNoConflict();

                return await <?php echo $snippet; ?>
            })();
        </script>
<?php
        return ob_get_clean();
    }


    public function generate_random_string($length = 5)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString . '_' . time();
    }


    // public function add_advertisers_js_filter($content)
    // {
    //     global $wp;

    //     $url_query_vars = $wp->query_vars;

    //     unset($url_query_vars['page']);
    //     unset($url_query_vars['pagename']);
    //     unset($url_query_vars['name']);

    //     // $req_url = add_query_arg($wp->query_vars, home_url($wp->request));
    //     $req_url = home_url(add_query_arg($url_query_vars, $wp->request));
    //     $req_url_encoded = urlencode($req_url);

    //     foreach (array('landing', 'success') as $index => $mode) {

    //         $res = wp_safe_remote_get("https://adbirt.com/api/check-if-url-is-valid-campaign?url_in_question=$req_url_encoded&url_type=$mode");
    //         $body = json_decode($res['body'], true);

    //         $is_valid = boolval($body['is_valid']);

    //         if ($is_valid) {
    //             $content .= do_shortcode("[adbirt-$mode-page-tracker]");
    //         } else {
    //             // not a campaign page
    //         }

    //         // $content .= "<br><p>url is: $req_url<p><br>";
    //     }

    //     return $content;
    // }

    public function register_css_and_js()
    {
        $this->register_css();
        $this->register_js();
    }

    public function register_css()
    {
        // 
    }

    public function register_js()
    {
        global $is_debug_mode;

        $adbirt_js_path = $is_debug_mode ? trailingslashit(plugin_dir_url(__FILE__)) . 'assets/js/adbirt.js' : 'https://adbirt.com/public/js/adbirt.js';
        wp_enqueue_script('adbirt-advertisers', $adbirt_js_path, false, strval(filemtime(trailingslashit(plugin_dir_path(__FILE__)) . 'assets/js/adbirt.js')), false);
    }
}
