<?php
use Symfony\Component\Form\Forms;
use Symfony\Bridge\Twig\Extension\FormExtension;
use Symfony\Component\Form\FormRenderer;
use Symfony\Bridge\Twig\Form\TwigRendererEngine;
use Symfony\Bridge\Twig\Form\TwigRenderer;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\RuntimeLoader\FactoryRuntimeLoader;
use Twig\TwigFunction;
use Symfony\Component\Security\Csrf\CsrfTokenManager;
use Symfony\Component\Translation\Loader\XliffFileLoader;
use Symfony\Bridge\Twig\Extension\TranslationExtension;
use Symfony\Component\Translation\Translator;
use Symfony\Component\Form\Extension\HttpFoundation\HttpFoundationExtension;
use Symfony\Component\Form\Extension\Csrf\CsrfExtension;
use Symfony\Component\Form\Extension\Validator\ValidatorExtension;
use Symfony\Component\Validator\Validation;

include 'configuracion.php';


// the Twig file that holds all the default markup for rendering forms
// this file comes with TwigBridge
$defaultFormTheme = 'form_div_layout.html.twig';
$vendorDirectory = realpath(__DIR__.'/../vendor');
// the path to TwigBridge library so Twig can locate the
// form_div_layout.html.twig file
$appVariableReflection = new \ReflectionClass('\Symfony\Bridge\Twig\AppVariable');
$vendorTwigBridgeDirectory = dirname($appVariableReflection->getFileName());
// the path to your other templates
$viewsDirectory = realpath(__DIR__.'/src/view');
$csrfManager= new CsrfTokenManager();
// creates the Translator
$translator = new Translator('en');
// somehow load some translations into it
$translator->addLoader('xlf', new XliffFileLoader());
$translator->addResource('array', [
    'This value should not be blank' => 'Este valor no debe estar vacio',
], 'fr_FR');
$twig = new Environment(new FilesystemLoader([
    $viewsDirectory,
    $vendorTwigBridgeDirectory.'/Resources/views/Form',
]));
$formEngine = new TwigRendererEngine([$defaultFormTheme], $twig);
$twig->addRuntimeLoader(new FactoryRuntimeLoader([
    FormRenderer::class => function () use ($formEngine, $csrfManager) {
        return new FormRenderer($formEngine, $csrfManager);
    },
]));

// creates the validator - details will vary
$validator = Validation::createValidator();

//$formFactory = Forms::createFormFactory();
$formFactory = Forms::createFormFactoryBuilder()
    ->addExtension(new HttpFoundationExtension())
    ->addExtension(new ValidatorExtension($validator))
    ->addExtension(new CsrfExtension($csrfManager))
    ->getFormFactory();

//Funcion agregar assets
$twig->addFunction(new TwigFunction('asset', function ($asset) {
    global $url;
    return sprintf($url.'assets/%s', ltrim($asset, '/'));
}));
// ... (see the previous CSRF Protection section for more information)
// adds the FormExtension to Twig
$twig->addExtension(new FormExtension(new TwigRenderer($formEngine,$csrfManager)));
$twig->addExtension(new TranslationExtension($translator));

?>