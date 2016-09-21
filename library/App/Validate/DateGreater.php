<?php
/**
 * Walidator wprowadzoną przez użytkownika datę z datą dzisiejszą,
 * po czym sprawdza czy data jest większa od daty dzisiejszej lub 
 * czy została wprowadzona poprawnie.
 * 
 * @author Rafał Migda
 */
class App_Validate_DateGreater extends Zend_Validate_Abstract {

    const MSG_INVALID = 'invalid';
    const MSG_GREATER = 'greater';

    /**
     * Tablica z wiadomościami dotyczącymi błędów.
     *
     * @var array
     */
    protected $_messageTemplates = array(
        self::MSG_INVALID => "'%value%' nie jest datą",
        self::MSG_GREATER => "'%value%' musi być większa od daty dzisiejszej"
    );

    /**
     * Zwraca prawdę, gdy wprowadzona data jest poprawna oraz
     * większa od dzisiejszej daty.
     *
     * @param  string $value
     * @return boolean
     */
    public function isValid($value) {
        $this->_setValue($value);

        $validator = new Zend_Validate_Date();
        if (!$validator->isValid($value)) { // sprawdzam czy wartość jest datą
            $this->_error(self::MSG_INVALID);
            return false;
        }
        if ($value <= date("Y-m-d")) { // sprawdzam czy wprowadzana data jest wieksza od dzisiejszej
            $this->_error(self::MSG_GREATER);
            return false;
        }
        return true; // zwracam prawdę
    }

}
