<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Property</h3>
                    </div>
                    <form method="POST">
                        <div class="card-body">
                            <h5>Owner Details</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="first_name">First Name *</label>
                                        <input type="text" name="first_name" class="form-control" value="<?php echo htmlspecialchars($property['first_name']); ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="last_name">Last Name *</label>
                                        <input type="text" name="last_name" class="form-control" value="<?php echo htmlspecialchars($property['last_name']); ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mailing_address">Mailing Address</label>
                                <textarea name="mailing_address" class="form-control"><?php echo htmlspecialchars($property['mailing_address']); ?></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" name="city" class="form-control" value="<?php echo htmlspecialchars($property['owner_city']); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="state_province">State/Province</label>
                                        <input type="text" name="state_province" class="form-control" value="<?php echo htmlspecialchars($property['owner_state_province']); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="postal_code">Postal Code</label>
                                        <input type="text" name="postal_code" class="form-control" value="<?php echo htmlspecialchars($property['owner_postal_code']); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($property['email']); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone_number">Phone Number</label>
                                        <input type="text" name="phone_number" class="form-control" value="<?php echo htmlspecialchars($property['phone_number']); ?>">
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <h5>Property Details</h5>
                            <div class="form-group">
                                <label for="street_address">Street Address *</label>
                                <input type="text" name="street_address" class="form-control" value="<?php echo htmlspecialchars($property['street_address']); ?>" required>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="city_prop">City *</label>
                                        <input type="text" name="city_prop" class="form-control" value="<?php echo htmlspecialchars($property['city']); ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="state_province_prop">State/Province *</label>
                                        <input type="text" name="state_province_prop" class="form-control" value="<?php echo htmlspecialchars($property['state_province']); ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="postal_code_prop">Postal Code *</label>
                                        <input type="text" name="postal_code_prop" class="form-control" value="<?php echo htmlspecialchars($property['postal_code']); ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="property_type">Property Type</label>
                                        <select name="property_type" class="form-control">
                                            <option value="residential" <?php echo $property['property_type'] == 'residential' ? 'selected' : ''; ?>>Residential</option>
                                            <option value="commercial" <?php echo $property['property_type'] == 'commercial' ? 'selected' : ''; ?>>Commercial</option>
                                            <option value="industrial" <?php echo $property['property_type'] == 'industrial' ? 'selected' : ''; ?>>Industrial</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="parcel_number">Parcel Number *</label>
                                        <input type="text" name="parcel_number" class="form-control" value="<?php echo htmlspecialchars($property['parcel_number']); ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="legal_description">Legal Description</label>
                                <textarea name="legal_description" class="form-control"><?php echo htmlspecialchars($property['legal_description']); ?></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="square_footage">Square Footage</label>
                                        <input type="number" name="square_footage" class="form-control" value="<?php echo $property['square_footage']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="year_built">Year Built</label>
                                        <input type="number" name="year_built" class="form-control" value="<?php echo $property['year_built']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update Property</button>
                            <a href="?controller=property&action=index" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
