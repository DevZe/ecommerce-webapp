<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<link href="/assets/css/productsDisplay.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<section>

<div class="col-8">
    <h2 style="text-align:center">Store Sales</h2>
    
    <table style="margin:15px">
    
        <tr>
            <th>#</th>
            <th>Sale title</th>
            <th>Date Sold</th>
            <th>Amount</th>
            <th>View</th>
        </tr>

        <?php foreach ($sales as $key => $value): ?>
            
                <tr>               
                    <td><?= $key; ?></td>
                    <td><?= $value['item_title']; ?></td>
                    <td><?= $value['sale_date']; ?></td>
                    <td><?= $value['amount']; ?></td>
                    <td>
                        <a class="btn" href="/admin/sales/<?= $value['sale_id']; ?>">
                            <span class="glyphicon glyphicon-eye-open"></span>
                        </a>
                    </td>
                </tr>
            
        <?php endforeach; ?>

    </table>
</div>
</section>
<?= $this->endSection() ?>