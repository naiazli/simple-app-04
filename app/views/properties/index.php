<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Properties List</h3>
                    </div>
                    <div class="card-body">
                        <a href="?controller=property&action=create" class="btn btn-primary mb-3">Add New Property</a>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Parcel Number</th>
                                    <th>Street Address</th>
                                    <th>Owner Name</th>
                                    <th>Property Type</th>
                                    <th>Square Footage</th>
                                    <th>Year Built</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($properties)): ?>
                                    <tr><td colspan="8">No properties. <a href="?controller=property&action=create">Create one</a>.</td></tr>
                                <?php else: ?>
                                    <?php foreach ($properties as $property): ?>
                                    <tr>
                                        <td><?php echo $property['property_id']; ?></td>
                                        <td><?php echo htmlspecialchars($property['parcel_number']); ?></td>
                                        <td><?php echo htmlspecialchars($property['street_address']); ?></td>
                                        <td><?php echo htmlspecialchars($property['owner_name']); ?></td>
                                        <td><?php echo htmlspecialchars($property['property_type']); ?></td>
                                        <td><?php echo $property['square_footage']; ?></td>
                                        <td><?php echo $property['year_built']; ?></td>
                                        <td>
                                            <a href="?controller=property&action=edit&id=<?php echo $property['property_id']; ?>" class="btn btn-info btn-sm">Edit</a>
                                            <a href="?controller=property&action=delete&id=<?php echo $property['property_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete?');">Delete</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
