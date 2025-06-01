<?php

include("KontrakPresenter.php");

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

class ProsesMahasiswa implements KontrakPresenter
{
	private $tabelmahasiswa;
	private $data = [];

	function __construct()
	{
		// Konstruktor
		try {
			$db_host = "localhost"; // host 
			$db_user = "root"; // user
			$db_password = ""; // password
			$db_name = "mvp_php"; // nama basis data
			$this->tabelmahasiswa = new TabelMahasiswa($db_host, $db_user, $db_password, $db_name); // instansi TabelMahasiswa
			$this->data = array(); // instansi list untuk data Mahasiswa
		} catch (Exception $e) {
			echo "yah error" . $e->getMessage();
		}
	}

	function prosesDataMahasiswa() // untuk menangani READ
	{
		try {
			// mengambil data di tabel Mahasiswa
			$this->tabelmahasiswa->open();
			$this->tabelmahasiswa->getMahasiswa();

			while ($row = $this->tabelmahasiswa->getResult()) {
				// ambil hasil query
				$mahasiswa = new Mahasiswa(); // instansiasi objek mahasiswa untuk setiap data mahasiswa
				$mahasiswa->setId($row['id']); // mengisi id
				$mahasiswa->setNim($row['nim']); // mengisi nim
				$mahasiswa->setNama($row['nama']); // mengisi nama
				$mahasiswa->setTempat($row['tempat']); // mengisi tempat
				$mahasiswa->setTl($row['tl']); // mengisi tl
				$mahasiswa->setGender($row['gender']); // mengisi gender
				$mahasiswa->setEmail($row['email']); // mengisi gender
				$mahasiswa->setTelp($row['telp']); // mengisi gender

				$this->data[] = $mahasiswa; // tambahkan data mahasiswa ke dalam list
			}
			// Tutup koneksi
			$this->tabelmahasiswa->close();
		} catch (Exception $e) {
			// memproses error
			echo "yah error part 2" . $e->getMessage();
		}
	}

	function createDataMahasiswa($post){ // fungsi untuk menangani CREATE
		try{
			// ambil data dari form
			$nama = $post['nama'];
			$nim = $post['nim'];
			$tempat = $post['tempat'];
			$tl = $post['tl'];
			$gender = $post['gender'];
			$email = $post['email'];
			$telp = $post['telp'];
			// panggil fungsi createMahasiswa dari TabelMahasiswa
			$this->tabelmahasiswa->open();
			$this->tabelmahasiswa->createMahasiswa($nama, $nim, $tempat, $tl, $gender, $email, $telp);
			
			// Tutup koneksi
			$this->tabelmahasiswa->close();
		} catch (Exception $e) {
			// memproses error
			echo "gagal input data" . $e->getMessage();
		}
	}

	function updateDataMahasiswa($post){
		try{
			// ambil data dari form
			$nama = $post['nama'];
			$nim = $post['nim'];
			$tempat = $post['tempat'];
			$tl = $post['tl'];
			$gender = $post['gender'];
			$email = $post['email'];
			$telp = $post['telp'];
			// panggil fungsi updateMahasiswa dari TabelMahasiswa
			$this->tabelmahasiswa->open();
			$this->tabelmahasiswa->updateMahasiswa($nama, $nim, $tempat, $tl, $gender, $email, $telp);
			// Tutup koneksi
			$this->tabelmahasiswa->close();
		} catch (Exception $e) {
			// memproses error
			echo "gagal update" . $e->getMessage();
		}
	}

	function deleteDataMahasiswa($nim)
	{
		try{
			// panggil fungsi deleteMahasiswa dari TabelMahasiswa
			$this->tabelmahasiswa->open();
			$this->tabelmahasiswa->deleteMahasiswa($nim);
			// Tutup koneksi
			$this->tabelmahasiswa->close();
		} catch (Exception $e) {
			// memproses error
			echo "gagal delete" . $e->getMessage();
		}
	}

	function getId($i)
	{
		// mengembalikan id mahasiswa dengan indeks ke i
		return $this->data[$i]->id;
	}
	function getNim($i)
	{
		// mengembalikan nim mahasiswa dengan indeks ke i
		return $this->data[$i]->nim;
	}
	function getNama($i)
	{
		// mengembalikan nama mahasiswa dengan indeks ke i
		return $this->data[$i]->nama;
	}
	function getTempat($i)
	{
		// mengembalikan tempat mahasiswa dengan indeks ke i
		return $this->data[$i]->tempat;
	}
	function getTl($i)
	{
		// mengembalikan tanggal lahir(TL) mahasiswa dengan indeks ke i
		return $this->data[$i]->tl;
	}
	function getGender($i)
	{
		// mengembalikan gender mahasiswa dengan indeks ke i
		return $this->data[$i]->gender;
	}
	function getEmail($i)
	{
		// mengembalikan email mahasiswa dengan indeks ke i
		return $this->data[$i]->email;
	}
	function getTelp($i)
	{
		// mengembalikan telp mahasiswa dengan indeks ke i
		return $this->data[$i]->telp;
	}
	function getSize()
	{
		return sizeof($this->data);
	}
}
