<!DOCTYPE html>
<html lang="en">
<div class="admin-section">
<div class="wrapper">
        <form action="<?= base_url('Admin/register'); ?>" method="post" value="<?= set_value('nama'); ?>">
            <h1>Buat Akun</h1>
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
                <input type="text" name="email" id="email" placeholder="Masukkan Email">
                <i class='bx bx-envelope'></i>
                <?php echo form_error('email', '<small class="text-danger pl-3">','</small>') ?>
            </div>
            <div class="input-box">
                <input type="password" name="password1" id="password1" placeholder="Masukkan Password">
                <i class='bx bxs-lock-alt' ></i>
                <?php echo form_error('password1', '<small class="text-danger pl-3">','</small>') ?>
            </div>
            <div class="input-box">
                <input type="password" name="password2" id="password2" placeholder="Masukkan Password">
                <i class='bx bxs-lock-alt' ></i>
                <?php echo form_error('password2', '<small class="text-danger pl-3">','</small>') ?>
            </div>
            <div class="remember-forgot pl-3">
                <a href="<?= base_url('Admin') ?>">Sudah Punya Akun? Login</a>
            </div>
            <button type="submit" class="btn">Daftar</button>
        </form>
    </div>
</div>
</html>