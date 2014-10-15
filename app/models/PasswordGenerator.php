<?php
class PasswordGenerator {
  const minNumberOfWords = 3;
  const maxNumberOfWords = 6;
  const specialCharacters = '!@#$%&';

  public $words = array();
  public $errors = array();
  public $numberOfWords = 3;
  public $separator = '';
  public $includeNumber = false;
  public $includeSpecialCharacter = false;
  public $upperCaseFirstLetter = false;
  public $camelCase = false;

  public function __construct($params) {
    if(isset($params['number_of_words']))
      $this->numberOfWords = $params['number_of_words'];

    if(isset($params['separator']))
      $this->separator = $params['separator'];

    $this->includeNumber = isset($params['include_number']) && $params['include_number'];
    $this->includeSpecialCharacter = isset($params['include_special_character']) && $params['include_special_character'];
    $this->upperCaseFirstLetter = isset($params['upper_case_first_letter']) && $params['upper_case_first_letter'];
    $this->camelCase = isset($params['camel_case']) && $params['camel_case'];

    $this->words = $this->getWords();
  }

  public function generate() {
    $result = array();

    $randomWords = array_rand($this->words, $this->numberOfWords);

    foreach ($randomWords as $index) {
      array_push($result, $this->words[$index]);
    }

    // camel case rest of words in result if option selected
    if($this->camelCase) {
      for($i = 1; $i < count($result); $i++) {
        $result[$i] = ucfirst($result[$i]);
      }
    }

    $result = join($result, $this->separator);

    if($this->upperCaseFirstLetter) {
      $result = ucfirst($result);
    }

    if($this->includeNumber)
      $result = $result . rand(0, 9);

    if($this->includeSpecialCharacter) {
      $characterAt = rand(0, (strlen(self::specialCharacters) - 1));
      $result = $result . substr(self::specialCharacters, $characterAt, 1);
    }

    return $result;
  }

  private function getWords() {
    // scrape the words from the web and filter any words less than 3 characters
    $words = explode("\n", file_get_contents('https://raw.githubusercontent.com/first20hours/google-10000-english/master/google-10000-english.txt'));
    $words = array_filter($words, function($w) { return strlen($w) >= 3; });
    return $words;
  }

  // arrays can't be const, so next best thing
  public static function separators() {
    return array(
      'none' => '',
      'hyphen' => '-',
      'underscore' => '_',
      'dot' => '.',
      'pound' => '#'
    );
  }
}
?>