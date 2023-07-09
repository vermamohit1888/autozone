<?php

namespace Drupal\autozone\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;


/**
 * Class ModelController.
 */
class ModelController extends ControllerBase {

  /**
   * Getmodelbymake.
   *
   * @return string
   *   Return Hello string.
   */
  public function getmodelbymake($make = '') {
     //https://vpic.nhtsa.dot.gov/api/vehicles/GetModelsForMakeId/807?format=json
     $get_data = callAPI('GET', 'https://vpic.nhtsa.dot.gov/api/vehicles/GetModelsForMakeId/'.$make.'?format=json', false);
     $response = json_decode($get_data, true);
     $Results = $response['Results'];
     return new JsonResponse($Results); 
  }

}
