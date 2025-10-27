<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create New Task</h3>
                    </div>
                    <form method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="property_id">Property ID *</label>
                                <select name="property_id" class="form-control" required>
                                    <option value="">Select Property</option>
                                    <?php foreach ($properties as $property): ?>
                                        <option value="<?php echo $property['property_id']; ?>"><?php echo htmlspecialchars($property['parcel_number']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="assessment_date">Assessment Date *</label>
                                <input type="date" name="assessment_date" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="assessed_value">Assessed Value *</label>
                                <input type="number" name="assessed_value" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="land_value">Land Value</label>
                                <input type="number" name="land_value" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="improvement_value">Improvement Value</label>
                                <input type="number" name="improvement_value" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="status">Status *</label>
                                <select name="status" class="form-control" required>
                                    <option value="pending">Pending</option>
                                    <option value="approved">Approved</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="assessor_notes">Assessor Notes</label>
                                <textarea name="assessor_notes" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Create Task</button>
                            <a href="?controller=task&action=index" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
