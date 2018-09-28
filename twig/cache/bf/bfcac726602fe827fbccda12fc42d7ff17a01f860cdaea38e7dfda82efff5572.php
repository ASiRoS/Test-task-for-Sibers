<?php

/* index.html.twig */
class __TwigTemplate_380169ca1c2d89bc8316fd8a20b3588e7b411615e34b725823589edd87f24733 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
\t<meta charset=\"UTF-8\">
\t<title>Hi, guys</title>
</head>
<body>
\tHow are you?
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "index.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "index.html.twig", "D:\\OS\\domains\\testtask\\twig\\templates\\index.html.twig");
    }
}
