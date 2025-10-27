<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?php echo $task_count ?? 0; ?></h3>
                        <p>Total Assessments</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-tasks"></i>
                    </div>
                    <a href="?controller=task&action=index" class="small-box-footer">Manage <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <h3><?php echo $property_count ?? 0; ?></h3>
                    <p>Total Properties</p>
                    <div class="icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <a href="?controller=property&action=index" class="small-box-footer">Manage <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <h3><?php echo $due_reassessments ?? 0; ?></h3>
                    <p>Reassessments Due</p>
                    <div class="icon">
                        <i class="fas fa-calendar-exclamation"></i>
                    </div>
                    <a href="#" onclick="alert('View reassessment_due_view');" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <h3><?php echo $outstanding_taxes ?? 0; ?></h3>
                    <p>Outstanding Taxes</p>
                    <div class="icon">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <a href="#" onclick="alert('View outstanding_tax_view');" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h3>
                    </div>
                    <div class="card-body">
                        <p>Use the sidebar for CRUD. Recent audits can be viewed in audit_trail table.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
