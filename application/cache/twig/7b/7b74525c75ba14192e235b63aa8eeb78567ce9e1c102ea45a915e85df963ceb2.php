<?php

/* webview/layout/twig/partials/client-header-links.twig */
class __TwigTemplate_0c7259eeb07a60d5b219a05d0d54e2eb4ea90c62d6550451510a9b118b45b69f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<li>
    <a href=\"";
        // line 2
        echo twig_escape_filter($this->env, site_url("jobs-home"), "html", null, true);
        echo "\">
        <i class=\"fa fa-briefcase\" aria-hidden=\"true\"></i> ";
        // line 3
        echo twig_escape_filter($this->env, app_lang("text_app_hire"), "html", null, true);
        echo "
    </a>
</li>
<li>
    <a href=\"";
        // line 7
        echo twig_escape_filter($this->env, site_url("jobs/my-freelancers"), "html", null, true);
        echo "\">  
        <i class=\"fa fa-users\" aria-hidden=\"true\"></i> ";
        // line 8
        echo twig_escape_filter($this->env, app_lang("text_app_my_freelancers"), "html", null, true);
        echo "
    </a>
</li> 
<li>
    <a href=\"";
        // line 12
        echo twig_escape_filter($this->env, site_url("pay/clientpay"), "html", null, true);
        echo "\">
        <i class=\"fa fa-credit-card\" aria-hidden=\"true\"></i>
        ";
        // line 14
        echo twig_escape_filter($this->env, app_lang("text_app_clientpay"), "html", null, true);
        echo "
    </a>
</li>
";
    }

    public function getTemplateName()
    {
        return "webview/layout/twig/partials/client-header-links.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 14,  44 => 12,  37 => 8,  33 => 7,  26 => 3,  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<li>
    <a href=\"{{ site_url('jobs-home') }}\">
        <i class=\"fa fa-briefcase\" aria-hidden=\"true\"></i> {{ app_lang('text_app_hire') }}
    </a>
</li>
<li>
    <a href=\"{{ site_url('jobs/my-freelancers') }}\">  
        <i class=\"fa fa-users\" aria-hidden=\"true\"></i> {{ app_lang('text_app_my_freelancers') }}
    </a>
</li> 
<li>
    <a href=\"{{ site_url('pay/clientpay') }}\">
        <i class=\"fa fa-credit-card\" aria-hidden=\"true\"></i>
        {{ app_lang('text_app_clientpay') }}
    </a>
</li>
", "webview/layout/twig/partials/client-header-links.twig", "C:\\wamp\\www\\winjob\\application\\views\\webview\\layout\\twig\\partials\\client-header-links.twig");
    }
}
