<?php
require '../../../mainconfig.php';

if (isset($_GET['edit'])) {
    $edit = addslashes(trim(htmlspecialchars($_GET['edit'])));
    
    if (is_numeric($edit)) {
        $query_metode_guest = mysqli_query($db, "SELECT * FROM metode_guest WHERE id = '$edit'");
        
        if (mysqli_num_rows($query_metode_guest) === 1) {
            $fetch_metode_guest = mysqli_fetch_assoc($query_metode_guest);
            
            $html_tipe = '';
            $ar_tipe = ['Transfer Bank','Virtual Account','Convenience Store','E-Wallet'];
            foreach($ar_tipe as $loop) {
                
                $selected_loop = $loop == $fetch_metode_guest['tipe'] ? 'selected' : '';
                
                $html_tipe .= '<option value="'.$loop.'" '.$selected_loop.'>'.$loop.'</option>';
            }
            
            $html_sistem = '';
            $ar_sistem = ['Manual','Tripay'];
            foreach($ar_sistem as $loop) {
                
                $selected_loop = $loop == $fetch_metode_guest['sistem'] ? 'selected' : '';
                
                $html_sistem .= '<option value="'.$loop.'" '.$selected_loop.'>'.$loop.'</option>';
            }
            
            $class_kode = $fetch_metode_guest['sistem'] == 'Manual' ? 'd-none' : '';
            $class_rek = $fetch_metode_guest['sistem'] != 'Manual' ? 'd-none' : '';
            
            echo '
                <input type="hidden" name="id" value="'.$edit.'">
                
                <div class="form-group">
                    <label>Tipe</label>
                    <select class="form-control" name="tipe">
                    '.$html_tipe.'
                    </select>
                </div>
                <div class="form-group">
                    <label>Metode</label>
                    <input type="text" class="form-control" autocomplete="off" name="metode" value="'.$fetch_metode_guest['metode'].'">
                </div>
                <div class="form-group">
                    <label>Gambar</label><br>
                    <img src="/assets/metode/'.$fetch_metode_guest['img'].'" width="100">
                    <div class="custom-file mt-1">
                        <input type="file" accept=".jpg, .jpeg, .png" class="custom-file-input" id="customFile" name="img">
                        <label class="custom-file-label" for="customFile">'.$fetch_metode_guest['img'].'</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Sistem</label>
                    <select class="form-control" name="sistem" onchange="select_sistem(this.value, true);">
                    '.$html_sistem.'
                    </select>
                    <input type="text" class="form-control mt-1 '.$class_kode.'" id="input-kode-edit" name="kode" placeholder="Kode Metode" autocomplete="off" value="'.$fetch_metode_guest['kode'].'">
                    <input type="text" class="form-control mt-1 '.$class_rek.'" id="input-rek-edit" name="rek" placeholder="Rekening Tujuan & Atas Nama" autocomplete="off" value="'.$fetch_metode_guest['rek'].'">
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" class="form-control" autocomplete="off" name="ket" value="'.$fetch_metode_guest['ket'].'">
                </div>
                <div class="form-group">
                    <label>Sub Keterangan</label>
                    <input type="text" class="form-control" autocomplete="off" name="sub_ket" value="'.$fetch_metode_guest['sub_ket'].'">
                </div>
            ';
        }
    }
}