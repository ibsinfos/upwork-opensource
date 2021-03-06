<?php

/* webview/layout/twig/layout.twig */
class __TwigTemplate_3afcc098042bf239eb9d6ca499bc2e0d08453b4d66a7730ada2ee1033d6e468b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'styles' => array($this, 'block_styles'),
            'content' => array($this, 'block_content'),
            'js' => array($this, 'block_js'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
    <head>
        <meta charset=\"utf-8\">
        <meta http-equiv=\"x-ua-compatible\" content=\"ie=edge\">
        ";
        // line 7
        echo "        <title>";
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <meta name=\"description\" content=\"\">
\t<meta name=\"viewport\" content=\"width=device-width,height=device-height, initial-scale=1, user-scalable=no\">
        <link rel=\"apple-touch-icon\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, site_url("assets/apple-touch-icon.png"), "html", null, true);
        echo "\">        
        
        <!-- Block to load common style which can be overrided|extended by a specific page -->
        ";
        // line 13
        $this->displayBlock('styles', $context, $blocks);
        // line 30
        echo "        
    </head>
    <body>
        
        ";
        // line 34
        echo twig_include($this->env, $context, "webview/layout/twig/partials/header.twig");
        echo "
        
        <section class=\"main_area\"  id=\"mid_contant\"  >
            <div class=\"container\">
                
                ";
        // line 40
        echo "                ";
        if (has_flash("error")) {
            // line 41
            echo "                    ";
            echo twig_include($this->env, $context, "webview/layout/twig/partials/flash-errors.twig");
            echo "
                ";
        }
        // line 43
        echo "                
                ";
        // line 45
        echo "                ";
        $this->displayBlock('content', $context, $blocks);
        // line 46
        echo "                
            </div>
        </section>
            
        ";
        // line 50
        echo twig_include($this->env, $context, "webview/layout/twig/partials/footer.twig");
        echo "
        
        
        <script> 
            var site_url   = \"";
        // line 54
        echo twig_escape_filter($this->env, site_url(), "html", null, true);
        echo "\"; 
            var csrf_token = '";
        // line 55
        echo twig_escape_filter($this->env, csrf_token(), "html", null, true);
        echo "';
        </script>
        
        <!-- Block to load common scripts which can be overrided|extended by a specific page  -->
        ";
        // line 59
        $this->displayBlock('js', $context, $blocks);
        // line 76
        echo "        
    </body>
</html>";
    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        echo "HOME";
    }

    // line 13
    public function block_styles($context, array $blocks = array())
    {
        // line 14
        echo "            <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, site_url("assets/css/bootstrap.min.css"), "html", null, true);
        echo "\">
            <link rel=\"stylesheet\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, site_url("assets/css/font-awesome.min.css"), "html", null, true);
        echo "\">
            <link rel=\"stylesheet\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, site_url("assets/css/fonts.css"), "html", null, true);
        echo "\">
            <link rel=\"stylesheet\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, site_url("assets/css/header.css"), "html", null, true);
        echo "\">
            <link rel=\"stylesheet\" href=\"";
        // line 18
        echo twig_escape_filter($this->env, site_url("assets/css/croppic.css"), "html", null, true);
        echo "\">
            <link rel=\"stylesheet\" href=\"";
        // line 19
        echo twig_escape_filter($this->env, site_url("assets/css/footer.css"), "html", null, true);
        echo "\">
            <link rel=\"stylesheet\" href=\"";
        // line 20
        echo twig_escape_filter($this->env, site_url("assets/css/bootstrap-socil.css"), "html", null, true);
        echo "\">
            <link rel=\"stylesheet\" href=\"";
        // line 21
        echo twig_escape_filter($this->env, site_url("assets/css/normalize.css"), "html", null, true);
        echo "\">
            <link rel=\"stylesheet\" href=\"";
        // line 22
        echo twig_escape_filter($this->env, site_url("assets/css/style.css"), "html", null, true);
        echo "\">
            <link rel=\"stylesheet\" href=\"";
        // line 23
        echo twig_escape_filter($this->env, site_url("assets/css/bootstrap-social.css"), "html", null, true);
        echo "\">
            <link href=\"";
        // line 24
        echo twig_escape_filter($this->env, site_url("assets/range/jquery-ui.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
            <link rel='stylesheet' media='screen and (min-width: 0px) and (max-width: 5000px)' href='";
        // line 25
        echo twig_escape_filter($this->env, site_url("assets/css/lg-style.css"), "html", null, true);
        echo "' />
            <link rel='stylesheet' media='screen and (min-width: 0px) and (max-width: 1199px)' href='";
        // line 26
        echo twig_escape_filter($this->env, site_url("assets/css/md-style.css"), "html", null, true);
        echo "' />
            <link rel='stylesheet' media='screen and (min-width: 0px) and (max-width: 991px)' href='";
        // line 27
        echo twig_escape_filter($this->env, site_url("assets/css/sm-style.css"), "html", null, true);
        echo "' />
            <link rel='stylesheet' media='screen and (min-width: 0px) and (max-width: 767px)' href='";
        // line 28
        echo twig_escape_filter($this->env, site_url("assets/css/xs-style.css"), "html", null, true);
        echo "' />
        ";
    }

    // line 45
    public function block_content($context, array $blocks = array())
    {
    }

    // line 59
    public function block_js($context, array $blocks = array())
    {
        // line 60
        echo "            <script src=\"";
        echo twig_escape_filter($this->env, site_url("assets/js/vendor/jquery-2.2.3.min.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 61
        echo twig_escape_filter($this->env, site_url("assets/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
            ";
        // line 63
        echo "            <script src=\"";
        echo twig_escape_filter($this->env, site_url("assets/js/plugins.js"), "html", null, true);
        echo "\"></script>        
            <script src=\"";
        // line 64
        echo twig_escape_filter($this->env, site_url("assets/js/bootstrap-datepicker.js"), "html", null, true);
        echo "\"></script>
            ";
        // line 66
        echo "            <script src=\"";
        echo twig_escape_filter($this->env, site_url("assets/js/main.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 67
        echo twig_escape_filter($this->env, site_url("assets/range/jquery_range.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 68
        echo twig_escape_filter($this->env, site_url("assets/range/jquery-ui.js"), "html", null, true);
        echo "\"> </script>
            <script src=\"";
        // line 69
        echo twig_escape_filter($this->env, site_url("assets/global/vendor/formvalidation/formValidation.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
            <script src=\"";
        // line 70
        echo twig_escape_filter($this->env, site_url("assets/js/reCaptcha2.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
            <script src=\"";
        // line 71
        echo twig_escape_filter($this->env, site_url("assets/global/vendor/formvalidation/framework/bootstrap.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
            ";
        // line 73
        echo "            <script src=\"https://use.fontawesome.com/73754fb9b3.js\"></script>
            <script src=\"";
        // line 74
        echo twig_escape_filter($this->env, site_url("assets/js/vendor/modernizr-2.8.3.min.js"), "html", null, true);
        echo "\"></script>
        ";
    }

    public function getTemplateName()
    {
        return "webview/layout/twig/layout.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  232 => 74,  229 => 73,  225 => 71,  221 => 70,  217 => 69,  213 => 68,  209 => 67,  204 => 66,  200 => 64,  195 => 63,  191 => 61,  186 => 60,  183 => 59,  178 => 45,  172 => 28,  168 => 27,  164 => 26,  160 => 25,  156 => 24,  152 => 23,  148 => 22,  144 => 21,  140 => 20,  136 => 19,  132 => 18,  128 => 17,  124 => 16,  120 => 15,  115 => 14,  112 => 13,  106 => 7,  100 => 76,  98 => 59,  91 => 55,  87 => 54,  80 => 50,  74 => 46,  71 => 45,  68 => 43,  62 => 41,  59 => 40,  51 => 34,  45 => 30,  43 => 13,  37 => 10,  30 => 7,  23 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html lang=\"en\">
    <head>
        <meta charset=\"utf-8\">
        <meta http-equiv=\"x-ua-compatible\" content=\"ie=edge\">
        {# Specific page can set its own title #}
        <title>{% block title %}HOME{% endblock %}</title>
        <meta name=\"description\" content=\"\">
\t<meta name=\"viewport\" content=\"width=device-width,height=device-height, initial-scale=1, user-scalable=no\">
        <link rel=\"apple-touch-icon\" href=\"{{ site_url(\"assets/apple-touch-icon.png\") }}\">        
        
        <!-- Block to load common style which can be overrided|extended by a specific page -->
        {% block styles %}
            <link rel=\"stylesheet\" href=\"{{ site_url(\"assets/css/bootstrap.min.css\") }}\">
            <link rel=\"stylesheet\" href=\"{{ site_url(\"assets/css/font-awesome.min.css\") }}\">
            <link rel=\"stylesheet\" href=\"{{ site_url(\"assets/css/fonts.css\") }}\">
            <link rel=\"stylesheet\" href=\"{{ site_url(\"assets/css/header.css\") }}\">
            <link rel=\"stylesheet\" href=\"{{ site_url(\"assets/css/croppic.css\") }}\">
            <link rel=\"stylesheet\" href=\"{{ site_url(\"assets/css/footer.css\") }}\">
            <link rel=\"stylesheet\" href=\"{{ site_url(\"assets/css/bootstrap-socil.css\") }}\">
            <link rel=\"stylesheet\" href=\"{{ site_url(\"assets/css/normalize.css\") }}\">
            <link rel=\"stylesheet\" href=\"{{ site_url(\"assets/css/style.css\") }}\">
            <link rel=\"stylesheet\" href=\"{{ site_url(\"assets/css/bootstrap-social.css\") }}\">
            <link href=\"{{ site_url(\"assets/range/jquery-ui.css\") }}\" rel=\"stylesheet\">
            <link rel='stylesheet' media='screen and (min-width: 0px) and (max-width: 5000px)' href='{{ site_url(\"assets/css/lg-style.css\") }}' />
            <link rel='stylesheet' media='screen and (min-width: 0px) and (max-width: 1199px)' href='{{ site_url(\"assets/css/md-style.css\") }}' />
            <link rel='stylesheet' media='screen and (min-width: 0px) and (max-width: 991px)' href='{{ site_url(\"assets/css/sm-style.css\") }}' />
            <link rel='stylesheet' media='screen and (min-width: 0px) and (max-width: 767px)' href='{{ site_url(\"assets/css/xs-style.css\") }}' />
        {% endblock %}
        
    </head>
    <body>
        
        {{ include('webview/layout/twig/partials/header.twig') }}
        
        <section class=\"main_area\"  id=\"mid_contant\"  >
            <div class=\"container\">
                
                {# display flash error if exists. #}
                {% if has_flash('error') %}
                    {{ include('webview/layout/twig/partials/flash-errors.twig')  }}
                {% endif %}
                
                {# Block to load content page #}
                {% block content %}{% endblock %}
                
            </div>
        </section>
            
        {{ include('webview/layout/twig/partials/footer.twig') }}
        
        
        <script> 
            var site_url   = \"{{ site_url() }}\"; 
            var csrf_token = '{{ csrf_token() }}';
        </script>
        
        <!-- Block to load common scripts which can be overrided|extended by a specific page  -->
        {% block js %}
            <script src=\"{{ site_url(\"assets/js/vendor/jquery-2.2.3.min.js\") }}\"></script>
            <script src=\"{{ site_url(\"assets/js/bootstrap.min.js\") }}\"></script>
            {# plugins should only be loaded on development environment #}
            <script src=\"{{ site_url(\"assets/js/plugins.js\") }}\"></script>        
            <script src=\"{{ site_url(\"assets/js/bootstrap-datepicker.js\") }}\"></script>
            {# main is for setup datapicker and slider_range #}
            <script src=\"{{ site_url(\"assets/js/main.js\") }}\"></script>
            <script src=\"{{ site_url(\"assets/range/jquery_range.js\") }}\"></script>
            <script src=\"{{ site_url(\"assets/range/jquery-ui.js\") }}\"> </script>
            <script src=\"{{ site_url(\"assets/global/vendor/formvalidation/formValidation.js\") }}\" type=\"text/javascript\"></script>
            <script src=\"{{ site_url(\"assets/js/reCaptcha2.min.js\") }}\" type=\"text/javascript\"></script>
            <script src=\"{{ site_url(\"assets/global/vendor/formvalidation/framework/bootstrap.js\") }}\" type=\"text/javascript\"></script>
            {# why do we use this js file ? #}
            <script src=\"https://use.fontawesome.com/73754fb9b3.js\"></script>
            <script src=\"{{ site_url(\"assets/js/vendor/modernizr-2.8.3.min.js\") }}\"></script>
        {% endblock %}
        
    </body>
</html>", "webview/layout/twig/layout.twig", "C:\\wamp\\www\\winjob\\application\\views\\webview\\layout\\twig\\layout.twig");
    }
}
