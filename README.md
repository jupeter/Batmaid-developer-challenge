Sample developer challenge
==========================

This is sample developer challenge in PHP7/Symfony 3. 

## User story

After an Agent gets automatically assigned to a Job, he or she can either accept or decline it.

When declining a Job, the Agent should provide a reason, so the operators can better respond

to it and find a replacement Agent.

## Project goal

The project goal is to create a user interface for the Agent to enter a decline reason.

## Functional requirements

The Agent can choose from 2 Predefined reasons 
(“i have a conflicting appointment”, “the travel time is too long”) or select “other”, represented by a list of radio buttons.
 - Only when “other” reason is selected, some text must be entered in textbox below.
 - When the form is first opened, no reason is preselected.
 - The form must be submitted without reloading the page.
 - The entered data also has to conform to business rules and needs to be validated.
 - After the form has been submitted successfully, it should be replaced with a success message.
 -  In case an invalid form was submitted, validation errors have to be displayed.

## Non-functional requirements
  
Project based on an empty Symfony template.

 - Symfony version >= 2.4
 - Use symfony forms. 
 - PHP version >= 5.6
 - Frontend framework: jQuery
 - No persistence layer, no database access.
 - Have a clear separation between application layers and responsibilities.
  
## Instalation

 1. Clone project
 2. Run ``composer install``
 3. Install assets: ``php bin/console assets:install``
 3. Start server: ``php bin/console server:run``
 3. Open [127.0.0.1:8000](http://127.0.0.1:8000/)
 
Enjoy!