<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

include("KontrakView.php");
include("presenter/ProsesMahasiswa.php");

class TampilMahasiswa implements KontrakView
{
	private $prosesmahasiswa; // Presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct($post = null)
	{
		//konstruktor
		$this->prosesmahasiswa = new ProsesMahasiswa();

		if($post != null){
			//jika ada data yang dikirimkan dari form
			if(isset($post['action']) && $post['action'] == 'update'){
				//jika ada aksi update
				$this->prosesmahasiswa->updateDataMahasiswa($post);
			} elseif (isset($post['action']) && $post['action'] == 'delete') {
				//jika ada aksi delete
				$this->prosesmahasiswa->deleteDataMahasiswa($post['nim']);
			} else {
				//aksi create
				$this->prosesmahasiswa->createDataMahasiswa($post);
			}
		}
	}

	function tampil()
	{
		$this->prosesmahasiswa->prosesDataMahasiswa();
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosesmahasiswa->getSize(); $i++) {
			$no = $i + 1;
			$data .= "<tr>
			<form method='POST'>
				<td>$no</td>
				<td>" . $this->prosesmahasiswa->getNim($i) . "</td>
				<td><input type='text' name='nama' value='" . $this->prosesmahasiswa->getNama($i) . "'></td>
				<td><input type='text' name='tempat' value='" . $this->prosesmahasiswa->getTempat($i) . "'></td>
				<td><input type='date' name='tl' value='" . $this->prosesmahasiswa->getTl($i) . "'></td>
				<td>
					<select name='gender'>
						<option value='Laki-laki' " . ($this->prosesmahasiswa->getGender($i) == 'Laki-laki' ? 'selected' : '') . ">Laki-laki</option>
						<option value='Perempuan' " . ($this->prosesmahasiswa->getGender($i) == 'Perempuan' ? 'selected' : '') . ">Perempuan</option>
					</select>
				</td>
				<td><input type='email' name='email' value='" . $this->prosesmahasiswa->getEmail($i) . "'></td>
				<td><input type='text' name='telp' value='" . $this->prosesmahasiswa->getTelp($i) . "'></td>
				<td>
					<input type='hidden' name='action' value='update'>
					<button class='btn btn-success' type='submit'>UPDATE</button> 
				</td>
			</form>
			<form method='POST'>
				<td colspan='1'>
					<input type='hidden' name='nim' value='" . $this->prosesmahasiswa->getNim($i) . "'>
					<input type='hidden' name='action' value='delete'>
					<button class='btn btn-danger' type='submit' onclick='return confirm(\"Yakin ingin hapus?\")'>DELETE</button>
				</td>
			</form>
			</tr>";
		}
		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);

		// Menampilkan ke layar
		$this->tpl->write();
	}
}
