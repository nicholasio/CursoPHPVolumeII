<?php
include('ILog.php');
abstract class Log implements ILog {
    /**
     * @var $logData
     * Armazena o log em méotira
     */
    protected $logData = array();

    public function addLogEntry($logString) {
        $this->logData[] = $logString;
    }

    public function removeLogEntry($index) {
        if ( isset($this->logData[$index]) )
            unset($this->logData[$index]);
    }

    abstract  public function writeLog();

    public function saveToFile() {
        $logs = $this->writeLog();

        //Função para salvar no disco
    }
}