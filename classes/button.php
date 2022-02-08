<?php

class button {

    protected $received = "";
    protected $datetime = "";
    protected $packetlength = "";
    protected $packettype = "";
    protected $subtype = "";
    protected $seqnbr = "";
    protected $id = "";
    protected $unitcode = "";
    protected $command = "";
    protected $dimlevel = "";
    protected $signallevel = "";
    protected $prev_received = "";
    protected $prev_datetime = "";
    protected $prev_packetlength = "";
    protected $prev_packettype = "";
    protected $prev_subtype = "";
    protected $prev_seqnbr = "";
    protected $prev_id = "";
    protected $prev_unitcode = "";
    protected $prev_command = "";
    protected $prev_dimlevel = "";
    protected $prev_signallevel = "";
    
    public function __construct() {
        
    }
    
    public function getReceived() {
        return $this->received;
    }

    public function getDatetime() {
        return $this->datetime;
    }

    public function getPacketlength() {
        return $this->packetlength;
    }

    public function getPackettype() {
        return $this->packettype;
    }

    public function getSubtype() {
        return $this->subtype;
    }

    public function getSeqnbr() {
        return $this->seqnbr;
    }

    public function getId() {
        return $this->id;
    }

    public function getUnitcode() {
        return $this->unitcode;
    }

    public function getCommand() {
        return $this->command;
    }

    public function getDimlevel() {
        return $this->dimlevel;
    }

    public function getSignallevel() {
        return $this->signallevel;
    }

    public function getPrev_received() {
        return $this->prev_received;
    }

    public function getPrev_datetime() {
        return $this->prev_datetime;
    }

    public function getPrev_packetlength() {
        return $this->prev_packetlength;
    }

    public function getPrev_packettype() {
        return $this->prev_packettype;
    }

    public function getPrev_subtype() {
        return $this->prev_subtype;
    }

    public function getPrev_seqnbr() {
        return $this->prev_seqnbr;
    }

    public function getPrev_id() {
        return $this->prev_id;
    }

    public function getPrev_unitcode() {
        return $this->prev_unitcode;
    }

    public function getPrev_command() {
        return $this->prev_command;
    }

    public function getPrev_dimlevel() {
        return $this->prev_dimlevel;
    }

    public function getPrev_signallevel() {
        return $this->prev_signallevel;
    }

    public function setReceived($received): void {
        $this->received = $received;
    }

    public function setDatetime($datetime): void {
        $this->datetime = $datetime;
    }

    public function setPacketlength($packetlength): void {
        $this->packetlength = $packetlength;
    }

    public function setPackettype($packettype): void {
        $this->packettype = $packettype;
    }

    public function setSubtype($subtype): void {
        $this->subtype = $subtype;
    }

    public function setSeqnbr($seqnbr): void {
        $this->seqnbr = $seqnbr;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setUnitcode($unitcode): void {
        $this->unitcode = $unitcode;
    }

    public function setCommand($command): void {
        $this->command = $command;
    }

    public function setDimlevel($dimlevel): void {
        $this->dimlevel = $dimlevel;
    }

    public function setSignallevel($signallevel): void {
        $this->signallevel = $signallevel;
    }

    public function setPrev_received($prev_received): void {
        $this->prev_received = $prev_received;
    }

    public function setPrev_datetime($prev_datetime): void {
        $this->prev_datetime = $prev_datetime;
    }

    public function setPrev_packetlength($prev_packetlength): void {
        $this->prev_packetlength = $prev_packetlength;
    }

    public function setPrev_packettype($prev_packettype): void {
        $this->prev_packettype = $prev_packettype;
    }

    public function setPrev_subtype($prev_subtype): void {
        $this->prev_subtype = $prev_subtype;
    }

    public function setPrev_seqnbr($prev_seqnbr): void {
        $this->prev_seqnbr = $prev_seqnbr;
    }

    public function setPrev_id($prev_id): void {
        $this->prev_id = $prev_id;
    }

    public function setPrev_unitcode($prev_unitcode): void {
        $this->prev_unitcode = $prev_unitcode;
    }

    public function setPrev_command($prev_command): void {
        $this->prev_command = $prev_command;
    }

    public function setPrev_dimlevel($prev_dimlevel): void {
        $this->prev_dimlevel = $prev_dimlevel;
    }

    public function setPrev_signallevel($prev_signallevel): void {
        $this->prev_signallevel = $prev_signallevel;
    }


    
    

}
