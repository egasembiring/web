<?php
require_once '../system/helpers/voucher_helper.php';

$flash_sales = getFlashSales();
$active_vouchers = getActiveVouchers(3);
?>

<?php if (!empty($flash_sales)): ?>
<div class="row justify-content-center mb-4">
    <div class="col-lg-8">
        <div class="card flash-sale-card">
            <div class="card-body">
                <h5 class="card-title text-center mb-4">
                    <i class="fas fa-fire text-danger"></i> FLASH SALE 
                    <span class="badge badge-danger ml-2">HOT</span>
                </h5>
                
                <?php foreach ($flash_sales as $sale): ?>
                <div class="flash-sale-item mb-3">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h6 class="mb-1"><?= $sale['name']; ?></h6>
                            <p class="text-muted mb-2"><?= $sale['description']; ?></p>
                            <span class="badge badge-success">Diskon <?= $sale['discount_percentage']; ?>%</span>
                        </div>
                        <div class="col-md-6 text-md-right">
                            <div class="flash-countdown" data-end="<?= $sale['end_time']; ?>">
                                <span class="time-block">
                                    <span class="time-value" id="hours-<?= $sale['id']; ?>">00</span>
                                    <span class="time-label">Jam</span>
                                </span>
                                <span class="time-separator">:</span>
                                <span class="time-block">
                                    <span class="time-value" id="minutes-<?= $sale['id']; ?>">00</span>
                                    <span class="time-label">Menit</span>
                                </span>
                                <span class="time-separator">:</span>
                                <span class="time-block">
                                    <span class="time-value" id="seconds-<?= $sale['id']; ?>">00</span>
                                    <span class="time-label">Detik</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if (!empty($active_vouchers)): ?>
<div class="row justify-content-center mb-4">
    <div class="col-lg-8">
        <div class="card voucher-card">
            <div class="card-body">
                <h5 class="card-title text-center mb-4">
                    <i class="fas fa-ticket-alt text-primary"></i> VOUCHER TERSEDIA
                </h5>
                
                <div class="row">
                    <?php foreach ($active_vouchers as $voucher): ?>
                    <div class="col-md-4 mb-3">
                        <div class="voucher-item">
                            <div class="voucher-code"><?= $voucher['code']; ?></div>
                            <div class="voucher-name"><?= $voucher['name']; ?></div>
                            <div class="voucher-desc"><?= $voucher['description']; ?></div>
                            <div class="voucher-value">
                                <?php if ($voucher['type'] == 'percentage'): ?>
                                    Diskon <?= $voucher['value']; ?>%
                                <?php elseif ($voucher['type'] == 'fixed'): ?>
                                    Diskon Rp <?= number_format($voucher['value'], 0, ',', '.'); ?>
                                <?php else: ?>
                                    Bonus Rp <?= number_format($voucher['value'], 0, ',', '.'); ?>
                                <?php endif; ?>
                            </div>
                            <small class="voucher-expires">
                                Berlaku hingga <?= date('d M Y', strtotime($voucher['valid_until'])); ?>
                            </small>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<style>
.flash-sale-card {
    background: linear-gradient(135deg, #ff6b6b, #ee5a24);
    color: white;
    border: none;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(255, 107, 107, 0.3);
}

.flash-sale-card .card-title {
    color: white;
    font-weight: bold;
}

.flash-countdown {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
}

.time-block {
    background: rgba(255, 255, 255, 0.2);
    padding: 8px 12px;
    border-radius: 8px;
    text-align: center;
    display: flex;
    flex-direction: column;
    min-width: 60px;
}

.time-value {
    font-size: 18px;
    font-weight: bold;
    line-height: 1;
}

.time-label {
    font-size: 10px;
    opacity: 0.8;
    margin-top: 2px;
}

.time-separator {
    font-size: 20px;
    font-weight: bold;
}

.voucher-card {
    border: 2px dashed #7367f0;
    border-radius: 15px;
}

.voucher-item {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    padding: 15px;
    border-radius: 10px;
    text-align: center;
    height: 100%;
    position: relative;
    overflow: hidden;
}

.voucher-item::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: repeating-linear-gradient(
        45deg,
        transparent,
        transparent 10px,
        rgba(255, 255, 255, 0.1) 10px,
        rgba(255, 255, 255, 0.1) 20px
    );
    animation: shine 3s infinite;
}

@keyframes shine {
    0% { transform: translateX(-100%) translateY(-100%); }
    100% { transform: translateX(100%) translateY(100%); }
}

.voucher-code {
    font-size: 16px;
    font-weight: bold;
    font-family: 'Courier New', monospace;
    background: rgba(255, 255, 255, 0.2);
    padding: 5px 10px;
    border-radius: 5px;
    margin-bottom: 8px;
    position: relative;
    z-index: 1;
}

.voucher-name {
    font-weight: 600;
    margin-bottom: 5px;
    position: relative;
    z-index: 1;
}

.voucher-desc {
    font-size: 12px;
    opacity: 0.9;
    margin-bottom: 8px;
    position: relative;
    z-index: 1;
}

.voucher-value {
    font-size: 14px;
    font-weight: bold;
    background: rgba(255, 255, 255, 0.2);
    padding: 5px 10px;
    border-radius: 15px;
    margin-bottom: 8px;
    position: relative;
    z-index: 1;
}

.voucher-expires {
    font-size: 10px;
    opacity: 0.8;
    position: relative;
    z-index: 1;
}

@media (max-width: 768px) {
    .flash-countdown {
        margin-top: 15px;
    }
    
    .time-block {
        min-width: 50px;
        padding: 6px 8px;
    }
    
    .time-value {
        font-size: 16px;
    }
    
    .voucher-item {
        margin-bottom: 15px;
    }
}
</style>

<script>
// Flash sale countdown timer
document.querySelectorAll('.flash-countdown').forEach(function(countdown) {
    const endTime = new Date(countdown.dataset.end).getTime();
    const saleId = countdown.querySelector('[id*="hours-"]').id.split('-')[1];
    
    const timer = setInterval(function() {
        const now = new Date().getTime();
        const distance = endTime - now;
        
        if (distance < 0) {
            clearInterval(timer);
            countdown.innerHTML = '<span class="badge badge-secondary">Berakhir</span>';
            return;
        }
        
        const hours = Math.floor(distance / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
        document.getElementById('hours-' + saleId).textContent = hours.toString().padStart(2, '0');
        document.getElementById('minutes-' + saleId).textContent = minutes.toString().padStart(2, '0');
        document.getElementById('seconds-' + saleId).textContent = seconds.toString().padStart(2, '0');
    }, 1000);
});
</script>