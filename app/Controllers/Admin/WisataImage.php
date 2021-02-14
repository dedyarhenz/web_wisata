<?php 
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\IncomingRequest;
use App\Models\WisataImageModel;

class WisataImage extends BaseController
{
	public function __construct()
	{
		$this->wisataImage = new WisataImageModel();
	}

	public function image($wisata_id)
	{
		$data= [
			'title' 	=> 'wisata',
			'isi' 		=> 'v_wisataimage',
			'wisata_id'	=> $wisata_id,
			'wisata'	=> $this->wisataImage->getDataWisata($wisata_id),
		];
		
		echo view('Admin/layout/v_template',$data);
	}

	public function create($wisata_id)
	{
		$data= [
			'title' => 'gambar wisata',
			'isi' 	=> 'v_wisataimage_add',
			'wisata_id'	=> $wisata_id,
		];
 
        $validated = $this->validate([
            'gmb_wisata' => [
                'rules' => 'uploaded[gmb_wisata]|mime_in[gmb_wisata,image/jpg,image/jpeg,image/png]|max_size[gmb_wisata,5024]',
	            'errors' => [
	            	'uploaded' => 'pilih gambar dahulu',
	            	'max_size' => 'gambar terlalu besar',
	            	'mime_in' => 'format gambar tidak support',
	            ],
            ],
        ]);


        if ($validated == FALSE) {
           	session()->setFlashdata('error', $this->validator->listErrors());
            echo view('Admin/layout/v_template',$data);
 
        } else {
 
            $imagewisata = $this->request->getFile('gmb_wisata');
            $nameimg = $imagewisata->getRandomName();
            $imagewisata->move('uploads/wisata', $nameimg);
 
            $data = [
            	'BANGUNAN_ID' => $wisata_id,
                'NAMA_GAMBAR' => $nameimg,
            ];
     
            $this->wisataImage->createData($data);
            return redirect()->to(base_url('/admin/wisataimage/image/' . $wisata_id))->with('success', 'Upload Berhasil'); 
        }

	}

	public function delete($wisata_id, $wisataimage_id)
	{

	    $image = $this->wisataImage->getDataImageWisata($wisataimage_id);
	    unlink('uploads/wisata/' . $image['NAMA_GAMBAR']);
	    
	    $hapus = $this->wisataImage->deleteData($wisataimage_id);

	    if($hapus){
	        session()->setFlashdata('warning', 'Hapus Data Berhasil');
	        return redirect()->to('/admin/wisataimage/image/' . $wisata_id);
	    }
	}

}
