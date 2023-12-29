<!DOCTYPE html>
<html lang="en">
<div class="admin-section">
<div class="wrapper">
        <form action="<?= base_url('Admin'); ?>" method="post" value="<?= set_value('nama'); ?>">
            <h1>Login</h1>
            <!-- Tampilkan pesan kesalahan jika ada -->
            <?php $error_message = $this->session->flashdata('message'); ?>
            <?php if ($error_message): ?>
                <div role="alert">
                    <?= $error_message ?>
                </div>
            <?php endif; ?>
            <div class="input-box">
                <input type="text" name="nama" id="nama" placeholder="Masukkan Username">
                <i class='bx bxs-user'></i>
                <?php echo form_error('nama', '<small class="text-danger pl-3">','</small>') ?>
            </div>
            <div class="input-box">
                <input type="password" name="password" id="password" placeholder="Masukkan Password">
                <i class='bx bxs-lock-alt' ></i>
                <?php echo form_error('password', '<small class="text-danger pl-3">','</small>') ?>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox" >Ingat Saya</label>
                <a href="<?= base_url('Admin/register') ?>">Buat Akun</a>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
    </div>
</div>
</html>