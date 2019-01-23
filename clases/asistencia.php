<?php
class asistencia
{
  private $nombre;
  private $apellido;
  private $rutUnido;
  private $mail;
  private $telefono;
  private $repartidor;

  function getNombre() {
      return $this->nombre;
  }

  function getApellido() {
      return $this->apellido;
  }

  function getRutUnido() {
      return $this->rutUnido;
  }

  function getMail() {
      return $this->mail;
  }

  function getTelefono() {
      return $this->telefono;
  }

  function getRepartidor() {
      return $this->repartidor;
  }

  function setNombre($nombre) {
      $this->nombre = $nombre;
  }

  function setApellido($apellido) {
      $this->apellido = $apellido;
  }

  function setRutUnido($rutUnido) {
      $this->rutUnido = $rutUnido;
  }

  function setMail($mail) {
      $this->mail = $mail;
  }

  function setTelefono($telefono) {
      $this->telefono = $telefono;
  }

  function setRepartidor($repartidor) {
      $this->repartidor = $repartidor;
  }


}

?>
