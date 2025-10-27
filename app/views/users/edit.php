<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit User</h3>
                    </div>
                    <form method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="role_id">Role *</label>
                                <select name="role_id" class="form-control" required>
                                    <option value="">Select Role</option>
                                    <?php foreach ($roles as $role): ?>
                                        <option value="<?php echo $role['role_id']; ?>" <?php echo $user['role_id'] == $role['role_id'] ? 'selected' : ''; ?>><?php echo htmlspecialchars($role['role_name']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="username">Username *</label>
                                <input type="text" name="username" class="form-control" value="<?php echo htmlspecialchars($user['username']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password (leave blank to keep current)</label>
                                <input type="password" name="password" class="form-control" minlength="6">
                            </div>
                            <div class="form-group">
                                <label for="full_name">Full Name *</label>
                                <input type="text" name="full_name" class="form-control" value="<?php echo htmlspecialchars($user['full_name']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="phone_number">Phone Number</label>
                                <input type="text" name="phone_number" class="form-control" value="<?php echo htmlspecialchars($user['phone_number']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="is_active">Active</label>
                                <select name="is_active" class="form-control">
                                    <option value="1" <?php echo $user['is_active'] ? 'selected' : ''; ?>>Yes</option>
                                    <option value="0" <?php echo !$user['is_active'] ? 'selected' : ''; ?>>No</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update User</button>
                            <a href="?controller=user&action=index" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
