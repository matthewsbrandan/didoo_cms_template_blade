<?php

include_once __DIR__."/Controller.php";

class HomeController extends Controller{
  public function index(){
    [$data, $err] = $this->cms->get("page/data/".$this->theme_slug);

    if(!$data || !$data->result || $err) return view('error-404');

    $page_config = $data->response->datas[0];
    $elements = $data->response->elements;
    
    $parsedElements = [];
    foreach($elements as $element){
      $data = $element->datas ? $element->datas[0] : null;
      if($data){
        if($data->active){
          $data = json_decode($data->data);
          if($data) foreach($data as &$item){
            if(is_string($item) && $jsonParsed = json_decode($item)) $item = $jsonParsed;
          }
        }
        else $data = null;
      }
      $parsedElements[$element->class_name] = $data;
    }
    
    // REQUIRED SECTIONS
    if(!$parsedElements['banner']) return view('error-500',[
      'page_config' => $page_config,
      'message' => 'Preencha as informações principais da página'
    ]);

    // EXCEPTIONS
    $parsedElements = $this->sectionExceptions($parsedElements);

    return view('index',[
      'page_config' => $page_config,
      'elements' => $parsedElements,
      'cms_page_token' => $this->cms->getPageToken()
    ]);
  }
  public function policy(){
    [$data, $err] = $this->cms->get("page/data-select/".$this->theme_slug."&privacity_policy");

    if(!$data || !$data->result || $err) return view('error-404');

    $page_config = $data->response->datas[0];
    $elements = $data->response->elements;
    
    $parsedElements = [];
    foreach($elements as $element){
      $data = $element->datas ? $element->datas[0] : null;
      if($data){
        if($data->active){
          $data = json_decode($data->data);
          if($data) foreach($data as &$item){
            if(is_string($item) && $jsonParsed = json_decode($item)) $item = $jsonParsed;
          }
        }
        else $data = null;
      }
      $parsedElements[$element->class_name] = $data;
    }

    return view('privacy_policy',[
      'page_config' => $page_config,
      'elements' => $parsedElements
    ]);
  }
  protected function sectionExceptions($elements){
    if(isset($elements['service']) && is_array($elements['service']->services)){
      foreach($elements['service']->services as &$service){
        if(is_string($service->button) && 
          $jsonParsed = json_decode($service->button)
        ) $service->button = $jsonParsed;
      }
    }
    return $elements;
  }
}