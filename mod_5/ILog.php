<?php
interface ILog {
    public function addLogEntry($logEntry);
    public function removeLogEntry($index);
}