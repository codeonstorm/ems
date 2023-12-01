<?php 

class FileHandler
{
    public function __construct($file) {
        $this->file = $file;
        $this->target_filename = null;
        
        $imageFileType = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($file["tmp_name"]);
        if($check == false) {
            return json_encode(["result"=>false, "msg"=>"File is not an image"]);
        }  

        // Check if file already exists
        // if (file_exists($targetfile)) {
        //   echo "Sorry, file already exists.";
        //   $uploadOk = 0;
        // }
        // Check file size
        // if ($file["size"] > 500000) {
        //   echo "Sorry, your file is too large.";
        //   $uploadOk = 0;
        // }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        return json_encode(["result"=>false, "msg"=>"Sorry, only JPG, JPEG, PNG & GIF files are allowed"]);
        }


        $date = date('m/d/Yh:i:sa', time());
        $rand=rand(10000,99999);
        $encname=$date.$rand;
        $bannername=md5($encname).'.'.$imageFileType;
        $this->target_filename = $bannername;
    }

    public function upload($target_dir = "./uploads") {
        $file_full_path = $target_dir . $this->target_filename;
        if (move_uploaded_file($this->file["tmp_name"], $file_full_path)) {
            return json_encode(["result"=>true, "msg"=>"The file ". htmlspecialchars( basename( $this->file["name"])). " has been uploaded"]);
        } else {
            return json_encode(["result"=>false, "msg"=>"Sorry, there was an error uploading your file"]);
        }
    }
}