<?php 

class Mahasiswa_Model {

private $table = 'mahasiswa';
  private $dbh;

  public function __construct() {
      $this->dbh = new Database();
  }

  public function getAllMahasiswa() {
      $this->dbh->query('SELECT * FROM ' . $this->table);
      return $this->dbh->resultSet();
  }

  public function getMahasiswaById($id) {
      $this->dbh->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
      $this->dbh->bind(':id', $id);
      return $this->dbh->single();
  }

  public function tambahDataMahasiswa($data) {
      $query = "INSERT INTO " . $this->table . " (nama, nrp, email, jurusan) VALUES (:nama, :nrp, :email, :jurusan)";
      
      $this->dbh->query($query);
      $this->dbh->bind(':nama', $data['nama']);
      $this->dbh->bind(':nrp', $data['nrp']);
      $this->dbh->bind(':email', $data['email']);
      $this->dbh->bind(':jurusan', $data['jurusan']);
      
      $this->dbh->execute();
      
      return $this->dbh->rowCount();
  }

  public function hapusDataMahasiswa($id) {
      $query = "DELETE FROM " . $this->table . " WHERE id = :id";
      
      $this->dbh->query($query);
      $this->dbh->bind(':id', $id);
      
      $this->dbh->execute();
      
      return $this->dbh->rowCount();
  }

  public function ubahDataMahasiswa($data) {
      $query = "UPDATE " . $this->table . " SET nama = :nama, nrp = :nrp, email = :email, jurusan = :jurusan WHERE id = :id";
      
      $this->dbh->query($query);
      $this->dbh->bind(':nama', $data['nama']);
      $this->dbh->bind(':nrp', $data['nrp']);
      $this->dbh->bind(':email', $data['email']);
      $this->dbh->bind(':jurusan', $data['jurusan']);
      $this->dbh->bind(':id', $data['id']);
      
      $this->dbh->execute();
      
      return $this->dbh->rowCount();
  }
}
          
