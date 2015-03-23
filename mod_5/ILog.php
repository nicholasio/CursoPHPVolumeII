<?php
interface ILog {
    public function addLogEntry($logString);
    public function removeLogEntry($index);

    public function writeLog();
    public function saveLog($file);

}
