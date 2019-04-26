<?php

/**
 * @file
 * ChallengeController.php
 */

namespace Drupal\challenge\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Drupal\Component\Serialization\Json;
use Drupal\node\Entity\Node;

class ChallengeController extends ControllerBase {

  /**
   * Get the cars per specific year make.
   *
   * @param {int} $year
   */
  public function cars($year) {
    try {
      $data = file_get_contents("https://www.carqueryapi.com/api/0.3?cmd=getTrims&year=$year");
      $cars = (object)json_decode($data, TRUE);

      if (!property_exists($cars, 'Trims')) {
        return new JsonResponse([]);
      }

      $count = 0;

      foreach ($cars->Trims as $car) {
        if ($count < 20) {
          $node = Node::create(['type' => 'car']);
          $node->set('title', $car['make_display']);
          $node->set('field_make', $car['make_display']);
          $node->set('field_trim', $car['model_trim']);
          $node->set('field_engine_position', $car['model_engine_position']);
          $node->set('field_engine_type', $car['model_engine_type']);
          $node->set('field_engine_compression', $car['model_engine_compression']);
          $node->set('field_engine_fuel', $car['model_engine_fuel']);
          $node->set('field_weight_kg', $car['model_weight_kg']);
          $node->set('field_country', $car['make_country']);
          $node->set('field_transmission_type', $car['model_transmission_type']);
          $node->set('field_price', rand(1, 8));
          $node->set('uid', UID);
          $node->status = 1;
          $node->enforceIsNew();
          $node->save();

          $count++;
        }
      }

      return new JsonRespone('Creating car contents');
    }
    catch(Exception $e) {
      return new JsonResponse($e->getMessage());
    }
  }

}
