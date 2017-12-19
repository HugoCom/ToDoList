<?php

    class ValidationTask
    {
        static function val_action($action) {
            if (!isset($action)) {
                throw new Exception('Pas d\'action');
            }
        }

        static function val_form_list(string $name, string $date)
        {
            if(empty($name))
                throw new Exception('Pas de name');
            if(empty($date))
                throw new Exception('Pas de description');

            if (ValidationUse::sanitizeString($name) == FALSE) {
                throw new Exception('Injection SQL');
            }
            if (ValidationUse::sanitizeString($date) == FALSE) {
                throw new Exception('Injection SQL');
            }

        }

        static function val_form_task(string $name, string $description )
        {
            if(empty($name))
                throw new Exception('Pas de name');
            if(empty($description))
                throw new Exception('Pas de description');

            if (ValidationUse::sanitizeString($name) == FALSE) {
                throw new Exception('Injection SQL');
            }
            if (ValidationUse::sanitizeString($description) == FALSE) {
                throw new Exception('Injection SQL');
            }

        }
    }
?>