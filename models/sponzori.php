<?php
class Sponzori
{
    public $id;
    public $naziv;
    public $opis;
    public $paket;
    public $datumOsnivanja;

    public function __construct($id, $naziv, $opis, $paket, $datumOsnivanja)
    {
        $this->id = $id;
        $this->naziv = $naziv;
        $this->opis = $opis;
        $this->paket = $paket;
        $this->datumOsnivanja = $datumOsnivanja;
    }

    public static function getAll(mysqli $conn)
    {
        $q = "SELECT * FROM sponzori";
        return $conn->query($q);
    }

    public static function getById($id, mysqli $conn)
    {
        $q = "SELECT * FROM sponzori WHERE id=$id";
        $myArray = array();
        if ($result = $conn->query($q)) {

            while ($row = $result->fetch_array(1)) {
                $myArray[] = $row;
            }
        }
        return $myArray;
    }

    public static function deleteById($id, mysqli $conn)
    {
        $q = "DELETE FROM sponzori WHERE id=$id";
        return $conn->query($q);
    }

    public static function add($naziv, $opis, $paket, $datumOsnivanja, mysqli $conn)
    {
        $q = "INSERT INTO sponzori(naziv,opis,paket,datumOsnivanja) values('$naziv','$opis', '$paket', '$datumOsnivanja')";
        return $conn->query($q);
    }

    public static function update($id, $naziv, $paket, $opis, $datumOsnivanja, mysqli $conn)
    {
        $q = "UPDATE sponzori set naziv='$naziv', opis='$opis', paket='$paket', datumOsnivanja='$datumOsnivanja' where id=$id";
        return $conn->query($q);
    }
}