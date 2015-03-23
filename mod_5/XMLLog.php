<?php

class XMLLog extends Log {

    public function writeLog() {
        $writer = new XMLWriter();
        $writer->openMemory();
        $writer->startDocument('1.0', 'UTF-8');
        $writer->startElement('logs');
            foreach( $this->logData as $logEntry) {
                $writer->startElement("log");
                $writer->text($logEntry);
                $writer->endElement();
            }
        $writer->endElement();
        $writer->endDocument();

        return $writer->flush();

    }
}