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

  public function isValid() {
    if(!is_numeric($this->numberOfWords)) {
      $this->errors['number_of_words'] = 'must be a valid number between ' . self::minNumberOfWords . ' and ' . self::maxNumberOfWords .  '.';
    } else {
      if($this->numberOfWords < self::minNumberOfWords || $this->numberOfWords > self::maxNumberOfWords) {
        $this->errors['number_of_words'] = 'must be between ' . self::minNumberOfWords . ' and ' . self::maxNumberOfWords .  '.';
      }
    }

    // just in case someone tries to enter their own value
    if(!in_array($this->separator, self::separators(), true)){
      $this->errors['separator'] = 'must be a valid separator (-_.#).';
      $this->separator = ''; // reset
    }

    return count($this->errors) == 0;
  }

  public function generate() {
    $words = $this->words;
    $result = array();

    // select random subset of words
    for($i = 0; $i < $this->numberOfWords; $i++) {
      $word = array_rand($words);
      array_push($result, $words[$word]);
      unset($words[$word]);
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
    // if the words.txt does not exist locally, scrape the words from the web and filter any words less than 3 characters
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