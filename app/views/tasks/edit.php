<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Task</h3>
                    </div>
                    <form method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="property_id">Property ID *</label>
                                <select name="property_id" class="form-control" required>
                                    <option value="">Select Property</option>
                                    <?php foreach ($properties as $property): ?>
                                        <option value="<?php echo $property['property_id']; ?>" <?php echo $task['property_id'] == $property['property_id'] ? 'selected' : ''; ?>><?php echo htmlspecialchars($property['parcel_number']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="assessment_date">Assessment Date *</label>
                                <input type="date" name="assessment_date" class="form-control" value="<?php echo $task['assessment_date']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="assessed_value">Assessed Value *</label>
                                <input type="number" name="assessed_value" class="form-control" value="<?php echo $task['assessed_value']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="land_value">Land Value</label>
                                <input type="number" name="land_value" class="form-control" value="<?php echo $task['land_value']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="improvement_value">Improvement Value</label>
                                <input type="number" name="improvement_value" class="form-control" value="<?php echo $task['improvement_value']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="status">Status *</label>
                                <select name="status" class="form-control" required>
                                    <option value="pending" <?php echo $task['status'] == 'pending' ? 'selected' : ''; ?>>Pending</option>
                                    <option value="approved" <?php echo $task['status'] == 'approved' ? 'selected' : ''; ?>>Approved</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="assessor_notes">Assessor Notes</label>
                                <textarea name="assessor_notes" class="form-control"><?php echo htmlspecialchars($task['assessor_notes']); ?></textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update Task</button>
                            <a href="?controller=task&action=index" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
