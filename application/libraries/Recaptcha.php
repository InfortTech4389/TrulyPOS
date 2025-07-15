<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recaptcha {

    private $CI;
    private $site_key;
    private $secret_key;

    public function __construct()
    {
        $this->CI =& get_instance();
        
        // reCAPTCHA credentials
        $this->site_key = '6Lf9NoQrAAAAAP_zS9eH7j-ErauorwlNpKGAZaDp';
        $this->secret_key = '6Lf9NoQrAAAAABPk65qgH9LcVt3V7ZM21O1wd_lE';
    }

    /**
     * Get reCAPTCHA site key
     */
    public function get_site_key()
    {
        return $this->site_key;
    }

    /**
     * Generate reCAPTCHA widget HTML
     */
    public function get_widget($theme = 'light', $size = 'normal')
    {
        $html = '<div class="g-recaptcha" data-sitekey="' . $this->site_key . '" data-theme="' . $theme . '" data-size="' . $size . '"></div>';
        return $html;
    }

    /**
     * Get reCAPTCHA script tag
     */
    public function get_script_tag()
    {
        return '<script src="https://www.google.com/recaptcha/api.js" async defer></script>';
    }

    /**
     * Verify reCAPTCHA response
     */
    public function verify($response = null)
    {
        if ($response === null) {
            $response = $this->CI->input->post('g-recaptcha-response');
        }

        if (empty($response)) {
            return false;
        }

        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = [
            'secret' => $this->secret_key,
            'response' => $response,
            'remoteip' => $this->CI->input->ip_address()
        ];

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query($data),
            CURLOPT_TIMEOUT => 30,
            CURLOPT_USERAGENT => 'TrulyPOS/1.0'
        ]);

        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if ($httpCode !== 200) {
            return false;
        }

        $result = json_decode($response, true);
        return isset($result['success']) && $result['success'] === true;
    }

    /**
     * Get reCAPTCHA error message
     */
    public function get_error_message()
    {
        return 'Please verify that you are not a robot.';
    }

    /**
     * Get inline JavaScript for form validation
     */
    public function get_validation_js($form_id)
    {
        return "
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('{$form_id}');
            if (form) {
                form.addEventListener('submit', function(e) {
                    const recaptchaResponse = grecaptcha.getResponse();
                    if (recaptchaResponse.length === 0) {
                        e.preventDefault();
                        alert('Please complete the reCAPTCHA verification.');
                        return false;
                    }
                });
            }
        });
        </script>";
    }
}
