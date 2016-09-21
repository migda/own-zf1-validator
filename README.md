# own-zf1-validator
Simple Zend Framework 1 validator. Checks if input data is correct and greater than today's date.

Validator should be place in: library/App/Validate/

Also in config file (application.ini) you should define library path:
includePaths.library = APPLICATION_PATH"/../library"

Usage is very simple eg.:
$form->date->addValidator(new App_Validate_DateGreater());
