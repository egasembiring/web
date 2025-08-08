<?php
session_start();
require_once '../../mainconfig.php';

if(!isset($_SESSION['user']) || $_SESSION['user']['level'] != 'Admin') {
    header('location:' . base_url('/auth/login'));
}

require_once '../../system/helpers/voucher_helper.php';

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['create_voucher'])) {
        $code = $db->real_escape_string($_POST['code']);
        $name = $db->real_escape_string($_POST['name']);
        $description = $db->real_escape_string($_POST['description']);
        $type = $db->real_escape_string($_POST['type']);
        $value = floatval($_POST['value']);
        $min_transaction = floatval($_POST['min_transaction']);
        $max_discount = $_POST['max_discount'] ? floatval($_POST['max_discount']) : 'NULL';
        $usage_limit = $_POST['usage_limit'] ? intval($_POST['usage_limit']) : 'NULL';
        $valid_from = $db->real_escape_string($_POST['valid_from']);
        $valid_until = $db->real_escape_string($_POST['valid_until']);
        
        $query = "INSERT INTO vouchers (code, name, description, type, value, min_transaction, max_discount, usage_limit, valid_from, valid_until, status) 
                  VALUES ('$code', '$name', '$description', '$type', $value, $min_transaction, $max_discount, $usage_limit, '$valid_from', '$valid_until', 'active')";
        
        if ($db->query($query)) {
            $_SESSION['alert'] = ['success', 'Berhasil!', 'Voucher berhasil dibuat.'];
        } else {
            $_SESSION['alert'] = ['danger', 'Error!', 'Gagal membuat voucher: ' . $db->error];
        }
    }
    
    if (isset($_POST['create_flash_sale'])) {
        $name = $db->real_escape_string($_POST['sale_name']);
        $description = $db->real_escape_string($_POST['sale_description']);
        $discount = floatval($_POST['discount_percentage']);
        $start_time = $db->real_escape_string($_POST['start_time']);
        $end_time = $db->real_escape_string($_POST['end_time']);
        
        $query = "INSERT INTO flash_sales (name, description, discount_percentage, start_time, end_time, status) 
                  VALUES ('$name', '$description', $discount, '$start_time', '$end_time', 'upcoming')";
        
        if ($db->query($query)) {
            $_SESSION['alert'] = ['success', 'Berhasil!', 'Flash sale berhasil dibuat.'];
        } else {
            $_SESSION['alert'] = ['danger', 'Error!', 'Gagal membuat flash sale: ' . $db->error];
        }
    }
}

include_once '../../layouts/header_admin.php';
?>

<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Voucher & Flash Sale Management</h2>
            </div>
        </div>
    </div>
</div>

<div class="content-body">
    <!-- Voucher Management -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        <i class="fas fa-ticket-alt"></i> Buat Voucher Baru
                    </h4>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-group">
                            <label for="code">Kode Voucher</label>
                            <input type="text" class="form-control" id="code" name="code" required placeholder="Contoh: WELCOME10">
                        </div>
                        
                        <div class="form-group">
                            <label for="name">Nama Voucher</label>
                            <input type="text" class="form-control" id="name" name="name" required placeholder="Contoh: Welcome Bonus">
                        </div>
                        
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Deskripsi voucher"></textarea>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="type">Tipe</label>
                                    <select class="form-control" id="type" name="type" required>
                                        <option value="percentage">Persentase (%)</option>
                                        <option value="fixed">Fixed Amount (Rp)</option>
                                        <option value="bonus_saldo">Bonus Saldo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="value">Nilai</label>
                                    <input type="number" class="form-control" id="value" name="value" required step="0.01">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="min_transaction">Min. Transaksi</label>
                                    <input type="number" class="form-control" id="min_transaction" name="min_transaction" value="0" step="0.01">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="max_discount">Max. Diskon (Opsional)</label>
                                    <input type="number" class="form-control" id="max_discount" name="max_discount" step="0.01">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="usage_limit">Batas Penggunaan (Opsional)</label>
                            <input type="number" class="form-control" id="usage_limit" name="usage_limit" placeholder="Kosongkan untuk unlimited">
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="valid_from">Berlaku Dari</label>
                                    <input type="datetime-local" class="form-control" id="valid_from" name="valid_from" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="valid_until">Berlaku Hingga</label>
                                    <input type="datetime-local" class="form-control" id="valid_until" name="valid_until" required>
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" name="create_voucher" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Buat Voucher
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Flash Sale Management -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        <i class="fas fa-fire"></i> Buat Flash Sale
                    </h4>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-group">
                            <label for="sale_name">Nama Flash Sale</label>
                            <input type="text" class="form-control" id="sale_name" name="sale_name" required placeholder="Contoh: Flash Sale Weekend">
                        </div>
                        
                        <div class="form-group">
                            <label for="sale_description">Deskripsi</label>
                            <textarea class="form-control" id="sale_description" name="sale_description" rows="3" required placeholder="Deskripsi flash sale"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="discount_percentage">Diskon (%)</label>
                            <input type="number" class="form-control" id="discount_percentage" name="discount_percentage" required max="100" min="1" step="0.01">
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="start_time">Waktu Mulai</label>
                                    <input type="datetime-local" class="form-control" id="start_time" name="start_time" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="end_time">Waktu Selesai</label>
                                    <input type="datetime-local" class="form-control" id="end_time" name="end_time" required>
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" name="create_flash_sale" class="btn btn-danger">
                            <i class="fas fa-fire"></i> Buat Flash Sale
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Voucher List -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        <i class="fas fa-list"></i> Daftar Voucher
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="voucherTable">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Tipe</th>
                                    <th>Nilai</th>
                                    <th>Penggunaan</th>
                                    <th>Berlaku</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $vouchers = $db->query("SELECT * FROM vouchers ORDER BY created_at DESC");
                                while($voucher = mysqli_fetch_assoc($vouchers)):
                                ?>
                                <tr>
                                    <td><code><?= $voucher['code']; ?></code></td>
                                    <td><?= $voucher['name']; ?></td>
                                    <td>
                                        <span class="badge badge-info">
                                            <?= ucfirst(str_replace('_', ' ', $voucher['type'])); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php if ($voucher['type'] == 'percentage'): ?>
                                            <?= $voucher['value']; ?>%
                                        <?php else: ?>
                                            Rp <?= number_format($voucher['value'], 0, ',', '.'); ?>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?= $voucher['used_count']; ?> / 
                                        <?= $voucher['usage_limit'] ? $voucher['usage_limit'] : '∞'; ?>
                                    </td>
                                    <td>
                                        <?= date('d M Y', strtotime($voucher['valid_from'])); ?> - 
                                        <?= date('d M Y', strtotime($voucher['valid_until'])); ?>
                                    </td>
                                    <td>
                                        <span class="badge badge-<?= $voucher['status'] == 'active' ? 'success' : 'secondary'; ?>">
                                            <?= ucfirst($voucher['status']); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="?edit=<?= $voucher['id']; ?>" class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="?delete=<?= $voucher['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus voucher ini?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Flash Sale List -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        <i class="fas fa-fire"></i> Daftar Flash Sale
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="flashSaleTable">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Diskon</th>
                                    <th>Waktu</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $flash_sales = $db->query("SELECT * FROM flash_sales ORDER BY created_at DESC");
                                while($sale = mysqli_fetch_assoc($flash_sales)):
                                ?>
                                <tr>
                                    <td>
                                        <strong><?= $sale['name']; ?></strong><br>
                                        <small class="text-muted"><?= $sale['description']; ?></small>
                                    </td>
                                    <td>
                                        <span class="badge badge-danger"><?= $sale['discount_percentage']; ?>%</span>
                                    </td>
                                    <td>
                                        <small>
                                            Mulai: <?= date('d M Y H:i', strtotime($sale['start_time'])); ?><br>
                                            Selesai: <?= date('d M Y H:i', strtotime($sale['end_time'])); ?>
                                        </small>
                                    </td>
                                    <td>
                                        <?php
                                        $status_class = 'secondary';
                                        if ($sale['status'] == 'active') $status_class = 'success';
                                        if ($sale['status'] == 'upcoming') $status_class = 'warning';
                                        ?>
                                        <span class="badge badge-<?= $status_class; ?>">
                                            <?= ucfirst($sale['status']); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="?edit_sale=<?= $sale['id']; ?>" class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="?delete_sale=<?= $sale['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus flash sale ini?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#voucherTable, #flashSaleTable').DataTable({
        "ordering": true,
        "pageLength": 10,
        "language": {
            "emptyTable": "Tidak ada data",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            "infoEmpty": "",
            "lengthMenu": "Tampilkan _MENU_ data",
            "search": "Cari:",
            "paginate": {
                "first": "Pertama",
                "last": "Terakhir",
                "next": "Selanjutnya", 
                "previous": "Sebelumnya"
            }
        }
    });
    
    // Set default datetime values
    const now = new Date();
    now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
    const nowString = now.toISOString().slice(0, 16);
    
    document.getElementById('valid_from').value = nowString;
    document.getElementById('start_time').value = nowString;
    
    // Set end time to 7 days from now
    const endDate = new Date(now.getTime() + (7 * 24 * 60 * 60 * 1000));
    endDate.setMinutes(endDate.getMinutes() - endDate.getTimezoneOffset());
    const endString = endDate.toISOString().slice(0, 16);
    
    document.getElementById('valid_until').value = endString;
    document.getElementById('end_time').value = endString;
});
</script>

<?php include_once '../../layouts/footer.php'; ?>