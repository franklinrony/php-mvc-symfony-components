<?php
namespace pdes\controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;



/**
 * Creado por equipo de desarrollo RE.
 * Fecha: 27/02/2019
 * Hora: 10:30 PM
 * Editado por:
 * Fecha:
 * Editado por:
 * Fecha:
 */
class UsuarioController{


private $form;
    //Mostrar formulario registro y validar campos una vez es enviado por el metodo post.
  public  function registro(){
      global $twig, $formFactory;
      $request = Request::createFromGlobals();
      $this->form = $formFactory->createBuilder('form',null,[
          'action' => '/registro/'
      ])
          ->add('nombres', 'text', ['attr' => ['class' => 'form-control'] ,
              'constraints' =>[ new NotBlank(),new Length(['min'=>4])],
            ])
          ->add('apellidos', 'text', ['attr' => ['class' => 'form-control'],
              'constraints' => [new NotBlank(),new Length(['min'=>4])],
          ])
          ->add('edad', 'integer', ['attr' => ['class' => 'form-control'],
          'constraints' => [new NotBlank(),new GreaterThan(['value'=>0])],
          ])
          ->add('email', 'email', ['attr' => ['class' => 'form-control'],
              'constraints' => [new NotBlank(),new Email([])],
          ])
          ->add('usuario', 'text', ['attr' => ['class' => 'form-control'],
              'constraints' => [new NotBlank(),new Length(['min'=>4])],
          ])
          ->add('password', 'password', ['attr' => ['class' => 'form-control'],
              'constraints' => [new NotBlank(),new Length(['min'=>4])],
          ])
          ->getForm();

      $this->form->handleRequest($request);

      //si el formulario se envio y los campos cumplen las constraints
      if ($this->form->isSubmitted() and $this->form->isValid()){
        $this->guardar($request);
      }
      $template = $twig->loadTemplate('registro.twig');
      echo $template->render(array('form' =>$this->form->createView()));
  }


  //Guardar usuario
    private function  guardar($request){
     var_dump($request->attributes);
    }
}

?>