<?php

require 'requests.php';
require 'ParentServices.php';

/**
 * Api class stores all the required data in an associative array and returns
 * it as needed.
 */
class API {

  /**
   * Stores all the required data in this associative array.
   */
  private static ?array $root = null;

  /**
   * Stores all data from data key of json response.
   */
  private static ?array $data = null;

  /**
   *  URL of the domain.
   */
  private static string $domain = 'https://www.innoraft.com';

  /**
   * URL of api.
   */
  private static string $url = 'https://www.innoraft.com/jsonapi/node/services';
  public function  __construct() {

    // Gets the whole json response from api.
    $response = json_decode(request(self::$url),true);

    // Stores all data key values from the whole response data.
    self::$data = $response['data'];
    for ($i = 0; $i < sizeof(self::$data) - 4; $i++) {

      // Gets parent service data to the current node.
      $parent_details = json_decode(request(
        self::$data[$i]['relationships']['field_service_parent']['links']['related']['href'])
        , true);
      $parent_name = $parent_details['data']['attributes']['title'] ?? 'NULL';
      $child_name = self::$data[$i]['attributes']['title'] ?? 'NULL';

      // Sets parent service name to children service names and children
      // service name to their page links.
      self::$root[$parent_name]['children'][$child_name] =
        self::$domain . self::$data[$i]['attributes']['path']['alias'];
    }

    for($i = 12; $i < sizeof(self::$data); $i++){

      // Gets parent service name.
      $parent_name = self::$data[$i]['attributes']['title'] ?? 'NULL';

      // Gets the current parent service data to get corresponding icons.
      $parent_data = json_decode(request(
        self::$data[$i]['relationships']['field_service_icon']['links']['related']['href'])
        ,true);
      foreach ($parent_data['data'] as $service_datum){

        // Gets the corresponding icons.
        $service_image =  json_decode(request(
          $service_datum['relationships']['field_media_image']['links']['related']['href'])
          ,true);

        // Sets the corresponding icons to their parents name.
        self::$root[$parent_name]['service_icons'][] =
          self::$domain . $service_image['data']['attributes']['uri']['url'];
      }

      // Gets image data for every parent services.
      $image_data = json_decode(request(
        self::$data[$i]['relationships']['field_image']['links']['related']['href'])
        ,true);

      // Sets thumbnail image links to their associative parent services.
      self::$root[$parent_name]['images'] = self::$domain .
        $image_data['data']['attributes']['uri']['url'];

      // Sets service icon links to their associative parent services.
      self::$root[$parent_name]['link'] = self::$domain .
        self::$data[$i]['attributes']['path']['alias'];
    }
  }

  /**
   * Takes parent service name as enum value and returns children names and
   * their associative links to their associative pages.
   *
   * @param ParentServices $parentService
   *   Parent service name as Enum values.
   *
   * @return string[]
   *   Returns an array of children names with their page links.
   */
  static function getServicesWithLinks(ParentServices $parentService):array {
    return match ($parentService) {
      ParentServices::Drupal =>
        self::$root[ParentServices::Drupal->value]['children'],
      ParentServices::ECommerce =>
        self::$root[ParentServices::ECommerce->value]['children'],
      ParentServices::Mobile =>
        self::$root[ParentServices::Mobile->value]['children'],
      ParentServices::Website =>
        self::$root[ParentServices::Website->value]['children'],
    };
  }

  /**
   * Takes parent service name as enum value and returns their page links.
   *
   * @param ParentServices $parentService
   *   Parent service name as Enum values.
   *
   * @return string
   *   Returns parent service page links.
   */
  static function getParentLinks(ParentServices $parentService):string {
    return match ($parentService) {
      ParentServices::Drupal =>
        self::$root[ParentServices::Drupal->value]['link'],
      ParentServices::ECommerce =>
        self::$root[ParentServices::ECommerce->value]['link'],
      ParentServices::Mobile =>
        self::$root[ParentServices::Mobile->value]['link'],
      ParentServices::Website =>
        self::$root[ParentServices::Website->value]['link'],
    };
  }

  /**
   * Takes parent service name as enum value and returns their associative
   * thumbnail images.
   *
   * @param ParentServices $parentService
   *   Parent service name as Enum values.
   *
   * @return mixed
   *   Returns parent thumbnail images.
   */
  static function getImages(ParentServices $parentService):mixed {
    return match ($parentService) {
      ParentServices::Drupal =>
        self::$root[ParentServices::Drupal->value]['images'],
      ParentServices::ECommerce =>
        self::$root[ParentServices::ECommerce->value]['images'],
      ParentServices::Mobile =>
        self::$root[ParentServices::Mobile->value]['images'],
      ParentServices::Website =>
        self::$root[ParentServices::Website->value]['images'],
    };
  }

  /**
   * Takes parent service name as enum value and returns their associative
   * service icons.
   *
   * @param ParentServices $parentService
   *   Parent service name as Enum values.
   *
   * @return string[]
   *   Returns icons associative to their parent service.
   */
  static function getParentIcons(ParentServices $parentService):array {
    return match ($parentService) {
      ParentServices::Drupal =>
        self::$root[ParentServices::Drupal->value]['service_icons'],
      ParentServices::ECommerce =>
        self::$root[ParentServices::ECommerce->value]['service_icons'],
      ParentServices::Mobile =>
        self::$root[ParentServices::Mobile->value]['service_icons'],
      ParentServices::Website =>
        self::$root[ParentServices::Website->value]['service_icons'],
    };
  }

}
