<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sistema MYRP</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    
    <link href="<?= site_url(); ?>public/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= site_url(); ?>public/css/styles.css" rel="stylesheet" />
    <script src="<?= site_url(); ?>public/js/jquery-3.6.0.min.js" ></script>
    <script src="<?= site_url(); ?>public/bootstrap/js/bootstrap.bundle.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>


    <!--DATATABLES -->
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/af-2.5.3/cr-1.6.2/r-2.4.1/datatables.min.css" rel="stylesheet"/>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/af-2.5.3/cr-1.6.2/r-2.4.1/datatables.min.js"></script>

    
    <?php $this->session = session(); ?>
</head>