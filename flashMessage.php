

<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?php if (isset($_SESSION["flash_message"])): ?>
        <p><?php echo $_SESSION["flash_message"]; ?></p>
        <?php unset($_SESSION["flash_message"]); // Clear the flash message ?>
    <?php endif; ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

    

