<?php

namespace Drupal\autozone\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class YearController.
 */
class YearController extends ControllerBase {

  /**
   * Getmakebyyear.
   *
   * @return string
   *   Return Hello string.
   */
  public function getmakebyyear($year='') {
    //https://vpic.nhtsa.dot.gov/api/vehicles/GetModelsForMakeId/807?format=json
    $get_data = callAPI('GET', 'https://vpic.nhtsa.dot.gov/api/vehicles/GetMakesForManufacturerAndYear/mer?year='.$year.'&format=json', false);
    $response = json_decode($get_data, true);
    $Results = $response['Results'];
    return new JsonResponse($Results);   
  }  

}
