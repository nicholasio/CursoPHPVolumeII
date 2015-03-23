<?php

abstract class Log implements ILog{

    protected $logData = array();

    public function addLogEntry($logString) {
        $this->logData[] = $logString;
    }

    public function removeLogEntry($index) {
        if ( isset($this->logData[$index]) )
            unset($this->logData[$index]);
    }

    abstract public function writeLog();

    public function saveLog($filename) {
        echo "Salvando o log em $filename";
    }
}