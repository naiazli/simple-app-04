    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><?php echo isset($page_title) ? htmlspecialchars($page_title) : 'Dashboard'; ?></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="?controller=dashboard&action=index">Home</a></li>
                            <li class="breadcrumb-item active"><?php echo isset($page_title) ? htmlspecialchars($page_title) : 'Dashboard'; ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
