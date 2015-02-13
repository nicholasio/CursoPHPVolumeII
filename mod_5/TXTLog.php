<?php
class TXTLog extends Log {

    public function writeLog() {
        $str = '';
        foreach( $this->logData as $logEntry) {
            $str .= $logEntry . "\n";
        }

        return $str;
    }
}