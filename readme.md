# CSCI E-15 Project 3

[Visit Site](http://p3.scottpullen.me)

[Demo]()

## Description
Generate fake data that can be used to mockup websites or be used for test data. Generates lorem ipsum paragraphs for text filler. Generates fake user information that can be used for testing purposes.

## Features

### Lorem Ipsum Generator
- Generates n number of lorem ipsum text, where n is between 1 and 100.

### User Generator
- Generates n number of users between 1 and 100
- By default just a name is returned in the en-US locale
- Can select which locale the user is in (en-US, fr-FR, de-DE, ru-RU, es-ES, it-IT)
- Can optionally include:
  - Email address
  - Birth date
  - A small profile blurb
  - Address
  - UUID
  - Password
    - Passwords can be between 3 and 6 characters
    - Words in the passwords can be separated by a separator (-_.#)
    - Optionally include:
      - Number
      - Special character (!@#$%&)
    - Optionally upper case first letter
    - Optionally came case word


## Resources
- [jQuery](http://jquery.com)
- [Bootstrap](http://getbootstrap.com)
- [word list](https://github.com/first20hours/google-10000-english) (filter words < 3 characters)
- [badcow/lorem-ipsum](https://packagist.org/packages/badcow/lorem-ipsum)
- [fzaninotto/faker](https://packagist.org/packages/fzaninotto/faker)