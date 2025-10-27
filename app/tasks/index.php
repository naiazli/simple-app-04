<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tasks List</h3>
                    </div>
                    <div class="card-body">
                        <a href="?controller=task&action=create" class="btn btn-primary mb-3">Add New Task</a>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Property Address</th>
                                    <th>Assessment Date</th>
                                    <th>Assessed Value</th>
                                    <th>Status</th>
                                    <th>Proposer Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($tasks)): ?>
                                    <tr><td colspan="7">No tasks. <a href="?controller=task&action=create">Create one</a>.</td></tr>
                                <?php else: ?>
                                    <?php foreach ($tasks as $task): ?>
                                    <tr>
                                        <td><?php echo $task['assessment_id']; ?></td>
                                        <td><?php echo htmlspecialchars($task['property_address']); ?></td>
                                        <td><?php echo $task['assessment_date']; ?></td>
                                        <td><?php echo $task['assessed_value']; ?></td>
                                        <td><?php echo htmlspecialchars($task['status']); ?></td>
                                        <td><?php echo htmlspecialchars($task['proposer_name']); ?></td>
                                        <td>
                                            <a href="?controller=task&action=edit&id=<?php echo $task['assessment_id']; ?>" class="btn btn-info btn-sm">Edit</a>
                                            <a href="?controller=task&action=delete&id=<?php echo $task['assessment_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete?');">Delete</a>
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
