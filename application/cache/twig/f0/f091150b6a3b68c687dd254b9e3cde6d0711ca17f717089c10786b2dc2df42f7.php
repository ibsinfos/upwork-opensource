<?php

/* webview/jobs/twig/my-staff.twig */
class __TwigTemplate_b4c8e0ede79d33d461be2b3f14bcc9b28f4e9fda306695ab0ffb632b16352997 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("webview/layout/twig/layout.twig", "webview/jobs/twig/my-staff.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'styles' => array($this, 'block_styles'),
            'content' => array($this, 'block_content'),
            'js' => array($this, 'block_js'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "webview/layout/twig/layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "  ";
        echo twig_escape_filter($this->env, app_lang("text_job_my_staff"), "html", null, true);
        echo " - Winjob  ";
    }

    // line 5
    public function block_styles($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        $this->displayParentBlock("styles", $context, $blocks);
        echo "
    
    <link rel=\"stylesheet\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, base_url("assets/css/pages/job-common.css"), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, base_url("assets/css/pages/mystaff.css"), "html", null, true);
        echo "\">
";
    }

    // line 12
    public function block_content($context, array $blocks = array())
    {
        // line 13
        echo "    <section id=\"big_header\" class=\"my_staff\">
\t<div class=\"container\">
\t    <div class=\"row \">
\t        <div class=\"col-md-3\">
                    <div class=\"row\">
                        <div class=\"col-md-10 nopadding\">
                            ";
        // line 19
        echo twig_include($this->env, $context, "webview/jobs/partials/job-client-left-menu.twig", array("mystaff" => true), false);
        echo "
                        </div>
                    </div>
                </div>
                <div class=\"col-md-9\">
\t\t   <div class=\"row\">
                        
                        ";
        // line 27
        echo "                        ";
        $context["message"] = sprintf(app_lang("text_job_mystaff_hired"), (isset($context["nb_freelancer_hired"]) ? $context["nb_freelancer_hired"] : null));
        // line 28
        echo "                        ";
        $context["empty_message"] = app_lang("text_job_mystaff_not_hired");
        // line 29
        echo "                        ";
        echo twig_include($this->env, $context, "webview/jobs/partials/job-hirefeebar.twig", array("number" => (isset($context["nb_freelancer_hired"]) ? $context["nb_freelancer_hired"] : null), "message" => (isset($context["message"]) ? $context["message"] : null), "empty_message" => (isset($context["empty_message"]) ? $context["empty_message"] : null)), false);
        echo "
                       
                        ";
        // line 31
        if (array_key_exists("jobs_accepted", $context)) {
            // line 32
            echo "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["jobs_accepted"]) ? $context["jobs_accepted"] : null));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["job"]) {
                // line 33
                echo "                                
                                ";
                // line 35
                echo "                                ";
                $context["page"] = "mystaff";
                // line 36
                echo "                                
                                ";
                // line 38
                echo "                                ";
                $context["chat_receiver_id"] = $this->getAttribute($context["job"], "fuser_id", array());
                // line 39
                echo "                                
                                ";
                // line 41
                echo "                                ";
                $context["job_id_encoded"] = base64_encode($this->getAttribute($context["job"], "job_id", array()));
                // line 42
                echo "                                ";
                $context["fuser_id_encoded"] = base64_encode($this->getAttribute($context["job"], "fuser_id", array()));
                // line 43
                echo "                                ";
                $context["bid_id_encoded"] = base64_encode($this->getAttribute($context["job"], "bid_id", array()));
                // line 44
                echo "                                
                                ";
                // line 46
                echo "                                ";
                $context["job_detail_link"] = ((base_url() . "contracts?fmJob=") . (isset($context["bid_id_encoded"]) ? $context["bid_id_encoded"] : null));
                // line 47
                echo "                                ";
                $context["end_contract_link"] = ((base_url() . "contract/ended?fmJob=") . (isset($context["bid_id_encoded"]) ? $context["bid_id_encoded"] : null));
                // line 48
                echo "                                
                                ";
                // line 50
                echo "                                ";
                $context["specific_btn_template"] = "webview/jobs/partials/job-payment-buttons.twig";
                // line 51
                echo "                                ";
                $context["options_dropdown"] = "webview/jobs/partials/job-staff-dropdown.twig";
                // line 52
                echo "                                ";
                $context["employerStatus"] = $this->getAttribute((isset($context["webuser"]) ? $context["webuser"] : null), "isactive", array());
                // line 53
                echo "
                                ";
                // line 55
                echo "                                ";
                echo twig_include($this->env, $context, "webview/jobs/partials/job-item.twig");
                echo "
                             ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['job'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 57
            echo "                        ";
        }
        // line 58
        echo "                   </div>
                </div>
            </div>
        </div>
    </section>
                        
    ";
        // line 64
        echo twig_include($this->env, $context, "webview/modals/message-conversion-modal.twig");
        echo "
";
    }

    // line 67
    public function block_js($context, array $blocks = array())
    {
        // line 68
        echo "    
    ";
        // line 70
        echo "    <script> var page = 'my-staff'; </script>
    
    <script data-main=\"";
        // line 72
        echo twig_escape_filter($this->env, app_modular_js("winjob"), "html", null, true);
        echo "\" src=\"";
        echo twig_escape_filter($this->env, app_modular_js("lib/require.dev.js"), "html", null, true);
        echo "\"></script>
    
";
    }

    public function getTemplateName()
    {
        return "webview/jobs/twig/my-staff.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  203 => 72,  199 => 70,  196 => 68,  193 => 67,  187 => 64,  179 => 58,  176 => 57,  159 => 55,  156 => 53,  153 => 52,  150 => 51,  147 => 50,  144 => 48,  141 => 47,  138 => 46,  135 => 44,  132 => 43,  129 => 42,  126 => 41,  123 => 39,  120 => 38,  117 => 36,  114 => 35,  111 => 33,  93 => 32,  91 => 31,  85 => 29,  82 => 28,  79 => 27,  69 => 19,  61 => 13,  58 => 12,  52 => 9,  48 => 8,  42 => 6,  39 => 5,  31 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"webview/layout/twig/layout.twig\" %}

{% block title %}  {{ app_lang('text_job_my_staff') }} - Winjob  {% endblock %}

{% block styles %}
    {{ parent() }}
    
    <link rel=\"stylesheet\" href=\"{{ base_url(\"assets/css/pages/job-common.css\") }}\">
    <link rel=\"stylesheet\" href=\"{{ base_url(\"assets/css/pages/mystaff.css\") }}\">
{% endblock %}

{% block content %}
    <section id=\"big_header\" class=\"my_staff\">
\t<div class=\"container\">
\t    <div class=\"row \">
\t        <div class=\"col-md-3\">
                    <div class=\"row\">
                        <div class=\"col-md-10 nopadding\">
                            {{ include('webview/jobs/partials/job-client-left-menu.twig', { mystaff: true }, with_context = false) }}
                        </div>
                    </div>
                </div>
                <div class=\"col-md-9\">
\t\t   <div class=\"row\">
                        
                        {# top message #}
                        {% set message       = app_lang('text_job_mystaff_hired')|format(nb_freelancer_hired) %}
                        {% set empty_message = app_lang('text_job_mystaff_not_hired') %}
                        {{ include('webview/jobs/partials/job-hirefeebar.twig', { number: nb_freelancer_hired, message: message , empty_message: empty_message }, with_context = false ) }}
                       
                        {% if jobs_accepted is defined %}
                            {% for job in jobs_accepted %}
                                
                                {# specific the current page #}
                                {% set page = 'mystaff' %}
                                
                                {# chat receiver id #}
                                {% set chat_receiver_id      = job.fuser_id %}
                                
                                {# specific job and page variable values #}
                                {% set job_id_encoded        = base64_encode(job.job_id) %}
                                {% set fuser_id_encoded      = base64_encode(job.fuser_id) %}
                                {% set bid_id_encoded        = base64_encode(job.bid_id) %}
                                
                                {# set profil_link           = base_url() ~ \"interview?user_id=\" ~ fuser_id_encoded ~ \"&job_id=\" ~ job_id_encoded ~ \"&bid_id=\" ~ bid_id_encoded #}
                                {% set job_detail_link   = base_url() ~ \"contracts?fmJob=\" ~ bid_id_encoded %}
                                {% set end_contract_link = base_url() ~ \"contract/ended?fmJob=\" ~ bid_id_encoded %}
                                
                                {# Specifics partials #}
                                {% set specific_btn_template = 'webview/jobs/partials/job-payment-buttons.twig' %}
                                {% set options_dropdown      = 'webview/jobs/partials/job-staff-dropdown.twig' %}
                                {% set employerStatus =  webuser.isactive %}

                                {# To display profil link pass profil_link variable to job-item named as profil_link #}
                                {{ include('webview/jobs/partials/job-item.twig') }}
                             {% endfor %}
                        {% endif %}
                   </div>
                </div>
            </div>
        </div>
    </section>
                        
    {{ include('webview/modals/message-conversion-modal.twig') }}
{% endblock %}

{% block js %}
    
    {# this variable defines the asset/modular/pages file to load #}
    <script> var page = 'my-staff'; </script>
    
    <script data-main=\"{{ app_modular_js(\"winjob\") }}\" src=\"{{ app_modular_js(\"lib/require.dev.js\") }}\"></script>
    
{% endblock %}
", "webview/jobs/twig/my-staff.twig", "C:\\wamp\\www\\winjob\\application\\views\\webview\\jobs\\twig\\my-staff.twig");
    }
}
