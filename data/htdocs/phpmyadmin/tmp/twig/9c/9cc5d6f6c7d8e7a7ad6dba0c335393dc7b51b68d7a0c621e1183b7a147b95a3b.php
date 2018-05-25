<?php

/* database/designer/edit_delete_pages.twig */
class __TwigTemplate_f991c256f69b9f204f2e3f84a0f5c142fab1ce0967b0585fdc6cc57e78b925e0 extends Twig_Template
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
        echo "<form action=\"db_designer.php\" method=\"post\" name=\"edit_delete_pages\" id=\"edit_delete_pages\" class=\"ajax\">
    ";
        // line 2
        echo PhpMyAdmin\Url::getHiddenInputs(($context["db"] ?? null));
        echo "
    <fieldset id=\"page_edit_delete_options\">
        <input type=\"hidden\" name=\"operation\" value=\"";
        // line 4
        echo twig_escape_filter($this->env, ($context["operation"] ?? null), "html", null, true);
        echo "\" />
        <label for=\"selected_page\">
            ";
        // line 6
        echo twig_escape_filter($this->env, (((($context["operation"] ?? null) == "editPage")) ? (_gettext("Page to open")) : (_gettext("Page to delete"))), "html", null, true);
        echo ":
        </label>
        ";
        // line 8
        $this->loadTemplate("database/designer/page_selector.twig", "database/designer/edit_delete_pages.twig", 8)->display(array("pdfwork" =>         // line 9
($context["pdfwork"] ?? null), "pages" =>         // line 10
($context["pages"] ?? null)));
        // line 12
        echo "    </fieldset>
</form>
";
    }

    public function getTemplateName()
    {
        return "database/designer/edit_delete_pages.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 12,  39 => 10,  38 => 9,  37 => 8,  32 => 6,  27 => 4,  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "database/designer/edit_delete_pages.twig", "C:\\Server\\data\\htdocs\\phpmyadmin\\templates\\database\\designer\\edit_delete_pages.twig");
    }
}
