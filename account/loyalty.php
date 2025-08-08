<?php
session_start();
require_once '../mainconfig.php';

if(!isset($_SESSION['user'])) {
    header('location:' . base_url('/auth/login'));
}

require_once '../system/helpers/voucher_helper.php';

$loyalty = getLoyaltyPoints($_SESSION['user']['username']);

include_once '../layouts/header.php'; 
?>

<style>
.loyalty-card {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-radius: 20px;
    padding: 30px;
    text-align: center;
    margin-bottom: 30px;
    box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
}

.tier-badge {
    display: inline-block;
    padding: 8px 20px;
    border-radius: 50px;
    font-weight: bold;
    margin-bottom: 15px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.tier-bronze { background: linear-gradient(135deg, #cd7f32, #a0522d); }
.tier-silver { background: linear-gradient(135deg, #c0c0c0, #808080); }
.tier-gold { background: linear-gradient(135deg, #ffd700, #daa520); }
.tier-platinum { background: linear-gradient(135deg, #e5e4e2, #b8b8b8); }

.points-display {
    font-size: 48px;
    font-weight: bold;
    margin: 20px 0;
}

.tier-progress {
    background: rgba(255, 255, 255, 0.2);
    border-radius: 10px;
    height: 10px;
    overflow: hidden;
    margin: 20px 0;
}

.tier-progress-fill {
    height: 100%;
    background: rgba(255, 255, 255, 0.8);
    border-radius: 10px;
    transition: width 0.3s ease;
}

.benefits-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-top: 20px;
}

.benefit-card {
    background: white;
    border-radius: 15px;
    padding: 20px;
    text-align: center;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.benefit-card:hover {
    transform: translateY(-5px);
}

.benefit-icon {
    font-size: 40px;
    margin-bottom: 15px;
    color: #7367f0;
}

.tier-requirements {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
    margin: 30px 0;
}

.tier-card {
    background: white;
    border-radius: 15px;
    padding: 20px;
    text-align: center;
    border: 3px solid transparent;
    transition: all 0.3s ease;
}

.tier-card.current {
    border-color: #7367f0;
    box-shadow: 0 0 20px rgba(115, 103, 240, 0.3);
}

.tier-card.achieved {
    background: #f8f9fa;
    opacity: 0.7;
}

@media (max-width: 768px) {
    .points-display {
        font-size: 36px;
    }
    
    .loyalty-card {
        padding: 20px;
        margin: 20px;
    }
}
</style>

<div class="row">
    <div class="col-12">
        <div class="loyalty-card">
            <div class="tier-badge tier-<?= $loyalty['tier']; ?>">
                <?= strtoupper($loyalty['tier']); ?> MEMBER
            </div>
            
            <h3>Selamat datang, <?= $_SESSION['user']['name']; ?>!</h3>
            
            <div class="points-display">
                <?= number_format($loyalty['points'], 0, ',', '.'); ?>
                <small style="font-size: 16px; display: block; margin-top: 10px;">POIN LOYALTY</small>
            </div>
            
            <?php
            $next_tier_points = 0;
            $current_progress = 0;
            
            switch($loyalty['tier']) {
                case 'bronze':
                    $next_tier_points = 1000;
                    $current_progress = ($loyalty['points'] / 1000) * 100;
                    $next_tier = 'Silver';
                    break;
                case 'silver':
                    $next_tier_points = 5000;
                    $current_progress = (($loyalty['points'] - 1000) / 4000) * 100;
                    $next_tier = 'Gold';
                    break;
                case 'gold':
                    $next_tier_points = 10000;
                    $current_progress = (($loyalty['points'] - 5000) / 5000) * 100;
                    $next_tier = 'Platinum';
                    break;
                case 'platinum':
                    $current_progress = 100;
                    $next_tier = 'Maksimal';
                    break;
            }
            
            if ($loyalty['tier'] != 'platinum'):
            ?>
            <div class="tier-progress">
                <div class="tier-progress-fill" style="width: <?= min($current_progress, 100); ?>%"></div>
            </div>
            
            <p>
                <?php if ($next_tier != 'Maksimal'): ?>
                    Kumpulkan <?= number_format($next_tier_points - $loyalty['points'], 0, ',', '.'); ?> poin lagi untuk naik ke tier <?= $next_tier; ?>
                <?php else: ?>
                    Anda telah mencapai tier tertinggi!
                <?php endif; ?>
            </p>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    <i class="fas fa-trophy"></i> Tier Membership
                </h4>
            </div>
            <div class="card-body">
                <div class="tier-requirements">
                    <div class="tier-card <?= $loyalty['tier'] == 'bronze' ? 'current' : ''; ?>">
                        <div class="tier-badge tier-bronze">Bronze</div>
                        <h6>0 - 999 Poin</h6>
                        <ul class="text-left mt-3" style="list-style: none; padding: 0;">
                            <li><i class="fas fa-check text-success"></i> Akses basic features</li>
                            <li><i class="fas fa-check text-success"></i> Customer support</li>
                            <li><i class="fas fa-check text-success"></i> Transaction history</li>
                        </ul>
                    </div>
                    
                    <div class="tier-card <?= $loyalty['tier'] == 'silver' ? 'current' : ($loyalty['points'] >= 1000 ? 'achieved' : ''); ?>">
                        <div class="tier-badge tier-silver">Silver</div>
                        <h6>1.000 - 4.999 Poin</h6>
                        <ul class="text-left mt-3" style="list-style: none; padding: 0;">
                            <li><i class="fas fa-check text-success"></i> Bonus Rp 2.000</li>
                            <li><i class="fas fa-check text-success"></i> Priority support</li>
                            <li><i class="fas fa-check text-success"></i> Special vouchers</li>
                        </ul>
                    </div>
                    
                    <div class="tier-card <?= $loyalty['tier'] == 'gold' ? 'current' : ($loyalty['points'] >= 5000 ? 'achieved' : ''); ?>">
                        <div class="tier-badge tier-gold">Gold</div>
                        <h6>5.000 - 9.999 Poin</h6>
                        <ul class="text-left mt-3" style="list-style: none; padding: 0;">
                            <li><i class="fas fa-check text-success"></i> Bonus Rp 5.000</li>
                            <li><i class="fas fa-check text-success"></i> Exclusive discounts</li>
                            <li><i class="fas fa-check text-success"></i> Early access sales</li>
                        </ul>
                    </div>
                    
                    <div class="tier-card <?= $loyalty['tier'] == 'platinum' ? 'current' : ($loyalty['points'] >= 10000 ? 'achieved' : ''); ?>">
                        <div class="tier-badge tier-platinum">Platinum</div>
                        <h6>10.000+ Poin</h6>
                        <ul class="text-left mt-3" style="list-style: none; padding: 0;">
                            <li><i class="fas fa-check text-success"></i> Bonus Rp 10.000</li>
                            <li><i class="fas fa-check text-success"></i> VIP support</li>
                            <li><i class="fas fa-check text-success"></i> Custom deals</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    <i class="fas fa-gift"></i> Cara Mendapatkan Poin
                </h4>
            </div>
            <div class="card-body">
                <div class="benefits-grid">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-gamepad"></i>
                        </div>
                        <h5>Topup Game</h5>
                        <p>Dapatkan 1 poin untuk setiap Rp 1.000 transaksi topup game</p>
                    </div>
                    
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h5>Isi Pulsa</h5>
                        <p>Dapatkan 1 poin untuk setiap Rp 2.000 transaksi pulsa</p>
                    </div>
                    
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-share-alt"></i>
                        </div>
                        <h5>Referral</h5>
                        <p>Dapatkan 50 poin untuk setiap teman yang berhasil diajak</p>
                    </div>
                    
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <h5>Daily Login</h5>
                        <p>Dapatkan 5 poin untuk setiap hari login berturut-turut</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    <i class="fas fa-history"></i> Riwayat Poin
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="pointsTable">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Aktivitas</th>
                                <th>Poin</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $points_history = $db->query("SELECT * FROM points_history WHERE username = '{$_SESSION['user']['username']}' ORDER BY created_at DESC LIMIT 20");
                            while($point = mysqli_fetch_assoc($points_history)):
                            ?>
                            <tr>
                                <td><?= date('d M Y H:i', strtotime($point['created_at'])); ?></td>
                                <td>
                                    <span class="badge badge-<?= $point['action'] == 'earned' ? 'success' : 'warning'; ?>">
                                        <?= $point['action'] == 'earned' ? 'Earned' : 'Redeemed'; ?>
                                    </span>
                                </td>
                                <td>
                                    <strong class="text-<?= $point['action'] == 'earned' ? 'success' : 'warning'; ?>">
                                        <?= $point['action'] == 'earned' ? '+' : '-'; ?><?= $point['points']; ?>
                                    </strong>
                                </td>
                                <td><?= $point['description']; ?></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#pointsTable').DataTable({
        "ordering": false,
        "pageLength": 10,
        "language": {
            "emptyTable": "Belum ada riwayat poin",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            "infoEmpty": "",
            "infoFiltered": "",
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
});
</script>

<?php include_once '../layouts/footer.php'; ?>