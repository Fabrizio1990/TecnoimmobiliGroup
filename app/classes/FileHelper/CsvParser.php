<?php

class  CsvParser
{
    private $lineDelimitator;
    private $fieldDelimitator;
    private $firstIsHeader;
    private $currentCsv;
    private $parsedCsv;
    private  $linesCount;
    private $currentLine;
    private $currentFieldIdx;

    function __construct($csv,$firstIsHeader = true,$lineDelimitator  = PHP_EOL ,$fieldDelimitator= ",") {

        $this->parseCsv($csv,$firstIsHeader,$lineDelimitator,$fieldDelimitator);
    }

    public function getParsedCsv(){
        return $this->parsedCsv;
    }

    private function parseCsv($csv,$firstIsHeader = true,$lineDelimitator  = PHP_EOL ,$fieldDelimitator= ","){
        $this->lineDelimitator = $lineDelimitator;
        $this->fieldDelimitator = $fieldDelimitator;
        $this->firstIsHeader = $firstIsHeader;
        $this->currentCsv = $csv;
        $this->currentLine = 0 ;
        $this->currentDelimitatorIdx = 0;
        $lines = explode($lineDelimitator, $csv);
        $this->linesCount = count($lines);
        $headers = $this->firstIsHeader?$this->getHeaders($lines[0]):null;
        $startIndex = $this->firstIsHeader?1:0;
        $this->parsedCsv = array();
        for($i = $startIndex; $i < $this->linesCount; $i++){
            array_push($this->parsedCsv,array());
            $fields = explode($fieldDelimitator, $lines[$i]);
            for($j = 0 ,$cnt = count($fields); $j < $cnt; $j++){
                if($headers!= null){
                    $this->parsedCsv[$i-1][$headers[$j]] = $fields[$j];
                }
                else {
                    array_push($this->parsedCsv[$i], $fields[$j]);
                }
            }
        }
        //var_dump($this->parsedCsv);
    }


    private function getHeaders($line){

        $headers = explode($this->fieldDelimitator, $line);
        return $headers;
    }

    /*public function hasLine(){
        $ret = false;
        if($this->currentLine < $this->linesCount){
            $ret = $this->parsedCsv[$this->currentLine];
            $this->currentLine++;
        }
        return
    }*/
}