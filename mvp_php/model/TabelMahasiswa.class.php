<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

// Kelas yang berisikan tabel dari mahasiswa
class TabelMahasiswa extends DB
{
	function getMahasiswa() // untuk READ
	{
		// Query mysql select data mahasiswa
		$query = "SELECT * FROM mahasiswa";
		
		// Mengeksekusi query
		return $this->execute($query);
	}

	function createMahasiswa($nama, $nim, $tempat, $tl, $gender, $email, $telp) // untuk CREATE
	{
		// Query mysql insert data mahasiswa
		$query = "INSERT INTO mahasiswa (nama, nim, tempat, tl, gender, email, telp)
				  VALUES ('$nama', '$nim', '$tempat', '$tl', '$gender', '$email', '$telp')";

		// Mengeksekusi query
		return $this->execute($query);
	}

	function updateMahasiswa($nama, $nim, $tempat, $tl, $gender, $email, $telp) // untuk UPDATE
	{
		// Query mysql update data mahasiswa
		$query = "UPDATE mahasiswa 
				  SET nama='$nama', nim='$nim', tempat='$tempat', tl='$tl', gender='$gender', email='$email', telp='$telp' 
				  WHERE nim='$nim'";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function deleteMahasiswa($nim) // untuk DELETE
	{
		// Query mysql delete data mahasiswa
		$query = "DELETE FROM mahasiswa WHERE nim='$nim'";
		
		// Mengeksekusi query
		return $this->execute($query);
	}	
}
